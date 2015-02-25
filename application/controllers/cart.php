<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends My_Controller {
    
  public function __construct(){
    
    parent::__construct();  
    $this->load->model('model_cart');
    
  }

  public function addToCart(){
    
    $product_id = $this->input->post('id', true);
    
    if($this->model_cart->addToCart($product_id)){
      
      echo $this->cart->total();
      
    }
        
  }
  
  public function updateCart(){
    
    $data = $this->input->post(null, true);
    
    if(isset($data['updateOrder'])){
      
      $this->cart->update($data); 
      redirect('cart/checkout/');
      
    } elseif(isset($data['order'])){
      
      $this->cart->update($data);
      $this->order();
      
    }
       
  }
  
  public function checkout(){
    
    $this->data['title'] = 'Cart checkout';
    $this->data['content'] = $this->load->view('content/checkout', null, true);
    $this->load->view('templates/main', $this->data);
    
  }
  
  // Todo...
  public function order(){
    
    if(!$this->userValid){
      
      redirect('user/login?destination=cart/order');
      
    }
    
    echo 'Todo...';
    
  }
    
}
