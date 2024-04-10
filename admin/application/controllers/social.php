<?php
class Social extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('social_model');
	}
	function index() {
		if ($this->session->userdata('is_logged_in')) {
			$data['title'] = "Add Social Media ";
			$this->load->view('include/header', $data);
			$this->load->helper(array('form'));
			$this->load->view('socialadd_view');
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
	function add_social() {
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[1]|max_length[25]');
		$this->form_validation->set_rules('description', 'Description', 'required|min_length[1]|max_length[300]');
		$this->form_validation->set_rules('ip_address', 'Ip Address', 'required|min_length[1]|max_length[50]');
		$this->form_validation->set_rules('website', 'Website', 'required|min_length[1]|max_length[50]');
		$this->form_validation->set_rules('domain_name', 'Domain Name', 'required|min_length[1]|max_length[50]');
		$this->form_validation->set_rules('url', 'Url', 'required|min_length[1]|max_length[50]');
		$this->form_validation->set_rules('marking_media', 'Marking Media', 'required|min_length[1]|max_length[50]');
		$this->form_validation->set_rules('add_meterial', 'Add Meterial', 'required|min_length[1]|max_length[50]');
		$this->form_validation->set_rules('marketing_meterial', 'Marketing Meterial', 'required|min_length[1]|max_length[50]');
		$this->form_validation->set_rules('commercials', 'Commercials', 'required|min_length[1]|max_length[50]');
		$this->form_validation->set_rules('infomercials', 'infomercials', 'required|min_length[1]|max_length[50]');
		$this->form_validation->set_rules('media_link', 'Media Link', 'required|min_length[1]|max_length[50]');
		$this->form_validation->set_rules('network_site', 'Network Site', 'required|min_length[1]|max_length[50]');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Add Social";
			$this->load->view('include/header', $data);
			$this->load->view('socialadd_view');
			$this->load->view('include/footer');
		} else {
			$data = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'ip_address' => $this->input->post('ip_address'),
				'website' => $this->input->post('website'),
				'domain_name' => $this->input->post('domain_name'),
				'url' => $this->input->post('url'),
				'marking_media' => $this->input->post('marking_media'),
				'add_meterial' => $this->input->post('add_meterial'),
				'marketing_meterial' => $this->input->post('marketing_meterial'),
				'commercials' => $this->input->post('commercials'),
				'infomercials' => $this->input->post('infomercials'),
				'media_link' => $this->input->post('media_link'),
				'network_site' => $this->input->post('network_site'),
				'email' => $this->input->post('email'),
				'status' => 1
			);
			$this->social_model->insert_social($data);
			$this->session->set_flashdata('message', 'Data Updated Successfully');
			redirect('social/view_social');
		}
	}
	function view_social()
	{
		$this->load->database();
		$this->load->model('social_model');
		$query = $this->social_model->view_social();
		$data['ecms'] = $query;
		$data['title'] = "Social Data List";
		$this->load->view('include/header', $data);
		$this->load->view('showsocial');
		$this->load->view('include/footer');
	}
	function show_social_id($id)
	{
		$data['title'] = "Social Edit";
		$this->load->database();
		$this->load->model('social_model');
		$query = $this->social_model->show_social_id($id);
		$data['ecms'] = $query;
		$this->load->view('include/header', $data);
		$this->load->view('socialedit', $data);
		$data['title'] = "Edit Data List";
		$this->load->view('include/footer');
	}
	function edit_social()
	{
		$datalist = array(
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			'ip_address' => $this->input->post('ip_address'),
			'website' => $this->input->post('website'),
			'domain_name' => $this->input->post('domain_name'),
			'url' => $this->input->post('url'),
			'marking_media' => $this->input->post('marking_media'),
			'add_meterial' => $this->input->post('add_meterial'),
			'marketing_meterial' => $this->input->post('marketing_meterial'),
			'commercials' => $this->input->post('commercials'),
			'infomercials' => $this->input->post('infomercials'),
			'media_link' => $this->input->post('media_link'),
			'network_site' => $this->input->post('network_site'),
			'email' => $this->input->post('email'),
			'status' => 1
		);
		$id = $this->input->post('id');
		$data['title'] = "Social Edit";
		$this->load->database();
		$this->load->model('social_model');
		$query = $this->social_model->edit_social($id, $datalist);
		$this->session->set_flashdata('message', 'Data Updated Successfully');
		redirect('social/view_social');
	}
	function delete_social($id)
	{
		$this->load->database();
		$this->social_model->delete_social($id);
		$this->session->set_flashdata('message', 'Data Updated Successfully');
		redirect('social/view_social');
	}
}
?>