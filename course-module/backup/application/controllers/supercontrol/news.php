<?php
class News extends CI_Controller {
		//============Constructor to call Model====================
		function __construct() {
			parent::__construct();
			$this->load->library(array('form_validation','session'));
			if($this->session->userdata('is_logged_in')!=1){
			redirect('supercontrol/home', 'refresh');
			}
			$this->load->model('supercontrol/news_model');
			$this->load->library('image_lib');
			
				//****************************backtrace prevent*** START HERE*************************
			$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
            $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
            $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
            $this->output->set_header('Pragma: no-cache');
			
			//****************************backtrace prevent*** END HERE*************************
		}
		//============Constructor to call Model====================
		function index()
	{
		if($this->session->userdata('is_logged_in')){
			redirect('supercontrol/newsadd_view');
        }else{
        	$this->load->view('supercontrol/login');	
        }
		
		
	}
//======================Show Add form for news add **** START HERE========================	
function news_add_form(){
				$data['title'] = "Add News";
				$this->load->view('supercontrol/header',$data);
				$this->load->view('supercontrol/newsadd_view');
				$this->load->view('supercontrol/footer');
     }
		
//====================== Show Add form for news add ****END HERE========================
		//=======================Insert Page Data============
		function add_news(){
			$my_date = date("Y-m-d", time()); 
			$config = array(
			'upload_path' => "./uploads/news/",
			'upload_url' => base_url() . "./uploads/news/",
			'allowed_types' => "gif|jpg|png|jpeg"
			);
        	$this->load->library('upload', $config);
				//=====================+++++++++++++++++++++++===================
				$this->form_validation->set_rules('news_title','News Title', 'required');
				$this->form_validation->set_rules('posted_by', 'Posted By', 'required|min_length[1]|max_length[100]');
				$this->form_validation->set_rules('news_link', 'News Link', 'required|min_length[1]|max_length[100]');
				$this->form_validation->set_rules('news_desc', 'News Description', 'required|min_length[1]|max_length[100000]');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				//=====================+++++++++++++++++++++++===================
				if ($this->form_validation->run() == FALSE) {
					$this->load->view('supercontrol/header');
					$data['success_msg'] = '<div class="alert alert-success text-center">Some Fields Can Not Be Blank</div>';
					$this->load->view('supercontrol/header');
            		$this->load->view('supercontrol/newsadd_view',$data);
					$this->load->view('supercontrol/footer');
					//redirect('banner/addbanner',$data);
				}else{
					if (!$this->upload->do_upload('userfile')){
						 $data = array(
							'news_title' => $this->input->post('news_title'),
							'posted_by' => $this->input->post('posted_by'),
							'news_link' => $this->input->post('news_link'),
							'news_desc' => $this->input->post('news_desc'),
							'date' => $my_date,
							'news_status' => 1
						);
						$this->news_model->insert_news($data);
            			$upload_data = $this->upload->data();
						$query = $this->news_model->show_news();
						$data['ecms'] = $query;
            			$data['success_msg'] = '<div class="alert alert-success text-center">Your Data Successfully Uploaded!</div>';
						$this->load->view('supercontrol/header',$data);
						$this->load->view('supercontrol/shownewslist',$data);
						$this->load->view('supercontrol/footer');
        			}else{
						 $data['userfile'] = $this->upload->data();
						 $filename=$data['userfile']['file_name'];
						 $data = array(
							'news_title' => $this->input->post('news_title'),
							'posted_by' => $this->input->post('posted_by'),
							'news_link' => $this->input->post('news_link'),
							'news_image' => $filename,
							'news_desc' => $this->input->post('news_desc'),
							'date' => $my_date,
							'news_status' => 1
						);
						$this->news_model->insert_news($data);
            			$upload_data = $this->upload->data();
						$query = $this->news_model->show_news();
						$data['ecms'] = $query;
            			$data['success_msg'] = '<div class="alert alert-success text-center">Your file <strong>' . $upload_data['file_name'] . '</strong> was successfully uploaded!</div>';
						$this->load->view('supercontrol/header',$data);
						$this->load->view('supercontrol/shownewslist',$data);
						$this->load->view('supercontrol/footer');
				
					}
				}
		}
		//=======================Insert Page Data============

//=======================Insertion Success message for News *** START HERE=========
		function success(){
			$data['h1title'] = 'Add News';
			
			$data['title'] = 'Add News';
			$this->load->view('supercontrol/header');
			$this->load->view('supercontrol/newsadd_view',$data);
			$this->load->view('supercontrol/footer');
		}
//=======================Insertion Success message *** END HERE=========	
//======================Show News List **** START HERE========================
		function show_news(){
		//Loading Database
			$this->load->database();
			//Calling Model
			$this->load->model('supercontrol/news_model');
			//Transfering data to Model
			$query = $this->news_model->show_news();
			$data['ecms'] = $query;
			$data['title'] = "News List";
			$this->load->view('supercontrol/header',$data);
			$this->load->view('supercontrol/shownewslist');
			$this->load->view('supercontrol/footer');
		
	}
//======================Show News List **** END HERE========================
//======================Status change **** START HERE========================
	function statusnews ()
		{
			     $stat= $this->input->get('stat'); 
				 $id= $this->input->get('id');   
		$this->load->model('supercontrol/news_model');
		$this->news_model->updt($stat,$id);
		}

//=======================Status change **** END HERE========================	
//================Show Individual by Id for News *** START HERE=================
		function show_news_id($id) {
			 $id = $this->uri->segment(4); 
			//exit();
			$data['title'] = "Edit News";
			//Loading Database
			$this->load->database();
			//Calling Model
			$this->load->model('supercontrol/news_model');
			//Transfering data to Model
			$query = $this->news_model->show_news_id($id);
			$data['ecms'] = $query;
			$this->load->view('supercontrol/header',$data);
			$this->load->view('supercontrol/news_edit', $data);
			$this->load->view('supercontrol/footer');
		}
		
//================Show Individual by Id for News *** END HERE=================
//================Update Individual news***** START HERE ====================
		function edit_news(){
			 $news_image = $this->input->post('news_image');
			 $config = array(
				'upload_path' => "news/",
				'upload_url' => base_url() . "news/",
				'allowed_types' => "gif|jpg|png|jpeg"
			);
			$this->load->library('upload', $config);
			if ($this->upload->do_upload("userfile")) {
				@unlink("news/".$news_image);
				//echo $image_data = $this->upload->data();
				$data['img'] = $this->upload->data();
			 	//echo $data['img']['file_name'];
				//exit();
				//*********************************
				//============================================
				$datalist = array(			
				'news_title' => $this->input->post('news_title'),
				'posted_by' => $this->input->post('posted_by'),
				'news_link' => $this->input->post('news_link'),
				'news_desc' => $this->input->post('news_desc'),
				'news_image' => $data['img']['file_name']
				);
				//echo $gallery_name=$_POST['gallery_name'];
				//====================Post Data===================
				//print_r($datalist);
				//exit();
				$id = $this->input->post('news_id');
				$data['title'] = "News Edit";
				//loading database
				$this->load->database();
				//Calling Model
				$this->load->model('supercontrol/news_model');
				//Transfering data to Model
				$query = $this->news_model->news_edit($id,$datalist);
				// echo $ddd=$this->db->last_query();
				
				$data1['message'] = 'Data Update Successfully';
				$query = $this->news_model->show_newslist();
				$data['ecms'] = $query;
				$data['title'] = "News Page List";
				$this->load->view('supercontrol/header',$data);
				$this->load->view('supercontrol/shownewslist', $data1);
				$this->load->view('supercontrol/footer');
				//*********************************
		
			}else{
				$datalist = array(			
					'news_title' => $this->input->post('news_title'),
				    'posted_by' => $this->input->post('posted_by'),
					'news_link' => $this->input->post('news_link'),
				    'news_desc' => $this->input->post('news_desc')
				
				);
				$id = $this->input->post('news_id');
				$data['title'] = "News Edit";
				//loading database
				$this->load->database();
				//Calling Model
				$this->load->model('supercontrol/news_model');
				//Transfering data to Model
				$query = $this->news_model->news_edit($id,$datalist);
				//echo $ddd=$this->db->last_query();
				//exit();
				$data1['message'] = 'Data Update Successfully';
				$query = $this->news_model->show_newslist();
				$data['ecms'] = $query;
				$data['title'] = "News Page List";
				$this->load->view('supercontrol/header',$data);
				$this->load->view('supercontrol/shownewslist', $data1);
				$this->load->view('supercontrol/footer');
			}
			
		}
//================Update Individual  News ***** END HERE====================

		//=====================DELETE NEWS====================

		
			function delete_news() {
			$id = $this->uri->segment(4);
			$result=$this->news_model->show_news_id($id);
			//print_r($result);
			$news_image = $result[0]->news_image; 
			//echo $banner_img;exit();
			//Loading Database
			$this->load->database();

			//Transfering data to Model
			$query = $this->news_model->delete_news($id,$news_image);
			$data['ecms'] = $query;
			$this->load->view('supercontrol/header',$data);
			//$this->load->view('showbannerlist', $data);
			redirect('supercontrol/news/show_news');
			$this->load->view('supercontrol/footer');
		}

		//=====================DELETE NEWS====================

		//====================MULTIPLE DELETE=================
		function delete_multiple(){
		$ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->news_model->delete_mul($ids);
		$this->load->view('supercontrol/header');
		redirect('supercontrol/news/show_news');
		$this->load->view('supercontrol/footer');
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