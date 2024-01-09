<?php

class Showfriend_model extends CI_Model{

	function __construct() {

        parent::__construct();

   }

   

	public function insert_member($data) {

		$this->load->database();

	    $this->db->insert('na_member', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	

	function view_friendlist($uid){

		 $sql = "SELECT * FROM na_member INNER JOIN na_frnd_reqst ON na_member.id=na_frnd_reqst.to_id where na_member.id=na_frnd_reqst.to_id AND na_frnd_reqst.from_id=".$uid." group by email"; 

		$query = $this->db->query($sql);

		return($query->num_rows() > 0) ? $query->result(): NULL;    //ternary operator

	}



}

?>