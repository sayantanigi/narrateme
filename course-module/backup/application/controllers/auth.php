<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); 
class Auth extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('general_model');
		$this->load->model('generalmodel');
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->helper('string');

	}
	function index()
	{

	}
	function registration()
	{
		$data['banner'] = $this->generalmodel->show_data_id("sm_banner",1,"status","get","");

		$data["mode"] = $this->generalmodel->show_data_id("sm_mode",1,"mode_status","get","");

		$data['admin'] = $this->generalmodel->show_data_id("sm_admin_mail",1,"MailId","get","");

	$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");		
//==============Get Settings Process===============
		$data['title']='Member Registration';	
		$this->load->view('header',$data);
		$this->load->view('register',$data);
		$this->load->view('footer');
	}
	function stdregister()
	{

		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('last_name', 'Sur Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phoneno', 'Phone', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[member.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password]|md5');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE){
			$data['title']='Member Registration';	
			$this->load->view('header',$data);
			$this->load->view('register',$data);
			$this->load->view('footer',$data);
		}else{
			$datalist = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'dob' => $this->input->post('dob'),
				'address'=>$this->input->post('address'),
				'email' => $this->input->post('email'),
				'phoneno' => $this->input->post('phoneno'),
				'password' => $this->input->post('password'),
				'guardian_name' => $this->input->post('name_guardian'),
				'guardian_telephone' => $this->input->post('telephone_guardian'),
				'guardian_address' => $this->input->post('address_guardian'),
				'guardian_email' => $this->input->post('email_guardian'),
				'user_type' => $this->input->post('user_type'),
				'gender' => $this->input->post('gender'),
				'add_date' => date('Y-m-d H:i:s'),
				'status' => '1'
			);
				
			$table_name='sm_member';
			$this->general_model->insertData($table_name, $datalist);
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
			$subject = 'Registration Success Message From Skillogics Academy.';   
			$this->email->from($from_email, 'Skillogics ADMINISTRATOR'); 
			$this->email->to($to_email);
			$this->email->subject($subject); 
			
			if($this->email->send()){
//===========================------------------=========================
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! !</div>');
				redirect('auth/registration');
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
				redirect('auth/registration');
			}
		}
	}
	function instregister(){


		$this->form_validation->set_rules('inst_first_name', 'First Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('inst_last_name', 'Sur Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('inst_phoneno', 'Phone', 'trim|required|xss_clean');
		$this->form_validation->set_rules('inst_email', 'Email ID', 'trim|required|valid_email|is_unique[member.email]');
		$this->form_validation->set_rules('inst_password', 'Password', 'trim|required|matches[inst_password]|md5');
		$this->form_validation->set_rules('inst_confirm_password', 'Confirm Password', 'required|matches[inst_password]');
		$this->form_validation->set_rules('inst_highestqualification', 'Highest Qualification', 'trim|required|xss_clean');



		if ($this->form_validation->run() == FALSE){
			$data['title']='Member Registration';	
			$this->load->view('headerinner',$data);
			$this->load->view('register',$data);
			$this->load->view('footer',$data);

		}else{

			if(!empty($_FILES['inst_cv']['name'])){

				$config['upload_path'] = 'uploads/cv/';
				$config['allowed_types'] = 'doc|docx|pdf';
				$config['file_name'] = $_FILES['inst_cv']['name'];


				$this->load->library('upload',$config);
				$this->upload->initialize($config);

				if($this->upload->do_upload('inst_cv')){
					$uploadData = $this->upload->data();
					$docu = $uploadData['file_name'];
				}else{
					$docu = '';
				}
			}else{
				$docu='';
			}


			$instdatalist= array(
				'first_name'=>$this->input->post('inst_first_name'),
				'last_name'=>$this->input->post('inst_last_name'),
				'email'=>$this->input->post('inst_email'),
				'phoneno'=>$this->input->post('inst_phoneno'),
				'dob'=>$this->input->post('inst_dob'),
				'address'=>$this->input->post('inst_address'),
				'password'=>$this->input->post('inst_password'),
				'highest_qual'=>$this->input->post('inst_highestqualification'),
				'other_qual'=>$this->input->post('inst_otherqualification'),
				'speciality_subject'=> $this->input->post('inst_speciality'),
				'teaching_qual'=> $this->input->post('inst_teaching'),
				'exp'=>$this->input->post('inst_experience'),
				'updated_dbs'=>$this->input->post('inst_dbs'),
				'cv'=>$docu,
				'user_type'=>$this->input->post('inst_user_type'),
				'gender'=>$this->input->post('inst_gender'),
				'add_date'=>date('Y-m-d H:i:s'),
				'status' => '1'
			);
				
			$table_name='sm_member';
			$this->general_model->insertData($table_name, $instdatalist);

//===========================------------------=========================
			$lastid = $this->db->insert_id();
			$from_email = "info@oesacademy.com"; 
			$to_email = $this->input->post('inst_email'); 
			$url=base_url()."auth/verification/".$lastid;
//***********************======******************
			$data1 = array(
				'membername' =>$this->input->post('inst_first_name')." ".$this->input->post('inst_last_name'),
				'email' => $this->input->post('inst_email'),
				'password' => $this->input->post('inst_password'),
				'url' => $url
			);
//***********************================******************
			$msg = $this->load->view('usersignuptemplate',$data1,TRUE);
			$config['mailtype'] = 'html';
			$this->load->library('email');
			$this->email->initialize($config);
			$msg=$msg;
			$subject='Registration Success Message From OES Academy.';   
			$this->email->from($from_email, 'OES ADMINISTRATOR'); 
			$this->email->to($to_email);
			$this->email->subject($subject); 
			
			if($this->email->send()){
//===========================------------------=========================
				$this->session->set_flashdata('instmsg','<div class="alert alert-success text-center">You are Successfully Registered!!!</div>');
				redirect('auth/registration');
			}else{
				$this->session->set_flashdata('instmsg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
				redirect('auth/registration');
			}
		}
	}
	function busregister()
	{


		$this->form_validation->set_rules('business_name', 'Business Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('contact_name', 'Contact Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('bus_phoneno', 'Phone', 'trim|required|xss_clean');
		$this->form_validation->set_rules('bus_email', 'Email ID', 'trim|required|valid_email|is_unique[member.email]');
		$this->form_validation->set_rules('bus_password', 'Password', 'trim|required|matches[bus_password]|md5');
		$this->form_validation->set_rules('bus_confirm_password', 'Confirm Password', 'required|matches[bus_password]');

		if ($this->form_validation->run() == FALSE){
			$data['title']='Member Registration';	
			$this->load->view('header',$data);
			$this->load->view('register',$data);
			$this->load->view('footer',$data);
		}else{
			$busdatalist = array(
				'business_name' =>$this->input->post('business_name'),
				'contact_name' =>$this->input->post('contact_name'),
				'contact_position'=> $this->input->post('contact_position'),
				'email' => $this->input->post('bus_email'),
				'phoneno' => $this->input->post('bus_phoneno'),
				'password' => $this->input->post('bus_password'),
				'address'=>$this->input->post('bus_address'),
				'user_type' => $this->input->post('bus_user_type'),
				'website' => $this->input->post('website'),
				'add_date' => date('Y-m-d H:i:s'),
				'status' => '1'
			);
				
			$table_name='sm_member';
			$this->general_model->insertData($table_name, $busdatalist);
//===========================------------------=========================
			$lastid = $this->db->insert_id();
			$from_email = "info@oesacademy.com"; 
			$to_email =$this->input->post('bus_email'); 
			$url = base_url()."auth/verification/".$lastid;
//***********************================******************
			$data1 = array(
				'membername' =>$this->input->post('business_name'),
				'email'=>$this->input->post('bus_email'),
				'password'=>$this->input->post('bus_password'),
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
			
			if($this->email->send()){
//===========================------------------=========================
				$this->session->set_flashdata('busmsg','<div class="alert alert-success text-center">You are Successfully Registered!!!</div>');
				redirect('auth/registration');
			}else{
				$this->session->set_flashdata('busmsg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
				redirect('auth/registration');
			}
		}
	}
	function verify($hash=NULL){
		if ($this->user_model->verifyEmailID($hash)){
			$this->session->set_flashdata('verify_msg','<div class="alert alert-success text-center">Your Email Address is successfully verified! Please login to access your account!</div>');
			redirect('user/register');
		}else{
			$this->session->set_flashdata('verify_msg','<div class="alert alert-danger text-center">Sorry! There is error verifying your Email Address!</div>');
			redirect('user/register');
		}
	}

	function login(){
	
		$data['banner'] = $this->generalmodel->show_data_id("sm_banner",1,"status","get","");

		$data["mode"] = $this->generalmodel->show_data_id("sm_mode",1,"mode_status","get","");

		$data['admin'] = $this->generalmodel->show_data_id("sm_admin_mail",1,"MailId","get","");

		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");

		$data['title']='Member Login';	
		$this->load->view('header',$data);
		$this->load->view('login',$data);
		$this->load->view('footer');
	}
	function forget()
	{
		$data['settings'] = $this->generalmodel->show_data_id("settings",1,"id","get","");	

		$data['title']='Forget Password';	
		$this->load->view('header',$data);
		$this->load->view('forget',$data);
		$this->load->view('footer',$data);
	}
	function recoverpass()
	{

		$this->form_validation->set_rules('email', 'Email', 'trim|required');

		if($this->form_validation->run() == TRUE) {

			$email=$this->input->post('email');			

			$check=$this->generalmodel->fetch_single_join("SELECT * FROM sm_member WHERE email='$email'");

			if(!empty($check))
			{
				$rand = random_string('alnum',13);

				$updatedata = array(				
					'password' => md5($rand)
				);

				$update=$this->generalmodel->show_data_id("sm_member", $email, 'email','update',$updatedata);
				

				if($update)
				{

					$htmlContent = "<table align='center' style='width:650px; text-align:center; background:#f7f7f7;'>

					<tbody>
					<tr style='height:50px;background-color:#035288;'><td valign='middle' style='color:#252424;'><img src='".base_url()."user_panel/images/logo.png' alt='Oes Academy' title='Oesacademy'/></td></tr>
					<tr>
					<td valign='top' align='center'>
					<table align='center' style='height:380px; color:#000; width:600px;'>
					<tbody>
					<tr>

					<td align='center' style='font-size:28px;border-top:1px dashed #ccc;' colspan='2'>Hello, User</td>
					</tr>
					<tr>
					<td valign='top' align='center' colspan='2'>
					New Password From Oesacademy .<br><br>

					Email:&nbsp;" . $email . "<br><br>
					Password: &nbsp;" . $rand. "<br><br>
					</td>
					</tr>
					<tr>
					<td colspan='2'>
					<br>
					Sincerely,<br>
					<strong>Oesacademy Team</strong><br><br>
					<strong>Email: </strong>info@oesacademy.co.uk<br><br>

					This is an automated response, please DO NOT reply.
					</td>
					</tr>
					</tbody>
					</table>
					</td>
					</tr>
					</tbody>
					</table>";					

					$curl = curl_init();
					curl_setopt_array($curl, array(
						CURLOPT_URL => "http://goigi.technology/mailapi",
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_ENCODING => "",
						CURLOPT_MAXREDIRS => 10,
						CURLOPT_TIMEOUT => 30,
						CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						CURLOPT_CUSTOMREQUEST => "POST",
						CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"smtpclient\"\r\n\r\nrelay-hosting.secureserver.net\r\n"
						. "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"Email\"\r\n\r\ninfo@oesacademy.co.uk\r\n"
						. "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"Password\"\r\n\r\nWeston123!\r\n"
						. "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"ToEmail\"\r\n\r\n $email\r\n"                                
						. "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"Port\"\r\n\r\n25\r\n"
						. "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"EnableSsl\"\r\n\r\nfalse\r\n"
						. "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"Subject\"\r\n\r\n Recover Password from Oesacademy \r\n"
						. "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"IsBodyHtml\"\r\n\r\ntrue\r\n"
						. "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"Message\"\r\n\r\n $htmlContent \r\n"
						. "------WebKitFormBoundary7MA4YWxkTrZu0gW--",
						CURLOPT_HTTPHEADER => array(
							"cache-control: no-cache",
							"content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
							"postman-token: 870db1a9-ef1c-907e-03b3-21c1f72945ab"
						),
					));
					$response = curl_exec($curl);
					$err = curl_error($curl);
					curl_close($curl);
					

			$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Password has sent to your Email!</div>');	
			redirect('auth/login','refresh');
		}

		}else{

			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Email address you have entered is not  registered!</div>');
			redirect('auth/forget','refresh');

		}
		} else {

			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Something went Wrong !</div>');

			$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");

			$data['title']='Forget Password';	
			$this->load->view('header',$data);
			$this->load->view('forget',$data);
			$this->load->view('footer',$data);
		}
}
function member_login(){
//=================================
	$this->load->helper('security');
	$this->load->library('session');
	$password = md5($this->input->post('password'));
	$email = $this->input->post('email');
	$user_type = $this->input->post('user_type');
	$query = $this->general_model->get_user($this->input->post('email'),$password,$user_type);

	if(@$query[0]->email!=''){
		$email = $query[0]->email;
		$uid = $query[0]->member_id;
		echo $user_type = $query[0]->user_type;

		$date = date("Y-m-d H:i:s");

		$session_data = array(
			'email'=>$email,
			'uid'=>$uid,
			'user_type'=>$user_type,
			'is_userlogged_in' => 1
		);
		print_r($session_data);


		$this->session->set_userdata('logged',$session_data);
		$this->session->set_userdata('logged_in', $session_data);
		$this->session->set_userdata('user_type',$user_type);
		$this->session->set_userdata('is_userlogged_in',$email);
		$this->session->set_userdata('is_user_id',$uid);

		redirect('member/profile',$session_data);
	}else{
		$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Invalid Username/Email or Password </div>');
		redirect('auth/login');
	}
//=================================
}

function forget_password(){

	$data['parentbanner'] = $this->general_model->getAllData("sm_category","parent_id",0,"","");

	$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");	

	$data['title']='Forget Password';
	$this->load->view('header',$data);
	$this->load->view('forget_view');
	$this->load->view('footer');
}

function get_password(){
	$useremail=$this->input->post('email');
	$query = $this->general_model->get_user_details($useremail);
	if(count($query)>0){
		$userid = $query[0]->userid;
//================================================
		$from_email = "info@usbanglapost.com"; 
		$to_email = $this->input->post('email'); 
		$url = base_url()."auth/changepassword/".$userid;
//***********************************
		$data1 = array(
			'membername' =>$query[0]->name,
			'email' => $this->input->post('email'),
			'url' => $url
		);
//**************************************
		$msg = $this->load->view('userpasswordtemplate',$data1,TRUE);
		$config['mailtype'] = 'html';
		$this->load->library('email');
		$this->email->initialize($config);
		$msg = $msg;
		$subject = 'Change Password For Your USBANGLA Account.';   
		$this->email->from($from_email, 'USBANGLA POST ADMINISTRATOR'); 
		$this->email->to($to_email);
		$this->email->subject($subject); 
		$this->email->message($msg);
//============================================
		if($this->email->send()){
			$this->session->set_flashdata('logverified', 'Please check your email to get new password');
		}else{
			$this->session->set_flashdata('logerror', 'Opps !! Problem sending email');
		}
		redirect('auth/forget_password');
	}else{
		$this->session->set_flashdata('logerror', 'Email Does Not Exists');
		redirect('auth/forget_password');
	}
}

function newpassword(){
//================
	$data['parentbanner'] = $this->general_model->getAllData("sm_category","parent_id",0,"","");

	$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");	

	$userid=end($this->uri->segment_array());
	$data['userid']=$userid;
	$data['title']='Change Password';
	$this->load->view('header',$data);
	$this->load->view('updatepassword_view');
	$this->load->view('footer');
}

function createnewpassword(){
//===========-------------===============
	$data['parentbanner'] = $this->general_model->getAllData("sm_category","parent_id",0,"","");

	$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");	

	$userid=end($this->uri->segment_array());
	$data['userid']=$userid;
	$data['title']='Change Password';
	$this->load->view('header',$data);
	$this->load->view('updatepassword_view');
	$this->load->view('footer');
}

function changepassword(){
//===========-------------===============
	
	$data['parentbanner'] = $this->general_model->getAllData("sm_category","parent_id",0,"","");	

	$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");	

	$userid=end($this->uri->segment_array());
	$data['userid']=$userid;
	$data['title']='Change Password';
	$this->load->view('header',$data);
	$this->load->view('updatepassword_view');
	$this->load->view('footer');
}

function update_password(){
	$table_name='profile';
	$primary_key='userid';
	$wheredata=$this->input->post('userid');
	$password=md5($this->input->post('password'));

	$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]|md5');
	$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');

	if($this->form_validation->run() == FALSE){
//===========-------------===============
		$data['parentbanner'] = $this->general_model->getAllData("sm_category","parent_id",0,"","");
//==============Get Parent Category Banner===============
//==============Get Settings Process===============
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");	
//==============Get Settings Process===============
		$userid=$wheredata;
		$data['userid']=$userid;
		$data['title']='Change Password';
		$this->load->view('header',$data);
		$this->load->view('updatepassword_view');
		$this->load->view('footer');
	}else{
//=================------------------=================
		$table_name_update='sm_profile';
		$primary_key_update='userid';
		$wheredata_update=$this->input->post('userid');
		$data_update = array(
			'password' =>$password
		);
		$query = $this->general_model->update_data($table_name_update,$primary_key_update,$wheredata_update,$data_update);

		if($query){
			$this->session->set_flashdata('logverified', 'Your Password Changed Successfully');
			redirect('auth/login','refresh');
		}
	}
}



function verification(){
	$userid=end($this->uri->segment_array());
	$query = $this->general_model->verifyUser($userid);

	if($query){
		$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Your Account Is Active Now</div>');
		redirect('auth/login','refresh');
	}
}

function logout(){
	$this->session->all_userdata();
	$this->session->sess_destroy();
	redirect('auth/login','refresh');
}

}
?>