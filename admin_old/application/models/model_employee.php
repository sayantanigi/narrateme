<?php 

    defined('BASEPATH') OR exit('No direct script access allowed');

    class model_employee extends CI_model {

    public function __construct() {

    parent::__construct();

    }

    public function add_employee_data($data){

    $this->db->insert('employees',$data);

    $id = $this->db->insert_id();

    $this->db->select('*');

    $this->db->from('employees');

    $this->db->where('id',$id);

    $result = $this->db->get()->result();

    return $result;

    }

    }



