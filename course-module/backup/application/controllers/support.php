<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//include_once (dirname(__FILE__) . "/my_controller.php");
class About extends CI_Controller{ 
    function __construct() {
	      parent::__construct();
	      $this->load->database();
		  $this->load->model('generalmodel');
   }
	public function index(){
		
		$action='get';
		$tablename='sm_cms';
		$fieldname = 'id';
		$id = '1';
		$data='';
		$query = $this->generalmodel->show_data_id($tablename,$id,$fieldname,$action,$data);
		$data['abt'] = $query;
	    
		$action1='get';
		$data1='';
		$tablename1='sm_partners';
		$fieldname1 = '';				
		$id1 = '';
		$query1 = $this->generalmodel->show_data_id($tablename1,$id1,$fieldname1,$action1,$data1);
		$data['partner'] = $query1;
	 
	 //================= settings===============
		$action3='get';
		$data3='';
		$tablename3='sm_settings';
		$fieldname3 = 'id';				
		$id3 = '1';
		$query = $this->generalmodel->show_data_id($tablename3,$id3,$fieldname3,$action3,$data3);
		//echo $this->db->last_query(); exit();
		$data['settings'] = $query;
	 
	 
        $data['title'] = "About Us";
	    $this->load->view('headerinner',$data);
		$this->load->view('student_support');
		$this->load->view('footer');
	}
}

?>
	