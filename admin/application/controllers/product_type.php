<?php
class Product_type extends CI_Controller {
		//============Constructor to call Model====================
		function __construct() {
			parent::__construct();
			$this->load->library(array('form_validation','session'));
			if($this->session->userdata('is_logged_in')!=1){
			redirect('home', 'refresh');
			}
			$this->load->model('product_type_model');
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
			redirect('product_typeadd_view');
        }else{
        	$this->load->view('login');	
        }
		
		
	}
//======================Show Add form for product_type add **** START HERE========================	
function product_type_add_form(){
				$data['title'] = "Add Product_type";
				$this->load->view('header',$data);
				$this->load->view('product_typeadd_view');
				$this->load->view('footer');
     }
		
//====================== Show Add form for product_type add ****END HERE========================
		//=======================Insert Page Data============
		function add_product_type(){
			$my_date = date("Y-m-d", time()); 
			$config = array(
			'upload_path' => "uploads/product_type/",
			'upload_url' => base_url() . "uploads/product_type/",
			'allowed_types' => "gif|jpg|png|jpeg"
			);
        	$this->load->library('upload', $config);
				//=====================+++++++++++++++++++++++===================
				$this->form_validation->set_rules('product_type_title','Product_type Title', 'required');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				//=====================+++++++++++++++++++++++===================
				if ($this->form_validation->run() == FALSE) {
					$this->load->view('header');
					$data['success_msg'] = '<div class="alert alert-success text-center">Some Fields Can Not Be Blank</div>';
					$this->load->view('header');
            		$this->load->view('product_typeadd_view',$data);
					$this->load->view('footer');
					//redirect('banner/addbanner',$data);
				}else{
					if (!$this->upload->do_upload('userfile')){
						 $data = array(
							'product_type_title' => $this->input->post('product_type_title'),
							'product_type_status' => 1
						);
						$this->product_type_model->insert_product_type($data);
            			$upload_data = $this->upload->data();
						$query = $this->product_type_model->show_product_type();
						$data['ecms'] = $query;
						$this->session->set_flashdata('add_message', 'Product type Added Successfully !!!!');
						redirect('product_type/show_product_type');
        			}else{
						 $data['userfile'] = $this->upload->data();
						 $filename=$data['userfile']['file_name'];
						 $data = array(
							'product_type_title' => $this->input->post('product_type_title'),
							'product_type_image' => $filename,
							'product_type_status' => 1
						);
						$this->product_type_model->insert_product_type($data);
            			$upload_data = $this->upload->data();
						$query = $this->product_type_model->show_product_type();
						$data['ecms'] = $query;
						$this->session->set_flashdata('add_message', 'Product type Added Successfully !!!!');
						redirect('product_type/show_product_type');
				
					}
				}
		}
		//=======================Insert Page Data============

//======================Show Product_type List **** START HERE========================
		function show_product_type(){
		//Loading Database
			$this->load->database();
			//Calling Model
			$this->load->model('product_type_model');
			//Transfering data to Model
			$query = $this->product_type_model->show_product_type();
			$data['ecms'] = $query;
			$data['title'] = "Product type List";
			$this->load->view('header',$data);
			$this->load->view('showproduct_typelist');
			$this->load->view('footer');
		
	}
//======================Show Product_type List **** END HERE========================
//======================Status change **** START HERE========================
	function statusproduct_type ()
		{
			     $stat= $this->input->get('stat'); 
				 $id= $this->input->get('id');   
		$this->load->model('product_type_model');
		$this->product_type_model->updt($stat,$id);
		}

//=======================Status change **** END HERE========================	
//================Show Individual by Id for Product_type *** START HERE=================
		function show_product_type_id($id) {
			 $id = $this->uri->segment(3); 
			//exit();
			$data['title'] = "Edit Product_type";
			//Loading Database
			$this->load->database();
			//Calling Model
			$this->load->model('product_type_model');
			//Transfering data to Model
			$query = $this->product_type_model->show_product_type_id($id);
			$data['ecms'] = $query;
			$this->load->view('header',$data);
			$this->load->view('product_type_edit', $data);
			$this->load->view('footer');
		}
		
