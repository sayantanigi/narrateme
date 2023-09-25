<?php

class Individual_model extends CI_Model{

	function __construct() {

        parent::__construct();

   }

   function show_division_data($id){

		$this->db->select('*');

		$this->db->from('na_sch_schools');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}
	
	//=================school/div================
	
	//==============past lecture==================
	
	function show_past_data($id){

		$this->db->select('*');

		$this->db->from('na_sch_past__lectures');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}
	

	function show_school_edu_ins(){

		$sql ="select * from na_sch_other_education";

		$query = $this->db->query($sql);

		return($query->num_rows() > 0) ? $query->result(): NULL;

	}

	function show_school_curiculam(){

		$sql ="select * from na_sch_curriculum";

		$query = $this->db->query($sql);

		return($query->num_rows() > 0) ? $query->result(): NULL;

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

	

	function view_individual(){

		$sql ="select * from na_individual";

		$query = $this->db->query($sql);

		return($query->num_rows() > 0) ? $query->result(): NULL;

	}

	

	function edit_individual($id,$data){

		

		$this->db->where('id', $id);

		$this->db->update('na_individual',$data);

			

	}

	

	function show_individual($id){

		$this->db->select('*');

		$this->db->from('na_individual');

		$this->db->where('id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	function show_school_data($id){

		$this->db->select('*');

		$this->db->from('na_schools_facilities');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}
	
	function show_lecture_data($id){

		$this->db->select('*');

		$this->db->from('na_sch_lectures');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}
	
	function show_teacher_data($id){

		$this->db->select('*');

		$this->db->from('na_sch_teacher');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}
	
	
	function show_course_data($id){

		$this->db->select('*');

		$this->db->from('na_sch_course');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}
	function show_individual_data($id){

		$this->db->select('*');

		$this->db->from('na_individual');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	function show_individual_award($id){

		$this->db->select('*');

		$this->db->from('na_individual_award');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_individual_drug($id){

		$this->db->select('*');

		$this->db->from('na_drug');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	function show_individual_institute($id){

		$this->db->select('*');

		$this->db->from('na_eduinstitute');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_individual_rahab($id){

		$this->db->select('*');

		$this->db->from('na_rehabilitation');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}
	
	// ================ Injury 14-07-2016=====================
	function show_individual_injuries($id){

		$this->db->select('*');

		$this->db->from('na_individual_injuries');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}
 // ================ Injury  14-07-2016=====================
 
 
 // ================ Surgeries 14-07-2016=====================
	function show_individual_surgeries($id){

		$this->db->select('*');

		$this->db->from('na_individual_surgeries');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}
 // ================ Surgeries  14-07-2016=====================
 
 function show_individual_procedures($id){
		$this->db->select('*');

		$this->db->from('na_individual_procedures');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;
	}
	
	function show_individual_treatment($id){
		$this->db->select('*');

		$this->db->from('na_individual_treatments');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;
	}
	
	

	function show_individual_teacher($id){

		$this->db->select('*');

		$this->db->from('na_teacher');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_individual_coach($id){

		$this->db->select('*');

		$this->db->from('na_coach');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	//Debjit  1.4.16   Show_academic_transcript=========================================================>    

		function show_academic_transcript($id){

		$this->db->select('*');

		$this->db->from('na_academic_transcript');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	//Debjit  1.4.16   Show_academic_transcript=========================================================> 

	

	

		//Debjit  1.4.16   Show_Educational Recordst=========================================================>    

		function show_educational_records($id){

		$this->db->select('*');

		$this->db->from('na_educational_records');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	

	//Debjit  1.4.16    Show_Educational Records=========================================================> 

	

	

	

		//Debjit  1.4.16   issuer_of_report Recordst=========================================================>    

		function show_issuer_of_report($id){

		$this->db->select('*');

		$this->db->from('na_issuer_of_report');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	//Debjit  1.4.16   issuer_of_report Records=========================================================> 

	

	//Debjit  1.4.16   reports Recordst=========================================================>    

		function show_reports($id){

		$this->db->select('*');

		$this->db->from('na_reports');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	//Debjit  1.4.16   reports Records=========================================================> 

	

	

	

	//Debjit  1.4.16   message Recordst=========================================================>    

		function show_messages($id){

		$this->db->select('*');

		$this->db->from('na_messages');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	//Debjit  1.4.16   message Records=========================================================> 

	

	

	

	function show_individual_recomend($id){

		$this->db->select('*');

		$this->db->from('na_recomendation');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_individual_job($id){

		$this->db->select('*');

		$this->db->from('na_student_experience');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	/*        ------------------------- Akash-1-04-2016 starts -------------------------- */

		function show_Edu_Instite_Attended($id){

		

		$this->db->select('*');

		$this->db->from('na_eduinstitute_attended');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	

	function show_seminar_attend($id){

		

		$this->db->select('*');

		$this->db->from('na_seminar_attend');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	//====================Supratim 31-3-2016===========

	function show_individual_video($id){

		$this->db->select('*');

		$this->db->from('na_video_presentation');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	//=================================================

	

	

		//====================Supratim 01-04-2016 AUDIO===========

	function show_individual_audio($id){

		$this->db->select('*');

		$this->db->from('na_audio_presentation');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	//=================================================

	//====================Supratim 01-04-2016 PERSONAL RECOMMENDATIONS===========

	function show_individual_perrec($id){

		$this->db->select('*');

		$this->db->from('na_personal_recommendations');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	//=================================================supratim ends---- 

	//====================Supratim 01-04-2016 REFERENCES===========

	function show_individual_reference($id){

		$this->db->select('*');

		$this->db->from('na_reference');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	//=================================================

	

	//====================Supratim 01-04-2016 Instructional Facilities===========

	function show_individual_insfac($id){

		$this->db->select('*');

		$this->db->from('na_ins_facilities');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	//=================================================

	function show_extra($id){

		$this->db->select('*');

		$this->db->from('na_extracurricullam');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function delete_individual($id){

	  $this->db->where('id', $id);

      $this->db->delete('na_individual'); 

	}

	

	//**************Drug Area****************

	//==============Insert Drug==============

	function insert_drug($data){

		$this->load->database();

	    $this->db->insert('na_drug', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	//=============Insert Drug===============

	//===============Show Drug Data==========

	function get_drug(){

		$sql="select * from na_drug order by id desc";

		$query = $this->db->query($sql);

		return($query->num_rows()>0) ? $query->result(): NULL;

	}

	//==============Show Drug Data===========

	//==============Edit Drug================

	function edit_drug($id,$data){

		$this->db->where('id',$id);

		$this->db->update('na_drug',$data);

	}

	//==============Edit Drug================

	//==============Edit Drug================

	function edit_drug_id($id,$data){

		$this->db->update('id',$id);

		$this->db->update('na_drug',$data);

	}

	//==============Edit Drug===============

	//==============Show Individual Drug====

	function get_drug_id($id){

		$this->db->select('*');

		$this->db->from('na_drug');

		$this->db->where('id',$id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function delete_drug($id){

		$this->db->where('id',$id);

		$this->db->delete('na_drug');

	}

	//==============Show Individual Drug====

	//**************Drug Area****************

	

	//*************Award Area****************

	function insert_award($data){

		$this->load->database();

	    $this->db->insert('na_individual_award', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	//*************Award Area****************

	//*************Rehab Area****************

	function insert_rahab($data){

		$this->load->database();

	    $this->db->insert('na_rehabilitation', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	//*************Rehab Area****************

	

	//*************Institute Area****************

	//=============== injuries add 14-07-2016=====================
	function insert_injuries($data){

		$this->load->database();

	    $this->db->insert('na_individual_injuries', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}
	//================ injuries add 14-07-2016=====================
	
	
	//=============== Surgeries add 14-07-2016=====================
	function insert_surgeries($data){

		$this->load->database();

	    $this->db->insert('na_individual_surgeries', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}
	//================ Surgeries add 14-07-2016=====================
	
	function insert_institute($data){

		$this->load->database();

	    $this->db->insert('na_eduinstitute', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	//*************Institute Area****************

	//*************Teacher Area******************

	function insert_teacher($data){

		$this->load->database();

		$this->db->insert('na_teacher',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	//*************Teacher Area**********************

	

	//*************Coach Area************************

	function insert_coach($data){

		$this->load->database();

		$this->db->insert('na_coach',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	//*************Coach Area**************************

	

	 //*************Insert academic_transcript Area    Debjit   1.4.16************************

	function insert_academic_transcript($data){

		$this->load->database();

		$this->db->insert('na_academic_transcript',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	//*************academic_transcript Area    Debjit   1.4.16**************************

	

	

	

	

   //*************Insert Educational Records Area    Debjit   1.4.16************************

	function insert_educational_records($data){

		$this->load->database();

		$this->db->insert('na_educational_records',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	//*************Educational Records Area    Debjit   1.4.16**************************

	

	

	   //*************issuer_of_report  Area    Debjit   1.4.16************************

	function insert_issuer_of_report ($data){

		$this->load->database();

		$this->db->insert('na_issuer_of_report',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	//*************issuer_of_report  Area    Debjit   1.4.16**************************

	

	  //*************reports  Area    Debjit   1.4.16************************

	function insert_reports($data){

		$this->load->database();

		$this->db->insert('na_reports',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	//*************reports  Area    Debjit   1.4.16**************************

	  //*************message  Area    Debjit   1.4.16************************

	function insert_messages($data){

		$this->load->database();

		$this->db->insert('na_messages',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	//*************message  Area    Debjit   1.4.16**************************

	

	

	

	

	

	//*************Recomendation Area******************

	function insert_recomendation($data){

		$this->load->database();

		$this->db->insert('na_recomendation',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	//*************Recomendation Area******************

	

	//=============Debashish 29-03-2016================

	//*****job area******//

	

	function insert_job($data){

		$this->load->database();

		$this->db->insert('na_student_experience',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	

	//*****Extra curricullam area******//

	

	function insert_extra($data){

		$this->load->database();

		$this->db->insert('na_extracurricullam',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	

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

	//=============Debashish 29-03-2016================

	

	

	/* -  -----------------------------  Akash-1-04-2016 starts-----------------------------    -->       */

	

	function insert_eduinst_attend($data){

		$this->load->database();

		$this->db->insert('na_eduinstitute_attended',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	

	

	function insert_seminar_attend($data){

		$this->load->database();

		$this->db->insert('na_seminar_attend',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	

	

	/* -  -----------------------------  Akash-1-04-2016 ends-----------------------------    -->       */

	

	//=============Supratim 31-03-2016=================

		

		//**************Video Presentation Area****************

	//==============Insert Video Presentation==============

	function insert_video($data){

		$this->load->database();

	    $this->db->insert('na_video_presentation', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	//=============Insert Video Presentation===============

	//===============Show Video Presentation Data==========

	function get_video(){

		$sql="select * from na_video_presentation order by id desc";

		$query = $this->db->query($sql);

		return($query->num_rows()>0) ? $query->result(): NULL;

	}

	//==============Show Video Presentation Data===========

	//==============Edit Video Presentation================

	function edit_video($id,$data){

		$this->db->where('id',$id);

		$this->db->update('na_video_presentation',$data);

	}

	//==============Edit Video Presentation================

	//==============Edit Video Presentation================

	function edit_video_id($id,$data){

		$this->db->update('id',$id);

		$this->db->update('na_video_presentation',$data);

	}

	//==============Edit Video Presentation===============

	//==============Show Individual Video Presentation====

	function get_video_id($id){

		$this->db->select('*');

		$this->db->from('na_video_presentation');

		$this->db->where('id',$id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function delete_video($id){

		$this->db->where('id',$id);

		$this->db->delete('na_video_presentation');

	}

	

	

	//==============Show Individual Video Presentation====

	//**************Video Presentation Area****************



	//=============Supratim 31-03-2016=================

	

		//=============Supratim 01-04-2016=================

		

		//**************Audio Presentation Area****************

	//==============Insert Audio Presentation==============

	function insert_audio($data){

		$this->load->database();

	    $this->db->insert('na_audio_presentation', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	//=============Insert Audio Presentation===============

	//===============Show Audio Presentation Data==========

	function get_audio(){

		$sql="select * from na_audio_presentation order by id desc";

		$query = $this->db->query($sql);

		return($query->num_rows()>0) ? $query->result(): NULL;

	}

	//==============Show Audio Presentation Data===========

	//==============Edit Audio Presentation================

	function edit_audio($id,$data){

		$this->db->where('id',$id);

		$this->db->update('na_audio_presentation',$data);

	}

	//==============Edit Audio Presentation================

	//==============Edit Audio Presentation================

	function edit_audio_id($id,$data){

		$this->db->update('id',$id);

		$this->db->update('na_audio_presentation',$data);

	}

	//==============Edit Audio Presentation===============

	//==============Show Individual Audio Presentation====

	function get_audio_id($id){

		$this->db->select('*');

		$this->db->from('na_audio_presentation');

		$this->db->where('id',$id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function delete_audio($id){

		$this->db->where('id',$id);

		$this->db->delete('na_audio_presentation');

	}

	//==============Show Individual Audio Presentation====

	//**************Audio Presentation Area****************



	//=============Supratim 01-04-2016=================

	

	

	

	//=============Supratim 01-04-2016=================

		

		//**************Personal Recommendations Area****************

	//==============Insert Personal Recommendations==============

	function insert_perrec($data){

		$this->load->database();

	    $this->db->insert('na_personal_recommendations', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	//=============Insert Personal Recommendations===============

	//===============Show Personal Recommendations Data==========

	function get_perrec(){

		$sql="select * from na_personal_recommendations order by id desc";

		$query = $this->db->query($sql);

		return($query->num_rows()>0) ? $query->result(): NULL;

	}

	//==============Show Personal Recommendations Data===========

	//==============Edit Personal Recommendations================

	function edit_perrec($id,$data){

		$this->db->where('id',$id);

		$this->db->update('na_personal_recommendations',$data);

	}

	//==============Edit Personal Recommendations================

	//==============Edit Personal Recommendations================

	function edit_perrec_id($id,$data){

		$this->db->update('id',$id);

		$this->db->update('na_personal_recommendations',$data);

	}

	//==============Edit Personal Recommendations===============

	//==============Show Individual Personal Recommendations====

	function get_perrec_id($id){

		$this->db->select('*');

		$this->db->from('na_personal_recommendations');

		$this->db->where('id',$id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function delete_perrec($id){

		$this->db->where('id',$id);

		$this->db->delete('na_personal_recommendations');

	}

	//==============Show Individual Personal Recommendations====

	//**************Personal Recommendations Area****************



	//=============Supratim 01-04-2016=================

	

	

	

	//=============Supratim 01-04-2016=================

		

		//**************Reference Area****************

	//==============Insert Reference==============

	function insert_reference($data){

		$this->load->database();

	    $this->db->insert('na_reference', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	//=============Insert Reference===============

	//===============Show Reference Data==========

	function get_reference(){

		$sql="select * from na_reference order by id desc";

		$query = $this->db->query($sql);

		return($query->num_rows()>0) ? $query->result(): NULL;

	}

	//==============Show Reference Data===========

	//==============Edit Reference================

	function edit_reference($id,$data){

		$this->db->where('id',$id);

		$this->db->update('na_reference',$data);

	}

	//==============Edit Reference================

	//==============Edit Reference================

	function edit_reference_id($id,$data){

		$this->db->update('id',$id);

		$this->db->update('na_reference',$data);

	}

	//==============Edit Reference===============

	//==============Show Individual Reference====

	function get_reference_id($id){

		$this->db->select('*');

		$this->db->from('na_reference');

		$this->db->where('id',$id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function delete_reference($id){

		$this->db->where('id',$id);

		$this->db->delete('na_reference');

	}

	//==============Show Individual Reference====

	//**************Reference Area****************



	//=============Supratim 01-04-2016=================

	

	

	

	//=============Supratim 01-04-2016=================

		

		//**************Instructional Facilities Area****************

	//==============Insert Instructional Facilities==============

	function insert_insfac($data){

		$this->load->database();

	    $this->db->insert('na_ins_facilities', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	//=============Insert Instructional Facilities===============

	//===============Show Instructional Facilities Data==========

	function get_insfac(){

		$sql="select * from na_ins_facilities order by id desc";

		$query = $this->db->query($sql);

		return($query->num_rows()>0) ? $query->result(): NULL;

	}

	//==============Show Instructional Facilities Data===========

	//==============Edit Instructional Facilities================

	function edit_insfac($id,$data){

		$this->db->where('id',$id);

		$this->db->update('na_ins_facilities',$data);

	}

	//==============Edit Instructional Facilities================

	//==============Edit Instructional Facilities================

	function edit_insfac_id($id,$data){

		$this->db->update('id',$id);

		$this->db->update('na_ins_facilities',$data);

	}

	//==============Edit Instructional Facilities===============

	//==============Show Instructional Facilities====

	function get_insfac_id($id){

		$this->db->select('*');

		$this->db->from('na_ins_facilities');

		$this->db->where('id',$id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function delete_insfac($id){

		$this->db->where('id',$id);

		$this->db->delete('na_ins_facilities');

	}

	//==============Show Instructional Facilities====

	//**************Instructional Facilities Area****************



	//=============Supratim 01-04-2016=================

	

	

	

}

?>