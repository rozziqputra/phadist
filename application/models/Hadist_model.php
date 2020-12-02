<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hadist_model extends CI_Model {

      // private $table= 'user_menu';
      // private $db;
      public function __construct(){
        $this->db->query("SET sql_mode = '' ");
		   $this->load->database();
    	}
  
      public function get_hadistAll(){
        $query=$this->db->get('tb_hadist');
        return $query;
      }


      // ====== PERAWI ============
      public function get_perawiAll(){
        $query=$this->db->get('tb_perawi');
        return $query;
      }

      public function get_perawi_byId($id_perawi){
        return $this->db->get_where('tb_perawi',['id_perawi' =>$id_perawi])->row_array();
      }

      public function get_ubah_perawi($data){
        $this->db->where('id_perawi', $data['id_perawi']);
        $this->db->update('tb_perawi', $data);
      }




}