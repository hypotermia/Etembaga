        <?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Api_EditProfile extends REST_Controller {

    function __construct($config = 'rest')
    {
        // Construct the parent class
        parent::__construct($config);
        // $this->load->database();
    }
    function index_post(){
        $username_pelanggan = $this->input->post('username_pelanggan');
        $query=$this->db->query("select username_pelanggan from tb_pelanggan where username_pelanggan='".$username_pelanggan."'");
        if(!is_null($query)){
        	$data = array(
                     'nama_pelanggan'=>$this->input->post('nama_pelanggan'),
		             'kodepos_pel'=>$this->input->post('kodepos_pel'),
                     'alamat_pelanggan'=>$this->input->post('alamat_pelanggan'),
		             'kotapel'=>$this->input->post('kotapel'),
                     'provpel'=>$this->input->post('provpel'),
		             'email'=>$this->input->post('email'),
                     'notlp_pel'=>$this->input->post('notlp_pel')
                );
        	$this->db->where('username_pelanggan', $username_pelanggan);
        	$update = $this->db->update('tb_pelanggan', $data);
        	if ($update==true) {
        		$this->response(array('status'=>'success'),200);
        	}
        	else{
        	$this->response(array('status'=>fail),501);        		
        	}

        }
        else{
        	$this->response(array('status'=>fail),501);
        }
        die($this->db->last_query());
    }
}