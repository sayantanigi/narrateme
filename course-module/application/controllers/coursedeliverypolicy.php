<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class coursedeliverypolicy			 extends CI_Controller
{ 
    function __construct() 
    {
	      parent::__construct();
	      $this->load->database();
		  $this->load->model('generalmodel');
   }
	public function index()
	{
		
		$data['coursedeliverypolicy'] = $this->generalmodel->show_data_id("sm_cms",5,"id","get","");		
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
        $data['title'] = "Course Delivery Policy";
	    $this->load->view('header',$data);
		$this->load->view('coursedeliverypolicy');
		$this->load->view('footer');
	}
}
?>		