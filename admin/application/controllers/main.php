<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('model_users');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index() {
		$data['title'] = "Admin Login";
		$this->load->view('headerlogin');
		$this->load->view('login_view', $data);
		$this->load->view('footerlogin');
	}

	public function login_validation() {
		$this->rules_login();
		if ($this->form_validation->run() == FALSE) {
			redirect();
		} else {
			$cond = "UserName='".$_POST['username']."' and UserPassword='".md5($_POST['password'])."'";
			$checkLoginUser = $this->model_users->get_single("na_admin_detail",$cond);
			if(!empty($checkLoginUser)) {
				$sess = array("username"=>$checkLoginUser->UserName,'is_logged_in' => 1);
				$this->session->set_userdata($sess);
				$username = $this->session->userdata('username');
				redirect(base_url('home'));
			} else {
				$this->session->set_flashdata('message', 'Incorrect email address and password.');
				redirect(admin_url());
			}
		}
	}

	public function rules_login() {
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');
	}

	public function reset_password() {
		$this->load->model('model_users');
		$this->form_validation->set_rules('old_password', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('newpassword', 'New Password', 'required|matches[re_password]');
		$this->form_validation->set_rules('re_password', 'Retype Password', 'required');
		if($this->form_validation->run() == FALSE) {
			$data['title'] = "Admin Reset Password";
			$sessionData = $this->session->userdata('is_logged_in');
			$this->data['id'] = $sessionData['id'];
			$id=$this->input->post('id');
			$this->data['UserName'] = $sessionData['UserName'];
			$this->load->view('header',$data);
			$this->load->view('resetpassword', $data);
			$this->load->view('footer');
		} else {
			$this->load->database();
			$id=$this->input->post('id');
			$query = $this->model_users->checkOldPass(md5($this->input->post('old_password')),$id);
			//print_r($query); print $this->db->last_query(); 
			if($query){
				$id=$this->input->post('id');
				$query = $this->model_users->saveNewPass(md5($this->input->post('newpassword')),$id);
				//print $this->db->last_query(); exit();
				if($query) {
					redirect('main/reset_success');
				} else {
					redirect('change_password');
				}
			}
		}
	}

	function reset_success() {
		$data['title'] = "Admin Reset Password";
		$datamsg['titlemessage'] = "Password Reset Successfully";
		$this->load->view('header',$data);
		$this->load->view('resetpassword', $datamsg);
		$this->load->view('footer');
	}

    public function logout(){
		$this->session->sess_destroy();
		$this->session->unset_userdata('is_logged_in');
		redirect('main');
	}
}
?>