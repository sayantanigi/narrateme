<?php

class Faculty_edit_model extends CI_Model{

	function __construct() {

        parent::__construct();

   }

  
	

	public function show_teacher_data($id) {
//$this->load->helper('array');
		$this->load->database();
		/*		
		$this -> db -> where('ind_id',  element('ind_id', $data));
  $this -> db -> delete('na_sch_course');
  
*/
	/*  $this->db->where('teacher_id',$id);
$this->db->update('na_sch_teacher',$data);*/
//$condition = "teacher_id =" . "'" . $id . "'";

		$this->db->select('*');

		$this->db->from('na_sch_teacher');

		$this->db->where('id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}
	
	function show_school_curriculum($id){
	$this->load->database();
		$this->db->select('*');

		$this->db->from('na_sch_curriculum');

		$this->db->where('id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;
	}
	
	function show_school_edu_ins($id){
	$this->load->database();
		$this->db->select('*');

		$this->db->from('na_sch_other_education');

		$this->db->where('id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;
	}
	
function show_lecture_data($id){

		$this->db->select('*');

		$this->db->from('na_sch_lectures');

		$this->db->where('id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}
	
	function show_school_data($id){

		$this->db->select('*');

		$this->db->from('na_schools_facilities');

		$this->db->where('id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}
	

	function show_course_data($id){
$this->load->helper('array');
		//$this->load->database();
		/*		
		$this -> db -> where('ind_id',  element('ind_id', $data));*/
		$this->db->select('*');

		$this->db->from('na_sch_course');

		$this->db->where('id', $id);
		
		 $query = $this->db->get(); 

		  $result = $query->result(); 
		 

		return $result;

	}
	
	public function edit_school_teacher($data,$data_id) {

		$this->load->helper('array');
		$this->load->database();
		/*		
		$this -> db -> where('ind_id',  element('ind_id', $data));
  $this -> db -> delete('na_sch_teacher');
  
*/

$this->db->where('id',$data_id);
$this->db->update('na_sch_teacher',$data);


		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}
	
	function edit_school_lect($data,$data_id) {

		$this->load->database();
	//echo $data."    ".$data_id; exit();
$this->db->where('id',$data_id);
$this->db->update('na_sch_lectures',$data);


		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}
	
	function edit_school_course($data,$data_id) {

		$this->load->database();
	//echo $data."    ".$data_id; exit();
$this->db->where('id',$data_id);
$this->db->update('na_sch_course',$data);


		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}
	
	function edit_instructional_facilities($data,$data_id) {

		$this->load->database();
	//echo $data."    ".$data_id; exit();
$this->db->where('id',$data_id);
$this->db->update('na_schools_facilities',$data);


		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

function edit_school_curricul($data,$data_id) {

		$this->load->database();
	//echo $data."    ".$data_id; exit();
$this->db->where('id',$data_id);
$this->db->update('na_sch_curriculum',$data);


		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}
	
	function edit_school_edu_ins($data,$data_id) {

		$this->load->database();
	//echo $data."    ".$data_id; exit();
$this->db->where('id',$data_id);
$this->db->update('na_sch_other_education',$data);


		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}
	
	
}

?>