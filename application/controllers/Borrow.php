<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
/**
 * 
 */
class Borrow extends CI_Controller
{

	function __construct()
	{
		parent:: __construct();
		$this->load->model('borrow_model');

	}
	public function index()
	{
		$dados['emprestimos'] = $this->borrow_model->get_brw();
		$this->load->view('borrow/header');
		$this->load->view('borrow/lista_brw', $dados);
		$this->load->view('borrow/footer');
	}
	public function devBrw()
	{
		$dados['emprestimos'] = $this->borrow_model->get_brw_dev();
		$this->load->view('borrow/header');
		$this->load->view('borrow/lista_dev_brw', $dados);
		$this->load->view('borrow/footer');
	}
	public function not()
	{
		$dados['emprestimos'] = $this->borrow_model->get_brw_date();
		$this->load->view('borrow/header');
		$this->load->view('borrow/lista_not_brw', $dados);
		$this->load->view('borrow/footer');
	}
	public function salvarBrw()
	{
		$this->load->helper('databd');
		$dados = array (
			'user_id' => $this->input->post('user_id'),
			'item' => ucfirst($this->input->post('item')),
			'contato' => ucfirst($this->input->post('contato')),
			'data' => formataData($this->input->post('data')),
			'devolucao' => formataData($this->input->post('devolucao')),
			'detalhes' => ucfirst($this->input->post('detalhes')),
			'situacao' => $this->input->post('situacao')
		);
		$id = $this->input->post('id');
		if ($id != NULL) {
			$this->session->set_flashdata('Sucesso', 'Editado com Sucesso');
			$this->borrow_model->edit_brw($dados, $id);
		} else {
			$this->session->set_flashdata('Sucesso', 'Adicionado com Sucesso');
			$this->borrow_model->add_brw($dados);
		}
		$dados['emprestimos'] = $this->borrow_model->get_brw();
		$this->load->view('borrow/header');
		$this->load->view('borrow/lista_brw', $dados);
		$this->load->view('borrow/footer');
	}
	public function editarBrw($id = NULL)
	{
		if ($id == NULL) {
			$this->session->set_flashdata('Erro', 'Erro');
			redirect('borrow/','refresh');
		} else {
			$dados['emprestimos'] = $this->borrow_model->get_brw_id($id);
			$this->load->view('borrow/header');
			$this->load->view('borrow/upd_brw', $dados);
			$this->load->view('borrow/footer');
		}
	}
	public function addBrw()
	{
		$this->load->view('borrow/header');
		$this->load->view('borrow/novo_brw');
		$this->load->view('borrow/footer');
	}
	public function delBrw($id = NULL)
	{
		if ($id == NULL) {
			$this->session->set_flashdata('Erro', 'Erro');
			redirect('borrow/','refresh');
		} else {
			$query = $this->borrow_model->get_brw_id($id);
		}
		if ($query != NULL) {
			$this->borrow_model->del_brw($query->id);
			$this->session->set_flashdata('Sucesso', 'Deletado com Sucesso');
			redirect('borrow/','refresh');
		} else {
			$this->session->set_flashdata('Erro', 'Erro ao Deletar');
			redirect('borrow/','refresh');
		}
	}
	public function editBrwSit($id = NULL)
	{
		if ($id == NULL) {
			$this->session->set_flashdata('Erro', 'Erro');
			redirect('borrow/','refresh');
		} else {
			$this->session->set_flashdata('Sucesso', 'Situacao Alterada com Sucesso!');
			$this->borrow_model->sit_brw($id);
		}
		redirect('borrow/','refresh');
	}
}