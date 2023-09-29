<?php
class adminprofile extends CI_Controller {
		//============Constructor to call Model====================
		function __construct() {
			parent::__construct();
			$this->load->model('adminprofile_model');
		}
		//============Constructor to call Model====================
		function index(){
			if($this->session->userdata('is_logged_in')){ 

			$data['title'] = "Adminprofile";
			$this->load->view('header',$data);
			$this->load->helper(array('form'));
			$this->load->view('showadminprofile');
			$this->load->view('footer');
			}else{
               redirect('main');
            }
		}

		public function is_logged_in(){
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        //header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        $is_logged_in = $this->session->userdata('logged_in');

        if(!isset($is_logged_in) || $is_logged_in!==TRUE){
            redirect('main');
        }
    }
  		//================Show newsmedia by Id=================
		function show_adminprofile_id($id) {
			if($this->session->userdata('is_logged_in')){
			$data['title'] = "adminprofile edit";

			//Loading Database
			$this->load->database();

			//Calling Model
			$this->load->model('adminprofile_model');

			//Transfering data to Model
			$query = $this->adminprofile_model->show_adminprofile_id($id);

			$data['eadminprofile'] = $query;
			$this->load->view('header',$data);
			$this->load->view('showadminprofile', $data);
			$this->load->view('footer');
			}else{
				redirect('main');
			}
		}
   		//================Show newsmedia by Id=================
  	 	//================Update newsmedia ====================
		function edit_adminprofile(){
			if($this->session->userdata('is_logged_in')){
			//====================Post Data=====================
			$datalist = array(
			'MailAddress' => $this->input->post('MailAddress')
			);
			//print_r($datalist); 
			//====================Post Data===================
			$id=$this->input->post('id');  echo $id; 
			$data['title'] = "adminprofile Edit";

			//loading database
			$this->load->database();
			
			//Calling Model
			$this->load->model('adminprofile_model');

			//Transfering data to Model
			$query = $this->adminprofile_model->edit_adminprofile($id,$datalist);
			
			$data1['message'] = 'Data Updated Successfully';
			redirect('adminprofile/successupdate/1');
			}else{
				redirect('main');
			}
		}
		//================Update newsmedia ====================
		//================View newsmedia Data List=============

		function view_adminprofile(){

			if($this->session->userdata('is_logged_in')){

			//Loading Database
			$this->load->database();

			//Calling Model
			$this->load->model('adminprofile_model');
			$id=$this->input->post('id');
			//Transfering data to Model
			$query = $this->adminprofile_model->view_adminprofile();
			
			$data['eadminprofile'] = $query;

			$data['title'] = "adminprofile Data List";
			$this->load->view('header',$data);
			$this->load->view('showadminprofile');
			$this->load->view('footer');
			}else{
				redirect('main');
			}
		}
		//================View newsmedia Data List=============
  		//=======================Update Success message=========

		function successupdate(){
			if($this->session->userdata('is_logged_in')){

			//loading database
			$this->load->database();

			//Calling Model
			$this->load->model('adminprofile_model');

			//Transfering data to Model
			$query = $this->adminprofile_model->view_adminprofile();
			
			$data['eadminprofile'] = $query;
			$data['title'] = "adminprofile Data";
			$datamsg['h1title'] = 'Data Updated Successfully';
			$this->load->view('header',$data);
			$this->load->view('showadminprofile',$datamsg);
			$this->load->view('footer');
			}else{
				redirect('main');
			}
		}
		//=======================Update Success message=========
		//======================Logout==========================
		public function Logout(){
        	$this->session->sess_destroy();
        	redirect('login');
    	}
		//======================Logout==========================
}
?>
