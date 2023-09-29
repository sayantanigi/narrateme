<?php

class Schooldata extends CI_Controller {

		//============Constructor to call Model====================

		function __construct() {

			parent::__construct();

			$this->load->model('school_model');

		}

		//============Constructor to call Model====================

		function index(){

			if($this->session->userdata('is_logged_in')){ 

			$data['title'] = "Add Individual";

			//$this->load->view('header',$data);

			//$this->load->helper(array('form'));

			//$this->load->view('individualadd_view');

			//$this->load->view('footer');

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

		//=======================Insert Individual Data============

		function add_instructional_facilities(){

			$this->form_validation->set_rules('school_name', 'School Data', 'required');

			if ($this->form_validation->run() == FALSE) {

			 $data['title'] = "Add Instructional Facilities ";

			//exit();

			$this->load->view('header',$data);

			$this->load->view('page_user_profile');

			$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

				'ind_id' => $this->input->post('ind_id'),

				'school_name' => $this->input->post('school_name'),

				'school_bulletin' => $this->input->post('school_bulletin'),

				'teacher' => $this->input->post('teacher'),

				'address' => $this->input->post('address'),

				'pnone_no' => $this->input->post('pnone_no'),

				'email' => $this->input->post('email'),

				'mobile' => $this->input->post('mobile'),

				'ip_address' => $this->input->post('ip_address'),

				'websites' => $this->input->post('websites'),

				'domain_name' => $this->input->post('domain_name'),

				'url' => $this->input->post('url'),

				'school_information' => $this->input->post('school_information'),

				'schoolprogram_information' => $this->input->post('schoolprogram_information'),

				'schoolwebsite' => $this->input->post('schoolwebsite'),

				'programs_div' => $this->input->post('programs_div'),
				
				'Affiliate_Schools' => $this->input->post('affiliate'),
				'divisions' => $this->input->post('division'),
				'past_alumni' => $this->input->post('alumini'),
				'transcripts' => $this->input->post('transcripts'),

				'status' => 1

			);

			

			//Transfering data to Model

			$this->school_model->insert_instructional_facilities($data,$this->input->post('ind_id'));

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/sfad');

			

			}

		}

		//=======================Insert Individual Data============ 

  		

		/*  -------------------------------Akash-6-4-16 starts -------------------------     */

		

		/*  -------------------------------Insert-school_course starts -------------------------     */

		function add_school_course(){

			$this->form_validation->set_rules('instructor','required');

			if ($this->form_validation->run() == FALSE) {

			 $data['title'] = "Add Instructional Facilities ";

			//exit();

			$this->load->view('header',$data);

			$this->load->view('page_user_profile');

			$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

				'ind_id' => $this->input->post('ind_id'),

				'instructor' => $this->input->post('instructor'),

				'description' => $this->input->post('description'),

				'schedule' => date('y-m-d',strtotime($this->input->post('schedule'))),

				'facilities' => $this->input->post('facilities'),

				'status' => 1

			);

			

			//Transfering data to Model

			$this->school_model->insert_school_course($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/sfad');

			

			}

		}

				/*  -------------------------------Insert-school_course ends -------------------------     */

				

				/*  -------------------------------Insert-school_course starts -------------------------     */

		function add_school_lect(){

			$this->form_validation->set_rules('instructor','required');

			if ($this->form_validation->run() == FALSE) {

			 $data['title'] = "Add Instructional Facilities ";

			//exit();

			$this->load->view('header',$data);

			$this->load->view('page_user_profile');

			$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

				'ind_id' => $this->input->post('ind_id'),

				'video' => $this->input->post('video'),

				'camera' => $this->input->post('camera'),

				'status' => 1

			);


			//Transfering data to Model

			
			$this->school_model->insert_school_lect($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/sfad');



			}

		}

				/*  -------------------------------Insert-school_course ends -------------------------     */


function add_school_teacher(){
			
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

			$this->school_model->insert_school_teacher($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');


		 } 


		

		/*  -------------------------------Akash-6-7-16 starts -------------------------     */

		
	/*  -------------------------------Insert-school_course starts -------------------------     */

		function add_school_curiculam(){

			$this->form_validation->set_rules('instructor','required');

			if ($this->form_validation->run() == FALSE) {

			 $data['title'] = "Add Faculty/School Data ";

			//exit();

			$this->load->view('header',$data);

			$this->load->view('page_user_profile');

			$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

				'ind_id' => $this->input->post('ind_id'),

				'instructor' => $this->input->post('instructor'),

				'description' => $this->input->post('description'),

				'course' => $this->input->post('course'),

				'course_schedule' => date('y-m-d',strtotime($this->input->post('course_schedule'))),
				'educ_institute' => $this->input->post('educ_institute'),

				'status' => 1

			);

			

			//Transfering data to Model

			$this->school_model->insert_school_curiculam($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/sfad');

			

			}

		}
		
		function numeric_wcomma($str)
{
    return preg_match('/^[0-9,]+$/', $str);
}
function add_school_other_edu(){

			$this->form_validation->set_rules('program_enrolled','required');
			//$this->form_validation->set_rules('teacher_phone','Input', 'callback_numeric_wcomma');

			if ($this->form_validation->run() == FALSE) {

			 $data['title'] = "Add Faculty/School Data ";

			//exit();

			$this->load->view('header',$data);

			$this->load->view('page_user_profile');

			$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

				'ind_id' => $this->input->post('ind_id'),

				'program_enrolled' => $this->input->post('program_enrolled'),

				'attandance_date' =>  date('y-m-d',strtotime($this->input->post('attandance_date'))),

				'courses_taken' => $this->input->post('courses_taken'),
				
				'grade' => $this->input->post('grade'),
				
				'courses_enrolled' =>$this->input->post('courses_enrolled'),
				
				'seminar_name' => $this->input->post('seminar_name'),

				'seminar_date' =>  date('y-m-d',strtotime($this->input->post('seminar_date'))),

				'seminar_description' =>  date('y-m-d',strtotime($this->input->post('seminar_description'))),

				'course_schedule' =>  date('y-m-d',strtotime($this->input->post('course_schedule'))),
				
				'teacher_name' => $this->input->post('teacher_name'),
				
				'teacher_phone' =>$this->input->post('teacher_phone'),
				
				'teacher_email' => $this->input->post('teacher_email'),
				
				'Certificate_degree' =>$this->input->post('Certificate_degree'),

				'status' => 1

			);

			

			//Transfering data to Model

			$this->school_model->insert_school_other_edu($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/sfad');

			

			}

		}
		
function add_school_sch(){

			$this->form_validation->set_rules('instructor','required');

			if ($this->form_validation->run() == FALSE) {

			 $data['title'] = "Add Instructional Facilities ";

			//exit();

			$this->load->view('header',$data);

			$this->load->view('page_user_profile');

			$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

				'ind_id' => $this->input->post('ind_id'),

				'program' => $this->input->post('program'),

				'course' => $this->input->post('course'),

				'status' => 1

			);


			//Transfering data to Model

			
			$this->school_model->insert_school_sch($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/sfad');



			}

		}

				/*  -------------------------------Insert-school_div ends -------------------------     */
				
				/*  -------------------------------Insert-past lecture starts -------------------------     */

		function add_school_past(){

			$this->form_validation->set_rules('instructor','required');

			if ($this->form_validation->run() == FALSE) {

			 $data['title'] = "Add Instructional Facilities ";

			//exit();

			$this->load->view('header',$data);

			$this->load->view('page_user_profile');

			$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

				'ind_id' => $this->input->post('ind_id'),

				'video' => $this->input->post('video'),

				'camera' => $this->input->post('camera'),

				'status' => 1

			);


			//Transfering data to Model

			
			$this->school_model->insert_school_past($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/sfad');



			}

		}
		

}



?>



