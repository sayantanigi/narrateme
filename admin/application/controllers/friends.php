<?php
class Friends extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('showfriend_model');
	}
	function index() {
		if ($this->session->userdata('is_logged_in')) {
			$this->load->model('showfriend_model');
			$this->load->helper('string');
			$querycoun = $this->member_model->get_country();
			$data['ecntr'] = $querycoun;
			$data['title'] = "Add Member";
			$this->load->view('include/header', $data);
			$this->load->helper(array('form'));
			$this->load->view('memberadd_view');
			$this->load->view('include/footer');
		} else {
			redirect('login');
		}
	}
	public function is_logged_in() {
		header("cache-Control: no-store, no-cache, must-revalidate");
		header("cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		$is_logged_in = $this->session->userdata('logged_in');
		if (!isset($is_logged_in) || $is_logged_in !== TRUE) {
			redirect('main');
		}
	}
	function view_friends() {
		$rdur3 = $this->uri->segment(3);
		if ($this->session->userdata('is_logged_in')) {
			$this->load->database();
			$this->load->model('showfriend_model');
			$query = $this->showfriend_model->view_friendlist($rdur3);
			$data['friendlist'] = $query;
			$data['title'] = "Friend List";
			$this->load->view('include/header', $data);
			$this->load->view('showfriend');
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
}
?>