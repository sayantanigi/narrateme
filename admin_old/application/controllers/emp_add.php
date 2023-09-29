<?php

class emp_add extends CI_Controller {

		//============Constructor to call Model====================

		function __construct() {

			parent::__construct();

			$this->load->model('model_employee');

		}

		//============Constructor to call Model====================

		function index(){

			if($this->session->userdata('is_logged_in')){ 

			$data['title'] = "Add teacher";

			$this->load->view('header',$data);

			$this->load->helper(array('form'));

			$this->load->view('add_employee');

			$this->load->view('footer');

			}else{

               redirect('main');



            }

			

			 

		}

		

		public function add_employee(){

		$this->load->view('add_employee');

		}

		//=======================Insert teacher Data============

		public function add_employee_data(){

		//echo "hello";die;

		$date = $this->input->post('join_date');

		$join_date = date( 'Y-m-d', strtotime( $date ) );

		$data = array('employee_id'=>$this->input->post('emp_id'),

		'emp_name'=>$this->input->post('emp_name'),

		'gender'=>$this->input->post('emp_gender'),

		'marital_status'=>$this->input->post('emp_status'),'address'=>$this->input->post('address'),

		'home_phone'=>$this->input->post('emp_home_no'),

		'mobile_phone'=>$this->input->post('emp_mobile_no'),

		'department'=>$this->input->post('emp_designation'),

		'work_email'=>$this->input->post('w_email_id'),

		'private_email'=>$this->input->post('p_email_id'),

		'joined_date'=>$join_date);

		$row = $this->model_employee-> add_employee_data ($data);

		//print_r($row);die;

		echo $html = '<p>'.$row[0]->emp_name.'</p><br>';

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



