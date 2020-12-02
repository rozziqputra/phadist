<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
   public function __construct(){
    //memangil fungsi helper untuk ceek hak akses.
      parent :: __construct();
      is_logged_in();
    
  }
  
}