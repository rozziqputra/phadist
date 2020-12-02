<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

   public function __construct(){
    //memangil fungsi helper untuk ceek hak akses.
      parent :: __construct(); 
      is_logged_in();
  }
   
   public function index(){
      $data['breadcrumb']= 'Admin / Menu';
    $data['title']='Menu';
      $data['user']=$this->db->get_where('pengguna',['email' => $this->session->userdata('email')])->row_array();
      var_dump( $data['user']);
      $this->load->view('template/admin-header',$data);
      $this->load->view('template/admin-sidebar',$data);
      $this->load->view('template/admin-topbar',$data);
      $this->load->view('user/index',$data);
      $this->load->view('template/admin-footer');

   }

}