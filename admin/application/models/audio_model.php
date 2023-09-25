<?php

class Audio_model extends CI_Model{

	function __construct() {

        parent::__construct();

   }

   

	public function add_audio($data) {

		$this->load->database();

	    $this->db->insert('na_audio_presentation', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	

	function view_audio(){

		$sql ="select * from na_audio_presentation order by id desc";

		$query = $this->db->query($sql);

		return($query->num_rows() > 0) ? $query->result(): NULL;

	}

	

	function edit_audio($id,$datalist){

		

		$this->db->where('id', $id);

		$this->db->update('na_audio_presentation',$datalist);

			

	}

	

	function show_audio_id($id){

		$this->db->select('*');

		$this->db->from('na_audio_presentation');

		$this->db->where('id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function delete_audio($id){

	  $this->db->where('id', $id);

      $this->db->delete('na_audio_presentation'); 

	}

}

?>