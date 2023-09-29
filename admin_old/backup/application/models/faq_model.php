<?php
class faq_model extends CI_Model{
	function __construct() {
        parent::__construct();
   }

	public function insert_faq($data) {
		$this->load->database();
	    $this->db->insert('na_faq', $data);
		if ($this->db->affected_rows() > 1) {
			return true;
		} else {
			return false;
		}
	}

	function view_faq(){
		$sql ="select * from na_faq";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}

	function edit_faq($id,$datalist){
		$this->db->where('id', $id);
		$this->db->update('na_faq',$datalist);
	}

	function show_faq_id($id){
		$this->db->select('*');
		$this->db->from('na_faq');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	function delete_faq($id){
	  $this->db->where('id', $id);
      $this->db->delete('na_faq'); 
	}
}
?>