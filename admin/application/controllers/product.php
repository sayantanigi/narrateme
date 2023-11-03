<?php
class Product extends CI_Controller {
		//============Constructor to call Model====================
		function __construct() {
			parent::__construct();
			$this->load->library(array('form_validation','session'));
			if($this->session->userdata('is_logged_in')!=1){
			redirect('home', 'refresh');
			}
			$this->load->model('product_model');
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
			redirect('productadd_view');
        }else{
        	$this->load->view('login');	
        }
		
		
	}
//======================Show Add form for product add **** START HERE========================	
function product_add_form(){
				$query = $this->product_model->show_product_type();
				$data['ecat'] = $query;
				$data['title'] = "Add Product";
				$this->load->view('header',$data);
				$this->load->view('productadd_view');
				$this->load->view('footer');
     }
		
//====================== Show Add form for product add ****END HERE========================
		//=======================Insert Page Data============
		function add_product(){
			$this->load->helper('string');
			$code = random_string('alnum',9);
			$my_date = date("Y-m-d", time()); 
			$config = array(
			'upload_path' => "uploads/product/",
			'upload_url' => base_url() . "uploads/product/",
			'allowed_types' => "gif|jpg|png|jpeg"
			);
        	$this->load->library('upload', $config);
				//=====================+++++++++++++++++++++++===================
				$this->form_validation->set_rules('product_name','Product Title', 'required');
				$this->form_validation->set_rules('product_type','Product Type', 'required');
				$this->form_validation->set_rules('price','Price', 'required');
				$this->form_validation->set_rules('description', 'Product Description', 'required|min_length[1]|max_length[100000]');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				//=====================+++++++++++++++++++++++===================
				if ($this->form_validation->run() == FALSE) {
					$this->load->view('header');
					$data['success_msg'] = '<div class="alert alert-success text-center">Some Fields Can Not Be Blank</div>';
					$this->load->view('header');
            		$this->load->view('productadd_view',$data);
					$this->load->view('footer');
					//redirect('banner/addbanner',$data);
				}else{
					if (!$this->upload->do_upload('userfile')){
            			$data['success_msg'] = '<div class="alert alert-success text-center">You Must Select An Image File!</div>';
						$this->load->view('header');
            			$this->load->view('productadd_view', $data);
						$this->load->view('footer');
        			}else{
						 $data['userfile'] = $this->upload->data();
						 $filename=$data['userfile']['file_name'];
						 $data = array(
							'categori_id' => $this->input->post('product_type'),		   
							'product_name' => $this->input->post('product_name'),
							'price' => $this->input->post('price'),
							'product_image' => $filename,
							'description' => $this->input->post('description'),
							'quantity' => $this->input->post('quantity'),
							'discount' => $this->input->post('discount'),
							'product_add_date' => $my_date,
							'code' => $code,
							'status' => 1
						);
						$this->product_model->insert_product($data);
            			$upload_data = $this->upload->data();
						$query = $this->product_model->show_product();
						$data['ecms'] = $query;
						$this->session->set_flashdata('add_message', 'Product Added Successfully !!!!');
						redirect('product/show_product');
					}
				}
		}
		//=======================Insert Page Data============

//======================Show Product List **** START HERE========================
		function show_product(){
			$query = $this->product_model->show_product_join();
			$data['eprod'] = $query;
			//echo $this->db->last_query(); exit();
			//echo $ddd=$this->db->last_query(); exit();
			$data['title'] = "Product List";
			$this->load->view('header',$data);
			$this->load->view('showproductlist');
			$this->load->view('footer');
		
	}
	
//======================Show Product List **** END HERE========================
//======================Status change **** START HERE========================
	function statusproduct ()
		{
			     $stat= $this->input->get('stat'); 
				 $id= $this->input->get('id');   
		$this->load->model('product_model');
		$this->product_model->updt($stat,$id);
		}

//=======================Status change **** END HERE========================	
//================Show Individual by Id for Product *** START HERE=================
		function show_product_id($id) {
			$query = $this->product_model->show_product_type();
			$data['ecat'] = $query;
			 $id = $this->uri->segment(3); 
			//exit();
			$data['title'] = "Edit Product";
			//Loading Database
			$this->load->database();
			//Calling Model
			$this->load->model('product_model');
			//Transfering data to Model
			$query = $this->product_model->show_product_id($id);
			$data['ecms'] = $query;
			$this->load->view('header',$data);
			$this->load->view('product_edit', $data);
			$this->load->view('footer');
		}
		
