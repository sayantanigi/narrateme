<?php

class Institution_data_model extends CI_Model{

	function __construct() {

        parent::__construct();

   }

   

	

	

	

	/* ------------------------------------ content starts ---------------------------------   */ 

	

	

	/* =======================Insert student-Individual Data starts============ */

	

	 function insert_edu($data) {

		$this->load->database();

	    $this->db->insert('na_ins_edu', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}	

	

	/* =======================Insert student-Individual Data ends============ */

	

	

		/* ======================= Insert institution-instructor/edu/proff  Data starts============ */



	function insert_ins_teacher($data) {

		$this->load->database();

	    $this->db->insert('na_ins_teacher', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}	

			/* ======================= Insert institution-instructor/edu/proff  Data starts============ */ 

			

			

		/* ======================= Insert institution-schools/division  Data starts============ */



	function insert_sch_div($data) {

		$this->load->database();

	    $this->db->insert('na_ins_schools', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}	

			/* ======================= Insert institution-schools/division  Data starts============ */

			

			/* ======================= Insert institution-schools/division  Data starts============ */



	function insert_cur($data) {

		$this->load->database();

	    $this->db->insert('na_ins_curriculum', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}	

			/* ======================= Insert institution-schools/division  Data starts============ */



	/* ------------------------------------ content ends ---------------------------------   */

	

	//========================Debjit 5.4.16======================================

	function insert_academic_institution($data){

		$this->load->database();

	    $this->db->insert('na_inst_academic_transcripts',$data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	//==================================Debjit  5.4.16=====================================

	function insert_accepted_substitute($data){

		$this->load->database();

	    $this->db->insert('na_accepted_substitute',$data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	//=============================================

	

	

	

	

	//===========================Debjit show Academic Transcripts Start  Date-6.4.16===================================

	

	function show_academic_institution($id){

		$this->db->select('*');

		$this->db->from('na_inst_academic_transcripts');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	

	//===========================Debjit show Academic Transcripts End Date-6.4.16===================================

	

	

	//===========================Debjit show Other Education Start  Date-6.4.16===================================

	

	function show_accepted_substitute($id){

		$this->db->select('*');

		$this->db->from('na_accepted_substitute');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	

	//===========================Debjit show Other Education End Date-6.4.16===================================

	

		//===========================Debjit show  Education Institution Start  Date-6.4.16===================================

	

	function show_edu($id){

		$this->db->select('*');

		$this->db->from('na_ins_edu');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	

	//===========================Debjit show  Education Institution End Date-6.4.16===================================

		

		//===========================Debjit show  Instructor Start  Date-6.4.16===================================

	

	function show_ins_teacher($id){

		$this->db->select('*');

		$this->db->from('na_ins_teacher');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	

	//===========================Debjit show Instructor End Date-6.4.16===================================

	

	//===========================Debjit show  Schools/Divisions Start  Date-6.4.16===================================

	

	function show_sch_div($id){

		$this->db->select('*');

		$this->db->from('na_ins_schools');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	

	//===========================Debjit show Schools/Divisions End Date-6.4.16===================================

		//===========================Debjit show  Curriculum Start  Date-6.4.16===================================

	

	function show_cur($id){

		$this->db->select('*');

		$this->db->from('na_ins_curriculum');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	

	//===========================Debjit show Curriculum End Date-6.4.16===================================

	

	

	

}





?>