//================Show Individual by Id for Product_type *** END HERE=================
//================Update Individual product_type***** START HERE ====================
		function edit_product_type(){
			 $product_type_image = $this->input->post('product_type_image');
			 $config = array(
				'upload_path' => "uploads/product_type/",
			'upload_url' => base_url() . "uploads/product_type/",
			'allowed_types' => "gif|jpg|png|jpeg"
			);
			$this->load->library('upload', $config);
			if ($this->upload->do_upload("userfile")) {
				@unlink("uploads/product_type/".$product_type_image);
				//echo $image_data = $this->upload->data();
				$data['img'] = $this->upload->data();
			 	//echo $data['img']['file_name'];
				//exit();
				//*********************************
				//============================================
				$datalist = array(			
				'product_type_title' => $this->input->post('product_type_title'),
				'product_type_image' => $data['img']['file_name']
				);
				//echo $gallery_name=$_POST['gallery_name'];
				//====================Post Data===================
				//print_r($datalist);
				//exit();
				$id = $this->input->post('product_type_id');
				$data['title'] = "Product type Edit";
				//loading database
				$this->load->database();
				//Calling Model
				$this->load->model('product_type_model');
				//Transfering data to Model
				$query = $this->product_type_model->product_type_edit($id,$datalist);
				// echo $ddd=$this->db->last_query();
				
				$data1['message'] = 'Data Update Successfully';
				$query = $this->product_type_model->show_product_typelist();
				$data['ecms'] = $query;
				$data['title'] = "Product type Page List";
				$this->session->set_flashdata('edit_message', 'Product type Upated Successfully !!!!');
				redirect('product_type/show_product_type');
				//*********************************
		
			}else{
				$datalist = array(			
					'product_type_title' => $this->input->post('product_type_title'),
				);
				$id = $this->input->post('product_type_id');
				$data['title'] = "Product_type Edit";
				//loading database
				$this->load->database();
				//Calling Model
				$this->load->model('product_type_model');
				//Transfering data to Model
				$query = $this->product_type_model->product_type_edit($id,$datalist);
				//echo $ddd=$this->db->last_query();
				//exit();
				$data1['message'] = 'Data Update Successfully';
				$query = $this->product_type_model->show_product_typelist();
				$data['ecms'] = $query;
				$this->session->set_flashdata('edit_message', 'Product type Updated Successfully !!!!');
				$data['title'] = "Product_type Page List";
				$this->session->set_flashdata('edit_message', 'Product type Upated Successfully !!!!');
				redirect('product_type/show_product_type');			}
			
		}
//================Update Individual  Product_type ***** END HERE====================

		//=====================DELETE NEWS====================

		
			function delete_product_type() {
			$id = $this->uri->segment(3);
			$result=$this->product_type_model->show_product_type_id($id);
			//print_r($result);
			$product_type_image = $result[0]->product_type_image; 
			//echo $banner_img;exit();
			//Loading Database
			$this->load->database();

			//Transfering data to Model
			$query = $this->product_type_model->delete_product_type($id,$product_type_image);
			$data['ecms'] = $query;
			$this->session->set_flashdata('delete_message', 'Product type Deleted Successfully !!!!');
			redirect('product_type/show_product_type');
		}

		//=====================DELETE NEWS====================

		//====================MULTIPLE DELETE=================
		function delete_multiple(){
		$ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->product_type_model->delete_mul($ids);
		$this->session->set_flashdata('delete_message1', 'Product type Deleted Successfully !!!!');
		$this->load->view('header',$data);
			//$this->load->view('showbannerlist', $data);
			redirect('product_type/show_product_type');
			$this->load->view('footer');
		}
		
		function product_type_view($id){
			//Loading Database
			$this->load->database();
			//Calling Model
			$this->load->model('product_type_model');
			//Transfering data to Model
			$query = $this->product_type_model->product_type_view($id);
			$data['viewproduct_type'] = $query;
			//echo $sql = $this->db->last_query();
			//exit();
			$data['title'] = "Product_type View";
			$this->load->view('header',$data);
			$this->load->view('product_type_view',$data);
			$this->load->view('footer');
			
		
	}
		//====================MULTIPLE DELETE=================
//======================Logout==========================
		public function Logout(){
        	$this->session->sess_destroy();
        	redirect('index.php/login');
    	}
//======================Logout==========================
}

?>