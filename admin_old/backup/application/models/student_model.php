<?php

class Student_model extends CI_Model{

	function __construct() {

        parent::__construct();

   }

   

	public function insert_student($data) {

		$this->load->database();

	    $this->db->insert('na_student', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	

	function view_student(){

		$sql ="select * from na_student";

		$query = $this->db->query($sql);

		return($query->num_rows() > 0) ? $query->result(): NULL;

	}

	function show_student_id($id){
		$this->db->select('*');
		$this->db->from('na_student');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	function edit_student($id, $data){
	
		$this->db->where('id', $id);
		$this->db->update('na_student',$data);
	}

	function show_award_id($id){

		$this->db->select('*');

		$this->db->from('na_individual_award');

		$this->db->where('id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	

	

	//=================Award Area=====================

	function insert_award($data){

		$this->load->database();

	    $this->db->insert('na_individual_award', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	

	//==============View Student Award List===========

	function view_awarddetails(){

		//======================================

		$this->db->select('*');

		$this->db->from('na_individual_award');

		//$this->db->join('na_student', 'na_student.id = na_individual_award.student_id');

		//======================================

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	//==============View Student Award List===========

	//==============Edit Award========================

	function edit_studentaward($id,$data){

		$this->db->where('id', $id);

		$this->db->update('na_individual_award',$data);

	}

	

	//==============Edit Award========================

	//==============Delete Award======================

	function delete_award($id){

	  $this->db->where('id', $id);

      $this->db->delete('na_individual_award'); 

	}

	//==============Delete Award======================

	

	//=================Award Area=====================

	

	//=================Job Experience Area============

	function insert_experience($data){

		$this->load->database();

	    $this->db->insert('na_student_experience', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	

	//==============View Student Award List===========

	function view_experiencedetails(){

		//======================================

		$this->db->select('na_student_experience.id as expid,na_student_experience.student_id,na_student_experience.employer_name,na_student_experience.from_date,na_student_experience.job_description ,na_student_experience.to_date,na_student_experience.position,na_student_experience.status, na_student.name , na_student.id, na_student.email , na_student.mobile'); // (or whichever fields you're interested in)

		$this->db->from('na_student_experience', 'na_student');

		$this->db->join('na_student', 'na_student.id = na_student_experience.student_id');

		//======================================

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	//=================Job Experience Area============

	

	//==============Delete Award======================

	function delete_job($id){

	  $this->db->where('id', $id);

      $this->db->delete('na_student_experience'); 

	}

	//==============Delete Award======================

	//show_job_id()

	//==============Show Job==========================

	function show_job_id($id){

		$this->db->select('*');

		$this->db->from('na_student_experience');

		$this->db->where('id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

		

	}

	//==============Show Job==========================

	//==============Edit Award========================

	function edit_student_job($id,$data){

		$this->db->where('id', $id);

		$this->db->update('na_student_experience',$data);

	}

	

	//==============Edit Award========================

	

	//======********Rehabiliation*********============

	//==============Add Rehabiliation=================

	function insert_rehabilitation($data){

		$this->load->database();

	    $this->db->insert('na_rehabilitation', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	//==============Add Rehabiliation=================

	//==============View Rehabiliation================

	function get_rehabilitation(){

		$sql ="select * from na_rehabilitation order by id desc";

		$query = $this->db->query($sql);

		return($query->num_rows() > 0) ? $query->result(): NULL;

	}

	//=============View Rehabiliation=================

	

	//============Show Individual Rahab===============

	function get_rehab_id($id){

		$this->db->select('*');

		$this->db->from('na_rehabilitation');

		$this->db->where('id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	//============Show Individual Rehab===============

	//============Edit Rehabiliation==================

	function edit_rehab($id,$data){

		$this->db->where('id', $id);

		$this->db->update('na_rehabilitation',$data);

		

	}

	//============edit Rehabiliation==================

	

	//============Edit Rehabiliation==================

	function delete_rehab($id){

	  $this->db->where('id', $id);

      $this->db->delete('na_rehabilitation'); 

	}

	//============edit Rehabiliation==================

	//====*********Rehabiliation*********=============

}





?>