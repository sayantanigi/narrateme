<?php

class teacher extends CI_Controller {

		//============Constructor to call Model====================

		function __construct() {

			parent::__construct();

			$this->load->model('teacher_model');

		}

		//============Constructor to call Model====================

		function index(){

			if($this->session->userdata('is_logged_in')){ 

			$data['title'] = "Add teacher";

			$this->load->view('header',$data);

			$this->load->helper(array('form'));

			$this->load->view('teacheradd_view');

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

		//=======================Insert teacher Data============

		function add_teacher(){

			

			//Validating Name Field

			$this->form_validation->set_rules('name', 'Name', 'required|min_length[1]|max_length[25]');

			

			//Validating Address Field

			//$this->form_validation->set_rules('address', 'Address', 'required|min_length[1]|max_length[50]');

			

			//Validating Address Field

			//$this->form_validation->set_rules('city', 'City', 'required|min_length[1]|max_length[50]');

			

			//Validating Address Field

			//$this->form_validation->set_rules('state', 'State', 'required|min_length[1]|max_length[50]');

			

			//Validating Address Field

			//$this->form_validation->set_rules('zip_code', 'Zip Code', 'required|min_length[1]|max_length[50]');

			

			//Validating Address Field

			$this->form_validation->set_rules('phone', 'Phone', 'required|min_length[1]|max_length[50]');

			

			//Validating Address Field

			//$this->form_validation->set_rules('text_no', 'Text Number', 'required|min_length[1]|max_length[50]');

			

			//Validating Address Field

			//$this->form_validation->set_rules('website', 'Web Site', 'required|min_length[1]|max_length[50]');

			

			//Validating Address Field

			//$this->form_validation->set_rules('domain_name', 'Domain Name', 'required|min_length[1]|max_length[50]');

			

			

			//Validating Username Field

			//$this->form_validation->set_rules('url', 'Url', 'required|min_length[5]|max_length[50]');

			

			//Validating Password Field

			//$this->form_validation->set_rules('password', 'Password', 'required');

			

			//Validating Email Field

			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

			

			//Validating Mobile no. Field

			//$this->form_validation->set_rules('phone', 'Phone No.', 'required|regex_match[/^[0-9]{10}$/]');

			

			

			if ($this->form_validation->run() == FALSE) {

			$data['title'] = "Add teacher";

			$this->load->view('header',$data);

			$this->load->view('teacheradd_view');

			$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

			//'member_type' => $this->input->post('member_type'),

			'name' => $this->input->post('name'),

			'address' => $this->input->post('address'),

			//'city' => $this->input->post('city'),

			//'state' => $this->input->post('state'),

			//'zip_code' => $this->input->post('zip_code'),

			'phone' => $this->input->post('phone'),

			'email' => $this->input->post('email'),

			//'text_no' => $this->input->post('text_no'),

			'syllabus' => $this->input->post('syllabus'),

			'curriculum' => $this->input->post('curriculum'),

			'course' => $this->input->post('course'),

			'academic_program' => $this->input->post('academic_program'),

			'learning_portal' => $this->input->post('learning_portal'),

			'website' => $this->input->post('website'),

			'domain_name' => $this->input->post('domain_name'),

			'url' => $this->input->post('url'),

			'ipaddress' => $this->input->post('ipaddress'),

			'information' => $this->input->post('information'),

			//'newsreport' => $this->input->post('newsreport'),

			//'username' => $this->input->post('username'),

			//   	newsreport	information 'password' => $this->input->post('password'),

			'status' => 1

			);

			

			//Transfering data to Model

			$this->teacher_model->insert_teacher($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('teacher/success');

			

			}

		}

		//=======================Insert teacher Data============

  		//=======================Insertion Success message=========

		/* //loading database

			$this->load->database();

			//Calling Model

			$this->load->model('teacher_model');

			//Transfering data to Model

			$query = $this->teacher_model->view_teacher();

			$data['ecms'] = $query;

			$data['title'] = "teacher Data List";

			$datamsg['h1title'] = 'Data Updated Successfully';

			$this->load->view('header',$data);

			$this->load->view('showteacher',$datamsg);

			$this->load->view('footer');  */

		

		function success(){

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('teacher_model');

			//Transfering data to Model

			$query = $this->teacher_model->view_teacher();

			$data['ecms'] = $query;

			$data['title'] = "Add teacher";

			$datamsg['h1title'] = 'Data Inserted Successfully';

			$this->load->view('header',$data);

			$this->load->view('showteacher',$datamsg);

			$this->load->view('footer'); 

			

		}

		//=======================Insertion Success message=========

		//================View teacher Data List=============

		function view_teacher(){

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('teacher_model');

			//Transfering data to Model

			$query = $this->teacher_model->view_teacher();

			$data['ecms'] = $query;

			$data['title'] = "teacher Data List";

			$this->load->view('header',$data);

			$this->load->view('showteacher');

			$this->load->view('footer');

		}

		//================View teacher Data List=============

  		//================Show teacher by Id=================

		function show_teacher_id($id) {

			$data['title'] = "teacher Edit";

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('teacher_model');

			//Transfering data to Model

			$query = $this->teacher_model->show_teacher_id($id);

			$data['ecms'] = $query;

			$this->load->view('header',$data);

			$this->load->view('teacheredit', $data);

			$this->load->view('footer');

		}

   		//================Show teacher by Id=================

  	 	//================Update teacher ====================

		function edit_teacher(){

			//====================Post Data=====================

			$datalist = array(

			//'member_type' => $this->input->post('member_type'),

			'name' => $this->input->post('name'),

			'address' => $this->input->post('address'),

			//'city' => $this->input->post('city'),

			//'state' => $this->input->post('state'),

			//'zip_code' => $this->input->post('zip_code'),

			'phone' => $this->input->post('phone'),

			'email' => $this->input->post('email'),

			//'text_no' => $this->input->post('text_no'),

			'syllabus' => $this->input->post('syllabus'),

			'curriculum' => $this->input->post('curriculum'),

			'course' => $this->input->post('course'),

			'academic_program' => $this->input->post('academic_program'),

			'learning_portal' => $this->input->post('learning_portal'),

			'website' => $this->input->post('website'),

			'domain_name' => $this->input->post('domain_name'),

			'url' => $this->input->post('url'),

			'ipaddress' => $this->input->post('ipaddress'),

			'information' => $this->input->post('information'),

			//'username' => $this->input->post('username'),

			//   	newsreport	information 'password' => $this->input->post('password'),

			'status' => 1

			);

			//====================Post Data===================

			//print_r($datalist); exit();

			$id=$this->input->post('id');  echo $id; 

			$data['title'] = "teacher Edit";

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('teacher_model');

			//Transfering data to Model

			$query = $this->teacher_model->edit_teacher($id,$datalist);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('teacher/successupdate');

		}

		//================Update teacher ====================

  		//=======================Update Success message=========

		function successupdate(){

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('teacher_model');

			//Transfering data to Model

			$query = $this->teacher_model->view_teacher();

			$data['ecms'] = $query;

			$data['title'] = "teacher Data List";

			$datamsg['h1title'] = 'Data Updated Successfully';

			$this->load->view('header',$data);

			$this->load->view('showteacher',$datamsg);

			$this->load->view('footer');

		}

		//=======================Update Success message=========

		//=======================Delete teacher==============

		function delete_teacher($id){

			//Loading  Database

			$this->load->database();

			//Transfering data to Model

			$this->teacher_model->delete_teacher($id);

			$data1['message'] = 'Data Deleted Successfully';

			redirect('teacher/successdelete');

		}

		//======================Delete teacher===============

		//======================Delete Success message==========

		function successdelete(){

			//Loading  Database

			$this->load->database();

			//Calling Model

			$this->load->model('teacher_model');

			//Transfering data to Model

			$query = $this->teacher_model->view_teacher();

			$data['ecms'] = $query;

			$data['title'] = "teacher Data List";

			$datamsg['h1title'] = 'Data Updated Successfully';

			$this->load->view('header',$data);

			$this->load->view('showteacher');

			$this->load->view('footer');

		}

  		//======================Delete Success message==========

		//======================Logout==========================

		public function Logout(){

        	$this->session->sess_destroy();

        	redirect('login');

    	}

		//======================Logout==========================

}



?>



