<?php

class Student_record extends CI_Controller {

		//============Constructor to call Model====================

		function __construct() {

			parent::__construct();

			$this->load->model('student_record_model');

		}

		//============Constructor to call Model====================

		function index(){

			if($this->session->userdata('is_logged_in')){ 

			$data['title'] = "Add Student Data";

			$this->load->view('header',$data);

			$this->load->helper(array('form'));

			$this->load->view('individualadd_view');

			$this->load->view('footer');

			}else{

               redirect('login');



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

	

	/* ======================= akash-4-4-16 starts============ */

		/* =======================Insert student-Individual Data starts============ */

		function add_st_individual(){

			//echo "okokookokok";

			//exit();

			

/*			$this->form_validation->set_rules('gender', 'Gender', 'required');

			

			$this->form_validation->set_rules('conference_id', 'Conference Id', 'required|min_length[1]');

			

			$this->form_validation->set_rules('social_seq_no', 'Social Security Number', 'required|min_length[1]');*/

			

			

			/*if ($this->form_validation->run() == FALSE) {*/

			 $data['title'] = "Add Student Data";

			//exit();

			$this->load->view('header',$data);

			$this->load->view('page_user_profile');

			$this->load->view('footer');

			/*}else {*/

			//Setting values for tabel columns

			$data = array(

			'ind_id' => $this->input->post('ind_id'),

			'gender' => $this->input->post('gender'),

			'conference_id' => $this->input->post('conference_id'),

			'social_seq_no' => $this->input->post('social_seq_no'),

			'tel_no' => $this->input->post('tel_no'),

			'mobile_no' => $this->input->post('mobile_no'),

			'ip_address' => $this->input->post('ip_address'),

			'description' => $this->input->post('description'),

			'dob' => date('Y-m-d',strtotime($this->input->post('dob'))),

			'status' => 1

			);

			

			//Transfering data to Model

			$this->student_record_model->insert_st_individual($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			/*}*/

		}

		

		/* =======================Insert student-Individual Data ends============ */

		

		/* =======================Insert student-drug Data starts============ */

		

		function add_st_drug(){

			if($this->session->userdata('is_logged_in')){ 

			

			

			//Validating Name Field

			$this->form_validation->set_rules('drug_name', 'Drug Name', 'required|min_length[1]|max_length[50]');

			

			//Validating Rehab Date Field

			$this->form_validation->set_rules('drug_date', 'Drug Date', 'required|min_length[1]|max_length[12]');

			

			//Validating Outcome Field

			$this->form_validation->set_rules('outcome', 'Outcome', 'required|min_length[1]|max_length[50]');

			

			if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add Drug";

				$this->load->view('header',$data);

				$this->load->view('drugadd_view');

				$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

				'drug_name' => mysql_real_escape_string(stripcslashes($this->input->post('drug_name'))),

				'drug_date' => date('y-m-d',strtotime($this->input->post('drug_date'))),

				'reason' => mysql_real_escape_string(stripcslashes($this->input->post('reason'))),

				'outcome' => mysql_real_escape_string(stripcslashes($this->input->post('outcome'))),

				'ind_id' =>$this->input->post('ind_id'), 

				'status' => 1

			);

			//print_r($data);

			//exit();

			

			//Transfering data to Model

			$this->student_record_model->insert_st_drug($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			}

		

			}else{

				redirect('main');

			}

		}

			/* =======================Insert student-drug Data ends============ */

			

			/* =======================Insert student-award Data starts============ */		

			function add_st_award(){

			if($this->session->userdata('is_logged_in')){ 

			

			

			//Validating Name Field

			$this->form_validation->set_rules('award_name', 'Award Name', 'required|min_length[1]|max_length[50]');

			

			//Validating Rehab Date Field

			$this->form_validation->set_rules('award_date', 'Award Date', 'required|min_length[1]|max_length[12]');

			

			//Validating Outcome Field

			//$this->form_validation->set_rules('outcome', 'Outcome', 'required|min_length[1]|max_length[50]');

			

			if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add Award";

				$this->load->view('header',$data);

				$this->load->view('individualawardadd_view');

				$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

				'award_name' => mysql_real_escape_string(stripcslashes($this->input->post('award_name'))),

				'award_date' => date('y-m-d',strtotime($this->input->post('award_date'))),

				'award_description' => mysql_real_escape_string(stripcslashes($this->input->post('award_description'))),

				'ind_id' =>$this->input->post('ind_id'), 

				'status' => 1

			);

			//print_r($data);

			//exit();

			

			//Transfering data to Model

			$this->student_record_model->insert_st_award($data);

			//$data1['message'] = 'Data Inserted Successfully';

			//redirect('individual/view_individual/aws');

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			}

		

			}else{

				redirect('main');

			}

		}

			/* =======================Insert student-award Data ends============ */

			

			/* =======================Insert student-award Data starts=========================== ======= */

			

