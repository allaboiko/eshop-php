<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_cart extends CI_Model {
  
  public function addToCart($product_id){
            
    $query = $this->db->query("SELECT title,price FROM products WHERE id = ? LIMIT 1", array($product_id));
    
    if ($query->num_rows() > 0) {
      
      $row = $query->row();
      
      $data = array(
        'id' => $product_id,
        'qty' => 1,
        'price' => $row->price,
        'name' => $row->title,
      );
      
      $this->cart->insert($data);
      return true;
          
    }
    
    return false;
        
  }
    
}
