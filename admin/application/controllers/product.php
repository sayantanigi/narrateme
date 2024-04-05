<?php
class Product extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library(array('form_validation', 'session'));
		if ($this->session->userdata('is_logged_in') != 1) {
			redirect('home', 'refresh');
		}
		$this->load->model('product_model');
		$this->load->library('image_lib');
		$this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
		$this->output->set_header('Pragma: no-cache');
	}
	function index() {
		if ($this->session->userdata('is_logged_in')) {
			redirect('productadd_view');
		} else {
			$this->load->view('login');
		}
	}
	function product_add_form() {
		$query = $this->product_model->show_product_type();
		$data['ecat'] = $query;
		$data['title'] = "Add Product";
		$this->load->view('include/header', $data);
		$this->load->view('product/productadd_view');
		$this->load->view('include/footer');
	}
	function add_product() {
		if(!empty($_FILES['userfile']['name'])) {
			$_POST['userfile']= rand(0000,9999)."_".$_FILES['userfile']['name'];
			$config2['image_library'] = 'gd2';
			$config2['source_image'] = $_FILES['userfile']['tmp_name'];
			$config2['new_image'] = getcwd().'/uploads/product/'.$_POST['userfile'];
			$config2['upload_path'] = getcwd().'/uploads/product/';
			$config2['allowed_types'] = 'JPG|PNG|JPEG|jpg|png|jpeg|avif';
			$config2['maintain_ratio'] = FALSE;
			$this->image_lib->initialize($config2);
			if(!$this->image_lib->resize()) {
				echo('<pre>');
				echo ($this->image_lib->display_errors());
				exit;
			} else {
				$imgname  = $_POST['userfile'];
				@unlink(getcwd().'/uploads/product/'.$_POST['old_image']);
			}
		} else {
			$imgname  = $_POST['old_image'];
		}
		$data = array(
			'categori_id' => $this->input->post('product_type'),
			'product_name' => $this->input->post('product_name'),
			'price' => $this->input->post('price'),
			'product_image' => $imgname,
			'description' => $this->input->post('description'),
			'quantity' => $this->input->post('quantity'),
			'discount' => $this->input->post('discount'),
			'product_add_date' => date('Y-m-d'),
			'code' => random_string('alnum', 9),
			'status' => 1
		);
		$this->product_model->insert_product($data);
		$data['ecms'] = $this->product_model->show_product();
		$this->session->set_flashdata('message', 'Product Added Successfully !!!!');
		redirect('product/show_product');
	}
	function show_product() {
		$query = $this->product_model->show_product_join();
		$data['eprod'] = $query;
		$data['title'] = "Product List";
		$this->load->view('include/header', $data);
		$this->load->view('product/showproductlist');
		$this->load->view('include/footer');
	}
	function statusproduct() {
		$stat = $this->input->get('stat');
		$id = $this->input->get('id');
		$this->load->model('product_model');
		$this->product_model->updt($stat, $id);
	}
	function show_product_id($id) {
		$query = $this->product_model->show_product_type();
		$data['ecat'] = $query;
		$id = $this->uri->segment(3);
		$data['title'] = "Edit Product";
		$this->load->database();
		$this->load->model('product_model');
		$query = $this->product_model->show_product_id($id);
		$data['ecms'] = $query;
		$this->load->view('include/header', $data);
		$this->load->view('product/product_edit', $data);
		$this->load->view('include/footer');
	}
	function edit_product() {
		$product_image = $this->input->post('product_image');
		$config = array(
			'upload_path' => "uploads/product/",
			'upload_url' => base_url() . "uploads/product/",
			'allowed_types' => "gif|jpg|png|jpeg"
		);
		$this->load->library('upload', $config);
		if ($this->upload->do_upload("userfile")) {
			@unlink("uploads/product/" . $product_image);
			$data['img'] = $this->upload->data();
			$datalist = array(
				'categori_id' => $this->input->post('product_type'),
				'product_name' => $this->input->post('product_name'),
				'price' => $this->input->post('price'),
				'description' => $this->input->post('description'),
				'discount' => $this->input->post('discount'),
				'quantity' => $this->input->post('quantity'),
				'product_image' => $data['img']['file_name']
			);
			$id = $this->input->post('product_id');
			$data['title'] = "Product Edit";
			$this->load->database();
			$this->load->model('product_model');
			$query = $this->product_model->product_edit($id, $datalist);
			$data1['message'] = 'Data Update Successfully';
			$query = $this->product_model->show_productlist();
			$data['ecms'] = $query;
			$data['title'] = "Product Page List";
			$this->load->view('include/header', $data);
			redirect('product/show_product');
			$this->load->view('include/footer');
		} else {
			$datalist = array(
				'categori_id' => $this->input->post('product_type'),
				'product_name' => $this->input->post('product_name'),
				'price' => $this->input->post('price'),
				'description' => $this->input->post('description'),
				'discount' => $this->input->post('discount'),
				'quantity' => $this->input->post('quantity')
			);
			$id = $this->input->post('product_id');
			$data['title'] = "Product Edit";
			$this->load->database();
			$this->load->model('product_model');
			$query = $this->product_model->product_edit($id, $datalist);
			$data1['message'] = 'Data Update Successfully';
			$query = $this->product_model->show_productlist();
			$data['ecms'] = $query;
			$this->session->set_flashdata('edit_message', 'Product Updated Successfully !!!!');
			$data['title'] = "Product Page List";
			redirect('product/show_product');
		}
	}
	function delete_product() {
		$id = $this->uri->segment(3);
		@$result = $this->product_model->show_product_id($id);
		@$product_image = $result[0]->product_image;
		$this->load->database();
		$query = $this->product_model->delete_product($id, $product_image);
		$data['ecms'] = $query;
		$this->session->set_flashdata('delete_message', 'Product Deleted Successfully !!!!');
		redirect('product/show_product');
	}
	function delete_multiple() {
		$ids = (explode(',', $this->input->get_post('ids')));
		$this->product_model->delete_mul($ids);
		$this->session->set_flashdata('delete_message1', 'Product Deleted Successfully !!!!');
		$this->load->view('include/header');
		redirect('product/show_product');
		$this->load->view('include/footer');
	}
	function product_view($id) {
		$this->load->database();
		$this->load->model('product_model');
		$query = $this->product_model->product_view_join($id);
		$data['viewproduct'] = $query;
		$data['title'] = "Product View";
		$this->load->view('include/header', $data);
		$this->load->view('product/product_view', $data);
		$this->load->view('include/footer');
	}
}
?>