<?php

class Institution_data extends CI_Controller {

		//============Constructor to call Model====================

		function __construct() {

			parent::__construct();

			$this->load->model('institution_data_model');

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

	

	/* ------------------------------------ akash-5-4-16 content starts ---------------------------------   */

	

	/* =======================Insert institution-Educational Data starts============ */

		

		function add_edu(){

			if($this->session->userdata('is_logged_in')){ 

			

			

			//Validating Name Field

			/*$this->form_validation->set_rules('drug_name', 'Drug Name', 'required|min_length[1]|max_length[50]');

			

			//Validating Rehab Date Field

			$this->form_validation->set_rules('drug_date', 'Drug Date', 'required|min_length[1]|max_length[12]');

			

			//Validating Outcome Field

			$this->form_validation->set_rules('outcome', 'Outcome', 'required|min_length[1]|max_length[50]');

			

			if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add Drug";

				$this->load->view('header',$data);

				$this->load->view('drugadd_view');

				$this->load->view('footer');

			}else {*/

			

			//Setting values for tabel columns

			$data = array(

				

				'name' => mysql_real_escape_string(stripcslashes($this->input->post('name'))),

				'school' => mysql_real_escape_string(stripcslashes($this->input->post('school'))),

				'description' => mysql_real_escape_string(stripcslashes($this->input->post('description'))),

				'ind_id' =>$this->input->post('ind_id'), 

				'status' => 1

			);

			//print_r($data);

			//exit();

			

			//Transfering data to Model

			$this->institution_data_model->insert_edu($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			/* } */

		

			}else{

				redirect('main');

			}

		}

			/* ======================= Insert institution-Educational  Data ends============ */ 

			

			/* ======================= Insert institution-instructor/edu/proff  Data ends============ */

			

			function add_ins_edu(){

			if($this->session->userdata('is_logged_in')){ 

			

			

			//Validating Name Field

			/*$this->form_validation->set_rules('drug_name', 'Drug Name', 'required|min_length[1]|max_length[50]');

			

			//Validating Rehab Date Field

			$this->form_validation->set_rules('drug_date', 'Drug Date', 'required|min_length[1]|max_length[12]');

			

			//Validating Outcome Field

			$this->form_validation->set_rules('outcome', 'Outcome', 'required|min_length[1]|max_length[50]');

			

			if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add Drug";

				$this->load->view('header',$data);

				$this->load->view('drugadd_view');

				$this->load->view('footer');

			}else {*/

			

			//Setting values for tabel columns

			$data = array(

				

				'name' => mysql_real_escape_string(stripcslashes($this->input->post('name'))),

				'course' => mysql_real_escape_string(stripcslashes($this->input->post('course'))),

				'telephone' => mysql_real_escape_string(stripcslashes($this->input->post('telephone'))),

				'email' => mysql_real_escape_string(stripcslashes($this->input->post('email'))),

				'website' => mysql_real_escape_string(stripcslashes($this->input->post('website'))),

				'information' => mysql_real_escape_string(stripcslashes($this->input->post('information'))),

				'address' => mysql_real_escape_string(stripcslashes($this->input->post('address'))), 

				'ind_id' =>$this->input->post('ind_id'), 

				'status' => 1

			);

			//print_r($data);

			//exit();

			

			//Transfering data to Model

			$this->institution_data_model->insert_ins_teacher($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			/* } */

		

			}else{

				redirect('main');

			}

		}

			/* =======================Insert institution-instructor/edu/proff Data ends============ */

			

			/* ======================= Insert institution-schools  Data ends============ */

			

			function add_sch_div(){

			if($this->session->userdata('is_logged_in')){ 

			

			

			//Validating Name Field

			/*$this->form_validation->set_rules('drug_name', 'Drug Name', 'required|min_length[1]|max_length[50]');

			

			//Validating Rehab Date Field

			$this->form_validation->set_rules('drug_date', 'Drug Date', 'required|min_length[1]|max_length[12]');

			

			//Validating Outcome Field

			$this->form_validation->set_rules('outcome', 'Outcome', 'required|min_length[1]|max_length[50]');

			

			if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add Drug";

				$this->load->view('header',$data);

				$this->load->view('drugadd_view');

				$this->load->view('footer');

			}else {*/

			

			//Setting values for tabel columns

			$data = array(

				

				'program' => mysql_real_escape_string(stripcslashes($this->input->post('academic'))),

				'course' => mysql_real_escape_string(stripcslashes($this->input->post('course'))),

				 

				'ind_id' =>$this->input->post('ind_id'), 

				'status' => 1

			);

			//print_r($data);

			//exit();

			

			//Transfering data to Model

			$this->institution_data_model->insert_sch_div($data);

			$data['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			/* } */

		

			}else{

				redirect('main');

			}

		}

			/* =======================Insert institution-schools Data ends============ */

			

			/* ======================= Insert institution-Curriculum  Data ends============ */

			

			function add_curiculam(){

			if($this->session->userdata('is_logged_in')){ 

			

			

			//Validating Name Field

			/*$this->form_validation->set_rules('drug_name', 'Drug Name', 'required|min_length[1]|max_length[50]');

			

			//Validating Rehab Date Field

			$this->form_validation->set_rules('drug_date', 'Drug Date', 'required|min_length[1]|max_length[12]');

			

			//Validating Outcome Field

			$this->form_validation->set_rules('outcome', 'Outcome', 'required|min_length[1]|max_length[50]');

			

			if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add Drug";

				$this->load->view('header',$data);

				$this->load->view('drugadd_view');

				$this->load->view('footer');

			}else {*/

			

			//Setting values for tabel columns

			$data = array(

				

				'instructor' => mysql_real_escape_string(stripcslashes($this->input->post('instructor'))),

				'course' => mysql_real_escape_string(stripcslashes($this->input->post('course'))),

				'description' => mysql_real_escape_string(stripcslashes($this->input->post('description'))),

				'educ_institute' => mysql_real_escape_string(stripcslashes($this->input->post('educ_institute'))),

				 'course_schedule' => date('y-m-d',strtotime($this->input->post('course_schedule'))),

				'ind_id' =>$this->input->post('ind_id'), 

				'status' => 1

			);

			//print_r($data);

			//exit();

			

			//Transfering data to Model

			$this->institution_data_model->insert_cur($data);

			$data['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			/* } */

		

			}else{

				redirect('main');

			}

		}

			/* =======================Insert institution-Curriculum  Data ends============ */

	

	

	/* ------------------------------------ akash-5-4-16 content ends ---------------------------------   */

	/* ============= Debjit 5.4.16   Academic Transcripts/Records Institution   all past and present student========== */

	/*function add_academic_transcripts_institution_view(){

				if($this->session->userdata('is_logged_in')){ 

					$data['title'] = "Add Academic Institution";

					$this->load->view('header',$data);

					$this->load->view('teacheradd_view');

					$this->load->view('footer');

				}else{

					redirect('main');

				}

			

		}*/

	function add_academic_institution(){

			if($this->session->userdata('is_logged_in')){ 

			

			//Validating Name Field

			//$this->form_validation->set_rules('courses_taken', 'Courses Taken', 'required|min_length[1]|max_length[50]');

			

			//Validating Outcome Field

			//$this->form_validation->set_rules('email', 'Email', 'required|min_length[1]|max_length[50]');

			

			

			//Setting values for tabel columns

		$data = array(

				'courses_taken' => mysql_real_escape_string(stripcslashes($this->input->post('courses_taken'))),

				'grade' => mysql_real_escape_string(stripcslashes($this->input->post('grade'))),

				'ind_id' =>$this->input->post('ind_id'), 

				'status' => 1

			);

			//print_r($data);

			//exit();

			

			//Transfering data to Model

			

			$this->institution_data_model->insert_academic_institution($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			

		

			}else{

				redirect('main');

			}

		}

	

	

	//========================

	/*function add_accepted_substitute_view(){

				if($this->session->userdata('is_logged_in')){ 

					$data['title'] = "Add Academic Institution";

					$this->load->view('header',$data);

					$this->load->view('teacheradd_view');

					$this->load->view('footer');

				}else{

					redirect('main');

				}

			

		}*/



		function add_accepted_substitute(){

			if($this->session->userdata('is_logged_in')){ 

			

			//Validating Name Field

			//$this->form_validation->set_rules('courses_taken', 'Courses Taken', 'required|min_length[1]|max_length[50]');

			

			//Validating Outcome Field

			//$this->form_validation->set_rules('email', 'Email', 'required|min_length[1]|max_length[50]');

			

			

			//Setting values for tabel columns

		$data = array(

				'link_video' => mysql_real_escape_string(stripcslashes($this->input->post('link_video'))),

				'link_camera' => mysql_real_escape_string(stripcslashes($this->input->post('link_camera'))),

				'ind_id' =>$this->input->post('ind_id'), 

				'status' => 1

			);

			//print_r($data);

			//exit();

			

			//Transfering data to Model

			

			$this->institution_data_model->insert_accepted_substitute($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');

			

			

		

			}else{

				redirect('main');

			}

		}

	

	

	

			

}



?>



