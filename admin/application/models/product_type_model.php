<?php 
class Product_type_model extends CI_Model{
	function __construct() {
        parent::__construct();
   }
public function insert_product_type($data) {
		$this->load->database();
	    $this->db->insert('product_type', $data); 
		if ($this->db->affected_rows() > 1) {
			return true;
		} else {
			return false;
		}
	}
function show_product_type()
	{
		$sql ="select * from product_type ";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function show_product_type_id($id){
		$this->db->select('*');
		$this->db->from('product_type');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
function product_type_view($id){
		$this->db->select('*');
		$this->db->from('product_type');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
function product_type_edit($id, $data){
	
		$this->db->where('id', $id);
		$this->db->update('product_type',$data);
	}
function updt($stat,$id){
	 
		$sql ="update product_type set product_type_status=$stat where id=$id ";
		$query = $this->db->query($sql);
		//return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function show_product_typelist()
	{
		$sql ="select * from product_type";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function delete_product_type($id,$product_type_image){
		$this->db->where('id', $id);
		$this->db->delete('product_type');	
		}
function delete_mul($ids)//Delete Multiple Product_type
		{
			$ids = $ids;
			$count = 0;
			foreach ($ids as $id){
			$did = intval($id).'<br>';
			$this->db->where('id', $did);
			$this->db->delete('product_type');  
			$count = $count+1;
			}
			echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
			'.$count.' Item deleted successfully
			</div>';
			$count = 0;		
		}
	}
?>