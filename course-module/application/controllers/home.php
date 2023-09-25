<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{

  
    function __construct() {

	      parent::__construct();

	      $this->load->database();

		  $this->load->model('generalmodel');
		  $this->load->model('admin_model');
   }
	public function index(){
		
		$data['banners'] = $this->generalmodel->show_data_id("sm_banner",1,"status","get","");
		$data["mode"] = $this->generalmodel->show_data_id("sm_mode",1,"mode_status","get","");
		$data['admin'] = $this->generalmodel->show_data_id("sm_admin_mail",1,"MailId","get","");
		$data['news']  = $this->generalmodel->show_data_id("sm_news","","","get","");
		$data['testimonial']  = $this->generalmodel->show_data_id("sm_testimonial","","","get","");
			$table_name = 'sm_course';
	$primary_key = 'course_type';
	$wheredata = 'Upcoming Courses';
	$queryallcat = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
	$data['eloca'] = $queryallcat;
	//print_r($data['eloca']);die;
	    $data['content'] = $this->generalmodel->show_data_id("sm_page_content",1,"id","get","");
	    $data['contents'] = $this->generalmodel->show_data_id("sm_page_content",2,"id","get","");
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
        $data['title'] = "Home";
	    $this->load->view('header',$data);
		$this->load->view('home');
		$this->load->view('footer');
	}
	function send_enquery()
	{

			    $date1 = date('Y-m-d h:i:s');   
			
			    $from_email = $this->input->post('sm_admin_mail');
				$to_email = $this->input->post('email');
				
				$data1 = array(
					'ContactName' => $this->input->post('ContactName'),
					'Email' => $this->input->post('Email'),
					'Phone' => $this->input->post('Phone'),
					'Message' => $this->input->post('Message'),
					'ContactDate' =>$date1
				);
				$tablename='sm_course_query';
				$action='insert';
				$id='';
				$fieldname='';		
				$query = $this->generalmodel->show_data_id($tablename,$id,$fieldname,$action,$data1);
				/*echo "<pre/>";
				print_r($data1); exit();*/
				$msg = $this->load->view('enquerytemplate',$data1,TRUE);
				$config['mailtype'] = 'html';
				$this->load->library('email');
				$this->email->initialize($config);
				$msg = $msg;
				$subject = 'Enquery Message From OES Academy';   
				$this->email->from($this->input->post('admin_mail'), 'OES Academy Administrator'); 
				$this->email->to($to_email);
				$this->email->bcc($from_email);
				$this->email->subject($subject); 
				$this->email->message($msg);
				if($this->email->send()){
					$this->session->set_flashdata('success', 'Request Sent successfully!!!!');
					redirect('home#val');
				}else{  
					$this->session->set_flashdata('error', 'Email can not be sent!!!!');
					redirect('home#val');
				}
	 
	 }
	 public function search()
	{
	 
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
	 	$keyword=$this->input->post("key");
	 	
	 	$sql="SELECT * FROM sm_course
	 	left JOIN distance_learning ON sm_course.course_id = sm_distance_learning.course_id
	 	left JOIN sm_category ON sm_course.course_category = sm_category.category_id
	 	where CONCAT_WS(sm_course.course_name, sm_course.course_description, sm_distance_learning.package_name) LIKE  '%$keyword%'";
	 	$data['result']=$this->admin_model->fetch_all_join($sql);
	 	
	 	$data['title'] = "Search Result";
	    $this->load->view('header',$data);
		$this->load->view('search');
		$this->load->view('footer');

	 }	
}

?>
	