<?php
class Individual_edit_model extends CI_Model{
	function __construct() {
        parent::__construct();
   }
//==========================SUPRATIM 13/07/2016 Award===========================
public function show_award_data($id) {
		$this->load->database();
		$this->db->select('*');
		$this->db->from('na_individual_award');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

function edit_award($data,$id){
		$this->load->database();
		$this->db->where('id',$id);
		$this->db->update('na_individual_award',$data);
		if ($this->db->affected_rows() > 1) {
			return true;
		} else {
			return false;
		}
	}
//==============================Award End===================================

//==============================Drug Start===================================
public function show_drug_data($id) {
		$this->load->database();
		$this->db->select('*');
		$this->db->from('na_drug');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

function edit_drug($data,$id){
		$this->load->database();
		$this->db->where('id',$id);
		$this->db->update('na_drug',$data);
		if ($this->db->affected_rows() > 1) {
			return true;
		} else {
			return false;
		}
	}
//==============================Drug End===================================

//==============================Institute Start===================================
public function show_institute_data($id) {
		$this->load->database();
		$this->db->select('*');
		$this->db->from('na_eduinstitute');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

function edit_institute($data,$id){
		$this->load->database();
		$this->db->where('id',$id);
		$this->db->update('na_eduinstitute',$data);
		if ($this->db->affected_rows() > 1) {
			return true;
		} else {
			return false;
		}
	}
//==============================Institute End===================================

//==============================Rehabilitation Start===================================
public function show_rehabilitation_data($id) {
		$this->load->database();
		$this->db->select('*');
		$this->db->from('na_rehabilitation');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

function edit_rehabilitation($data,$id){
		$this->load->database();
		$this->db->where('id',$id);
		$this->db->update('na_rehabilitation',$data);
		if ($this->db->affected_rows() > 1) {
			return true;
		} else {
			return false;
		}
	}
//==============================Rehabilitation End===================================

//==============================Teacher Start===================================
public function show_teacher_data($id) {
		$this->load->database();
		$this->db->select('*');
		$this->db->from('na_teacher');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

function edit_teacher($data,$id){
		$this->load->database();
		$this->db->where('id',$id);
		$this->db->update('na_teacher',$data);
		if ($this->db->affected_rows() > 1) {
			return true;
		} else {
			return false;
		}
	}
//==============================Teacher End===================================

//==============================Recomendation Start===================================
public function show_recomendation_data($id) {
		$this->load->database();
		$this->db->select('*');
		$this->db->from('na_recomendation');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

function edit_recomendation($data,$id){
		$this->load->database();
		$this->db->where('id',$id);
		$this->db->update('na_recomendation',$data);
		if ($this->db->affected_rows() > 1) {
			return true;
		} else {
			return false;
		}
	}
//==============================Recomendation End===================================

//==============================Extra Start===================================
public function show_extra_data($id) {
		$this->load->database();
		$this->db->select('*');
		$this->db->from('na_extracurricullam');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

function edit_extra($data,$id){
		$this->load->database();
		$this->db->where('id',$id);
		$this->db->update('na_extracurricullam',$data);
		if ($this->db->affected_rows() > 1) {
			return true;
		} else {
			return false;
		}
	}
//==============================Extra End===================================

//==============================Job Start===================================
public function show_job_data($id) {
		$this->load->database();
		$this->db->select('*');
		$this->db->from('na_student_experience');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

function edit_job($data,$id){
		$this->load->database();
		$this->db->where('id',$id);
		$this->db->update('na_student_experience',$data);
		if ($this->db->affected_rows() > 1) {
			return true;
		} else {
			return false;
		}
	}
//==============================Job End===================================

//==============================Coach Start===================================
public function show_coach_data($id) {
		$this->load->database();
		$this->db->select('*');
		$this->db->from('na_coach');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

function edit_coach($data,$id){
		$this->load->database();
		$this->db->where('id',$id);
		$this->db->update('na_coach',$data);
		if ($this->db->affected_rows() > 1) {
			return true;
		} else {
			return false;
		}
	}
//==============================Coach End===================================

//==============================Video Start===================================
public function show_video_data($id) {
		$this->load->database();
		$this->db->select('*');
		$this->db->from('na_video_presentation');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

function edit_video($data,$id){
		$this->load->database();
		$this->db->where('id',$id);
		$this->db->update('na_video_presentation',$data);
		if ($this->db->affected_rows() > 1) {
			return true;
		} else {
			return false;
		}
	}
//==============================Video End===================================
}
?>