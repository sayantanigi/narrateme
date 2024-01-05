<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); 

class Member extends CI_Controller
 {
 function __construct(){
   parent::__construct();
   $this->load->model('general_model');
    $this->load->model('generalmodel'); 
	$this->load->model('supercontrol/instructor_model');
  	
   $this->load->library("pagination");
   $this->load->library(array('session', 'form_validation', 'email'));
   if(!$this->session->userdata('is_user_id')){
		redirect('auth/login','refresh');
		
     }
 }
 function index(){
 	
		
 	}
	public function update_currect_password(){
		
		//==============Get Parent Category Banner===============
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
		$data['myprofile']=$details;
		//-----------Profile----

		$id=$this->session->userdata('is_userlogged_in'); 
		$this->form_validation->set_rules('current_password', 'Password', 'required');
		$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|matches[confirm_password]|md5');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error', 'All Credentials are Required!!!!');
			//==============Get Parent Category Banner===============
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		//echo $this->db->last_query();
		//exit();
		$data['myprofile']=$details;
		//print_r($data['myprofile']);
		//exit();
		 //===================Active Adds========================
		$data['title']='Students Profile';
		$this->load->view('student/header',$data);
        $this->load->view('student/profile', $data);
		}else{
				$query = $this->generalmodel->checkOldPass(md5($this->input->post('current_password')),$id);
				$data['confirm_password'] = $query;
				//echo $this->db->last_query(); exit();
				$count = count($query);
				if($count=='1'){
					$query = $this->generalmodel->saveNewPass($this->input->post('new_password'),$id);
					//echo $this->db->last_query();
					//exit();
					$this->session->set_flashdata('success','<div class="alert alert-success text-center">password Changed Successfully!!!!</div>');
					redirect('member/profile','refresh');
				}else{
					$this->session->set_flashdata('success','<div class="alert alert-danger text-center">Password can not be changed. Provide correct Credentials!!!!</div>');
					redirect('member/profile','refresh');
				}
			}
	
	}
	
	function profile(){
		
		//==============Get Parent Category Banner===============
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
		$data['myprofile']=$details;
		//echo $this->session->userdata('user_type');
		if($this->session->userdata('user_type')=='std'){
		 //===================Active Adds========================
			$data['title']='Students Profile';
			$this->load->view('header',$data);
			$this->load->view('student/profile', $data);
			$this->load->view('footer');
		//=======================================================
		}else if($this->session->userdata('user_type')=='inst'){
			$data['title']='Instructor Profile';
			$this->load->view('instructor/header',$data);
			$this->load->view('instructor/profile', $data);
		}else if($this->session->userdata('user_type')=='busi'){
			$data['title']='Business Profile';
			$this->load->view('business/header',$data);
			$this->load->view('business/profile', $data);
		}
		
	}
	function add_member(){
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
		$data['myprofile']=$details;
		$data['title']='Member Add';
		$this->load->view('business/header',$data);
		$this->load->view('business/addmember', $data);
	}
	
	function add_my_member(){
		
        //set validation rules
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phoneno', 'Phone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[member.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password]|md5');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        //validate form input
        if ($this->form_validation->run() == FALSE){
			$data['title']='Member Add';
			$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
			$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
			$data['myprofile']=$details;
			$this->load->view('business/header',$data);
			$this->load->view('business/addmember', $data);
		}else{
            $datalist = array(
							'first_name' => $this->input->post('first_name'),
							'last_name' => $this->input->post('last_name'),
							'email' => $this->input->post('email'),
							'phoneno' => $this->input->post('phoneno'),
							'password' => $this->input->post('password'),
							'business_id' => $this->session->userdata('is_user_id'),
							'user_type' => 'std',
							'gender' => $this->input->post('gender'),
							'add_date' => date('Y-m-d H:i:s'),
							'status' => '1'
						);
		    //print_r($datalist);
			//exit();				
			$table_name='sm_member';
            $this->general_model->insertData($table_name,$datalist);
					//===========================------------------=========================
					$lastid = $this->db->insert_id();
					$from_email = "info@oesacademy.com"; 
					$to_email = $this->input->post('email'); 
					$url = base_url()."auth/verification/".$lastid;
					//***********************================******************
					$data1 = array(
								'membername' =>$this->input->post('first_name')." ".$this->input->post('last_name'),
								'email' => $this->input->post('email'),
								'password' => $this->input->post('password'),
								'url' => $url
				   			);
					//***********************================******************
					$msg = $this->load->view('usersignuptemplate',$data1,TRUE);
					$config['mailtype'] = 'html';
					$this->load->library('email');
					$this->email->initialize($config);
					$msg = $msg;
					$subject = 'Registration Success Message From OES Academy.';   
					$this->email->from($from_email, 'OES ADMINISTRATOR'); 
					$this->email->to($to_email);
					$this->email->subject($subject); 
					$this->email->message($msg);
					//exit();
					if($this->email->send()){
					//===========================------------------=========================
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! Please confirm the mail sent to your Email-ID!!!</div>');
                    redirect('member/business_member');
					}else{
                    $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                   redirect('member/business_member');
					}
				}
	
	}
	
	function chat_student(){
		$uid = $this->session->userdata('is_userlogged_in');
		//==============Get Parent Category Banner===============
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
		$data['myprofile']=$details;
		
		$querygetmemberid = $this->general_model->get_member_id($uid);
		$data['member']=$querygetmemberid;
		
		$queryuserchat = $this->general_model->chat_user($querygetmemberid[0]->member_id);
		$data['userchat']=$queryuserchat;
		//echo $this->db->last_query(); exit();
		
		
		$queryadminchat = $this->general_model->chat_admin($querygetmemberid[0]->member_id);
		$data['adminchat']=$queryadminchat;
		
		$querychatall = $this->general_model->chat_all($querygetmemberid[0]->member_id);
		$data['allchat']=$querychatall;
		
		$data['title']='Student Profile';
		$this->load->view('student/header',$data);
		$this->load->view('student/chat_students', $data);
		$this->load->view('footer');
		
		
	}
	
	
		public function chat_data(){
			$uid = $this->session->userdata('is_userlogged_in');
			//==============Get Parent Category Banner===============
			$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
			$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
			$data['myprofile']=$details;
		
			$querygetmemberid = $this->general_model->get_member_id($uid);
			$data['member']=$querygetmemberid;
			
			$id = $querygetmemberid[0]->member_id;
			
			$record['user_id'] = $id;
			$record['admin_id'] = '0';
			$record['message'] = $this->input->post('message');
			$record['send_date'] = date('Y-m-d h:i:s');
			$this->general_model->do_action('sm_hat','','','insert',$record,'');
			
			
			$queryadminchat = $this->general_model->chat_admin($querygetmemberid[0]->member_id);
			$data['adminchat']=$queryadminchat;
			
			$querychatall = $this->general_model->chat_all($querygetmemberid[0]->member_id);
			$data['allchat']=$querychatall;
			
			$this->load->view('student/chat_new',$data);
        }
		
		public function chat_data_refresh(){
			$uid = $this->session->userdata('is_userlogged_in');
			//==============Get Parent Category Banner===============
			$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
			$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
			$data['myprofile']=$details;
			$querygetmemberid = $this->general_model->get_member_id($uid);
			$data['member']=$querygetmemberid;
			$id = $querygetmemberid[0]->member_id;
			$queryadminchat = $this->general_model->chat_admin($querygetmemberid[0]->member_id);
			$data['adminchat']=$queryadminchat;
			$querychatall = $this->general_model->chat_all($querygetmemberid[0]->member_id);
			$data['allchat']=$querychatall;
			$this->load->view('student/chat_new',$data);
        }
		
		
	function chat_inst(){
		$uid = $this->session->userdata('is_userlogged_in');
		//==============Get Parent Category Banner===============
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
		$data['myprofile']=$details;
		
		$querygetmemberid = $this->general_model->get_member_id($uid);
		$data['member']=$querygetmemberid;
		
		$queryuserchat = $this->general_model->chat_user($querygetmemberid[0]->member_id);
		$data['userchat']=$queryuserchat;
		//echo $this->db->last_query(); exit();
		
		$queryadminchat = $this->general_model->chat_admin($querygetmemberid[0]->member_id);
		$data['adminchat']=$queryadminchat;
		
		$querychatall = $this->general_model->chat_all($querygetmemberid[0]->member_id);
		$data['allchat']=$querychatall;
		
		$data['title']='Instructor Profile';
		$this->load->view('instructor/header',$data);
		$this->load->view('instructor/chat', $data);
		
		
	}
	
	function allcourses_business(){
		//==============Get Parent Category Banner===============
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
		$bus_id=$this->session->userdata('is_userlogged_in');
		$data['paststudents']=$paststudents=$this->generalmodel->fetch_all_join("Select * from sm_course_booking where business_id='$bus_id' AND pay_status='paid'");
		$data['currentstudents']=$currentstudents=$this->generalmodel->fetch_all_join("Select * from sm_course_booking where business_id='$bus_id'");
		$data['offer']=$this->generalmodel->fetch_all_join("Select * from sm_discount where status='Y'");
		$data['myprofile']=$details;
		$data['title']='Business Profile';
		$this->load->view('business/header',$data);
		$this->load->view('business/allcourses', $data);
	}
	
	function business_member(){
		//==============Get Parent Category Banner===============
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
		$data['myprofile']=$details;
		
		//==============Get Current students=================
		if(@$this->input->post('student_name')==''){
			$currentstudents = $this->general_model->show_data_id('sm_member',$this->session->userdata('is_user_id'),'business_id','get','','');
		}else{
			$business_id=$this->session->userdata('is_user_id');
			$studentname=$this->input->post('student_name');
			$currentstudents = $this->general_model->get_search_member($business_id,$studentname);
		}
		$data['currentstudents']=$currentstudents;
		//==============Get Current students=================
			$data['title']='Business Profile';
			$this->load->view('business/header',$data);
			$this->load->view('business/member_list', $data);
	}
	public function assignmembercourse()
	{
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
		$data['myprofile']=$details;
		$business_id=$this->session->userdata('is_user_id');
		$studentname=$this->input->post('student_name');
		$currentstudents=$this->general_model->get_search_member($business_id,$studentname);
		$data['course']=$this->generalmodel->fetch_all('sm_course');
		$data['currentstudents']=$currentstudents;
		$data['title']='Business Profile';
		$this->load->view('business/header',$data);
		$this->load->view('business/assigncourse', $data);
	}
	public function getpricecourse()
	{
		$course_id=$this->input->post('country_id');
		echo $course_id;
		$price=$this->generalmodel->fetch_single_join("select price from sm_course where course_id=$course_id");
		//echo $this->db->last_query();
		echo $price; //exit();
	//echo $this->db->last_query();
	// print_r($pcourse->price);
	//$price=$data['pcourse']['price'];
	 
	}
	public function memberpayment()
	{
		if($this->input->post('memberid')!="")
		{

		$transaction_id = 'OESPAY'.random_string('alnum', 12).date('d-m-Y');
		$member_id = $this->input->post('memberid');
		$cid=$this->input->post('courseid');
		//print_r($member_id); 
		//$text = implode(",", $member_id);
    	//echo $text;
    	$data['course']=$course=$this->generalmodel->fetch_single_join("Select * from sm_course where course_id=$cid");
    	//echo $this->db->last_query(); exit();
    	$total=count($member_id);
    	for ($i=0; $i <$total ; $i++) { 
    		$text = implode(",", $member_id);
    		$data=array(
					'course_id'=>$cid,
					'course_name'=>$course->course_name,
					'book_date'=>date('Y-m-d H:i:s'),
					'mode'=>$this->input->post('mode'),
					'course_type'=>$this->input->post('course_type'),
					'price'=>$course->price,
					'student_id'=>$member_id[$i],
					'business_id'=>$this->session->userdata('is_userlogged_in'),
					'transaction_id'=>$transaction_id,
					'pay_status'=>'unpaid',
					'status'=>'0'
				);
    		$details = $this->generalmodel->show_data_id('sm_course_booking','','','insert',$data);
    	}
		
		for ($j=0; $j <$total ; $j++) {
		$datapay=array(
					'transaction_id'=>$transaction_id,
					'transaction_date'=>date('Y-m-d H:i:s'),
					'pay_status'=>'paid',
					'member_id'=>$member_id[$j],
					'status'=>'0'
				);
		$details = $this->generalmodel->show_data_id('sm_payment','','','insert',$datapay);
	}
		//===========================Insert in to payment table=============================//$member_id
		
		$data['title']='Payment';
		$this->load->view('headerinner',$data);
		$this->load->view('payment');
		$this->load->view('footer');
	}
	else
	{
		redirect(base_url() . 'member/assignmembercourse');
	}
	}
	public function deletebusstdlist()
	{
		$id = $this->input->get('id', TRUE);
        $result = $this->generalmodel->delete_single_member('sm_member', $id);
        //echo $this->db->last_query();
      if($result==TRUE)
          {
             $this->session->set_flashdata('success_msg', 'Deleted Successfully');
              redirect(base_url() . 'member/business_member');
          }
          else{
              $this->session->set_flashdata('success_msg', 'Invalid Operation');
          }
    }
	
	function current_student_business(){
		//==============Get Parent Category Banner===============
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
		$data['myprofile']=$details;
		
		//==============Get Current students=================
		if(@$this->input->post('student_name')==''){
			$currentstudents = $this->general_model->show_data_id('sm_member',$this->session->userdata('is_user_id'),'business_id','get','','');
		}else{
			$business_id=$this->session->userdata('is_user_id');
			$studentname=$this->input->post('student_name');
			$currentstudents = $this->general_model->get_search_member($business_id,$studentname);
		}
		$data['currentstudents']=$currentstudents;
		//==============Get Current students=================
			$data['title']='Business Profile';
			$this->load->view('business/header', $data);
			$this->load->view('business/current_student', $data);
	}
	function past_student_business(){
		//==============Get Parent Category Banner===============
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
		$bus_id=$this->session->userdata('is_userlogged_in');
		$data['currentstudents']=$currentstudents=$this->generalmodel->fetch_all_join("Select * from sm_course_booking where business_id='$bus_id' AND pay_status='paid'");

			$data['myprofile']=$details;
			$data['title']='Business Profile';
			$this->load->view('business/header',$data);
			$this->load->view('business/past_student', $data);
	}
	
	function update_profile(){
		$userid = $this->session->userdata('is_userlogged_in');	
		$phoneno=$this->input->post('phoneno');
		if($phoneno!='')
		{
		$data = array(
					'phoneno'=>$this->input->post('phoneno')
					);
		

		$details = $this->generalmodel->show_data_id('sm_member',$userid,'email','update',$data);
		//echo $this->db->last_query();
		//exit();
		if($details){
			$this->session->set_flashdata('success','<div class="alert alert-success text-center">Profile  Updated Successfully !!!!</div>');
			redirect($_SERVER['HTTP_REFERER'],'');
		}else{
			$this->session->set_flashdata('success','<div class="alert alert-success text-center">Problen In Updating Profile !!!!</div>');
			redirect($_SERVER['HTTP_REFERER'],'');
		}
	}else{
		$this->session->set_flashdata('success','<div class="alert alert-success text-center">Please put your Number !!!!</div>');
			redirect($_SERVER['HTTP_REFERER'],'');
	}
		
	
	}
	
	public function profile_image(){
		
                $config['upload_path']          = 'uploads/profile/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
				
			$new_name = time().$_FILES["userfiles"]['name'];
				$config['file_name'] = $new_name;
				//print_r($config['file_name']);
				//exit();

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('userfiles')) {
					   $userid=$this->session->userdata('is_userlogged_in');
                       $datalist = array(			
							'profile_image' => $new_name,
						);
					  $query = $this->general_model->edit_profile($userid,$datalist);
					  $this->session->set_flashdata('success','<div class="alert alert-success text-center">Profile Image Updated Successfully !!!!</div>');
					  redirect('member/profile');
                }
        
	}
	
	//==================Change Password=========================
	public function change_password(){
		
		$id=$this->session->userdata('is_userlogged_in'); 
		$this->form_validation->set_rules('current_password', 'Password', 'required');
		$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|matches[confirm_password]|md5');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error', 'All Credentials are Required!!!!');
			redirect('member/change_password');
		}else{
				$query = $this->generalmodel->checkOldPass(md5($this->input->post('current_password')),$id);
				$data['confirm_password'] = $query;
				//echo $this->db->last_query(); exit();
				$count = count($query);
				if($count=='1'){
					$id=$this->input->post('id');
					$query = $this->generalmodel->saveNewPass(md5($this->input->post('new_password')),$id);
					$this->session->set_flashdata('success', 'password Changed Successfully!!!!');
					redirect($_SERVER['HTTP_REFERER'],'refresh');
				}else{
					$this->session->set_flashdata('error', 'Password can not be changed. Provide correct Credentials!!!!');
					redirect($_SERVER['HTTP_REFERER'],'refresh');
				}
			}
		
	
	}
	public function editbusiprofile()
     {
        $data['title']='Business Profile';
        $details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
		$data['myprofile']=$details;
        $userid = $this->session->userdata('is_userlogged_in');	
        $this->load->view('business/header',$data);
		if($this->input->post("save")=="save")
        {
              $data = array(
                    'contact_name'=>$this->input->post('contact_name'),
                    'contact_position'=>$this->input->post('contact_position'),
                    'website'=>$this->input->post('website'),
                    'address'=>$this->input->post('address'),
                    'phoneno'=>$this->input->post('phoneno')
		
                        );
		$details = $this->generalmodel->show_data_id('sm_member',$userid,'email','update',$data);
		//echo $this->db->last_query();
		//exit();
		if($details){
			$this->session->set_flashdata('success','<div class="alert alert-success text-center">Profile  Updated Successfully !!!!</div>');
			redirect('member/profile','refresh');
		}else{
			$this->session->set_flashdata('success','<div class="alert alert-success text-center">Problen In Updating Profile !!!!</div>');
			redirect($_SERVER['HTTP_REFERER'],'');
                    }
        
        } else {
         $this->load->view('business/editprofile', $data);
        }
     }
