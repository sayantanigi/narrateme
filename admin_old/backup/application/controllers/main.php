<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class main extends CI_Controller {
echo "string"; die();
	public function index() {
		echo "string"; die();
		$data['title'] = "Admin Login";
		//$this->load->view('headerlogin');
		//$this->load->view('login_view', $data);
		//$this->load->view('footerlogin');
	}

	/*public function members() {
		if($this->session->userdata('is_logged_in')){
			$this->load->view('home');
		} else {
			redirect('main/restricted');
		}
	}

	public function restricted() {
		$this->load->view('restricted');
   	}

   	public function signup() {
   		redirect('user/registration');
   	}*/

   	//==================================Form validation===========================================
	public function login_validation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','trim|xss_clean|callback_validate_credentials');
		$this->form_validation->set_rules('password','Password','sha1|trim');
		if($this->form_validation->run()){
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => 1
			);
			//$data1['username']=$this->input->post('username');
			$this->session->set_userdata($data);
			$username = $this->session->userdata('UserName');
			redirect('home');
		} else {
			$data['title'] = "Admin Login";
			$this->load->view('headerlogin');
			$this->load->view('login_view',$data);
			$this->load->view('footerlogin');
		}
	}
	//================================Form Validation==========================================

	//================================Validating admin credentials against database============
	public function validate_credentials(){
		$this->load->model('model_users');
		if($this->model_users->can_log_in()){
			return true;
		} else {
			$this->form_validation->set_message('validate_credentials','Incorrect Username or password');
			return false;
		}
	}
	//==============================Validating admin credentials against database=============

	//==============================Admin reset Password======================================
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
	//==============================Admin reset Password======================================

	//==============================Admin Logout==============================================
    public function logout(){
		$this->session->sess_destroy();
		$this->session->unset_userdata('is_logged_in');
		redirect('main/login');
	}
	//==============================Admin Logout==============================================
}
?>