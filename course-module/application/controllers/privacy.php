<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//include_once (dirname(__FILE__) . "/my_controller.php");
class Privacy extends CI_Controller{ 
    function __construct() {
	      parent::__construct();
	      $this->load->database();
		  $this->load->model('generalmodel');
   }
	public function index(){
		
		
		$data['privacy'] = $this->generalmodel->show_data_id("sm_cms",3,"id","get","");
		 		
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
		
	 
        $data['title'] = "Privacy Policy";
	    $this->load->view('header',$data);
		$this->load->view('privacy');
		$this->load->view('footer');
	}
}

?>
	