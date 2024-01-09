<?php
class adminprofile_model extends CI_Model{
	function __construct() {
        parent::__construct();
   }
	function view_adminprofile(){
	    $sql ="select * from na_admin_mail";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}

	function edit_adminprofile($id,$datalist){
		$this->db->where('MailId', $id);
		$this->db->update('na_admin_mail',$datalist);
	}
	function show_adminprofile_id($id){
		$this->db->select('*');
		$this->db->from('na_admin_mail');
		$this->db->where('MailId', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
}
?>