//================Show Individual by Id for Product *** END HERE=================
//================Update Individual product***** START HERE ====================
		function edit_product(){
			 $product_image = $this->input->post('product_image');
			 $config = array(
				'upload_path' => "uploads/product/",
				'upload_url' => base_url() . "uploads/product/",
				'allowed_types' => "gif|jpg|png|jpeg"
			);
			$this->load->library('upload', $config);
			if ($this->upload->do_upload("userfile")) {
				@unlink("uploads/product/".$product_image);
				//echo $image_data = $this->upload->data();
				$data['img'] = $this->upload->data();
			 	//echo $data['img']['file_name'];
				//exit();
				//*********************************
				//============================================
				$datalist = array(
				'categori_id' => $this->input->post('product_type'),				  
				'product_name' => $this->input->post('product_name'),
				'price' => $this->input->post('price'),
				'description' => $this->input->post('description'),
				'discount' => $this->input->post('discount'),
				'quantity' => $this->input->post('quantity'),
				'product_image' => $data['img']['file_name']
				);
				//echo $gallery_name=$_POST['gallery_name'];
				//====================Post Data===================
				//print_r($datalist);
				//exit();
				$id = $this->input->post('product_id');
				$data['title'] = "Product Edit";
				//loading database
				$this->load->database();
				//Calling Model
				$this->load->model('product_model');
				//Transfering data to Model
				$query = $this->product_model->product_edit($id,$datalist);
				// echo $ddd=$this->db->last_query();
				
				$data1['message'] = 'Data Update Successfully';
				$query = $this->product_model->show_productlist();
				$data['ecms'] = $query;
				$data['title'] = "Product Page List";
				/*$this->load->view('header',$data);
				$this->load->view('showproductlist', $data1);
				$this->load->view('footer');*/
				$this->load->view('header',$data);
			//$this->load->view('showbannerlist', $data);
			redirect('product/show_product');
			$this->load->view('footer');
				//*********************************
		
			}else{
				$datalist = array(			
					'categori_id' => $this->input->post('product_type'),				  
					'product_name' => $this->input->post('product_name'),
					'price' => $this->input->post('price'),
					'description' => $this->input->post('description'),
					'discount' => $this->input->post('discount'),
					'quantity' => $this->input->post('quantity')
				);
				$id = $this->input->post('product_id');
				$data['title'] = "Product Edit";
				//loading database
				$this->load->database();
				//Calling Model
				$this->load->model('product_model');
				//Transfering data to Model
				$query = $this->product_model->product_edit($id,$datalist);
				//echo $ddd=$this->db->last_query();
				//exit();
				$data1['message'] = 'Data Update Successfully';
				$query = $this->product_model->show_productlist();
				$data['ecms'] = $query;
				$this->session->set_flashdata('edit_message', 'Product Updated Successfully !!!!');
				$data['title'] = "Product Page List";
				redirect('product/show_product');
			}
			
		}
//================Update Individual  Product ***** END HERE====================

		//=====================DELETE NEWS====================

		
			function delete_product() {
			$id = $this->uri->segment(3);
			@$result=$this->product_model->show_product_id($id);
			//print_r($result);
			@$product_image = $result[0]->product_image; 
			//echo $banner_img;exit();
			//Loading Database
			$this->load->database();

			//Transfering data to Model
			$query = $this->product_model->delete_product($id,$product_image);
			$data['ecms'] = $query;
			//echo $ddd=$this->db->last_query(); exit();
			$this->session->set_flashdata('delete_message', 'Product Deleted Successfully !!!!');
			redirect('product/show_product');
		}

		//=====================DELETE NEWS====================

		//====================MULTIPLE DELETE=================
		function delete_multiple(){
		$ids = ( explode( ',', $this->input->get_post('ids') ));
		$this->product_model->delete_mul($ids);
		$this->session->set_flashdata('delete_message1', 'Product Deleted Successfully !!!!');
		$this->load->view('header',$data);
			//$this->load->view('showbannerlist', $data);
			redirect('product/show_product');
			$this->load->view('footer');
		}
		
		function product_view($id){
			//Loading Database
			$this->load->database();
			//Calling Model
			$this->load->model('product_model');
			//Transfering data to Model
			$query = $this->product_model->product_view_join($id);
			$data['viewproduct'] = $query;
			//echo $sql = $this->db->last_query();
			//exit();
			$data['title'] = "Product View";
			$this->load->view('header',$data);
			$this->load->view('product_view',$data);
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