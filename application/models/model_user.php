<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_user extends CI_Model{
  
  public function loginValidate($email, $password, $admin = false){
    
    $hash = sha1($password);
    
    $admin_sql = "SELECT * FROM users
                  JOIN roles ON roles.uid = users.id 
                  WHERE roles.role = 1 AND email = ? AND password = ? LIMIT 1";
                  
    $query = $this->db->query($admin_sql, array($email, $hash));
    
    if ($query->num_rows() > 0) {
      
      $row = $query->row();
      $admin = true;
      $this->setUserSession($row, $admin);      
      return true;
      
    }
       
    $sql = "SELECT * FROM users WHERE email = ? AND password = ? LIMIT 1";
    $query = $this->db->query($sql, array($email, $hash));
    
    if ($query->num_rows() > 0) {
      
      $row = $query->row();
      $this->setUserSession($row, $admin);      
      return true;
          
    }
        
    return false;
    
  }

  public function setUserSession($row, $admin){
    
    $user = array (
              'uid'  => $row->id,
              'name'     => $row->name,
              'email'     => $row->email,
              'logged_in' => true,
              'admin' => $admin,
              );
    
    $this->session->set_userdata($user);
    
  }
  
}
