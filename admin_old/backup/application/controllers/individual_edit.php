<?php
class Individual_edit extends CI_Controller {
	//============Constructor to call Model====================
		function __construct() {
			parent::__construct();
		}
	//============Constructor to call Model====================
		function index(){
			if($this->session->userdata('is_logged_in')){ 
			$this->load->view('memberadd_view');
			$this->load->view('footer');
			}else{
               redirect('login');
            }
		}
  		//================Show Individual by Id=================
		function show_individual_id($id) {
			$data['title'] = "Member Edit";
			$this->load->database();

			//Calling Model
			$this->load->model('individual_edit_model');

			$query = $this->individual_edit_model->show_award_data($id);
			$data['award'] = $query;
			$data['title'] = "Edit Award";
			
			$query = $this->individual_edit_model->show_drug_data($id);
			$data['drug'] = $query;
			$data['title'] = "Edit Drug";
			
			$query = $this->individual_edit_model->show_institute_data($id);
			$data['institute'] = $query;
			$data['title'] = "Edit Institute";
			
			$query = $this->individual_edit_model->show_rehabilitation_data($id);
			$data['rehabilitation'] = $query;
			$data['title'] = "Edit Rehabilitation";
			
			$query = $this->individual_edit_model->show_teacher_data($id);
			$data['teacher'] = $query;
			$data['title'] = "Edit Teacher";
			
			$query = $this->individual_edit_model->show_recomendation_data($id);
			$data['recomendation'] = $query;
			$data['title'] = "Edit Recomendation";
			
			$query = $this->individual_edit_model->show_extra_data($id);
			$data['extra'] = $query;
			$data['title'] = "Edit Extracurriculam";
			
			$query = $this->individual_edit_model->show_job_data($id);
			$data['job'] = $query;
			$data['title'] = "Edit Job";
			
			$query = $this->individual_edit_model->show_coach_data($id);
			$data['coach'] = $query;
			$data['title'] = "Edit Coach";
			
			$query = $this->individual_edit_model->show_video_data($id);
			$data['videop'] = $query;
			$data['title'] = "Edit Video Presentation";

			$this->load->view('header',$data);
			$this->load->view('individual_edit', $data);
			$this->load->view('footer');
		}
   		//================Show Individual by Id=================

  	 	//================Update Award ====================
			function edit_award(){
			$this->load->model('individual_edit_model');
			$data = array(
				'award_name' => mysql_real_escape_string(stripcslashes($this->input->post('award_name'))),
				'award_date' => date('y-m-d',strtotime($this->input->post('award_date'))),
				'award_description' => mysql_real_escape_string(stripcslashes($this->input->post('award_description'))),
				'status' => 1
			);
			$id=$this->input->post('id');
			$this->individual_edit_model->edit_award($data,$id);
			$data1['message'] = 'Data Inserted Successfully';
			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indad');
		 }
		//================Update Award ====================
		
		//================Update Drug====================
		function edit_drug(){
			$this->load->model('individual_edit_model');
			$data = array(
				'drug_name' => mysql_real_escape_string(stripcslashes($this->input->post('drug_name'))),
				'drug_date' => date('y-m-d',strtotime($this->input->post('drug_date'))),
				'reason' => mysql_real_escape_string(stripcslashes($this->input->post('reason'))),
				'outcome' => mysql_real_escape_string(stripcslashes($this->input->post('outcome'))),
				'status' => 1
			);
			$id=$this->input->post('id');
			$this->individual_edit_model->edit_drug($data,$id);
			$data1['message'] = 'Data Inserted Successfully';
			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/inddr');
		 }
		//================Update Drug====================
		
		//================Update Institute====================
		function edit_institute(){
			$this->load->model('individual_edit_model');
			$data = array(
				'institute_name' => mysql_real_escape_string(stripcslashes($this->input->post('institute_name'))),
				'description' => mysql_real_escape_string(stripcslashes($this->input->post('description'))),
				'school_bulletin' => mysql_real_escape_string(stripcslashes($this->input->post('school_bulletin'))),
				'instructor' => mysql_real_escape_string(stripcslashes($this->input->post('instructor'))),
				'address' => mysql_real_escape_string(stripcslashes($this->input->post('address'))),
				'tel_no' => mysql_real_escape_string(stripcslashes($this->input->post('tel_no'))),
				'email' => mysql_real_escape_string(stripcslashes($this->input->post('email'))),
				'sms_no' => mysql_real_escape_string(stripcslashes($this->input->post('sms_no'))),
				'ip_address' => mysql_real_escape_string(stripcslashes($this->input->post('ip_address'))),
				'website' => mysql_real_escape_string(stripcslashes($this->input->post('website'))),
				'domain_name' => mysql_real_escape_string(stripcslashes($this->input->post('domain_name'))),
				'url' => mysql_real_escape_string(stripcslashes($this->input->post('url'))),
				'learning_portal' => mysql_real_escape_string(stripcslashes($this->input->post('learning_portal'))),
				'schools' => mysql_real_escape_string(stripcslashes($this->input->post('schools'))),
				'status' => 1
			);
			$id=$this->input->post('id');
			$this->individual_edit_model->edit_institute($data,$id);
			$data1['message'] = 'Data Inserted Successfully';
			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indins');
		 }
		//================Update Institute====================
		
