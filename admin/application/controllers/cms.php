<?php
class Cms extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('cms_model');
		$this->load->model('individual_model');
	}
	function index() {
		if ($this->session->userdata('is_logged_in')) {
			$data['ecms'] = $this->cms_model->show_cmslist();
			$data['title'] = "Cms Page List";
			$this->load->view('include/header', $data);
			$this->load->view('cms/showcmslist', $data);
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	public function is_logged_in() {
		header("cache-Control: no-store, no-cache, must-revalidate");
		header("cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		$is_logged_in = $this->session->userdata('logged_in');
		if (!isset($is_logged_in) || $is_logged_in !== TRUE) {
			redirect('login');
		}
	}
	function add_cms() {
		if ($this->session->userdata('is_logged_in')) {
			$this->load->view('include/header');
			$this->load->view('cms/add_cms');
			$this->load->view('include/footer');
			$data['title'] = "Add New Cms";
		} else {
			redirect('main');
		}
	}
	function add_individual_cms() {
		$this->form_validation->set_rules('cms_pagetitle', 'Page Title', 'required');
		$this->form_validation->set_rules('cms_page_heading', 'Heading', 'required');
		$this->form_validation->set_rules('meta_keywords', 'Meta Keyword', 'required');
		$this->form_validation->set_rules('meta_description', 'Meta Descriptions', 'required');
		$this->form_validation->set_rules('cmsmap', 'Address Map', 'required');
		$this->form_validation->set_rules('cms_pagedes', 'Descriptions', 'required');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Add CMS";
			$this->load->view('include/header', $data);
			$this->load->view('cms/add_cms');
			$this->load->view('include/footer');
		} else {
			if(!empty($_FILES['page_image']['name'])) {
				$_POST['page_image']= rand(0000,9999)."_".$_FILES['page_image']['name'];
				$config2['image_library'] = 'gd2';
				$config2['source_image'] = $_FILES['page_image']['tmp_name'];
				$config2['new_image'] = getcwd().'/uploads/cms/'.$_POST['page_image'];
				$config2['upload_path'] = getcwd().'/uploads/cms/';
				$config2['allowed_types'] = 'JPG|PNG|JPEG|jpg|png|jpeg|avif';
				$config2['maintain_ratio'] = FALSE;
				$this->image_lib->initialize($config2);
				if(!$this->image_lib->resize()) {
					echo('<pre>');
					echo ($this->image_lib->display_errors());
					exit;
				} else {
					$imgname  = $_POST['page_image'];
					@unlink(getcwd().'/uploads/cms/'.$_POST['old_image']);
				}
			} else {
				$imgname  = $_POST['old_image'];;
			}
			$datalist = array(
				'cms_pagetitle' => $this->input->post('cms_pagetitle'),
				'cms_page_heading' => $this->input->post('cms_page_heading'),
				'meta_keywords' => $this->input->post('meta_keywords'),
				'meta_description' => $this->input->post('meta_description'),
				'cmsmap' => $this->input->post('cmsmap'),
				'cmsimg' => $imgname,
				'cms_pagedes' => $this->input->post('cms_page_heading')
			);
			$query = $this->cms_model->insert_new_cms($datalist);
			$this->session->set_flashdata('message', 'Data added Successfully');
			redirect('cms');
		}
	}
	function show_individual_cms_id($id) {
		if ($this->session->userdata('is_logged_in')) {
			$id = $this->uri->segment(3);
			$data['title'] = "Edit Cms";
			$query = $this->cms_model->show_individual_cms_id($id);
			$data['ecms'] = $query;
			$this->load->view('include/header', $data);
			$this->load->view('cms/cms_edit', $data);
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	function edit_cms_individual() {
		$id = $this->input->post('cms_id');
		if ($this->session->userdata('is_logged_in')) {
			if(!empty($_FILES['page_image']['name'])) {
				$_POST['page_image']= rand(0000,9999)."_".$_FILES['page_image']['name'];
				$config2['image_library'] = 'gd2';
				$config2['source_image'] = $_FILES['page_image']['tmp_name'];
				$config2['new_image'] = getcwd().'/uploads/cms/'.$_POST['page_image'];
				$config2['upload_path'] = getcwd().'/uploads/cms/';
				$config2['allowed_types'] = 'JPG|PNG|JPEG|jpg|png|jpeg|avif';
				$config2['maintain_ratio'] = FALSE;
				$this->image_lib->initialize($config2);
				if(!$this->image_lib->resize()) {
					echo('<pre>');
					echo ($this->image_lib->display_errors());
					exit;
				} else {
					$imgname  = $_POST['page_image'];
					@unlink(getcwd().'/uploads/cms/'.$_POST['old_image']);
				}
			} else {
				$imgname  = $_POST['old_image'];;
			}
			$datalist = array(
				'cms_pagetitle' => $this->input->post('cms_pagetitle'),
				'cms_page_heading' => $this->input->post('cms_page_heading'),
				'meta_keywords' => $this->input->post('meta_keywords'),
				'meta_description' => $this->input->post('meta_description'),
				'cmsmap' => $this->input->post('cmsmap'),
				'cmsimg' => $imgname,
				'cms_pagedes' => $this->input->post('cms_page_heading')
			);
			$this->cms_model->edit_cms_individual($id, $datalist);
			$this->session->set_flashdata('message', 'Data Updated Successfully');
			redirect('cms');
		} else {
			redirect('main');
		}
	}
	function delete_cms($id){
		$getData = $this->db->query("SELECT * FROM na_cms WHERE id = '".$id."'")->row();
		$this->cms_model->delete_cms($id);
		@unlink(getcwd().'/uploads/cms/'.$getData->cmsimg);
		$data1['message'] = 'Data Deleted Successfully';
		$this->session->set_flashdata('message', 'Data Updated Successfully');
		redirect('cms');
	}
}
?>