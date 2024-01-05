<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//include_once (dirname(__FILE__) . "/my_controller.php");
class Newtest extends CI_Controller{ 
    function __construct() {
	      parent::__construct();
	      $this->load->database();
		  $this->load->library('parser');
   }
	public function index(){
		# Load variables into the template parser
        $data['title']       = 'Test Title';
        $data['description'] = 'Test description';
        $data['homepage']    = 'Test home page';
        
        # Display view
        $this->parser->parse('blog_template', $data);
	}
}

?>
	