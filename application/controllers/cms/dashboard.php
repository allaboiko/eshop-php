<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends My_Controller {
    
  public function __construct(){
    
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->library('parser');
    $this->load->model('model_cms');
    $this->data['flash_session'] = $this->session->flashdata('verify');
    
  }
  
  
  
	public function index() {
	  
    if(!$this->admin && !$this->userValid) redirect('cms/dashboard/login');
    if($this->userValid && !$this->admin) redirect();
    
    
    $data = $this->model_cms->getProducts();
    
    if(!empty($data['products'])){
      
      $this->data['content'] = $this->parser->parse('parser/cms_products.php', $data, true);
      
    } else {
      
      $data['messege'] = 'No content found...';      
      $this->data['content'] = $this->parser->parse('parser/default.php', $data, true);
      
    }
    
    $this->data['title'] = 'CMSystem Dashboard';
    $this->load->view('templates/main_dashboard', $this->data);
       
	}
  
  public function login(){
    
    $this->post = $this->input->post(null, true);
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_loginValidate');
    
    if($this->form_validation->run() == false ){
        
      $this->form['action'] = 'cms/dashboard/login';  
      $this->data['title'] = 'Sign in';   
      $this->data['content'] = $this->load->view('templates/login_form', $this->form, true);
      $this->load->view('templates/main_dashboard', $this->data);
    
    } elseif($this->userValid){
      
      redirect('cms/dashboard');
      
    }
    
    $this->session->set_userdata('form_token', $this->form['token']);
    
  }
  
  // Todo...
  public function add(){ echo 'Todo...'; }

  // Todo...
  public function edit($product_id){ echo 'Todo...'; }
  
  public function delete($product_id){
    
    $product_id = $this->security->xss_clean($product_id);
    $this->post = $this->input->post(null, true);
    
    if(!isset($this->post['delete'])){

      $this->data['title'] = 'Delete content';   
      $this->data['id'] = $product_id;   
      $this->data['content'] = $this->load->view('templates/delete_form', $this->data, true);
      $this->load->view('templates/main_dashboard', $this->data);
      
    } else {
      
      $this->model_cms->deleteProduct($product_id);
      redirect('cms/dashboard');
      
    }
     
  }
  
  // Todo...
  public function orders(){ echo 'Todo...'; }
  
     
}
