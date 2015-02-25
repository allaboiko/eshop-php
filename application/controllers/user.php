<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends My_Controller {
  
  public $post, 
         $destination;
    
  public function __construct(){
    
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('model_user');
    
    if($this->userValid) redirect();
    
  }
  
	public function index() {
	  
    redirect('user/login/');
         
	}
  
  public function login(){
    
    $this->destination = $this->input->get('destination', true);
    $this->post = $this->input->post(null, true);
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_loginValidate');
    
    if($this->form_validation->run() == false ){
        
      $this->form['action'] = empty($this->destination) ? 'user/login' : 'user/login?destination=' . $this->destination;  
      $this->data['title'] = 'Sign in';   
      $this->data['content'] = $this->load->view('templates/login_form', $this->form, true);
      $this->load->view('templates/main', $this->data);
    
    } elseif($this->userValid){
      
      $this->destination = $this->input->get('destination', true);
      $url = empty($this->destination) ? '' : $this->destination;
      redirect($url);
      
    }
    
    $this->session->set_userdata('form_token', $this->form['token']);
    
  }
  
  // Todo...
  public function register(){ echo 'Todo...'; }
  
  // Todo...
  public function resetPassword(){ echo 'Todo...'; }
       
}
