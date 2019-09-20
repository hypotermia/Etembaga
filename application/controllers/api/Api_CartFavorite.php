    <?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Api_CartFavorite extends REST_Controller {

    function __construct($config = 'rest')
    {
        // Construct the parent class
        parent::__construct($config);
        // $this->load->database();
    }
    function index_get(){
        $id_produk = $this->input->get('id_produk');
        $favorit = $this->db->query("select favorit from tb_produk where id_produk='".$id_produk."'");
        $cart = $this->db->query("select cart from tb_produk where id_produk='".$id_produk."'");

        if ($cart==0 && $favorit>0) {
            $query=$this->db->query("select * from tb_produk where favorit='".$favorit."'");
            $this->response(array('status'=>'success','results'=>$query,'error'=>false), 200);
        }
        else{
            $query=$this->db->query("select * from tb_produk where cart='".$cart."'");   
            $this->response(array('status'=>'success','results'=>$query,'error'=>false), 200);
        }

        //die($this->db->last_query());

    }
    function index_post(){
        $id_produk= $this->input->post('id_produk');
        $favorit = $this->input->post('favorit');
        $cart = $this->input->post('cart');
        $query=$this->db->query("select cart,favorit from tb_produk where id_produk='".$id_produk."'");
          if(is_null($query)){
            $this->response(array('status'=>fail),501);
        
        }else{
                if($cart==0 && $favorit>0){
                    $update = $this->db->query("update tb_produk set favorit='".$favorit."' where id_produk='".$id_produk."'");
                    if($update==true){
                    $this->response(array('status'=>'success update favorit'),200);
                    //die($this->db->last_query());
                    }else{
                    $this->response(array('status'=>fail),501);                  
                    }
                }else{
                    $update = $this->db->query("update tb_produk set cart='".$cart."' where id_produk='".$id_produk."'");
                    if($update==true){
                    $this->response(array('status'=>'success update cart'),200);
                    //die($this->db->last_query());
                    }else{
                    $this->response(array('status'=>fail),501);                  
                    }
                }

         }
        

    }
}