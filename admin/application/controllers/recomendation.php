<?php

class Recomendation extends CI_Controller {

		//============Constructor to call Model====================

		function __construct() {

			parent::__construct();

			$this->load->model('recomendation_model');

		}

		//============Constructor to call Model====================

		function index(){

			if($this->session->userdata('is_logged_in')){ 

			$data['title'] = "Add Recomendation";

			$this->load->view('header',$data);

			$this->load->helper(array('form'));

			$this->load->view('recomendationadd_view');

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

		//=======================Insert recomendation Data============

		function add_recomendation(){

			if($this->session->userdata('is_logged_in')){

				

			

			//Validating Name Field

			$this->form_validation->set_rules('recomendation_person', 'Recomendation Person', 'required|min_length[1]|max_length[25]');

			

			//Validating Description Field

			$this->form_validation->set_rules('recomendation', 'Recomendation', 'required');

			

			//Validating School Bulletin Field

			$this->form_validation->set_rules('rec_video_link', 'Video Link', 'required|min_length[1]|max_length[200]');

			

			if ($this->form_validation->run() == FALSE) {

			$data['title'] = "Add recomendation";

			$this->load->view('header',$data);

			$this->load->view('recomendationadd_view');

			$this->load->view('footer');

			}else {

			//Setting values for tabel columns

		$data = array(

			'recomendation_person' => $this->input->post('recomendation_person'),

			'recomendation' => $this->input->post('recomendation'),

			'rec_video_link' => $this->input->post('rec_video_link'),

			'status' => 1,

			);

 

			//Transfering data to Model

			//print_r($data); exit();

			$this->recomendation_model->add_recomendation($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('recomendation/success');

			

			}

		

			}else{

				redirect('main');

			}

		}

		

		function success(){

			if($this->session->userdata('is_logged_in')){

				

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('recomendation_model');

			//Transfering data to Model

			$query = $this->recomendation_model->view_recomendation();

			$data['ecms'] = $query;

			$data['title'] = "Add recomendation";

			$datamsg['h1title'] = 'Data Inserted Successfully';

			$this->load->view('header',$data);

			$this->load->view('showrecomendation',$datamsg);

			$this->load->view('footer'); 

			

		

			}else{

				redirect('main');

			}

		}

		//=======================Insertion Success message=========

		//================View newsmedia Data List=============

		function view_recomendation(){

			if($this->session->userdata('is_logged_in')){

				

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('recomendation_model');

			//Transfering data to Model

			$query = $this->recomendation_model->view_recomendation();

			$data['ecms'] = $query;

			$data['title'] = "institute Data List";

			$this->load->view('header',$data);

			$this->load->view('showrecomendation');

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

		//================View newsmedia Data List=============

  		//================Show newsmedia by Id=================

		function show_recomendation_id($id) {

			if($this->session->userdata('is_logged_in')){

				

			$data['title'] = "Recomendation Edit";

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('recomendation_model');

			//Transfering data to Model

			$query = $this->recomendation_model->show_recomendation_id($id);

			$data['ecms'] = $query;

			$this->load->view('header',$data);

			$this->load->view('recomendationedit', $data);

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

   		//================Show newsmedia by Id=================

  	 	//================Update newsmedia ====================

		function edit_recomendation(){

			if($this->session->userdata('is_logged_in')){

				

			//====================Post Data=====================

			$datalist = array(

			'recomendation_person' => $this->input->post('recomendation_person'),

			'recomendation' => $this->input->post('recomendation'),

			'rec_video_link' => $this->input->post('rec_video_link'),

			'status' => $this->input->post('status')

			);

			//====================Post Data===================

			//print_r($datalist); exit();

			$id=$this->input->post('id');  echo $id; 

			$data['title'] = "Recomendation Edit";

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('recomendation_model');

			//Transfering data to Model

			$query = $this->recomendation_model->edit_recomendation($id,$datalist);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('recomendation/successupdate');

		

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

			$this->load->model('recomendation_model');

			//Transfering data to Model

			$query = $this->recomendation_model->view_recomendation();

			$data['ecms'] = $query;

			$data['title'] = "Recomendation Data List";

			$datamsg['h1title'] = 'Data Updated Successfully';

			$this->load->view('header',$data);

			$this->load->view('showrecomendation',$datamsg);

			$this->load->view('footer');

		

			}else{

				redirect('main');

			}

		}

		//=======================Update Success message=========

		//=======================Delete newsmedia==============

		function delete_recomendation($id){

			if($this->session->userdata('is_logged_in')){

				

			//Loading  Database

			$this->load->database();

			//Transfering data to Model

			$this->recomendation_model->delete_recomendation($id);

			$data1['message'] = 'Data Deleted Successfully';

			redirect('recomendation/successdelete');

		

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

			$this->load->model('recomendation_model');

			//Transfering data to Model

			$query = $this->recomendation_model->view_recomendation();

			$data['ecms'] = $query;

			$data['title'] = "recomendation Data List";

			$datamsg['h1title'] = 'Data Updated Successfully';

			$this->load->view('header',$data);

			$this->load->view('showrecomendation');

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



