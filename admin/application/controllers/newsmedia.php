<?php
class newsmedia extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('newsmedia_model');
		$this->load->helper(array('form'));
	}
	function index() {
		if ($this->session->userdata('is_logged_in')) {
			$data['title'] = "Add newsmedia";
			$this->load->view('include/header', $data);
			$this->load->view('newsmediaadd_view');
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
			redirect('main');
		}
	}
	function add_newsmedia() {
		if ($this->session->userdata('is_logged_in')) {
			$this->form_validation->set_rules('name', 'Name', 'required|min_length[1]|max_length[25]');
			$this->form_validation->set_rules('website', 'Web Site', 'required|min_length[1]|max_length[50]');
			$this->form_validation->set_rules('domain_name', 'Domain Name', 'required|min_length[1]|max_length[50]');
			$this->form_validation->set_rules('url', 'Url', 'required|min_length[5]|max_length[50]');
			if ($this->form_validation->run() == FALSE) {
				$data['title'] = "Add newsmedia";
				$this->load->view('include/header', $data);
				$this->load->view('newsmediaadd_view');
				$this->load->view('include/footer');
			} else {
				$data = array(
					'name' => $this->input->post('name'),
					'website' => $this->input->post('website'),
					'domain_name' => $this->input->post('domain_name'),
					'url' => $this->input->post('url'),
					'ipaddress' => $this->input->post('ipaddress'),
					'information' => $this->input->post('information'),
					'newsreport' => $this->input->post('newsreport'),
					'status' => 1
				);
				$this->newsmedia_model->insert_newsmedia($data);
				$this->session->set_flashdata('message', 'Data added Successfully');
				redirect('newsmedia/view_newsmedia');
			}
		} else {
			redirect('main');
		}
	}
	function view_newsmedia() {
		if ($this->session->userdata('is_logged_in')) {
			$data['ecms'] = $this->newsmedia_model->view_newsmedia();
			$data['title'] = "newsmedia Data List";
			$this->load->view('include/header', $data);
			$this->load->view('shownewsmedia');
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	function show_newsmedia_id($id) {
		if ($this->session->userdata('is_logged_in')) {
			$data['title'] = "newsmedia Edit";
			$data['ecms'] = $this->newsmedia_model->show_newsmedia_id($id);
			$this->load->view('include/header', $data);
			$this->load->view('newsmediaedit', $data);
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	function edit_newsmedia() {
		if ($this->session->userdata('is_logged_in')) {
			$datalist = array(
				'name' => $this->input->post('name'),
				'website' => $this->input->post('website'),
				'domain_name' => $this->input->post('domain_name'),
				'url' => $this->input->post('url'),
				'ipaddress' => $this->input->post('ipaddress'),
				'information' => $this->input->post('information'),
				'newsreport' => $this->input->post('newsreport'),
				'status' => 1
			);
			$id = $this->input->post('id');
			$data['title'] = "newsmedia Edit";
			$query = $this->newsmedia_model->edit_newsmedia($id, $datalist);
			$this->session->set_flashdata('message', 'Data Updated Successfully');
			redirect('newsmedia/view_newsmedia');
		} else {
			redirect('main');
		}
	}
	function delete_newsmedia($id) {
		if ($this->session->userdata('is_logged_in')) {
			$this->newsmedia_model->delete_newsmedia($id);
			$this->session->set_flashdata('message', 'Data Deleted Successfully');
			redirect('newsmedia/view_newsmedia');
		} else {
			redirect('main');
		}
	}
}
?>