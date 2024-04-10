<?php
class Member extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('member_model');
	}
	function index()
	{
		if ($this->session->userdata('is_logged_in')) {
			$this->load->model('member_model');
			$this->load->helper('string');
			$querycoun = $this->member_model->get_country();
			$data['ecntr'] = $querycoun;
			$data['title'] = "Add Member";
			$this->load->view('include/header', $data);
			$this->load->helper(array('form'));
			$this->load->view('member/memberadd_view');
			$this->load->view('include/footer');
		} else {
			redirect('login');
		}
	}
	public function is_logged_in()
	{
		header("cache-Control: no-store, no-cache, must-revalidate");
		header("cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		$is_logged_in = $this->session->userdata('logged_in');
		if (!isset($is_logged_in) || $is_logged_in !== TRUE) {
			redirect('main');
		}
	}
	function add_member()
	{
		$this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[1]|max_length[25]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[1]|max_length[25]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[1]|is_unique[na_member.email]');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[1]|is_unique[na_member.username]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Add Member";
			$this->load->view('include/header', $data);
			$this->load->view('member/memberadd_view');
			$this->load->view('include/footer');
		} else {
			$email = $this->input->post('email');
			$querycheck = $this->member_model->checkuser($email);
			$userlink = rand(000000, 999999);
			$ind = @$this->input->post('ind');
			$std = @$this->input->post('std');
			$edu = @$this->input->post('edu');
			$fac = @$this->input->post('fac');
			if (!$ind) {
				$ind = '';
			}
			if (!$std) {
				$std = '';
			}
			if (!$edu) {
				$edu = '';
			}
			if (!$fac) {
				$fac = '';
			}
			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'address' => $this->input->post('address'),
				'city' => $this->input->post('city'),
				'state' => $this->input->post('state'),
				'zip_code' => $this->input->post('zip_code'),
				'phone_no' => $this->input->post('phone_no'),
				'email' => $this->input->post('email'),
				'text_no' => $this->input->post('text_no'),
				'website' => $this->input->post('website'),
				'domain_name' => $this->input->post('domain_name'),
				'url' => $this->input->post('url'),
				'username' => $this->input->post('username'),
				'password' => base64_encode($this->input->post('password')),
				'ind' => $ind,
				'std' => $std,
				'edu' => $edu,
				'fac' => $fac,
				'userlink' => $userlink,
				'status' => 1
			);
			$this->member_model->insert_member($data);
			$data1['message'] = 'Data Inserted Successfully';
			redirect('member/success');
		}
	}
	function success()
	{
		$data['h1title'] = 'Data Inserted Successfully';
		$data['title'] = 'Add Individual';
		$this->load->view('include/header');
		$this->load->view('member/memberadd_view', $data);
		$this->load->view('include/footer');
	}
	function view_member()
	{
		$this->load->database();
		$this->load->model('member_model');
		$query = $this->member_model->view_member();
		$data['ecms'] = $query;
		$data['title'] = "Member Data List";
		$this->load->view('include/header', $data);
		$this->load->view('member/showmember');
		$this->load->view('include/footer');
	}
	function show_member_id($id)
	{
		$data['title'] = "Member Edit";
		$this->load->database();
		$this->load->model('member_model');
		$query = $this->member_model->show_member_id($id);
		$data['ecms'] = $query;
		$this->load->view('include/header', $data);
		$this->load->view('member/memberedit', $data);
		$this->load->view('include/footer');
	}
	function edit_member()
	{
		$datalist = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'address' => $this->input->post('address'),
			'city' => $this->input->post('city'),
			'state' => $this->input->post('state'),
			'zip_code' => $this->input->post('zip_code'),
			'phone_no' => $this->input->post('phone_no'),
			'email' => $this->input->post('email'),
			'text_no' => $this->input->post('text_no'),
			'website' => $this->input->post('website'),
			'status' => $this->input->post('status')
		);
		$id = $this->input->post('id');
		$data['title'] = "Individual Edit";
		$this->load->database();
		$this->load->model('individual_model');
		$query = $this->member_model->edit_member($id, $datalist);
		$data['message'] = 'Data Updated Successfully';
		$this->session->set_flashdata('Updateprofile', 'Profile Updated Successfully');
		redirect('userprofile/show_user/' . $id . '/udp');
	}
	function edit_avatar()
	{
		$id = $this->input->post('id');
		if ($_FILES["userimage"]["name"] != '') {
			$imgname = $_FILES["userimage"]["name"];
			$this->db->where('id', $id);
			$this->db->select('userimage');
			$result = $this->db->get('na_member');
			$row = $result->row();
			$path = './useravatar/' . $row->banner_image;
			unlink($path);
			$config['upload_path'] = './useravatar/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = $imgname;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload($imgname)) {
				$error = array('error' => $this->upload->display_errors());
			} else {
				$upload_data = $this->upload->data();
			}
		} else {
			$imgname = $this->input->post('oldimg');
		}
		$datalist = array(
			'userImage' => $imgname
		);
		$data['title'] = "Banner Edit";
		$this->load->database();
		$this->load->model('member_model');
		$query = $this->member_model->edit_avatar($id, $datalist);
		$data1['message'] = 'Data Updated Successfully';
		redirect('banner/successupdate');
	}
	function successupdate()
	{
		$this->load->database();
		$this->load->model('individual_model');
		$query = $this->member_model->view_member();
		$data['ecms'] = $query;
		$data['title'] = "Member Data List";
		$datamsg['h1title'] = 'Data Updated Successfully';
		$this->load->view('include/header', $data);
		$this->load->view('member/showmember', $datamsg);
		$this->load->view('include/footer');
	}
	function delete_member($id)
	{
		$this->load->database();
		$this->member_model->delete_member($id);
		$data1['message'] = 'Data Inserted Successfully';
		redirect('member/successdelete');
	}
	function successdelete()
	{
		$this->load->database();
		$this->load->model('member_model');
		$query = $this->member_model->view_member();
		$data['ecms'] = $query;
		$data['title'] = "Member Data List";
		$datamsg['h1title'] = 'Data Updated Successfully';
		$this->load->view('include/header', $data);
		$this->load->view('member/showmember');
		$this->load->view('include/footer');
	}
	function add_drug_view()
	{
		if ($this->session->userdata('is_logged_in')) {
			$data['title'] = "Add Drug";
			$this->load->view('include/header', $data);
			$this->load->view('drug/drugadd_view');
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	function add_drug()
	{
		if ($this->session->userdata('is_logged_in')) {
			$this->form_validation->set_rules('drug_name', 'Drug Name', 'required|min_length[1]|max_length[50]');
			$this->form_validation->set_rules('drug_date', 'Drug Date', 'required|min_length[1]|max_length[12]');
			$this->form_validation->set_rules('outcome', 'Outcome', 'required|min_length[1]|max_length[50]');
			if ($this->form_validation->run() == FALSE) {
				$data['title'] = "Add Drug";
				$this->load->view('include/header', $data);
				$this->load->view('drug/drugadd_view');
				$this->load->view('include/footer');
			} else {
				$data = array(
					'drug_name' => mysql_real_escape_string(stripcslashes($this->input->post('drug_name'))),
					'drug_date' => date('y-m-d', strtotime($this->input->post('drug_date'))),
					'reason' => mysql_real_escape_string(stripcslashes($this->input->post('reason'))),
					'outcome' => mysql_real_escape_string(stripcslashes($this->input->post('outcome'))),
					'ind_id' => $this->input->post('ind_id'),
					'status' => 1
				);
				$this->member_model->insert_drug($data);
				$data1['message'] = 'Data Inserted Successfully';
				redirect('member/view_member/drs');
			}
		} else {
			redirect('main');
		}
	}
	function view_drug()
	{
		if ($this->session->userdata('is_logged_in')) {
			$this->load->database();
			$this->load->model('member_model');
			$query = $this->member_model->get_drug();
			$data['ecms'] = $query;
			$data['title'] = "Drug Data List";
			$this->load->view('include/header', $data);
			$this->load->view('drug/showdrug', $data);
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	function show_drug_id($id)
	{
		if ($this->session->userdata('is_logged_in')) {
			$data['title'] = "Drug Edit";
			$this->load->database();
			$this->load->model('member_model');
			$query = $this->member_model->get_drug_id($id);
			$data['ecms'] = $query;
			$this->load->view('include/header', $data);
			$this->load->view('drug/drugedit', $data);
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	function edit_drug()
	{
		if ($this->session->userdata('is_logged_in')) {
			$datalist = array(
				'drug_name' => mysql_real_escape_string(stripcslashes($this->input->post('drug_name'))),
				'drug_date' => date('Y-m-d', strtotime($this->input->post('drug_date'))),
				'outcome' => mysql_real_escape_string(stripcslashes($this->input->post('outcome'))),
				'reason' => mysql_real_escape_string(stripcslashes($this->input->post('reason'))),
				'status' => $this->input->post('status')
			);
			$id = $this->input->post('id');
			$data['title'] = " Edit";
			$this->load->database();
			$this->load->model('member_model');
			$query = $this->member_model->edit_drug($id, $datalist);
			$data1['message'] = 'Data Inserted Successfully';
			redirect('member/successupdatedrug');
		} else {
			redirect('main');
		}
	}
	function successupdatedrug()
	{
		if ($this->session->userdata('is_logged_in')) {
			$this->load->database();
			$this->load->model('member_model');
			$query = $this->member_model->get_drug();
			$data['ecms'] = $query;
			$data['title'] = "Drug Data List";
			$this->load->view('include/header', $data);
			$this->load->view('drug/showdrug', $data);
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	function delete_drug($id)
	{
		if ($this->session->userdata('is_logged_in')) {
			$this->load->database();
			$this->member_model->delete_drug($id);
			$data1['message'] = 'Data Inserted Successfully';
			redirect('member/successdeletedrug');
		} else {
			redirect('main');
		}
	}
	function successdeletedrug()
	{
		if ($this->session->userdata('is_logged_in')) {
			$this->load->database();
			$this->load->model('member_model');
			$query = $this->member_model->get_drug();
			$data['ecms'] = $query;
			$data['title'] = "Drug Data List";
			$this->load->view('include/header', $data);
			$this->load->view('drug/showdrug', $data);
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	function drugsuccess()
	{
		if ($this->session->userdata('is_logged_in')) {
			$this->load->database();
			$this->load->model('member_model');
			$query = $this->member_model->get_drug();
			$data['ecms'] = $query;
			$data['title'] = "Drug Data List";
			$this->load->view('include/header', $data);
			$this->load->view('drug/showdrug', $data);
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	function add_award_view()
	{
		if ($this->session->userdata('is_logged_in')) {
			$data['title'] = "Add Award";
			$this->load->view('include/header', $data);
			$this->load->view('award/individualawardadd_view');
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	function add_award()
	{
		if ($this->session->userdata('is_logged_in')) {
			$this->form_validation->set_rules('award_name', 'Award Name', 'required|min_length[1]|max_length[50]');
			$this->form_validation->set_rules('award_date', 'Award Date', 'required|min_length[1]|max_length[12]');
			if ($this->form_validation->run() == FALSE) {
				$data['title'] = "Add Award";
				$this->load->view('include/header', $data);
				$this->load->view('award/individualawardadd_view');
				$this->load->view('include/footer');
			} else {
				$data = array(
					'award_name' => mysql_real_escape_string(stripcslashes($this->input->post('award_name'))),
					'award_date' => date('y-m-d', strtotime($this->input->post('award_date'))),
					'award_description' => mysql_real_escape_string(stripcslashes($this->input->post('award_description'))),
					'ind_id' => $this->input->post('ind_id'),
					'status' => 1
				);
				$this->member_model->insert_award($data);
				$data1['message'] = 'Data Inserted Successfully';
				redirect('individual/view_individual/aws');
			}
		} else {
			redirect('main');
		}
	}
	function add_rehab_view()
	{
		if ($this->session->userdata('is_logged_in')) {
			$data['title'] = "Add Rehabilation";
			$this->load->view('include/header', $data);
			$this->load->view('drug/rehabadd_view');
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	function add_rehab()
	{
		if ($this->session->userdata('is_logged_in')) {
			$this->form_validation->set_rules('rehab_name', 'Rehabiliation Name', 'required|min_length[1]|max_length[50]');
			$this->form_validation->set_rules('rehab_date', 'Rehabiliation Date', 'required|min_length[1]|max_length[12]');
			if ($this->form_validation->run() == FALSE) {
				$data['title'] = "Add Rehabiliation";
				$this->load->view('include/header', $data);
				$this->load->view('drug/rehabadd_view');
				$this->load->view('include/footer');
			} else {
				$data = array(
					'rehab_name' => mysql_real_escape_string(stripcslashes($this->input->post('rehab_name'))),
					'rehab_date' => date('y-m-d', strtotime($this->input->post('rehab_date'))),
					'description' => mysql_real_escape_string(stripcslashes($this->input->post('description'))),
					'outcome' => mysql_real_escape_string(stripcslashes($this->input->post('outcome'))),
					'ind_id' => $this->input->post('ind_id'),
					'status' => 1
				);
				$this->individual_model->insert_rahab($data);
				$data1['message'] = 'Data Inserted Successfully';
				redirect('individual/view_individual/ars');
			}
		} else {
			redirect('main');
		}
	}
	function add_institute_view()
	{
		if ($this->session->userdata('is_logged_in')) {
			$data['title'] = "Add Education Institute";
			$this->load->view('include/header', $data);
			$this->load->view('institute/instituteadd_view');
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	function add_institute()
	{
		if ($this->session->userdata('is_logged_in')) {
			$this->form_validation->set_rules('institute_name', 'Institute Name', 'required|min_length[1]|max_length[50]');
			if ($this->form_validation->run() == FALSE) {
				$data['title'] = "Add Educational Institute";
				$this->load->view('include/header', $data);
				$this->load->view('institute/instituteadd_view');
				$this->load->view('include/footer');
			} else {
				$data = array(
					'institute_name' => mysql_real_escape_string(stripcslashes($this->input->post('institute_name'))),
					'school_bulletin' => mysql_real_escape_string(stripcslashes($this->input->post('school_bulletin'))),
					'description' => mysql_real_escape_string(stripcslashes($this->input->post('description'))),
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
					'ind_id' => $this->input->post('ind_id'),
					'status' => 1
				);
				$this->individual_model->insert_institute($data);
				$data1['message'] = 'Data Inserted Successfully';
				redirect('individual/view_individual/ais');
			}
		} else {
			redirect('main');
		}
	}
	function add_teacher_view()
	{
		if ($this->session->userdata('is_logged_in')) {
			$data['title'] = "Add Teacher";
			$this->load->view('include/header', $data);
			$this->load->view('institute/teacheradd_view');
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	function add_teacher()
	{
		if ($this->session->userdata('is_logged_in')) {
			$this->form_validation->set_rules('teacher_name', 'Teacher Name', 'required|min_length[1]|max_length[50]');
			$this->form_validation->set_rules('email', 'Email', 'required|min_length[1]|max_length[50]');
			if ($this->form_validation->run() == FALSE) {
				$data['title'] = "Add Teacher";
				$this->load->view('include/header', $data);
				$this->load->view('institute/teacheradd_view');
				$this->load->view('include/footer');
			} else {
				$data = array(
					'teacher_name' => mysql_real_escape_string(stripcslashes($this->input->post('teacher_name'))),
					'information' => mysql_real_escape_string(stripcslashes($this->input->post('information'))),
					'address' => mysql_real_escape_string(stripcslashes($this->input->post('address'))),
					'phone' => mysql_real_escape_string(stripcslashes($this->input->post('phone'))),
					'email' => mysql_real_escape_string(stripcslashes($this->input->post('email'))),
					'ipaddress' => mysql_real_escape_string(stripcslashes($this->input->post('ipaddress'))),
					'website' => mysql_real_escape_string(stripcslashes($this->input->post('website'))),
					'domain_name' => mysql_real_escape_string(stripcslashes($this->input->post('domain_name'))),
					'url' => mysql_real_escape_string(stripcslashes($this->input->post('url'))),
					'learning_portal' => mysql_real_escape_string(stripcslashes($this->input->post('learning_portal'))),
					'academic_program' => mysql_real_escape_string(stripcslashes($this->input->post('academic_program'))),
					'course' => mysql_real_escape_string(stripcslashes($this->input->post('course'))),
					'curriculum' => mysql_real_escape_string(stripcslashes($this->input->post('curriculum'))),
					'syllabus' => mysql_real_escape_string(stripcslashes($this->input->post('syllabus'))),
					'ind_id' => $this->input->post('ind_id'),
					'status' => 1
				);
				$this->individual_model->insert_teacher($data);
				$data1['message'] = 'Data Inserted Successfully';
				redirect('individual/view_individual/ats');
			}
		} else {
			redirect('main');
		}
	}
	function add_coach_view()
	{
		if ($this->session->userdata('is_logged_in')) {
			$data['title'] = "Add Coach";
			$this->load->view('include/header', $data);
			$this->load->view('institute/coachadd_view');
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	function add_coach()
	{
		if ($this->session->userdata('is_logged_in')) {
			$this->form_validation->set_rules('coach_name', 'Coach Name', 'required|min_length[1]|max_length[50]');
			$this->form_validation->set_rules('email', 'Email', 'required|min_length[1]|max_length[50]');
			if ($this->form_validation->run() == FALSE) {
				$data['title'] = "Add Coach";
				$this->load->view('include/header', $data);
				$this->load->view('institute/coachadd_view');
				$this->load->view('include/footer');
			} else {
				$data = array(
					'coach_name' => mysql_real_escape_string(stripcslashes($this->input->post('coach_name'))),
					'description' => mysql_real_escape_string(stripcslashes($this->input->post('description'))),
					'sample' => mysql_real_escape_string(stripcslashes($this->input->post('sample'))),
					'phone' => mysql_real_escape_string(stripcslashes($this->input->post('phone'))),
					'email' => mysql_real_escape_string(stripcslashes($this->input->post('email'))),
					'ind_id' => $this->input->post('ind_id'),
					'status' => 1
				);
				$this->individual_model->insert_coach($data);
				$data1['message'] = 'Data Inserted Successfully';
				redirect('individual/view_individual/acs');
			}
		} else {
			redirect('main');
		}
	}
	function add_recomendation_view()
	{
		if ($this->session->userdata('is_logged_in')) {
			$data['title'] = "Add Recomendation";
			$this->load->view('include/header', $data);
			$this->load->view('institute/recomendationadd_view');
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	function add_recomendation()
	{
		if ($this->session->userdata('is_logged_in')) {
			$this->form_validation->set_rules('recomendation_person', 'Recomendation Person', 'required|min_length[1]|max_length[50]');
			if ($this->form_validation->run() == FALSE) {
				$data['title'] = "Add Recomendation";
				$this->load->view('include/header', $data);
				$this->load->view('institute/recomendationadd_view');
				$this->load->view('include/footer');
			} else {
				$data = array(
					'recomendation_person' => mysql_real_escape_string(stripcslashes($this->input->post('recomendation_person'))),
					'recomendation' => mysql_real_escape_string(stripcslashes($this->input->post('recomendation'))),
					'rec_video_link' => mysql_real_escape_string(stripcslashes($this->input->post('rec_video_link'))),
					'ind_id' => $this->input->post('ind_id'),
					'status' => 1
				);
				$this->individual_model->insert_recomendation($data);
				$data1['message'] = 'Data Inserted Successfully';
				redirect('individual/view_individual/ares');
			}
		} else {
			redirect('main');
		}
	}
	function add_job_view()
	{
		if ($this->session->userdata('is_logged_in')) {
			$data['title'] = "Add job";
			$this->load->view('include/header', $data);
			$this->load->view('institute/addjob_view');
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	function add_extra_view()
	{
		if ($this->session->userdata('is_logged_in')) {
			$data['title'] = "Add Extra";
			$this->load->view('include/header', $data);
			$this->load->view('institute/addextra_view');
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	function add_seminar_view()
	{
		if ($this->session->userdata('is_logged_in')) {
			$data['title'] = "Add seminar";
			$this->load->view('include/header', $data);
			$this->load->view('institute/addseminar_view');
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	function addseminar()
	{
		if ($this->session->userdata('is_logged_in')) {
			$this->form_validation->set_rules('seminar_name', 'employer_name Person', 'required|min_length[1]|max_length[50]');
			if ($this->form_validation->run() == FALSE) {
				$data['title'] = "Add seminar";
				$this->load->view('include/header', $data);
				$this->load->view(institute/'addseminar_view');
				$this->load->view('include/footer');
			} else {
				$data = array(
					'Teacher_id' => $this->input->post('Teacher_id'),
					'name' => mysql_real_escape_string(stripcslashes($this->input->post('name'))),
					'from_date' => date('y-m-d', strtotime($this->input->post('from_date'))),
					'Seminar Schedule' => date('y-m-d', strtotime($this->input->post('Seminar Schedule'))),
					'seminar_description' => mysql_real_escape_string(stripcslashes($this->input->post('seminar_description'))),
					'status' => 1
				);
				$this->individual_model->insert_seminar($data);
				$data1['message'] = 'Data Inserted Successfully';
				redirect('individual/view_individual/seminar');
			}
		} else {
			redirect('main');
		}
	}
	function addjob()
	{
		if ($this->session->userdata('is_logged_in')) {
			$this->form_validation->set_rules('employer_name', 'employer_name Person', 'required|min_length[1]|max_length[50]');
			if ($this->form_validation->run() == FALSE) {
				$data['title'] = "Add job";
				$this->load->view('include/header', $data);
				$this->load->view('institute/addjob_view');
				$this->load->view('include/footer');
			} else {
				$data = array(
					'ind_id' => $this->input->post('ind_id'),
					'employer_name' => mysql_real_escape_string(stripcslashes($this->input->post('employer_name'))),
					'from_date' => date('y-m-d', strtotime($this->input->post('from_date'))),
					'to_date' => date('y-m-d', strtotime($this->input->post('to_date'))),
					'position' => mysql_real_escape_string(stripcslashes($this->input->post('position'))),
					'job_description' => mysql_real_escape_string(stripcslashes($this->input->post('job_description'))),
					'status' => 1
				);
				$this->individual_model->insert_job($data);
				$data1['message'] = 'Data Inserted Successfully';
				redirect('individual/view_individual/jobs');
			}
		} else {
			redirect('main');
		}
	}
	function addextra()
	{
		if ($this->session->userdata('is_logged_in')) {
			$this->form_validation->set_rules('activity_name', 'activity_name', 'required|min_length[1]|max_length[50]');
			if ($this->form_validation->run() == FALSE) {
				$data['title'] = "Add Extra";
				$this->load->view('include/header', $data);
				$this->load->view('institute/addextra_view');
				$this->load->view('include/footer');
			} else {
				$data = array(
					'ind_id' => $this->input->post('ind_id'),
					'activity_name' => mysql_real_escape_string(stripcslashes($this->input->post('activity_name'))),
					'from_date' => date('y-m-d', strtotime($this->input->post('from_date'))),
					'activity_description' => mysql_real_escape_string(stripcslashes($this->input->post('activity_description'))),
					'status' => 1
				);
				$this->individual_model->insert_extra($data);
				$data1['message'] = 'Data Inserted Successfully';
				redirect('individual/view_individual/Extra');
			}
		} else {
			redirect('main');
		}
	}
}
?>