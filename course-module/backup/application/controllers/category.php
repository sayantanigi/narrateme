
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller
{ 
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('generalmodel');
	}
	public function index()
	{
		/*$tablename='category';
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
			$tablename='course';
			$primary_key = 'course_category';
			$wheredata = @$querysub[0]->category_id;
			$querycourse = $this->generalmodel->getAllDataOrder($tablename,$primary_key,$wheredata,'sort_order','','');
			$data['courseslist'] = $querycourse;
		}else{
			$primary_key = 'parent_id';
			$wheredata = $segment1;
			$querysub = $this->generalmodel->getAllData($tablename,$primary_key,$wheredata,'','');
			$data['coursescategory'] = $querysub;
			if($segment2==''){
				$tablename='course';
				$primary_key = 'course_category';
				$wheredata = @$querysub[0]->category_id;
				$querycourse = $this->generalmodel->getAllDataOrder($tablename,$primary_key,$wheredata,'sort_order','','');
				
				$data['courseslist'] = $querycourse;
				print_r($querycourse);die;
			}else{
				$tablename='course';
				$primary_key = 'course_category';
				$wheredata = $segment2;
				$querybatch = $this->generalmodel->getAllData($tablename, $primary_key,$wheredata,'','');

				$data['courseslist'] = $querybatch;
				if($segment3==""){
					$tablename='batch';
					$primary_key = 'courseId';
					$wheredata = @$querybatch[0]->courseId;
					$querycourse = $this->generalmodel->getAllData($tablename,$primary_key,$wheredata,'','','');
					$data['batchlist'] = $querycourse;
				}else{

					$tablename='batch';
					$primary_key = 'courseId';
					$wheredata = $segment3;
					$querycourse = $this->generalmodel->getAllData($tablename,$primary_key,$wheredata,'','','');
					$data['batchlist'] = $querycourse;

				}

			}
		}*/
		   

		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
		$data['title'] = "Course Category List";
		$this->load->view('header',$data);
		$this->load->view('category');
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
		$this->load->view('coursedetail');
		$this->load->view('footer');
	}
}
?>