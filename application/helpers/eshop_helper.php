<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('die_r')) {
  
  function die_r($value) {
    
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    die();
    
  }
  
}