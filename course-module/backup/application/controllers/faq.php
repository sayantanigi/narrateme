<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faq extends CI_Controller
{ 
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('generalmodel');
	}
	public function index()
	{
		
		$data['faq']  = $this->generalmodel->show_data_id("sm_faq","","","get","");
		
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
		
		$data['title'] = "FAQ";
		$this->load->view('header',$data);
		$this->load->view('faq');
		$this->load->view('footer');
	}
}

?>
