<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Api_admin extends REST_Controller {

    function __construct($config = 'rest')
    {
        // Construct the parent class
        parent::__construct($config);
        // $this->load->database();
    }


    //UNTUK GET DATA PRODUK 
    function index_get(){
        $id_admin = $this->get('id_admin'); //mengambil parameter
        if($id_admin == ''){
            $kontak = $this->db->get('tb_administrator')->result(); //get('nama tabel di database')
        }else{
            $this->db->where('id_admin', $id_admin); // where('field db nya','value yang di cari')
            $kontak = $this->db->get('tb_administrator')->result(); //mengambil data db
        }
        $this->response($kontak, 200);
    }

    //UNTUK MENG INPUT DATA PRODUK 
    function index_post(){
        $data = array(
                    'id_admin'=>$this->post('id_admin'),
                    'nama_admin'=>$this->post('nama_admin'),
                    'usernama_admin'=>$this->post('username_admin'),
		    'pass_admin'=>$this->post('pas_admin'),
		    'notlp_admin'=>$this->post('notlp_admin'),
		    'email_admin'=>$this->post('email_admin'),
		    'alamat_admin'=>$this->post('alamat_admin'),
                    'kodepos_admin'=>$this->post('kodepos_admin'),
		    'kota_admin'=>$this->post('kota_admin'),
		    'prov_admin'=>$this->post('prov_admin'),
                    'noktp_admin'=>$this->post('noktp_admin')
                );
        $insert = $this->db->insert('tb_administrator', $data); //insert ke db
        if($insert){
            $this->response($data, 200);
        }else{
            $this->response(array('status' => 'fail', 502));
        }
    }

    //UNTUK MENG UPDATE SALAH SATU DATA ADMIN
    function index_put(){
        $id_admin = $this->put('id_admin');
        $data = array(
                    'id_admin'=>$this->put('id_admin'),
                    'nama_admin'=>$this->put('nama_admin'),
                    'usernama_admin'=>$this->put('username_admin'),
		    'pass_admin'=>$this->put('pas_admin'),
		    'notlp_admin'=>$this->put('notlp_admin'),
		    'email_admin'=>$this->put('email_admin'),
		    'alamat_admin'=>$this->put('alamat_admin'),
                    'kodepos_admin'=>$this->put('kodepos_admin'),
		    'kota_admin'=>$this->put('kota_admin'),
		    'prov_admin'=>$this->put('prov_admin'),
                    'noktp_admin'=>$this->put('noktp_admin')
                );
        $this->db->where('id_admin', $id_admin);
        $update = $this->db->update('tb_administrator', $data);
        if($update){
            $this->response($data, 200);
        }else{
            $this->response(array('status'=>'fail', 502));
        }
    }

    //UNTUK MENGHAPUS SALAH SATU DATA ADMIN
    function index_delete(){
        $id_admin = $this->delete('id_admin');
        $this->db->where('id_admin', $id_admin);
        $delete = $this->db->delete('tb_administrator');
        if($delete){
            $this->response(array('status'=>'success'), 201);
        }else{
            $this->response(array('status'=>'fail'), 502);
        }
    }
}
