<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Api_pengiriman extends REST_Controller {

    function __construct($config = 'rest')
    {
        // Construct the parent class
        parent::__construct($config);
        // $this->load->database();
    }


    //UNTUK GET DATA Pengiriman
    function index_get(){

        $id_pengiriman = $this->get('id_pengiriman'); //mengambil parameter
        if($id_pengiriman == ''){
            $kontak = $this->db->get('tb_pengiriman')->result(); //get('nama tabel di database')
        }else{
            $this->db->where('id_pengiriman', $id_pengiriman); // where('field db nya','value yang di cari')
            $kontak = $this->db->get('tb_pengiriman')->result(); //mengambil data db
        }
        $this->response($kontak, 200);
    }

    //UNTUK MENG INPUT DATA Penerima
    function index_post(){
        $this->load->model('BuatKode_Act');
        $varid = $this->BuatKode_Act->kode_pengiriman();
        $data = array(
                    'id_pengiriman'=>$varid,
                    'id_kurir'=>$this->post('id_kurir'),
                    'id_pesanan'=>$this->post('id_pesanan')
		   );
        $insert = $this->db->insert('tb_pengiriman', $data); //insert ke db
        if($insert){
            $this->response($data, 200);
        }else{
            $this->response(array('status' => 'fail', 502));
        }
    }

    //UNTUK MENG UPDATE SALAH SATU DATA Pengiriman
    function index_put(){
        $id_pengiriman = $this->put('id_pengiriman');
        $data = array(
                    'id_pengiriman'=>$this->put('id_pengiriman'),
                    'id_kurir'=>$this->put('id_kurir'),
                    'alamat'=>$this->put('alamat'),
		    'status'=>$this->put('status'),
                    'id_pesanan'=>$this->put('id_pesanan')
                );
        $this->db->where('id_pengiriman', $id_pengiriman);
        $update = $this->db->update('tb_pengiriman', $data);
        if($update){
            $this->response($data, 200);
        }else{
            $this->response(array('status'=>'fail', 502));
        }
    }

    //UNTUK MENGHAPUS SALAH SATU DATA Pengiriman
    function index_delete(){
        $id_pengiriman = $this->delete('id_pengiriman');
        $this->db->where('id_pengiriman', $id_pengiriman);
        $delete = $this->db->delete('tb_pengiriman');
        if($delete){
            $this->response(array('status'=>'success'), 201);
        }else{
            $this->response(array('status'=>'fail'), 502);
        }
    }
}
