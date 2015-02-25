<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_cms extends CI_Model {
    
  public function getProducts(){
    
    $data = array();
        
    $query = $this->db->query("SELECT id,name FROM categories");
    
    if ($query->num_rows() > 0) {
      
      $categories = $query->result_array();
      
      foreach ($categories as $key => $value){
        
        $query = $this->db->query("SELECT * FROM products WHERE categorie_id = {$value['id']}");
        
        if ($query->num_rows() > 0) {
          
          $data['products'][$key]['categorie'] = $value['name'];
          $data['products'][$key]['product'] = $query->result_array();
          
        }
                
      }
                
    }
              
    return $data;
    
  }
  
  public function deleteProduct($id){
    
     $this->db->trans_begin();
    
     $this->db->query("DELETE FROM field_data_product_image WHERE product_id = ?", array($id));
     $this->db->query("DELETE FROM products WHERE id = ?", array($id));
    
     if ($this->db->trans_status() === FALSE) {
       
       $this->db->trans_rollback();
       
     } else {
       
       $this->db->trans_commit();
       $this->session->set_flashdata('verify', 'Product has been deleted!');
       return true;
         
     }
    
  }
  
}
