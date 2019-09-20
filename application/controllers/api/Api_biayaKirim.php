<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Api_biayaKirim extends REST_Controller {

    function __construct($config = 'rest')
    {
        // Construct the parent class
        parent::__construct($config);
        // $this->load->database();
    }


    //UNTUK GET DATA BIAYA KIRIM
    function index_get(){
        $id = $this->get('id_ongkir'); //mengambil parameter
        if($id_ongkir == ''){
            $kontak = $this->db->get('tb_biayakirim')->result(); //get('nama tabel di database')
        }else{
            $this->db->where('id_ongkir', $id_ongkir); // where('field db nya','value yang di cari')
            $kontak = $this->db->get('tb_biayakirim')->result(); //mengambil data db
        }
        $this->response($kontak, 200);
    }

    //UNTUK MENG INPUT DATA BIAYA KIRIM
    function index_post(){
        $data = array(
                    'id_ongkir'=>$this->post('id_ongkir'),
                    'kota_kirim'=>$this->post('kota_kirim'),
                    'biaya'=>$this->post('biaya')
                );
        $insert = $this->db->insert('tb_biayakirim', $data); //insert ke db
        if($insert){
            $this->response($data, 200);
        }else{
            $this->response(array('status' => 'fail', 502));
        }
    }

    //UNTUK MENG UPDATE SALAH SATU DATA BARANG MASUK
    function index_put(){
        $id = $this->put('id');
        $data = array(
                    'id_ongkir'=>$this->put('id_ongkir'),
                    'kota_kirim'=>$this->put('kota_kirim'),
                    'biaya'=>$this->put('biaya')
                );
        $this->db->where('id', $id);
        $update = $this->db->update('tb_biayakirim', $data);
        if($update){
            $this->response($data, 200);
        }else{
            $this->response(array('status'=>'fail', 502));
        }
    }

    //UNTUK MENGHAPUS SALAH SATU DATA BIAYA KIRIM
    function index_delete(){
        $id_ongkir = $this->delete('id_ongkir');
        $this->db->where('id_ongkir', $id_ongkir);
        $delete = $this->db->delete('tb_biayakirim');
        if($delete){
            $this->response(array('status'=>'success'), 201);
        }else{
            $this->response(array('status'=>'fail'), 502);
        }
    }
}
