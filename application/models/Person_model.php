<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Person_model extends CI_Model
{

	var $table = 'persons';
	var $column_order = array('firstname','lastname','gender','address','dob',null);	//set column field database for datatable orderable
	var $column_search = array('firstname','lastname','address');	//set column field database for datatable searchable just firstname, lastname, and adress
	var $order = array('id' => 'desc');	//default order

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('multipledb'); // loading library.
	}

	private function _get_datatables_query()
	{	
		$this->multipledb->db->from($this->table);
		$i = 0;

		foreach($this->column_search as $item)	//loop column
		{		
			if($_POST['search']['value'])	//if datatable send POST for search
			{		
				if($i===0)		//first loop
				{		
					$this->multipledb->db->group_start();	//open bracket. query where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->multipledb->db->like($item, $_POST['search']['value']);
				} else
				{
					$this->multipledb->db->or_like($item, $_POST['search']['value']);
				}
				if(count($this->column_search) - 1 == $i)	//last loop
				{		
					$this->multipledb->db->group_end();
				}
			}
			$i++;
		}

		if(isset($_POST['order']))	//here oreder processing
		{
			$this->multipledb->db->order_by($this->column_order[$_POST['order']['0']['column']],$_POST['order']['0']['dir']);
		}
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->multipledb->db->order_by(key($order),$order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		{
			$this->multipledb->db->limit($_POST['length'],$_POST['start']);
			$query = $this->multipledb->db->get();
			return $query->result();
		}
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->multipledb->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->multipledb->db->from($this->table);
		return $this->multipledb->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->multipledb->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->multipledb->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->multipledb->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where,$data)
	{
		$this->multipledb->db->update($this->table,$data,$where);
		return $this->multipledb->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->multipledb->db->where('id',$id);
		$this->multipledb->db->delete($this->table);
	}
}