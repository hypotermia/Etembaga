<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Api_penerima extends REST_Controller {

    function __construct($config = 'rest')
    {
        // Construct the parent class
        parent::__construct($config);
        // $this->load->database();
    }


    //UNTUK GET DATA Penerima
    function index_get(){
        $id_penerima = $this->get('id_penerima'); //mengambil parameter
        if($id_penerima == ''){
            $kontak = $this->db->get('tb_penerima')->result(); //get('nama tabel di database')
        }else{
            $this->db->where('id_penerima', $id_penerima); // where('field db nya','value yang di cari')
            $kontak = $this->db->get('tb_penerima')->result(); //mengambil data db
        }
        $this->response($kontak, 200);
    }

    //UNTUK MENG INPUT DATA Penerima
    function index_post(){
        $data = array(
                    'id_penerima'=>$this->post('id_penerima'),
                    'id_pelanggan'=>$this->post('id_pelanggan'),
                    'nama_penerima'=>$this->post('nama_penerima'),
		    'alamat_penerima'=>$this->post('alamat_penerima'),
                    'kode_pos'=>$this->post('kode_pos'),
		    'id_ongkir'=>$this->post('id_ongkir'),
                    'kota_penerima'=>$this->post('kota_penerima'),
		    'notlp_penerima'=>$this->post('notlp_penerima'),
                    'email'=>$this->post('email')
                );
        $insert = $this->db->insert('tb_penerima', $data); //insert ke db
        if($insert){
            $this->response($data, 200);
        }else{
            $this->response(array('status' => 'fail', 502));
        }
    }

    //UNTUK MENG UPDATE SALAH SATU DATA Penerima
    function index_put(){
        $id_penerima = $this->put('id_penerima');
        $data = array(
                    
                    'id_penerima'=>$this->put('id_penerima'),
                    'id_pelanggan'=>$this->put('id_pelanggan'),
                    'nama_penerima'=>$this->put('nama_penerima'),
		    'alamat_penerima'=>$this->put('alamat_penerima'),
                    'kode_pos'=>$this->put('kode_pos'),
		    'id_ongkir'=>$this->put('id_ongkir'),
                    'kota_penerima'=>$this->put('kota_penerima'),
		    'notlp_penerima'=>$this->put('notlp_penerima'),
                    'email'=>$this->put('email')
                );
        $this->db->where('id_penerima', $id_penerima);
        $update = $this->db->update('tb_penerima', $data);
        if($update){
            $this->response($data, 200);
        }else{
            $this->response(array('status'=>'fail', 502));
        }
    }

    //UNTUK MENGHAPUS SALAH SATU DATA Penerima
    function index_delete(){
        $id_penerima = $this->delete('id_penerima');
        $this->db->where('id_penerima', $id_penerima);
        $delete = $this->db->delete('tb_penerima');
        if($delete){
            $this->response(array('status'=>'success'), 201);
        }else{
            $this->response(array('status'=>'fail'), 502);
        }
    }
}
