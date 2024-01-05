<?php
class Event extends CI_Controller {
		//============Constructor to call Model====================
		function __construct() {
			parent::__construct();
			$this->load->library(array('form_validation','session'));
			if($this->session->userdata('is_logged_in')!=1){
			redirect('supercontrol/home', 'refresh');
			}
			$this->load->model('supercontrol/event_model');
			$this->load->database();
			$this->load->library('image_lib');
				//****************************backtrace prevent*** START HERE*************************
			$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
            $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
            $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
            $this->output->set_header('Pragma: no-cache');
			
			
			//****************************backtrace prevent*** END HERE*************************
		}
		//============Constructor to call Model====================
		function index(){
		if($this->session->userdata('is_logged_in')){
			redirect('event/event_view');
        }else{
        	$this->load->view('supercontrol/main/login');	
        }
	}
	//*********===============Event Section===============********//
		function addeventview(){
			$data['title'] = "Add Event";
			$this->load->view('supercontrol/header',$data);
			$this->load->view('supercontrol/eventadd_view',$data);
			$this->load->view('supercontrol/footer');
		}
		//====================Insert Page Data===============
		//====================Add Event Type=================
		function add_event(){
			$config = array(
				'upload_path' => "uploads/event/",
				'upload_url' => base_url() . "uploads/event/",
				'allowed_types' => "gif|jpg|png|jpeg"
			);
			
			//load upload class library
        	$this->load->library('upload', $config);
				//=====================+++++++++++++++++++++++===================
				$this->form_validation->set_rules('event_name','Event name', 'required');
				$this->form_validation->set_rules('location', 'Location', 'required|min_length[1]');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				//=====================+++++++++++++++++++++++===================
				if ($this->form_validation->run() == FALSE) {
					$this->load->view('supercontrol/header');
					$data['success_msg'] = '<div class="alert alert-success text-center">Some Fields Can Not Be Blank</div>';
					$this->load->view('supercontrol/header');
            		$this->load->view('supercontrol/eventadd_view',$data);
					$this->load->view('supercontrol/footer');
					//redirect('banner/addbanner',$data);
				}else{
					if (!$this->upload->do_upload('userfile')){
            			
						 $data = array(
							'event_name' => $this->input->post('event_name'),
							'start_date_time' => date('Y-m-d H:i:s',strtotime($this->input->post('start_date_time'))),
							'end_date_time' => date('Y-m-d H:i:s',strtotime($this->input->post('end_date_time'))),
							'location' => $this->input->post('location'),
							'post_date' => date('Y-m-d H:i:s'),
							'event_description' => $this->input->post('event_description'),
							'status' => 1
						);
						$this->event_model->insert_event($data);
            			$upload_data = $this->upload->data();
						$this->session->set_flashdata('success_add', 'Event  Added Successfully !!!!');
						redirect('supercontrol/event/showevent');
				
					
        			}else{
						 $data['userfile'] = $this->upload->data();
						 $filename=$data['userfile']['file_name'];
						 $data = array(
							'event_name' => $this->input->post('event_name'),
							'start_date_time' => date('Y-m-d H:i:s',strtotime($this->input->post('start_date_time'))),
							'end_date_time' => date('Y-m-d H:i:s',strtotime($this->input->post('end_date_time'))),
							'location' => $this->input->post('location'),
							'post_date' => date('Y-m-d H:i:s'),
							'event_description' => $this->input->post('event_description'),
							'event_image' => $filename,
							'status' => 1
						);
						$this->event_model->insert_event($data);
            			$upload_data = $this->upload->data();
						$this->session->set_flashdata('success_add', 'Event  Added Successfully !!!!');
						redirect('supercontrol/event/showevent');
				
					}
				}
		}
		//====================Add Event Type=================
		//==================Show Event Type==================
		function showevent(){
			$data['title'] = "Event Type List";
			$query = $this->event_model->show_event();
			$data['event'] = $query;
			$data['title'] = "Event List";
			$this->load->view('supercontrol/header',$data);
			$this->load->view('supercontrol/eventlist',$data);
			$this->load->view('supercontrol/footer');
		}
		//==================Show Event Type==================
		//==================Edit category====================
		function edit_event(){
		//============================================
		 $event_img = $this->input->post('event_image');
			$config = array(
				'upload_path' => "uploads/event/",
				'upload_url' => base_url() . "uploads/event/",
				'allowed_types' => "gif|jpg|png|jpeg"
			);
			$this->load->library('upload', $config);
			if ($this->upload->do_upload("userfile")) {
				//echo $path = base_url(). "banner/";exit();
				//echo $path1 = "banner/"; 
				@unlink("uploads/event/".$event_img);
				
				//echo $image_data = $this->upload->data();
				$data['img'] = $this->upload->data();
				//*********************************
				//============================================
				$datalist = array(			
				//**********************************************
				'event_name' => $this->input->post('event_name'),
				'start_date_time' => date('Y-m-d H:i:s',strtotime($this->input->post('start_date_time'))),
				'end_date_time' => date('Y-m-d H:i:s',strtotime($this->input->post('end_date_time'))),
				'location' => $this->input->post('location'),
				'post_date' => date('Y-m-d H:i:s'),
				'event_description' => $this->input->post('event_description'),
				'event_image' => $data['img']['file_name'],
				'status' => $this->input->post('status')
				//**********************************************
				);
				//print_r($datalist); exit();
				 $event_img = $this->input->post('event_image');
				//====================Post Data===================
				
				$id = $this->input->post('event_id');
				$data['title'] = "Edit Event";
				//loading database
				$this->load->database();
				//Calling Model
				$this->load->model('supercontrol/event_model');
				//Transfering data to Model
				$query = $this->event_model->event_edit($id,$datalist);
				$data1['message'] = 'Data Update Successfully';
				$query = $this->event_model->show_event();
				$data['eevent'] = $query;
				$data['title'] = "Event Page List";
				$this->session->set_flashdata('success_update', 'Event Updated Successfully !!!!');
				redirect('supercontrol/event/showevent',TRUE);
				/*$this->load->view('supercontrol/header',$data);
				$this->load->view('supercontrol/showeventlist', $data1);
				$this->load->view('supercontrol/footer');*/
				//*********************************
		
			}else{
				$datalist = array(			
				//**********************************************
				'event_name' => $this->input->post('event_name'),
				'start_date_time' => date('Y-m-d H:i:s',strtotime($this->input->post('start_date_time'))),
				'end_date_time' => date('Y-m-d H:i:s',strtotime($this->input->post('end_date_time'))),
				'location' => $this->input->post('location'),
				'post_date' => date('Y-m-d H:i:s'),
				'event_description' => $this->input->post('event_description'),
				'status' => $this->input->post('status')
				//**********************************************
				);
				//print_r($datalist);
				//exit();
				//====================Post Data===================
				$event_img = $this->input->post('event_img');
				$id = $this->input->post('event_id');
				$data['title'] = "Event Edit";
				//loading database
				$this->load->database();
				//Calling Model
				$this->load->model('supercontrol/event_model');
				//Transfering data to Model
				$query = $this->event_model->event_edit($id,$datalist);
				$data1['message'] = 'Data Update Successfully';
				$query = $this->event_model->show_event();
				$data['eevent'] = $query;
				$data['title'] = "Event Page List";
				$this->session->set_flashdata('success_update', 'Event Updated Successfully !!!!');
				redirect('supercontrol/event/showevent',TRUE);
			}
			
		}
		
		//================Show Category By Id================
		function show_event_id($id) {
			$id = $this->uri->segment(4); 
			$data['title'] = "Edit Event Type";
			
			$query = $this->event_model->show_event_id($id);
			$data['eevent'] = $query;
			
			$this->load->view('supercontrol/header',$data);
			$this->load->view('supercontrol/event_edit', $data);
			$this->load->view('supercontrol/footer');
		}
   		//================Show Category By Id================
		//================Delete Category====================	
		function delete_event($id){
			$id = $this->uri->segment(4);
			$result=$this->event_model->delete_event($id); 
			$this->session->set_flashdata('success_delete','Event Deleted Successfully !!!!');
			redirect('supercontrol/event/showevent');
		}
	//*********===============Event Section===============********//
	
	//======================Logout==========================
	function logout(){
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('supercontrol/home', 'refresh');
	}
		//======================Logout==========================
}

?>
