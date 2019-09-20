<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_act extends CI_Model {
	public function __contruct(){
		parent :: __construct();
		$this->load->database();
	}
	public function process_login()
	{
		$user = $this->input->post('username',true);
		$pass = $this->input->post('password',true);		
		//$sql = "SELECT * FROM tb_pelanggan WHERE username='$user' AND password='$pass'";		
		//$query_cek = $this->db->query($sql);
		$query_cek = $this->db->where('username_admin',$user)
							  ->where('pass_admin',$pass)
							  ->get('tb_administrator');
		if($query_cek->num_rows() > 0){
			$username = $query_cek->row()->username_admin;
			$nama_admin = $query_cek->row()->nama_admin;
			$email_admin = $query_cek->row()->email_admin;
			$role = $query_cek->row()->role;
//			$logo = $query_cek->row()->logo;			
			$sess = array('username' => $username,
						  'nama_admin' => $nama_admin,
						  'email_admin' => $email_admin,
						  'LOGGED' => 'LOGGED',
						  'ROLE' => $role,
						 );						  
			$this->session->set_userdata($sess);
//			redirect(base_url());
			$data = array('error'=> 'berhasil');
			return $data;
		}else{
			$data = array('error'=> 'Username atau password yang anda masukan salah !');
			return $data;
		}
		
	}
	
	public function proses_lupa_password($user,$email){		
		$query = $this->db->where('username',$user)
						  ->where('email',$email)
					      ->get('tb_pelanggan');
		if($query->num_rows() > 0){
			$res = $query->row();
			$data = array('return'=>'1','username'=>$res->username,'password'=>$res->password,'email'=>$res->email,'nama_sekolah'=>$res->nama_sekolah);
			return  $data;
		}else{
			$data = array('return'=>'0','error' => 'Username atau email yang anda masukan tidak terdaftar');
			return $data;
		}
	}
}
