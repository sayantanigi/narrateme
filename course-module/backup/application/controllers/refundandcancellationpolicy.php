<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Refundandcancellationpolicy extends CI_Controller
{ 
	function __construct() 
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('generalmodel');
	}

	public function index()
	{
		
		$data['cms'] = $this->generalmodel->show_data_id("sm_cms",6,"id","get","");

		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");

		$data['title'] = "Refund and Cancellation Policy";
		$this->load->view('header',$data);
		$this->load->view('refundandcancellation');
		$this->load->view('footer');
	}
}
?>