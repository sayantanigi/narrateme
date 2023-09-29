<?php

class institute extends CI_Controller {

		//============Constructor to call Model====================

		function __construct() {

			parent::__construct();

			$this->load->model('institute_model');

		}

		//============Constructor to call Model====================

		function index(){

			if($this->session->userdata('is_logged_in')){ 

			$data['title'] = "Add institute";

			$this->load->view('header',$data);

			$this->load->helper(array('form'));

			$this->load->view('instituteadd_view');

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

		//=======================Insert newsmedia Data============

		function add_institute(){

			if($this->session->userdata('is_logged_in')){

				

			

			//Validating Name Field

			$this->form_validation->set_rules('name', 'Name', 'required|min_length[1]|max_length[25]');

			

			//Validating Description Field

			$this->form_validation->set_rules('description', 'Description', 'required');

			

			//Validating School Bulletin Field

			$this->form_validation->set_rules('school_bulletin', 'Schoolbulletin', 'required|min_length[1]|max_length[200]');

			

			//Validating Instructor Field

			$this->form_validation->set_rules('instructor', 'Instructor', 'required|min_length[1]|max_length[100]');

			

			//Validating Address Field

			$this->form_validation->set_rules('address', 'Address', 'required|min_length[1]|max_length[100]');

			

			//Validating Telephone Field

			$this->form_validation->set_rules('tel_no', 'Telephoneno', 'required|regex_match[/^[0-9]{10}$/]');

			

			//Validating Email Field

			$this->form_validation->set_rules('email', 'Email', 'required|min_length[1]|max_length[50]');

			

			//Validating SMSNo Field

			$this->form_validation->set_rules('sms_no', 'Smsno', 'required|regex_match[/^[0-9]{10}$/]');

			

			//Validating IP-Address Field

			$this->form_validation->set_rules('ip_address', 'Ipaddress', 'required|min_length[1]|max_length[50]');

			

			//Validating Website Field

			$this->form_validation->set_rules('website', 'Website', 'required|min_length[1]|max_length[50]');

			

			//Validating DomainName Field

			$this->form_validation->set_rules('domain_name', 'Domainname', 'required|min_length[1]|max_length[50]');

			

			//Validating Url Field

			$this->form_validation->set_rules('url', 'Url', 'required|min_length[1]|max_length[50]');

			

			//Validating Learning Field

			$this->form_validation->set_rules('learning_portal', 'Learningportal', 'required|min_length[1]|max_length[50]');

			

			//Validating School Field

			$this->form_validation->set_rules('schools', 'Schools', 'required|min_length[1]|max_length[50]');



			if ($this->form_validation->run() == FALSE) {

			$data['title'] = "Add institute";

			$this->load->view('header',$data);

			$this->load->view('instituteadd_view');

			$this->load->view('footer');

			}else {

			//Setting values for tabel columns

		$data = array(

			'name' => $this->input->post('name'),

			'description' => $this->input->post('description'),

			'school_bulletin' => $this->input->post('school_bulletin'),

			'instructor' => $this->input->post('instructor'),

			'address' => $this->input->post('address'),

			'tel_no' => $this->input->post('tel_no'),

			'email' => $this->input->post('email'),

			'sms_no' => $this->input->post('sms_no'),

			'ip_address' => $this->input->post('ip_address'),

			'website' => $this->input->post('website'),

			'domain_name' => $this->input->post('domain_name'),

			'url' => $this->input->post('url'),

			'learning_portal' => $this->input->post('learning_portal'),

			'schools' => $this->input->post('schools'),

			'status' => 1

			);

 

			//Transfering data to Model

			//print_r($data); exit();

			$this->institute_model->add_institute($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('institute/success');

			

			}

		

			}else{

				redirect('main');

			}

		}

		

		function success(){

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('institute_model');

			//Transfering data to Model

			$query = $this->institute_model->view_institute();

			$data['ecms'] = $query;

			$data['title'] = "Add institute";

			$datamsg['h1title'] = 'Data Inserted Successfully';

			$this->load->view('header',$data);

			$this->load->view('showinstitute',$datamsg);

			$this->load->view('footer'); 

			

		}

		//=======================Insertion Success message=========

		//================View newsmedia Data List=============

		function view_institute(){

			if($this->session->userdata('is_logged_in')){

			

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('institute_model');

			//Transfering data to Model

			$query = $this->institute_model->view_institute();

			$data['ecms'] = $query;

			$data['title'] = "institute Data List";

			$this->load->view('header',$data);

			$this->load->view('showinstitute');

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

		//================View newsmedia Data List=============

  		//================Show newsmedia by Id=================

		function show_institute_id($id) {

			if($this->session->userdata('is_logged_in')){

				

			$data['title'] = "institute Edit";

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('institute_model');

			//Transfering data to Model

			$query = $this->institute_model->show_institute_id($id);

			$data['ecms'] = $query;

			$this->load->view('header',$data);

			$this->load->view('instituteedit', $data);

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

   		//================Show newsmedia by Id=================

  	 	//================Update newsmedia ====================

		function edit_institute(){

			if($this->session->userdata('is_logged_in')){

				

			//====================Post Data=====================

			$datalist = array(

			'name' => $this->input->post('name'),

			'description' => $this->input->post('description'),

			'school_bulletin' => $this->input->post('school_bulletin'),

			'instructor' => $this->input->post('instructor'),

			'address' => $this->input->post('address'),

			'tel_no' => $this->input->post('tel_no'),

			'email' => $this->input->post('email'),

			'sms_no' => $this->input->post('sms_no'),

			'ip_address' => $this->input->post('ip_address'),

			'website' => $this->input->post('website'),

			'domain_name' => $this->input->post('domain_name'),

			'url' => $this->input->post('url'),

			'learning_portal' => $this->input->post('learning_portal'),

			'schools' => $this->input->post('schools'),

			'status' => 1

			);

			//====================Post Data===================

			//print_r($datalist); exit();

			$id=$this->input->post('id');  echo $id; 

			$data['title'] = "institute Edit";

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('institute_model');

			//Transfering data to Model

			$query = $this->institute_model->edit_institute($id,$datalist);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('institute/successupdate');

		

			}else{

				redirect('main');

			}

		}

		//================Update newsmedia ====================

  		//=======================Update Success message=========

		function successupdate(){

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('institute_model');

			//Transfering data to Model

			$query = $this->institute_model->view_institute();

			$data['ecms'] = $query;

			$data['title'] = "institute Data List";

			$datamsg['h1title'] = 'Data Updated Successfully';

			$this->load->view('header',$data);

			$this->load->view('showinstitute',$datamsg);

			$this->load->view('footer');

		}

		//=======================Update Success message=========

		//=======================Delete newsmedia==============

		function delete_institute($id){

			if($this->session->userdata('is_logged_in')){

				

			//Loading  Database

			$this->load->database();

			//Transfering data to Model

			$this->institute_model->delete_institute($id);

			$data1['message'] = 'Data Deleted Successfully';

			redirect('institute/successdelete');

		

			}else{

				redirect('main');

			}

		}

		//======================Delete newsmedia===============

		//======================Delete Success message==========

		function successdelete(){

			if($this->session->userdata('is_logged_in')){

				

			//Loading  Database

			$this->load->database();

			//Calling Model

			$this->load->model('institute_model');

			//Transfering data to Model

			$query = $this->institute_model->view_institute();

			$data['ecms'] = $query;

			$data['title'] = "institute Data List";

			$datamsg['h1title'] = 'Data Updated Successfully';

			$this->load->view('header',$data);

			$this->load->view('showinstitute');

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

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



