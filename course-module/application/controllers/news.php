<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller{ 
    function __construct() {
	      parent::__construct();
	      $this->load->database();
		  $this->load->model('generalmodel');
   }
	
	public function newslist()
	{
		$data['news']  = $this->generalmodel->show_data_id("news","","","get","");
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
        $data['title'] = "News";
	    $this->load->view('header',$data);
		$this->load->view('news');
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
	