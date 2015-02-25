<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// $route[urlencode('אודות')] = "about";

$route['products/(:any)'] = 'products/index/$1';
$route['default_controller'] = "home";
$route['404_override'] = '';
