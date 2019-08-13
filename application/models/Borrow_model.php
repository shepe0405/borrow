<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');


/**
 * 
 */
class Borrow_model extends CI_Model
{
	
	function __construct()
	{
		parent:: __construct();
	}
	public function add_brw($dados = NULL)
	{
		if ($dados != NULL) {
			$query = $this->db->insert('emprestimos', $dados);
		}
	}
	public function edit_brw($dados = NULL, $id = NULL)
	{
		if ($dados != NULL && $id != NULL) {
			$query = $this->db->update('emprestimos', $dados, array('id' => $id));
		}
	}
	public function del_brw($id = NULL)
	{
		if ($id != NULL) {
			$this->db->delete('emprestimos', array('id' => $id));
		}
	}
	public function sit_brw($id = NULL)
	{
		if ($id != NULL) {
			$this->db->set('situacao', 2);
			$this->db->set('data_dev', date('Y-m-d'));
			$this->db->where('id', $id);
			$this->db->update('emprestimos');
		}
	}
	public function get_brw()
	{
		$this->db->where('user_id', $this->session->userdata('Logado')['id']);
		$this->db->where('situacao', 1);
		$this->db->order_by('data', 'asc');
		$query = $this->db->get('emprestimos');
		return $query->result();
	}
	public function get_brw_id($id = NULL)
	{
		if ($id != NULL) {
			$this->db->where('id', $id);
			$this->db->limit(1);
			$query = $this->db->get('emprestimos');
			return $query->row();
		}
	}
	public function get_brw_dev()
	{
		$this->db->where('user_id', $this->session->userdata('Logado')['id']);
		$this->db->where('situacao', 2);
		$this->db->order_by('data', 'asc');
		$query = $this->db->get('emprestimos');
		return $query->result();
	}
	public function get_brw_date()
	{
		$this->db->where('user_id', $this->session->userdata('Logado')['id']);
		$this->db->where('devolucao <', date('Y-m-d'));
		$this->db->where('devolucao !=', '0000-00-00');
		$query = $this->db->get('emprestimos');
		return $query->result();
	}
		public function get_brw_date_num()
	{
		$this->db->where('user_id', $this->session->userdata('Logado')['id']);
		$this->db->where('situacao', 1);
		$this->db->where('devolucao <=', date('Y-m-d'));
		$this->db->where('devolucao !=', '0000-00-00');
		$query = $this->db->get('emprestimos');
		return $query->num_rows();
	}
}