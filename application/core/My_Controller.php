<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Controller extends CI_Controller {
    
  public $userValid = false,  
         $admin = false,
         $data = array('title' => 'Eshop site!'),
         $form = array('action' => '', 'attributes' => '', 'token' => null);
  
  public function __construct(){
    
    parent::__construct();
    $this->load->model('model_user');
    
    $this->userValid = ($this->session->userdata('logged_in') == true) ? true : false;
    $this->admin = ($this->session->userdata('admin') == true) ? true : false;
    
    $this->data['total_cart'] = ($this->cart->total() > 0 ) ? $this->cart->total() . '$' : '';
    $this->form['token'] = sha1(uniqid(rand(), true));
        
  }
  
  public function loginValidate(){
    
    $session_token = $this->session->userdata('form_token');
    
    if($session_token == $this->post['token']) {
      
      if($this->model_user->loginValidate($this->post['email'], $this->post['password'])){
        
        $this->userValid = true;
        return $this->userValid;
        
      }
      
    }
    
    $this->form_validation->set_message('loginValidate','Worng email/password...');
    return false;
    
  }
  
}
