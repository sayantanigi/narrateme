<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paymentpolicy extends CI_Controller
{ 
    function __construct()
    {
	      parent::__construct();
	      $this->load->database();
		  $this->load->model('generalmodel');
   }
	public function index()
	{
		
		$data['paymentpolicy'] = $this->generalmodel->show_data_id("sm_cms",8,"id","get","");
		 		
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
	 
        $data['title'] = "Payment Policy";
	    $this->load->view('header',$data);
		$this->load->view('paymentpolicy');
		$this->load->view('footer');
	}
	
}

?>
	