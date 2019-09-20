    <?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Api_change_password extends REST_Controller {

    function __construct($config = 'rest')
    {
        // Construct the parent class
        parent::__construct($config);
        // $this->load->database();
    }
    function index_post(){
        $username_pelanggan = $this->input->post('username_pelanggan');
        $query=$this->db->query("select username_pelanggan from tb_pelanggan where username_pelanggan='".$username_pelanggan."'");
        $encrptPass = sha1($this->input->post('pass_pelanggan'));
                //die($this->db->last_query());
        if(is_null($query)){
            $this->response(array('status'=>fail),501);
         }
        else{
            $update = $this->db->query("update tb_pelanggan set pass_pelanggan='".$encrptPass."' where username_pelanggan='".$username_pelanggan."'");
            if($update==true){
            $this->response(array('status'=>'success'),200);
            //die($this->db->last_query());
        }
        else{
          $this->response(array('status'=>fail),501);  
        }
        }

    }
}