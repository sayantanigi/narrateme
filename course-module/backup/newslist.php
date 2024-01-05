<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Newslist extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('generalmodel');
   $this->load->model('supercontrol/news_model');
 }
  function index(){
	 $action='get';
	 $data='';
	 $tablename='settings';
	 $fieldname = '';				
	 $id = '';
	 $query = $this->generalmodel->show_data_id($tablename,$id,$fieldname,$action,$data);
	 $data['topheaderdet'] = $query;
	 
	 $action2='get';
	 $tablename2='cms';
	 $fieldname2 = 'id';
	 $id2 = '5';
	 $data2='';
	 $query = $this->generalmodel->show_data_id($tablename2,$id2,$fieldname2,$action2,$data2);
	 $data['workinghrs'] = $query;
	 
	 //==LIMIT QUERY==//
	 $action18='get_limit';
	 $tablename18='news';
	 $fieldname18 = 'id';
	 $id18 = '';
	 $limit18 = '3';
	 $order18 = 'DESC';
	 $data18 ='';
	 $query = $this->generalmodel->show_data_id_limit($tablename18,$id18,$fieldname18,$order18,$limit18,$action18,$data18);
	 //echo $this->db->last_query(); exit();
	 $data['limnews'] = $query;
	 //==LIMIT QUERY==//
	 
	 $action21='get';
	 $tablename21='cms';
	 $fieldname21 = 'id';
	 $id21 = '2';
	 $data21='';
	 $query = $this->generalmodel->show_data_id($tablename21,$id21,$fieldname21,$action21,$data21);
	 $data['footerabout'] = $query;
	 
	 $action22='get';
	 $tablename22='settings';
	 $fieldname22 = 'id';
	 $id22 = '1';
	 $data22='';
	 $query = $this->generalmodel->show_data_id($tablename22,$id22,$fieldname22,$action22,$data22);
	 $data['footercontact'] = $query;
	 
	 $action23='get';
	 $tablename23='cms';
	 $fieldname23 = 'id';
	 $id23 = '18';
	 $data23='';
	 $query = $this->generalmodel->show_data_id($tablename23,$id23,$fieldname23,$action23,$data23);
	 $data['copyright'] = $query;
	 
	 $action24='get';
	 $tablename24='news';
	 $fieldname24 = 'id';
	 $id24 = '';
	 $data24='';
	 $query = $this->generalmodel->show_data_id($tablename24,$id24,$fieldname24,$action24,$data24);
	 $data['news'] = $query;
	 
	 
	 
	 
	 //========================== paginitation=========================
	 
	 	$config['base_url'] = site_url('newslist/index');
        $config['total_rows'] = $this->db->count_all('news');
        $config['per_page'] = "6";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"]/$config["per_page"];
        $config["num_links"] = floor($choice);

        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '<<';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '>>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        // get books list
        $data['newslimit'] = $this->news_model->show_news_limit($config["per_page"], $data['page'], NULL);
        /*echo $this->db->last_query();
		exit();*/
        $data['pagination'] = $this->pagination->create_links();
	 
	 
	  
	 $data['title'] = "NEWS";
	 $this->load->view('header',$data);
	 $this->load->view('news',$data);
	 $this->load->view('footer',$data);
  }
  
  function newsdetails(){
	 $action='get';
	 $data='';
	 $tablename='settings';
	 $fieldname = '';				
	 $id = '';
	 $query = $this->generalmodel->show_data_id($tablename,$id,$fieldname,$action,$data);
	 $data['topheaderdet'] = $query;
	 
	 $action2='get';
	 $tablename2='cms';
	 $fieldname2 = 'id';
	 $id2 = '5';
	 $data2='';
	 $query = $this->generalmodel->show_data_id($tablename2,$id2,$fieldname2,$action2,$data2);
	 $data['workinghrs'] = $query;
	 
	 //==LIMIT QUERY==//
	 $action18='get_limit';
	 $tablename18='news';
	 $fieldname18 = 'id';
	 $id18 = '';
	 $limit18 = '3';
	 $order18 = 'DESC';
	 $data18 ='';
	 $query = $this->generalmodel->show_data_id_limit($tablename18,$id18,$fieldname18,$order18,$limit18,$action18,$data18);
	 //echo $this->db->last_query(); exit();
	 $data['limnews'] = $query;
	 //==LIMIT QUERY==//
	 
	 $action21='get';
	 $tablename21='cms';
	 $fieldname21 = 'id';
	 $id21 = '2';
	 $data21='';
	 $query = $this->generalmodel->show_data_id($tablename21,$id21,$fieldname21,$action21,$data21);
	 $data['footerabout'] = $query;
	 
	 $action22='get';
	 $tablename22='settings';
	 $fieldname22 = 'id';
	 $id22 = '1';
	 $data22='';
	 $query = $this->generalmodel->show_data_id($tablename22,$id22,$fieldname22,$action22,$data22);
	 $data['footercontact'] = $query;
	 
	 $action23='get';
	 $tablename23='cms';
	 $fieldname23 = 'id';
	 $id23 = '18';
	 $data23='';
	 $query = $this->generalmodel->show_data_id($tablename23,$id23,$fieldname23,$action23,$data23);
	 $data['copyright'] = $query;
	 
	 $newsid = end($this->uri->segment_array());
	 $action24='get';
	 $tablename24='news';
	 $fieldname24 = 'id';
	 $id24 = $newsid;
	 $data24='';
	 $query = $this->generalmodel->show_data_id($tablename24,$id24,$fieldname24,$action24,$data24);
	 //echo $this->db->last_query(); exit();
	 $data['news'] = $query;
	 
	 $action25='get';
	 $tablename25='	settings';
	 $fieldname25 = 'id';
	 $id25 = '1';
	 $data25='';
	 $query = $this->generalmodel->show_data_id($tablename25,$id25,$fieldname25,$action25,$data25);
	 $data['sidecontact'] = $query;
	 
	 $action26='get';
	 $tablename26='	cms';
	 $fieldname26 = 'id';
	 $id26 = '2';
	 $data26='';
	 $query = $this->generalmodel->show_data_id($tablename26,$id26,$fieldname26,$action26,$data26);
	 $data['sideabt'] = $query;
	 
	 $data['title'] = "NEWS DETAILS";
	 $this->load->view('header',$data);
	 $this->load->view('newsdetails',$data);
	 $this->load->view('footer',$data);
  } 
}

?>