<?php

class Video_model extends CI_Model{

	function __construct() {

        parent::__construct();

   }

   

	public function add_video($data) {

		$this->load->database();

	    $this->db->insert('na_video_presentation', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	

	function view_video(){

		$sql ="select * from na_video_presentation order by id desc";

		$query = $this->db->query($sql);

		return($query->num_rows() > 0) ? $query->result(): NULL;

	}

	

	function edit_video($id,$datalist){

		

		$this->db->where('id', $id);

		$this->db->update('na_video_presentation',$datalist);

			

	}

	

	function show_video_id($id){

		$this->db->select('*');

		$this->db->from('na_video_presentation');

		$this->db->where('id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function delete_video($id){

	  $this->db->where('id', $id);

      $this->db->delete('na_video_presentation'); 

	}

}

?>