<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
      public function __construct(){
      parent :: __construct();
   }	
   
   public function index(){
      $data['title']='Pustaka Hadist';
      $data['judul']='PUSTAKA HADIST';
      
      $this->load->view('template/header',$data);
      $this->load->view('home/index');
      $this->load->view('template/footer');

   }

}