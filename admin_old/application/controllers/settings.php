<?php
class settings extends CI_Controller {
		//============Constructor to call Model====================
		function __construct() {
			parent::__construct();
			$this->load->model('settings_model');
		}
		//============Constructor to call Model====================
		function index(){
			if($this->session->userdata('is_logged_in')){ 

			$data['title'] = "Settings";
			$this->load->view('header',$data);
			$this->load->helper(array('form'));
			$this->load->view('showsettings');
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
		function show_settings_id($id) {
			if($this->session->userdata('is_logged_in')){
			$data['title'] = "Settings Edit";

			//Loading Database
			$this->load->database();

			//Calling Model
			$this->load->model('settings_model');

			//Transfering data to Model
			$query = $this->settings_model->show_settings_id($id);

			$data['esettings'] = $query;
			$this->load->view('header',$data);
			$this->load->view('showsettings', $data);
			$this->load->view('footer');
			}else{
				redirect('main');
			}
		}
   		//================Show newsmedia by Id=================
  	 	//================Update newsmedia ====================
		function edit_settings(){
			if($this->session->userdata('is_logged_in')){
			//====================Post Data=====================
			$datalist = array(
			'google_analytics' => $this->input->post('google_analytics'),
			'facebook_link' => $this->input->post('facebook_link'),
			'twitter_link' => $this->input->post('twitter_link'),
			'youtube_link' => $this->input->post('youtube_link'),
			'googleplus_link' => $this->input->post('googleplus_link'),
			'pinterest_link' => $this->input->post('pinterest_link'),
			'instagram_link' => $this->input->post('instagram_link'),
			'status' => 1
			);
			//print_r($datalist); 
			//====================Post Data===================
			$id=$this->input->post('id');  echo $id; 
			$data['title'] = "Settings Edit";

			//loading database
			$this->load->database();
			
			//Calling Model
			$this->load->model('settings_model');

			//Transfering data to Model
			$query = $this->settings_model->edit_settings($id,$datalist);
			
			$data1['message'] = 'Data Updated Successfully';
			redirect('settings/successupdate/1');
			}else{
				redirect('main');
			}
		}
		//================Update newsmedia ====================
		//================View newsmedia Data List=============

		function view_settings(){

			if($this->session->userdata('is_logged_in')){

			//Loading Database
			$this->load->database();

			//Calling Model
			$this->load->model('settings_model');
			$id=$this->input->post('id');
			//Transfering data to Model
			$query = $this->settings_model->view_settings();
			
			$data['esettings'] = $query;

			$data['title'] = "Settings Data List";
			$this->load->view('header',$data);
			$this->load->view('showsettings');
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
			$this->load->model('settings_model');

			//Transfering data to Model
			$query = $this->settings_model->view_settings();
			
			$data['esettings'] = $query;
			$data['title'] = "Settings Data";
			$datamsg['h1title'] = 'Data Updated Successfully';
			$this->load->view('header',$data);
			$this->load->view('showsettings',$datamsg);
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
