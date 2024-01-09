<?php

class newsmedia extends CI_Controller {

		//============Constructor to call Model====================

		function __construct() {

			parent::__construct();

			$this->load->model('newsmedia_model');

		}

		//============Constructor to call Model====================

		function index(){

			if($this->session->userdata('is_logged_in')){ 

			$data['title'] = "Add newsmedia";

			$this->load->view('header',$data);

			$this->load->helper(array('form'));

			$this->load->view('newsmediaadd_view');

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

		function add_newsmedia(){

			if($this->session->userdata('is_logged_in')){

				

			

			//Validating Name Field

			$this->form_validation->set_rules('name', 'Name', 'required|min_length[1]|max_length[25]');

			

			//Validating Address Field

			$this->form_validation->set_rules('website', 'Web Site', 'required|min_length[1]|max_length[50]');

			

			//Validating Address Field

			$this->form_validation->set_rules('domain_name', 'Domain Name', 'required|min_length[1]|max_length[50]');

			

			//Validating Username Field

			$this->form_validation->set_rules('url', 'Url', 'required|min_length[5]|max_length[50]');

			

			if ($this->form_validation->run() == FALSE) {

			$data['title'] = "Add newsmedia";

			$this->load->view('header',$data);

			$this->load->view('newsmediaadd_view');

			$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

			'name' => $this->input->post('name'),

			'website' => $this->input->post('website'),

			'domain_name' => $this->input->post('domain_name'),

			'url' => $this->input->post('url'),

			'ipaddress' => $this->input->post('ipaddress'),

			'information' => $this->input->post('information'),

			'newsreport' => $this->input->post('newsreport'),

			'status' => 1

			);

			

			//Transfering data to Model

			$this->newsmedia_model->insert_newsmedia($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('newsmedia/success');

			

			}

		

			}else{

				redirect('main');

			}

		}

		//=======================Insert newsmedia Data============

  		//=======================Insertion Success message=========

		

		

		function success(){

			if($this->session->userdata('is_logged_in')){

				

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('newsmedia_model');

			//Transfering data to Model

			$query = $this->newsmedia_model->view_newsmedia();

			$data['ecms'] = $query;

			$data['title'] = "Add newsmedia";

			$datamsg['h1title'] = 'Data Inserted Successfully';

			$this->load->view('header',$data);

			$this->load->view('shownewsmedia',$datamsg);

			$this->load->view('footer'); 

			

		

			}else{

				redirect('main');

			}

		}

		//=======================Insertion Success message=========

		//================View newsmedia Data List=============

		function view_newsmedia(){

			if($this->session->userdata('is_logged_in')){

			

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('newsmedia_model');

			//Transfering data to Model

			$query = $this->newsmedia_model->view_newsmedia();

			$data['ecms'] = $query;

			$data['title'] = "newsmedia Data List";

			$this->load->view('header',$data);

			$this->load->view('shownewsmedia');

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

		//================View newsmedia Data List=============

  		//================Show newsmedia by Id=================

		function show_newsmedia_id($id) {

			if($this->session->userdata('is_logged_in')){

				

			$data['title'] = "newsmedia Edit";

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('newsmedia_model');

			//Transfering data to Model

			$query = $this->newsmedia_model->show_newsmedia_id($id);

			$data['ecms'] = $query;

			$this->load->view('header',$data);

			$this->load->view('newsmediaedit', $data);

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

   		//================Show newsmedia by Id=================

  	 	//================Update newsmedia ====================

		function edit_newsmedia(){

			if($this->session->userdata('is_logged_in')){

				

			//====================Post Data=====================

			$datalist = array(

			'name' => $this->input->post('name'),

			'website' => $this->input->post('website'),

			'domain_name' => $this->input->post('domain_name'),

			'url' => $this->input->post('url'),

			'ipaddress' => $this->input->post('ipaddress'),

			'information' => $this->input->post('information'),

			'newsreport' => $this->input->post('newsreport'),

			'status' => 1

			);

			//====================Post Data===================

			

			$id=$this->input->post('id');  echo $id; 

			$data['title'] = "newsmedia Edit";

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('newsmedia_model');

			//Transfering data to Model

			$query = $this->newsmedia_model->edit_newsmedia($id,$datalist);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('newsmedia/successupdate');

		

			}else{

				redirect('main');

			}

		}

		//================Update newsmedia ====================

  		//=======================Update Success message=========

		function successupdate(){

			if($this->session->userdata('is_logged_in')){

				

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('newsmedia_model');

			//Transfering data to Model

			$query = $this->newsmedia_model->view_newsmedia();

			$data['ecms'] = $query;

			$data['title'] = "newsmedia Data List";

			$datamsg['h1title'] = 'Data Updated Successfully';

			$this->load->view('header',$data);

			$this->load->view('shownewsmedia',$datamsg);

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

		//=======================Update Success message=========

		//=======================Delete newsmedia==============

		function delete_newsmedia($id){

			if($this->session->userdata('is_logged_in')){

				

			//Loading  Database

			$this->load->database();

			//Transfering data to Model

			$this->newsmedia_model->delete_newsmedia($id);

			$data1['message'] = 'Data Deleted Successfully';

			redirect('newsmedia/successdelete');

		

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

			$this->load->model('newsmedia_model');

			//Transfering data to Model

			$query = $this->newsmedia_model->view_newsmedia();

			$data['ecms'] = $query;

			$data['title'] = "newsmedia Data List";

			$datamsg['h1title'] = 'Data Updated Successfully';

			$this->load->view('header',$data);

			$this->load->view('shownewsmedia');

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



