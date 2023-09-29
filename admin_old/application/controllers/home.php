<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        if($this->session->userdata('is_logged_in')==1) {
            $session_data = $this->session->userdata('logged_in');
            $this->session->userdata('is_logged_in');
            $data['UserName'] = $session_data['username'];
            $data2['title'] = "Dashbord";
            $this->load->view('header',$data2);
            $this->load->view('home_view', $data);
            $this->load->view('footer',$data);
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