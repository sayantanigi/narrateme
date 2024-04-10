<?php
class Audio extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('audio_model');
	}
	function index() {
		if ($this->session->userdata('is_logged_in')) {
			$data['title'] = "Add audio";
			$this->load->view('include/header', $data);
			$this->load->helper(array('form'));
			$this->load->view('audioadd_view');
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
	function add_audio() {
		if ($this->session->userdata('is_logged_in')) {
			$this->form_validation->set_rules('audio_date', 'audio Date', 'required|min_length[1]|max_length[25]');
			$this->form_validation->set_rules('link_rec_audio', 'Link Rec audio', 'required|min_length[1]|max_length[300]');
			$this->form_validation->set_rules('ip_live_cam', 'Ip Live Cam', 'required|min_length[1]|max_length[50]');
			if ($this->form_validation->run() == FALSE) {
				$data['title'] = "Add audio";
				$this->load->view('include/header', $data);
				$this->load->view('audioadd_view');
				$this->load->view('include/footer');
			} else {
				$data = array(
					'audio_date' => date('Y-m-d H:i:s', strtotime($this->input->post('audio_date'))),
					'description' => stripcslashes(trim($this->input->post('description'))),
					'link_rec_audio' => $this->input->post('link_rec_audio'),
					'ip_live_cam' => $this->input->post('ip_live_cam'),
					'status' => 1
				);
				$this->audio_model->add_audio($data);
				$this->session->set_flashdata('message', 'Data Updated Successfully');
				redirect('audio/view_audio');
			}
		} else {
			redirect('main');
		}
	}
	function view_audio() {
		if ($this->session->userdata('is_logged_in')) {
			$this->load->database();
			$this->load->model('audio_model');
			$query = $this->audio_model->view_audio();
			$data['ecms'] = $query;
			$data['title'] = "audio Data List";
			$this->load->view('include/header', $data);
			$this->load->view('showaudio');
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	function show_audio_id($id) {
		if ($this->session->userdata('is_logged_in')) {
			$data['title'] = "audio Edit";
			$this->load->database();
			$this->load->model('audio_model');
			$query = $this->audio_model->show_audio_id($id);
			$data['ecms'] = $query;
			$this->load->view('include/header', $data);
			$this->load->view('audioedit', $data);
			$data['title'] = "Edit Data List";
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	function edit_audio() {
		if ($this->session->userdata('is_logged_in')) {
			$datalist = array(
				'audio_date' => date('Y-m-d', strtotime($this->input->post('audio_date'))),
				'link_rec_audio' => $this->input->post('link_rec_audio'),
				'ip_live_cam' => $this->input->post('ip_live_cam'),
				'status' => $this->input->post('status'),
				'description' => stripcslashes(trim($this->input->post('description')))
			);
			$id = $this->input->post('id');
			$data['title'] = "audio Edit";
			$this->load->database();
			$this->load->model('audio_model');
			$query = $this->audio_model->edit_audio($id, $datalist);
			$this->session->set_flashdata('message', 'Data Updated Successfully');
			redirect('audio/view_audio');
		} else {
			redirect('main');
		}
	}
	function delete_audio($id)
	{
		if ($this->session->userdata('is_logged_in')) {
			$this->load->database();
			$this->audio_model->delete_audio($id);
			$this->session->set_flashdata('message', 'Data Updated Successfully');
			redirect('audio/view_audio');
		} else {
			redirect('main');
		}
	}
}
?>