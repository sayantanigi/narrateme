<?php

class Member_model extends CI_Model{

	function __construct() {

        parent::__construct();

   }

   

	public function insert_member($data) {

		$this->load->database();

	    $this->db->insert('na_member', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	

	function view_member(){

		$sql ="select * from na_member";

		$query = $this->db->query($sql);

		return($query->num_rows() > 0) ? $query->result(): NULL;

	}

	

	function edit_member($id,$data){

		

		$this->db->where('id', $id);

		$this->db->update('na_member',$data);

			

	}

	

	

	function show_member($id){

		$this->db->select('*');

		$this->db->from('na_member');

		$this->db->where('id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	

	function show_member_award($id){

		$this->db->select('*');

		$this->db->from('na_member_award');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_member_drug($id){

		$this->db->select('*');

		$this->db->from('na_drug');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	function show_member_institute($id){

		$this->db->select('*');

		$this->db->from('na_eduinstitute');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_member_rahab($id){

		$this->db->select('*');

		$this->db->from('na_rehabilitation');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_member_teacher($id){

		$this->db->select('*');

		$this->db->from('na_teacher');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_member_coach($id){

		$this->db->select('*');

		$this->db->from('na_coach');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_member_recomend($id){

		$this->db->select('*');

		$this->db->from('na_recomendation');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_member_job($id){

		$this->db->select('*');

		$this->db->from('na_student_experience');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function show_extra($id){

		$this->db->select('*');

		$this->db->from('na_extracurricullam');

		$this->db->where('ind_id', $id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function delete_member($id){

	  $this->db->where('id', $id);

      $this->db->delete('na_member'); 

	}

	

	//**************Drug Area****************

	//==============Insert Drug==============

	function insert_drug($data){

		$this->load->database();

	    $this->db->insert('na_drug', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	//=============Insert Drug===============

	//===============Show Drug Data==========

	function get_drug(){

		$sql="select * from na_drug order by id desc";

		$query = $this->db->query($sql);

		return($query->num_rows()>0) ? $query->result(): NULL;

	}

	//==============Show Drug Data===========

	//==============Edit Drug================

	function edit_drug($id,$data){

		$this->db->where('id',$id);

		$this->db->update('na_drug',$data);

	}

	//==============Edit Drug================

	//==============Edit Drug================

	function edit_drug_id($id,$data){

		$this->db->update('id',$id);

		$this->db->update('na_drug',$data);

	}

	//==============Edit Drug===============

	//==============Show member Drug====

	function get_drug_id($id){

		$this->db->select('*');

		$this->db->from('na_drug');

		$this->db->where('id',$id);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	

	function delete_drug($id){

		$this->db->where('id',$id);

		$this->db->delete('na_drug');

	}

	//==============Show member Drug====

	//**************Drug Area****************

	

	//*************Award Area****************

	function insert_award($data){

		$this->load->database();

	    $this->db->insert('na_member_award', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	//*************Award Area****************

	//*************Rehab Area****************

	function insert_rahab($data){

		$this->load->database();

	    $this->db->insert('na_rehabilitation', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	//*************Rehab Area****************

	

	//*************Institute Area****************

	function insert_institute($data){

		$this->load->database();

	    $this->db->insert('na_eduinstitute', $data);

		if ($this->db->affected_rows() > 1) {

			return true;

		} else {

			return false;

		}

	}

	//*************Institute Area****************

	//*************Teacher Area******************

	function insert_teacher($data){

		$this->load->database();

		$this->db->insert('na_teacher',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	//*************Teacher Area**********************

	

	//*************Coach Area************************

	function insert_coach($data){

		$this->load->database();

		$this->db->insert('na_coach',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	//*************Coach Area**************************

	//*************Recomendation Area******************

	function insert_recomendation($data){

		$this->load->database();

		$this->db->insert('na_recomendation',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	//*************Recomendation Area******************

	

	//=============Debashish 29-03-2016================

	//*****job area******//

	

	function insert_job($data){

		$this->load->database();

		$this->db->insert('na_student_experience',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	

	//*****Extra curricullam area******//

	

	function insert_extra($data){

		$this->load->database();

		$this->db->insert('na_extracurricullam',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	

	//*****Seminar area******//

	

	function insert_seminar($data){

		$this->load->database();

		$this->db->insert('na_seminars',$data);

		if($this->db->affected_rows()>1){

			return true;

		}else{

			return false;

		}

	}

	//=============Debashish 29-03-2016================

	

	//===============Show Drug Data==========

	function get_country(){

		$this->db->select('*');

		$this->db->from('na_country');

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	//==============Show Drug Data===========

	//==============Check User===============

	function checkuser($em){

		$this->db->select('*');

		$this->db->from('na_member');

		$this->db->where('email', $em);

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}

	//==============Check User===============

	

	//==========Profile Pic Upload===========

	public function insert_avatar($data) {

		$this->load->database();

		

			$config['upload_path'] = './avatar/';

					

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

	//==========Profile Pic Upload===========

	

	function edit_avatar($id,$data){

		

		$this->db->where('id', $id);

		$this->db->update('na_member',$data);

			

	}

}

?>