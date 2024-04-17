<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Level extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library(array('form_validation', 'session'));
		if ($this->session->userdata('is_logged_in') != 1) {
			redirect('supercontrol/home', 'refresh');
		}
		$this->load->model('supercontrol/level_model');
		$this->load->library('image_lib');
		$this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
		$this->output->set_header('Pragma: no-cache');
	}
	function index() {
		if ($this->session->userdata('is_logged_in')) {
			redirect('supercontrol/level/level_add_form');
		} else {
			$this->load->view('supercontrol/login');
		}
	}
	function level_add_form() {
		$data['title'] = "Add level";
		$this->load->view('supercontrol/header', $data);
		$this->load->view('supercontrol/leveladd_view');
		$this->load->view('supercontrol/footer');
	}
	function add_level() {
		$my_date = date("Y-m-d", time());
		$data = array(
            'level_title' => $this->input->post('level_title'),
            'posted_by' => $this->session->userdata('userid'),
            'date' => $my_date,
            'level_status' => 1
        );
		//print_r($data); die;
        $this->db->insert('sm_levels', $data);
		$this->session->set_flashdata('message', 'Data Added Successfully !!!');
        redirect('supercontrol/level/show_level');
	}
	function view_level($id) {
		$id = $this->uri->segment(4);
		$data['title'] = "Edit level";
		$query = $this->level_model->show_level_id($id);
		$data['ecms'] = $query;
		$this->load->view('supercontrol/header', $data);
		$this->load->view('supercontrol/level_view', $data);
		$this->load->view('supercontrol/footer');
	}
	function success() {
		$data['h1title'] = 'Add level';
		$data['title'] = 'Add level';
		$this->load->view('supercontrol/header');
		$this->load->view('supercontrol/leveladd_view', $data);
		$this->load->view('supercontrol/footer');
	}
	function show_level() {
		$query = $this->level_model->show_level();
		$data['ecms'] = $query;
		$data['title'] = "Level List";
		$this->load->view('supercontrol/header', $data);
		$this->load->view('supercontrol/showlevellist');
		$this->load->view('supercontrol/footer');
	}
	function statuslevel() {
		$stat = $this->input->get('stat');
		$id = $this->input->get('id');
		$this->load->model('supercontrol/level_model');
		$this->level_model->updt($stat, $id);
	}
	function show_level_id($id) {
		$id = $this->uri->segment(4);
		$data['title'] = "Edit level";
		$query = $this->level_model->show_level_id($id);
		$data['ecms'] = $query;
		$this->load->view('supercontrol/header', $data);
		$this->load->view('supercontrol/level_edit', $data);
		$this->load->view('supercontrol/footer');
	}
	function edit_level() {
		$datalist = array(
			'level_title' => $this->input->post('level_title'),
			'posted_by' => $this->session->userdata('userid'),
		);
		$id = $this->input->post('id');
		$data['title'] = "Level Edit";
		$query = $this->level_model->level_edit($id, $datalist);
		$data1['message'] = '<div class="alert alert-success text-center"> Data successfully uploaded!!!</div>';
		$query = $this->level_model->show_levellist();
		$data['ecms'] = $query;
		$data['title'] = "Level Page List";
		$this->load->view('supercontrol/header', $data);
		$this->load->view('supercontrol/showlevellist', $data1);
		$this->load->view('supercontrol/footer');
	}
	function delete_level() {
		$id = $this->uri->segment(4);
		$result = $this->level_model->show_level_id($id);
		$mode_image = $result[0]->level_image;
		$query = $this->level_model->delete_level($id, $mode_image);
		$query = $this->level_model->show_levellist();
		$data['ecms'] = $query;
		$data['title'] = "level Page List";
		$this->session->set_flashdata('success_delete', 'level Deleted Successfully !!!');
		redirect('supercontrol/level/show_level', TRUE);
	}
	function delete_multiple() {
		$ids = (explode(',', $this->input->get_post('ids')));
		$this->level_model->delete_mul($ids);
		$data4['msg1'] = '<div class="alert alert-success text-center"> Data successfully delete!!!</div>';
		$this->load->view('supercontrol/header');
		redirect('supercontrol/level/show_level', $data4);
		$this->load->view('supercontrol/footer');
	}
	public function Logout() {
		$this->session->sess_destroy();
		redirect('supercontrol/login');
	}
}
?>