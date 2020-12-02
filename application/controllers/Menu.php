<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Menu extends CI_Controller {

  public function __construct(){
    //memangil fungsi helper untuk ceek hak akses.
    parent :: __construct();
    is_logged_in();
    $this->load->model('Menu_model');
    
  }
  public function index(){
    $data['breadcrumb']= 'Admin / Menu';
    $data['title']='Menu';
    $data['user']= $this->db->get_where('pengguna', ['email'=>$this->session->userdata('email')])->row_array();
    
        // echo'selamat datang '.$data['user']['name'];
    $data['menu']= $this->db->get('pengguna_menu')->result_array();
    $data['icon'] =$this->Menu_model->iconall()->result_array();

    
        $this->form_validation->set_rules('menu','Menu', 'required');

        if ($this->form_validation->run() == false) {
              $this->load->view('template/admin-header',$data);
              $this->load->view('template/admin-sidebar',$data);
              $this->load->view('template/admin-topbar',$data);
              $this->load->view('menu/index',$data);
              $this->load->view('template/admin-footer');
          }else{
            $menu=$this->input->post('menu');
            $icon=$this->input->post('icon');
            
            $data =[
              'menu' => $menu,
              'icon' => $icon
            ];

            $this->db->insert('pengguna_menu',$data);
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Menu</strong>has been added !<button type="button" class="close"data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('menu');
        }
  }

  public function getubah_menu(){
        // echo $_POST['id'];
        echo json_encode($this->Menu_model->getMenubyid($_POST['id']));
        // var_dump ($this->Menu_model->getMenubyid($_POST['id']));
      }


  public function ubah_menu(){
        if ($this->Menu_model->get_ubah_menu($_POST) > 0 ) {
          $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Gagal </strong> Di Ubah<button type="button" class="close"data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          redirect('menu/');
        }
        else {
          $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Berhasil </strong> Di Ubah<button type="button" class="close"data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          redirect('menu/');
        }

      }

      public function delete_menu($id){

          $this->db->where('id', $id);
          $this->db->delete('pengguna_menu');
          $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Access..!</strong> Change..<button type="button" class="close"data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          redirect('menu/');
      }


  public function sub_menu(){
        $data['title']='Sub Menu';
        $data['breadcrumb']= 'Admin / Sub Menu';
     
        $data['user']= $this->db->get_where('pengguna', ['email'=>$this->session->userdata('email')])->row_array();
        $data['icon'] =$this->Menu_model->iconall()->result_array();


        $this->load->model('Menu_model','menu');//load model bis di contruct

        $data['subMenu']=$this->menu->getSubMenu(); 
        $data['menu']=$this->db->get('pengguna_menu')->result_array();
        $data['aktifasi']=[
          'aktif'=>1,
          'non-aktif'=>0
        ];

        // form validation
        $this->form_validation->set_rules('sub_menu','Sub_menu', 'required');
        $this->form_validation->set_rules('id_menu','Menu', 'required');
        $this->form_validation->set_rules('url','Url', 'required');
        $this->form_validation->set_rules('icon','Icon', 'required');
      

          if ($this->form_validation->run()== false) {
              $this->load->view('template/admin-header',$data);
              $this->load->view('template/admin-sidebar',$data);
              $this->load->view('template/admin-topbar',$data);
              $this->load->view('menu/sub-menu',$data);
              $this->load->view('template/admin-footer');
          }else{
            $data =[
                    'sub_menu' => $this->input->post('sub_menu'),
                    'id_menu' => $this->input->post('id_menu'),  
                    'url' => $this->input->post('url'),  
                    'icon' => $this->input->post('icon'),  
                    'aktif' => $this->input->post('aktif')
            ];
            $this->db->insert('pengguna_sub_menu',$data);
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>User Sub Menu</strong>has been added !<button type="button" class="close"data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('menu/sub_menu');
          }

      }

      public function getubah_sub_menu(){
        // echo $_POST['id'];
        echo json_encode($this->Menu_model->get_subMenubyid($_POST['id']));
        // var_dump ($this->Menu_model->getMenubyid($_POST['id']));
      }

      public function ubah_sub_menu(){
        if ($this->Menu_model->get_ubah_sub_menu($_POST) > 0 ) {
          $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Gagal </strong> Di Ubah<button type="button" class="close"data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          redirect('menu/sub_menu');
        }
        else {
          $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Berhasil </strong> Di Ubah<button type="button" class="close"data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          redirect('menu/sub_menu');
        }

      }

      public function delete_sub_menu($id){

          $this->db->where('id', $id);
          $this->db->delete('pengguna_sub_menu');
          $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Access..!</strong> Change..<button type="button" class="close"data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          redirect('menu/sub_menu');
      }


}
  