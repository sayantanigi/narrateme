<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);

class Courses extends CI_Controller{ 
    function __construct() {
	      parent::__construct();
	      $this->load->database();
		   $this->load->model('general_model');
    	   $this->load->model('generalmodel'); // Debjit 11.03.2017
		  $this->load->helper('string');
   }
	public function index(){
	  
	    $data['content'] = $this->generalmodel->show_data_id("sm_page_content",3,"id","get","");
        $data['categories'] = $this->generalmodel->getCategories();
        $data['levels'] = $this->generalmodel->getlevel();
        $tablename='sm_category';
		$primary_key = 'parent_id';
		$wheredata = '0';
		$query = $this->generalmodel->getAllDataOrder($tablename,$primary_key,$wheredata,'sort_order','','');
		$data['coursepcategory'] = $query;
		$segment1=$this->uri->segment(3);
		$segment2=$this->uri->segment(4);
		$segment3=$this->uri->segment(5);
		if($segment1=='')
		{
			$primary_key = 'parent_id';;
			$wheredata = @$query[0]->category_id;
			$querysub = $this->generalmodel->getAllDataOrder($tablename,$primary_key,$wheredata,'sort_order','','');
			$data['coursescategory'] = $querysub;
			$tablename='sm_course';
			$primary_key = 'course_category';
			$wheredata = @$querysub[0]->category_id;
			$querycourse = $this->generalmodel->getAllDataOrder($tablename,$primary_key,$wheredata,'sort_order','','');
			$data['courseslist'] = $querycourse;
		}
		$table_name = 'sm_course';
    	$primary_key = 'course_type';
    	$wheredata='Upcoming Courses';
    	$queryallcat = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
    	$data['eloca'] = $queryallcat;
    	
    	$wheredata1='Coming Soon courses';
    	$queryallcom = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata1,'','');
    	$data['coming'] = $queryallcom;
    	//print_r($data['coming']);die;

	   	
	   	//print_r($data['eloca'] );die;
        $data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
		$data['title'] = "Courses";
	
