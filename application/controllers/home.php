<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends My_Controller {
  
	public function index() {
	  
    $this->data['title'] = 'Home page';	  
    $this->data['content'] = $this->load->view('content/home', null, true);
		$this->load->view('templates/main', $this->data);
     
	}
     
}
