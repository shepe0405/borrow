<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');

/**
 * 
 */
class User_md_brw extends CI_Model
{
	
	function __construct()
	{
		parent:: __construct();
	}
	public function get_user_id($id = NULL)
	{
		if ($id != NULL) {
			$this->db->where('id', $id);
			$this->db->limit(1);
			$query = $this->db->get('users');
			return $query->row();
		}
	}
	public function add_user($user)
	{
		$this->db->insert('users', $user);
	}
	public function edit_user($user = NULL, $id = NULL)
	{
		if ($user != NULL && $id != NULL) {
			$this->db->update('users', $user, array('id' => $id));
		}
	}
	public function get_senha($senha = NULL)
	{
		if ($senha != NULL) {
			$this->db->where('senha', $senha);
			$this->db->limit(1);
			$query = $this->db->get('users');
			return $query->row();
		}
	}
	public function logar($username, $senha)
	{
		$this->db->where('username', $username);
		$this->db->where('senha', $senha);
		$query = $this->db->get('users')->row_array();
		return $query;
	}
}

?>

