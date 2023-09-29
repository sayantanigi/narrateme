<?php

class Student extends CI_Controller {

		//============Constructor to call Model====================

		function __construct() {

			parent::__construct();

			$this->load->model('student_model');

		}

		//============Constructor to call Model====================

		function index(){

			if($this->session->userdata('is_logged_in')){ 

			$data['title'] = "Add Student";

			$this->load->view('header',$data);

			$this->load->helper(array('form'));

			$this->load->view('studentadd_view');

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

        $is_logged_in = $this->session->userdata('is_logged_in');

        

        if(!isset($is_logged_in) || $is_logged_in!==TRUE){

            redirect('main');

        }

      }

		//=======================Insert Student Data============

		function add_student(){

			if($this->session->userdata('is_logged_in')){ 

			

			

			//Validating Name Field

			$this->form_validation->set_rules('name', 'Name', 'required|min_length[1]|max_length[25]');

			

			//Validating Address Field

			$this->form_validation->set_rules('address', 'Address', 'required|min_length[1]|max_length[50]');

			

			//Validating Address Field

			$this->form_validation->set_rules('phone', 'Phone', 'required|min_length[1]|max_length[10]');

			

			//Validating Address Field

			$this->form_validation->set_rules('mobile', 'Mobile', 'required|min_length[1]|max_length[10]');

			

			//Validating Email Field

			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

			

			//Validating Address Field

			$this->form_validation->set_rules('ip_address', 'Ip Address', 'required|min_length[1]|max_length[50]');

			

			//Validating Username Field

			$this->form_validation->set_rules('conference_id', 'Conference Id', 'required|min_length[5]|max_length[50]');

			

			//Validating Password Field

			$this->form_validation->set_rules('gender', 'Gender', 'required');

			

			//Validating Mobile no. Field

		

			if ($this->form_validation->run() == FALSE) {

			$data['title'] = "Add Studentnnnn";

				$this->load->view('header',$data);

				$this->load->view('educationadd_view');

				$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

				'name' => $this->input->post('name'),

				'address' => $this->input->post('address'),

				'phone' => $this->input->post('phone'),

				'mobile' => $this->input->post('mobile'),

				'email' => $this->input->post('email'),

				'sms_no' => $this->input->post('sms_no'),

				'ip_address' => $this->input->post('ip_address'),

				'website' => $this->input->post('website'),

				'domain_name' => $this->input->post('domain_name'),

				'url' => $this->input->post('url'),

				'conference_id' => $this->input->post('conference_id'),

				'gender' => $this->input->post('gender'),

				'social_id_no' => $this->input->post('social_id_no'),

				'dob' => $this->input->post('dob'),

				'description' => $this->input->post('description'),

				'status' => 1

			);

			

			//Transfering data to Model

			$this->student_model->insert_student($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('student/success');

			

			}

		

			}else{

				redirect('main');

			}

		}

		//=======================Insert  Data============

  		//=======================Insertion Success message=========

		function success(){

			if($this->session->userdata('is_logged_in')){

			

			$data['h1title'] = 'Data Inserted Successfully';

			$data['title'] = 'Add Student';

			$this->load->view('header');

			$this->load->view('studentadd_view',$data);

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

		//=======================Insertion Success message=========

		//=======================View Student Data List============

		function view_student(){

			if($this->session->userdata('is_logged_in')){ 

			

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('student_model');

			//Transfering data to Model

			$query = $this->student_model->view_student();

			$data['ecms'] = $query;

			$data['title'] = "Student Data List";

			$this->load->view('header',$data);

			$this->load->view('showstudent');

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

		//=======================View  Data List=============

  		//=======================Show  by Id=================

		function show_student_id($id) {

			if($this->session->userdata('is_logged_in')){ 

				

			$data['title'] = "Student Edit";

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('student_model');

			//Transfering data to Model

			$query = $this->student_model->show_student_id($id);

			$data['ecms'] = $query;

			$this->load->view('header',$data);

			$this->load->view('studentedit', $data);

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

   		//======================Show  by Id=================

  	 	//======================Update  ====================

		function edit_student(){

			if($this->session->userdata('is_logged_in')){ 

			

		//======================Post Data=====================

			$datalist = array(

			'name' => $this->input->post('name'),

			'address' => $this->input->post('address'),

			'phone' => $this->input->post('phone'),

			'mobile' => $this->input->post('mobile'),

			'email' => $this->input->post('email'),

			'sms_no' => $this->input->post('sms_no'),

			'ip_address' => $this->input->post('ip_address'),

			'website' => $this->input->post('website'),

			'domain_name' => $this->input->post('domain_name'),

			'url' => $this->input->post('url'),

			'conference_id' => $this->input->post('conference_id'),

			'gender' => $this->input->post('gender'),

			'social_id_no' => $this->input->post('social_id_no'),

			'dob' => $this->input->post('dob'),

			'description' => $this->input->post('description'),

			'status' => $this->input->post('status')

			);

			//====================Post Data===================

			

			$id=$this->input->post('id');

			$data['title'] = " Edit";

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('student_model');

			//Transfering data to Model

			$query = $this->student_model->edit_student($id,$datalist);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('student/successupdate');

		

			}else{

			  redirect('main');

			}

		}

		//=======================Update Student ====================

  		//=======================Update Success message=============

		function successupdate(){

			if($this->session->userdata('is_logged_in')){

			

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('student_model');

			//Transfering data to Model

			$query = $this->student_model->view_student();

			$data['ecms'] = $query;

			$data['title'] = " Data List";

			$datamsg['h1title'] = 'Data Updated Successfully';

			$this->load->view('header',$data);

			$this->load->view('showstudent',$datamsg);

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

		//=======================Update Success message=============

		//=======================Delete Student=====================

		function delete_student($id){

			if($this->session->userdata('is_logged_in')){

				

			//Loading  Database

			$this->load->database();

			//Transfering data to Model

			$this->student_model->delete_student($id);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('student/successdelete');

		

			}else{

				redirect('main');

			}

		}

		//======================Delete Student======================

		//======================Delete Success message==============

		function successdelete(){

			if($this->session->userdata('is_logged_in')){

			

			//Loading  Database

			$this->load->database();

			//Calling Model

			$this->load->model('Student_model');

			//Transfering data to Model

			$query = $this->student_model->view_student();

			$data['ecms'] = $query;

			$data['title'] = "Student Data List";

			$datamsg['h1title'] = 'Data Updated Successfully';

			$this->load->view('header',$data);

			$this->load->view('show');

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

  		//======================Delete Success message==================

		

		//=======================Insert Experience Data=================

		//=======================Insert Award Data======================

		function add_student_experience(){

			if($this->session->userdata('is_logged_in')){

			

			

			//Validating Name Field

			$this->form_validation->set_rules('employer_name', 'Employer Name', 'required|min_length[1]|max_length[50]');

			

			//Validating Address Field

			$this->form_validation->set_rules('from_date', 'From Date', 'required|min_length[1]|max_length[50]');

			

			$this->form_validation->set_rules('to_date', 'To Date', 'required|min_length[1]|max_length[50]');

			

			$this->form_validation->set_rules('position', 'Position', 'required|min_length[1]|max_length[50]');

			

			if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add Student Experience";

				$this->load->view('header',$data);

				$this->load->view('studentexpadd_view');

				$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

				'employer_name' => mysql_real_escape_string(strip_tags(trim($this->input->post('employer_name')))),

				'from_date' => mysql_real_escape_string(strip_tags(trim(date('Y-m-d H:i:s',strtotime($this->input->post('from_date')))))),

				'to_date' => mysql_real_escape_string(strip_tags(trim(date('Y-m-d H:i:s',strtotime($this->input->post('to_date')))))),

				'to_date' => mysql_real_escape_string(strip_tags(trim(date('Y-m-d H:i:s',strtotime($this->input->post('to_date')))))),

				'position' => mysql_real_escape_string(strip_tags(trim($this->input->post('position')))),

				'job_description' => mysql_real_escape_string(strip_tags(trim($this->input->post('job_description')))),

				'student_id' => $this->input->post('student_id'),

				'status' => 1

			);

			//Transfering data to Model

			$this->student_model->insert_experience($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('student/success');

			

			}

		

			}else{

				redirect('main');

			}

		}

		//=======================Insert Award Data=====================

		//================View Individual Data List====================

		function view_student_experience(){

			if($this->session->userdata('is_logged_in')){

			

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('student_model');

			//Transfering data to Model

			$query = $this->student_model->view_experiencedetails();

			$data['ecms'] = $query;

			$data['title'] = "Students Job List";

			$this->load->view('header',$data);

			$this->load->view('showstudentjob');

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

		

		

		//**************************************************************

		//=======================Show  by Id=================

		function show_job_id($id) {

			if($this->session->userdata('is_logged_in')){

				

			$data['title'] = "Job Edit";

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('student_model');

			//Transfering data to Model

			$query = $this->student_model->show_job_id($id);

			$data['ecms'] = $query;

			$this->load->view('header',$data);

			$this->load->view('jobedit', $data);

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

   		//======================Show  by Id=================

   		

  	 	//================Update Individual ====================

		function edit_job(){

			if($this->session->userdata('is_logged_in')){

			

			//====================Post Data=====================

			$datalist = array(

			'employer_name' => $this->input->post('employer_name'),

			'from_date' => date('Y-m-d H:i:s',strtotime($this->input->post('from_date'))),

			'to_date' => date('Y-m-d H:i:s',strtotime($this->input->post('to_date'))),

			'position' => $this->input->post('position'),

			'job_description' => $this->input->post('job_description'),

			'status' => $this->input->post('status')

			);

			//====================Post Data===================

			

			$id=$this->input->post('id');

			$data['title'] = "Job Edit";

			

			//print_r($datalist );

			//exit();

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('student_model');

			//Transfering data to Model

			$query = $this->student_model->edit_student_job($id,$datalist);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('student/jobupdate');

		

			}else{

				redirect('main');

			}

		}

		

		//================Update Individual ====================

		//================Job Update Message============================

		

		function jobupdate(){

			if($this->session->userdata('is_logged_in')){

			

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('student_model');

			//Transfering data to Model

			$query = $this->student_model->view_experiencedetails();

			$data['ecms'] = $query;

			$data['title'] = " Data List";

			$datamsg['h1title'] = 'Data Updated Successfully';

			$this->load->view('header',$data);

			$this->load->view('showstudentjob',$datamsg);

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

		//================Job Update Message============================

		//**************************************************************

		

		function delete_job($id){

			if($this->session->userdata('is_logged_in')){

			

			//Loading  Database

			$this->load->database();

			//Transfering data to Model

			$this->student_model->delete_job($id);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('student/successdeletejob');	

		

			}else{

				redirect('main');

			}

		}

		function successdeletejob(){

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('student_model');

			//Transfering data to Model

			$query = $this->student_model->view_experiencedetails();

			$data['ecms'] = $query;

			$data['title'] = "Students Job List";

			$this->load->view('header',$data);

			$this->load->view('showstudentjob');

			$this->load->view('footer');

		}

		

		//=======================Insert Experience Data=================

		

		//=======================Extra Curriculam Area==================

		//=======================Insert Extra Carricular Data======================

		function add_student_extra(){

			if($this->session->userdata('is_logged_in')){

			

			

			//Validating Name Field

			$this->form_validation->set_rules('employer_name', 'Employer Name', 'required|min_length[1]|max_length[50]');

			

			//Validating Address Field

			$this->form_validation->set_rules('from_date', 'From Date', 'required|min_length[1]|max_length[50]');

			

			$this->form_validation->set_rules('to_date', 'To Date', 'required|min_length[1]|max_length[50]');

			

			$this->form_validation->set_rules('position', 'Position', 'required|min_length[1]|max_length[50]');

			

			if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add Student Experience";

				$this->load->view('header',$data);

				$this->load->view('studentexpadd_view');

				$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

				'employer_name' => mysql_real_escape_string(strip_tags(trim($this->input->post('employer_name')))),

				'from_date' => mysql_real_escape_string(strip_tags(trim(date('Y-m-d H:i:s',strtotime($this->input->post('from_date')))))),

				'to_date' => mysql_real_escape_string(strip_tags(trim(date('Y-m-d H:i:s',strtotime($this->input->post('to_date')))))),

				'position' => mysql_real_escape_string(strip_tags(trim($this->input->post('position')))),

				'job_description' => mysql_real_escape_string(strip_tags(trim($this->input->post('job_description')))),

				'student_id' => $this->input->post('student_id'),

				'status' => 1

			);

			//Transfering data to Model

			$this->student_model->insert_experience($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('student/success');

			

			}

		

			}else{

				redirect('main');

			}

		}

		//=======================Insert Award Data=====================

		

		//========**********Rehabiliation Section********===============

		

		//=======================Add Rehabiliation======================

		function add_rehabdata_view(){

				if($this->session->userdata('is_logged_in')){ 

					$data['title'] = "Add Rehabilitation";

					$this->load->view('header',$data);

					$this->load->view('rehabadd_view');

					$this->load->view('footer');

				}else{

					redirect('main');

				}

			

		}

		function add_rehabilitation(){

			if($this->session->userdata('is_logged_in')){ 

			

			

			//Validating Name Field

			$this->form_validation->set_rules('name', 'Name', 'required|min_length[1]|max_length[25]');

			

			//Validating Rehab Date Field

			$this->form_validation->set_rules('rehab_date', 'Rehab Date', 'required|min_length[1]|max_length[50]');

			

			//Validating Outcome Field

			$this->form_validation->set_rules('outcome', 'Outcome', 'required|min_length[1]|max_length[10]');

			

			if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add Rehabilitation";

				$this->load->view('header',$data);

				$this->load->view('rehabadd_view');

				$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

				'name' => mysql_real_escape_string(stripcslashes($this->input->post('name'))),

				'rehab_date' => date('y-m-d',strtotime($this->input->post('rehab_date'))),

				'description' => mysql_real_escape_string(stripcslashes($this->input->post('description'))),

				'outcome' => mysql_real_escape_string(stripcslashes($this->input->post('outcome'))),

				'status' => 1

			);

			

			//Transfering data to Model

			$this->student_model->insert_rehabilitation($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('student/rehabsuccess');

			

			}

		

			}else{

				redirect('main');

			}

		}

		//=======================Add Rehabiliation======================

		//=======================Rehabiliation Success==================

		function rehabsuccess(){

			if($this->session->userdata('is_logged_in')){ 

				$data['title'] = "Add Rehabilitation";

				$this->load->view('header',$data);

				$this->load->view('rehabadd_view');

				$this->load->view('footer');

			}else{

				redirect('main');

			}

		}

		//=======================Rehabiliation Success==================

		//=======================Rehabilitation Activities==============

		function view_rehabilitation(){

			if($this->session->userdata('is_logged_in')){ 

			

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('student_model');

			//Transfering data to Model

			$query = $this->student_model->get_rehabilitation();

			$data['ecms'] = $query;

			$data['title'] = "Rehabilitation Data List";

			$this->load->view('header',$data);

			$this->load->view('showrehab',$data);

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

		

		//=======================Show  by Id=================

		function show_rehabilitation_id($id) {

			if($this->session->userdata('is_logged_in')){ 

			$data['title'] = "Rehabilitation Edit";

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('student_model');

			//Transfering data to Model

			$query = $this->student_model->get_rehab_id($id);

			$data['ecms'] = $query;

			$this->load->view('header',$data);

			$this->load->view('rehabedit', $data);

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

   		//======================Show  by Id=================

  	 	//======================Update  ====================

		function edit_rehabilitation(){

			if($this->session->userdata('is_logged_in')){ 

			

		//======================Post Data=====================

			$datalist = array(

			'name' => mysql_real_escape_string(stripcslashes($this->input->post('name'))),

			'rehab_date' => date('Y-m-d',strtotime($this->input->post('rehab_date'))),

			'outcome' => mysql_real_escape_string(stripcslashes($this->input->post('outcome'))),

			'description' => mysql_real_escape_string(stripcslashes($this->input->post('description'))),

			'status' => $this->input->post('status')

			);

			//====================Post Data===================

		

			$id=$this->input->post('id');

			$data['title'] = " Edit";

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('student_model');

			//Transfering data to Model

			$query = $this->student_model->edit_rehab($id,$datalist);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('student/successupdaterehab');

		

			}else{

			  redirect('main');

			}

		}

		//=======================Update Student ====================

  		//=======================Update Success message=============

		function successupdaterehab(){

			if($this->session->userdata('is_logged_in')){

			///Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('student_model');

			//Transfering data to Model

			$query = $this->student_model->get_rehabilitation();

			$data['ecms'] = $query;

			$data['title'] = "Rehabilitation Data List";

			$this->load->view('header',$data);

			$this->load->view('showrehab',$data);

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

		//=======================Update Success message=============

		//=======================Delete Student=====================

		function delete_rehabilitation($id){

			if($this->session->userdata('is_logged_in')){

			

			//Loading  Database

			$this->load->database();

			//Transfering data to Model

			$this->student_model->delete_rehab($id);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('student/successdeleterehab');

		

			}else{

				redirect('main');

			}

		}

		//======================Delete Student======================

		//======================Delete Success message==============

		function successdeleterehab(){

			if($this->session->userdata('is_logged_in')){

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('student_model');

			//Transfering data to Model

			$query = $this->student_model->get_rehabilitation();

			$data['ecms'] = $query;

			$data['title'] = "Rehabilitation Data List";

			$this->load->view('header',$data);

			$this->load->view('showrehab',$data);

			$this->load->view('footer');

			}else{

				redirect('main');

			}

		}

  		//======================Delete Success message==============

		

		//=======================Rehabilitation Activities==============

		//========************Rehabiliation Section***********===========

		

		

} 



?>



