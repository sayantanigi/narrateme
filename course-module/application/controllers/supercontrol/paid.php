<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Paid extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library(array('form_validation', 'session'));
		if ($this->session->userdata('is_logged_in') != 1) {
			redirect('supercontrol/home', 'refresh');
		}
		$this->load->model('supercontrol/faq_model');
		$this->load->model('supercontrol/generalmodel');
		$this->load->library('image_lib');
		$this->load->model('generalmodel');
		$this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
		$this->output->set_header('Pragma: no-cache');
	}
	public function index()
	{
		if ($this->session->userdata('is_logged_in')) {
			redirect('supercontrol/paid/blog_add_form');
		} else {
			$this->load->view('supercontrol/login');
		}
	}
	function blog_add_form()
	{
		$data['title'] = "Add Blog";
		$this->load->view('supercontrol/header', $data);
		$this->load->view('supercontrol/blogadd_view');
		$this->load->view('supercontrol/footer');
	}
	function view_blog($id)
	{
		$id = $this->uri->segment(4);
		$data['title'] = "View Details";
		$query = $this->generalmodel->show_blog_id($id);
		$data['ecms'] = $query;
		$this->load->view('supercontrol/header', $data);
		$this->load->view('supercontrol/paid_view', $data);
		$this->load->view('supercontrol/footer');
	}
	function success()
	{
		$data['title'] = 'Add Blog';
		$data['title'] = 'Add Blog';
		$this->load->view('supercontrol/header');
		$this->load->view('supercontrol/blogadd_view', $data);
		$this->load->view('supercontrol/footer');
	}
	function show_list()
	{
		$query = $this->generalmodel->fetch_all_join("SELECT * FROM sm_course_booking");
		$data['ecms'] = $query;
		$data['title'] = "Show List";
		$this->load->view('supercontrol/header', $data);
		$this->load->view('supercontrol/showlist');
		$this->load->view('supercontrol/footer');
	}
	function statusblog()
	{
		$stat = $this->input->get('stat');
		$id = $this->input->get('id');
		$this->load->model('supercontrol/blog_model');
		$this->blog_model->updt($stat, $id);
	}
	function show_blog_id($id)
	{
		$id = $this->uri->segment(4);
		$data['title'] = "Edit blog";
		$this->load->database();
		$this->load->model('supercontrol/blog_model');
		$query = $this->blog_model->show_blog_id($id);
		$data['ecms'] = $query;
		$this->load->view('supercontrol/header', $data);
		$this->load->view('supercontrol/blog_edit', $data);
		$this->load->view('supercontrol/footer');
	}
	function edit_blog()
	{
		$blog_image = $this->input->post('blog_image');
		$config = array(
			'upload_path' => "uploads/blog/",
			'upload_url' => base_url() . "uploads/blog/",
			'allowed_types' => "gif|jpg|png|jpeg"
		);
		$this->load->library('upload', $config);
		if ($this->upload->do_upload("userfile")) {
			@unlink("uploads/blog/" . $blog_image);
			$data['img'] = $this->upload->data();
			$datalist = array(
				'blog_title' => $this->input->post('blog_title'),
				'posted_by' => $this->input->post('posted_by'),
				'blog_desc' => $this->input->post('blog_desc'),
				'blog_image' => $data['img']['file_name']
			);
			$id = $this->input->post('blog_id');
			$data['title'] = "Blog Edit";
			$this->load->database();
			$this->load->model('supercontrol/blog_model');
			$query = $this->blog_model->blog_edit($id, $datalist);
			$data1['message'] = '<div class="alert alert-success text-center">Data successfully uploaded!!!</div>';
			$query = $this->blog_model->show_bloglist();
			$data['ecms'] = $query;
			$data['title'] = "Blog Page List";
			$this->load->view('supercontrol/header', $data);
			$this->load->view('supercontrol/showbloglist', $data1);
			$this->load->view('supercontrol/footer');
		} else {
			$datalist = array(
				'blog_title' => $this->input->post('blog_title'),
				'posted_by' => $this->input->post('posted_by'),
				'blog_desc' => $this->input->post('blog_desc')
			);
			$id = $this->input->post('blog_id');
			$data['title'] = "blog Edit";
			$this->load->database();
			$this->load->model('supercontrol/blog_model');
			$query = $this->blog_model->blog_edit($id, $datalist);
			$data1['message'] = '<div class="alert alert-success text-center"> Data successfully uploaded!!!</div>';
			$query = $this->blog_model->show_bloglist();
			$data['ecms'] = $query;
			$data['title'] = "blog Page List";
			$this->load->view('supercontrol/header', $data);
			$this->load->view('supercontrol/showbloglist', $data1);
			$this->load->view('supercontrol/footer');
		}
	}
	public function delete_blog()
	{
		$id = $this->uri->segment(4);
		$result = $this->generalmodel->delete_single_book('course_booking', $id);
		if ($result) {
			$this->session->set_flashdata('success_delete', 'Booking Deleted Successfully !!!');
			redirect('supercontrol/paid/show_list', TRUE);
		}
	}
	function delete_multiple()
	{
		$ids = (explode(',', $this->input->get_post('ids')));
		$this->generalmodel->delete_mul($ids);
		$data4['msg1'] = '<div class="alert alert-success text-center"> Data successfully delete!!!</div>';
		$this->load->view('supercontrol/header');
		redirect('supercontrol/paid/show_list', $data4);
		$this->load->view('supercontrol/footer');
	}
	public function Logout()
	{
		$this->session->sess_destroy();
		redirect('supercontrol/login');
	}
}
?>