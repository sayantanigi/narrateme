<?php

class Audio extends CI_Controller {

		//============Constructor to call Model====================

		function __construct() {

			parent::__construct();

			$this->load->model('audio_model');

		}

		//============Constructor to call Model====================

		function index(){

			if($this->session->userdata('is_logged_in')){ 

			$data['title'] = "Add audio";

			$this->load->view('header',$data);

			$this->load->helper(array('form'));

			$this->load->view('audioadd_view');

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

		function add_audio(){

			if($this->session->userdata('is_logged_in')){

			

			

			//Validating Name Field

			$this->form_validation->set_rules('audio_date', 'audio Date', 'required|min_length[1]|max_length[25]');

			

			//Validating Address Field

			$this->form_validation->set_rules('link_rec_audio', 'Link Rec audio', 'required|min_length[1]|max_length[300]');

			

			//Validating Address Field

			$this->form_validation->set_rules('ip_live_cam', 'Ip Live Cam', 'required|min_length[1]|max_length[50]');

			

			

			if ($this->form_validation->run() == FALSE) {

			$data['title'] = "Add audio";

			$this->load->view('header',$data);

			$this->load->view('audioadd_view');

			$this->load->view('footer');

			}else {

			//Setting values for tabel columns

			$data = array(

						'audio_date' => date('Y-m-d H:i:s',strtotime($this->input->post('audio_date'))),

						'description' => mysql_real_escape_string(stripcslashes(trim($this->input->post('description')))),

						'link_rec_audio' => $this->input->post('link_rec_audio'),

						'ip_live_cam' => $this->input->post('ip_live_cam'),

						'status' => 1

			 );

			

			//Transfering data to Model

			$this->audio_model->add_audio($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('audio/success');

			}

			}else{

				redirect('main');

			}

		}

		//=======================Insert Individual Data============

  		//=======================Insertion Success message=========

		function success(){

			$data['h1title'] = 'Data Inserted Successfully';

			$data['title'] = 'Add audio';

			$this->load->view('header');

			$this->load->view('audioadd_view',$data);

			$this->load->view('footer');

		}

		//=======================Insertion Success message=========

		//================View Individual Data List=============

		function view_audio(){

			if($this->session->userdata('is_logged_in')){

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('audio_model');

			//Transfering data to Model

			$query = $this->audio_model->view_audio();

			$data['ecms'] = $query;

			$data['title'] = "audio Data List";

			$this->load->view('header',$data);

			$this->load->view('showaudio');

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

		//================View Individual Data List=============

  		//================Show Individual by Id=================

		function show_audio_id($id) {

			if($this->session->userdata('is_logged_in')){

			

			$data['title'] = "audio Edit";

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('audio_model');

			//Transfering data to Model

			$query = $this->audio_model->show_audio_id($id);

			$data['ecms'] = $query;

			$this->load->view('header',$data);

			$this->load->view('audioedit', $data);

			$data['title'] = "Edit Data List";

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

   		//================Show Individual by Id=================

  	 	//================Update Individual ====================

		function edit_audio(){

			if($this->session->userdata('is_logged_in')){

			

			//====================Post Data=====================

			$datalist = array(

							'audio_date' => date('Y-m-d',strtotime($this->input->post('audio_date'))),

							'link_rec_audio' => $this->input->post('link_rec_audio'),

							'ip_live_cam' => $this->input->post('ip_live_cam'),

							'status' => $this->input->post('status'),

							'description' =>mysql_real_escape_string(stripcslashes(trim($this->input->post('description'))))

							

			);

			//====================Post Data===================

			$id=$this->input->post('id');

			$data['title'] = "audio Edit";

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('audio_model');

			//Transfering data to Model

			$query = $this->audio_model->edit_audio($id,$datalist);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('audio/successupdate');

		

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

			$this->load->model('audio_model');

			//Transfering data to Model

			$query = $this->audio_model->view_audio();

			$data['ecms'] = $query;

			$data['title'] = "audio  List";

			$datamsg['h1title'] = 'Data Updated Successfully';

			$this->load->view('header',$data);

			$this->load->view('showaudio',$datamsg);

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

		//=======================Update Success message=========

		//=======================Delete Individual==============

		function delete_audio($id){

			if($this->session->userdata('is_logged_in')){

			

			//Loading  Database

			$this->load->database();

			//Transfering data to Model

			$this->audio_model->delete_audio($id);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('audio/successdelete');

		

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

			$this->load->model('audio_model');

			//Transfering data to Model

			$query = $this->audio_model->view_audio();

			$data['ecms'] = $query;

			$data['title'] = "Individual Data List";

			$datamsg['h1title'] = 'Data Updated Successfully';

			$this->load->view('header',$data);

			$this->load->view('showaudio');

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



