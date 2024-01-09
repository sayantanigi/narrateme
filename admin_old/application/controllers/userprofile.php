<?php
class Userprofile extends CI_Controller {

		//============Constructor to call Model====================

		function __construct() {

			parent::__construct();

			$this->load->model('teacher_model');

			$this->load->model('institution_data_model');  //DEBJIT  6.4.16 institution_data_model Load Here  

		}

		//============Constructor to call Model====================

		function index(){

			if($this->session->userdata('is_logged_in')){ 

			$data['title'] = "User Profile";

			$this->load->view('header',$data);

			$this->load->helper(array('form'));

			$this->load->view('page_user_profile');

			$this->load->view('footer');

			}else{

               redirect('main');



            }

			

			 

		}

		

		public function is_logged_in(){

			header("cache-Control: no-store, no-cache, must-revalidate");

			header("cache-Control: post-check=0, pre-check=0", false);

			header("Pragma: no-cache");

			//header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

			$is_logged_in = $this->session->userdata('logged_in');

			

			if(!isset($is_logged_in) || $is_logged_in!==TRUE){

				redirect('main');

			}

    	}

		

  		

		//======================Logout==========================

		function show_user($id) {

			$data['title'] = "User Profile";

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('individual_model');

			$this->load->model('member_model');

			$this->load->model('student_record_model');

			$data['profile'] = "User Profile";
			

			//Transfering data to Model
			
			//*************Arup-6/4/16****************

			$queryaward_st = $this->student_record_model->show_individual_award_st($id);
			$data['eaward_st'] = $queryaward_st;

			$querydrug_st = $this->student_record_model->show_individual_drug_st($id);
			$data['edrug_st'] = $querydrug_st;
			

			$queryinst_st = $this->student_record_model->show_individual_institute_st($id);
			$data['einst_st'] = $queryinst_st;

			

			$queryrehab_st = $this->student_record_model->show_individual_rahab_st($id);
			$data['erehab_st'] = $queryrehab_st;

			

			$queryteacher_st = $this->student_record_model->show_individual_teacher_st($id);
			$data['eteacher_st'] = $queryteacher_st;

			

			$querycoach_st = $this->student_record_model->show_individual_coach_st($id);
			$data['ecoach_st'] = $querycoach_st;

			

			$queryrecomend_st = $this->student_record_model->show_individual_recomend_st($id);
			$data['erecom_st'] = $queryrecomend_st;

			

			$queryrjob_st = $this->student_record_model->show_individual_job_st($id);
			$data['erjob_st'] = $queryrjob_st;

			

			$queryrexyta_st = $this->student_record_model->show_extra_st($id);

			$data['erextra_st'] = $queryrexyta_st;

			

			$queryvideo_st = $this->student_record_model->show_individual_video_st($id);

			$data['ervideo_st'] = $queryvideo_st;

			

			$queryaudio_st = $this->student_record_model->show_individual_audio_st($id);

			$data['eraudio_st'] = $queryaudio_st;

			

			$queryperrec_st = $this->student_record_model->show_individual_perrec_st($id);

			$data['erperrec_st'] = $queryperrec_st;

			

			$queryreference_st = $this->student_record_model->show_individual_reference_st($id);

			$data['erreference_st'] = $queryreference_st;

			

			$queryinsfac_st = $this->student_record_model->show_individual_insfac_st($id);

			$data['erinsfac_st'] = $queryinsfac_st;

			

			$queryedu_st = $this->student_record_model->show_Edu_Instite_Attended_st($id);

			$data['eduintattend_st'] = $queryedu_st;

			

			$queryedu_st = $this->student_record_model->show_seminar_attend_st($id);

			$data['seminarattend_st'] = $queryedu_st;

			

			$query_academic_transcript_st = $this->student_record_model->show_academic_transcript_st($id);

			$data['eracademictranscript_st'] = $query_academic_transcript_st;

			

			$query_educational_records_st = $this->student_record_model->show_educational_records_st($id);

			$data['ereducationalrecords_st'] = $query_educational_records_st;

			

			$query_issuer_of_report_st= $this->student_record_model->show_issuer_of_report_st($id);

			$data['erissuerofreport_st'] = $query_issuer_of_report_st;

			

			$query_reports_st= $this->student_record_model->show_reports_st($id);

			$data['erreports_st'] = $query_reports_st;

			

			$query_messages_st= $this->student_record_model->show_messages_st($id);

			$data['ermessages_st'] = $query_messages_st;

			

			//**************Arup-6/4/16****************

			//============DEBJIT show Academic Transcripts   function call Start Date-6.4.16======================

			$queryinddata = $this->institution_data_model->show_academic_institution($id);

			$data['inscdmtrns'] = $queryinddata;

			
			//============DEBJIT show Academic Transcripts   function call End Date-6.4.16======================

	//============DEBJIT show accepted_substitute   function call Start Date-6.4.16======================

			$queryinddata = $this->institution_data_model->show_accepted_substitute($id);

			$data['insothedu'] = $queryinddata;
	

			//============DEBJIT show accepted_substitute   function call End Date-6.4.16======================	

			

				//============DEBJIT show Education Institution  function call Start Date-6.4.16======================


			$queryinddata = $this->institution_data_model->show_edu($id);

			$data['insedu'] = $queryinddata;

			//============DEBJIT show Education Institution  function call End Date-6.4.16======================

			

			//============DEBJIT show Instructor  function call Start Date-6.4.16======================

			
			$queryinddata = $this->institution_data_model->show_ins_teacher($id);

			$data['instr'] = $queryinddata;
	

			//============DEBJIT show Instructor  function call End Date-6.4.16======================

			//============DEBJIT show Schools/Divisions  function call Start Date-6.4.16======================

	
			$queryinddata = $this->institution_data_model->show_sch_div($id);

			$data['insch'] = $queryinddata;

			

			//============DEBJIT show Schools/Divisions  function call End Date-6.4.16======================

		
		//============DEBJIT show Schools/Divisions  function call Start Date-6.4.16======================

			

			$queryinddata = $this->institution_data_model->show_cur($id);

			$data['inscur'] = $queryinddata;
	

			//============DEBJIT show Schools/Divisions  function call End Date-6.4.16======================

			

			$query = $this->member_model->show_member($id);

			$data['ecms'] = $query;

			//===========Award List==============

			$queryaward = $this->individual_model->show_individual_award($id);

			$data['eaward'] = $queryaward;

			

			//===========Award List===============

			

			

			/* ---------------------------- ---------           akash-1-03-2016 starts ---------------     */

			

			//===========Educational Institutions Attended  List==============

			$queryedu = $this->individual_model->show_Edu_Instite_Attended($id);

			$data['eduintattend'] = $queryedu;

			//===========Educational Institutions Attended  List ends===============

			

			//=========== seminar_attend  List==============

			$queryedu = $this->individual_model->show_seminar_attend($id);

			$data['seminarattend'] = $queryedu;

			//===========seminar_attend  List ends===============

			

			

			/* ----------------------------              akash-1-03-2016 ends ---------------     */



			//===========Drug List================

			

			$querydrug = $this->individual_model->show_individual_drug($id);

			$data['edrug'] = $querydrug;

			

			

			//===========Drug List=================

			//===========Institute List============

			$queryinst = $this->individual_model->show_individual_institute($id);

			$data['einst'] = $queryinst;

			

			//===========Institute List============

			//===========Rehab List================

			$queryrehab = $this->individual_model->show_individual_rahab($id);

			$data['erehab'] = $queryrehab;

			//===========Rehab List================

			//===========Teacher List==============

			$queryteacher = $this->individual_model->show_individual_teacher($id);

			$data['eteacher'] = $queryteacher;

			//===========Teacher List==============

			

			//===========Coach List================

			$querycoach = $this->individual_model->show_individual_coach($id);

			$data['ecoach'] = $querycoach;

			//===========Coach List================

		
			//===========Debjit 1/4/2016========

			//===========academic_transcript List Show==================

			$query_academic_transcript = $this->individual_model->show_academic_transcript($id);

			$data['eracademictranscript'] = $query_academic_transcript;

			//===========academic_transcript List==================

			//===========DEbjit 1/4/2016========

			

			//===========Debjit 1/04/2016========

			//===========educational_recordst List Show==================

			$query_educational_records = $this->individual_model->show_educational_records($id);

			$data['ereducationalrecords'] = $query_educational_records;

			//===========educational_records List==================

			//===========DEbjit 1/4/2016========

		
			//===========Debjit 1/4/2016========

			//===========issuer_of_report List Show==================

			$query_issuer_of_report= $this->individual_model->show_issuer_of_report($id);

			$data['erissuerofreport'] = $query_issuer_of_report;

			//===========issuer_of_report List==================

			//===========DEbjit 1/4/2016========

			
	//===========Debjit 1/4/2016========

			//===========reports List Show==================

			$query_reports= $this->individual_model->show_reports($id);

			$data['erreports'] = $query_reports;

			//===========reports List==================

			//===========DEbjit 1/4/2016========

			

			//===========Debjit 1/4/2016========

			//===========reports List Show==================

			$query_messages= $this->individual_model->show_messages($id);

			$data['ermessages'] = $query_messages;

			//===========reports List==================

			//===========DEbjit 1/4/2016========
			//========================= Injuries 14-07-2016 =========================
			
			$queryrehab = $this->individual_model->show_individual_injuries($id);

			$data['einj'] = $queryrehab;

		  //========================= Injuries 14-07-2016 =========================
		  
		  //========================= Surgeries 14-07-2016 =========================
			
			$queryrehab = $this->individual_model->show_individual_surgeries($id);

			$data['esur'] = $queryrehab;

		  //========================= Surgeries 14-07-2016 =========================
		  
		  //===========Procedures List================

			$querypro = $this->individual_model->show_individual_procedures($id);

			$data['edpro'] = $querypro;

			//===========Procedures List=================
			
			//===========Treatment List================

			$querytrt = $this->individual_model->show_individual_treatment($id);

			$data['edtrt'] = $querytrt;

			//===========Treatment List=================
			
			//===========Recomendation List========

			$queryrecomend = $this->individual_model->show_individual_recomend($id);

			$data['erecom'] = $queryrecomend;

			//===========Recomendation List========

			

			//===========Job List==================

			$queryrjob = $this->individual_model->show_individual_job($id);

			$data['erjob'] = $queryrjob;

			//===========Job List==================

				

			//===========Supratim 31/03/2016========

			//===========Video Presentation List Show==================

			$queryvideo = $this->individual_model->show_individual_video($id);

			$data['ervideo'] = $queryvideo;

			//===========Video Presentation List==================

			//===========Supratim 31/03/2016========

			

			//===========Supratim 01/04/2016========

			//===========Video Presentation List Show==================

			$queryaudio = $this->individual_model->show_individual_audio($id);

			$data['eraudio'] = $queryaudio;

			//===========Video Presentation List==================

			//===========Supratim 01/04/2016========

			

			

			//===========Supratim 01/04/2016========

			//===========Personal Recommendations==================

			$queryperrec = $this->individual_model->show_individual_perrec($id);

			$data['erperrec'] = $queryperrec;

			//===========Personal Recommendations==================

			//===========Supratim 01/04/2016========

			//===========Supratim 01/04/2016========

			//===========References==================

			$queryreference = $this->individual_model->show_individual_reference($id);

			$data['erreference'] = $queryreference;

			//===========References==================

			//===========Supratim 01/04/2016========

			

			

			//===========Supratim 01/04/2016========

			//===========Instructional Facilities==================

			$queryinsfac = $this->individual_model->show_individual_insfac($id);

			$data['erinsfac'] = $queryinsfac;

			//===========Instructional Facilities==================

			//===========Supratim 01/04/2016========

			

			

			//===========Extra List==================

			$queryrexyta = $this->individual_model->show_extra($id);

			$data['erextra'] = $queryrexyta;

			//===========Extra List==================

			

			//===========Extra List==================

			$queryinddata = $this->individual_model->show_individual_data($id);

			$data['inddata'] = $queryinddata;


			//===========Extra List==================

			

			/* --------------------------- akash-4-4-16 starts   --------------------------------------    */

			
			$queryschooldata = $this->individual_model->show_school_data($id);

			$data['school'] = $queryschooldata;

			/*$queryst = $this->student__record_model->show_st_individual_data($id);

			$data['st_data'] = $queryst;*/

			$querycoursedata = $this->individual_model->show_course_data($id);

			$data['course'] = $querycoursedata;

			
			$querylecturedata = $this->individual_model->show_lecture_data($id);

			$data['lecture'] = $querylecturedata;

			
			$queryteacherdata = $this->individual_model->show_teacher_data($id);

			$data['teacher'] = $queryteacherdata;

			
			$querydivisiondata = $this->individual_model->show_division_data($id);

			$data['division'] = $querydivisiondata;
			
			$querypastdata = $this->individual_model->show_past_data($id);

			$data['pastlec'] = $querypastdata;
			
			
			$querycurriculumdata = $this->individual_model->show_school_curiculam($id);

			$data['curricullum'] = $querycurriculumdata;
			
			
			$queryedu_insdata = $this->individual_model->show_school_edu_ins($id);

			$data['edu_ins'] = $queryedu_insdata;

			

			/* --------------------------- akash-4-4-16 ends   --------------------------------------    */

			

			$this->load->view('header',$data);

			$this->load->view('page_user_profile', $data);

			$this->load->view('footer');

		}