		$this->load->view('header', $data);
		$this->load->view('category', $data);
		$this->load->view('footer');
		
	}
	
	public function coursedescription()
	{
		$wheredata = $this->uri->segment(3);
		$querycrs = $this->generalmodel->getAllData('sm_course','course_id',$wheredata = $this->uri->segment(3),'','','');
		
		$data['querycrs']=$querycrs;
		
		$wheredata = $this->uri->segment(3);
		$querydesc = $this->generalmodel->getAllDataOrder('sm_syllabus','course_id',$wheredata,'s_order','','','');
		$data['querydesc']=$querydesc;
 
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");

		$data['title']='Course Details';
		$this->load->view('header',$data);
		$this->load->view('coursedetails');
		$this->load->view('footer');
	}
	
	public function modeincourse()
	{
		$data['title']='Course Modes';
		$table_name='sm_course';
		$primary_key = 'course_id';
		$courseId = $this->uri->segment(4);
		$batchId = $this->uri->segment(5);
		$data['batchlist'] = $batchlist = $this->db->get_where('sm_batch',array('courseId'=>$courseId,'batchId'=>$batchId))->row();
		$data['batchSession'] = $session = $this->db->get_where('sm_batch_sessions',array('batch_id'=>$batchId))->result();
		// echo $this->db->last_query();
		//print_r($session);die;
		$data['price'] = $batchlist->price;
		$wheredata = $this->uri->segment(3);

		$querycourse = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','','');
		$data['course'] = $this->db->get_where('sm_course',array('course_id'=>$courseId))->row();
		$data['coursename'] = $querycourse[0]->course_name;
		// $data['price'] = $querycourse[0]->price;
		$data['cource_hours'] = @$querycourse[0]->cource_hours;
		
			//echo $this->db->last_query();
		@$type = @$this->input->post('type');
		@$course_id = @$this->input->post('course_id');
		@$location = @$this->input->post('location');
		@$start_date = @$this->input->post('start_date'); 
		@$end_date = @$this->input->post('end_date'); 
		$this->session->set_userdata('location',$location); 
		if(@$type!='' and $course_id!='' ){
			
			$table_name='sm_course_location';
			$primary_key1 = 'course_type';
			$wheredata1 = $type;
			$primary_key2='course_id';
			$wheredata2=$course_id;
			$querysub = $this->generalmodel->Get_multiple_where_data($table_name,$primary_key1,$primary_key2,$wheredata1,$wheredata2,'','','');			
			$data['location'] = $querysub;
			$data['course_hour']=$querysub[0]->cource_hours;
			$data['type'] = $type;					
			$table_name='sm_course_lesion';
			$primary_key1 = 'type_id';
			$wheredata1 = $type;
			$primary_key2='course_id';
			$wheredata2=$course_id;
			$querylesson = $this->generalmodel->Get_multiple_where_data($table_name,$primary_key1,$primary_key2,$wheredata1,$wheredata2,'','','');			
			$data['lesson'] = $querylesson;
			
			
		}		
		
		if(@$type!='' and @$course_id!='' and @$location!='' ){
			$table_name='sm_course_start_date';
			$primary_key = 'loc_id';
			$wheredata = $location;
			$queryloctime = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','','');
		//echo $this->db->last_query();
		
			$data['loc']= $location;
			$data['start'] = $queryloctime;
			
		}
		
		if(@$type!='' and @$course_id!='' and @$location!='' and @$start_date!='' ){
			//echo "aa"; exit();
			$table_name='sm_course_end_date';
			$primary_key = 'start_id';
			$wheredata = $start_date;
			$queryloctime = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','','');
			//echo $this->db->last_query();
			
			$data['loc']= $location;
			$data['start_date']= $start_date;
                        $data['end_date']= $end_date;
			$data['end'] = $queryloctime;
			
		}
		

		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
		
		$this->load->view('header',$data);
		$this->load->view('modeincourse');
		$this->load->view('footer');
	}
	
	public function distancecourse(){
		$data['title']='Distance Booking';
		$table_name='sm_distance_learning';
		$primary_key = 'course_id';
		$wheredata = $this->uri->segment(3);
		$queryloctime = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','','');
		$data['dlearning']= $queryloctime;
		//===================Get Course Details==================
		if(!empty($queryloctime)){
		$table_name='sm_course';
		$primary_key = 'course_id';
		$wheredata = $queryloctime[0]->course_id;
		$querycourse = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','','');
		$data['coursename'] = $querycourse[0]->course_name;
		$data['price'] = $querycourse[0]->price;
		}
		 //================= settings===============
	$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
		//===================Get Course Details==================
		$this->load->view('header',$data);
		$this->load->view('distancebooking');
		$this->load->view('footer');
	}
	
	public function privatecourse(){
		$data['title']='Private Booking';
		$table_name='sm_private_learning';
		$primary_key = 'course_id';
		$courseId = $this->uri->segment(4);
		$batchId = $this->uri->segment(5);
		$data['batchlist'] = $batchlist = $this->db->get_where('sm_batch',array('courseId'=>$courseId,'batchId'=>$batchId))->row();
		$data['batchSession'] = $session = $this->db->get_where('sm_batch_sessions',array('batch_id'=>$batchId))->result();
		$data['course'] = $this->db->get_where('sm_course',array('course_id'=>$courseId))->row();
		// echo $this->db->last_query();
		//print_r($session);die;
		$data['price'] = $batchlist->price;
		$wheredata = $this->uri->segment(3);
		$queryloctime = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','','');
		//echo $this->db->last_query();exit();
		$data['plearning']= $queryloctime;

		//===================Get Course Details==================
		if(!empty($queryloctime)){
		$table_name='sm_course';
		$primary_key = 'course_id';
		$wheredata = $queryloctime[0]->course_id;
		$querycourse = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','','');
		$data['coursename'] = $querycourse[0]->course_name;
		$data['price'] = $querycourse[0]->price;
		}
		//===================Get Course Details==================
		 //================= settings===============
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
		$this->load->view('header',$data);
		$this->load->view('privatebooking');
		$this->load->view('footer');
	}
	
	public function flexiblecourse(){
		$table_name='sm_course';
		$primary_key = 'course_id';
		$courseId = $this->uri->segment(4);
		$batchId = $this->uri->segment(5);
		$wheredata = $this->uri->segment(3);
		$querycourse = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','','');

		$data['coursename'] = $querycourse[0]->course_name;
		$data['price'] = $querycourse[0]->price;
		$data['cource_hours'] = @$querycourse[0]->cource_hours;

		$data['title']='Flexible Booking';
		$data['course'] = $this->db->get_where('sm_course',array('course_id'=>$courseId))->row();

		$data['batchlist'] = $batchlist = $this->db->get_where('sm_batch',array('courseId'=>$courseId,'batchId'=>$batchId))->row();
		$data['batchSession'] = $session = $this->db->get_where('sm_batch_sessions',array('batch_id'=>$batchId))->result();
		//===================Get Course Details==================

			$table_name='sm_course_lesion';
			$primary_key1 = 'type_id';
			$wheredata1 = 'ev';
			$primary_key2='course_id';
			$wheredata2=$this->uri->segment(3);
			$querylesson = $this->generalmodel->Get_multiple_where_data($table_name,'',$primary_key2,'',$wheredata2,'','','');

			//echo $this->db->last_query(); exit;
			$data['lesson'] = $querylesson;
			 //================= settings===============
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
		$this->load->view('header',$data);
		$this->load->view('flexiblebooking');
		$this->load->view('footer');
	}
	public function review(){
		$data['title']="Course Review";
		$table_name='sm_course';
		$primary_key = 'course_id';
		$wheredata = $this->uri->segment(3);
		$querycourse = $this->generalmodel->getAllData('sm_course_feedback',$primary_key,$wheredata,'','','');
		$data['querycourse']=$querycourse;
		

		 //================= settings===============
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
		
		$this->load->view('headerinner',$data);
		$this->load->view('reviewlist');
		$this->load->view('footer');
	}
	
	public function payment(){
		// $this->session->userdata('is_userlogged_in');
		
		$id=$this->session->userdata('is_userlogged_in');
		$usertype= $this->generalmodel->fetch_single_join("SELECT user_type from  sm_member where email='$id'");
		$type=$usertype->user_type;

		//	echo $type;  exit();

		if(!$this->session->userdata('is_user_id')){
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Please Login for  book a course! </div>');
			redirect('auth/login','refresh');
		 }
		 if(($type=='inst') || ($type=='busi')){
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Please Login  through student Account! </div>');
			//redirect($_SERVER['HTTP_REFERER'],'');
			redirect('auth/login','refresh');
		 }
		 else {



		$transaction_id = 'OESPAY'.random_string('alnum', 12).date('d-m-Y');
		$member_id = $this->session->userdata('is_userlogged_in');
		//===========Insert in to booking table=================
		$data=array(
					'course_id'=>$this->input->post('course_id'),
					'course_name'=>$this->input->post('course_name'),
					'course_type'=>$this->input->post('type'),
					'book_date'=>date('Y-m-d H:i:s'),
					'mode'=>$this->input->post('mode'),
					'price'=>$this->input->post('price'),
					'student_id'=>$member_id,
					'transaction_id'=>$transaction_id,
					'pay_status'=>'unpaid',
					'status'=>'0'
				);
		//print_r($data);
				
		$details = $this->generalmodel->show_data_id('sm_course_booking','','','insert',$data);
			
		//==============Insert in to payment table==================
		$datapay=array(
					'transaction_id'=>$transaction_id,
					'transaction_date'=>date('Y-m-d H:i:s'),
					'pay_status'=>'unpaid',
					'member_id'=>$member_id,
					'status'=>'0'
				);
		$details = $this->generalmodel->show_data_id('payment','','','insert',$datapay);
		//=============Insert in to payment table========
		//$member_id
		
		$data['title']='Payment';
		$this->load->view('header',$data);
		$this->load->view('payment');
		$this->load->view('footer');
		}
	}
	
	public function Events(){
		$data['title']="Events";
		$table_name='sm_course';
		$primary_key = 'course_id';
		$wheredata = $this->uri->segment(3);
		$querycourse = $this->generalmodel->getAllData('sm_course_feedback',$primary_key,$wheredata,'','','');
		$data['querycourse']=$querycourse;
		

		 //================= settings===============
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
		
		$this->load->view('header',$data);
		$this->load->view('events');
		$this->load->view('footer');
	}
	public function eventregister(){
		$data['title']="Event Rregister";
		$table_name='sm_course';
		$primary_key = 'course_id';
		$wheredata = $this->uri->segment(3);
		$querycourse = $this->generalmodel->getAllData('sm_course_feedback',$primary_key,$wheredata,'','','');
		$data['querycourse']=$querycourse;
		

		 //================= settings===============
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
		
		$this->load->view('header',$data);
		$this->load->view('event-register');
		$this->load->view('footer');
	}

	public function eventdetails(){
		$data['title']="Event Details";
		$table_name='sm_course';
		$primary_key = 'course_id';
		$wheredata = $this->uri->segment(3);
		$querycourse = $this->generalmodel->getAllData('sm_course_feedback',$primary_key,$wheredata,'','','');
		$data['querycourse']=$querycourse;
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
		
		$this->load->view('header',$data);
		$this->load->view('event-details');
		$this->load->view('footer');
	}

	public function corporatetraining(){
		$data['title']="Corporate Training";
		$table_name='sm_course';
		$primary_key = 'course_id';
		$wheredata = $this->uri->segment(3);
		$querycourse = $this->generalmodel->getAllData('sm_course_feedback',$primary_key,$wheredata,'','','');
		$data['querycourse']=$querycourse;
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
		
		$this->load->view('header',$data);
		$this->load->view('corporatetraining');
		$this->load->view('footer');
	}
	
		public function privatetutor(){
		$data['title']="Private Tutor";
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
		 $data['content'] = $this->generalmodel->show_data_id("sm_page_content",4,"id","get","");
		
		$this->load->view('header',$data);
		$this->load->view('private_tutor');
		$this->load->view('footer');
	}
	
	
		public function upcomingcoursedetails()
	{
        $table_name='sm_course';
        $primary_key = 'course_id';
		$courseId = $this->uri->segment(3);
		$data['batchlist'] = $batchlist = $this->db->get_where('sm_batch',array('courseId'=>$courseId))->row();
		$batchId = $batchlist->batchId;
		$data['batchSession'] = $session = $this->db->get_where('sm_course_sessions',array('batch_id'=>$batchId))->result();
		$data['course'] = $this->db->get_where('sm_course',array('course_id'=>$courseId))->row();
		$data['price'] = $batchlist->price;
		$wheredata = $this->uri->segment(3);
		$querydesc = $this->generalmodel->getAllDataOrder('sm_syllabus','course_id',$wheredata,'s_order','','','');
		$data['querydesc']=$querydesc;
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
		$data['title']='Course Details';
		$this->load->view('header',$data);
		$this->load->view('upcoming-courses-detail');
		$this->load->view('footer');
	}
	
	public function comingsooncoursedetails()
	{
		$table_name='sm_course';
        $primary_key = 'course_id';
		$courseId = $this->uri->segment(3);
        $data['course'] = $this->db->get_where('sm_course',array('course_id'=>$courseId))->row();
        $wheredata = $this->uri->segment(3);
		$querysyll = $this->generalmodel->getAllDataOrder('sm_syllabus','course_id',$wheredata,'s_order','','','');
		$data['querysyll']=$querysyll;
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
		$data['title']='Course Details';
		$this->load->view('header',$data);
		$this->load->view('coming-soon-courses-detail');
		$this->load->view('footer');
	}
	
	function getCity(){
	    $id = $this->input->post('id');
	    $res = $this->db->order_by('sort_order','ASC')->get_where('sm_city',array('country_id'=>$id))->result();
	    $ht ='';
	    if(is_array($res) && count($res)>0){
	        foreach($res as $r){
	          $ht .= '<option value="'.$r->id.'">'.$r->city_name.'</option>'; 
	        }
	    }else{
	        $ht = '<option value="">No City Found</option>'; 
	    }
	    echo $ht;
	}
		function getLocation(){
	    $id = $this->input->post('id');
	    $res = $this->db->order_by('sort_order','ASC')->get_where('sm_location',array('location_city_id'=>$id))->result();
	    print_r($res);die;
	    $ht ='';
	    if(is_array($res) && count($res)>0){
	        foreach($res as $r){
	          $ht .= '<option value="'.$r->id.'">'.$r->location_name.'</option>'; 
	        }
	    }else{
	        $ht = '<option value="">No Location Found</option>'; 
	    }
	    echo $ht;
	}
	
	function getCouse(){
	    $id = $this->input->post('id');
	    $res = $this->db->query("SELECT course_id,course_name FROM sm_course WHERE course_category = ".$id)->result();
	    $ht ='';
	    if(is_array($res) && count($res)>0){
	        foreach($res as $r){
	          $ht .= '<option value="'.$r->course_id.'">'.$r->course_name.'</option>'; 
	        }
	    }else{
	        $ht = '<option value="">No Course Found</option>'; 
	    }
	    echo $ht;
	}
	
}

?>
	