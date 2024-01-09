<?php

class Friends extends CI_Controller {

		//============Constructor to call Model====================

		function __construct() {

			parent::__construct();

			$this->load->model('showfriend_model');

		}

		//============Constructor to call Model====================

		function index(){

			if($this->session->userdata('is_logged_in')){ 

			//Transfering data to Model

			$this->load->model('showfriend_model');

			$this->load->helper('string');

			//$query = $this->member_model->get_country();

			$querycoun = $this->member_model->get_country();

			$data['ecntr'] = $querycoun;

			//print_r($data);

			$data['title'] = "Add Member";

			$this->load->view('header',$data);

			$this->load->helper(array('form'));

			$this->load->view('memberadd_view');

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

		//=======================Insert newsmedia Data============



		

		


		function view_friends(){
	
		 $rdur3=$this->uri->segment(3); // Value or id from url
	   
			if($this->session->userdata('is_logged_in')){

			

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('showfriend_model');

			//Transfering data to Model

			$query = $this->showfriend_model->view_friendlist($rdur3);

			$data['friendlist'] = $query;

			$data['title'] = "Friend List";

			$this->load->view('header',$data);

			$this->load->view('showfriend');

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}
		
	

		

 

		//======================Logout==========================

		public function Logout(){

        	$this->session->sess_destroy();

        	redirect('login');

    	}

		//======================Logout==========================

}



?>



