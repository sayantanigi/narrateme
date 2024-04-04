<?php
class Banner extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('banner_model');
	}
	function index() {
		if($this->session->userdata('is_logged_in')) {
			$data['title'] = "Add Banner ";
			$this->load->view('header',$data);
			$this->load->view('banner/banneradd_view');
			$this->load->view('footer');
		} else {
			redirect('main');
		}
	}
	public function is_logged_in(){
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
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
			$this->load->view('banner/banneradd_view');
			$this->load->view('footer');
		} else {
			if(!empty($_FILES['banner_image']['name'])) {
				$_POST['banner_image']= rand(0000,9999)."_".$_FILES['banner_image']['name'];
				$config2['image_library'] = 'gd2';
				$config2['source_image'] = $_FILES['banner_image']['tmp_name'];
				$config2['new_image'] = getcwd().'/uploads/banner/'.$_POST['banner_image'];
				$config2['upload_path'] = getcwd().'/uploads/banner/';
				$config2['allowed_types'] = 'JPG|PNG|JPEG|jpg|png|jpeg|avif';
				$config2['maintain_ratio'] = FALSE;
				$this->image_lib->initialize($config2);
				if(!$this->image_lib->resize()) {
					echo('<pre>');
					echo ($this->image_lib->display_errors());
					exit;
				} else {
					$imgname  = $_POST['banner_image'];
					@unlink(getcwd().'/uploads/banner/'.$_POST['old_image']);
				}
			} else {
				$imgname  = $_POST['old_image'];;
			}
			$data = array(
				'title' => $this->input->post('title'),
				'subtitle' => $this->input->post('subtitle'),
				'description' => $this->input->post('description'),
				'banner_image' => $imgname,
				'status' => 1
			 );
			$this->banner_model->insert_banner($data);
			$this->session->set_flashdata('message', 'Data Inserted Successfully');
			redirect('banner/view_banner');
		}
	}
	function view_banner() {
		$data['ecms'] = $this->banner_model->view_banner();
		$data['title'] = "Banner List";
		$this->load->view('header',$data);
		$this->load->view('banner/showbanner');
		$this->load->view('footer');
	}
	function show_banner_id($id) {
		$data['title'] = "Banner Edit";
		$query = $this->banner_model->show_banner_id($id);
		$data['ecms'] = $query;
		$this->load->view('header',$data);
		$this->load->view('banner/banneredit', $data);
		$data['title'] = "Edit Data List";
		$this->load->view('footer');
	}
	function edit_banner() {
		$id = $this->input->post('id');
		if(!empty($_FILES['banner_image']['name'])) {
			$_POST['banner_image']= rand(0000,9999)."_".$_FILES['banner_image']['name'];
			$config2['image_library'] = 'gd2';
			$config2['source_image'] = $_FILES['banner_image']['tmp_name'];
			$config2['new_image'] = getcwd().'/uploads/banner/'.$_POST['banner_image'];
			$config2['upload_path'] = getcwd().'/uploads/banner/';
			$config2['allowed_types'] = 'JPG|PNG|JPEG|jpg|png|jpeg|avif';
			$config2['maintain_ratio'] = FALSE;
			$this->image_lib->initialize($config2);
			if(!$this->image_lib->resize()) {
				echo('<pre>');
				echo ($this->image_lib->display_errors());
				exit;
			} else {
				$imgname  = $_POST['banner_image'];
				@unlink(getcwd().'/uploads/banner/'.$_POST['old_image']);
			}
		} else {
			$imgname  = $_POST['old_image'];;
		}
		$datalist = array(
			'title' => $this->input->post('title'),
			'subtitle' => $this->input->post('subtitle'),
			'description' => $this->input->post('description'),
			'banner_image' => $imgname,
			'status' => 1
		);
		$data['title'] = "Banner Edit";
		$query = $this->banner_model->edit_banner($id,$datalist);
		$this->session->set_flashdata('message', 'Data Updated Successfully');
		redirect('banner/view_banner');
	}
	function delete_banner($id){
		$getData = $this->db->query("SELECT * FROM bl_banner WHERE id = '".$id."'")->row();
		$image = $getData->banner_image;
		$this->banner_model->delete_banner($id);
		@unlink(getcwd().'/uploads/banner/'.$image);
		$data1['message'] = 'Data Deleted Successfully';
		$this->session->set_flashdata('message', 'Data Updated Successfully');
		redirect('banner/view_banner');
	}
}
?>