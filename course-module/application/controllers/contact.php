<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller{ 
    function __construct() {
	      parent::__construct();
	      $this->load->database();
		  $this->load->model('generalmodel');
   }
	public function index()
	{
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
		$data['contactdetails']  = $this->generalmodel->show_data_id("sm_contact_details_country_wise","","","get","");

	 //print_r($data['contactdetails']);die;
        $data['title'] = "Contact";
	    $this->load->view('header',$data);
		$this->load->view('contact');
		$this->load->view('footer');
	}
	
	public function send_query(){

				
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric|min_length[10]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('Comment', 'Comment', 'trim|required');
		
		if ($this->form_validation->run() == TRUE) {


			$from_email = $this->input->post('email'); 

			$to_email = 'info@oesacademy.co.uk'; 

			$data = array(
				'ContactName' => $this->input->post('name'),
				'Subject' => 'Enquery',
				'Phone' => $this->input->post('phone'),
				'Email' => $this->input->post('email'),
				'Message' => $this->input->post('Comment'),
				'ReplyStatus' => 'No'
			);


			$action='insert';
			$table_name='sm_user_contact';
			$query = $this->generalmodel->show_data_id($table_name,'','',$action,$data);

			$this->load->library('email'); 
			$this->email->from($from_email, $this->input->post('name')); 
			$this->email->to($to_email);
			$this->email->subject('Enquery'); 
			$this->email->message($this->input->post('Comment')); 

         //Send mail 
			if($this->email->send()) 
				$this->session->set_flashdata("email_sent", "Your query has been sent successfully."); 
			else 
				$this->session->set_flashdata("email_sent", "Error in sending Email."); 
			redirect('contact#msg','refresh');

		} else {

			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Something went wrong!</div>');
			redirect('contact','refresh');	
			
		}
	}
	
	public function collaboration()
	{
		$data['settings'] = $this->generalmodel->show_data_id("sm_settings",1,"id","get","");
	 
        $data['title'] = "Collaboration Form";
	    $this->load->view('header',$data);
		$this->load->view('collaboration-form');
		$this->load->view('footer');
	}
}

?>
	