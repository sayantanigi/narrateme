<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller{ 
    function __construct() {
	      parent::__construct();
	      $this->load->database();
		  $this->load->model('generalmodel');
   }
	
	
	public function index()
	{
		
		
		$data['bloglist']  = $this->generalmodel->show_data_id("sm_blog","","","get","");
		//print_r(	$data['bloglist'] );die;
	
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
        $data['title'] = "Blog List";
	    $this->load->view('header',$data);
		$this->load->view('blog');
		$this->load->view('footer');
	}
	
	public function newsdetails()
	{
						
		$id =$this->uri->segment(4);
		$data['news'] = $this->generalmodel->show_data_id("sm_news",$id,"id","get","");
		 		
	 	$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
        $data['title'] = "News Details";
	    $this->load->view('header',$data);
		$this->load->view('newsdetails');
		$this->load->view('footer');
		
	}
}

?>
	