public function editinstprf()
     {
        $data['title']='Instructor Profile';
        $details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
	$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
	$data['myprofile']=$details;
        $userid = $this->session->userdata('is_userlogged_in');	
        $this->load->view('instructor/header',$data);
	if($this->input->post("save")=="save")
        {
              $data = array(
                    'first_name'=>$this->input->post('first_name'),
                    'last_name'=>$this->input->post('last_name'),
                    'highest_qual'=>$this->input->post('highest_qual'),
                    'address'=>$this->input->post('address'),
                    'exp'=>$this->input->post('exp'),
                    'phoneno'=>$this->input->post('phoneno')
		
                        );
		$details = $this->generalmodel->show_data_id('sm_member',$userid,'email','update',$data);
		//echo $this->db->last_query();
		//exit();
		if($details){
			$this->session->set_flashdata('success','<div class="alert alert-success text-center">Profile  Updated Successfully !!!!</div>');
			redirect('member/profile','refresh');
		}else{
			$this->session->set_flashdata('success','<div class="alert alert-success text-center">Problen In Updating Profile !!!!</div>');
			redirect($_SERVER['HTTP_REFERER'],'');
                    }
        
        } else {
         $this->load->view('instructor/editprofile', $data);
        }
     }
      public function editbusipass()
     {
    
		//==============Get Parent Category Banner===============
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
		$data['myprofile']=$details;
		//echo $this->session->userdata('user_type');
		 
			$data['title']='Business Profile';
			$this->load->view('business/header',$data);
			  $id=$this->session->userdata('is_userlogged_in'); 
		if($this->input->post("submit")=="submit")
                {
                    
               // echo  "in contorller"; exit();
                $this->form_validation->set_rules('current_password', 'Password', 'required');
		$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|matches[confirm_password]|md5');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error', 'All Credentials are Required!!!!');
			//==============Get Parent Category Banner===============
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		//echo $this->db->last_query();
		//exit();
		$data['myprofile']=$details;
		//print_r($data['myprofile']);
		//exit();
		
        $this->load->view('business/setting', $data);
		}else{
				$query = $this->generalmodel->checkOldPass(md5($this->input->post('current_password')),$id);
				$data['confirm_password'] = $query;
				//echo $this->db->last_query(); exit();
				$count = count($query);
				if($count=='1'){
					$query = $this->generalmodel->saveNewPass($this->input->post('new_password'),$id);
					//echo $this->db->last_query();
					//exit();
					$this->session->set_flashdata('success','<div class="alert alert-success text-center">password Changed Successfully!!!!</div>');
					redirect('member/profile','refresh');
				}else{
					$this->session->set_flashdata('success','<div class="alert alert-danger text-center">Password can not be changed. Provide correct Credentials!!!!</div>');
					redirect('member/editbusipass','refresh');
				}
			}
	
		} else 
                    
                {
                    $this->load->view('business/setting', $data);
                    
                }
		
	
     }
     public function editinstpass()
     {
    
		//==============Get Parent Category Banner===============
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
		$data['myprofile']=$details;
		//echo $this->session->userdata('user_type');
		 
			$data['title']='Instructor Profile';
			$this->load->view('instructor/header',$data);
			  $id=$this->session->userdata('is_userlogged_in'); 
		if($this->input->post("submit")=="submit")
                {
                    
               // echo  "in contorller"; exit();
                $this->form_validation->set_rules('current_password', 'Password', 'required');
		$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|matches[confirm_password]|md5');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error', 'All Credentials are Required!!!!');
			//==============Get Parent Category Banner===============
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		//echo $this->db->last_query();
		//exit();
		$data['myprofile']=$details;
		//print_r($data['myprofile']);
		//exit();
		
        $this->load->view('instructor/setting', $data);
		}else{
				$query = $this->generalmodel->checkOldPass(md5($this->input->post('current_password')),$id);
				$data['confirm_password'] = $query;
				//echo $this->db->last_query(); exit();
				$count = count($query);
				if($count=='1'){
					$query = $this->generalmodel->saveNewPass($this->input->post('new_password'),$id);
					//echo $this->db->last_query();
					//exit();
					$this->session->set_flashdata('success','<div class="alert alert-success text-center">password Changed Successfully!!!!</div>');
					redirect('member/profile','refresh');
				}else{
					$this->session->set_flashdata('success','<div class="alert alert-danger text-center">Password can not be changed. Provide correct Credentials!!!!</div>');
					redirect('member/editinstpass','refresh');
				}
			}
	
		} else 
                    
                {
                    $this->load->view('instructor/setting', $data);
                    
                }
		
	
     }
         
    public function editstdprf()
     {
        $data['title']='Instructor Profile';
        $details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
	$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
	$data['myprofile']=$details;
        $userid = $this->session->userdata('is_userlogged_in');	
        $this->load->view('student/header',$data);
	if($this->input->post("save")=="save")
        {
              $data = array(
                    'first_name'=>$this->input->post('first_name'),
                    'last_name'=>$this->input->post('last_name'),
                  	'address'=>$this->input->post('address'),
                 	'phoneno'=>$this->input->post('phoneno')
		
                        );
		$details = $this->generalmodel->show_data_id('sm_member',$userid,'email','update',$data);
		//echo $this->db->last_query();
		//exit();
		if($details){
			$this->session->set_flashdata('success','<div class="alert alert-success text-center">Profile  Updated Successfully !!!!</div>');
			redirect('member/profile','refresh');
		}else{
			$this->session->set_flashdata('success','<div class="alert alert-success text-center">Problen In Updating Profile !!!!</div>');
			redirect($_SERVER['HTTP_REFERER'],'');
                    }
        
        } else {
         $this->load->view('student/editprofile', $data);
        }
     } 

     public function stdsetting()
     {
    
		//==============Get Parent Category Banner===============
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
		$data['myprofile']=$details;
		//echo $this->session->userdata('user_type');
		 
			$data['title']='Student Profile';
			$this->load->view('student/header',$data);
			  $id=$this->session->userdata('is_userlogged_in'); 
		if($this->input->post("submit")=="submit")
                {
                    
               // echo  "in contorller"; exit();
        $this->form_validation->set_rules('current_password', 'Password', 'required');
		$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|matches[confirm_password]|md5');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error', 'All Credentials are Required!!!!');
			//==============Get Parent Category Banner===============
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		//echo $this->db->last_query();
		//exit();
		$data['myprofile']=$details;
		//print_r($data['myprofile']);
		//exit();
		
        $this->load->view('student/setting', $data);
		}else{
				$query = $this->generalmodel->checkOldPass(md5($this->input->post('current_password')),$id);
				$data['confirm_password'] = $query;
				//echo $this->db->last_query(); exit();
				$count = count($query);
				if($count=='1'){
					$query = $this->generalmodel->saveNewPass($this->input->post('new_password'),$id);
					//echo $this->db->last_query();
					//exit();
					$this->session->set_flashdata('success','<div class="alert alert-success text-center">password Changed Successfully!!!!</div>');
					redirect('member/profile','refresh');
				}else{
					$this->session->set_flashdata('success','<div class="alert alert-danger text-center">Password can not be changed. Provide correct Credentials!!!!</div>');
					redirect('member/stdsetting','refresh');
				}
			}
	
		} else {
                  $this->load->view('student/setting', $data);
                }
		
	
     }   
	function instructor_course(){
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		//echo "<pre>";
		//print_r($details);
		//exit();
		$data['user_id']=$details[0]->member_id;
		$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
		$data['myprofile']=$details;
		//==================Current Course List=================
		$data['details'] = $this->generalmodel->show_data_id('sm_member',$this->session->userdata('is_userlogged_in'),'email','get',$data);
		//echo $this->db->last_query();  echo "<pre>"; print_r($data); exit();
		$data['inst'] = $this->generalmodel->show_data_id('course_instructor',$details[0]->member_id,'instructor_id','get',$data);//echo $this->db->last_query();  echo "<pre>"; print_r($data['inst']); echo $inst[0]->course_id;
		//==================Current Course List=================
		$data['title']='Current Course';
		$this->load->view('instructor/header',$data);
		$this->load->view('instructor/current_course', $data); 
   }
   
   public function courseinststdlist()
   {
        $id=$this->session->userdata('is_userlogged_in'); 
       
   }
	
		//================Change Password======================
  public function current_course(){
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		$data['user_id']=$details[0]->member_id;
		$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
		$data['myprofile']=$details;
		//==================Current Course List=================
		$data['details'] = $this->generalmodel->show_data_id('sm_course_booking',$this->session->userdata('is_userlogged_in'),'student_id','get',$data);
		//==================Current Course List=================
		$data['title']='Current Course';
		$this->load->view('student/header',$data);
		$this->load->view('student/current_course', $data); 
   }
   function std_past_course(){
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		$data['user_id']=$details[0]->member_id;
		$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
		$data['myprofile']=$details;
		//==================Current Course List=================
		//$data['details'] = $this->generalmodel->show_data_id('course_booking',$this->session->userdata('is_userlogged_in'),'student_id','get',$data);
		$std_id=$this->session->userdata('is_userlogged_in');

		$data['details']=$this->generalmodel->fetch_all_join("Select * from sm_course_booking  where student_id='$std_id' AND pay_status='paid'");
		//echo $this->db->last_query(); exit();
		//==================Current Course List=================
		$data['title']='Past Course';
		$this->load->view('student/header',$data);
		$this->load->view('student/past_course', $data); 
   }
	
	public function time_table(){
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
		$data['myprofile'] = $details;
		$data['title'] = "Time Table";
		$data['details'] = $this->generalmodel->show_data_id('sm_course_booking',$this->session->userdata('is_userlogged_in'),'student_id','get',$data);
		//print_r($data['details']); 
		$this->load->view('student/header',$data);
		$this->load->view('student/time_table', $data);
	}
	
	public function time_table_business(){
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
		$data['myprofile'] = $details;
		$data['title'] = "Time Table";

		$data['details']=$details = $this->generalmodel->show_data_id('csm_ourse_booking',$this->session->userdata('is_userlogged_in'),'business_id','get',$data);
		//echo $this->session->userdata('is_userlogged_in');
		//echo $this->db->last_query();
		//print_r($details); exit();
		 
		$this->load->view('business/header',$data);
		$this->load->view('business/time_table', $data);
	}
	
	//===============Instructor Time Table====================
        
        public function addtimetable()
        {
            $data['title'] = "Time Table";
            $uid=$this->session->userdata('is_user_id');
            $this->load->view('instructor/header',$data);
             if($this->input->post('submit')=="submit")
                { 
                  $title=$this->input->post('title');
                   $start=$this->input->post('start');
                   $end=$this->input->post('end');
                    $data=array(
                            'schedule_title'=>$title,
                            'start'=>$start,
                            'end'=>$end,
                            'approved'=>"No",
                            'instructor_id'=>$uid 
                          );
                     $result =$this->generalmodel->add_details('sm_instructor_schedule',$data);
                     if($result)
                     {
                         //$data['success']="Your new TimeLine added Successful!";
                      $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Your new Schedule added Successful!</div>');
                                redirect('member/instructor_time_table');
                     }
                     else{
                       $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Something Going wrong Please try again!</div>');
                                redirect('member/instructor_time_table'); 
                     }
                     }
  }
        
        
	public function instructor_time_table(){
		$uid=$this->session->userdata('is_user_id');
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
		$data['myprofile'] = $details;
		$data['title'] = "Time Table";
		//$querydata = $this->generalmodel->dynamic_join('course_instructor',$uid,'course_id','course','course_id','instructor_id','join','');
                //echo $this->db->last_query(); exit();
                $querydata= $this->generalmodel->fetch_all_join("SELECT * FROM sm_instructor_schedule LEFT join sm_course_instructor on sm_course_instructor.instructor_id=sm_instructor_schedule.instructor_id join sm_course on sm_course.course_id=sm_course_instructor.course_id where sm_instructor_schedule.approved='Yes'
                	GROUP by sm_instructor_schedule.schedule_title ");
               // echo $this->db->last_query(); 
               //print_r($querydata); exit();
                $data['details'] = $querydata;
		$this->load->view('instructor/header',$data);
		$this->load->view('instructor/time_table', $data);
	}
	//================Instructor Time Table=====================
	
	public function course_cirtificate(){
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
		$data['myprofile']=$details;
		$data['details'] = $this->generalmodel->show_data_id('sm_course_booking',$this->session->userdata('is_userlogged_in'),'student_id','get',$data);
		$data['title']='Course List';
		
		//======================================
		// $children = $this->build_child($result[$key]->referal_code); 
		//======================================
		
		$this->load->view('student/header',$data);
		$this->load->view('student/course_list', $data); 
	}
	
	function get_cirtificates(){
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
		
		$cirtificates = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		$data['myprofile']=$details;
		
		//$table_name,$primary_key,$wheredata,$primary_key2,$wheredata2,$limit,$start;
		$cirtificatesdata = $this->general_model->GetCirtificate('sm_generate_cirtificate','std_id',$this->session->userdata('is_user_id'),'course_id',end($this->uri->segment_array()),'','');
		//echo $this->db->last_query();
		//exit();
		$data['mycirtificates']=$cirtificatesdata;
		
		$cirtificatecourse = $this->general_model->getAllData('sm_course','course_id',$cirtificatesdata[0]->course_id,'','');
		$data['coursename']=$cirtificatecourse[0]->course_name;
		
		$data['title']="Cirtificates";
		//$this->load->view('student/header',$data);
		$this->load->view('student/cirtificates', $data);
	}
	
	function cirtificateexists($courseid){
		$cirtificatesdata = $this->general_model->GetCirtificate('sm_generate_cirtificate','std_id',$this->session->userdata('is_user_id'),'course_id',$courseid,'','');
		$data['mycirtificates']=$cirtificatesdata;
		return $cirtificatesdata;
	}
	
	function postcoursefeedback(){
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
		$data['myprofile']=$details;
		$data['title']="Course Feedback";
		$this->load->view('student/header',$data);
		$this->load->view('student/course_feedback_form', $data);
	}
	
	function postfeedback(){
        $datalist = array(			
                            'course_id' => $this->input->post('course_id'),
                            'user_id' => $this->input->post('user_id'),
                            'feedback'=>$this->input->post('comment'),
                            'post_date' => date('Y-m-d H:i:s'),
                            'status' =>1
			);
	$query = $this->generalmodel->show_data_id('sm_course_feedback','','','insert',$datalist);
	$this->session->set_flashdata('success','<div class="alert alert-success text-center">Review posted successfully</div>');
	redirect($_SERVER['HTTP_REFERER']);
	}
		
	function logout(){
		$this->session->all_userdata();
		$this->session->sess_destroy();
		redirect('auth/login','refresh');
	}
	
	function announcement(){
		$uid=$this->session->userdata('is_user_id');
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
		$data['myprofile'] = $details;
		$query = $this->generalmodel->show_data_id('sm_announsement','1','status','get','');
		$data['announcement']=$query;
		$data['title']="Announcement";
		$this->load->view('instructor/header',$data);
		$this->load->view('instructor/announcement',$data);
	}
	
	function edit_member(){
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
		$data['myprofile']=$details;
		$data['title']='Member Edit';
		$memberid=$this->uri->segment(3);
		
		$memberdetails =  $this->generalmodel->show_data_id('sm_member',$memberid,'member_id','get','');
		$data['memberdetails'] = $memberdetails;
		$this->load->view('business/header',$data);
		$this->load->view('business/editmember', $data);
	}
	
	function update_my_member(){
		$memberid=$this->input->post('memberid');
		$datalist = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email'),
			'phoneno' => $this->input->post('phoneno'),
			'gender' => $this->input->post('gender')
		);
		$memberdetails =  $this->general_model->show_data_id('sm_member',$memberid,'member_id','update',$datalist);
		
		$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Member updated successfully</div>');
                    redirect('member/business_member');
	}

// ADDING NEW CODE  ------------------AMIR---------------------------------//
		function dashboard(){
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
		$data['myprofile']=$details;
		$data['title']='Students Profile';
			$this->load->view('student/header',$data);
			$this->load->view('student/dashboard', $data);
			$this->load->view('footer');
	}
	function Exam(){
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
		$data['myprofile']=$details;
		$data['title']='Students Exam';
			$this->load->view('student/header',$data);
			$this->load->view('student/exam', $data);
			$this->load->view('footer');
	}
	function timeline(){
		$details = $this->general_model->get_user_by_id($this->session->userdata('is_userlogged_in'));
		$data['profile_name'] = $details[0]->first_name ." ". $details[0]->last_name;
		$data['myprofile']=$details;
		$data['title']='Students Time Line';
			$this->load->view('student/header',$data);
			$this->load->view('student/time-line', $data);
			$this->load->view('footer');
	}

}

?>