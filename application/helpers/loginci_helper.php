<?php
function is_logged_in(){
  // memanggil librari ci 

  $ci = get_instance();
  // cek sessionya
  if (!$ci->session->userdata('email')){
    redirect('auth');
  }else{
    //ambil ata id aksesnya  
    $id_akses =$ci->session->userdata('id_akses');
    //ambil data  id menu di url
    $menu= $ci->uri->segment(1);
    //ambil menu dari db pengguna menu 
    $ci->db->query("SET sql_mode = '' ");

    $query_menu =$ci->db->get_where('pengguna_menu', ['menu' => $menu])->row_array();

    // cek id di db role akses menu
    $id_menu = $query_menu['id'];

    $ci->db->query("SET sql_mode = '' ");
    $aksesPengguna= $ci->db->get_where('pengguna_akses_menu', [
                'id_akses' => $id_akses,
                'id_menu' => $id_menu
                
                ] );

      // CEK LOGIN

      if ($aksesPengguna->num_rows() < 1) {
          redirect('auth');
          
      }
  }
}

// fungsi untuk melakukan ceklist
function check_access($id_akses, $id_menu){

  $ci = get_instance();
  
  // cek data yang boleh di aksees 
  $ci->db->where('id_akses', $id_akses);
  $ci->db->where('id_menu', $id_menu);
  $result =$ci->db->get('pengguna_akses_menu');

  // cek baris pada result

  if ($result->num_rows() > 0) {
      return "checked='checked'";
  }


}

