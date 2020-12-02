<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hadist extends CI_Controller {

  public function __construct(){
    //memangil fungsi helper untuk ceek hak akses.
    parent :: __construct();
    is_logged_in();
    $this->load->model('Hadist_model');
    
  }
  public function index(){  
    $data['breadcrumb']= 'Hadist / Data Hadist ';
    $data['title']= 'Admin';
    $data['user']= $this->db->get_where('pengguna', ['email'=>$this->session->userdata('email')])->row_array();
    $data['pengguna']= $this->db->get('pengguna')->result_array();

    $data['hadist'] = $this->Hadist_model->get_hadistAll()->result_array();

    // var_dump($data['hds']);

    $this->load->view('template/admin-header',$data);
    $this->load->view('template/admin-sidebar',$data);
    $this->load->view('template/admin-topbar',$data);
    $this->load->view('hadist/index',$data);
    $this->load->view('template/admin-footer');
  }



  // --------------------- sourcecode perawi-----------------------
  public function data_perawi(){
    $data['breadcrumb']= 'Hadist / Data Perawi ';
    $data['title']= 'Perawi';
    $data['user']= $this->db->get_where('pengguna', ['email'=>$this->session->userdata('email')])->row_array();
    $data['pengguna']= $this->db->get('pengguna')->result_array();
    $data['perawi'] = $this->Hadist_model->get_perawiAll()->result_array();


    // var_dump($data['hds']);
    $this->form_validation->set_rules('nama','Nama', 'required');
    $this->form_validation->set_rules('keterangan','Keterangan', 'required');

    if($this->form_validation->run()== false){
      $this->load->view('template/admin-header',$data);
      $this->load->view('template/admin-sidebar',$data);
      $this->load->view('template/admin-topbar',$data);
      $this->load->view('hadist/perawi',$data);
      $this->load->view('template/admin-footer');
    }else{
      $data=[
        'nama'=>$this->input->post('nama'),
        'keterangan'=>$this->input->post('keterangan')
      ];
      $this->db->insert('tb_perawi',$data);
      $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>User Perawi</strong>Berhasil di tambahkan !<button type="button" class="close"data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('hadist/data_perawi');
    }
  }

  public function get_ubah_perawi(){
    echo json_encode($this->Hadist_model->get_perawi_byId($_POST['id_perawi']));
  }

  public function ubah_perawi(){
    if ($this->Hadist_model->get_ubah_perawi($_POST) > 0 ) {
          $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Data Gagal </strong> Di Ubah<button type="button" class="close"data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          redirect('hadist/data_perawi');
        }
        else {
          $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Data Berhasil </strong> Di Ubah<button type="button" class="close"data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          redirect('hadist/data_perawi');
        }
  }

  public function hapus_perawi($id_perawi){
    $this->db->where('id_perawi', $id_perawi);
    $this->db->delete('tb_perawi');
    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Data Berhasil </strong> Dihapus<button type="button" class="close"data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    redirect('hadist/data_perawi');

  }




  // --------------------- sourcecode perawi-----------------------

}