<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Api_login_pelanggan extends REST_Controller {

    function __construct($config = 'rest')
    {
        // Construct the parent class
        parent::__construct($config);
        // $this->load->database();
    }

    //UNTUK LOGIN
    function index_post(){
        $username_pelanggan = $this->input->post('username_pelanggan'); //mengambil parameter
        $password = sha1($this->input->post('password')); //mengambil parameter
        $cek_login = $this->db->query("select * from tb_pelanggan where username_pelanggan ='".urldecode($username_pelanggan)."' and pass_pelanggan = '".urldecode($password)."'")->row_array();
        //  die($this->db->last_query());
        if(count($cek_login) > 0){
            $this->response(array('status'=>'success','user'=>$cek_login,'error'=>false), 201);
        }else{
            $this->response(array('status'=>'fail'), 401);
        }
    }

}