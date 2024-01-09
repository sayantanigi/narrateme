<?php 

class Cms_model extends CI_Model{

	function __construct() {

        parent::__construct();

   }

	public function insert_individual($data) {

		$this->load->database();

	    $this->db->insert('na_individual', $data); 

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;
		}
	}
	function show_cmslist(){
		$sql ="select * from na_cms";

		$query = $this->db->query($sql);

		return($query->num_rows() > 0) ? $query->result(): NULL;
	}

	function show_individual_cms_id($id){

		$this->db->select('*');

		$this->db->from('na_cms');

		$this->db->where('id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}
	function edit_cms_individual($id, $data){
		$this->db->where('id', $id);

		$this->db->update('na_cms',$data);

	}

	public function insert_new_cms($data) {

		$this->load->database();

	    $this->db->insert('na_cms', $data);
		
		//$this->db->last_query();
		//echo $this->db->last_query();
//exit();
		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}
	function view_cms(){

		$sql ="select * from na_cms";

		$query = $this->db->query($sql);

		return($query->num_rows() > 0) ? $query->result(): NULL;
	}

	function delete_cms($id){

	  $this->db->where('id', $id);

      $this->db->delete('na_cms'); 

	}
}

?>

