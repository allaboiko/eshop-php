<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends My_Controller {
  
	public function index() {
	  
    $user = array(
              'uid'  => '',
              'name'     => '',
              'email'     => '',
              'logged_in' => '',
              'admin' => '',
          );
    
    $this->session->unset_userdata($user);
    redirect();
     
	}
     
}
