<?php

class Studentaward extends CI_Controller {

		//============Constructor to call Model====================

		function __construct() {

			parent::__construct();

			$this->load->model('student_model');

		}

		//============Constructor to call Model====================

		function index(){

			if($this->session->userdata('is_logged_in')){ 

			$data['title'] = "Add Individual";

			$this->load->view('header',$data);

			$this->load->helper(array('form'));

			$this->load->view('individualadd_view');

			$this->load->view('footer');

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

		//=======================Insert Award Data=================

		function add_student_award(){

			

			//Validating Name Field

			$this->form_validation->set_rules('award_name', 'Award Name', 'required|min_length[1]|max_length[50]');

			

			//Validating Address Field

			$this->form_validation->set_rules('award_date', 'Award Date', 'required|min_length[1]|max_length[50]');

			

			if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add Student Award";

				$this->load->view('header',$data);

				$this->load->view('studentawardadd_view');

				$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

				'award_name' => mysql_real_escape_string(strip_tags(trim($this->input->post('award_name')))),

				'award_date' => mysql_real_escape_string(strip_tags(trim(date('Y-m-d H:i:s',strtotime($this->input->post('award_date')))))),

				'award_description' => mysql_real_escape_string(strip_tags(trim($this->input->post('award_description')))),

				'student_id' => $this->input->post('student_id'),

				'status' => 1

			);

			//Transfering data to Model

			$this->student_model->insert_award($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('studentaward/success');

			

			}

		}

		//=======================Insert Award Data=================

  		//=======================Insertion Success message=========

		function success(){

			$data['h1title'] = 'Data Inserted Successfully';

			$data['title'] = 'Add Student Award';

			$this->load->view('header');

			$this->load->view('studentawardadd_view',$data);

			$this->load->view('footer');

		}

		//=======================Insertion Success message=========

		//================View Individual Data List=============

		function view_student_award(){

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('student_model');

			//Transfering data to Model

			$query = $this->student_model->view_awarddetails();

			$data['ecms'] = $query;

			$data['title'] = "Students Award List";

			$this->load->view('header',$data);

			$this->load->view('showstudentaward');

			$this->load->view('footer');

		}

		

		//================Insert Student Award==================

		function insert_student_award(){

			

			//Validating Name Field

			$this->form_validation->set_rules('award_name', 'Award Name', 'required|min_length[1]|max_length[50]');

			

			//Validating Address Field

			$this->form_validation->set_rules('award_date', 'Award Date', 'required|min_length[1]|max_length[50]');

			

			if ($this->form_validation->run() == FALSE) {

				$data['title'] = "Add Student Award";

				$this->load->view('header',$data);

				$this->load->view('studentawardadd_view');

				$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

				'award_name' => mysql_real_escape_string(strip_tags(trim($this->input->post('award_name')))),

				'award_date' => mysql_real_escape_string(strip_tags(trim($this->input->post('award_date')))),

				'award_description' => mysql_real_escape_string(strip_tags(trim($this->input->post('award_description')))),

				'student_id' => $this->input->post('student_id'),

				'status' => 1

			);

			//Transfering data to Model

			$this->student_model->insert_award($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('studentaward/success');

			

			}

		}

		//================Insert Student Award==================

		//================View Individual Data List=============

  		

		//=======================Show  by Id=================

		function show_award_id($id) {

			$data['title'] = "Award Edit";

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('student_model');

			//Transfering data to Model

			$query = $this->student_model->show_award_id($id);

			$data['ecms'] = $query;

			$this->load->view('header',$data);

			$this->load->view('awardedit', $data);

			$this->load->view('footer');

		}

   		//======================Show  by Id=================

   		

  	 	//================Update Individual ====================

		function edit_award(){

			//====================Post Data=====================

			$datalist = array(

			'award_name' => $this->input->post('award_name'),

			'award_date' => date('Y-m-d H:i:s',strtotime($this->input->post('award_date'))),

			'award_description' => $this->input->post('award_description'),

			'status' => $this->input->post('status')

			);

			//====================Post Data===================

		

			

			$id=$this->input->post('id');

			$data['title'] = "Award Edit";

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('student_model');

			//Transfering data to Model

			$query = $this->student_model->edit_studentaward($id,$datalist);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('studentaward/successupdate');

		}

		//================Update Individual ====================

  		//=======================Update Success message=========

		function successupdate(){

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('student_model');

			//Transfering data to Model

			$query = $this->student_model->view_awarddetails();

			$data['ecms'] = $query;

			$data['title'] = "Students Award List";

			$this->load->view('header',$data);

			$this->load->view('showstudentaward');

			$this->load->view('footer');

		}

		//=======================Update Success message=========

		//=======================Delete Individual==============

		function delete_award($id){

			//Loading  Database

			$this->load->database();

			//Transfering data to Model

			$this->student_model->delete_award($id);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('studentaward/successdelete');

		}

		//======================Delete Individual===============

		//======================Delete Success message==========

		function successdelete(){

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('student_model');

			//Transfering data to Model

			$query = $this->student_model->view_awarddetails();

			$data['ecms'] = $query;

			$data['title'] = "Students Award List";

			$this->load->view('header',$data);

			$this->load->view('showstudentaward');

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



