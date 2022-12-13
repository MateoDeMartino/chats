<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Index_library {
  
  public function index($datos){
    $CI =& get_instance();
    $CI->load->view('index',$datos);
  }

}