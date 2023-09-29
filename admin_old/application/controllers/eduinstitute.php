<?php

class Eduinstitute extends CI_Controller {

		//============Constructor to call Model====================

		function __construct() {

			parent::__construct();

			$this->load->model('education_model');

		}

		//============Constructor to call Model====================

		function index(){

			$data['title'] = "Add Educationnal Institute";

			$this->load->view('header',$data);

			$this->load->helper(array('form'));

			$this->load->view('educationadd_view');

			$this->load->view('footer');

		}

		//=======================Insert education Data============

		function add_education(){

			

			//Validating Name Field

			$this->form_validation->set_rules('name', 'Name', 'required|min_length[1]|max_length[25]');

			

			//Validating Address Field

			$this->form_validation->set_rules('address', 'Address', 'required|min_length[1]|max_length[50]');

			

			//Validating Address Field

			$this->form_validation->set_rules('city', 'City', 'required|min_length[1]|max_length[50]');

			

			//Validating Address Field

			$this->form_validation->set_rules('state', 'State', 'required|min_length[1]|max_length[50]');

			

			//Validating Address Field

			$this->form_validation->set_rules('zip_code', 'Zip Code', 'required|min_length[1]|max_length[50]');

			

			//Validating Address Field

			$this->form_validation->set_rules('phone', 'Phone', 'required|min_length[1]|max_length[50]');

			

			//Validating Address Field

			$this->form_validation->set_rules('text_no', 'Text Number', 'required|min_length[1]|max_length[50]');

			

			//Validating Address Field

			$this->form_validation->set_rules('website', 'Web Site', 'required|min_length[1]|max_length[50]');

			

			//Validating Address Field

			$this->form_validation->set_rules('domain_name', 'Domain Name', 'required|min_length[1]|max_length[50]');

			

			

			//Validating Username Field

			$this->form_validation->set_rules('url', 'Url', 'required|min_length[5]|max_length[50]');

			

			//Validating Password Field

			$this->form_validation->set_rules('password', 'Password', 'required');

			

			//Validating Email Field

			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

			

			//Validating Mobile no. Field

			$this->form_validation->set_rules('phone', 'Phone No.', 'required|regex_match[/^[0-9]{10}$/]');

			

			

			if ($this->form_validation->run() == FALSE) {

			$data['title'] = "Add education";

			$this->load->view('header',$data);

			$this->load->view('educationadd_view');

			$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

			'member_type' => $this->input->post('member_type'),

			'name' => $this->input->post('name'),

			'address' => $this->input->post('address'),

			'city' => $this->input->post('city'),

			'state' => $this->input->post('state'),

			'zip_code' => $this->input->post('zip_code'),

			'phone' => $this->input->post('phone'),

			'email' => $this->input->post('email'),

			'text_no' => $this->input->post('text_no'),

			'website' => $this->input->post('website'),

			'domain_name' => $this->input->post('domain_name'),

			'url' => $this->input->post('url'),

			'username' => $this->input->post('username'),

			'password' => $this->input->post('password'),

			'status' => 1

			);

			

			//Transfering data to Model

			$this->education_model->insert_education($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('education/success');

			

			}

		}

		//=======================Insert education Data============

  		//=======================Insertion Success message=========

		function success(){

			$data['h1title'] = 'Data Inserted Successfully';

			$data['title'] = 'Add education';

			$this->load->view('header');

			$this->load->view('educationadd_view',$data);

			$this->load->view('footer');

		}

		//=======================Insertion Success message=========

		//================View education Data List=============

		function view_education(){

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('education_model');

			//Transfering data to Model

			$query = $this->education_model->view_education();

			$data['ecms'] = $query;

			$data['title'] = "education Data List";

			$this->load->view('header',$data);

			$this->load->view('showeducation');

			$this->load->view('footer');

		}

		//================View education Data List=============

  		//================Show education by Id=================

		function show_education_id($id) {

			$data['title'] = "education Edit";

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('education_model');

			//Transfering data to Model

			$query = $this->education_model->show_education_id($id);

			$data['ecms'] = $query;

			$this->load->view('header',$data);

			$this->load->view('educationedit', $data);

			$this->load->view('footer');

		}

   		//================Show education by Id=================

  	 	//================Update education ====================

		function edit_education(){

			//====================Post Data=====================

			$datalist = array(

			'member_type' => $this->input->post('member_type'),

			'name' => $this->input->post('name'),

			'address' => $this->input->post('address'),

			'city' => $this->input->post('city'),

			'state' => $this->input->post('state'),

			'zip_code' => $this->input->post('zip_code'),

			'phone' => $this->input->post('phone'),

			'email' => $this->input->post('email'),

			'text_no' => $this->input->post('text_no'),

			'website' => $this->input->post('website'),

			'domain_name' => $this->input->post('domain_name'),

			'url' => $this->input->post('url'),

			'username' => $this->input->post('username'),

			'password' => $this->input->post('password'),

			'status' => 1

			);

			//====================Post Data===================

			

			$id=$this->input->post('id');

			$data['title'] = "education Edit";

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('education_model');

			//Transfering data to Model

			$query = $this->education_model->edit_education($id,$datalist);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('education/successupdate');

		}

		//================Update education ====================

  		//=======================Update Success message=========

		function successupdate(){

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('education_model');

			//Transfering data to Model

			$query = $this->education_model->view_education();

			$data['ecms'] = $query;

			$data['title'] = "education Data List";

			$datamsg['h1title'] = 'Data Updated Successfully';

			$this->load->view('header',$data);

			$this->load->view('showeducation',$datamsg);

			$this->load->view('footer');

		}

		//=======================Update Success message=========

		//=======================Delete education==============

		function delete_education($id){

			//Loading  Database

			$this->load->database();

			//Transfering data to Model

			$this->education_model->delete_education($id);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('education/successdelete');

		}

		//======================Delete education===============

		//======================Delete Success message==========

		function successdelete(){

			//Loading  Database

			$this->load->database();

			//Calling Model

			$this->load->model('education_model');

			//Transfering data to Model

			$query = $this->education_model->view_education();

			$data['ecms'] = $query;

			$data['title'] = "education Data List";

			$datamsg['h1title'] = 'Data Updated Successfully';

			$this->load->view('header',$data);

			$this->load->view('showeducation');

			$this->load->view('footer');

		}

  		//======================Delete Success message==========

}



?>



