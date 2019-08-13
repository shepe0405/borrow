<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');

/**
 * 
 */
class Usuarios_brw extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('user_md_brw');
	}
	public function autenticar()
	{
		$username = $this->input->post('username');
		$senha_sem = $this->input->post('senha');
		$senha_has = $this->user_md_brw->get_senha($senha_sem);
		$senha = password_verify($senha_sem, $senha_has);
		$users = $this->user_md_brw->logar($username, $senha);
		if ($users) {
			$this->session->set_userdata("Logado", $users);
			$this->session->set_flashdata('Sucesso', 'Logado com Sucesso');
			redirect('borrow/','refresh');
		} else {
			$this->session->set_flashdata('Erro', 'Erro ao Logar');
			redirect('usuarios_brw/','refresh');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('Logado');
		$this->session->set_flashdata('Sucesso', 'Deslogado com Sucesso');
		redirect('usuarios_brw/','refresh');
	}
	public function editUser($id = NULL)
	{
		if ($id == NULL) {
			$this->session->set_flashdata('Erro', 'Erro');
			redirect('borrow/','refresh');
		} else {
			$dados['usuarios'] = $this->user_md_brw->get_user_id($id);
			$this->load->view('borrow/header');
			$this->load->view('borrow/upd_usr_brw', $dados);
			$this->load->view('borrow/footer');
		}
	}
	public function index()
	{
		$this->load->view('borrow/login_brw');
		$this->load->view('borrow/footer');
	}
	public function registrar()
	{
		$this->load->view('borrow/reg_brw');
		$this->load->view('borrow/footer');
	}
	public function salvar()
	{
		$dados = array(
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'senha' => password_hash($this->input->post('senha'), PASSWORD_DEFAULT)
		);
		$id = $this->input->post('id');
		if ($id) {
			$novo = array(
				'id' => $id,
				'username' => $dados['username'], 
				'email' => $dados['email'],
				'senha' => $dados['senha']
			);
			$this->user_md_brw->edit_user($dados, $id);
			$this->session->set_userdata("Logado", $novo);
			$this->session->set_flashdata('Sucesso', 'Sucesso ao Editar');
			redirect('borrow/','refresh');
		} else {
			$this->user_md_brw->add_user($dados);
			$this->session->set_flashdata('Sucesso', 'Sucesso ao Editar');
			redirect('usuarios_brw/','refresh');
		}
		
	}
}


?>
