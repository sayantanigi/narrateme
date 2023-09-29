<?php
class settings_model extends CI_Model{
	function __construct() {
        parent::__construct();
   }
	function view_settings(){
	    $sql ="select * from na_settings";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}

	function edit_settings($id,$datalist){
		$this->db->where('id', $id);
		$this->db->update('na_settings',$datalist);
	}
	function show_settings_id($id){
		$this->db->select('*');
		$this->db->from('na_settings');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
}
?>