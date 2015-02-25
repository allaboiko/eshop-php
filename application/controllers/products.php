<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends My_Controller {
    
  public function __construct() {
    
    parent::__construct();   
    $this->load->model('model_products');
    $this->load->library('parser');
    
  }
  
	public function index($categories = null, $product = null) {
	  
    if(is_null($categories)){
      
      $this->data['title'] = 'Our Products Categories';
      $this->data['content'] = $this->categories();
      
    } elseif(!is_null($categories) && is_null($product)){
      
       $this->data['content'] = $this->products($categories);
      
    } elseif(!is_null($categories) && !is_null($product)){
      
      $this->data['content'] = $this->item($product);
      
    }
	  
		$this->load->view('templates/main', $this->data);
     
	}
  
  public function categories(){
    
    $data = $this->model_products->getCategories();
    
    if(!empty($data['categories'])){
      
      $content = $this->parser->parse('parser/categories.php', $data, true);
      
    } else {
      
      $data['messege'] = 'No categories...';
      $content = $this->parser->parse('parser/default.php', $data, true);
      
    }
    
    return $content;
    
  }

  public function products($categories){
    
    $categories = $this->security->xss_clean($categories);
    
    $data = $this->model_products->getProducts($categories);
    
    if(!empty($data['products'])){
      
      $this->data['title'] = $data['products'][0]['name'];
      $content = $this->parser->parse('parser/products.php', $data, true);
      
    } else {
      
      $data['messege'] = 'No products for this categorie...';
      $content = $this->parser->parse('parser/default.php', $data, true);
      
    }
    
    return $content;
    
  }
  
  public function item($product){
 
    $product = $this->security->xss_clean($product);   
    $data = $this->model_products->getItem($product);
    
    if(!empty($data['id'])){
      
      $this->data['title'] = $data['title'];
      $content = $this->parser->parse('parser/item.php', $data, true);
      
    } else {
      
      $data['messege'] = 'No item found...';
      $content = $this->parser->parse('parser/default.php', $data, true);
      
    }
    
    return $content;
    
  }
     
}
