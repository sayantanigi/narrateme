<?php
class Product extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library(array('form_validation','session'));
		if($this->session->userdata('is_logged_in')!=1){
			redirect('home', 'refresh');
		}
		$this->load->model('product_model');
		$this->load->library('image_lib');
		$this->load->helper('string');
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
	}

	function index() {
		if($this->session->userdata('is_logged_in')){
			redirect('productadd_view');
	    }else{
	    	$this->load->view('login');	
	    }
	}

	function product_add_form(){
		$query = $this->product_model->show_product_type();
		$data['ecat'] = $query;
		$data['title'] = "Add Product";
		$this->load->view('header',$data);
		$this->load->view('productadd_view');
		$this->load->view('footer');
	}
		
	function add_product(){
		$this->form_validation->set_rules('product_name','Product Title', 'required');
		$this->form_validation->set_rules('product_type','Product Type', 'required');
		$this->form_validation->set_rules('price','Price', 'required');
		$this->form_validation->set_rules('description', 'Product Description', 'required|min_length[1]|max_length[100000]');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('header');
			$data['success_msg'] = '<div class="alert alert-success text-center">Some Fields Can Not Be Blank</div>';
			$this->load->view('header');
    		$this->load->view('productadd_view',$data);
			$this->load->view('footer');
		} else {
			if ($_FILES['userfile']['name'] != '') {
				//echo "string";
				$_POST['userfile'] = rand(0000, 9999) . "_" . $_FILES['userfile']['name'];
				$config2['image_library'] = 'gd2';
				$config2['source_image'] =  $_FILES['userfile']['tmp_name'];
				$config2['new_image'] =   getcwd() . '/uploads/product/' . $_POST['userfile'];
				$config2['upload_path'] =  getcwd() . '/uploads/product/';
				$config2['allowed_types'] = 'JPG|PNG|JPEG|jpg|png|jpeg';
				$config2['maintain_ratio'] = TRUE;
				$this->image_lib->initialize($config2);
				if (!$this->image_lib->resize()) {
					echo ('<pre>');
					echo ($this->image_lib->display_errors());
					exit;
				} else {
					$image  = $_POST['userfile'];
					@unlink('/uploads/product/' . $_POST['old_image']);
				}
			} else {
				$image = $_POST['old_image'];
			}
			$data = array(
				'categori_id' => $this->input->post('product_type'),		   
				'product_name' => $this->input->post('product_name'),
				'price' => $this->input->post('price'),
				'product_image' => $image,
				'description' => $this->input->post('description'),
				'quantity' => $this->input->post('quantity'),
				'discount' => $this->input->post('discount'),
				'product_add_date' => date("Y-m-d", time()),
				'code' => random_string('alnum',9),
				'status' => 1
			);
			$this->product_model->insert_product($data);
			$query = $this->product_model->show_product();
			$data['ecms'] = $query;
			$this->session->set_flashdata('add_message', 'Product Added Successfully !!!!');
			redirect('product/show_product');
		}
	}

	function show_product(){
		$query = $this->product_model->show_product_join();
		$data['eprod'] = $query;
		$data['title'] = "Product List";
		$this->load->view('header',$data);
		$this->load->view('showproductlist');
		$this->load->view('footer');
		
	}

	function statusproduct() {
		$stat= $this->input->get('stat'); 
		$id= $this->input->get('id');   
		$this->load->model('product_model');
		$this->product_model->updt($stat,$id);
	}

	function show_product_id($id) {
		$query = $this->product_model->show_product_type();
		$data['ecat'] = $query;
		$id = $this->uri->segment(3); 
		$data['title'] = "Edit Product";
		$this->load->database();
		$this->load->model('product_model');
		$query = $this->product_model->show_product_id($id);
		$data['ecms'] = $query;
		$this->load->view('header',$data);
		$this->load->view('product_edit', $data);
		$this->load->view('footer');
	}
		
	function edit_product() {
		if ($_FILES['userfile']['name'] != '') {
			$_POST['userfile'] = rand(0000, 9999) . "_" . $_FILES['userfile']['name'];
			$config2['image_library'] = 'gd2';
			$config2['source_image'] =  $_FILES['userfile']['tmp_name'];
			$config2['new_image'] =   getcwd() . '/uploads/product/' . $_POST['userfile'];
			$config2['upload_path'] =  getcwd() . '/uploads/product/';
			$config2['allowed_types'] = 'JPG|PNG|JPEG|jpg|png|jpeg';
			$config2['maintain_ratio'] = TRUE;
			$this->image_lib->initialize($config2);
			if (!$this->image_lib->resize()) {
				echo ('<pre>');
				echo ($this->image_lib->display_errors());
				exit;
			} else {
				$image  = $_POST['userfile'];
				@unlink('/uploads/product/' . $_POST['old_image']);
			}
		} else {
			$image = $_POST['old_image'];
		}
		$datalist = array(			
			'categori_id' => $this->input->post('product_type'),				  
			'product_name' => $this->input->post('product_name'),
			'price' => $this->input->post('price'),
			'description' => $this->input->post('description'),
			'discount' => $this->input->post('discount'),
			'quantity' => $this->input->post('quantity'),
			'product_image' => $image
		);
		$id = $this->input->post('product_id');
		$data['title'] = "Product Edit";
		$this->load->database();
		$this->load->model('product_model');
		$query = $this->product_model->product_edit($id,$datalist);
		$data1['message'] = 'Data Update Successfully';
		$query = $this->product_model->show_productlist();
		$data['ecms'] = $query;
		$this->session->set_flashdata('edit_message', 'Product Updated Successfully !!!!');
		$data['title'] = "Product Page List";
		redirect('product/show_product');			
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
        	redirect('login');
    	}
//======================Logout==========================
}

?>