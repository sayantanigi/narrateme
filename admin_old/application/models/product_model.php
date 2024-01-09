<?php 
class Product_model extends CI_Model{
	function __construct() {
        parent::__construct();
   }
public function insert_product($data) {
		$this->load->database();
	    $this->db->insert('product', $data); 
		if ($this->db->affected_rows() > 1) {
			return true;
		} else {
			return false;
		}
	}
function show_product()
	{
		$sql ="select * from product ";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
	
function show_product_join()
	{
		$this->db->select('product.*,product_type.*');
		$this->db->from('product');
		$this->db->join('product_type', 'product.categori_id = product_type.id');
		$query = $this->db->get();
		return $query->result();
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}	
	
function show_product_id($id){
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('product_id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
function show_product_categori_id($id){
		$this->db->select('*');
		$this->db->from('product_type');
		$this->db->where('product_id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}	
	
function show_product_type(){
		$this->db->select('*');
		$this->db->from('product_type');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}	
	
function product_view($id){
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('product_id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

function product_view_join($id){
		$this->db->select('product.*,product_type.*');
		$this->db->from('product');
		$this->db->join('product_type', 'product_type.id = product.categori_id');
		$this->db->where('product.product_id', $id);
		$query = $this->db->get();
		return $query->result();
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}


function product_edit($id, $data){
	
		$this->db->where('product_id', $id);
		$this->db->update('product',$data);
	}
function updt($stat,$id){
	 
		$sql ="update product set status=$stat where product_id=$id ";
		$query = $this->db->query($sql);
		//return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function show_productlist()
	{
		$sql ="select * from product";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
function delete_product($id,$product_image){
		$this->db->where('product_id', $id);
		@unlink("uploads/product/".$product_image);
		$this->db->delete('product');	
		}
function delete_mul($ids)//Delete Multiple Product
		{
			$ids = $ids;
			$count = 0;
			foreach ($ids as $id){
			$did = intval($id).'<br>';
			$this->db->where('product_id', $did);
			unlink("uploads/product/".$product_image);
			$this->db->delete('product');  
			$count = $count+1;
			}
			
			echo'<div class="alert alert-success" style="margin-top:-17px;font-weight:bold">
			'.$count.' Item deleted successfully
			</div>';
			$count = 0;		
		}
	}
?>