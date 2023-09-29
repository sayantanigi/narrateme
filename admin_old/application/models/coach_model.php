<?php

class coach_model extends CI_Model{

	function __construct() {

        parent::__construct();

   }

   

	public function add_coach($data) {

		$this->load->database();

	    $this->db->insert('na_coach', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	

	function view_coach(){

		$sql ="select * from na_coach order by id desc";

		$query = $this->db->query($sql);

		return($query->num_rows() > 0) ? $query->result(): NULL;

	}

	

	function edit_coach($id,$datalist){

		

		$this->db->where('id', $id);

		$this->db->update('na_coach',$datalist);

			

	}

	

	function show_coach_id($id){

		$this->db->select('*');

		$this->db->from('na_coach');

		$this->db->where('id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function delete_coach($id){

	  $this->db->where('id', $id);

      $this->db->delete('na_coach'); 

	}

}

?>