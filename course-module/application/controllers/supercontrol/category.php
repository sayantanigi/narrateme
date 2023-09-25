<?php
class Category extends CI_Controller {
		//============Constructor to call Model====================
		function __construct() {
			parent::__construct();
			//$this->load->model('categorymodel', 'cat');

			$this->load->helper('form');
			$this->load->library(array('form_validation','session'));
			if($this->session->userdata('is_logged_in')!=1){
			redirect('supercontrol/home', 'refresh');
			}
			$this->load->model('supercontrol/category_model','cat');
			$this->load->model('generalmodel');
			//$this->load->library('image_lib');
			/*function __construct() {
			parent::__construct();
			$this->load->model('categorymodel', 'cat');
			$this->load->helper('form');
			}*/

			//****************************backtrace prevent*** START HERE*************************
			$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
            $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
            $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
            $this->output->set_header('Pragma: no-cache');
			
			//****************************backtrace prevent*** END HERE*************************
			$this->load->library('image_lib');
			 
		}
		//============Constructor to call Model====================
		function index(){

		if($this->session->userdata('is_logged_in')){
			$data['categories'] = $this->cat->category_menu();
			$this->load->view('supercontrol/header',$data);
			$this->load->view('supercontrol/categoryadd_view', $data);
			$this->load->view('supercontrol/footer');
			//redirect('categoryadd_view');
        }else{
        	$this->load->view('supercontrol/login');	
        }
		
		//$data['categories'] = $this->cat->category_menu();
			//$this->load->view('categoryadd_view', $data);
	}
//======================Show Add form for category add **** START HERE========================	
function category_add_form(){
		$data['title'] = "Add Category";
		$this->load->view('supercontrol/header',$data);
		$this->load->view('supercontrol/categoryadd_view');
		$this->load->view('supercontrol/footer');
     }
		
//====================== Show Add form for category add ****END HERE========================
		//=======================Insert Page Data============
		function add_category(){
		
			$my_date = date("Y-m-d", time()); 
			$config = array(
				'upload_path' => "uploads/categoryimage/",
				'upload_url' => base_url() . "uploads/categoryimage/",
				'allowed_types' => "gif|jpg|png|jpeg"
			);
			$this->load->library('upload', $config);


			if (!$this->upload->do_upload('userfile')){
			$data = array(
			'category_name' => $this->input->post('name'),
			'userid'=>$this->session->userdata('userid')
			);
			//print_r($data); exit();
			$this->load->model('supercontrol/category_model');
			$this->category_model->insert_category($data);
			$this->load->view('supercontrol/header',$data);
			//$this->load->view('category/success',$data);
			$data['categories'] = $this->cat->category_menu();
			$data['success_msg'] = '<div class="alert alert-success text-center">Data Added Successfully!</div>';
			$this->load->view('supercontrol/categoryadd_view',$data);
			//redirect('category',$data);
			$this->load->view('supercontrol/footer');
			
			}else{
				$data['userfile'] = $this->upload->data();
				$filename=$data['userfile']['file_name'];
				$data = array(
					'category_name' => $this->input->post('name'),
					'sort_order'=> $this->input->post('sort_order'),
					'parent_id' => $this->input->post('pid'),
					'category_image' => $filename
				);
				//print_r($data); exit();
				$this->load->model('supercontrol/category_model');
				$this->category_model->insert_category($data);
				$this->load->view('supercontrol/header',$data);
				//$this->load->view('category/success',$data);
				$data['categories'] = $this->cat->category_menu();
				$data['success_msg'] = '<div class="alert alert-success text-center">Data Added Successfully!</div>';
				$this->load->view('supercontrol/categoryadd_view',$data);
				//redirect('category',$data);
				$this->load->view('supercontrol/footer');
			}
		}
		//=======================Insert Page Data============
		
		

