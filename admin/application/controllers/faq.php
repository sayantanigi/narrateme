<?php
//error_reporting(0);
class faq extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('faq_model');
	}
	function index() {
		if ($this->session->userdata('is_logged_in')) {
			$data['title'] = "Add FAQ";
			$this->load->view('include/header', $data);
			$this->load->view('faq/faqadd_view');
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
	function add_faq() {
		if ($this->session->userdata('is_logged_in')) {
			$this->form_validation->set_rules('faqq', 'FAQ Question', 'required|min_length[1]');
			$this->form_validation->set_rules('faqa', 'FAQ Answer', 'required|min_length[1]');
			if ($this->form_validation->run() == FALSE) {
				$data['title'] = "Add Faq";
				$this->load->view('include/header', $data);
				$this->load->view('faq/faqadd_view');
				$this->load->view('include/footer');
			} else {
				$data = array(
					'faqq' => str_replace(PHP_EOL, '', $this->input->post('faqq')),
					'faqa' => str_replace(PHP_EOL, '', $this->input->post('faqa')),
					'post_date' => date('Y-m-d'),
					'status' => 1
				);
				$this->faq_model->insert_faq($data);
				$this->session->set_flashdata('message', 'Data added Successfully');
				redirect('faq/view_faq');
			}
		} else {
			redirect('main');
		}
	}
	function view_faq() {
		if ($this->session->userdata('is_logged_in')) {
			$data['efaq'] = $this->faq_model->view_faq();
			$data['title'] = "FAQ List";
			$this->load->view('include/header', $data);
			$this->load->view('faq/showfaq');
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	function show_faq_id($id) {
		if ($this->session->userdata('is_logged_in')) {
			$data['title'] = "FAQ Edit";
			$data['efaq'] = $this->faq_model->show_faq_id($id);
			$this->load->view('include/header', $data);
			$this->load->view('faq/faqedit', $data);
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	function edit_faq() {
		if ($this->session->userdata('is_logged_in')) {
			$datalist = array(
				'faqq' => $this->input->post('faqq'),
				'faqa' => $this->input->post('faqa'),
				'post_date' => date('Y-m-d'),
				'status' => 1
			);
			$id = $this->input->post('id');
			$this->faq_model->edit_faq($id, $datalist);
			$this->session->set_flashdata('message', 'Data Updated Successfully');
			redirect('faq/view_faq');
		} else {
			redirect('main');
		}
	}
	function delete_faq($id) {
		if ($this->session->userdata('is_logged_in')) {
			$this->faq_model->delete_faq($id);
			$this->session->set_flashdata('message', 'Data deleted Successfully');
			redirect('faq/view_faq');
		} else {
			redirect('main');
		}
	}
}
?>