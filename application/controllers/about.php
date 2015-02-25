<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends My_Controller {
    
	public function index() {
	  
    $this->data['title'] = 'About us';
    $this->data['content'] = $this->load->view('content/about', null, true);
    $this->load->view('templates/main', $this->data);
    
	}
    
}
