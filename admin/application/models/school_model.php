<?php

class School_model extends CI_Model{

	function __construct() {

        parent::__construct();

   }

   

	public function insert_instructional_facilities($data,$id) {

		$this->load->database();
	/*
	   $this -> db -> where('ind_id', $id);
  $this -> db -> delete('na_schools_facilities');
  */
	    $this->db->insert('na_schools_facilities', $data);
		

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	

	public function insert_school_course($data) {
$this->load->helper('array');
		$this->load->database();
		/*		
		$this -> db -> where('ind_id',  element('ind_id', $data));
  $this -> db -> delete('na_sch_course');
  
*/
	    $this->db->insert('na_sch_course', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	

	public function insert_school_lect($data) {

		$this->load->helper('array');
		$this->load->database();
		/*		
		$this -> db -> where('ind_id',  element('ind_id', $data));
  $this -> db -> delete('na_sch_lectures');
  

*/
	    $this->db->insert('na_sch_lectures', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	
public function insert_school_teacher($data) {

		$this->load->helper('array');
		$this->load->database();
		/*		
		$this -> db -> where('ind_id',  element('ind_id', $data));
  $this -> db -> delete('na_sch_teacher');
  
*/
	    $this->db->insert('na_sch_teacher', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

function insert_school_curiculam($data) {

		$this->load->helper('array');
		$this->load->database();
		/*		
		$this -> db -> where('ind_id',  element('ind_id', $data));
  $this -> db -> delete('na_sch_teacher');
  
*/
	    $this->db->insert('na_sch_curriculum', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;
		}
	}



public function insert_school_sch($data) {

		$this->load->helper('array');
		$this->load->database();
		/*		
		$this -> db -> where('ind_id',  element('ind_id', $data));
  $this -> db -> delete('na_sch_lectures');
  

*/
	    $this->db->insert('na_sch_schools', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}
//-------------------school/division----------------------------

//-------------------past lecture----------------------------
	public function insert_school_past($data) {

		$this->load->helper('array');
		$this->load->database();
		/*		
		$this -> db -> where('ind_id',  element('ind_id', $data));
  $this -> db -> delete('na_sch_lectures');
  

*/
	    $this->db->insert('na_sch_past__lectures', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}


	function insert_school_other_edu($data) {

		$this->load->database();
		
	    $this->db->insert('na_sch_other_education', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}
	

}





?>