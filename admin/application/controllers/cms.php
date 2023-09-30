<?php
class Cms extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('cms_model');
		$this->load->library('image_lib');
	}

	public function index() {
		if($this->session->userdata('is_logged_in')) {
			$this->load->database();
			$this->load->model('individual_model');
			$query = $this->cms_model->show_cmslist();
			$data['ecms'] = $query;
			$data['title'] = "Cms Page List";
			$this->load->view('header',$data);
			$this->load->helper(array('form'));
			$this->load->view('showcmslist', $data);
			$this->load->view('footer');
		} else {
			redirect('main');
		}
	}

	public function is_logged_in() {
		header("cache-Control: no-store, no-cache, must-revalidate");
		header("cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		$is_logged_in = $this->session->userdata('logged_in');
		if(!isset($is_logged_in) || $is_logged_in!==TRUE) {
			redirect('login');
		}
	}

	function add_cms() {
		if($this->session->userdata('is_logged_in')) {
			$this->load->view('header');
			$this->load->view('add_cms');
			$this->load->view('footer');
			$data['title'] = "Add New Cms";
		} else {
			redirect('main');
		}
	}

	function add_individual_cms() {
		if($this->session->userdata('is_logged_in')) {
			$this->form_validation->set_rules('cms_pagetitle', 'Page Title', 'required');
			$this->form_validation->set_rules('cms_page_heading', 'Heading', 'required');
			$this->form_validation->set_rules('meta_keywords', 'Meta Keyword', 'required');
			$this->form_validation->set_rules('meta_description', 'Meta Descriptions', 'required');
			//$this->form_validation->set_rules('cmsmap', 'Address Map', 'required');
			$this->form_validation->set_rules('cms_pagedes', 'Descriptions', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data['title'] = "Add CMS";
				$this->load->view('header',$data);
				$this->load->view('add_cms');
				$this->load->view('footer');
			} else {
				if ($_FILES['userfile']['name'] != '') {
					$_POST['userfile'] = rand(0000, 9999) . "_" . $_FILES['userfile']['name'];
					$config2['image_library'] = 'gd2';
					$config2['source_image'] =  $_FILES['userfile']['tmp_name'];
					$config2['new_image'] =   getcwd() . '/uploads/' . $_POST['userfile'];
					$config2['upload_path'] =  getcwd() . '/uploads/';
					$config2['allowed_types'] = 'JPG|PNG|JPEG|jpg|png|jpeg';
					$config2['maintain_ratio'] = TRUE;
					$this->image_lib->initialize($config2);
					if (!$this->image_lib->resize()) {
						echo ('<pre>');
						echo ($this->image_lib->display_errors());
						exit;
					} else {
						$image  = $_POST['userfile'];
						@unlink('uploads/' . $_POST['old_image']);
					}
				} else {
					$image = $_POST['old_image'];
				}
				$data = array(			
					'cms_pagetitle' => $this->input->post('cms_pagetitle'),  
					'cms_page_heading' => $this->input->post('cms_page_heading'),
					'cmsimg' => $image,
					'cmsmap' => $this->input->post('cmsmap'),
					'meta_keywords' => $this->input->post('meta_keywords'),
					'meta_description' => $this->input->post('meta_description'),
					'cms_pagedes' => $this->input->post('cms_pagedes')
				);
				$query=$this->cms_model->insert_new_cms($data);
				$data['ecms'] = $query;
				$data['title'] = "Add CMS";
				$data1['message'] = 'Data Inserted Successfully';
				redirect('cms');

			}
		} else {
			redirect('main');
		}
	}

	function show_individual_cms_id($id) {
		if($this->session->userdata('is_logged_in')) {
			$id = $this->uri->segment(3);
			$data['title'] = "Edit Cms";
			$this->load->database();
			$this->load->model('cms_model');
			$query = $this->cms_model->show_individual_cms_id($id);
			$data['ecms'] = $query;
			$this->load->view('header',$data);
			$this->load->view('cms_edit', $data);
			$this->load->view('footer');
		} else {
			redirect('main');
		}
	}

	function edit_cms_individual() {
		if($this->session->userdata('is_logged_in')) {
			if ($_FILES['userfile']['name'] != '') {
				$_POST['userfile'] = rand(0000, 9999) . "_" . $_FILES['userfile']['name'];
				$config2['image_library'] = 'gd2';
				$config2['source_image'] =  $_FILES['userfile']['tmp_name'];
				$config2['new_image'] =   getcwd() . '/uploads/' . $_POST['userfile'];
				$config2['upload_path'] =  getcwd() . '/uploads/';
				$config2['allowed_types'] = 'JPG|PNG|JPEG|jpg|png|jpeg';
				$config2['maintain_ratio'] = TRUE;
				$this->image_lib->initialize($config2);
				if (!$this->image_lib->resize()) {
					echo ('<pre>');
					echo ($this->image_lib->display_errors());
					exit;
				} else {
					echo $image  = $_POST['userfile'];
					@unlink('uploads/' . $_POST['old_image']);
				}
			} else {
				$image = $_POST['old_image'];
			}
			$datalist = array(			
				'cms_pagetitle' => $this->input->post('cms_pagetitle'),  
				'cms_page_heading' => $this->input->post('cms_page_heading'),
				'cmsimg' => $image,
				'cmsmap' => $this->input->post('cmsmap'),
				'meta_keywords' => $this->input->post('meta_keywords'),
				'meta_description' => $this->input->post('meta_description'),
				'cms_pagedes' => $this->input->post('cms_pagedes')
			);
			$id = $this->input->post('cms_id');
			$data['title'] = "Individual Edit";
			$this->load->database();
			$this->load->model('cms_model');
			$query = $this->cms_model->edit_cms_individual($id,$datalist);
			$data1['message'] = 'Data Update Successfully';
			$query = $this->cms_model->show_cmslist();
			$data['ecms'] = $query;
			$data['title'] = "Cms Page List";
			$this->load->view('header',$data);
			$this->load->view('showcmslist', $data1);
			$this->load->view('footer');
		} else {
			redirect('main');
		}
	}

	function successupdate(){
		$this->load->database();
		$this->load->model('cms_model');
		$query = $this->individual_model->view_individual();
		$data['ecms'] = $query;
		$data['title'] = "Individual Data List";
		$datamsg['h1title'] = 'Data Updated Successfully';
		$this->load->view('header',$data);
		$this->load->view('showcmslist',$datamsg);
		$this->load->view('footer');
	}

	function delete_cms($id){
		if($this->session->userdata('is_logged_in')) {
			$this->load->database();
			$this->cms_model->delete_cms($id);
			$data1['message'] = 'Data Inserted Successfully';
			redirect('cms/successdelete');
		} else {
			redirect('main');
		}
	}

	function successdelete() {
		$this->load->database();
		$this->load->model('cms_model');
		$query = $this->cms_model->view_cms();
		$data['ecms'] = $query;
		$data['title'] = "Individual Data List";
		$datamsg['h1title'] = 'Data Updated Successfully';
		$this->load->view('header',$data);
		$this->load->view('showcmslist');
		$this->load->view('footer');
	}

	public function Logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}
?>