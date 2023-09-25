<?php
class Cms extends CI_Controller {
		//============Constructor to call Model====================
		function __construct() {
			parent::__construct();
			$this->load->model('cms_model');
		}
		//============Constructor to call Model====================

		function index(){

			if($this->session->userdata('is_logged_in')){ 

			$this->load->database();

			//Calling Model

			$this->load->model('individual_model');

			//Transfering data to Model

			$query = $this->cms_model->show_cmslist();

			$data['ecms'] = $query;

			$data['title'] = "Cms Page List";

			$this->load->view('header',$data);

			$this->load->helper(array('form'));

			$this->load->view('showcmslist', $data);

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

		//=======================Insert Individual Data============

		

		function add_cms(){

			if($this->session->userdata('is_logged_in')){

				

			$this->load->view('header');

			$this->load->view('add_cms');

			$this->load->view('footer');

			$data['title'] = "Add New Cms";

		

			}else{

				redirect('main');

			}

		}

				//=======================Insert Individual Data============

		function add_individual_cms(){

			if($this->session->userdata('is_logged_in')){
			//Validating Name Field
			$this->form_validation->set_rules('cms_pagetitle', 'Page Title', 'required');

			//Validating Address Field
			$this->form_validation->set_rules('cms_page_heading', 'Heading', 'required');

			//Validating Address Field
			$this->form_validation->set_rules('meta_keywords', 'Meta Keyword', 'required');

			//Validating Address Field
			$this->form_validation->set_rules('meta_description', 'Meta Descriptions', 'required');

			//Validating Address Field
			//$this->form_validation->set_rules('cmsmap', 'Address Map', 'required');

			//Validating Address Field
			$this->form_validation->set_rules('cms_pagedes', 'Descriptions', 'required');


			if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Add CMS";
			
			//echo "false";
			//exit();
			
			$this->load->view('header',$data);
			$this->load->view('add_cms');
			$this->load->view('footer');
			}else {
			
			$config = array(
				'upload_path' => "uploads/",
				'upload_url' => base_url() . "uploads/",
				'allowed_types' => "gif|jpg|png|jpeg|pdf"
			);
			
			//echo "kjhkjhkjhkjhkjh";
			//exit();
			
			$this->load->library('upload', $config);
			if ($this->upload->do_upload("userfile")) {
			$data['img'] = $this->upload->data();
			$data['img']['file_name'];
			
			//Setting values for tabel columns
			$data = array(			
			'cms_pagetitle' => $this->input->post('cms_pagetitle'),  
			'cms_page_heading' => $this->input->post('cms_page_heading'),
			'cmsimg' => $data['img']['file_name'],
			'cmsmap' => mysql_real_escape_string($this->input->post('cmsmap')),
			'meta_keywords' => $this->input->post('meta_keywords'),
			'meta_description' => $this->input->post('meta_description'),
			'cms_pagedes' => $this->input->post('cms_pagedes')		
			);
			
			//Transfering data to Model
			$query=$this->cms_model->insert_new_cms($data);
			$data['ecms'] = $query;
			$data['title'] = "Add CMS";

			$data1['message'] = 'Data Inserted Successfully';
			
			$this->load->view('header',$data);
			$this->load->view('add_cms',$data);
			$this->load->view('footer');
			}else{
				
			$data = array(			
			'cms_pagetitle' => $this->input->post('cms_pagetitle'),  
			'cms_page_heading' => $this->input->post('cms_page_heading'),
			'cmsmap' => mysql_real_escape_string($this->input->post('cmsmap')),
			'meta_keywords' => $this->input->post('meta_keywords'),
			'meta_description' => $this->input->post('meta_description'),
			'cms_pagedes' => $this->input->post('cms_pagedes')		
			);
			//print_r($data); 
			//Transfering data to Model
			$query=$this->cms_model->insert_new_cms($data);
			//$this->db->last_query();
			$data['ecms'] = $query;
			$data['title'] = "Add CMS";

			$data1['message'] = 'Data Inserted Successfully';
			
			$this->load->view('header',$data);
			$this->load->view('add_cms',$data);
			$this->load->view('footer');
				
				}
			}

			}else{
				redirect('main');
			}
		}
		//=======================Insert Individual Data============

			

			

			

			

		

		//================View Individual Data List=============

  		//================Show Individual by Id=================

		function show_individual_cms_id($id) {

			if($this->session->userdata('is_logged_in')){

			

			 $id = $this->uri->segment(3); 

			//exit();

			$data['title'] = "Edit Cms";

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('cms_model');

			//Transfering data to Model

			$query = $this->cms_model->show_individual_cms_id($id);

			$data['ecms'] = $query;

			$this->load->view('header',$data);

			$this->load->view('cms_edit', $data);

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

   		//================Show Individual by Id=================
  	 	//================Update Individual ====================

		function edit_cms_individual(){

			if($this->session->userdata('is_logged_in')){
			
			$config = array(
				'upload_path' => "uploads/",
				'upload_url' => base_url() . "uploads/",
				'allowed_types' => "gif|jpg|png|jpeg|pdf"
			);
			
			$this->load->library('upload', $config);
			if ($this->upload->do_upload("userfile")) {
				$data['img'] = $this->upload->data();
			
			$datalist = array(			
			'cms_pagetitle' => $this->input->post('cms_pagetitle'),  
			'cms_page_heading' => $this->input->post('cms_page_heading'),
			'cmsimg' => $data['img']['file_name'],
			'cmsmap' => mysql_real_escape_string($this->input->post('cmsmap')),
			'meta_keywords' => $this->input->post('meta_keywords'),
			'meta_description' => $this->input->post('meta_description'),
			'cms_pagedes' => $this->input->post('cms_pagedes')		
			);
			
			//====================Post Data===================
			$id = $this->input->post('cms_id');
			$data['title'] = "Individual Edit";
			//loading database
			$this->load->database();
			//Calling Model
			$this->load->model('cms_model');
			
			//Transfering data to Model
			$query = $this->cms_model->edit_cms_individual($id,$datalist);
			$data1['message'] = 'Data Update Successfully';
			$query = $this->cms_model->show_cmslist();
			$data['ecms'] = $query;
			$data['title'] = "Cms Page List";
			
			$this->load->view('header',$data);
			$this->load->view('showcmslist', $data1);
			$this->load->view('footer');
			}else{
			
			$datalist = array(			
			'cms_pagetitle' => $this->input->post('cms_pagetitle'),  
			'cms_page_heading' => $this->input->post('cms_page_heading'),
			'cmsmap' => mysql_real_escape_string($this->input->post('cmsmap')),
			'meta_keywords' => $this->input->post('meta_keywords'),
			'meta_description' => $this->input->post('meta_description'),
			'cms_pagedes' => $this->input->post('cms_pagedes')		
			);
			
			//====================Post Data===================
			$id = $this->input->post('cms_id');
			$data['title'] = "Individual Edit";
			//loading database
			$this->load->database();
			//Calling Model
			$this->load->model('cms_model');
			
			//Transfering data to Model
			$query = $this->cms_model->edit_cms_individual($id,$datalist);
			$data1['message'] = 'Data Update Successfully';
			$query = $this->cms_model->show_cmslist();
			$data['ecms'] = $query;
			$data['title'] = "Cms Page List";
			
			$this->load->view('header',$data);
			$this->load->view('showcmslist', $data1);
			$this->load->view('footer');
			
				
			}

			}else{

				redirect('main');

			}

		}
		//================Update Individual ====================

  		//=======================Update Success message=========

		function successupdate(){

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('cms_model');

			//Transfering data to Model

			$query = $this->individual_model->view_individual();

			$data['ecms'] = $query;

			$data['title'] = "Individual Data List";

			$datamsg['h1title'] = 'Data Updated Successfully';

			$this->load->view('header',$data);

			$this->load->view('showcmslist',$datamsg);

			$this->load->view('footer');

		}

		//=======================Update Success message=========

		//=======================Delete Individual==============

		function delete_cms($id){

			if($this->session->userdata('is_logged_in')){

			

			//Loading  Database

			$this->load->database();

			//Transfering data to Model

			$this->cms_model->delete_cms($id);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('cms/successdelete');

		

			}else{

				redirect('main');

			}

		}

		//======================Delete Individual===============

		//======================Delete Success message==========

		function successdelete(){

			//Loading  Database

			$this->load->database();

			//Calling Model

			$this->load->model('cms_model');



			//Transfering data to Model

			$query = $this->cms_model->view_cms();

			$data['ecms'] = $query;

			$data['title'] = "Individual Data List";

			$datamsg['h1title'] = 'Data Updated Successfully';

			$this->load->view('header',$data);

			$this->load->view('showcmslist');

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