		//=======================Insertion Success message for News *** START HERE=========
		function success(){
			$data['h1title'] = 'Add Category';
			$data['title'] = 'Add Category';
			$this->load->view('supercontrol/header');
			$this->load->view('supercontrol/categoryadd_view',$data);
			$this->load->view('supercontrol/footer');
		}
		//=======================Insertion Success message *** END HERE=========	
		//======================Show News List **** START HERE========================
		function show_category(){
		//Loading Database
			$this->load->database();
			//Calling Model
			$this->load->model('supercontrol/category_model');
			$query = $this->category_model->show_category();
			//========================================
			//****************************************
			//========================================
			$data['eloca']=$query;
			$data['title']="Category List";
			$this->load->view('supercontrol/header',$data);
			$this->load->view('supercontrol/showcategorylist',$data);
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

//=======================Status change **** END HERE========================	
//================Show Individual by Id for Category *** START HERE=================
	function show_category_id($id) {
		$id = $this->uri->segment(4); 
		$data['title'] = "Edit Category";
		//Loading Database
		$this->load->database();
		//Calling Model
		$this->load->model('supercontrol/category_model');
		//Transfering data to Model
		$query = $this->category_model->show_category_id($id);
		$data['ecategory'] = $query;
		
		$table_name = 'category';
			$primary_key = 'parent_id';
			$wheredata='0';
			$queryallcat = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
			//echo $this->db->last_query();
			//exit();
			$data['eallcat'] = $queryallcat;
		$this->load->view('supercontrol/header',$data);
		$this->load->view('supercontrol/category_edit', $data);
		$this->load->view('supercontrol/footer');
	}
		
//================Show Individual by Id for Category *** END HERE=================
//================Update Individual Category***** START HERE ====================
	function edit_category(){
			$config = array(
				'upload_path' => "uploads/categoryimage/",
				'upload_url' => base_url() . "uploads/categoryimage/",
				'allowed_types' => "gif|jpg|png|jpeg"
			);
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('userfile')){
			$data['userfile'] = $this->upload->data();
			$filename=$data['userfile']['file_name'];
			$datalist = array(			
				'category_name' => $this->input->post('category_name'),
			);
			}else{
				$datalist = array(			
				'category_name' => $this->input->post('category_name')
			);
				}
			$id = $this->input->post('category_id');
			$data['title'] = "Category Edit";
			//loading database
			$this->load->database();
			//Calling Model
			$this->load->model('supercontrol/category_model');
			//Transfering data to Model
			$query = $this->category_model->category_edit($id,$datalist);
			//echo $ddd=$this->db->last_query();
			//exit();
			$data1['message'] = 'Updated Successfully';
			$this->session->set_flashdata('success_edit', 'Data Updated Successfully !!!');
			redirect('supercontrol/category/show_category');
	}
//================Update Individual  Category ***** END HERE====================

		//=====================DELETE LOCATION====================
	function delete_category($id) {
		$this->load->model('supercontrol/category_model');
		
		$result=$this->category_model->show_category_id($id);
		//Loading Database
		$this->load->database();
		if($query = $this->category_model->delete_category($id)){
		$data2['message'] = 'Deleted Successfully';
		$data['title'] = "Category Page List";
		$data['eloca'] = $query;
		$data['title'] = "Category Page List";
		$this->session->set_flashdata('success', 'Data Deleted !!!!');
			redirect('supercontrol/category/show_category',TRUE);
		}else{
			$this->session->set_flashdata('success','You Can Not Delete A Parent Category');
			redirect('supercontrol/category/show_category',TRUE);
		}
	}
		//=====================DELETE LOCATION====================
		//====================MULTIPLE DELETE=================
		function delete_multiple(){
		$ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->news_model->delete_mul($ids);
		$this->load->view('header');
		redirect('news/show_news');
		$this->load->view('footer');
		}
		//====================MULTIPLE DELETE=================
       //======================Logout==========================
		public function Logout(){
        	$this->session->sess_destroy();
        	redirect('supercontrol/login');
    	}
     //======================Logout==========================
}

?>