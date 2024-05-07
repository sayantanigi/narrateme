<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Courses extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('email');
		$this->load->model('general_model');
		$this->load->model('generalmodel');
		$this->load->helper('string');
	}
	public function index() {
		$data['content'] = $this->generalmodel->show_data_id("sm_page_content", 3, "id", "get", "");
		$data['country'] = $this->db->query("SELECT * FROM countries")->result_array();
		$data['levels'] = $this->db->query("SELECT * FROM sm_levels WHERE level_status = 1")->result_array();
		$tablename = 'sm_category';
		$primary_key = 'parent_id';
		$wheredata = '0';
		$query = $this->generalmodel->getAllDataOrder($tablename, $primary_key, $wheredata, 'sort_order', '', '');
		$data['coursepcategory'] = $query;
		$segment1 = $this->uri->segment(3);
		$segment2 = $this->uri->segment(4);
		$segment3 = $this->uri->segment(5);
		if ($segment1 == '') {
			$primary_key = 'parent_id';
			$wheredata = @$query[0]->category_id;
			$querysub = $this->generalmodel->getAllDataOrder($tablename, $primary_key, $wheredata, 'sort_order', '', '');
			$data['coursescategory'] = $querysub;
			$tablename = 'sm_course';
			$primary_key = 'course_category';
			$wheredata = @$querysub[0]->category_id;
			$querycourse = $this->generalmodel->getAllDataOrder($tablename, $primary_key, $wheredata, 'sort_order', '', '');
			$data['courseslist'] = $querycourse;
		}
		$table_name = 'sm_course';
		$primary_key = 'course_type';
		$wheredata = 'Upcoming Courses';
		$data['eloca'] = $this->generalmodel->getAllData($table_name, $primary_key, $wheredata, '', '');
		$wheredata1 = 'Coming Soon courses';
		$data['coming'] = $this->generalmodel->getAllData($table_name, $primary_key, $wheredata1, '', '');
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings", 1, "id", "get", "");
		$data['title'] = "Courses";
		$this->load->view('header', $data);
		$this->load->view('category', $data);
		$this->load->view('footer');
	}
	public function coursedescription() {
		$wheredata = $this->uri->segment(3);
		$querycrs = $this->generalmodel->getAllData('sm_course', 'course_id', $wheredata = $this->uri->segment(3), '', '', '');
		$data['querycrs'] = $querycrs;
		$wheredata = $this->uri->segment(3);
		$querydesc = $this->generalmodel->getAllDataOrder('sm_syllabus', 'course_id', $wheredata, 's_order', '', '', '');
		$data['querydesc'] = $querydesc;
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings", 1, "id", "get", "");
		$data['title'] = 'Course Details';
		$this->load->view('header', $data);
		$this->load->view('coursedetails');
		$this->load->view('footer');
	}
	public function modeincourse() {
		$data['title'] = 'Course Modes';
		$table_name = 'sm_course';
		$primary_key = 'course_id';
		$courseId = $this->uri->segment(4);
		$batchId = $this->uri->segment(5);
		$data['batchlist'] = $batchlist = $this->db->get_where('sm_batch', array('courseId' => $courseId, 'batchId' => $batchId))->row();
		$data['batchSession'] = $session = $this->db->get_where('sm_batch_sessions', array('batch_id' => $batchId))->result();
		$data['price'] = $batchlist->price;
		$wheredata = $this->uri->segment(3);
		$querycourse = $this->generalmodel->getAllData($table_name, $primary_key, $wheredata, '', '', '');
		$data['course'] = $this->db->get_where('sm_course', array('course_id' => $courseId))->row();
		$data['coursename'] = $querycourse[0]->course_name;
		$data['cource_hours'] = @$querycourse[0]->cource_hours;
		@$type = @$this->input->post('type');
		@$course_id = @$this->input->post('course_id');
		@$location = @$this->input->post('location');
		@$start_date = @$this->input->post('start_date');
		@$end_date = @$this->input->post('end_date');
		$this->session->set_userdata('location', $location);
		if (@$type != '' and $course_id != '') {
			$table_name = 'sm_course_location';
			$primary_key1 = 'course_type';
			$wheredata1 = $type;
			$primary_key2 = 'course_id';
			$wheredata2 = $course_id;
			$querysub = $this->generalmodel->Get_multiple_where_data($table_name, $primary_key1, $primary_key2, $wheredata1, $wheredata2, '', '', '');
			$data['location'] = $querysub;
			$data['course_hour'] = $querysub[0]->cource_hours;
			$data['type'] = $type;
			$table_name = 'sm_course_lesion';
			$primary_key1 = 'type_id';
			$wheredata1 = $type;
			$primary_key2 = 'course_id';
			$wheredata2 = $course_id;
			$querylesson = $this->generalmodel->Get_multiple_where_data($table_name, $primary_key1, $primary_key2, $wheredata1, $wheredata2, '', '', '');
			$data['lesson'] = $querylesson;
		}
		if (@$type != '' and @$course_id != '' and @$location != '') {
			$table_name = 'sm_course_start_date';
			$primary_key = 'loc_id';
			$wheredata = $location;
			$queryloctime = $this->generalmodel->getAllData($table_name, $primary_key, $wheredata, '', '', '');
			$data['loc'] = $location;
			$data['start'] = $queryloctime;
		}
		if (@$type != '' and @$course_id != '' and @$location != '' and @$start_date != '') {
			$table_name = 'sm_course_end_date';
			$primary_key = 'start_id';
			$wheredata = $start_date;
			$queryloctime = $this->generalmodel->getAllData($table_name, $primary_key, $wheredata, '', '', '');
			$data['loc'] = $location;
			$data['start_date'] = $start_date;
			$data['end_date'] = $end_date;
			$data['end'] = $queryloctime;
		}
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings", 1, "id", "get", "");
		$this->load->view('header', $data);
		$this->load->view('modeincourse');
		$this->load->view('footer');
	}
	public function distancecourse() {
		$data['title'] = 'Distance Booking';
		$table_name = 'sm_distance_learning';
		$primary_key = 'course_id';
		$wheredata = $this->uri->segment(3);
		$queryloctime = $this->generalmodel->getAllData($table_name, $primary_key, $wheredata, '', '', '');
		$data['dlearning'] = $queryloctime;
		if (!empty($queryloctime)) {
			$table_name = 'sm_course';
			$primary_key = 'course_id';
			$wheredata = $queryloctime[0]->course_id;
			$querycourse = $this->generalmodel->getAllData($table_name, $primary_key, $wheredata, '', '', '');
			$data['coursename'] = $querycourse[0]->course_name;
			$data['price'] = $querycourse[0]->price;
		}
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings", 1, "id", "get", "");
		$this->load->view('header', $data);
		$this->load->view('distancebooking');
		$this->load->view('footer');
	}
	public function privatecourse() {
		$data['title'] = 'Private Booking';
		$table_name = 'sm_private_learning';
		$primary_key = 'course_id';
		$courseId = $this->uri->segment(4);
		$batchId = $this->uri->segment(5);
		$data['batchlist'] = $batchlist = $this->db->get_where('sm_batch', array('courseId' => $courseId, 'batchId' => $batchId))->row();
		$data['batchSession'] = $session = $this->db->get_where('sm_batch_sessions', array('batch_id' => $batchId))->result();
		$data['course'] = $this->db->get_where('sm_course', array('course_id' => $courseId))->row();
		$data['price'] = $batchlist->price;
		$wheredata = $this->uri->segment(3);
		$queryloctime = $this->generalmodel->getAllData($table_name, $primary_key, $wheredata, '', '', '');
		$data['plearning'] = $queryloctime;
		if (!empty($queryloctime)) {
			$table_name = 'sm_course';
			$primary_key = 'course_id';
			$wheredata = $queryloctime[0]->course_id;
			$querycourse = $this->generalmodel->getAllData($table_name, $primary_key, $wheredata, '', '', '');
			$data['coursename'] = $querycourse[0]->course_name;
			$data['price'] = $querycourse[0]->price;
		}
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings", 1, "id", "get", "");
		$this->load->view('header', $data);
		$this->load->view('privatebooking');
		$this->load->view('footer');
	}
	public function flexiblecourse() {
		$table_name = 'sm_course';
		$primary_key = 'course_id';
		$courseId = $this->uri->segment(4);
		$batchId = $this->uri->segment(5);
		$wheredata = $this->uri->segment(3);
		$querycourse = $this->generalmodel->getAllData($table_name, $primary_key, $wheredata, '', '', '');
		$data['coursename'] = $querycourse[0]->course_name;
		$data['price'] = $querycourse[0]->price;
		$data['cource_hours'] = @$querycourse[0]->cource_hours;
		$data['title'] = 'Flexible Booking';
		$data['course'] = $this->db->get_where('sm_course', array('course_id' => $courseId))->row();
		$data['batchlist'] = $batchlist = $this->db->get_where('sm_batch', array('courseId' => $courseId, 'batchId' => $batchId))->row();
		$data['batchSession'] = $session = $this->db->get_where('sm_batch_sessions', array('batch_id' => $batchId))->result();
		$table_name = 'sm_course_lesion';
		$primary_key1 = 'type_id';
		$wheredata1 = 'ev';
		$primary_key2 = 'course_id';
		$wheredata2 = $this->uri->segment(3);
		$querylesson = $this->generalmodel->Get_multiple_where_data($table_name, '', $primary_key2, '', $wheredata2, '', '', '');
		$data['lesson'] = $querylesson;
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings", 1, "id", "get", "");
		$this->load->view('header', $data);
		$this->load->view('flexiblebooking');
		$this->load->view('footer');
	}
	public function review() {
		$data['title'] = "Course Review";
		$table_name = 'sm_course';
		$primary_key = 'course_id';
		$wheredata = $this->uri->segment(3);
		$querycourse = $this->generalmodel->getAllData('sm_course_feedback', $primary_key, $wheredata, '', '', '');
		$data['querycourse'] = $querycourse;
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings", 1, "id", "get", "");
		$this->load->view('headerinner', $data);
		$this->load->view('reviewlist');
		$this->load->view('footer');
	}
	public function payment() {
		$id = $this->session->userdata('is_userlogged_in');
		$usertype = $this->generalmodel->fetch_single_join("SELECT user_type from  sm_member where email='$id'");
		$type = $usertype->user_type;
		if (!$this->session->userdata('is_user_id')) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Please Login for  book a course! </div>');
			redirect('auth/login', 'refresh');
		}
		if (($type == 'inst') || ($type == 'busi')) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Please Login  through student Account! </div>');
			redirect('auth/login', 'refresh');
		} else {
			$transaction_id = 'OESPAY' . random_string('alnum', 12) . date('d-m-Y');
			$member_id = $this->session->userdata('is_userlogged_in');
			$data = array(
				'course_id' => $this->input->post('course_id'),
				'course_name' => $this->input->post('course_name'),
				'course_type' => $this->input->post('type'),
				'book_date' => date('Y-m-d H:i:s'),
				'mode' => $this->input->post('mode'),
				'price' => $this->input->post('price'),
				'student_id' => $member_id,
				'transaction_id' => $transaction_id,
				'pay_status' => 'unpaid',
				'status' => '0'
			);
			$details = $this->generalmodel->show_data_id('sm_course_booking', '', '', 'insert', $data);
			$datapay = array(
				'transaction_id' => $transaction_id,
				'transaction_date' => date('Y-m-d H:i:s'),
				'pay_status' => 'unpaid',
				'member_id' => $member_id,
				'status' => '0'
			);
			$details = $this->generalmodel->show_data_id('payment', '', '', 'insert', $datapay);
			$data['title'] = 'Payment';
			$this->load->view('header', $data);
			$this->load->view('payment');
			$this->load->view('footer');
		}
	}
	public function Events() {
		$data['title'] = "Events";
		$table_name = 'sm_course';
		$primary_key = 'course_id';
		$wheredata = $this->uri->segment(3);
		$querycourse = $this->generalmodel->getAllData('sm_course_feedback', $primary_key, $wheredata, '', '', '');
		$data['querycourse'] = $querycourse;
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings", 1, "id", "get", "");
		$this->load->view('header', $data);
		$this->load->view('events');
		$this->load->view('footer');
	}
	public function eventregister() {
		$data['title'] = "Event Rregister";
		$table_name = 'sm_course';
		$primary_key = 'course_id';
		$wheredata = $this->uri->segment(3);
		$querycourse = $this->generalmodel->getAllData('sm_course_feedback', $primary_key, $wheredata, '', '', '');
		$data['querycourse'] = $querycourse;
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings", 1, "id", "get", "");
		$this->load->view('header', $data);
		$this->load->view('event-register');
		$this->load->view('footer');
	}
	public function eventdetails() {
		$data['title'] = "Event Details";
		$table_name = 'sm_course';
		$primary_key = 'course_id';
		$wheredata = $this->uri->segment(3);
		$querycourse = $this->generalmodel->getAllData('sm_course_feedback', $primary_key, $wheredata, '', '', '');
		$data['querycourse'] = $querycourse;
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings", 1, "id", "get", "");
		$this->load->view('header', $data);
		$this->load->view('event-details');
		$this->load->view('footer');
	}
	public function corporatetraining() {
		$data['title'] = "Corporate Training";
		$table_name = 'sm_course';
		$primary_key = 'course_id';
		$wheredata = $this->uri->segment(3);
		$querycourse = $this->generalmodel->getAllData('sm_course_feedback', $primary_key, $wheredata, '', '', '');
		$data['querycourse'] = $querycourse;
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings", 1, "id", "get", "");
		$this->load->view('header', $data);
		$this->load->view('corporatetraining');
		$this->load->view('footer');
	}
	public function privatetutor() {
		$data['title'] = "Private Tutor";
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings", 1, "id", "get", "");
		$data['content'] = $this->generalmodel->show_data_id("sm_page_content", 4, "id", "get", "");
		$this->load->view('header', $data);
		$this->load->view('private_tutor');
		$this->load->view('footer');
	}
	public function upcomingcoursedetails() {
		$table_name = 'sm_course';
		$primary_key = 'course_id';
		$courseId = $this->uri->segment(3);
		$data['batchlist'] = $batchlist = $this->db->get_where('sm_batch', array('courseId' => $courseId))->row();
		$batchId = $batchlist->batchId;
		$data['batchSession'] = $session = $this->db->get_where('sm_course_sessions', array('batch_id' => $batchId))->result();
		$data['course'] = $this->db->get_where('sm_course', array('course_id' => $courseId))->row();
		$data['price'] = $batchlist->price;
		$wheredata = $this->uri->segment(3);
		$querydesc = $this->generalmodel->getAllDataOrder('sm_syllabus', 'course_id', $wheredata, 's_order', '', '', '');
		$data['querydesc'] = $querydesc;
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings", 1, "id", "get", "");
		$data['title'] = 'Course Details';
		$this->load->view('header', $data);
		$this->load->view('upcoming-courses-detail');
		$this->load->view('footer');
	}
	public function comingsooncoursedetails() {
		$table_name = 'sm_course';
		$primary_key = 'course_id';
		$courseId = $this->uri->segment(3);
		$data['course'] = $this->db->get_where('sm_course', array('course_id' => $courseId))->row();
		$wheredata = $this->uri->segment(3);
		$querysyll = $this->generalmodel->getAllDataOrder('sm_syllabus', 'course_id', $wheredata, 's_order', '', '', '');
		$data['querysyll'] = $querysyll;
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings", 1, "id", "get", "");
		$data['title'] = 'Course Details';
		$this->load->view('header', $data);
		$this->load->view('coming-soon-courses-detail');
		$this->load->view('footer');
	}
	function getCity() {
		$id = $this->input->post('id');
		$res = $this->db->order_by('id', 'ASC')->get_where('cities', array('country_id' => $id))->result();
		$ht = '<option value="">-- Select City --</option>';
		if (is_array($res) && count($res) > 0) {
			foreach ($res as $r) {
				$ht .= '<option value="' . $r->id . '">' . $r->name . '</option>';
			}
		} else {
			$ht = '<option value="">No City Found</option>';
		}
		echo $ht;
	}
	function getLocation() {
		$id = $this->input->post('id');
		$res = $this->db->order_by('sort_order', 'ASC')->get_where('sm_location', array('location_city_id' => $id))->result();
		$ht = '<option value="">-- Select Location --</option>';
		if (is_array($res) && count($res) > 0) {
			foreach ($res as $r) {
				$ht .= '<option value="' . $r->id . '">' . $r->location_name . '</option>';
			}
		} else {
			$ht = '<option value="">No Location Found</option>';
		}
		echo $ht;
	}
	function getCouse() {
		$id = $this->input->post('id');
		$res = $this->db->query("SELECT course_id,course_name FROM sm_course WHERE course_category = " . $id)->result();
		$ht = '<option value="">-- Select Course --</option>';
		if (is_array($res) && count($res) > 0) {
			foreach ($res as $r) {
				$ht .= '<option value="' . $r->course_id . '">' . $r->course_name . '</option>';
			}
		} else {
			$ht = '<option value="">No Course Found</option>';
		}
		echo $ht;
	}
	public function searchCourse() {
		try {
			$categoryshow = $this->input->post('categoryshow');
			$certificateshow = $this->input->post('certificateshow');
			$courseshow = $this->input->post('courseshow');
			$levelshow = $this->input->post('levelshow');
			$typeshow = $this->input->post('typeshow');

			$query = "SELECT * FROM sm_course WHERE status = '1'";
			if($categoryshow != '') {
				$query .=" AND course_category  = '".$categoryshow."' ";
			}
			if($certificateshow != '') {
				$query .=" AND certificate  = '".$certificateshow."' ";
			}
			if($courseshow != '') {
				$query .=" AND course_id  = '".$courseshow."' ";
			}
			if($levelshow != '') {
				$query .=" AND course_level  = '".$levelshow."' ";
			}
			if($typeshow != '') {
				$query .=" AND course_type  = '".$typeshow."' ";
			} else {
				$query .=" AND course_type  = 'Upcoming Courses' ";
			}
			$searchdata = $this->db->query($query)->result_array();
			$output = '';
			if(!empty($searchdata)) {
				foreach($searchdata as $row) {
					if(!empty($row['course_image']) && file_exists('uploads/courseimage/'.$row['course_image'])) {
						$courseimage= '<img src="'.base_url('uploads/courseimage/'.$row['course_image']).'" alt="" />';
					} else {
						$courseimage= '<img src="'.base_url('uploads/users/user.png').'" alt="" />';
					}
					$queryallcat = $this->db->query("SELECT * FROM sm_category WHERE category_id = '".$row['course_category']."'")->row();
					$category_name = $queryallcat->category_name;
					$output .= '<li><div class="list-box"><figure>'.$courseimage.'</figure><div class="all-content"><div class="hd-bt clearfix"><h3>'.$row['course_name'].'</h3></div><div class="price-view"><span>Price $'.$row['price'].'</span><span class="name-bt">'.$category_name.'</span></div><div class="contentView"><p>'.date('jS M `y', strtotime($row['course_startDate'])).' to '.date('jS M `y', strtotime($row['course_endDate'])).'</p></div><div class="both-bt"><a href="'.base_url().'courses/upcomingcoursedetails/'.$row['course_id'].'" class="button-default orange">Course Details</a><a href="'.base_url().'courses/payment" class="button-default orange">Book Now</a></div></div></div></div></li>';
				}
			} else {
				$output .= '<div class="emply-resume-list"><div class="emply-resume-thumb"><h2>No Data Found</h2></div></div>';
			}
			echo $output;
		} catch (\Throwable $th) {
			echo $th->getMessage();
		}
	}
	public function sendMessage() {
		try {
			$data['users_name'] = $this->input->post('users_name');
			$data['users_email'] = $this->input->post('users_email');
			$data['users_phno'] = $this->input->post('users_phno');
			$data['users_msg'] = $this->input->post('users_msg');
			$result = $this->db->insert('na_coure_request', $data);
			$insert_id = $this->db->insert_id();
			if(!empty($insert_id)) {
				$message = '<table align="center" border="0" cellpadding="0" cellspacing="0" width="550" bgcolor="white" style="border:2px solid black"> <tbody> <tr> <td align="center"> <table align="center" border="0" cellpadding="0" cellspacing="0" class="col-550" width="550"> <tbody> <tr> <td align="center" style="background-color: #ff9900; height: 50px;"> <a href="#" style="text-decoration: none;"> <p style="color:white; font-weight:bold;">Narrateme</p> </a> </td> </tr> </tbody> </table> </td> </tr> <tr style="height: 110px;"> <td align="center" style="border: none;border-bottom: 2px solid #ff9900;padding-right: 20px;padding-left:20px"> <p style="font-weight: bolder;font-size: 42px; letter-spacing: 0.025em; color:black;height: 0px;display: inline-block;">Hello Admin</p> <p>Check out the latest course related query</p> </td> </tr><tr style="display: inline-block;"> <td style="height: 150px; padding: 20px; border: none; border-bottom: 2px solid #361B0E; background-color: white;"> <p style="text-align: left; align-items: center;"> <b> Full Name:</b> '.$this->input->post('users_name').' </p> <p style="text-align: left; align-items: center;"> <b> Email Address:</b> '.$this->input->post('users_email').' </p> <p style="text-align: left; align-items: center;"> <b> Contact Number:</b> '.$this->input->post('users_phno').' </p> <p style="text-align: left; align-items: center;"> <b> Message:</b> '.$this->input->post('users_msg').' </p> </td> </tr><tr style="border: none; background-color: #ff9900; height: 40px; color:white; padding-bottom: 20px; text-align: center;"> <td height="40px" align="center"> <p style="color:white; line-height: 1.5em;"> Narrateme </p> <a href="#"  style="border:none; text-decoration: none; padding: 5px;"><i class="fa fa-twitter" aria-hidden="true"></i></a> <a href="#"  style="border:none; text-decoration: none; padding: 5px;"><i class="fa fa-linkedin" aria-hidden="true"></i></a><a href="#" style="border:none; text-decoration: none; padding: 5px;"><i class="fa fa-facebook" aria-hidden="true"></i></a> </td> </tr> </tbody></table>';
				require 'vendor/autoload.php';
				$mail = new PHPMailer(true);
				try {
					$mail->CharSet = 'UTF-8';
					$mail->SetFrom($this->input->post('users_email'), $this->input->post('users_name'));
					$mail->AddAddress('sayantan@goigi.in', 'Narrateme');
					$mail->IsHTML(true);
					$mail->Subject = 'Check out the latest course related query';
					$mail->Body = $message;
					$mail->IsSMTP();
					$mail->SMTPAuth   = true;
					$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
					$mail->Host       = "smtp-relay.brevo.com";
					$mail->Port       = 587; //587 465
					$mail->Username   = "goutampaul@goigi.in";
					$mail->Password   = "b7nNQ4Fk9XdAOcL3";
					$mail->send();
				} catch (Exception $e) {
					echo "Message could not be sent. Mailer Error: $mail->ErrorInfo";
				}
				echo "Thank you for submitting your request. our contact person will get in touch with you soon.";
			} else {
				echo "Something went wrong. Message could not be sent.";
			}
		} catch (\Throwable $th) {
			echo $th->getMessage();
		}
	}
}
?>