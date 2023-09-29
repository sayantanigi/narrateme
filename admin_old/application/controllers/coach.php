<?php

class Coach extends CI_Controller {

		//============Constructor to call Model====================

		function __construct() {

			parent::__construct();

			$this->load->model('coach_model');

		}

		//============Constructor to call Model====================

		function index(){

			if($this->session->userdata('is_logged_in')){ 

			$data['title'] = "Add Coach";

			$this->load->view('header',$data);

			$this->load->helper(array('form'));

			$this->load->view('coachadd_view');

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

		//=======================Insert Profile Data============

		function add_coach(){

			if($this->session->userdata('is_logged_in')){

			

			

			

			//Validating Name Field

			$this->form_validation->set_rules('name', 'Name', 'required|min_length[1]|max_length[25]');

			

			//Validating Address Field

			$this->form_validation->set_rules('sample', 'Sample', 'required|min_length[1]|max_length[300]');

			

			//Validating Address Field

			$this->form_validation->set_rules('phone', 'Phone', 'required|min_length[1]|max_length[50]');

			

			//Validating Address Field

			$this->form_validation->set_rules('email', 'Email', 'required|min_length[1]|max_length[50]');

			

			

			

			

			if ($this->form_validation->run() == FALSE) {

			$data['title'] = "Add Coach";

			$this->load->view('header',$data);

			$this->load->view('coachadd_view');

			$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

							'name' => $this->input->post('name'),

							'sample' => $this->input->post('sample'),

							'phone' => $this->input->post('phone'),

							'email' => $this->input->post('email'),

							'description' => mysql_real_escape_string(stripcslashes(trim($this->input->post('description')))),

							'status' => 1

			 );

			

			//Transfering data to Model

			$this->coach_model->add_coach($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('coach/success');

			

			}

		

			}else{

				redirect('main');

			}

		}

		//=======================Insert Individual Data============

  		//=======================Insertion Success message=========

		function success(){

			$data['h1title'] = 'Data Inserted Successfully';

			$data['title'] = 'Add Coach';

			$this->load->view('header');

			$this->load->view('coachadd_view',$data);

			$this->load->view('footer');

		}

		//=======================Insertion Success message=========

		//================View Individual Data List=============

		function view_coach(){

			if($this->session->userdata('is_logged_in')){

			

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('coach_model');

			//Transfering data to Model

			$query = $this->coach_model->view_coach();

			$data['ecms'] = $query;

			$data['title'] = "Coach Data List";

			$this->load->view('header',$data);

			$this->load->view('showcoach');

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

		//================View Individual Data List=============

  		//================Show Individual by Id=================

		function show_coach_id($id) {

			if($this->session->userdata('is_logged_in')){

			

			$data['title'] = "Coach Edit";

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('coach_model');

			//Transfering data to Model

			$query = $this->coach_model->show_coach_id($id);

			$data['ecms'] = $query;

			$this->load->view('header',$data);

			$this->load->view('coachedit', $data);

			$data['title'] = "Edit Data List";

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

   		//================Show Individual by Id=================

  	 	//================Update Individual ====================

		function edit_coach(){

			if($this->session->userdata('is_logged_in')){

			

			//====================Post Data=====================

			$datalist = array(

							'name' => $this->input->post('name'),

							'sample' => $this->input->post('sample'),

							'phone' => $this->input->post('phone'),

							'email' => $this->input->post('email'),

							'status' => $this->input->post('status'),

							'description' =>mysql_real_escape_string(stripcslashes(trim($this->input->post('description'))))

							

			);

			//====================Post Data===================

			$id=$this->input->post('id');

			$data['title'] = "Coach Edit";

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('coach_model');

			//Transfering data to Model

			$query = $this->coach_model->edit_coach($id,$datalist);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('coach/successupdate');

		

			}else{

				redirect('main');

			}

		}

		//================Update Individual ====================

  		//=======================Update Success message=========

		function successupdate(){

			if($this->session->userdata('is_logged_in')){

			

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('coach_model');

			//Transfering data to Model

			$query = $this->coach_model->view_coach();

			$data['ecms'] = $query;

			$data['title'] = "Coach  List";

			$datamsg['h1title'] = 'Data Updated Successfully';

			$this->load->view('header',$data);

			$this->load->view('showcoach',$datamsg);

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

		//=======================Update Success message=========

		//=======================Delete Individual==============

		function delete_coach($id){

			if($this->session->userdata('is_logged_in')){

			

			//Loading  Database

			$this->load->database();

			//Transfering data to Model

			$this->coach_model->delete_coach($id);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('coach/successdelete');

		

			}else{

				redirect('main');

			}

		}

		//======================Delete Individual===============

		//======================Delete Success message==========

		function successdelete(){

			if($this->session->userdata('is_logged_in')){

			

			//Loading  Database

			$this->load->database();

			//Calling Model

			$this->load->model('coach_model');

			//Transfering data to Model

			$query = $this->coach_model->view_coach();

			$data['ecms'] = $query;

			$data['title'] = "Individual Data List";

			$datamsg['h1title'] = 'Data Updated Successfully';

			$this->load->view('header',$data);

			$this->load->view('showcoach');

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



