<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Equalopportunitypolicy extends CI_Controller
{ 
    function __construct()
     {
	      parent::__construct();
	      $this->load->database();
		  $this->load->model('generalmodel');
   }
	public function index()
	{
		
		$data['equal'] = $this->generalmodel->show_data_id("sm_cms",4,"id","get","");
		
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
	 
        $data['title'] = "Equal Opportunity Policy";
	    $this->load->view('header',$data);
		$this->load->view('equalopportunitypolicy');
		$this->load->view('footer');
	}
}

?>
	