<?php

defined('BASEPATH') OR exit('No direct script access allowed'); 

class Add_employee extends CI_Controller {

	public function __construct(){

		parent::__construct();

		$this->load->helper(array('url'));

		$this->load->model('model_employee');

		$this->load->view('add_employee');

	}

	public function add_employee(){

		$this->load->view('add_employee');

	}

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

}



