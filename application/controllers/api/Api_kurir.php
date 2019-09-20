<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Api_kurir extends REST_Controller {

    function __construct($config = 'rest')
    {
        // Construct the parent class
        parent::__construct($config);
        // $this->load->database();
    }


    //UNTUK GET DATA PEMBAYARAN
    function index_get(){
        $id_kurir = $this->get('id_kurir'); //mengambil parameter
        if($id_kurir == ''){
             $this->db->select('id_kurir,nama_kurir'); 
             $this->db->from('tb_kurir');   
             $kontak= $this->db->get()->result();
        }else{
            $this->db->where('id_kurir', $id_kurir); // where('field db nya','value yang di cari')
            $kontak = $this->db->get('tb_kurir')->result(); //mengambil data db
        }
        //die($this->db->last_query());
        $this->response($kontak, 200);
    }

    //UNTUK MENG INPUT DATA PEMBAYARAN
    function index_post(){
        //var_dump($_POST);
        //var_dump($this->input->post());
        $this->load->model('BuatKode_Act');
        $varid = $this->BuatKode_Act->kode_kurir();
        $data = array(
                    'id_kurir'=>$varid,
                    'nama_kurir'=>$this->input->post('nama_kurir'),
                    'username_kurir'=>$this->input->post('username_kurir'),
                      'pass_kurir'=>$this->input->post('pass_kurir'),
                      'alamat_kurir'=>$this->input->post('alamat_kurir'),
                      'jeniskel_kurir'=>$this->input->post('jeniskel_kurir'),
                      'noktp_kurir'=>$this->input->post('noktp_kurir')
                    
                );
        $insert = $this->db->insert('tb_kurir', $data); //insert ke db
        if($insert){
            $this->response($data, 200);
        }else{
            $this->response(array('status' => 'fail', 502));
        }
    }

}