		//================Update Rehabilitation====================
		function edit_rehabilitation(){
			$this->load->model('individual_edit_model');
			$data = array(
				'rehab_name' => mysql_real_escape_string(stripcslashes($this->input->post('rehab_name'))),
				'rehab_date' => date('y-m-d',strtotime($this->input->post('rehab_date'))),
				'description' => mysql_real_escape_string(stripcslashes($this->input->post('description'))),
				'outcome' => mysql_real_escape_string(stripcslashes($this->input->post('outcome'))),
				'status' => 1
			);
			$id=$this->input->post('id');
			$this->individual_edit_model->edit_rehabilitation($data,$id);
			$data1['message'] = 'Data Inserted Successfully';
			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indreh');
		 }
		//================Update Rehabilitation====================
		
		//================Update Teacher====================
		function edit_teacher(){
			$this->load->model('individual_edit_model');
			$data = array(
				'teacher_name' => mysql_real_escape_string(stripcslashes($this->input->post('teacher_name'))),
				'phone' => mysql_real_escape_string(stripcslashes($this->input->post('phone'))),
				'email' => mysql_real_escape_string(stripcslashes($this->input->post('email'))),
				'learning_portal' => mysql_real_escape_string(stripcslashes($this->input->post('learning_portal'))),
				'academic_program' => mysql_real_escape_string(stripcslashes($this->input->post('academic_program'))),
				'course' => mysql_real_escape_string(stripcslashes($this->input->post('course'))),
				'status' => 1
			);
			$id=$this->input->post('id');
			$this->individual_edit_model->edit_teacher($data,$id);
			$data1['message'] = 'Data Inserted Successfully';
			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indtea');
		 }
		//================Update Teacher====================
		
		//================Update Recomendation====================
		function edit_recomendation(){
			$this->load->model('individual_edit_model');
			$data = array(
				'recomendation_person' => mysql_real_escape_string(stripcslashes($this->input->post('recomendation_person'))),
				'recomendation' => mysql_real_escape_string(stripcslashes($this->input->post('recomendation'))),
				'rec_video_link' => mysql_real_escape_string(stripcslashes($this->input->post('rec_video_link'))),
				'status' => 1
			);
			$id=$this->input->post('id');
			$this->individual_edit_model->edit_recomendation($data,$id);
			$data1['message'] = 'Data Inserted Successfully';
			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indrec');
		 }
		//================Update Recomendation====================
		
		//================Update Extra====================
		function edit_extra(){
			$this->load->model('individual_edit_model');
			$data = array(
				'activity_name' => mysql_real_escape_string(stripcslashes($this->input->post('activity_name'))),
				'from_date' => date('y-m-d',strtotime($this->input->post('from_date'))),
				'activity_description' => mysql_real_escape_string(stripcslashes($this->input->post('activity_description'))),
				'status' => 1
			);
			$id=$this->input->post('id');
			$this->individual_edit_model->edit_extra($data,$id);
			$data1['message'] = 'Data Inserted Successfully';
			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indext');
		 }

		//================Update Extra====================
		
		//================Update Extra====================
		function edit_job(){
			$this->load->model('individual_edit_model');
			$data = array(
				'employer_name' => mysql_real_escape_string(stripcslashes($this->input->post('employer_name'))),
				'from_date' => date('y-m-d',strtotime($this->input->post('from_date'))),
				'to_date' => date('y-m-d',strtotime($this->input->post('to_date'))),
				'position' => mysql_real_escape_string(stripcslashes($this->input->post('position'))),
				'job_description' => mysql_real_escape_string(stripcslashes($this->input->post('job_description'))),
				'status' => 1
			);
			$id=$this->input->post('id');
			$this->individual_edit_model->edit_job($data,$id);
			$data1['message'] = 'Data Inserted Successfully';
			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indjob');
		 }

		//================Update Extra====================
		
		//================Update Coach====================
		function edit_coach(){
			$this->load->model('individual_edit_model');
			$data = array(
				'coach_name' => mysql_real_escape_string(stripcslashes($this->input->post('coach_name'))),
				'description' => mysql_real_escape_string(stripcslashes($this->input->post('description'))),
				'sample' => mysql_real_escape_string(stripcslashes($this->input->post('sample'))),
				'phone' => mysql_real_escape_string(stripcslashes($this->input->post('phone'))),
				'email' => mysql_real_escape_string(stripcslashes($this->input->post('email'))),
				'status' => 1
			);
			$id=$this->input->post('id');
			$this->individual_edit_model->edit_coach($data,$id);
			$data1['message'] = 'Data Inserted Successfully';
			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indcoa');
		 }

		//================Update Coach====================
		
		//================Update Video Presentation====================
		function edit_video(){
			$this->load->model('individual_edit_model');
			$data = array(
				'video_date' => date('y-m-d',strtotime($this->input->post('video_date'))),
				'description' => mysql_real_escape_string(stripcslashes($this->input->post('description'))),
				'link_rec_video' => mysql_real_escape_string(stripcslashes($this->input->post('link_rec_video'))),
				'ip_live_cam' => mysql_real_escape_string(stripcslashes($this->input->post('ip_live_cam'))),
				'comments' => mysql_real_escape_string(stripcslashes($this->input->post('comments'))),
				'status' => 1
			);
			$id=$this->input->post('id');
			$this->individual_edit_model->edit_video($data,$id);
			$data1['message'] = 'Data Inserted Successfully';
			redirect('userprofile/show_user/'.$this->input->post('ind_id').'/indvid');
		 }

		//================Update Video Presentation====================
}
?>
