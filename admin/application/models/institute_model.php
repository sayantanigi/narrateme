<?php

class institute_model extends CI_Model{

	function __construct() {

        parent::__construct();

   }

   

	public function add_institute($data) {

		$this->load->database();

	    $this->db->insert('na_eduinstitute', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	

	function view_institute(){

		$sql ="select * from na_eduinstitute";

		$query = $this->db->query($sql);

		return($query->num_rows() > 0) ? $query->result(): NULL;

	}

	

	function edit_institute($id,$datalist){

		

		$this->db->where('id', $id);

		$this->db->update('na_eduinstitute',$datalist);

			

	}

	

	function show_institute_id($id){

		$this->db->select('*');

		$this->db->from('na_eduinstitute');

		$this->db->where('id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function delete_institute($id){

	  $this->db->where('id', $id);

      $this->db->delete('na_eduinstitute'); 

	}

}

?>