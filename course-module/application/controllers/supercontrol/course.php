<?php
class Course extends CI_Controller {
//============Constructor to call Model====================
	function __construct() {
		parent::__construct();
		//$this->load->model('coursemodel', 'cat');
		
		$this->load->helper('form');
		$this->load->library(array('form_validation','session'));
		if($this->session->userdata('is_logged_in')!=1){
			redirect('supercontrol/home', 'refresh');
		}
		$this->load->model('supercontrol/category_model','cat');
		$this->load->library('form_validation');
		$this->load->model('generalmodel');
		$this->load->model('supercontrol/instructor_model');
//*****************backtrace prevent*** START HERE*************************
$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
$this->output->set_header('Pragma: no-cache');

//*************backtrace prevent*** END HERE*************************
$this->load->library('image_lib');

}
//============Constructor to call Model====================
function index(){
	$data['categories'] = $this->cat->course_menu();
	$this->load->view('supercontrol/header',$data);
	$this->load->view('supercontrol/courseadd_view', $data);
	$this->load->view('supercontrol/footer');
}
//==============Show Add form for course add **** START HERE===============	
function add_course(){
	$table_name = 'sm_category';
	$primary_key = 'category_id !=';
	$wheredata='0';
	$queryallcat = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
	//$queryallcountry = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
	$data['allcat']=$queryallcat;
	$data['categories'] = $this->generalmodel->getCategories();
	 $data['cites'] = $this->generalmodel->getCities();
    //$data['cites'] = $this->generalmodel->getCites();
    $data['levels'] = $this->generalmodel->getlevel();
    $data['modes'] = $this->generalmodel->getMode();
    $data['locations'] = $this->generalmodel->getlocations();
    $data['country'] = $this->db->get('na_country')->result();     //   print_r($data['location']);die;
//echo $this->db->last_query();
	$data['title'] = "Add course";
	$this->load->view('supercontrol/header',$data);
	$this->load->view('supercontrol/courseadd_view');
	$this->load->view('supercontrol/footer');
}

//============= Show Add form for course add ****END HERE================
//==================Insert Page Data============
function add_my_course(){
	$my_date = date("Y-m-d", time()); 
	$config = array(
		'upload_path' => "uploads/courseimage/",
		'upload_url' => base_url() . "uploads/courseimage/",
		'allowed_types' => "gif|jpg|png|jpeg"
	);
	$this->load->library('upload', $config);
/*echo $this->upload->do_upload('userfile');
exit();*/
if (!$this->upload->do_upload('userfile')){
	$data = array(
		'course_name' => $this->input->post('course_name'),
		'course_category' => $this->input->post('course_category'),
		'price' => $this->input->post('price'),
		/*'cpd' => $this->input->post('cpd'),*/
		'course_type' => $this->input->post('course_type'),
		'certificate' => $this->input->post('certificate'),
		'entry_requirment' => $this->input->post('entry_requirment'),
		'who_should_apply' => $this->input->post('who_should_apply'),
		'add_date' => date('Y-m-d H:i:s'),
		'course_description' => $this->input->post('course_description'),
		'course_startDate' => date('Y-m-d',strtotime($this->input->post('start_date'))),
		'course_endDate' => date('Y-m-d',strtotime($this->input->post('end_date'))),
		'course_mode'=> $this->input->post('course_mode'),
		'course_level'=> $this->input->post('course_level'),
		'userid'=> $this->session->userdata('userid'),
	);
		$table_name = 'sm_course';
		$insertId = $this->generalmodel->insert_data($table_name, $data);
		$this->load->view('supercontrol/header',$data);
	    $data['success_msg'] = '<div class="alert alert-success text-center">Data Added Successfully!</div>';
		redirect('supercontrol/course/show_course','refresh');
		$this->load->view('supercontrol/footer');
}else{
	$data['userfile'] = $this->upload->data();
	$filename=$data['userfile']['file_name'];
	$table_name = 'sm_course';
	$data = array(
		'course_name' => $this->input->post('course_name'),
		'course_category' => $this->input->post('course_category'),
		'price' => $this->input->post('price'),
		/*'cpd' => $this->input->post('cpd'),*/
		'course_type' => $this->input->post('course_type'),
		'certificate' => $this->input->post('certificate'),
		'entry_requirment' => $this->input->post('entry_requirment'),
		'who_should_apply' => $this->input->post('who_should_apply'),
		'add_date' => date('Y-m-d H:i:s'),
		'course_description' => $this->input->post('course_description'),
		'course_image' => $filename,
		'course_startDate' => date('Y-m-d',strtotime($this->input->post('start_date'))),
		'course_endDate' => date('Y-m-d',strtotime($this->input->post('end_date'))),
		'course_mode'=> $this->input->post('course_mode'),
		'course_level'=> $this->input->post('course_level'),
		'userid'=> $this->session->userdata('userid'),

	);
  $this->generalmodel->insert_data($table_name,$data);
        $table_name = 'sm_course';
	$this->load->view('supercontrol/header',$data);
	$data['success_msg'] = '<div class="alert alert-success text-center">Data Added Successfully!</div>';
	 redirect('supercontrol/course/show_course','refresh');
	$this->load->view('supercontrol/footer');
}
}
//=====================Insert Page Data============

function add_instructor(){
	$queryinst = $this->instructor_model->show_member();
	$data['inst']=$queryinst;
	$querycourse = $this->instructor_model->show_course();
	$data['course']=$querycourse;
	$querymode = $this->instructor_model->show_mode();
	$data['mode']=$querymode;
//echo $this->db->last_query();
	$data['title'] = "Add Instructor";
	$this->load->view('supercontrol/header',$data);
	$this->load->view('supercontrol/instructoradd_view');
	$this->load->view('supercontrol/footer');
}

public function add_course_instructor(){
	$table_name='sm_course_instructor';
	$data = array(
		'course_id' => $this->input->post('course_idd'),
		'instructor_id' => $this->input->post('instructor_id'),
		'mode_id' => $this->input->post('mode_id'),
		'class_date' => date('Y-m-d',strtotime($this->input->post('class_date'))),
		'start_time' => date('H:i:s',strtotime($this->input->post('start_time'))),
		'end_time' => date('H:i:s',strtotime($this->input->post('end_time'))),
		'status' => '1'
	);
//echo "<pre>"; print_r($data); exit();
	$this->generalmodel->insert_data($table_name,$data);
	$this->session->set_flashdata('success', 'Data Added Successfully');
	redirect($_SERVER['HTTP_REFERER']);
}	

//===========Insertion Success message for News *** START HERE========
function success(){
	$data['h1title'] = 'Add course';
	$data['title'] = 'Add course';
	$this->load->view('supercontrol/header');
	$this->load->view('supercontrol/courseadd_view',$data);
	$this->load->view('supercontrol/footer');
}
//==================Insertion Success message *** END HERE=========	
//==================Show News List **** START HERE====================
function show_course(){
//Loading Database
	$table_name = 'sm_course';
	$primary_key = 'course_type';
	$wheredata = 'Upcoming Courses';
	//$queryallcat = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
	$user = $this->session->userdata('userid');
	$queryallcat = $this->db->get_where('sm_course',array('course_type'=>$wheredata,'userid'=>$user))->result();
	$data['eloca'] = $queryallcat;
	$data['title'] = "course List";
	$this->load->view('supercontrol/header',$data);
	$this->load->view('supercontrol/showcourselist',$data);
	$this->load->view('supercontrol/footer');
}

function comingsoon_course(){
	$table_name = 'sm_course';
	$primary_key = 'course_type';
	$wheredata = 'Coming Soon courses';
	$user = $this->session->userdata('userid');
	
	//$queryallcats = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
	$queryallcats = $this->db->get_where('sm_course',array('course_type'=>$wheredata,'userid'=>$user))->result();
	$data['elocal'] = $queryallcats;
	$data['title'] = "course List";
	$this->load->view('supercontrol/header',$data);
	$this->load->view('supercontrol/showcomingcourselist',$data);
	$this->load->view('supercontrol/footer');
}

function show_batch(){
	$table_name = 'sm_batch';
	$primary_key = 'batchId';
	$wheredata='';
	$queryallcat = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
	$data['eloca'] = $queryallcat;
	$data['title'] = "Batch List";
	$this->load->view('supercontrol/header',$data);
	$this->load->view('supercontrol/showbatchlist',$data);
	$this->load->view('supercontrol/footer');
}
function delete_batch() {
	$id = $this->uri->segment(4);
	$table_name = 'sm_course_lesion';
	$fieldname = 'lession_id';
	$action = 'delete';
	$this->generalmodel->show_data_id($table_name,$id,$fieldname,$action,'');
	$this->session->set_flashdata('delete_message','Batch Deleted Successfully');
	redirect('supercontrol/course/show_batch',TRUE);
}
function view_batch($id) {
	$id = $this->uri->segment(4); 
	$data['title'] = "View Batch";
	
	$data['lessdetails']=$this->generalmodel->fetch_all_join("Select * from sm_course_lesion where lession_id='$id'");
	
	$this->load->view('supercontrol/header',$data);
	$this->load->view('supercontrol/batch_view', $data);
	$this->load->view('supercontrol/footer');
}

function show_instructor(){
	$queryinst = $this->instructor_model->show_instructor();
	$data['inst']=$queryinst;
	$data['title'] = "course List";
	$this->load->view('supercontrol/header',$data);
	$this->load->view('supercontrol/showinstructorlist',$data);
	$this->load->view('supercontrol/footer');
}
//======================Show News List **** END HERE========================
//======================Status change **** START HERE========================
function statusnews (){
	$stat= $this->input->get('stat'); 
	$id= $this->input->get('id');   
	$this->load->model('news_model');
	$this->news_model->updt($stat,$id);
}

//=============Show Individual by Id for course *** START HERE==============
function show_course_id($id) {
	$id = $this->uri->segment(4); 
	$data['title'] = "Edit course";
	$table_name = 'sm_course';
	$primary_key = 'course_id';
	$wheredata=$id;
	$querycourse = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
	$data['course'] = $querycourse;
	$table_name = 'sm_category';
	$primary_key = 'category_id !=';
	$wheredata='0';
	$data['categories'] = $this->generalmodel->getCategories();
	 $data['cites'] = $this->generalmodel->getCities();
    //$data['cites'] = $this->generalmodel->getCites();
    $data['levels'] = $this->generalmodel->getlevel();
    $data['modes'] = $this->generalmodel->getMode();
	$queryallcat = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
	$data['allcat']=$queryallcat;
	
	$table_name = 'sm_mode';
			$primary_key = 'mode_status';
			$wheredata='1';
			$queryallmode = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
			$data['eallmode'] = $queryallmode;
	//	print_r($data['eallcat']);die;
	
	$table_name = 'sm_levels';
			$primary_key = 'level_status';
			$wheredata='1';
			$queryalllevel = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
			$data['ealllevel'] = $queryalllevel;
	//	print_r($data['eallcat']);die;
	
	
	$this->load->view('supercontrol/header',$data);
	$this->load->view('supercontrol/course_edit', $data);
	$this->load->view('supercontrol/footer');
}

function show_instructor_id($id) {
	$id = $this->uri->segment(4); 
	$data['title'] = "Edit Instructor";
	$table_name = 'sm_course_instructor';
	$primary_key = 'inst_id';
	$wheredata=$id;
	$querycourse = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
	$data['inst'] = $querycourse;

	$querycourse = $this->instructor_model->show_course();
	$data['course']=$querycourse;

	$querymode = $this->instructor_model->show_mode();
	$data['mode']=$querymode;

	$queryinst = $this->instructor_model->show_member();
	$data['instr']=$queryinst;

	$this->load->view('supercontrol/header',$data);
	$this->load->view('supercontrol/instructor_edit', $data);
	$this->load->view('supercontrol/footer');
}

function edit_instructor(){
	$data = array(			
		'course_id' => $this->input->post('course_idd'),
		'instructor_id' => $this->input->post('instructor_id'),
		'mode_id' => $this->input->post('mode_id'),
		'class_date' => date('Y-m-d',strtotime($this->input->post('class_date'))),
		'start_time' => date('H:i:s',strtotime($this->input->post('start_time'))),
		'end_time' => date('H:i:s',strtotime($this->input->post('end_time'))),
		'status' => $this->input->post('status')
	);
//echo "<pre>"; print_r($data); exit();
	$table_name = 'sm_course_instructor';
	$fieldname = 'inst_id';
	$id = $this->input->post('inst_id');
	$action = 'update';
	$this->generalmodel->show_data_id($table_name,$id,$fieldname,$action,$data);
	$data['title'] = "Instructor Edit";
	$this->session->set_flashdata('edit_message', 'Data Updated Successfully !!!');
	redirect('supercontrol/course/show_instructor');
}

function view_course($id) {
	$id = $this->uri->segment(4); 
	$data['title'] = "Edit course";
	//$table_name = 'course_lesion';
	///$primary_key = 'lession_ids';
	//$wheredata="course_id='$id";
	//$querycourse = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
	$data['couserdetails']=$this->generalmodel->fetch_all_join("Select * from sm_course where course_id='$id'");
	$querycourse =$this->generalmodel->fetch_all_join("Select * from sm_course_lesion where course_id='$id'");
	$data['course'] = $querycourse;
	$table_name = 'sm_category';
	$primary_key = 'parent_id !=';
	$wheredata='0';
	$queryallcat = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
	$data['allcat']=$queryallcat;
	$booking=$this->generalmodel->fetch_all_join("Select * from sm_course_booking where course_id='$id'");
	$data['allbook']=$booking;
	$this->load->view('supercontrol/header',$data);
	$this->load->view('supercontrol/course_view', $data);
	$this->load->view('supercontrol/footer');
}

//================Update Individual course***** START HERE ====================
function edit_course(){
	$course_image = $this->input->post('course_image');
	$config = array(
		'upload_path' => "uploads/courseimage/",
		'upload_url' => base_url() . "uploads/courseimage/",
		'allowed_types' => "gif|jpg|png|jpeg"
	);
	$this->load->library('upload', $config);
	if ($this->upload->do_upload("userfile")){
		@unlink("uploads/courseimage/".$course_image);
		$data['img'] = $this->upload->data();
		$data = array(			
			'course_name' => $this->input->post('course_name'),
			'course_category' => $this->input->post('course_category'),
			'price' => $this->input->post('price'),
			'course_type' => $this->input->post('course_type'),
			
			'certificate' => $this->input->post('certificate'),
			'entry_requirment' => $this->input->post('entry_requirment'),
			'course_description' => $this->input->post('course_description'),
			'course_startDate' => date('Y-m-d',strtotime($this->input->post('course_startDate'))),
			'course_endDate' => date('Y-m-d',strtotime($this->input->post('course_endDate'))),
			'course_mode'=> $this->input->post('course_mode'),
			'course_level'=> $this->input->post('course_level'),
			'course_image' => $data['img']['file_name']
		);
		//echo "<pre>"; print_r($data); exit();
	}else{
		$data = array(			
			'course_name' => $this->input->post('course_name'),
			'course_category' => $this->input->post('course_category'),
			'price' => $this->input->post('price'),
			'course_type' => $this->input->post('course_type'),
			'certificate' => $this->input->post('certificate'),
			'entry_requirment' => $this->input->post('entry_requirment'),
			'course_description' => $this->input->post('course_description'),
			'course_startDate' => date('Y-m-d',strtotime($this->input->post('course_startDate'))),
			'course_endDate' => date('Y-m-d',strtotime($this->input->post('course_endDate'))),
			'course_mode'=> $this->input->post('course_mode'),
			'course_level'=> $this->input->post('course_level'),
		);
		
	}
	$table_name = 'sm_course';
	$fieldname = 'course_id';
	$id = $this->input->post('course_id');
	$action = 'update';
	$this->generalmodel->show_data_id($table_name,$id,$fieldname,$action,$data);
	$data['title'] = "course Edit";
	$this->session->set_flashdata('edit_message', 'Data Updated Successfully !!!');
	redirect('supercontrol/course/show_course');
}
//==============Update Individual  course ***** END HERE====================
//=====================DELETE LOCATION====================
function delete_course() {
	$id = $this->uri->segment(4);
	$table_name = 'sm_course';
	$fieldname = 'course_id';
	$action = 'delete';
	$this->generalmodel->show_data_id($table_name,$id,$fieldname,$action,'');
	$this->session->set_flashdata('delete_message','Course Deleted Successfully');
	redirect('supercontrol/course/show_course',TRUE);
}

function delete_instructor() {
	$id = $this->uri->segment(4);
	$table_name = 'sm_course_instructor';
	$fieldname = 'inst_id';
	$action = 'delete';
	$this->generalmodel->show_data_id($table_name,$id,$fieldname,$action,'');
	$this->session->set_flashdata('delete_message','Data Deleted Successfully');
	redirect('supercontrol/course/show_instructor',TRUE);
}

//====================MULTIPLE DELETE=================
function delete_multiple(){
	$ids = ( explode( ',', $this->input->get_post('ids') ));
	$this->generalmodel->delete_mul($ids);
	$data4['msg1'] = '<div class="alert alert-success text-center"> Data successfully delete!!!</div>';
	$this->load->view('supercontrol/header');
	redirect('supercontrol/course/show_course',$data4);
	$this->load->view('supercontrol/footer');
}

function delete_multiple_inst(){
	$ids = (explode( ',', $this->input->get_post('ids') ));
	$this->instructor_model->delete_mul_inst($ids);
	$data4['msg1'] = '<div class="alert alert-success text-center"> Data successfully delete!!!</div>';
	$this->load->view('supercontrol/header');
	redirect('supercontrol/course/show_instructor',$data4);
	$this->load->view('supercontrol/footer');
}
//====================MULTIPLE DELETE=================
//======================Logout==========================
public function Logout(){
	$this->session->sess_destroy();
	redirect('supercontrol/login');
}
//======================Logout==========================

public function add_lesson(){
	$course_id=end($this->uri->segment_array());
	$data['title'] = "Add Lesson";
	$this->load->view('supercontrol/header',$data);
	$this->load->view('supercontrol/lessonaddview',$data);
	$this->load->view('supercontrol/footer',$data);
}

public function add_course_lesson(){
	$table_name='sm_course_lesion';
	$data = array(
		'course_id' => $this->input->post('course_id'),
		'type_id' => $this->input->post('course_type'),
		'start_date' => date('Y-m-d',strtotime($this->input->post('start_date'))),
		'start_time' => date('H:i:s',strtotime($this->input->post('start_time'))),
		'end_time' => date('H:i:s',strtotime($this->input->post('end_time')))
	);
//print_r($data);
//exit();
	$this->generalmodel->insert_data($table_name,$data);
	$this->session->set_flashdata('success', 'Data Added Successfully');
	redirect($_SERVER['HTTP_REFERER']);
}

public function lesson_list(){
	$course_id = end($this->uri->segment_array());
	$table_name = 'sm_course_lesion';
	$primary_key = 'course_id';
	$wheredata = $course_id;
	$queryallcat = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
	$data['llist'] = $queryallcat;
	$this->load->view('supercontrol/header',$data);
	$this->load->view('supercontrol/lessonlist');
	$this->load->view('supercontrol/footer');
}

public function delete_lesson(){
	$table_name = 'sm_course_lesion';
	$id = end($this->uri->segment_array());
	$fieldname = 'lession_id';
	$action='delete';
	$data='';
	$this->generalmodel->show_data_id($table_name,$id,$fieldname,$action,$data);
	$this->session->set_flashdata('success','Data Deleted Successfully');
	redirect($_SERVER['HTTP_REFERER']);
}

public function edit_lesson(){
	$id = end($this->uri->segment_array());
	$table_name = 'sm_course_lesion';
	$primary_key = 'lession_id';
	$wheredata = $id;
	$queryallcat = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
	$data['llist'] = $queryallcat;
	$this->load->view('supercontrol/header',$data);
	$this->load->view('supercontrol/editlesson');
	$this->load->view('supercontrol/footer');
}

function update_lesson(){
	$lession_id=$this->input->post('lession_id');
	$datalist = array(			
		'type_id' => $this->input->post('type_id'),
		'start_date' => date('Y-m-d',strtotime($this->input->post('start_date'))),
		'start_time' => date('H:i:s',strtotime($this->input->post('start_time'))),
		'end_time' => date('H:i:s',strtotime($this->input->post('end_time'))),
		'status' => $this->input->post('status')
	);
	$table_name = 'sm_course_lesion';
	$id = $this->input->post('lession_id');
	$fieldname = 'lession_id';
	$action='update';

//$this->generalmodel->delete_data($table_name,$fieldname,$id);
//$queryallcat = $this->generalmodel->delete_data($table_name,$fieldname,$id);
	$this->generalmodel->show_data_id($table_name,$id,$fieldname,$action,$datalist);

	$this->session->set_flashdata('success', 'Data Updated Successfully !!!');
	redirect($_SERVER['HTTP_REFERER']);
}

public function add_private(){
	$course_id=end($this->uri->segment_array());
	$data['title'] = "Add Private Booking";
	$this->load->view('supercontrol/header',$data);
	$this->load->view('supercontrol/privateaddview',$data);
	$this->load->view('supercontrol/footer',$data);
}

public function add_private_booking(){
	$this->form_validation->set_rules('price_per_hr','Price', 'required');
				$this->form_validation->set_rules('price_whole_course', 'Whole Price', 'required|min_length[1]');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				//===============+++++++++++++++++++++++===================
				if ($this->form_validation->run() == FALSE) {
					$this->load->view('supercontrol/header');
					$data['success_msg'] = '<div class="alert alert-success text-center">Some Fields Can Not Be Blank</div>';
					//$this->load->view('supercontrol/header');
	           		//$this->load->view('supercontrol/distanceadd_view',$data);
					//$this->load->view('supercontrol/footer');
					redirect('supercontrol/course/add_private',TRUE);
				}else{
	$table_name='sm_private_learning';
	$data = array(
		'course_id' => $this->input->post('course_id'),
		'price_per_hr' => $this->input->post('price_per_hr'),
		'price_whole_course' => $this->input->post('price_whole_course'),
		'add_date' => date('Y-m-d H:i:s'),
	);
	$this->generalmodel->insert_data($table_name,$data);
	$this->session->set_flashdata('success_add', 'Data Added Successfully');
	//redirect($_SERVER['HTTP_REFERER']);
	redirect('supercontrol/course/show_course',TRUE);
}
}

public function view_private(){
	$course_id=end($this->uri->segment_array());
//========================================
	$id = end($this->uri->segment_array());
	$table_name = 'sm_private_learning';
	$primary_key = 'course_id';
	$wheredata = $id;
	$queryallprivate = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
	$data['queryallprivate']=$queryallprivate;
//===============Course Name=================

	$id = end($this->uri->segment_array());
	$table_name = 'sm_course';
	$primary_key = 'course_id';
	$wheredata = $id;
	$queryallcourse = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
	$data['coursename'] = $queryallcourse[0]->course_name;
//========================================
//===============Course Name=================
	$data['title'] = "Private Booking List";
	$this->load->view('supercontrol/header',$data);
	$this->load->view('supercontrol/showprivatelist',$data);
	$this->load->view('supercontrol/footer',$data);
}

public function show_private_id(){
	$id = end($this->uri->segment_array());
	$table_name = 'sm_private_learning';
	$primary_key = 'private_id';
	$wheredata = $id;
	$query = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
	$data['plist'] = $query;
	$data['title'] = 'Edit Private Learning';
	$this->load->view('supercontrol/header',$data);
	$this->load->view('supercontrol/editprivate');
	$this->load->view('supercontrol/footer');
}

function update_private(){
	$datalist = array(			
		'price_per_hr' => $this->input->post('price_per_hr'),
		'price_whole_course' => $this->input->post('price_whole_course'),
	);
	$table_name = 'sm_private_learning';
	$id = $this->input->post('private_id');
	$fieldname = 'private_id';
	$action='update';
	$this->generalmodel->show_data_id($table_name,$id,$fieldname,$action,$datalist);
	$this->session->set_flashdata('success', 'Data Updated Successfully !!!');
	redirect($_SERVER['HTTP_REFERER']);
}

public function delete_private() {
	$id = $this->uri->segment(4);
	$table_name = 'sm_private_learning';
	$fieldname = 'private_id';
	$action = 'delete';
	$this->generalmodel->show_data_id($table_name,$id,$fieldname,$action,'');
	$this->session->set_flashdata('delete_message','Private Booking  Deleted Successfully');
	redirect($_SERVER['HTTP_REFERER']);
	//redirect('supercontrol/course/show_course',TRUE);
}

public function add_course_syllabus_view(){
	$id = end($this->uri->segment_array());
	$data['title'] = "Add Course Syllabus";
	$this->load->view('supercontrol/header',$data);
	$this->load->view('supercontrol/syllabusaddview',$data);
	$this->load->view('supercontrol/footer',$data);
}

public function add_course_syllabus(){
	$this->load->library('form_validation');
// Displaying Errors In Div
	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
// Validation For Address Field
	$this->form_validation->set_rules('syllabus_name', 'Syllabus Title', 'required|min_length[1]|max_length[50]');
	if ($this->form_validation->run() == FALSE){
		$id = end($this->uri->segment_array());
		$data['title'] = "Add Course Syllabus";
		$this->load->view('supercontrol/header',$data);
		$this->load->view('supercontrol/syllabusaddview',$data);
		$this->load->view('supercontrol/footer',$data);
	}else{
		$table_name='sm_syllabus';
		$data = array(
			'course_id' => $this->input->post('course_id'),
			'syllabus_name' => $this->input->post('syllabus_name'),
			's_order' => $this->input->post('s_order'),
			'syllabus_content' => $this->input->post('syllabus_content'),
			'status' =>'1'
		);
		$this->generalmodel->insert_data($table_name,$data);
		$this->session->set_flashdata('success', 'Data Added Successfully');
		redirect($_SERVER['HTTP_REFERER']);
	}
}

public function syllabus_list(){
	$id = end($this->uri->segment_array());
	$querysyllabus = $this->generalmodel->getAllData('sm_syllabus','course_id',$id,'','');
	$data['syllabuslist'] = $querysyllabus;

	$data['title'] = "Course Syllabus List";
	$this->load->view('supercontrol/header',$data);
	$this->load->view('supercontrol/showsyllabuslist',$data);
	$this->load->view('supercontrol/footer',$data);
}

public function edit_syllabus_view()
{
	$id = end($this->uri->segment_array());
	$table_name = 'sm_syllabus';
	$primary_key = 'syllabus_id';
	$wheredata = $id;
	$query = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
	$data['slist'] = $query;

	$data['title'] = "Edit Course Syllabus";
	$this->load->view('supercontrol/header',$data);
	$this->load->view('supercontrol/editsyllabus',$data);
	$this->load->view('supercontrol/footer',$data);
}

public function edit_syllabus()
{
	$table_name = 'sm_syllabus';
	$id = $this->input->post('syllabus_id');
	$fieldname = 'syllabus_id';
	$action='update';
	$datalist = array(
		'syllabus_name' => $this->input->post('syllabus_name'),
		's_order' => $this->input->post('s_order'),
		'syllabus_content' => $this->input->post('syllabus_content'),
		'status' =>$this->input->post('status')
	);
	$this->generalmodel->show_data_id($table_name,$id,$fieldname,$action,$datalist);

	$this->session->set_flashdata('success', 'Data Updated Successfully !!!');
	redirect('supercontrol/course/syllabus_list/'.$this->input->post('course_id').'','refresh');
}

public function delete_syllabus()
{
	$id = end($this->uri->segment_array());
	$this->generalmodel->show_data_id('syllabus',$id,'syllabus_id','delete','');
	$this->session->set_flashdata('success','Data Deleted Successfully');
	redirect($_SERVER['HTTP_REFERER']);
}

function add_course_clone1 ($id) 
{
    $id = end($this->uri->segment_array());
	$table_name = 'sm_course';
	$primary_key = 'course_id';
	$wheredata = $id;
	$queryallcourse = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
	
   $queryallcourse = $this->db->get($table_name);

    foreach ($queryallcourse->result() as $row){   
       foreach($row as $key=>$val){        
          if($key != $primary_key){ 
          
          $this->db->set($key, $val);               
          }//endif              
       }//endforeach
    }//endforeach
    
    return $this->db->insert($table_name); 
}

function add_course_clone ($id) 
{
    $sql = "INSERT INTO sm_course (	course_name, course_category, course_country, course_city, price, add_date, course_description, course_image, status, certificate, entry_requirment, who_should_apply, course_startDate, course_endDate, course_mode, course_level, course_type) SELECT course_name, course_category, course_country, course_city, price, add_date, course_description, course_image, status, certificate, entry_requirment, who_should_apply, course_startDate, course_endDate, course_mode, course_level, course_type FROM sm_course WHERE course_id = ".$id;
    $res = $this->db->query($sql);
    $ide = $this->db->insert_id();
    
    $sql2 = "INSERT INTO sm_syllabus ( course_id, syllabus_name, syllabus_content, s_order, status ) SELECT ".$ide.", syllabus_name, syllabus_content, s_order, status FROM sm_syllabus WHERE course_id = ".$id;
    $this->db->query($sql2);
    
    $sql1 = "INSERT INTO sm_batch ( courseId, total_hour, total_session,created,status ) SELECT ".$ide.",  total_hour, total_session ,created,status FROM sm_batch WHERE courseId = ".$id;
    $this->db->query($sql1);
    $query = $this->db->query("SELECT batchId FROM sm_batch WHERE courseId = ".$id)->row();
    $idbat = $this->db->insert_id();
    
    $sql3 = "INSERT INTO sm_course_sessions (batch_id, date, starttime, endtime, time_type, session_objective, session_location, created_at, course_country, course_city ) SELECT ".$idbat.", date, starttime, endtime, time_type, session_objective, session_location, created_at, course_country, course_city FROM sm_course_sessions WHERE batch_id = ".$query->batchId;
    $this->db->query($sql3);
    
    $sql4 = "INSERT INTO sm_training_material ( course_id, training_material_name, training_material_files, s_order, status ) SELECT ".$ide.", training_material_name, training_material_files, s_order, status FROM sm_training_material  WHERE course_id = ".$id;
    $this->db->query($sql4);
    
    $this->session->set_flashdata('success_add', 'Data Added Successfully');
	redirect('supercontrol/course/show_course',TRUE);
    
}


function add_course_clone_coming_soon ($id) 
{
    $sql = "INSERT INTO sm_course (	course_name, course_category, course_country, course_city, price, add_date, course_description, course_image, status, certificate, entry_requirment, who_should_apply, course_startDate, course_endDate, course_mode, course_level, course_type) SELECT course_name, course_category, course_country, course_city, price, add_date, course_description, course_image, status, certificate, entry_requirment, who_should_apply, course_startDate, course_endDate, course_mode, course_level, course_type FROM sm_course WHERE course_id = ".$id;
    $res = $this->db->query($sql);
    $ide = $this->db->insert_id();
    
    $sql1 = "INSERT INTO sm_syllabus ( course_id, syllabus_name, syllabus_content, s_order, status ) SELECT ".$ide.", syllabus_name, syllabus_content, s_order, status FROM sm_syllabus WHERE course_id = ".$id;
    $this->db->query($sql1);

    $sql2 = "INSERT INTO sm_training_material ( course_id, training_material_name, training_material_files, s_order, status ) SELECT ".$ide.", training_material_name, training_material_files, s_order, status FROM sm_syllabus WHERE course_id = ".$id;
    $this->db->query($sql2);
    
    $this->session->set_flashdata('success_add', 'Data Added Successfully');
	redirect('supercontrol/course/comingsoon_course',TRUE);

}

public function add_course_session_view(){
	$id = end($this->uri->segment_array());
	$data['categories'] = $this->generalmodel->getCategories();
	$data['locations'] = $this->generalmodel->getlocations();
	$data['title'] = "Add Course Syllabus";
	$this->load->view('supercontrol/header',$data);
	$this->load->view('supercontrol/batchadd_view',$data);
	$this->load->view('supercontrol/footer',$data);
}

public function add_course_trainingmaterial_view(){
	$id = end($this->uri->segment_array());
	$data['title'] = "Add Training Material ";
	$this->load->view('supercontrol/header',$data);
	$this->load->view('supercontrol/trainingmaterialaddview',$data);
	$this->load->view('supercontrol/footer',$data);
}

public function add_course_trainingmaterial(){
	$this->load->library('form_validation');
	$config = array(
		'upload_path' => "uploads/trainingmaterial/",
		'upload_url' => base_url() . "uploads/trainingmaterial/",
		'file_name' => time().str_replace(' ', '_', $_FILES['training_material_files']['name']),
		'allowed_types' => "pdf|doc|docx"
		 
	);
	$this->load->library('upload', $config);
	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	$this->form_validation->set_rules('training_material_name', 'Training Material Title', 'required|min_length[1]|max_length[50]');
	if ($this->form_validation->run() == FALSE){
		$id = end($this->uri->segment_array());
		$data['title'] = "Add Course Training Material";
		$this->load->view('supercontrol/header',$data);
		$this->load->view('supercontrol/trainingmaterialaddview',$data);
		$this->load->view('supercontrol/footer',$data);
	}else{
	   // print_r($_FILES);die;
	     	$table_name='sm_training_material';
	     	if($this->upload->do_upload('training_material_files')){
			$data['userfile'] = $this->upload->data();
        	$config['file_name']  = time().str_replace(' ', '_', $_FILES['training_material_files']['name']);
	     	}
	     	$filename=$data['userfile']['file_name'];
		$data = array(
			'course_id' => $this->input->post('course_id'),
			'training_material_name' => $this->input->post('training_material_name'),
			'training_material_files' => $filename,
			's_order' => '1',
			'status' =>'1'
		);
		 //print_r($data);die;

		$this->generalmodel->insert_data($table_name,$data);
		$this->session->set_flashdata('success', 'Data Added Successfully');
		redirect($_SERVER['HTTP_REFERER']);
	}
}

public function trainingmaterial_list(){
	$id = end($this->uri->segment_array());
	$querysyllabus = $this->generalmodel->getAllData('sm_training_material','course_id',$id,'','');
	$data['syllabuslist'] = $querysyllabus;

	$data['title'] = "Course Training Material List";
	$this->load->view('supercontrol/header',$data);
	$this->load->view('supercontrol/showtrainingmateriallist',$data);
	$this->load->view('supercontrol/footer',$data);
}

public function edit_trainingmaterial_view()
{
	$id = end($this->uri->segment_array());
	$table_name = 'sm_training_material';
	$primary_key = 'training_material_id';
	$wheredata = $id;
	$query = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
	$data['slist'] = $query;

	$data['title'] = "Edit Course Training Material";
	$this->load->view('supercontrol/header',$data);
	$this->load->view('supercontrol/edittrainingmaterial',$data);
	$this->load->view('supercontrol/footer',$data);
}

public function edit_trainingmaterial()
{
    
    $training_material_files = $this->input->post('training_material_files');
			 $config = array(
		'upload_path' => "uploads/trainingmaterial/",
		'upload_url' => base_url() . "uploads/trainingmaterial/",
		'file_name' => time().str_replace(' ', '_', $_FILES['training_material_files']['name']),
		'allowed_types' => "pdf|doc|docx"
		 
	);
			$this->load->library('upload', $config);
			
				@unlink("uploads/trainingmaterial/".$training_material_files);
				$data['training_material_files'] = $this->upload->data();  
				
	$table_name = 'sm_training_material';
	$id = $this->input->post('training_material_id');
	$fieldname = 'training_material_id';
	$action='update';
		if($this->upload->do_upload('training_material_files')){
			$data['userfile'] = $this->upload->data();
        	
	     	}
	     	$filename=$data['userfile']['file_name'];
	  //print_r($_FILES);die;
	$datalist = array(
		'training_material_name' => $this->input->post('training_material_name'),
		'training_material_files' => $data['training_material_files']['file_name'],
		's_order' => '1',
		'status' =>'1'
	);
//	$training_material_files = $this->input->post('training_material_files');
//	print_r($datalist);die;
	$this->generalmodel->show_data_id($table_name,$id,$fieldname,$action,$datalist);

	$this->session->set_flashdata('success', 'Data Updated Successfully !!!');
	redirect('supercontrol/course/trainingmaterial_list/'.$this->input->post('course_id').'','refresh');
}

public function delete_trainingmaterial()
{
	$id = end($this->uri->segment_array());
	$this->generalmodel->show_data_id('training_material',$id,'training_material_id','delete','');
	$this->session->set_flashdata('success','Data Deleted Successfully');
	redirect($_SERVER['HTTP_REFERER']);
}
public function course_session_list(){
	$id = end($this->uri->segment_array());
	$data['batchlist'] = $batchlist = $this->db->get_where('sm_batch',array('courseId'=>$id))->row();
		$batchId = $batchlist->batchId;
		$data['batchSession'] = $session = $this->db->get_where('sm_course_sessions',array('batch_id'=>$batchId))->result();
		$data['locations'] = $this->generalmodel->getlocations();
//	print_r($data['batchSession']);die;

	$data['title'] = "Course Syllabus List";
	$this->load->view('supercontrol/header',$data);
	$this->load->view('supercontrol/showcoursesessionlist',$data);
	$this->load->view('supercontrol/footer',$data);
}

public function session_view(){
	//$id = end($this->uri->segment_array());
	$table_name = 'sm_batch';
	$primary_key = '';
	$wheredata = "";
	$data['batchlists'] = $batchlist = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
	$batchId = $batchlists->batchId;
	$data['batchSessionlist'] = $session_list = $this->db->get_where('course_sessions',array('batch_id'=>$batchId))->result();
	//print_r($data['batchSessionlist']);die;
		$data['locations'] = $this->generalmodel->getlocations();
	$data['title'] = "Course Syllabus List";
	$this->load->view('supercontrol/header',$data);
	$this->load->view('supercontrol/showsessionlist',$data);
	$this->load->view('supercontrol/footer',$data);
}
public function edit_coursesession_view()
{
    		$id = $this->uri->segment(4); 
    		$data['lessdetails']=$this->generalmodel->fetch_all_join("Select * from sm_batch where batchId='$id'");
        	$data['batchSessionlist'] = $session_list = $this->db->get_where('sm_course_sessions',array('batch_id'=>$id))->result();
    		$data['categories'] = $this->generalmodel->getCategories();
    		$data['locations'] = $this->generalmodel->getlocations();
        	$data['cites'] = $this->generalmodel->getCities();
            //$data['cites'] = $this->generalmodel->getCites();
            $data['levels'] = $this->generalmodel->getlevel();
            $data['modes'] = $this->generalmodel->getMode();
        	$data['title'] = "Edit Course Session";
        	$this->load->view('supercontrol/header',$data);
        	$this->load->view('supercontrol/editcoursesession',$data);
        	$this->load->view('supercontrol/footer',$data);
    }
}
?>
