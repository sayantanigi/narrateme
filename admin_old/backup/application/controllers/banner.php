<?php

class Banner extends CI_Controller {

		//============Constructor to call Model====================

		function __construct() {

			parent::__construct();

			$this->load->model('banner_model');

		}

		//============Constructor to call Model====================

		function index(){

			if($this->session->userdata('is_logged_in')){ 

			$data['title'] = "Add Banner ";

			$this->load->view('header',$data);

			$this->load->helper(array('form'));

			$this->load->view('banneradd_view');

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

		function add_banner(){

			

			//Validating Image Field

			//$this->form_validation->set_rules('banner_image', 'Image', 'required');

			

			//Validating Name Field

			$this->form_validation->set_rules('title', 'Heading', 'required|min_length[1]|max_length[25]');

			

			//Validating Address Field

			$this->form_validation->set_rules('subtitle', 'Sub Heading', 'required|min_length[1]|max_length[50]');

			

			//Validating Address Field

			$this->form_validation->set_rules('description', 'Description', 'required|min_length[1]|max_length[300]');

			

			

			

			if ($this->form_validation->run() == FALSE) {

				

			$data['title'] = "Add Banner";

			$this->load->view('header',$data);

			$this->load->view('banneradd_view');

			$this->load->view('footer');

			

			}else {

				

			$imgname = $_FILES["banner_image"]["name"];

				

			//Setting values for tabel columns

			$data = array(

							'title' => $this->input->post('title'),

							'subtitle' => $this->input->post('subtitle'),

							'description' => $this->input->post('description'),

							'banner_image' => $_FILES["banner_image"]["name"],

							'status' => 1

			 );

			

			//Transfering data to Model

			$this->banner_model->insert_banner($data);

			$data1['message'] = 'Data Inserted Successfully';

			redirect('banner/view_banner');

			

			}

		}

		//=======================Insert Individual Data============

  		//=======================Insertion Success message=========

		function success(){

			$data['h1title'] = 'Data Inserted Successfully';

			$data['title'] = 'Add Banner';

			$this->load->view('header');

			$this->load->view('banneradd_view',$data);

			$this->load->view('footer');

		}

		//=======================Insertion Success message=========

		//================View Individual Data List=============

		function view_banner(){

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('banner_model');

			//Transfering data to Model

			$query = $this->banner_model->view_banner();

			$data['ecms'] = $query;

			$data['title'] = "Banner List";

			$this->load->view('header',$data);

			$this->load->view('showbanner');

			$this->load->view('footer');

		}

		//================View Individual Data List=============

  		//================Show Individual by Id=================

		function show_banner_id($id) {

			$data['title'] = "Banner Edit";

			//Loading Database

			$this->load->database();

			//Calling Model

			$this->load->model('banner_model');

			//Transfering data to Model

			$query = $this->banner_model->show_banner_id($id);

			$data['ecms'] = $query;

			$this->load->view('header',$data);

			$this->load->view('banneredit', $data);

			$data['title'] = "Edit Data List";

			$this->load->view('footer');

		}

   		//================Show Individual by Id=================

  	 	//================Update Individual ====================

		function edit_banner(){

			//====================Post Data=====================

			 $id = $this->input->post('id');

			if($_FILES["banner_image"]["name"]!='') {

				

				$imgname = $_FILES["banner_image"]["name"];

				

				$this->db->where('id',$id);

				$this->db->select('banner_image');

				$result=$this->db->get('bl_banner');

				$row = $result->row();

				//print_r($row);

				$path = './banner/'.$row->banner_image;

				

				unlink($path);

		

			$config['upload_path'] = './banner/';

					

			$config['allowed_types'] = 'jpg|jpeg|png|gif';

			

			$config['file_name'] = $imgname;

			

			$this->load->library('upload',$config);

				

			if (!$this->upload->do_upload("banner_image"))

			{

				$error = array('error' => $this->upload->display_errors());

			}

			else

			{

				$upload_data = $this->upload->data();

				

			}

				

			} else {

				$imgname = $this->input->post('oldimg');

			}



			



			

			$datalist = array(

							'title' => $this->input->post('title'),

							'subtitle' => $this->input->post('subtitle'),

							'description' => $this->input->post('description'),

							'banner_image' => $imgname,

							'status' => 1

			);

			

			

		

			//====================Post Data===================

			

		

			$data['title'] = "Banner Edit";

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('banner_model');

			//Transfering data to Model

			$query = $this->banner_model->edit_banner($id,$datalist);

			$data1['message'] = 'Data Updated Successfully';

			redirect('banner/successupdate');

		}

		//================Update Individual ====================

  		//=======================Update Success message=========

		function successupdate(){

			//loading database

			$this->load->database();

			//Calling Model

			$this->load->model('banner_model');

			//Transfering data to Model

			$query = $this->banner_model->view_banner();

			$data['ecms'] = $query;

			$data['title'] = "Banner List";

			$datamsg['h1title'] = 'Data Updated Successfully';

			$this->load->view('header',$data);

			$this->load->view('showbanner',$datamsg);

			$this->load->view('footer');

		}

		//=======================Update Success message=========

		//=======================Delete Individual==============

		function delete_banner($id){

			//Loading  Database

			$this->load->database();

			//Transfering data to Model

			$this->banner_model->delete_banner($id);

			$data1['message'] = 'Data Deleted Successfully';

			redirect('banner/successdelete');

		}

		//======================Delete Individual===============

		//======================Delete Success message==========

		function successdelete(){

			//Loading  Database

			$this->load->database();

			//Calling Model

			$this->load->model('banner_model');

			//Transfering data to Model

			$query = $this->banner_model->view_banner();

			$data['ecms'] = $query;

			$data['title'] = "Banner List";

			$datamsg['h1title'] = 'Data Updated Successfully';

			$this->load->view('header',$data);

			$this->load->view('showbanner');

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