			function add_st_rehab(){

			if($this->session->userdata('is_logged_in')){ 

			

			

			//Validating Name Field

			$this->form_validation->set_rules('rehab_name', 'Rehabiliation Name', 'required|min_length[1]|max_length[50]');

			

			//Validating Rehab Date Field

			$this->form_validation->set_rules('rehab_date', 'Rehabiliation Date', 'required|min_length[1]|max_length[12]');

			

			//Validating Outcome Field

			//$this->form_validation->set_rules('outcome', 'Outcome', 'required|min_length[1]|max_length[50]');

			

			if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add Rehabiliation";

				$this->load->view('header',$data);

				$this->load->view('rehabadd_view');

				$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

				'rehab_name' => mysql_real_escape_string(stripcslashes($this->input->post('rehab_name'))),

				'rehab_date' => date('y-m-d',strtotime($this->input->post('rehab_date'))),

				'description' => mysql_real_escape_string(stripcslashes($this->input->post('description'))),

				'outcome' => mysql_real_escape_string(stripcslashes($this->input->post('outcome'))),

				'ind_id' =>$this->input->post('ind_id'), 

				'status' => 1

			);

			//print_r($data);

			//exit();

			

			//Transfering data to Model

			$this->student_record_model->insert_st_rahab($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			}

		

			}else{

				redirect('main');

			}

		}

		/* =======================Insert student-award Data ends=========================== ======= */

		

		function add_st_institute(){

			if($this->session->userdata('is_logged_in')){ 

			

			//Validating Name Field

			$this->form_validation->set_rules('institute_name', 'Institute Name', 'required|min_length[1]|max_length[50]');

			

			//Validating Outcome Field

			//$this->form_validation->set_rules('outcome', 'Outcome', 'required|min_length[1]|max_length[50]');

			

			if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add Educational Institute";

				$this->load->view('header',$data);

				$this->load->view('instituteadd_view');

				$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

				'institute_name' => mysql_real_escape_string(stripcslashes($this->input->post('institute_name'))),

				'school_bulletin' => mysql_real_escape_string(stripcslashes($this->input->post('school_bulletin'))),

				'description' => mysql_real_escape_string(stripcslashes($this->input->post('description'))),

				'instructor' => mysql_real_escape_string(stripcslashes($this->input->post('instructor'))),

				'address' => mysql_real_escape_string(stripcslashes($this->input->post('address'))),

				'tel_no' => mysql_real_escape_string(stripcslashes($this->input->post('tel_no'))),

				'email' => mysql_real_escape_string(stripcslashes($this->input->post('email'))),

				'sms_no' => mysql_real_escape_string(stripcslashes($this->input->post('sms_no'))),

				'ip_address' => mysql_real_escape_string(stripcslashes($this->input->post('ip_address'))),

				'website' => mysql_real_escape_string(stripcslashes($this->input->post('website'))),

				'domain_name' => mysql_real_escape_string(stripcslashes($this->input->post('domain_name'))),

				'url' => mysql_real_escape_string(stripcslashes($this->input->post('url'))),

				'learning_portal' => mysql_real_escape_string(stripcslashes($this->input->post('learning_portal'))),

				'schools' => mysql_real_escape_string(stripcslashes($this->input->post('schools'))),

				'ind_id' =>$this->input->post('ind_id'), 

				'status' => 1

			);

			//print_r($data);

			//exit();

			

			//Transfering data to Model

			$this->student_record_model->insert_st_institute($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			}

		

			}else{

				redirect('main');

			}

		}

		/* ======================Insert student-Institute Area ends ===========================  */	

		

		

		/* ======================Insert student-teacher Area starts ===========================  */	

		

		function add_st_teacher(){

			if($this->session->userdata('is_logged_in')){ 

			

			//Validating Name Field

			$this->form_validation->set_rules('teacher_name', 'Teacher Name', 'required|min_length[1]|max_length[50]');

			

			//Validating Outcome Field

			$this->form_validation->set_rules('email', 'Email', 'required|min_length[1]|max_length[50]');

			

			if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add Teacher";

				$this->load->view('header',$data);

				$this->load->view('teacheradd_view');

				$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

				'teacher_name' => mysql_real_escape_string(stripcslashes($this->input->post('teacher_name'))),

				'phone' => mysql_real_escape_string(stripcslashes($this->input->post('phone'))),

				'email' => mysql_real_escape_string(stripcslashes($this->input->post('email'))),

				'learning_portal' => mysql_real_escape_string(stripcslashes($this->input->post('learning_portal'))),

				'course' => mysql_real_escape_string(stripcslashes($this->input->post('course'))),

				'academic_program' => mysql_real_escape_string(stripcslashes($this->input->post('academic_program'))),

				'ind_id' =>$this->input->post('ind_id'), 

				'status' => 1

			);

			//print_r($data);

			//exit();

			

			//Transfering data to Model

			$this->student_record_model->insert_st_teacher($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			}

		

			}else{

				redirect('main');

			}

		}

		/* ======================Insert student-teacher Area ends ===========================  */

		

		/* ======================Insert student-coach Area starts ===========================  */

		

		function add_st_coach(){

			if($this->session->userdata('is_logged_in')){ 

			

			//Validating Name Field

			$this->form_validation->set_rules('coach_name', 'Coach Name', 'required|min_length[1]|max_length[50]');

			

			//Validating Outcome Field

			$this->form_validation->set_rules('email', 'Email', 'required|min_length[1]|max_length[50]');

			

			if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add Coach";

				$this->load->view('header',$data);

				$this->load->view('coachadd_view');

				$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

				'coach_name' => mysql_real_escape_string(stripcslashes($this->input->post('coach_name'))),

				'description' => mysql_real_escape_string(stripcslashes($this->input->post('description'))),

				'sample' => mysql_real_escape_string(stripcslashes($this->input->post('sample'))),

				'phone' => mysql_real_escape_string(stripcslashes($this->input->post('phone'))),

				'email' => mysql_real_escape_string(stripcslashes($this->input->post('email'))),

				'ind_id' =>$this->input->post('ind_id'), 

				'status' => 1

			);

			//print_r($data);

			//exit();

			

			//Transfering data to Model

			$this->student_record_model->insert_st_coach($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			}

		

			}else{

				redirect('main');

			}

		}

		/* ======================Insert student-coach Area ends ===========================  */

		

	/* ======================Insert student-facilities Area starts ===========================  */

		

		function add_insfac_view(){

				if($this->session->userdata('is_logged_in')){ 

					$data['title'] = "Add Instructional Facilities";

					$this->load->view('header',$data);

					$this->load->view('insfacadd_view');

					$this->load->view('footer');

				}else{

					redirect('main');

				}

			

		}

		function add_st_insfac(){

			if($this->session->userdata('is_logged_in')){ 

			

			

			//Validating Description Field

			//$this->form_validation->set_rules('description ', 'Description ', 'required|min_length[1]|max_length[50]');

			

			//Validating Video Date Field

			//$this->form_validation->set_rules('video_date ', 'Video Date ', 'required|min_length[1]|max_length[12]');

			

			//Validating Outcome Field

			//$this->form_validation->set_rules('outcome', 'Outcome', 'required|min_length[1]|max_length[50]');

			

			/*if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add Video Presentation";

				$this->load->view('header',$data);

				$this->load->view('videoadd_view');

				$this->load->view('footer');

			}else {*/

			//Setting values for tabel columns

			$data = array(

				'datesofattendence' => date('y-m-d',strtotime($this->input->post('datesofattendence'))),

				'prog_enrolled' => mysql_real_escape_string(stripcslashes($this->input->post('prog_enrolled'))),

				'classes_taken' => mysql_real_escape_string(stripcslashes($this->input->post('classes_taken'))),

				'achievements' => mysql_real_escape_string(stripcslashes($this->input->post('achievements'))),

				'current_schedule' => date('y-m-d',strtotime($this->input->post('current_schedule'))),

				'awards_conferred' => mysql_real_escape_string(stripcslashes($this->input->post('awards_conferred'))),

				'ind_id' =>$this->input->post('ind_id'), 

				'status' => 1

			);

			//print_r($data);

			//exit();

			

			//Transfering data to Model

			$this->student_record_model->insert_st_insfac($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			/*}*/

		

			}else{

				redirect('main');

			}

		}

			

		/* ======================= akash-4-4-16 ends============ */

		

		

		//=====================ARUP 4-4-16================================

		function add_recomendation_view(){

				if($this->session->userdata('is_logged_in')){ 

					$data['title'] = "Add Recomendation";

					$this->load->view('header',$data);

					$this->load->view('recomendationadd_view');

					$this->load->view('footer');

				}else{

					redirect('main');

				}

			

		}

		

		function add_recomendation(){

			if($this->session->userdata('is_logged_in')){ 

			

			//Validating Name Field

			$this->form_validation->set_rules('recomendation_person', 'Recomendation Person', 'required|min_length[1]|max_length[50]');

			

			//Validating Outcome Field

			//$this->form_validation->set_rules('email', 'Email', 'required|min_length[1]|max_length[50]');

			

			if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add Recomendation";

				$this->load->view('header',$data);

				$this->load->view('recomendationadd_view');

				$this->load->view('recomendationadd_view_st');

				$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

				'recomendation_person' => mysql_real_escape_string(stripcslashes($this->input->post('recomendation_person'))),

				'recomendation' => mysql_real_escape_string(stripcslashes($this->input->post('recomendation'))),

				'rec_video_link' => mysql_real_escape_string(stripcslashes($this->input->post('rec_video_link'))),

				'ind_id' =>$this->input->post('ind_id'), 

				'status' => 1

			);

			//print_r($data);

			//exit();

			

			//Transfering data to Model

			$this->student_record_model->insert_recomendation($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			}

		

			}else{

				redirect('main');

			}

		}

		//=====================ARUP 4-4-16================================

		

		//add job view//

		

		function add_job_view(){

				if($this->session->userdata('is_logged_in')){ 

					$data['title'] = "Add job";

					$this->load->view('header',$data);

					$this->load->view('addjob_view');

					$this->load->view('addjob_view_st');

					$this->load->view('footer');

				}else{

					redirect('main');

				}

			

		}

		

		//add extra view//

		//=====================ARUP 4-4-16================================

			function add_extra_view(){

				if($this->session->userdata('is_logged_in')){ 

					$data['title'] = "Add Extra";

					$this->load->view('header',$data);

					$this->load->view('addextra_view');

					$this->load->view('addextra_view_st');

					$this->load->view('footer');

				}else{

					redirect('main');

				}

			

		}

		//=====================ARUP 4-4-16================================

		//=====================ARUP 4-4-16================================

		//add seminar view//

		function add_seminar_view(){

				if($this->session->userdata('is_logged_in')){ 

					$data['title'] = "Add seminar";

					$this->load->view('header',$data);

					$this->load->view('addseminar_view');

					$this->load->view('footer');

				}else{

					redirect('main');

				}

			

		}

		

		

		//add seminar//

		

		

		function addseminar(){

			if($this->session->userdata('is_logged_in')){ 

			

			//Validating Name Field

			$this->form_validation->set_rules('seminar_name', 'employer_name Person', 'required|min_length[1]|max_length[50]');

			

			//Validating Outcome Field

			//$this->form_validation->set_rules('email', 'Email', 'required|min_length[1]|max_length[50]');

			

			if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add seminar";

				$this->load->view('header',$data);

				$this->load->view('addseminar_view');

				$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

				'Teacher_id' =>$this->input->post('Teacher_id'), 

				'name' => mysql_real_escape_string(stripcslashes($this->input->post('name'))),

				'from_date' => date('y-m-d',strtotime($this->input->post('from_date'))),

				'Seminar Schedule' =>date('y-m-d',strtotime($this->input->post('Seminar Schedule'))), 

				'seminar_description' => mysql_real_escape_string(stripcslashes($this->input->post('seminar_description'))),			

				'status' => 1

			);

			//print_r($data);

			//exit();

			

			//Transfering data to Model

			$this->student_record_model->insert_seminar($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			}

		

			}else{

				redirect('main');

			}

		}

		

		//=====================ARUP 4-4-16================================

		

		

	//Add job//

		//=====================ARUP 4-4-16================================

		function addjob(){

			if($this->session->userdata('is_logged_in')){ 

			

			//Validating Name Field

			$this->form_validation->set_rules('employer_name', 'employer_name Person', 'required|min_length[1]|max_length[50]');

			

			//Validating Outcome Field

			//$this->form_validation->set_rules('email', 'Email', 'required|min_length[1]|max_length[50]');

			

			if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add job";

				$this->load->view('header',$data);

				$this->load->view('addjob_view');

				$this->load->view('addjob_view_st');

				$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

				'ind_id' =>$this->input->post('ind_id'), 

				'employer_name' => mysql_real_escape_string(stripcslashes($this->input->post('employer_name'))),

				'from_date' => date('y-m-d',strtotime($this->input->post('from_date'))),

				'to_date' =>date('y-m-d',strtotime($this->input->post('to_date'))), 

				'position' => mysql_real_escape_string(stripcslashes($this->input->post('position'))),

				'job_description' => mysql_real_escape_string(stripcslashes($this->input->post('job_description'))),

				

				'status' => 1

			);

			//print_r($data);

			//exit();

			

			//Transfering data to Model

			$this->student_record_model->insert_job($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			}

		

			}else{

				redirect('main');

			}

		}

		

		//=====================ARUP 4-4-16================================

		//=====================ARUP 4-4-16================================

		

		function addextra(){

			if($this->session->userdata('is_logged_in')){ 

			

			//Validating Name Field

			$this->form_validation->set_rules('activity_name', 'activity_name', 'required|min_length[1]|max_length[50]');

			

			//Validating Outcome Field

			//$this->form_validation->set_rules('email', 'Email', 'required|min_length[1]|max_length[50]');

			

			if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add Extra";

				$this->load->view('header',$data);

				$this->load->view('addextra_view');

				$this->load->view('addextra_view_st');

				$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

				'ind_id' =>$this->input->post('ind_id'), 

				'activity_name' => mysql_real_escape_string(stripcslashes($this->input->post('activity_name'))),

				'from_date' => date('y-m-d',strtotime($this->input->post('from_date'))),

				'activity_description' => mysql_real_escape_string(stripcslashes($this->input->post('activity_description'))),				

				'status' => 1

			);

			//print_r($data);

			//exit();

			

			//Transfering data to Model

			$this->student_record_model->insert_extra($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			}

		

			}else{

				redirect('main');

			}

		}

		//=====================ARUP 4-4-16================================

		//=============Debashish 29-03-2016==============================

		

		

		

		//==============Supratim 31-03-2016==============================

			//======**************Video Area************=============

		//=====================ARUP 4-4-16================================

		function add_video_view(){

				if($this->session->userdata('is_logged_in')){ 

					$data['title'] = "Add Video Presentation";

					$this->load->view('header',$data);

					$this->load->view('videoadd_view');

					$this->load->view('videoadd_view_st');

					$this->load->view('footer');

				}else{

					redirect('main');

				}

			

		}

		function add_video(){

			if($this->session->userdata('is_logged_in')){ 

			

			

			

			//Validating Description Field

			//$this->form_validation->set_rules('description ', 'Description ', 'required|min_length[1]|max_length[50]');

			

			//Validating Video Date Field

			//$this->form_validation->set_rules('video_date ', 'Video Date ', 'required|min_length[1]|max_length[12]');

			

			//Validating Outcome Field

			//$this->form_validation->set_rules('outcome', 'Outcome', 'required|min_length[1]|max_length[50]');

			

			/*if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add Video Presentation";

				$this->load->view('header',$data);

				$this->load->view('videoadd_view');

				$this->load->view('footer');

			}else {*/

			//Setting values for tabel columns

			$data = array(

				'video_date' => date('y-m-d',strtotime($this->input->post('video_date'))),

				'description' => mysql_real_escape_string(stripcslashes($this->input->post('description'))),

				'link_rec_video' => mysql_real_escape_string(stripcslashes($this->input->post('link_rec_video'))),

				'ip_live_cam' => mysql_real_escape_string(stripcslashes($this->input->post('ip_live_cam'))),

				'comments' => mysql_real_escape_string(stripcslashes($this->input->post('comments'))),

				//'id' =>$this->input->post('ind_id'), 

				'status' => 1

			);

			//print_r($data);

			//exit();

			

			//Transfering data to Model

			$this->student_record_model->insert_video($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			//}

		

			}else{

				redirect('main');

			}

		}

		

	//=====================ARUP 4-4-16================================

	

	//=====================ARUP 4-4-16================================	

		

		

		function add_academic_transcript_view(){

				if($this->session->userdata('is_logged_in')){ 

					$data['title'] = "Academic Transcript ";

					$this->load->view('header',$data);

					$this->load->view('userprofile/show_user/');

					$this->load->view('footer');

				}else{

					redirect('main');

				}

			

		}

		function add_academic_transcript(){

			if($this->session->userdata('is_logged_in')){ 

			

			//Validating Name Field

			$this->form_validation->set_rules('grades', 'Grades', 'required|min_length[1]|max_length[50]');

			

			

			

			if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add Academic Transcript";

				$this->load->view('header',$data);

				$this->load->view('userprofile/show_user/');

				$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

				'grades' => mysql_real_escape_string(stripcslashes($this->input->post('grades'))),

				'notes' => mysql_real_escape_string(stripcslashes($this->input->post('notes'))),

				'comments' => mysql_real_escape_string(stripcslashes($this->input->post('comments'))),

				'messages' => mysql_real_escape_string(stripcslashes($this->input->post('messages'))),

		        'ind_id' =>$this->input->post('ind_id'), 

				'status' => 1

			);

			//print_r($data);

			//exit();

			

			//Transfering data to Model

			$this->student_record_model->insert_academic_transcript($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			}

		

			}else{

				redirect('main');

			}

		}

		

		//=====================ARUP 4-4-16================================

		//=====================ARUP 4-4-16================================

		function add_educational_records_view(){

				if($this->session->userdata('is_logged_in')){ 

					$data['title'] = "Academic Transcript ";

					$this->load->view('header',$data);

					$this->load->view('userprofile/show_user/');

					$this->load->view('footer');

				}else{

					redirect('main');

				}

			

		}

		function add_educational_records(){

			if($this->session->userdata('is_logged_in')){ 

			

			//Validating Name Field

			$this->form_validation->set_rules('grades', 'Grades', 'required|min_length[1]|max_length[50]');

			

			

			

			if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add Educational Records";

				$this->load->view('header',$data);

				$this->load->view('userprofile/show_user/');

				$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

				'grades' => mysql_real_escape_string(stripcslashes($this->input->post('grades'))),

				'notes' => mysql_real_escape_string(stripcslashes($this->input->post('notes'))),

				'comments' => mysql_real_escape_string(stripcslashes($this->input->post('comments'))),

				'messages' => mysql_real_escape_string(stripcslashes($this->input->post('messages'))),

		        'ind_id' =>$this->input->post('ind_id'), 

				'status' => 1

			);

			//print_r($data);

			//exit();

			

			//Transfering data to Model

			$this->student_record_model->insert_educational_records($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			}

		

			}else{

				redirect('main');

			}

		}

		

		//=====================ARUP 4-4-16================================

		

		//=====================ARUP 4-4-16================================

		

		function add_issuer_of_report_view(){

				if($this->session->userdata('is_logged_in')){ 

					$data['title'] = "Issuer of Report  ";

					$this->load->view('header',$data);

					$this->load->view('userprofile/show_user/');

					$this->load->view('footer');

				}else{

					redirect('main');

				}

			

		}

		function add_issuer_of_report(){

			if($this->session->userdata('is_logged_in')){ 

			

			//Validating Name Field

			$this->form_validation->set_rules('name', 'Name', 'required|min_length[1]|max_length[50]');

			

			

			

			if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add Issuer of Report ";

				$this->load->view('header',$data);

				$this->load->view('userprofile/show_user/');

				$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

				'name' => mysql_real_escape_string(stripcslashes($this->input->post('name'))),

				'tel_no' => mysql_real_escape_string(stripcslashes($this->input->post('tel_no'))),

				'website' => mysql_real_escape_string(stripcslashes($this->input->post('website'))),

				'url' => mysql_real_escape_string(stripcslashes($this->input->post('url'))),

				'description' => mysql_real_escape_string(stripcslashes($this->input->post('description'))),

		        'ind_id' =>$this->input->post('ind_id'), 

				'status' => 1

			);

			//print_r($data);

			//exit();

			

			//Transfering data to Model

			$this->student_record_model->insert_issuer_of_report ($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			}

		

			}else{

				redirect('main');

			}

		}

		

		//***************Arup-6/4/16********************

		function add_reports(){

			if($this->session->userdata('is_logged_in')){ 

			

			//Validating Name Field

			$this->form_validation->set_rules('description', 'Description', 'required|min_length[1]|max_length[50]');

			

			

			

			if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add  Reports ";

				$this->load->view('header',$data);

				$this->load->view('userprofile/show_user');

				$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

				'report_date' => date('y-m-d',strtotime($this->input->post('report_date'))),

		        'description' => mysql_real_escape_string(stripcslashes($this->input->post('description'))),

		        'ind_id' =>$this->input->post('ind_id'), 

				'status' => 1

			);

			//print_r($data);

			//exit();

			

			//Transfering data to Model

			$this->student_record_model->insert_reports($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			}

		

			}else{

				redirect('main');

			}

		}

		

		

		function add_messages(){

			if($this->session->userdata('is_logged_in')){ 

			

			//Validating Name Field

			$this->form_validation->set_rules('description', 'Description', 'required|min_length[1]|max_length[50]');

			

			

			

			if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add  messages ";

				$this->load->view('header',$data);

				$this->load->view('userprofile/show_user');

				$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

				'report_date' => date('y-m-d',strtotime($this->input->post('report_date'))),

		        'description' => mysql_real_escape_string(stripcslashes($this->input->post('description'))),

		        'ind_id' =>$this->input->post('ind_id'), 

				'status' => 1

			);

			//print_r($data);

			//exit();

			

			//Transfering data to Model

			$this->student_record_model->insert_messages($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			}

		

			}else{

				redirect('main');

			}

		}

		

		//***************Arup-6/4/16********************

		//=====================ARUP 4-4-16================================

		//=====================ARUP 4-4-16================================

		

		function add_seminar_attend(){

			if($this->session->userdata('is_logged_in')){ 

			

			

			//Setting values for tabel columns

			$data = array(

				'name' => mysql_real_escape_string(stripcslashes($this->input->post('semi_name'))),

				'semi_schedule' => date('y-m-d',strtotime($this->input->post('semi_schedule'))),

				'Description' => mysql_real_escape_string(stripcslashes($this->input->post('description'))),

				'entry_date' =>  date('y-m-d',strtotime(date())),

				'ind_id' =>$this->input->post('ind_id'), 

				'status' => 1

			);

			//print_r($data);

			//exit();

			

			//Transfering data to Model

			$this->student_record_model->insert_seminar_attend($data);

			$data1['message'] = 'Seminar Updated ';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			

		

			}else{

				redirect('main');

			}

		}

		

		

		

		function eduinst_attend(){

			if($this->session->userdata('is_logged_in')){ 

			

			

			//Setting values for tabel columns

			$data = array(

				'program_enroll' => mysql_real_escape_string(stripcslashes($this->input->post('program_enroll'))),

				'attend_date' => date('y-m-d',strtotime($this->input->post('attend_date'))),

				'course_taken' => mysql_real_escape_string(stripcslashes($this->input->post('course_taken'))),

				'Grades' => mysql_real_escape_string(stripcslashes($this->input->post('Grades'))),

				'course_enrolled' => mysql_real_escape_string(stripcslashes($this->input->post('course_enrolled'))),

				'ind_id' =>$this->input->post('ind_id'), 

				'status' => 1

			);

			//print_r($data);

			//exit();

			

			//Transfering data to Model

			$this->student_record_model->insert_eduinst_attend($data);

			$data1['message'] = 'Educational Institutions Updated ';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			

		

			}else{

				redirect('main');

			}

		}

		//=====================ARUP 4-4-16================================

		

		//==============Supratim 04-04-2016==============================

			//======**************REFERENCE Area************=============

		

		function add_reference_view(){

				if($this->session->userdata('is_logged_in')){ 

					$data['title'] = "Add Reference";

					$this->load->view('header',$data);

					$this->load->view('referenceadd_view');

					$this->load->view('footer');

				}else{

					redirect('main');

				}

			

		}

		function add_reference(){

			if($this->session->userdata('is_logged_in')){ 

			

			

			//Validating Description Field

			//$this->form_validation->set_rules('description ', 'Description ', 'required|min_length[1]|max_length[50]');

			

			//Validating Video Date Field

			//$this->form_validation->set_rules('video_date ', 'Video Date ', 'required|min_length[1]|max_length[12]');

			

			//Validating Outcome Field

			//$this->form_validation->set_rules('outcome', 'Outcome', 'required|min_length[1]|max_length[50]');

			

			/*if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add Video Presentation";

				$this->load->view('header',$data);

				$this->load->view('videoadd_view');

				$this->load->view('footer');

			}else {*/

			//Setting values for tabel columns

			$data = array(

				'dateofreference' => date('y-m-d',strtotime($this->input->post('dateofreference'))),

				'ref_name' => mysql_real_escape_string(stripcslashes($this->input->post('ref_name'))),

				'ref_position' => mysql_real_escape_string(stripcslashes($this->input->post('ref_position'))),

				'ref_phone' => mysql_real_escape_string(stripcslashes($this->input->post('ref_phone'))),

				'ref_emailaddress' => mysql_real_escape_string(stripcslashes($this->input->post('ref_emailaddress'))),

				'ref_relationship' => mysql_real_escape_string(stripcslashes($this->input->post('ref_relationship'))),

				'ref_recominfo' => mysql_real_escape_string(stripcslashes($this->input->post('ref_recominfo'))),

				'ref_recomvideo' => mysql_real_escape_string(stripcslashes($this->input->post('ref_recomvideo'))),

				'ind_id' =>$this->input->post('ind_id'), 

				'status' => 1

			);

			//print_r($data);

			//exit();

			

			//Transfering data to Model

			$this->load->model('student_record_model');

			$this->student_record_model->insert_reference($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			/*}*/

		

			}else{

				redirect('main');

			}

		}

		

		

		function view_reference(){

			if($this->session->userdata('is_logged_in')){ 

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('student_record_model');

			//Transfering data to Model

			$query = $this->student_record_model->get_reference();

			$data['ecms'] = $query;

			$data['title'] = "Reference List";

			$this->load->view('header',$data);

			$this->load->view('showreference',$data);

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

		

		//=======================Show  by Id=================

		function show_reference_id($id) {

			if($this->session->userdata('is_logged_in')){ 

			$data['title'] = "Reference Edit";

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('student_record_model');

			//Transfering data to Model

			$query = $this->student_record_model->get_reference_id($id);

			$data['ecms'] = $query;

			$this->load->view('header',$data);

			$this->load->view('referenceedit', $data);

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

   		//======================Show  by Id=================

  	 	//======================Update  ====================

		function edit_reference(){

			if($this->session->userdata('is_logged_in')){ 

			

		//======================Post Data=====================

			$datalist = array(

			'dateofreference' => date('Y-m-d',strtotime($this->input->post('dateofreference'))),

			'ref_name' => mysql_real_escape_string(stripcslashes($this->input->post('ref_name'))),

			'ref_position' => mysql_real_escape_string(stripcslashes($this->input->post('ref_phone'))),

			'ref_emailaddress' => mysql_real_escape_string(stripcslashes($this->input->post('ref_emailaddress'))),

			'ref_relationship' => mysql_real_escape_string(stripcslashes($this->input->post('ref_relationship'))),

			'ref_recominfo' => mysql_real_escape_string(stripcslashes($this->input->post('ref_recominfo'))),

			'ref_recomvideo' => mysql_real_escape_string(stripcslashes($this->input->post('ref_recomvideo'))),

			'status' => $this->input->post('status')

			);

			//====================Post Data===================

		

			$id=$this->input->post('id');

			$data['title'] = " Edit";

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('student_record_model');

			//Transfering data to Model

			$query = $this->student_record_model->edit_reference($id,$datalist);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('individual/successupdatepersonalreference');

		

			}else{

			  redirect('main');

			}

		}

		//=======================Update Student ====================

  		//=======================Update Success message=============

		function successupdatereference(){

			if($this->session->userdata('is_logged_in')){

			///Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('student_record_model');

			//Transfering data to Model

			$query = $this->student_record_model->get_reference();

			$data['ecms'] = $query;

			$data['title'] = "Personal Recommendation Data List";

			$this->load->view('header',$data);

			$this->load->view('showreference',$data);

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

		//=======================Update Success message=============

		//=======================Delete Student=====================

		function delete_reference($id){

			if($this->session->userdata('is_logged_in')){

			//Loading  Database

			$this->load->database();

			//Transfering data to Model

			$this->student_record_model->delete_reference($id);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('individual/successdeletereference');

		

			}else{

				redirect('main');

			}

		}

		//======================Delete Student======================

		//======================Delete Success message==============

		function successdeletereference(){

			if($this->session->userdata('is_logged_in')){

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('student_record_model');

			//Transfering data to Model

			$query = $this->student_record_model->get_reference();

			$data['ecms'] = $query;

			$data['title'] = "Reference Data List";

			$this->load->view('header',$data);

			$this->load->view('showreference',$data);

			$this->load->view('footer');

			}else{

				redirect('main');

			}

		}

  		//======================Delete Success message==============

		//na_sturec_reference

		//======================Delete Success message==============

		function referencesuccess(){

			if($this->session->userdata('is_logged_in')){

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('student_record_model');

			//Transfering data to Model

			$query = $this->student_record_model->get_reference();

			$data['ecms'] = $query;

			$data['title'] = "Reference Data List";

			$this->load->view('header',$data);

			$this->load->view('showreference',$data);

			$this->load->view('footer');

			}else{

				redirect('main');

			}

		}

  		//======================Delete Success message==============

		//=========**************REFERENCE Area***************============

		//==============Supratim 04-04-2016==============================

		

		//==============Supratim 04-04-2016==============================

			//======**************Audio Area************=============

		

		function add_audio_view(){

				if($this->session->userdata('is_logged_in')){ 

					$data['title'] = "Add Audio Presentation";

					$this->load->view('header',$data);

					$this->load->view('audioadd_view');

					$this->load->view('footer');

				}else{

					redirect('main');

				}

			

		}

		function add_audio(){

			if($this->session->userdata('is_logged_in')){ 

			

			

			//Validating Description Field

			//$this->form_validation->set_rules('description ', 'Description ', 'required|min_length[1]|max_length[50]');

			

			//Validating Video Date Field

			//$this->form_validation->set_rules('video_date ', 'Video Date ', 'required|min_length[1]|max_length[12]');

			

			//Validating Outcome Field

			//$this->form_validation->set_rules('outcome', 'Outcome', 'required|min_length[1]|max_length[50]');

			

			/*if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add Video Presentation";

				$this->load->view('header',$data);

				$this->load->view('videoadd_view');

				$this->load->view('footer');

			}else {*/

			//Setting values for tabel columns

			$data = array(

				'audio_date' => date('y-m-d',strtotime($this->input->post('audio_date'))),

				'description' => mysql_real_escape_string(stripcslashes($this->input->post('description'))),

				'link_rec_audio' => mysql_real_escape_string(stripcslashes($this->input->post('link_rec_audio'))),

				'ip_live_cam' => mysql_real_escape_string(stripcslashes($this->input->post('ip_live_cam'))),

				'comments' => mysql_real_escape_string(stripcslashes($this->input->post('comments'))),

				'ind_id' =>$this->input->post('ind_id'), 

				'status' => 1

			);

			//print_r($data);

			//exit();

			

			//Transfering data to Model

			$this->load->model('student_record_model');

			$this->student_record_model->insert_audioo($data);

			echo $data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			/*}*/

		

			}else{

				redirect('main');

			}

		}

		

		

		function view_audio(){

			if($this->session->userdata('is_logged_in')){ 

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('student_record_model');

			//Transfering data to Model

			$query = $this->student_record_model->get_audio();

			$data['ecms'] = $query;

			$data['title'] = "Audio Data List";

			$this->load->view('header',$data);

			$this->load->view('showaudio',$data);

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

		

		//=======================Show  by Id=================

		function show_audio_id($id) {

			if($this->session->userdata('is_logged_in')){ 

			$data['title'] = "Audio Edit";

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('student_record_model');

			//Transfering data to Model

			$query = $this->student_record_model->get_audio_id($id);

			$data['ecms'] = $query;

			$this->load->view('header',$data);

			$this->load->view('audioedit', $data);

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

   		//======================Show  by Id=================

  	 	//======================Update  ====================

		function edit_audio(){

			if($this->session->userdata('is_logged_in')){ 

			

		//======================Post Data=====================

			$datalist = array(

			'audio_date' => date('Y-m-d',strtotime($this->input->post('audio_date'))),

			'description' => mysql_real_escape_string(stripcslashes($this->input->post('description'))),

			'link_rec_audio' => mysql_real_escape_string(stripcslashes($this->input->post('link_rec_audio'))),

			'ip_live_cam' => mysql_real_escape_string(stripcslashes($this->input->post('ip_live_cam'))),

			'comments' => mysql_real_escape_string(stripcslashes($this->input->post('comments'))),

			'status' => $this->input->post('status')

			);

			//====================Post Data===================

		

			$id=$this->input->post('id');

			$data['title'] = " Edit";

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('student_record_model');

			//Transfering data to Model

			$query = $this->student_record_model->edit_audio($id,$datalist);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('individual/successupdateaudiopresentation');

		

			}else{

			  redirect('main');

			}

		}

		//=======================Update Student ====================

  		//=======================Update Success message=============

		function successupdateaudio(){

			if($this->session->userdata('is_logged_in')){

			///Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('student_record_model');

			//Transfering data to Model

			$query = $this->student_record_model->get_audio();

			$data['ecms'] = $query;

			$data['title'] = "Audio Data List";

			$this->load->view('header',$data);

			$this->load->view('showaudio',$data);

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

		//=======================Update Success message=============

		//=======================Delete Student=====================

		function delete_audio($id){

			if($this->session->userdata('is_logged_in')){

			//Loading  Database

			$this->load->database();

			//Transfering data to Model

			$this->student_record_model->delete_audio($id);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('student_record/successdeleteaudio');

		

			}else{

				redirect('main');

			}

		}

		//======================Delete Student======================

		//======================Delete Success message==============

		function successdeleteaudio(){

			if($this->session->userdata('is_logged_in')){

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('student_record_model');

			//Transfering data to Model

			$query = $this->student_record_model->get_audio();

			$data['ecms'] = $query;

			$data['title'] = "Audio Data List";

			$this->load->view('header',$data);

			$this->load->view('showaudio',$data);

			$this->load->view('footer');

			}else{

				redirect('main');

			}

		}

  		//======================Delete Success message==============

		

		//======================Delete Success message==============

		function audiosuccess(){

			if($this->session->userdata('is_logged_in')){

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('student_record_model');

			//Transfering data to Model

			$query = $this->student_record_model->get_audio();

			$data['ecms'] = $query;

			$data['title'] = "Audio Data List";

			$this->load->view('header',$data);

			$this->load->view('showaudio',$data);

			$this->load->view('footer');

			}else{

				redirect('main');

			}

		}

  		//======================Delete Success message==============

		//=========**************Audio Area***************============

		//==============Supratim 04-04-2016==============================

		

		

		

		

		

		

		//==============Supratim 04-04-2016==============================

			//======**************Personal Recommendations Area************=============

		

		function add_perrec_view(){

				if($this->session->userdata('is_logged_in')){ 

					$data['title'] = "Add Personal Recommend";

					$this->load->view('header',$data);

					$this->load->view('perrecadd_view');

					$this->load->view('footer');

				}else{

					redirect('main');

				}

			

		}

		function add_perrec(){

			if($this->session->userdata('is_logged_in')){ 

			

			

			//Validating Description Field

			//$this->form_validation->set_rules('description ', 'Description ', 'required|min_length[1]|max_length[50]');

			

			//Validating Video Date Field

			//$this->form_validation->set_rules('video_date ', 'Video Date ', 'required|min_length[1]|max_length[12]');

			

			//Validating Outcome Field

			//$this->form_validation->set_rules('outcome', 'Outcome', 'required|min_length[1]|max_length[50]');

			

			/*if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add Video Presentation";

				$this->load->view('header',$data);

				$this->load->view('videoadd_view');

				$this->load->view('footer');

			}else {*/

			//Setting values for tabel columns

			$data = array(

				'recom_date' => date('y-m-d',strtotime($this->input->post('recom_date'))),

				'per_prov_rec' => mysql_real_escape_string(stripcslashes($this->input->post('per_prov_rec'))),

				'recommendation' => mysql_real_escape_string(stripcslashes($this->input->post('recommendation'))),

				'recorded_video' => mysql_real_escape_string(stripcslashes($this->input->post('recorded_video'))),

				'ind_id' =>$this->input->post('ind_id'), 

				'status' => 1

			);

			//print_r($data);

			//exit();

			

			//Transfering data to Model

			$this->load->model('student_record_model');

			$this->student_record_model->insert_perrec($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			/*}*/

		

			}else{

				redirect('main');

			}

		}

		

		

		function view_perrec(){

			if($this->session->userdata('is_logged_in')){ 

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('student_record_model');

			//Transfering data to Model

			$query = $this->student_record_model->get_perrec();

			$data['ecms'] = $query;

			$data['title'] = "Personal Recommendation List";

			$this->load->view('header',$data);

			$this->load->view('showperrec',$data);

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

		

		//=======================Show  by Id=================

		function show_perrec_id($id) {

			if($this->session->userdata('is_logged_in')){ 

			$data['title'] = "Personal Recommendation Edit";

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('student_record_model');

			//Transfering data to Model

			$query = $this->student_record_model->get_perrec_id($id);

			$data['ecms'] = $query;

			$this->load->view('header',$data);

			$this->load->view('perrecedit', $data);

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

   		//======================Show  by Id=================

  	 	//======================Update  ====================

		function edit_perrec(){

			if($this->session->userdata('is_logged_in')){ 

			

		//======================Post Data=====================

			$datalist = array(

			'recom_date' => date('Y-m-d',strtotime($this->input->post('recom_date'))),

			'per_prov_rec' => mysql_real_escape_string(stripcslashes($this->input->post('per_prov_rec'))),

			'recommendation' => mysql_real_escape_string(stripcslashes($this->input->post('recommendation'))),

			'recorded_video' => mysql_real_escape_string(stripcslashes($this->input->post('recorded_video'))),

			'status' => $this->input->post('status')

			);

			//====================Post Data===================

		

			$id=$this->input->post('id');

			$data['title'] = " Edit";

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('student_record_model');

			//Transfering data to Model

			$query = $this->student_record_model->edit_perrec($id,$datalist);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('student_record/successupdatepersonalrecommendation');

		

			}else{

			  redirect('main');

			}

		}

		//=======================Update Student ====================

  		//=======================Update Success message=============

		function successupdateperrec(){

			if($this->session->userdata('is_logged_in')){

			///Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('student_record_model');

			//Transfering data to Model

			$query = $this->student_record_model->get_perrec();

			$data['ecms'] = $query;

			$data['title'] = "Personal Recommendation Data List";

			$this->load->view('header',$data);

			$this->load->view('showperrec',$data);

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

		//=======================Update Success message=============

		//=======================Delete Student=====================

		function delete_perrec($id){

			if($this->session->userdata('is_logged_in')){

			//Loading  Database

			$this->load->database();

			//Transfering data to Model

			$this->student_record_model->delete_perrec($id);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('student_record/successdeletepersonalrecommendation');

		

			}else{

				redirect('main');

			}

		}

		//======================Delete Student======================

		//======================Delete Success message==============

		function successdeleteperrec(){

			if($this->session->userdata('is_logged_in')){

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('student_record_model');

			//Transfering data to Model

			$query = $this->student_record_model->get_perrec();

			$data['ecms'] = $query;

			$data['title'] = "Personal Recommendation Data List";

			$this->load->view('header',$data);

			$this->load->view('showperrec',$data);

			$this->load->view('footer');

			}else{

				redirect('main');

			}

		}

  		//======================Delete Success message==============

		

		//======================Delete Success message==============

		function perrecsuccess(){

			if($this->session->userdata('is_logged_in')){

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('student_record_model');

			//Transfering data to Model

			$query = $this->student_record_model->get_perrec();

			$data['ecms'] = $query;

			$data['title'] = "Personal Recommendation Data List";

			$this->load->view('header',$data);

			$this->load->view('showperrec',$data);

			$this->load->view('footer');

			}else{

				redirect('main');

			}

		}

  		//======================Delete Success message==============

		//=========**************PERSONAL REC Area***************============

		//==============Supratim 04-04-2016==============================

		

		

}



?>



