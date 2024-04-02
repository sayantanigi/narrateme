<?php

class Banner extends CI_Controller {
	//============Constructor to call Model====================
	function __construct() {
		parent::__construct();
		$this->load->model('banner_model');
	}
	//============Constructor to call Model====================
	function index() {
		if($this->session->userdata('is_logged_in')) {
			$data['title'] = "Add Banner ";
			$this->load->view('header',$data);
			$this->load->helper(array('form'));
			$this->load->view('banneradd_view');
			$this->load->view('footer');
		} else {
			redirect('main');
		}
	}

	public function is_logged_in(){
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        //header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        $is_logged_in = $this->session->userdata('logged_in');
        if(!isset($is_logged_in) || $is_logged_in!==TRUE){
            redirect('login');
        }
    }
	function add_banner() {
		$this->form_validation->set_rules('title', 'Heading', 'required|min_length[1]|max_length[25]');
		$this->form_validation->set_rules('subtitle', 'Sub Heading', 'required|min_length[1]|max_length[50]');
		$this->form_validation->set_rules('description', 'Description', 'required|min_length[1]|max_length[300]');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Add Banner";
			$this->load->view('header',$data);
			$this->load->view('banneradd_view');
			$this->load->view('footer');
		} else {
			$imgname = $_FILES["banner_image"]["name"];
			//Setting values for tabel columns
			$data = array(
				'title' => $this->input->post('title'),
				'subtitle' => $this->input->post('subtitle'),
				'description' => $this->input->post('description'),
				'banner_image' => $_FILES["banner_image"]["name"],
				'status' => 1
			 );
			//Transfering data to Model
			$this->banner_model->insert_banner($data);
			$data1['message'] = 'Data Inserted Successfully';
			redirect('banner/view_banner');
		}
	}

	function success() {
		$data['h1title'] = 'Data Inserted Successfully';
		$data['title'] = 'Add Banner';
		$this->load->view('header');
		$this->load->view('banneradd_view',$data);
		$this->load->view('footer');
	}
	function view_banner() {
		$this->load->database();
		$this->load->model('banner_model');
		$query = $this->banner_model->view_banner();
		$data['ecms'] = $query;
		$data['title'] = "Banner List";
		$this->load->view('header',$data);
		$this->load->view('showbanner');
		$this->load->view('footer');
	}
	function show_banner_id($id) {
		$data['title'] = "Banner Edit";
		$this->load->database();
		$this->load->model('banner_model');
		$query = $this->banner_model->show_banner_id($id);
		$data['ecms'] = $query;
		$this->load->view('header',$data);
		$this->load->view('banneredit', $data);
		$data['title'] = "Edit Data List";
		$this->load->view('footer');
	}
	function edit_banner() {
		$id = $this->input->post('id');
		if($_FILES["banner_image"]["name"]!='') {
			$imgname = $_FILES["banner_image"]["name"];
			$this->db->where('id',$id);
			$this->db->select('banner_image');
			$result=$this->db->get('bl_banner');
			$row = $result->row();
			//print_r($row);
			$path = APPPATH.'../uploads/banner/'.$row->banner_image;
			unlink($path);
			$config['upload_path'] = APPPATH.'../uploads/banner/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = $imgname;
			$this->load->library('upload',$config);
			//print_r($config); die();
			if (!$this->upload->do_upload("banner_image")) {
				$error = array('error' => $this->upload->display_errors());
			} else {
				$upload_data = $this->upload->data();
			}
		} else {
			$imgname = $this->input->post('oldimg');
		}
		$datalist = array(
			'title' => $this->input->post('title'),
			'subtitle' => $this->input->post('subtitle'),
			'description' => $this->input->post('description'),
			'banner_image' => $imgname,
			'status' => 1
		);
		//print_r($datalist); die();
		$data['title'] = "Banner Edit";
		$this->load->database();
		$this->load->model('banner_model');
		$query = $this->banner_model->edit_banner($id,$datalist);
		$data1['message'] = 'Data Updated Successfully';
		redirect('banner/successupdate');
	}
	function successupdate(){
		$this->load->database();
		$this->load->model('banner_model');
		$query = $this->banner_model->view_banner();
		$data['ecms'] = $query;
		$data['title'] = "Banner List";
		$datamsg['h1title'] = 'Data Updated Successfully';
		$this->load->view('header',$data);
		$this->load->view('showbanner',$datamsg);
		$this->load->view('footer');
	}
	function delete_banner($id){
		$this->load->database();
		$this->banner_model->delete_banner($id);
		$data1['message'] = 'Data Deleted Successfully';
		redirect('banner/successdelete');
	}
	function successdelete(){
		$this->load->database();
		$this->load->model('banner_model');
		$query = $this->banner_model->view_banner();
		$data['ecms'] = $query;
		$data['title'] = "Banner List";
		$datamsg['h1title'] = 'Data Updated Successfully';
		$this->load->view('header',$data);
		$this->load->view('showbanner');
		$this->load->view('footer');
	}
}
?>