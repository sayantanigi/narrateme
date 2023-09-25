<?php

class Social extends CI_Controller {

		//============Constructor to call Model====================

		function __construct() {

			parent::__construct();

			$this->load->model('social_model');

		}

		//============Constructor to call Model====================

		function index(){

			if($this->session->userdata('is_logged_in')){ 

			$data['title'] = "Add Social Media ";

			$this->load->view('header',$data);

			$this->load->helper(array('form'));

			$this->load->view('socialadd_view');

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

            redirect('login');

        }

    }

		//=======================Insert Profile Data============

		function add_social(){

			

			

			//Validating Name Field

			$this->form_validation->set_rules('name', 'Name', 'required|min_length[1]|max_length[25]');

			

			//Validating Address Field

			$this->form_validation->set_rules('description', 'Description', 'required|min_length[1]|max_length[300]');

			

			//Validating Address Field

			$this->form_validation->set_rules('ip_address', 'Ip Address', 'required|min_length[1]|max_length[50]');

			

			//Validating Address Field

			$this->form_validation->set_rules('website', 'Website', 'required|min_length[1]|max_length[50]');

			

			//Validating Address Field

			$this->form_validation->set_rules('domain_name', 'Domain Name', 'required|min_length[1]|max_length[50]');

			

			//Validating Address Field

			$this->form_validation->set_rules('url', 'Url', 'required|min_length[1]|max_length[50]');

			

			//Validating Address Field

			$this->form_validation->set_rules('marking_media', 'Marking Media', 'required|min_length[1]|max_length[50]');

			

			//Validating Address Field

			$this->form_validation->set_rules('add_meterial', 'Add Meterial', 'required|min_length[1]|max_length[50]');

			

			//Validating Address Field

			$this->form_validation->set_rules('marketing_meterial', 'Marketing Meterial', 'required|min_length[1]|max_length[50]');

			

			

			//Validating Username Field

			$this->form_validation->set_rules('commercials', 'Commercials', 'required|min_length[1]|max_length[50]');

			

			//Validating Password Field

			$this->form_validation->set_rules('infomercials', 'infomercials', 'required|min_length[1]|max_length[50]');

			

			//Validating Email Field

			$this->form_validation->set_rules('media_link', 'Media Link', 'required|min_length[1]|max_length[50]');

			

			//Validating Mobile no. Field

			$this->form_validation->set_rules('network_site', 'Network Site',  'required|min_length[1]|max_length[50]');

			

			

			if ($this->form_validation->run() == FALSE) {

			$data['title'] = "Add Social";

			$this->load->view('header',$data);

			$this->load->view('socialadd_view');

			$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

							'name' => $this->input->post('name'),

							'description' => $this->input->post('description'),

							'ip_address' => $this->input->post('ip_address'),

							'website' => $this->input->post('website'),

							'domain_name' => $this->input->post('domain_name'),

							'url' => $this->input->post('url'),

							'marking_media' => $this->input->post('marking_media'),

							'add_meterial' => $this->input->post('add_meterial'),

							'marketing_meterial' => $this->input->post('marketing_meterial'),

							'commercials' => $this->input->post('commercials'),

							'infomercials' => $this->input->post('infomercials'),

							'media_link' => $this->input->post('media_link'),

							'network_site' => $this->input->post('network_site'),

							'email' => $this->input->post('email'),

							'status' => 1

			 );

			

			//Transfering data to Model

			$this->social_model->insert_social($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('social/success');

			

			}

		}

		//=======================Insert Individual Data============

  		//=======================Insertion Success message=========

		function success(){

			$data['h1title'] = 'Data Inserted Successfully';

			$data['title'] = 'Add Social';

			$this->load->view('header');

			$this->load->view('socialadd_view',$data);

			$this->load->view('footer');

		}

		//=======================Insertion Success message=========

		//================View Individual Data List=============

		function view_social(){

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('social_model');

			//Transfering data to Model

			$query = $this->social_model->view_social();

			$data['ecms'] = $query;

			$data['title'] = "Social Data List";

			$this->load->view('header',$data);

			$this->load->view('showsocial');

			$this->load->view('footer');

		}

		//================View Individual Data List=============

  		//================Show Individual by Id=================

		function show_social_id($id) {

			$data['title'] = "Social Edit";

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('social_model');

			//Transfering data to Model

			$query = $this->social_model->show_social_id($id);

			$data['ecms'] = $query;

			$this->load->view('header',$data);

			$this->load->view('socialedit', $data);

			$data['title'] = "Edit Data List";

			$this->load->view('footer');

		}

   		//================Show Individual by Id=================

  	 	//================Update Individual ====================

		function edit_social(){

			//====================Post Data=====================

			$datalist = array(

							'name' => $this->input->post('name'),

							'description' => $this->input->post('description'),

							'ip_address' => $this->input->post('ip_address'),

							'website' => $this->input->post('website'),

							'domain_name' => $this->input->post('domain_name'),

							'url' => $this->input->post('url'),

							'marking_media' => $this->input->post('marking_media'),

							'add_meterial' => $this->input->post('add_meterial'),

							'marketing_meterial' => $this->input->post('marketing_meterial'),

							'commercials' => $this->input->post('commercials'),

							'infomercials' => $this->input->post('infomercials'),

							'media_link' => $this->input->post('media_link'),

							'network_site' => $this->input->post('network_site'),

							'email' => $this->input->post('email'),

							'status' => 1

			);

			//====================Post Data===================

			

			$id=$this->input->post('id');

			$data['title'] = "Social Edit";

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('social_model');

			//Transfering data to Model

			$query = $this->social_model->edit_social($id,$datalist);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('social/successupdate');

		}

		//================Update Individual ====================

  		//=======================Update Success message=========

		function successupdate(){

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('social_model');

			//Transfering data to Model

			$query = $this->social_model->view_social();

			$data['ecms'] = $query;

			$data['title'] = "Individual Data List";

			$datamsg['h1title'] = 'Data Updated Successfully';

			$this->load->view('header',$data);

			$this->load->view('showsocial',$datamsg);

			$this->load->view('footer');

		}

		//=======================Update Success message=========

		//=======================Delete Individual==============

		function delete_social($id){

			//Loading  Database

			$this->load->database();

			//Transfering data to Model

			$this->social_model->delete_social($id);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('social/successdelete');

		}

		//======================Delete Individual===============

		//======================Delete Success message==========

		function successdelete(){

			//Loading  Database

			$this->load->database();

			//Calling Model

			$this->load->model('social_model');

			//Transfering data to Model

			$query = $this->social_model->view_social();

			$data['ecms'] = $query;

			$data['title'] = "Individual Data List";

			$datamsg['h1title'] = 'Data Updated Successfully';

			$this->load->view('header',$data);

			$this->load->view('showsocial');

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



