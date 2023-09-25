<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//include_once (dirname(__FILE__) . "/my_controller.php");
class About extends CI_Controller{ 
    function __construct() {
	      parent::__construct();
	      $this->load->database();
		  $this->load->model('generalmodel');
   }
	public function index(){
		
		$data['abt'] = $this->generalmodel->show_data_id("sm_cms",1,"id","get","");
		$data['team'] = $this->generalmodel->show_data_id("sm_team","","","get","");
		//print_r($data['team']);die;
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
		$data['title'] = "About Us";
	    $this->load->view('header',$data);
		$this->load->view('about');
		$this->load->view('footer');
	}
	public function business()
	{
		$data['abt'] = $this->generalmodel->show_data_id("sm_cms",1,"id","get","");
		$data['partner'] = $this->generalmodel->show_data_id("sm_partners","","","get","");
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
		
		
		$data['features']=$this->generalmodel->fetch_all_join("Select * from sm_cms_corp_stu where for_type='corporate'");

		$data['title'] = "Corporate training";
		$this->load->view('header',$data);
		$this->load->view('business_support');
		$this->load->view('footer');
	}
	public function student()
	{
		$data['abt'] = $this->generalmodel->show_data_id("sm_cms",1,"id","get","");
		$data['partner'] = $this->generalmodel->show_data_id("sm_partners","","","get","");
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");		

		$data['features']=$this->generalmodel->fetch_all_join("Select * from sm_cms_corp_stu where for_type='student'");
		$data['title'] = "Student Support";
		$this->load->view('header',$data);
		$this->load->view('student_support');
		$this->load->view('footer');
	}
}

?>
	