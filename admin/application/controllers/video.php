<?php
class Video extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('video_model');
		$this->load->helper(array('form'));
	}
	function index() {
		if ($this->session->userdata('is_logged_in')) {
			$data['title'] = "Add Video";
			$this->load->view('include/header', $data);
			$this->load->view('videoadd_view');
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
	function add_video() {
		if ($this->session->userdata('is_logged_in')) {
			$this->form_validation->set_rules('video_date', 'Video Date', 'required|min_length[1]|max_length[25]');
			$this->form_validation->set_rules('link_rec_video', 'Link Rec Video', 'required|min_length[1]|max_length[300]');
			$this->form_validation->set_rules('ip_live_cam', 'Ip Live Cam', 'required|min_length[1]|max_length[50]');
			if ($this->form_validation->run() == FALSE) {
				$data['title'] = "Add video";
				$this->load->view('include/header', $data);
				$this->load->view('videoadd_view');
				$this->load->view('include/footer');
			} else {
				$data = array(
					'video_date' => date('Y-m-d H:i:s', strtotime($this->input->post('video_date'))),
					'description' => stripcslashes(trim($this->input->post('description'))),
					'link_rec_video' => $this->input->post('link_rec_video'),
					'ip_live_cam' => $this->input->post('ip_live_cam'),
					'status' => 1
				);
				$this->video_model->add_video($data);
				$this->session->set_flashdata('message', 'Data Added Successfully');
				redirect('video/view_video');
			}
		} else {
			redirect('main');
		}
	}
	function view_video() {
		if ($this->session->userdata('is_logged_in')) {
			$this->load->database();
			$this->load->model('video_model');
			$query = $this->video_model->view_video();
			$data['ecms'] = $query;
			$data['title'] = "video Data List";
			$this->load->view('include/header', $data);
			$this->load->view('showvideo');
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	function show_video_id($id) {
		if ($this->session->userdata('is_logged_in')) {
			$data['title'] = "video Edit";
			$this->load->database();
			$this->load->model('video_model');
			$query = $this->video_model->show_video_id($id);
			$data['ecms'] = $query;
			$this->load->view('include/header', $data);
			$this->load->view('videoedit', $data);
			$data['title'] = "Edit Data List";
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	function edit_video() {
		if ($this->session->userdata('is_logged_in')) {
			$datalist = array(
				'video_date' => date('Y-m-d', strtotime($this->input->post('video_date'))),
				'link_rec_video' => $this->input->post('link_rec_video'),
				'ip_live_cam' => $this->input->post('ip_live_cam'),
				'status' => $this->input->post('status'),
				'description' => stripcslashes(trim($this->input->post('description')))
			);
			$id = $this->input->post('id');
			$data['title'] = "video Edit";
			$this->load->database();
			$this->load->model('video_model');
			$query = $this->video_model->edit_video($id, $datalist);
			$this->session->set_flashdata('message', 'Data Updated Successfully');
			redirect('video/view_video');
		} else {
			redirect('main');
		}
	}
	function delete_video($id)
	{
		if ($this->session->userdata('is_logged_in')) {
			$this->load->database();
			$this->video_model->delete_video($id);
			$this->session->set_flashdata('message', 'Data Deleted Successfully');
			redirect('video/view_video');
		} else {
			redirect('main');
		}
	}
}
?>