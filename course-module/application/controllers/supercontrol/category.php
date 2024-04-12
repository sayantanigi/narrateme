<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Category extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library(array('form_validation', 'session'));
		if ($this->session->userdata('is_logged_in') != 1) {
			redirect('supercontrol/home', 'refresh');
		}
		$this->load->model('supercontrol/category_model', 'cat');
		$this->load->model('generalmodel');
		$this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
		$this->output->set_header('Pragma: no-cache');
		$this->load->library('image_lib');
	}
	function index() {
		if ($this->session->userdata('is_logged_in')) {
			$data['categories'] = $this->cat->category_menu();
			$this->load->view('supercontrol/header', $data);
			$this->load->view('supercontrol/categoryadd_view', $data);
			$this->load->view('supercontrol/footer');
		} else {
			$this->load->view('supercontrol/login');
		}
	}
	function category_add_form() {
		$data['title'] = "Add Category";
		$this->load->view('supercontrol/header', $data);
		$this->load->view('supercontrol/categoryadd_view');
		$this->load->view('supercontrol/footer');
	}
	function add_category() {
		$my_date = date("Y-m-d", time());
		$config = array(
			'upload_path' => "uploads/categoryimage/",
			'upload_url' => base_url() . "uploads/categoryimage/",
			'allowed_types' => "gif|jpg|png|jpeg"
		);
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('userfile')) {
			$data = array(
				'category_name' => $this->input->post('name'),
				'userid' => $this->session->userdata('userid')
			);
			$this->load->model('supercontrol/category_model');
			$this->category_model->insert_category($data);
			$this->load->view('supercontrol/header', $data);
			$data['categories'] = $this->cat->category_menu();
			$this->session->set_flashdata('message', 'Category created successfully');
			$this->load->view('supercontrol/categoryadd_view', $data);
			$this->load->view('supercontrol/footer');
		} else {
			$data['userfile'] = $this->upload->data();
			$filename = $data['userfile']['file_name'];
			$data = array(
				'category_name' => $this->input->post('name'),
				'sort_order' => $this->input->post('sort_order'),
				'parent_id' => $this->input->post('pid'),
				'category_image' => $filename
			);
			$this->load->model('supercontrol/category_model');
			$this->category_model->insert_category($data);
			$this->load->view('supercontrol/header', $data);
			$data['categories'] = $this->cat->category_menu();
			$this->session->set_flashdata('message', 'Category created successfully');
			$this->load->view('supercontrol/categoryadd_view', $data);
			$this->load->view('supercontrol/footer');
		}
	}
	function success()
	{
		$data['h1title'] = 'Add Category';
		$data['title'] = 'Add Category';
		$this->load->view('supercontrol/header');
		$this->load->view('supercontrol/categoryadd_view', $data);
		$this->load->view('supercontrol/footer');
	}
	function show_category()
	{
		$this->load->database();
		$this->load->model('supercontrol/category_model');
		$query = $this->category_model->show_category();
		$data['eloca'] = $query;
		$data['title'] = "Category List";
		$this->load->view('supercontrol/header', $data);
		$this->load->view('supercontrol/showcategorylist', $data);
		$this->load->view('supercontrol/footer');
	}
	function statusnews()
	{
		$stat = $this->input->get('stat');
		$id = $this->input->get('id');
		$this->load->model('news_model');
		$this->news_model->updt($stat, $id);
	}
	function show_category_id($id)
	{
		$id = $this->uri->segment(4);
		$data['title'] = "Edit Category";
		$this->load->database();
		$this->load->model('supercontrol/category_model');
		$query = $this->category_model->show_category_id($id);
		$data['ecategory'] = $query;
		$table_name = 'category';
		$primary_key = 'parent_id';
		$wheredata = '0';
		$queryallcat = $this->generalmodel->getAllData($table_name, $primary_key, $wheredata, '', '');
		$data['eallcat'] = $queryallcat;
		$this->load->view('supercontrol/header', $data);
		$this->load->view('supercontrol/category_edit', $data);
		$this->load->view('supercontrol/footer');
	}
	function edit_category()
	{
		$config = array(
			'upload_path' => "uploads/categoryimage/",
			'upload_url' => base_url() . "uploads/categoryimage/",
			'allowed_types' => "gif|jpg|png|jpeg"
		);
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('userfile')) {
			$data['userfile'] = $this->upload->data();
			$filename = $data['userfile']['file_name'];
			$datalist = array(
				'category_name' => $this->input->post('category_name'),
			);
		} else {
			$datalist = array(
				'category_name' => $this->input->post('category_name')
			);
		}
		$id = $this->input->post('category_id');
		$data['title'] = "Category Edit";
		$this->load->database();
		$this->load->model('supercontrol/category_model');
		$query = $this->category_model->category_edit($id, $datalist);
		$data1['message'] = 'Updated Successfully';
		$this->session->set_flashdata('message', 'Data Updated Successfully !!!');
		redirect('supercontrol/category/show_category');
	}
	function delete_category($id)
	{
		$this->load->model('supercontrol/category_model');
		$result = $this->category_model->show_category_id($id);
		$this->load->database();
		if ($query = $this->category_model->delete_category($id)) {
			$data2['message'] = 'Deleted Successfully';
			$data['title'] = "Category Page List";
			$data['eloca'] = $query;
			$data['title'] = "Category Page List";
			$this->session->set_flashdata('message', 'Data Deleted !!!!');
			redirect('supercontrol/category/show_category', TRUE);
		} else {
			$this->session->set_flashdata('error', 'You Can Not Delete A Parent Category');
			redirect('supercontrol/category/show_category', TRUE);
		}
	}
	function delete_multiple()
	{
		$ids = (explode(',', $this->input->get_post('ids')));
		$this->news_model->delete_mul($ids);
		$this->load->view('header');
		redirect('news/show_news');
		$this->load->view('footer');
	}
	public function Logout()
	{
		$this->session->sess_destroy();
		redirect('supercontrol/login');
	}
}
?>