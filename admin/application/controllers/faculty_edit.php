<?php
class Faculty_edit extends CI_Controller {

 
		//============Constructor to call Model====================

		function __construct() {

			parent::__construct();

			$this->load->model('faculty_edit_model');

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
	
	
	

		function faculty_teach(){

			$rdur3=$this->uri->segment(3);
       		$rdurl4=$this->uri->segment(4);
	   
	   		//Transfering data to Model
			$queryschooldata = $this->faculty_edit_model->show_school_data($rdur3);

			$data['school'] = $queryschooldata;
			
			 $querycoursedata = $this->faculty_edit_model->show_course_data($rdur3);
			 $data['course'] = $querycoursedata; 

			
			$querylecturedata = $this->faculty_edit_model->show_lecture_data($rdur3);

			$data['lecture'] = $querylecturedata;

	   
			$queryteacherdata = $this->faculty_edit_model->show_teacher_data($rdur3); 
			$data['teacher'] = $queryteacherdata; 
			$querycurriculumdata = $this->faculty_edit_model->show_school_curriculum($rdur3); 
			$data['curriculum2'] = $querycurriculumdata; 
			$queryedu_insdata = $this->faculty_edit_model->show_school_edu_ins($rdur3); 
			$data['edu_ins2'] = $queryedu_insdata; 
			$data['message'] = 'Data Inserted Successfully';
			$this->load->view('header',$data);
			$this->load->view('faculty_edit', $data,$rdurl4);
			$this->load->view('footer');

			}

			function edit_school_teacher(){
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
	$data_id = $this->input->post('rdurl4') ;
			$this->faculty_edit_model->edit_school_teacher($data,$data_id);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');


		 }
		 
		 function edit_school_lect(){

			//Setting values for tabel columns

			$data = array(

				'ind_id' => $this->input->post('ind_id'),

				'video' => $this->input->post('video'),

				'camera' => $this->input->post('camera'),

				'status' => 1

			);

			//Transfering data to Model			
			$data_id = $this->input->post('rdurl4') ;
			$this->faculty_edit_model->edit_school_lect($data,$data_id);
			
			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/sfad');


		}
		
		function edit_school_course(){

			//Setting values for tabel columns

			$data = array(

				'ind_id' => $this->input->post('ind_id'),

				'instructor' => $this->input->post('instructor'),

				'description' => $this->input->post('description'),

				'schedule' => date('y-m-d',strtotime($this->input->post('schedule'))),

				'facilities' => $this->input->post('facilities'),

				'status' => 1

			);

					
			$data_id = $this->input->post('rdurl3') ;

			//Transfering data to Model

			$this->faculty_edit_model->edit_school_course($data,$data_id);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/sfad');

		}
		
		function edit_instructional_facilities(){

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

			
			$data_id = $this->input->post('rdurl3') ;
			//Transfering data to Model

			$this->faculty_edit_model->edit_instructional_facilities($data,$data_id);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/sfad');

		}

function edit_school_curricul(){
			
			$data = array(

				'instructor' => $this->input->post('instructor'),

				'description' => $this->input->post('description'),

				'course' => $this->input->post('course'),

				'course_schedule' => date('y-m-d',strtotime($this->input->post('course_schedule'))),
				
				'educ_institute' => $this->input->post('educ_institute'),

				'ind_id' =>$this->input->post('ind_id'), 

				'status' => 1

			);

			//print_r($data);

			//exit();

			//Transfering data to Model
			$data_id = $this->input->post('rdurl4') ;
			$this->faculty_edit_model->edit_school_curricul($data,$data_id);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');


		 }
		 
		 function edit_school_edu_ins(){
			
			$data = array(

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
				
				'ind_id' =>$this->input->post('ind_id'), 

				'status' => 1

			);

			print_r($data);

			//exit();

			//Transfering data to Model
	$data_id = $this->input->post('rdurl4') ;
			$this->faculty_edit_model->edit_school_edu_ins($data,$data_id);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');


		 }
		 

}



?>



