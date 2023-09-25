<?php
class Admin_model extends CI_Model {
	
    function __construct() { 
       parent::__construct(); 

    }
/******************Login Check for Admin Panel********************/	  
    public function login($username, $password,$tbl)
    {

          $this->db->where('username', $username);
          $this->db->where('password', $password);
           $query = $this->db->get($tbl);

          if($query->num_rows() == 1)
          {
                  return $query->row();
          }
          else
             {
                   return false;
             }		
    }
 /****************************************************************/
    /******************Login Check user********************/	  
    public function loginUser($email,$password,$tbl)
    {

          $this->db->where('user_name', $email);
          $this->db->where('user_password', $password);
          $query = $this->db->get($tbl);

          if($query->num_rows() == 1)
          {
                  return $query->row();
          }
          else
             {
                   return false;
             }		
    }
 /****************************************************************/
    
    function check_user_forgot($email,$data)
	{
		
		$this->db->where('user_email',$email);
		$query=$this->db->get('user_login');
		$result=$query->num_rows();
		if($result==1)
		{
			$this->db->where('user_email',$email);
			$query1=$this->db->update('sm_user_login',$data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function revocer_password($data,$set_pass)
	{
		$this->db->where('user_email',$data['email']);
		$this->db->where('ConfirmCode',$data['verification_code']);
		$query=$this->db->get('user_login');
		$check=$query->num_rows();
		if($check==1)
		{
			$this->db->where('user_email',$data['email']);
			$query1=$this->db->update('sm_user_login',$set_pass);
			return $query1;
		}
		else
		{
			return FALSE;
		}
		
	}
  /********************** Fetch All rows****************************/ 
    public function fetch_all($tbl)
    {
        $this->db->select('*');
        //$this->db->where('status', 'Yes');
        $query=$this->db->get($tbl);
        return $query->result();
       // return $num = $query->num_rows();
    }
     public function fetch_all_asc($tbl)
    {
        $this->db->select('*');
        $this->db->order_by("timeline_id", "asc");
        $query=$this->db->get($tbl);
        return $query->result();
       // return $num = $query->num_rows();
    }
    
     public function fetch_rows($tbl, $where)
    {
        $this->db->select('*');
        //$this->db->where('status', 'Yes');
        $this->db->where($where);
        $query=$this->db->get($tbl);
        return $query->result();
        
    }
     public function shortnlimitcon($tbl,$short,$key,$where)
    {
        $this->db->select('*');
        $this->db->where($where);
        $this->db->order_by($key, $short);
        $query=$this->db->get($tbl);
        return $query->result();
     
    }
   
 /******************************************************************/
 /********************** Fetch All Rows using joining ****************************/ 
    public function fetch_all_join($query)
    {
        $query = $this->db->query($query);
	return $query->result();        
    }
  /******************************************************************/
    
    
 /********************** Fetch Single Row****************************/   
    public function fetch_single($tbl, $id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query=$this->db->get($tbl);
        return $query->row();
        
    } 
    
    public function fetch_row($tbl, $where)
    {
        
        $this->db->select('*');
        $this->db->where($where);
        $query=$this->db->get($tbl);
        return $query->row();
        
    } 
 /******************************************************************/
 /********************** Fetch Single Row using joining****************************/   
    public function fetch_single_join($query)
    {
        $query = $this->db->query($query);
	return $query->row();        
    }
   /******************************************************************/
 /********************** Insert Into Table****************************/    
    public function add_details($tbl,$data)
    {
        $query=$this->db->insert($tbl,$data);
        return $query;
        
    }
   /******************************************************************/
 /********************** Edit Single Row****************************/    
    public function eidt_details($tbl,$data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update($tbl,$data);
        return true;
        
    }
    
    public function eidt_single_row($tbl,$data, $where)
    {
        $this->db->where($where);
        $this->db->update($tbl,$data);
        return true;
        
    }
    
     public function edit_details($tbl,$data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update($tbl,$data);
        return true;
        
    }
  /******************************************************************/
 /********************** Eidit Single Row****************************/     
    public function eidt_details1($tbl,$data, $id)
    {
        $this->db->where('Id', $id);
        $this->db->update($tbl,$data);
        return true;
        
    }
 /******************************************************************/
 /********************** Delete Single Row****************************/    
    public function delete_single($tbl,$id)
    {
         $this->db->where('id', $id);
         $delete = $this->db->delete($tbl); 
         return $delete;
        
    }
     public function delete_single_user($tbl,$id)
    {
         $this->db->where('user_id', $id);
         $delete = $this->db->delete($tbl); 
         return $delete;
        
    }
    
     /********************** Delete by condition Row****************************/    
    public function delete_single_con($tbl,$where)
    {
         $this->db->where($where);
         $delete = $this->db->delete($tbl); 
         return $delete;
        
    }
    public function Fetch_Query_Single($query)
 
    {
        
        $query = $this->db->query($query);
	return $query->row();  
        
    }
	 
  	  public function total_count($tbl,$where) {
        
          $this->db->select('*');
           $this->db->where($where);
           //  $query = $this->db->get($tbl);
          //return $query->num_rows();
           
          return $this->db->count_all_results($tbl);
        }  
        
         
        
     public function count_all($tbl) {
        
         $this->db->select('*');
       
       return $this->db->count_all($tbl);
        }  
           
        
 public function get_users($limit,$start,$tbl,$where) {
     $this->db->select('*');
        $this->db->where($where);
        $this->db->limit($limit, $start);
        $query = $this->db->get($tbl);
      
      if ($query->num_rows() > 0) {
        return $query->result();
      }
      return false;
   }
        
      public function get_product($limit,$start,$tbl) {
      $this->db->select('*');
     
        $this->db->limit($limit, $start);
        $query = $this->db->get($tbl);
      
      if ($query->num_rows() > 0) {
        return $query->result();
      }
      return false;
   } 
   
   
   /************blog listing***************/
   
       public function bloglisting($short,$key,$limit,$start,$tbl) {
      $this->db->select('*');
       $this->db->order_by($key, $short);
         $this->db->limit($limit, $start);
        $query=$this->db->get($tbl);
        
         return $query->result();
   } 
   
   
   
   /*********end blog listing***************/
   
   
   
   
   
   /*******short and limit*********/
     public function shortnlimit($tbl,$limit,$short,$key)
    {
        $this->db->select('*');
        
        $this->db->order_by($key, $short);
          $this->db->limit($limit);
        $query=$this->db->get($tbl);
        return $query->result();
       // return $num = $query->num_rows();
    }
    /*********short and limit end*******/
    
    
    
    /***********shortnlimit with where condition**************/
     public function shorttnlimitcon($tbl,$limit,$short,$key,$where)
    {
        $this->db->select('*');
        $this->db->where($where);
        $this->db->order_by($key, $short);
          $this->db->limit($limit);
        $query=$this->db->get($tbl);
        return $query->row();
       // return $num = $query->num_rows();
    }
    
    /*************shortnlimit with where condition end************/
    
    /*******short and limit*********/
     public function fetchlimit($tbl,$limit)
    {
        $this->db->select('*');
        $this->db->limit($limit);
        $query=$this->db->get($tbl);
        return $query->result();
       // return $num = $query->num_rows();
    }
    /*********short and limit end*******/
    
     
}
?>