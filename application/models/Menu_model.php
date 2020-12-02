<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Menu_model extends CI_Model {

      // private $table= 'user_menu';
      // private $db;
      public function __construct(){
        $this->db->query("SET sql_mode = '' ");
		   $this->load->database();
    	}
  
      public function getSubMenu(){
          $query="SELECT `pengguna_sub_menu`.*, `pengguna_menu`.`menu`
                  FROM `pengguna_sub_menu` JOIN `pengguna_menu`
                  ON `pengguna_sub_menu`.`id_menu` = `pengguna_menu`.`id`
                ";

          return $this->db->query($query)->result_array();
      }

      public function iconall(){
        $query=$this->db->get('icon');
        return $query;
      }

      public function getMenubyid($id){
  
        return $this->db->get_where('pengguna_menu',['id'=>$id])->row_array();

        // $this->db->query(' SELECT * FROM user_menu WHERE id=:id');
        // $this->db->bind('id', $id);
        // return $this->db->single();

      }

      public function get_ubah_menu($data){
        // $query = "UPDATE user_menu SET
        //             menu = :menu 
        //           WHERE id = :id";
              
        //       $this->db->query($query);
        //       $this->db->bind('menu', $data['menu']);
        //       $this->db->bind('id', $data['id']);

        //       $this->db->execute();

        //       return $this->db->rowCount();

        $this->db->where('id',$data['id']);
        $this->db->update('pengguna_menu',$data);
            
      }

      public function get_subMenubyid($id){
  
        return $this->db->get_where('pengguna_sub_menu',['id'=>$id])->row_array();

        // $this->db->query(' SELECT * FROM user_menu WHERE id=:id');
        // $this->db->bind('id', $id);
        // return $this->db->single();

      }

      public function get_ubah_sub_menu($data){
      
        $this->db->where('id',$data['id']);
        $this->db->update('pengguna_sub_menu',$data);

      }



    }