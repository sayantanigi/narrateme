<?php
class adminprofile extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('adminprofile_model');
	}

	function index()
	{
		if ($this->session->userdata('is_logged_in')) {
			$data['title'] = "Adminprofile";
			$this->load->view('include/header', $data);
			$this->load->helper(array('form'));
			$this->load->view('showadminprofile');
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	public function is_logged_in()
	{
		header("cache-Control: no-store, no-cache, must-revalidate");
		header("cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		$is_logged_in = $this->session->userdata('logged_in');
		if (!isset($is_logged_in) || $is_logged_in !== TRUE) {
			redirect('main');
		}
	}
	function show_adminprofile_id($id)
	{
		if ($this->session->userdata('is_logged_in')) {
			$data['title'] = "adminprofile edit";
			$this->load->database();
			$this->load->model('adminprofile_model');
			$query = $this->adminprofile_model->show_adminprofile_id($id);
			$data['eadminprofile'] = $query;
			$this->load->view('include/header', $data);
			$this->load->view('showadminprofile', $data);
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	function edit_adminprofile()
	{
		if ($this->session->userdata('is_logged_in')) {
			$datalist = array(
				'MailAddress' => $this->input->post('MailAddress')
			);
			$id = $this->input->post('id');
			echo $id;
			$data['title'] = "adminprofile Edit";
			$this->load->database();
			$this->load->model('adminprofile_model');
			$query = $this->adminprofile_model->edit_adminprofile($id, $datalist);
			$data1['message'] = 'Data Updated Successfully';
			redirect('adminprofile/successupdate/1');
		} else {
			redirect('main');
		}
	}
	function view_adminprofile()
	{
		if ($this->session->userdata('is_logged_in')) {
			$this->load->database();
			$this->load->model('adminprofile_model');
			$id = $this->input->post('id');
			$query = $this->adminprofile_model->view_adminprofile();
			$data['eadminprofile'] = $query;
			$data['title'] = "adminprofile Data List";
			$this->load->view('include/header', $data);
			$this->load->view('showadminprofile');
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	function successupdate()
	{
		if ($this->session->userdata('is_logged_in')) {
			$this->load->database();
			$this->load->model('adminprofile_model');
			$query = $this->adminprofile_model->view_adminprofile();
			$data['eadminprofile'] = $query;
			$data['title'] = "adminprofile Data";
			$datamsg['h1title'] = 'Data Updated Successfully';
			$this->load->view('include/header', $data);
			$this->load->view('showadminprofile', $datamsg);
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	public function Logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
?>