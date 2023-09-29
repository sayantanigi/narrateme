<?php

class Banner_model extends CI_Model{

	function __construct() {

        parent::__construct();

   }

   

	public function insert_banner($data) {

		$this->load->database();

		

			$config['upload_path'] = './banner/';

					

			$config['allowed_types'] = 'jpg|jpeg|png|gif';

			

			$config['file_name'] = $imgname;

			

			$this->load->library('upload',$config);

				

			if (!$this->upload->do_upload("banner_image"))

			{

				$error = array('error' => $this->upload->display_errors());

			}

			else

			{

				$upload_data = $this->upload->data();

				

			}

								

		

	    $this->db->insert('bl_banner', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	

	function view_banner(){

		$sql ="select * from bl_banner";

		$query = $this->db->query($sql);

		return($query->num_rows() > 0) ? $query->result(): NULL;

	}

	

	function edit_banner($id,$data){

		

		$this->db->where('id', $id);

		$this->db->update('bl_banner',$data);

			

	}

	

	function show_banner_id($id){

		$this->db->select('*');

		$this->db->from('bl_banner');

		$this->db->where('id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function delete_banner($id){

				$this->db->where('id',$id);

				$this->db->select('banner_image');

				$result=$this->db->get('bl_banner');

				$row = $result->row();

				//print_r($row);

				$path = './uploads/'.$row->banner_image;

				

				unlink($path);

		

		

	  $this->db->where('id', $id);

      $this->db->delete('bl_banner'); 

	}

}

?>