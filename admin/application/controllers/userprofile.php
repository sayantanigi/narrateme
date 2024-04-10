<?php
class Userprofile extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('teacher_model');
		$this->load->model('institution_data_model');
	}
	function index() {
		if ($this->session->userdata('is_logged_in')) {
			$data['title'] = "User Profile";
			$this->load->view('include/header', $data);
			$this->load->helper(array('form'));
			$this->load->view('page_user_profile');
			$this->load->view('include/footer');
		} else {
			redirect('main');
		}
	}
	public function is_logged_in() {
		header("cache-Control: no-store, no-cache, must-revalidate");
		header("cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		$is_logged_in = $this->session->userdata('logged_in');
		if (!isset($is_logged_in) || $is_logged_in !== TRUE) {
			redirect('main');
		}
	}
	function show_user($id) {
		$data['title'] = "User Profile";
		$this->load->database();
		$this->load->model('individual_model');
		$this->load->model('member_model');
		$this->load->model('student_record_model');
		$data['profile'] = "User Profile";
		$queryaward_st = $this->student_record_model->show_individual_award_st($id);
		$data['eaward_st'] = $queryaward_st;
		$querydrug_st = $this->student_record_model->show_individual_drug_st($id);
		$data['edrug_st'] = $querydrug_st;
		$queryinst_st = $this->student_record_model->show_individual_institute_st($id);
		$data['einst_st'] = $queryinst_st;
		$queryrehab_st = $this->student_record_model->show_individual_rahab_st($id);
		$data['erehab_st'] = $queryrehab_st;
		$queryteacher_st = $this->student_record_model->show_individual_teacher_st($id);
		$data['eteacher_st'] = $queryteacher_st;
		$querycoach_st = $this->student_record_model->show_individual_coach_st($id);
		$data['ecoach_st'] = $querycoach_st;
		$queryrecomend_st = $this->student_record_model->show_individual_recomend_st($id);
		$data['erecom_st'] = $queryrecomend_st;
		$queryrjob_st = $this->student_record_model->show_individual_job_st($id);
		$data['erjob_st'] = $queryrjob_st;
		$queryrexyta_st = $this->student_record_model->show_extra_st($id);
		$data['erextra_st'] = $queryrexyta_st;
		$queryvideo_st = $this->student_record_model->show_individual_video_st($id);
		$data['ervideo_st'] = $queryvideo_st;
		$queryaudio_st = $this->student_record_model->show_individual_audio_st($id);
		$data['eraudio_st'] = $queryaudio_st;
		$queryperrec_st = $this->student_record_model->show_individual_perrec_st($id);
		$data['erperrec_st'] = $queryperrec_st;
		$queryreference_st = $this->student_record_model->show_individual_reference_st($id);
		$data['erreference_st'] = $queryreference_st;
		$queryinsfac_st = $this->student_record_model->show_individual_insfac_st($id);
		$data['erinsfac_st'] = $queryinsfac_st;
		$queryedu_st = $this->student_record_model->show_Edu_Instite_Attended_st($id);
		$data['eduintattend_st'] = $queryedu_st;
		$queryedu_st = $this->student_record_model->show_seminar_attend_st($id);
		$data['seminarattend_st'] = $queryedu_st;
		$query_academic_transcript_st = $this->student_record_model->show_academic_transcript_st($id);
		$data['eracademictranscript_st'] = $query_academic_transcript_st;
		$query_educational_records_st = $this->student_record_model->show_educational_records_st($id);
		$data['ereducationalrecords_st'] = $query_educational_records_st;
		$query_issuer_of_report_st = $this->student_record_model->show_issuer_of_report_st($id);
		$data['erissuerofreport_st'] = $query_issuer_of_report_st;
		$query_reports_st = $this->student_record_model->show_reports_st($id);
		$data['erreports_st'] = $query_reports_st;
		$query_messages_st = $this->student_record_model->show_messages_st($id);
		$data['ermessages_st'] = $query_messages_st;
		$queryinddata = $this->institution_data_model->show_academic_institution($id);
		$data['inscdmtrns'] = $queryinddata;
		$queryinddata = $this->institution_data_model->show_accepted_substitute($id);
		$data['insothedu'] = $queryinddata;
		$queryinddata = $this->institution_data_model->show_edu($id);
		$data['insedu'] = $queryinddata;
		$queryinddata = $this->institution_data_model->show_ins_teacher($id);
		$data['instr'] = $queryinddata;
		$queryinddata = $this->institution_data_model->show_sch_div($id);
		$data['insch'] = $queryinddata;
		$queryinddata = $this->institution_data_model->show_cur($id);
		$data['inscur'] = $queryinddata;
		$query = $this->member_model->show_member($id);
		$data['ecms'] = $query;
		$queryaward = $this->individual_model->show_individual_award($id);
		$data['eaward'] = $queryaward;
		$queryedu = $this->individual_model->show_Edu_Instite_Attended($id);
		$data['eduintattend'] = $queryedu;
		$queryedu = $this->individual_model->show_seminar_attend($id);
		$data['seminarattend'] = $queryedu;
		$querydrug = $this->individual_model->show_individual_drug($id);
		$data['edrug'] = $querydrug;
		$queryinst = $this->individual_model->show_individual_institute($id);
		$data['einst'] = $queryinst;
		$queryrehab = $this->individual_model->show_individual_rahab($id);
		$data['erehab'] = $queryrehab;
		$queryteacher = $this->individual_model->show_individual_teacher($id);
		$data['eteacher'] = $queryteacher;
		$querycoach = $this->individual_model->show_individual_coach($id);
		$data['ecoach'] = $querycoach;
		$query_academic_transcript = $this->individual_model->show_academic_transcript($id);
		$data['eracademictranscript'] = $query_academic_transcript;
		$query_educational_records = $this->individual_model->show_educational_records($id);
		$data['ereducationalrecords'] = $query_educational_records;
		$query_issuer_of_report = $this->individual_model->show_issuer_of_report($id);
		$data['erissuerofreport'] = $query_issuer_of_report;
		$query_reports = $this->individual_model->show_reports($id);
		$data['erreports'] = $query_reports;
		$query_messages = $this->individual_model->show_messages($id);
		$data['ermessages'] = $query_messages;
		$queryrehab = $this->individual_model->show_individual_injuries($id);
		$data['einj'] = $queryrehab;
		$queryrehab = $this->individual_model->show_individual_surgeries($id);
		$data['esur'] = $queryrehab;
		$querypro = $this->individual_model->show_individual_procedures($id);
		$data['edpro'] = $querypro;
		$querytrt = $this->individual_model->show_individual_treatment($id);
		$data['edtrt'] = $querytrt;
		$queryrecomend = $this->individual_model->show_individual_recomend($id);
		$data['erecom'] = $queryrecomend;
		$queryrjob = $this->individual_model->show_individual_job($id);
		$data['erjob'] = $queryrjob;
		$queryvideo = $this->individual_model->show_individual_video($id);
		$data['ervideo'] = $queryvideo;
		$queryaudio = $this->individual_model->show_individual_audio($id);
		$data['eraudio'] = $queryaudio;
		$queryperrec = $this->individual_model->show_individual_perrec($id);
		$data['erperrec'] = $queryperrec;
		$queryreference = $this->individual_model->show_individual_reference($id);
		$data['erreference'] = $queryreference;
		$queryinsfac = $this->individual_model->show_individual_insfac($id);
		$data['erinsfac'] = $queryinsfac;
		$queryrexyta = $this->individual_model->show_extra($id);
		$data['erextra'] = $queryrexyta;
		$queryinddata = $this->individual_model->show_individual_data($id);
		$data['inddata'] = $queryinddata;
		$queryschooldata = $this->individual_model->show_school_data($id);
		$data['school'] = $queryschooldata;
		$querycoursedata = $this->individual_model->show_course_data($id);
		$data['course'] = $querycoursedata;
		$querylecturedata = $this->individual_model->show_lecture_data($id);
		$data['lecture'] = $querylecturedata;
		$queryteacherdata = $this->individual_model->show_teacher_data($id);
		$data['teacher'] = $queryteacherdata;
		$querydivisiondata = $this->individual_model->show_division_data($id);
		$data['division'] = $querydivisiondata;
		$querypastdata = $this->individual_model->show_past_data($id);
		$data['pastlec'] = $querypastdata;
		$querycurriculumdata = $this->individual_model->show_school_curiculam($id);
		$data['curricullum'] = $querycurriculumdata;
		$queryedu_insdata = $this->individual_model->show_school_edu_ins($id);
		$data['edu_ins'] = $queryedu_insdata;
		$this->load->view('include/header', $data);
		$this->load->view('page_user_profile', $data);
		$this->load->view('include/footer');
	}
	function edit_avatar() {
		$id = $this->input->post('id');
		if ($_FILES["userimage"]["name"] != '') {
			$imgname = $_FILES["userimage"]["name"];
			$this->db->where('id', $id);
			$this->db->select('userimage');
			$result = $this->db->get('bl_banner');
			$row = $result->row();
			$path = './avatar/' . $row->banner_image;
			unlink($path);
			$config['upload_path'] = './avatar/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = $imgname;
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload("userimage")) {
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
		$data['title'] = "Avatar Edit";
		$this->load->database();
		$this->load->model('banner_model');
		$query = $this->member_model->edit_banner($id, $datalist);
		$data1['message'] = 'Data Updated Successfully';
		redirect('banner/successupdate');
	}
}
?>