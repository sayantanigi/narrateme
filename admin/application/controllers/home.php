<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        // /$this->load->library('session');
    }

    function index() {
        if($this->session->userdata('is_logged_in')==1) {
            $session_data = $this->session->userdata('logged_in');
            $this->session->userdata('is_logged_in');
            $data['UserName'] = @$session_data['username'];
            $data2['title'] = "Dashbord";
            $this->load->view('include/header',$data2);
            $this->load->view('home_view', $data);
            $this->load->view('include/footer',$data);
        } else {
            redirect('main', 'refresh');
        }
    }

    function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home', 'refresh');
    }
}
?>