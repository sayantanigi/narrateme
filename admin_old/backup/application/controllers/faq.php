<?php
class faq extends CI_Controller {
		//============Constructor to call Model====================
		function __construct() {
			parent::__construct();
			$this->load->model('faq_model');
		}
		//============Constructor to call Model====================
		function index(){
			if($this->session->userdata('is_logged_in')){ 
			$data['title'] = "Add FAQ";
			$this->load->view('header',$data);
			$this->load->helper(array('form'));
			$this->load->view('faqadd_view');
			$this->load->view('footer');
			}else{
               redirect('main');
            }
		}

		public function is_logged_in(){
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        $is_logged_in = $this->session->userdata('logged_in');

        if(!isset($is_logged_in) || $is_logged_in!==TRUE){
            redirect('main');
        	}
    	}
		//=======================Insert FAQ Data============
		function add_faq(){

			if($this->session->userdata('is_logged_in')){

			//Validating Name Field
			$this->form_validation->set_rules('faqq', 'FAQ Question', 'required|min_length[1]');

			//Validating Address Field
			$this->form_validation->set_rules('faqa', 'FAQ Answer', 'required|min_length[1]');
			

			if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Add Faq";
			$this->load->view('header',$data);
			$this->load->view('faqadd_view');
			$this->load->view('footer');
			}else {
			//Setting values for tabel columns

			$data = array(
			'faqq' => $this->input->post('faqq'),
			'faqa' => $this->input->post('faqa'),
			'post_date' => date('Y-m-d'),
			'status' => 1
			);

			//Transfering data to Model
			$this->faq_model->insert_faq($data);
			$data1['message'] = 'Data Inserted Successfully';
			redirect('faq/success');
			}
			}else{
				redirect('main');
			}
		}
		//=======================Insert FAQ Data============
  		//=======================Insertion Success message=========

		function success(){
			if($this->session->userdata('is_logged_in')){
			//loading database
			$this->load->database();
			//Calling Model
			$this->load->model('faq_model');
			//Transfering data to Model
			$query = $this->faq_model->view_faq();
			$data['efaq'] = $query;
			$data['title'] = "Add FAQ";
			$datamsg['h1title'] = 'Data Inserted Successfully';
			$this->load->view('header',$data);
			$this->load->view('showfaq',$datamsg);
			$this->load->view('footer'); 
			}else{
				redirect('main');
			}
		}
		//=======================Insertion Success message=========
		//================View FAQ Data List=============
		function view_faq(){

			if($this->session->userdata('is_logged_in')){

			//Loading Database
			$this->load->database();

			//Calling Model
			$this->load->model('faq_model');

			//Transfering data to Model
			$query = $this->faq_model->view_faq();
			$data['efaq'] = $query;
			$data['title'] = "FAQ Data List";
			$this->load->view('header',$data);
			$this->load->view('showfaq');
			$this->load->view('footer');
			}else{
				redirect('main');
			}
		}
		//================View FAQ Data List=============
  		//================Show FAQ by Id=================
		function show_faq_id($id) {

			if($this->session->userdata('is_logged_in')){
			$data['title'] = "FAQ Edit";

			//Loading Database
			$this->load->database();

			//Calling Model
			$this->load->model('faq_model');

			//Transfering data to Model
			$query = $this->faq_model->show_faq_id($id);

			$data['efaq'] = $query;
			$this->load->view('header',$data);
			$this->load->view('faqedit', $data);
			$this->load->view('footer');
			}else{
				redirect('main');
			}
		}
   		//================Show FAQ by Id=================
  	 	//================Update FAQ ====================
		function edit_faq(){

			if($this->session->userdata('is_logged_in')){
		//====================Post Data=====================
			$datalist =array(
			'faqq' => $this->input->post('faqq'),
			'faqa' => $this->input->post('faqa'),
			'post_date' => date('Y-m-d'),
			'status' => 1
			);
		//====================Post Data===================
			$id=$this->input->post('id');  echo $id; 
			$data['title'] = "FAQ Edit";

			//loading database
			$this->load->database();

			//Calling Model
			$this->load->model('faq_model');

			//Transfering data to Model
			$query = $this->faq_model->edit_faq($id,$datalist);
			$data1['message'] = 'Data Inserted Successfully';
			redirect('faq/successupdate');
			}else{
				redirect('main');
			}
		}
		//================Update faq ====================
  		//=======================Update Success message=========
		function successupdate(){
			if($this->session->userdata('is_logged_in')){

			//loading database
			$this->load->database();

			//Calling Model
			$this->load->model('faq_model');

			//Transfering data to Model
			$query = $this->faq_model->view_faq();
			$data['efaq'] = $query;
			$data['title'] = "FAQ Data List";
			$datamsg['h1title'] = 'Data Updated Successfully';
			$this->load->view('header',$data);
			$this->load->view('showfaq',$datamsg);
			$this->load->view('footer');
			}else{
				redirect('main');
			}
		}
		//=======================Update Success message=========
		//=======================Delete faq==============
		function delete_faq($id){

			if($this->session->userdata('is_logged_in')){

			//Loading  Database
			$this->load->database();

			//Transfering data to Model
			$this->faq_model->delete_faq($id);
			$data1['message'] = 'Data Deleted Successfully';
			redirect('faq/successdelete');
			}else{
				redirect('main');
			}
		}
		//======================Delete faq===============

		//======================Delete Success message==========
		function successdelete(){

			if($this->session->userdata('is_logged_in')){

			//Loading  Database
			$this->load->database();

			//Calling Model
			$this->load->model('faq_model');

			//Transfering data to Model
			$query = $this->faq_model->view_faq();
			$data['efaq'] = $query;
			$data['title'] = "FAQ Data List";
			$datamsg['h1title'] = 'Data Updated Successfully';
			$this->load->view('header',$data);
			$this->load->view('showfaq');
			$this->load->view('footer');
			}else{
				redirect('main');
			}
		}
  		//======================Delete Success message==========
		//======================Logout==========================
		public function Logout(){
        	$this->session->sess_destroy();
        	redirect('login');
    	}
		//======================Logout==========================
}
?>