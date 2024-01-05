<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Terms extends CI_Controller
{ 
    function __construct()
    {
	      parent::__construct();
	      $this->load->database();
		  $this->load->model('generalmodel');
   }
	public function index()
	{
		
		$data['terms'] = $this->generalmodel->show_data_id("sm_cms",2,"id","get","");
		 		
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
	 
        $data['title'] = "Terms & Conditions";
	    $this->load->view('header',$data);
		$this->load->view('terms');
		$this->load->view('footer');
	}
	public function coursemode(){
		
		
		$modeid=$this->uri->segment(3);
		$data['trm']=$this->generalmodel->fetch_single('sm_mode',$modeid);
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
        $data['title'] ="Course Modes";
	    $this->load->view('header',$data);
		$this->load->view('coursemode');
		$this->load->view('footer');
	}
}

?>
	