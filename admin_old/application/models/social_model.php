<?php

class Social_model extends CI_Model{

	function __construct() {

        parent::__construct();

   }

   

	public function insert_social($data) {

		$this->load->database();

	    $this->db->insert('na_network_profile', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	

	function view_social(){

		$sql ="select * from na_network_profile";

		$query = $this->db->query($sql);

		return($query->num_rows() > 0) ? $query->result(): NULL;

	}

	

	function edit_social($id,$data){

		

		$this->db->where('id', $id);

		$this->db->update('na_network_profile',$data);

			

	}

	

	function show_social_id($id){

		$this->db->select('*');

		$this->db->from('na_network_profile');

		$this->db->where('id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function delete_social($id){

	  $this->db->where('id', $id);

      $this->db->delete('na_network_profile'); 

	}

}

?>