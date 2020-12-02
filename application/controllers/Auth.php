<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
	} 

	public function index()
	{

		if ($this->session->userdata('email')){
			redirect('user'); 
		}

		$this->form_validation->set_rules('email','Email','trim|required|valid_email'); 
		$this->form_validation->set_rules('password','Password','trim|required'); 

		if ($this->form_validation->run()== false) {
				$data['title']='Masuk';
      	$data['judul']='PUSTAKA HADIST';
				$this->load->view('template/auth_header',$data);
				$this->load->view('auth/login',$data); 
				$this->load->view('template/auth_footer');
		}else{
			// methode login
			$this->_login();
		}
 }
  private function _login(){
		$email= $this->input->post('email');
		$password= $this->input->post('password');

		$user= $this->db->get_where('pengguna',['email' => $email])->row_array();
		// jika user ada
		if($user){

			// jika user aktif
			if ($user['aktif'] == 1) {

				// cek password
				if ($password == $user['password']) {
					//jika berhasil siapkan data
					$data=[
						'email' =>$user['email'],
						'id_akses' =>$user['id_akses']
					];
					// simpan data ke session
					$this->session->set_userdata($data);
					if ($user['id_akses']== 1) {
						redirect('admin');
					}if ($user['id_akses']== 3) {
						redirect('laporan/');
					}else{
						redirect('user');
					}

				}else{
					// password slah
					$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Password</strong> Tidak Sesuai<button type="button" class="close"data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('auth');
				}

			}else {
				//belum katif
				$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Email Aanda</strong>belum aktif Hubungi Admin<button type="button" class="close"data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('auth');
			}

		}else{
			// belum registrasi aktiv
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Emai anda</strong> Belum terdaftar<button type="button" class="close"data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('auth');

		}
  }

  	public function logout(){

			$this->session->unset_userdata('email');
			$this->session->unset_userdata('id_akses');
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Anda </strong> berhasil logout.<button type="button" class="close"data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('auth');
			}
  
}