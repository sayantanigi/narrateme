<?php

class Recomendation_model extends CI_Model{

	function __construct() {

        parent::__construct();

   }

   

	public function add_recomendation($data) {

		$this->load->database();

	    $this->db->insert('na_recomendation', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	

	function view_recomendation(){

		$sql ="select * from na_recomendation";

		$query = $this->db->query($sql);

		return($query->num_rows() > 0) ? $query->result(): NULL;

	}

	

	function edit_recomendation($id,$datalist){

		

		$this->db->where('id', $id);

		$this->db->update('na_recomendation',$datalist);

			

	}

	

	function show_recomendation_id($id){

		$this->db->select('*');

		$this->db->from('na_recomendation');

		$this->db->where('id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function delete_recomendation($id){

	  $this->db->where('id', $id);

      $this->db->delete('na_recomendation'); 

	}

}

?>