		//======================Logout==========================

		

		

		

		

		

		//======================Profile Image===================

		function edit_avatar(){

			//====================Post Data=====================

			 $id = $this->input->post('id');

			if($_FILES["userimage"]["name"]!='') {

				$imgname = $_FILES["userimage"]["name"];

				$this->db->where('id',$id);

				$this->db->select('userimage');

				$result=$this->db->get('bl_banner');

				$row = $result->row();

				//print_r($row);

				$path = './avatar/'.$row->banner_image;

				unlink($path);

				$config['upload_path'] = './avatar/';

					

				$config['allowed_types'] = 'jpg|jpeg|png|gif';

			

				$config['file_name'] = $imgname;

			

				$this->load->library('upload',$config);

				

				if (!$this->upload->do_upload("userimage")){

					$error = array('error' => $this->upload->display_errors());

				}else{

					$upload_data = $this->upload->data();

				}

				

			}else {

				$imgname = $this->input->post('oldimg');

			}

			$datalist = array(

							'userImage' => $imgname

			);

			//====================Post Data===================

			$data['title'] = "Avatar Edit";

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('banner_model');

			//Transfering data to Model

			$query = $this->member_model->edit_banner($id,$datalist);

			$data1['message'] = 'Data Updated Successfully';

			redirect('banner/successupdate');

		}

		//======================Profile Image===================

}



?>
