<?php

class User_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_user($email,$pwd)
	{
		$this->db->where('email',$email);
		$this->db->where('password',md5($pwd));
		$query = $this->db->get('user');
		return $query->result();
	}

	//get user
	function get_user_by_id($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('user');
		return $query->result();
	}

	//insert
	function insert_user($data)
	{
		return $this->db->insert('user',$data);
	}
}

?>