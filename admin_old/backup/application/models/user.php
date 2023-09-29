<?php

Class User extends CI_Model

{

 function login($username, $password)

 {

   $this -> db -> select('AdminId, UserName, UserPassword');

   $this -> db -> from(' na_admin_detail');

   $this -> db -> where('UserName', $username);

   $this -> db -> where('UserPassword', md5($password));

   $this -> db -> limit(1);

 

   $query = $this -> db -> get();

 

   if($query -> num_rows() == 1)

   {

     return $query->result();

   }

   else

   {

     return false;

   }

 }

}

?>