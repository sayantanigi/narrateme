<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Mode extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library(array('form_validation', 'session'));
        if ($this->session->userdata('is_logged_in') != 1) {
            redirect('supercontrol/home', 'refresh');
        }
        $this->load->model('supercontrol/mode_model');
        $this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('image_lib');
    }
    function index() {
        if ($this->session->userdata('is_logged_in')) {
            redirect('supercontrol/mode/mode_add_form');
        } else {
            $this->load->view('supercontrol/login');
        }
    }
    function mode_add_form() {
        $data['title'] = "Add Mode";
        $this->load->view('supercontrol/header', $data);
        $this->load->view('supercontrol/modeadd_view');
        $this->load->view('supercontrol/footer');
    }
    function add_mode() {
        $my_date = date("Y-m-d", time());
        $data = array(
            'mode_title' => $this->input->post('mode_title'),
            'posted_by' => $this->session->userdata('userid'),
            'mode_desc' => $this->input->post('mode_desc'),
            'date' => $my_date,
            'mode_status' => 1
        );
        $this->mode_model->insert_mode($data);
        $this->session->set_flashdata('message', 'Data Added Successfully !!!');
        redirect('supercontrol/mode/show_mode');
    }
    function view_mode($id) {
        $id = $this->uri->segment(4);
        $data['title'] = "Edit mode";
        $this->load->database();
        $this->load->model('supercontrol/mode_model');
        $query = $this->mode_model->show_mode_id($id);
        $data['ecms'] = $query;
        $this->load->view('supercontrol/header', $data);
        $this->load->view('supercontrol/mode_view', $data);
        $this->load->view('supercontrol/footer');
    }
    function success() {
        $data['h1title'] = 'Add Mode';
        $data['title'] = 'Add Mode';
        $this->load->view('supercontrol/header');
        $this->load->view('supercontrol/modeadd_view', $data);
        $this->load->view('supercontrol/footer');
    }
    function show_mode() {
        $this->load->database();
        $this->load->model('supercontrol/mode_model');
        $query = $this->mode_model->show_mode();
        $data['ecms'] = $query;
        $data['title'] = "Mode List";
        $this->load->view('supercontrol/header', $data);
        $this->load->view('supercontrol/showmodelist');
        $this->load->view('supercontrol/footer');
    }
    function statusmode() {
        $stat = $this->input->get('stat');
        $id = $this->input->get('id');
        $this->load->model('supercontrol/mode_model');
        $this->mode_model->updt($stat, $id);
    }
    function show_mode_id($id) {
        $id = $this->uri->segment(4);
        $data['title'] = "Edit mode";
        $this->load->database();
        $this->load->model('supercontrol/mode_model');
        $query = $this->mode_model->show_mode_id($id);
        $data['ecms'] = $query;
        $this->load->view('supercontrol/header', $data);
        $this->load->view('supercontrol/mode_edit', $data);
        $this->load->view('supercontrol/footer');
    }
    function edit_mode() {
        $mode_image = $this->input->post('mode_image');
        $config = array(
            'upload_path' => "uploads/mode/",
            'upload_url' => base_url() . "uploads/mode/",
            'allowed_types' => "gif|jpg|png|jpeg"
        );
        $this->load->library('upload', $config);
        if ($this->upload->do_upload("userfile")) {
            @unlink("uploads/mode/" . $mode_image);
            $data['img'] = $this->upload->data();
            $datalist = array(
                'mode_title' => $this->input->post('mode_title'),
                'posted_by' => $this->session->userdata('userid'),
                'mode_desc' => $this->input->post('mode_desc'),
                'mode_image' => $data['img']['file_name']
            );
            $id = $this->input->post('mode_id');
            $data['title'] = "Mode Edit";
            $this->load->database();
            $this->load->model('supercontrol/mode_model');
            $query = $this->mode_model->mode_edit($id, $datalist);
            $this->session->set_flashdata('message', 'Data successfully updated!!!');
            $query = $this->mode_model->show_modelist();
            $data['ecms'] = $query;
            $data['title'] = "Mode Page List";
            $this->load->view('supercontrol/header', $data);
            $this->load->view('supercontrol/showmodelist');
            $this->load->view('supercontrol/footer');
        } else {
            $datalist = array(
                'mode_title' => $this->input->post('mode_title'),
                'posted_by' => $this->session->userdata('userid'),
                'mode_desc' => $this->input->post('mode_desc')
            );
            $id = $this->input->post('mode_id');
            $data['title'] = "mode Edit";
            $this->load->database();
            $this->load->model('supercontrol/mode_model');
            $query = $this->mode_model->mode_edit($id, $datalist);
            $this->session->set_flashdata('message', 'Data successfully updated!!!');
            $query = $this->mode_model->show_modelist();
            $data['ecms'] = $query;
            $data['title'] = "mode Page List";
            $this->load->view('supercontrol/header', $data);
            $this->load->view('supercontrol/showmodelist');
            $this->load->view('supercontrol/footer');
        }
    }
    function delete_mode()
    {
        $id = $this->uri->segment(4);
        $result = $this->mode_model->show_mode_id($id);
        $mode_image = $result[0]->mode_image;
        $query = $this->mode_model->delete_mode($id, $mode_image);
        $query = $this->mode_model->show_modelist();
        $data['ecms'] = $query;
        $data['title'] = "mode Page List";
        $this->session->set_flashdata('message', 'Mode Deleted Successfully !!!');
        redirect('supercontrol/mode/show_mode', TRUE);
    }
    function delete_multiple()
    {
        $ids = (explode(',', $this->input->get_post('ids')));
        $this->mode_model->delete_mul($ids);
        $data4['msg1'] = '<div class="alert alert-success text-center"> Data successfully delete!!!</div>';
        $this->load->view('supercontrol/header');
        redirect('supercontrol/mode/show_mode', $data4);
        $this->load->view('supercontrol/footer');
    }
}
?>