<?php
class Product_type extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library(array('form_validation', 'session'));
		if ($this->session->userdata('is_logged_in') != 1) {
			redirect('home', 'refresh');
		}
		$this->load->model('product_type_model');
		$this->load->library('image_lib');
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s') . 'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
		$this->output->set_header('Pragma: no-cache');
	}
	function index() {
		if ($this->session->userdata('is_logged_in')) {
			redirect('product_typeadd_view');
		} else {
			$this->load->view('login');
		}
	}
	function product_type_add_form() {
		$data['title'] = "Add Product_type";
		$this->load->view('include/header', $data);
		$this->load->view('product/product_typeadd_view');
		$this->load->view('include/footer');
	}
	function add_product_type() {
		if(!empty($_FILES['userfile']['name'])) {
			$_POST['userfile']= rand(0000,9999)."_".$_FILES['userfile']['name'];
			$config2['image_library'] = 'gd2';
			$config2['source_image'] = $_FILES['userfile']['tmp_name'];
			$config2['new_image'] = getcwd().'/uploads/product_type/'.$_POST['userfile'];
			$config2['upload_path'] = getcwd().'/uploads/product_type/';
			$config2['allowed_types'] = 'JPG|PNG|JPEG|jpg|png|jpeg|avif';
			$config2['maintain_ratio'] = FALSE;
			$this->image_lib->initialize($config2);
			if(!$this->image_lib->resize()) {
				echo('<pre>');
				echo ($this->image_lib->display_errors());
				exit;
			} else {
				$imgname  = $_POST['userfile'];
				@unlink(getcwd().'/uploads/product_type/'.$_POST['old_image']);
			}
		} else {
			$imgname  = $_POST['old_image'];
		}
		$data = array(
			'product_type_title' => $this->input->post('product_type_title'),
			'product_type_image' => $imgname,
			'product_type_status' => 1
		);
		$this->product_type_model->insert_product_type($data);
		$data['ecms'] = $this->product_type_model->show_product_type();
		$this->session->set_flashdata('message', 'Product Type Added Successfully');
		redirect('product_type/show_product_type');
	}
	function show_product_type() {
		$data['ecms'] = $this->product_type_model->show_product_type();
		$data['title'] = "Product type List";
		$this->load->view('include/header', $data);
		$this->load->view('product/showproduct_typelist');
		$this->load->view('include/footer');
	}
	function statusproduct_type() {
		$stat = $this->input->get('stat');
		$id = $this->input->get('id');
		$this->product_type_model->updt($stat, $id);
	}
	function show_product_type_id($id) {
		$id = $this->uri->segment(3);
		$data['title'] = "Edit Product_type";
		$data['ecms'] = $this->product_type_model->show_product_type_id($id);
		$this->load->view('include/header', $data);
		$this->load->view('product/product_type_edit', $data);
		$this->load->view('include/footer');
	}
	function edit_product_type() {
		$id = $this->input->post('product_type_id');
		if(!empty($_FILES['userfile']['name'])) {
			$_POST['userfile']= rand(0000,9999)."_".$_FILES['userfile']['name'];
			$config2['image_library'] = 'gd2';
			$config2['source_image'] = $_FILES['userfile']['tmp_name'];
			$config2['new_image'] = getcwd().'/uploads/product_type/'.$_POST['userfile'];
			$config2['upload_path'] = getcwd().'/uploads/product_type/';
			$config2['allowed_types'] = 'JPG|PNG|JPEG|jpg|png|jpeg|avif';
			$config2['maintain_ratio'] = FALSE;
			$this->image_lib->initialize($config2);
			if(!$this->image_lib->resize()) {
				echo('<pre>');
				echo ($this->image_lib->display_errors());
				exit;
			} else {
				$imgname = $_POST['userfile'];
				@unlink(getcwd().'/uploads/product_type/'.$_POST['old_image']);
			}
		} else {
			$imgname  = $_POST['old_image'];;
		}
		$datalist = array(
			'product_type_title' => $this->input->post('product_type_title'),
			'product_type_image' => $imgname
		);
		$this->load->database();
		$query = $this->product_type_model->product_type_edit($id, $datalist);
		$this->session->set_flashdata('message', 'Product type Upated Successfully');
		redirect('product_type/show_product_type');
	}
	function delete_product_type($id) {
		$getData = $this->db->query("SELECT * FROM product_type WHERE id = '".$id."'")->row();
		$image = $getData->product_type_image;
		$this->db->query("DELETE FROM product_type WHERE id='".$id."'");
		@unlink(getcwd().'/uploads/product_type/'.$image);
		$this->session->set_flashdata('delete_message', 'Product type Deleted Successfully');
		redirect('product_type/show_product_type');
	}
}
?>