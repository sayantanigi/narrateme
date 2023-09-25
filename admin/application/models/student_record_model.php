<?php

class Student_record_model extends CI_Model{

	function __construct() {

        parent::__construct();

   }

   

	public function insert_individual($data) {

		$this->load->database();

	    $this->db->insert('na_individual', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	

	

	/* =======================akash-4-4-16 starts============ */

	

	/* =======================Insert student-Individual Data starts============ */

	

	 function insert_st_individual($data) {

		$this->load->database();

	    $this->db->insert('na_st_individual', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}	

	/* =======================Insert student-Individual Data ends============ */

	

	/* =======================show student-Individual Data starts============ */

	function show_st_individual_data($id){

		$this->db->select('*');

		$this->db->from('na_st_individual');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	/* =======================show student-Individual Data starts============ */

	

	/*   ==============Insert Drug============== */

	function insert_st_drug($data){

		$this->load->database();

	    $this->db->insert('na_st_drug', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	//=============Insert Drug===============

	

	//*************Award Area starts ****************

	function insert_st_award($data){

		$this->load->database();

	    $this->db->insert('na_st_award', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	/* *************Award Area ends *****************  */

	

	/*  *************Rehab Area starts****************  */

	function insert_st_rahab($data){

		$this->load->database();

	    $this->db->insert('na_st_rehabilitation', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	/* *************Rehab Area ends****************  */

	

	/* *************Institute Area starts **************** */

	function insert_st_institute($data){

		$this->load->database();

	    $this->db->insert('na_st_eduinstitute', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	} 

	/* *************Institute Area ends **************** */

	

	/* *************Teacher Area****************** */

	function insert_st_teacher($data){

		$this->load->database();

		$this->db->insert('na_st_teacher',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	/* *************Teacher Area********************** */

	

	/* **********Coach Area************************ */

	function insert_st_coach($data){

		$this->load->database();

		$this->db->insert('na_st_coach',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	/* *************Coach Area**************************  */

	

	/* *============Insert Instructional Facilities============ */

	function insert_st_insfac($data){

		$this->load->database();

	    $this->db->insert('na_st_facilities', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	//=============Insert Instructional Facilities===============

	

	/* =======================akash-4-4-16 ends============ */

	

	

	//=====================ARUP 4-4-16================================

	function insert_recomendation($data){

		$this->load->database();

		$this->db->insert('na_st_recomendation',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	//=====================ARUP 4-4-16================================

	//*************Recomendation Area******************

	

	//=============Debashish 29-03-2016================

	//*****job area******//

	//=====================ARUP 4-4-16================================

	function insert_job($data){

		$this->load->database();

		$this->db->insert('na_st_student_experience',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	//=====================ARUP 4-4-16================================

	//*****Extra curricullam area******//

	//=====================ARUP 4-4-16================================

	function show_academic_transcript($id){

		$this->db->select('*');

		$this->db->from('na_st_academic_transcript');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	//=====================ARUP 4-4-16================================

	//=====================ARUP 4-4-16================================

	function show_educational_records($id){

		$this->db->select('*');

		$this->db->from('na_st_educational_records');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	//=====================ARUP 4-4-16================================

	//=====================ARUP 4-4-16================================

	function show_issuer_of_report($id){

		$this->db->select('*');

		$this->db->from('na_st_issuer_of_report');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	//=====================ARUP 4-4-16================================

	//=====================ARUP 4-4-16================================

	function insert_extra($data){

		$this->load->database();

		$this->db->insert('na_st_extracurricullam',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	//=====================ARUP 4-4-16================================

	//*****Seminar area******//

	

	function insert_seminar($data){

		$this->load->database();

		$this->db->insert('na_seminars',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	

	//=====================ARUP 4-4-16================================

	function insert_video($data){

		$this->load->database();

	    $this->db->insert('na_st_video_presentation', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	//=====================ARUP 4-4-16================================

	//=====================ARUP 4-4-16================================

	

	function insert_issuer_of_report ($data){

		$this->load->database();

		$this->db->insert('na_st_issuer_of_report',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	//=====================ARUP 4-4-16================================

	//=====================ARUP 4-4-16================================

	

	function insert_eduinst_attend($data){

		$this->load->database();

		$this->db->insert('na_st_eduinstitute_attended',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	//=====================ARUP 4-4-16================================

	//=====================ARUP 4-4-16================================

	function insert_seminar_attend($data){

		$this->load->database();

		$this->db->insert('na_st_seminar_attend',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	//=====================ARUP 4-4-16================================

	//=====================ARUP 4-4-16================================

	function insert_educational_records($data){

		$this->load->database();

		$this->db->insert('na_st_educational_records',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	//=====================ARUP 4-4-16================================

	//=====================ARUP 4-4-16================================

	function insert_academic_transcript($data){

		$this->load->database();

		$this->db->insert('na_st_academic_transcript',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	//=====================ARUP 4-4-16================================

	

	//====================Supratim 04-04-2016 PERSONAL RECOMMENDATIONS===========

	function show_student_record_perrec($id){

		$this->db->select('*');

		$this->db->from('na_sturec_personal_recommendations');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	//=================================================

	//====================Supratim 04-04-2016 REFERENCES===========

	function show_student_record_reference($id){

		$this->db->select('*');

		$this->db->from('na_sturec_reference');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	//=================================================

	

	//====================Supratim 04-04-2016 AUDIO===========

	function show_student_record_audio($id){

		$this->db->select('*');

		$this->db->from('na_audio_sturec_presentation');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	//=================================================

	

	//=============Supratim 04-04-2016=================

		

		//**************Personal Recommendations Area****************

	//==============Insert Personal Recommendations==============

	function insert_perrec($data){

		$this->load->database();

	    $this->db->insert('na_sturec_personal_recommendations', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	//=============Insert Personal Recommendations===============

	//===============Show Personal Recommendations Data==========

	function get_perrec(){

		$sql="select * from na_sturec_personal_recommendations order by id desc";

		$query = $this->db->query($sql);

		return($query->num_rows()>0) ? $query->result(): NULL;

	}

	//==============Show Personal Recommendations Data===========

	//==============Edit Personal Recommendations================

	function edit_perrec($id,$data){

		$this->db->where('id',$id);

		$this->db->update('na_sturec_personal_recommendations',$data);

	}

	//==============Edit Personal Recommendations================

	//==============Edit Personal Recommendations================

	function edit_perrec_id($id,$data){

		$this->db->update('id',$id);

		$this->db->update('na_sturec_personal_recommendations',$data);

	}

	//==============Edit Personal Recommendations===============

	//==============Show Individual Personal Recommendations====

	function get_perrec_id($id){

		$this->db->select('*');

		$this->db->from('na_sturec_personal_recommendations');

		$this->db->where('id',$id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function delete_perrec($id){

		$this->db->where('id',$id);

		$this->db->delete('na_sturec_personal_recommendations');

	}

	//==============Show Individual Personal Recommendations====

	//**************Personal Recommendations Area****************



	//=============Supratim 04-04-2016=================

	

	

	

	//=============Supratim 04-04-2016=================

		

		//**************Reference Area****************

	//==============Insert Reference==============

	function insert_reference($data){

		$this->load->database();

	    $this->db->insert('na_sturec_reference', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	//=============Insert Reference===============

	//===============Show Reference Data==========

	function get_reference(){

		$sql="select * from na_sturec_reference order by id desc";

		$query = $this->db->query($sql);

		return($query->num_rows()>0) ? $query->result(): NULL;

	}

	//==============Show Reference Data===========

	//==============Edit Reference================

	function edit_reference($id,$data){

		$this->db->where('id',$id);

		$this->db->update('na_sturec_reference',$data);

	}

	//==============Edit Reference================

	//==============Edit Reference================

	function edit_reference_id($id,$data){

		$this->db->update('id',$id);

		$this->db->update('na_sturec_reference',$data);

	}

	//==============Edit Reference===============

	//==============Show Individual Reference====

	function get_reference_id($id){

		$this->db->select('*');

		$this->db->from('na_sturec_reference');

		$this->db->where('id',$id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function delete_reference($id){

		$this->db->where('id',$id);

		$this->db->delete('na_sturec_reference');

	}

	//==============Show Individual Reference====

	//**************Reference Area****************



	//=============Supratim 01-04-2016=================

	

	//=============Supratim 04-04-2016=================

		

		//**************Audio Presentation Area****************

	//==============Insert Audio Presentation==============

	function insert_audioo($data){

		$this->load->database();

	    $this->db->insert('na_audio_sturec_presentation', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	//=============Insert Audio Presentation===============

	//===============Show Audio Presentation Data==========

	function get_audio(){

		$sql="select * from na_audio_sturec_presentation order by id desc";

		$query = $this->db->query($sql);

		return($query->num_rows()>0) ? $query->result(): NULL;

	}

	//==============Show Audio Presentation Data===========

	//==============Edit Audio Presentation================

	function edit_audio($id,$data){

		$this->db->where('id',$id);

		$this->db->update('na_audio_sturec_presentation',$data);

	}

	//==============Edit Audio Presentation================

	//==============Edit Audio Presentation================

	function edit_audio_id($id,$data){

		$this->db->update('id',$id);

		$this->db->update('na_audio_sturec_presentation',$data);

	}

	//==============Edit Audio Presentation===============

	//==============Show Individual Audio Presentation====

	function get_audio_id($id){

		$this->db->select('*');

		$this->db->from('na_audio_sturec_presentation');

		$this->db->where('id',$id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function delete_audio($id){

		$this->db->where('id',$id);

		$this->db->delete('na_audio_sturec_presentation');

	}

	//==============Show Individual Audio Presentation====

	//**************Audio Presentation Area****************



	



//********************Arup-6/4/16***********************



function insert_reports($data){

		$this->load->database();

		$this->db->insert('na_st_reports',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}





function insert_messages($data){

		$this->load->database();

		$this->db->insert('na_st_messages',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}



function show_individual_award_st($id){

		$this->db->select('*');

		$this->db->from('na_st_award');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_individual_drug_st($id){

		$this->db->select('*');

		$this->db->from('na_st_drug');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_individual_institute_st($id){

		$this->db->select('*');

		$this->db->from('na_st_eduinstitute');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_individual_rahab_st($id){

		$this->db->select('*');

		$this->db->from('na_st_rehabilitation');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_individual_teacher_st($id){

		$this->db->select('*');

		$this->db->from('na_st_teacher');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_individual_coach_st($id){

		$this->db->select('*');

		$this->db->from('na_st_coach');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_individual_recomend_st($id){

		$this->db->select('*');

		$this->db->from('na_st_recomendation');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_individual_job_st($id){

		$this->db->select('*');

		$this->db->from('na_st_student_experience');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_extra_st($id){

		$this->db->select('*');

		$this->db->from('na_st_extracurricullam');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_individual_video_st($id){

		$this->db->select('*');

		$this->db->from('na_st_video_presentation');

		//$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_individual_audio_st($id){

		$this->db->select('*');

		$this->db->from('na_audio_sturec_presentation');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_individual_perrec_st($id){

		$this->db->select('*');

		$this->db->from('na_sturec_personal_recommendations');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_individual_reference_st($id){

		$this->db->select('*');

		$this->db->from('na_sturec_reference');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_individual_insfac_st($id){

		$this->db->select('*');

		$this->db->from('na_st_facilities');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_Edu_Instite_Attended_st($id){

		

		$this->db->select('*');

		$this->db->from('na_st_eduinstitute_attended');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_seminar_attend_st($id){

		

		$this->db->select('*');

		$this->db->from('na_st_seminar_attend');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_academic_transcript_st($id){

		$this->db->select('*');

		$this->db->from('na_st_academic_transcript');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_educational_records_st($id){

		$this->db->select('*');

		$this->db->from('na_st_educational_records');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_issuer_of_report_st($id){

		$this->db->select('*');

		$this->db->from('na_st_issuer_of_report');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_reports_st($id){

		$this->db->select('*');

		$this->db->from('na_st_reports');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_messages_st($id){

		$this->db->select('*');

		$this->db->from('na_st_messages');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

//********************Arup-6/4/16***********************	

}





?>