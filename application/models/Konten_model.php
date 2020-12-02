<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Konten_model extends CI_Model {

      // private $table= 'user_menu';
      // private $db;
      public function __construct(){
        $this->db->query("SET sql_mode = '' ");
		   $this->load->database();
    	}
  
      public function get_barangAll(){
        $query=$this->db->get('barang');
        return $query;
      }

      public function get_barang_byid($id_barang){
  
        return $this->db->get_where('barang',['id_barang'=>$id_barang])->row_array();

      }


      // tranaksi

      public function get_transaksiAll(){
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('barang','transaksi.kd_transaksi = barang.id_barang');
        $this->db->join('pengguna','transaksi.kd_transaksi = pengguna.id');

        return $query=$this->db->get();
      }

      function get_data_barang_bykode($id_barang){
        $hsl=$this->db->query("SELECT * FROM barang WHERE id_barang='$id_barang'");
        if($hsl->num_rows()>0){
          foreach ($hsl->result() as $data) {
            $hasil=array(
              'id_barang' => $data->id_barang,
              'nama_barang' => $data->nama_barang,
              'harga' => $data->harga,
              );
          }
        }
        return $hasil;
      }
      
      function kode_transaksi(){
        $this->db->select('RIGHT (transaksi.kd_transaksi,5) as kode', FALSE);
        $this->db->order_by('kd_transaksi', 'DESC');
        $this->db->limit(1);

        $query =$this->db->get('transaksi');
        if($query->num_rows() > 0){
          $data =$query->row();
          $kode=intval($data->kode) +1;
        }
        else{
          $kode=1;
        }
        $kodemax =str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kode_tran ="CHC-1997-".$kodemax;
        return $kode_tran;
      }
      function insert_transaksi($transaksi){
          $this->db->insert('transaksi', $transaksi);
      }
    }