<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Complaintpolicy extends CI_Controller
{ 
    function __construct()
    {
	      parent::__construct();
	      $this->load->database();
		  $this->load->model('generalmodel');
   }
	public function index()
	{
		
		$data['complaintpolicy'] = $this->generalmodel->show_data_id("sm_cms",7,"id","get","");
		 		
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
	 
        $data['title'] = "Complaint Policy";
	    $this->load->view('header',$data);
		$this->load->view('complaintpolicy');
		$this->load->view('footer');
	}
	
}

?>
	