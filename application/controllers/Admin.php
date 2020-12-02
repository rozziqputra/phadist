<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
   public function __construct(){
    //memangil fungsi helper untuk ceek hak akses.
      parent :: __construct();
      is_logged_in();
       $this->load->model('Menu_model');

  }
   
   public function index(){
      $data['breadcrumb']= 'Admin / Dashboart';
      $data['title']= 'Admin';
      $data['user']= $this->db->get_where('pengguna', ['email'=>$this->session->userdata('email')])->row_array();
      $this->load->view('template/admin-header',$data);
      $this->load->view('template/admin-sidebar',$data);
      $this->load->view('template/admin-topbar',$data);
      $this->load->view('admin/index',$data);
      $this->load->view('template/admin-footer');

   } 

   public function akses(){
      $data['breadcrumb']= 'Admin / Akses';
      $data['title']='Hak Akses';
      $data['user']= $this->db->get_where('pengguna', ['email'=>$this->session->userdata('email')])->row_array();
      $data['akses']=$this->db->get('pengguna_akses')->result_array();

      $this->load->view('template/admin-header',$data);
      $this->load->view('template/admin-sidebar',$data);
      $this->load->view('template/admin-topbar',$data);
      $this->load->view('admin/akses',$data);
      $this->load->view('template/admin-footer');

   }

   public function hak_akses($akses_id){
      $data['breadcrumb']= 'Admin / Akses / Hak Akses';
      $data['title']='Hak Akses';
      $data['user']= $this->db->get_where('pengguna', ['email'=>$this->session->userdata('email')])->row_array();

      $data['akses']=$this->db->get_where('pengguna_akses', ['id' => $akses_id])->row_array();

      $this->db->where('id !=', 1);
      $data['menu']=$this->db->get('pengguna_menu')->result_array();

      $this->load->view('template/admin-header',$data);
      $this->load->view('template/admin-sidebar',$data);
      $this->load->view('template/admin-topbar',$data);
      $this->load->view('admin/hak-akses',$data);
      $this->load->view('template/admin-footer');
   }

   public function change_akses(){

      $id_menu = $this->input->post('menuId');
      $id_akses = $this->input->post('aksesId');
      $data =[
         'id_akses' => $id_akses,
         'id_menu' => $id_menu
      ];

      $result = $this->db->get_where('pengguna_akses_menu', $data);
      

      // cek apakah data adahgvhy
      if ($result->num_rows() < 1) {
         $this->db->insert('pengguna_akses_menu', $data);
      }else{
         $this->db->delete('pengguna_akses_menu', $data);
      }

      $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Hak akses Berhasil ditambah..</strong> Dirubah<button type="button" class="close"data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

   }

   public function tambah_akses(){
      $id_akses=$this->input->post('id');
      $pengguna_hakakses=$this->input->post('pengguna_hakakses');

      $this->form_validation->set_rules('pengguna_hakakses','Pengguna_HakAkses','required');

      if ($this->form_validation->run()== false) {
               $this->load->view('template/admin-header');
               $this->load->view('template/admin-sidebar');
               $this->load->view('template/admin-topbar');
               $this->load->view('admin/hak-akses');
               $this->load->view('template/admin-footer');
            }else{
            $data =[
                     'id' => $this->input->post('id'),
                     'pengguna_hakakses' => $this->input->post('pengguna_hakakses')  
            ];
            $this->db->insert('pengguna_akses',$data);
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Pengguna Berhasil</strong>Di Tamabhakan<button type="button" class="close"data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/akses');
            }
   }

   public function hapus_akses($id_akses){
         $this->db->where('id', $id_akses);
         $this->db->delete('pengguna_akses');

         $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Access..!</strong> Change..<button type="button" class="close"data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         redirect('admin/akses');
   }

   public function menu(){
    $data['breadcrumb']= 'Admin / Menu';
    $data['title']='Menu';
    $data['user']= $this->db->get_where('pengguna', ['email'=>$this->session->userdata('email')])->row_array();
        // echo'selamat datang '.$data['user']['name'];
    $data['menu']= $this->db->get('pengguna_menu')->result_array();

        // $this->form_validation->set_rules('menu','Menu', 'required');

        // if ($this->form_validation->run() == false) {
              $this->load->view('template/admin-header',$data);
              $this->load->view('template/admin-sidebar',$data);
              $this->load->view('template/admin-topbar',$data);
              $this->load->view('menu/index',$data);
              $this->load->view('template/admin-footer');
        //   }else{
        //     $this->db->insert('pengguna_menu',['menu' =>$this->input->post('menu')]);
        //     $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Menu</strong>has been added !<button type="button" class="close"data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        //     redirect('menu');
        // }
  }

  public function pengguna(){
   $data['breadcrumb']= 'Admin / Pengguna';
   $data['title']= 'Admin';
   $data['user']= $this->db->get_where('pengguna', ['email'=>$this->session->userdata('email')])->row_array();
   $data['pengguna']= $this->db->get('pengguna')->result_array();
   $this->load->view('template/admin-header',$data);
   $this->load->view('template/admin-sidebar',$data);
   $this->load->view('template/admin-topbar',$data);
   $this->load->view('pengguna/index',$data);
   $this->load->view('template/admin-footer');
  }



   

}