<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	var $content = "";
	public function __construct(){
		parent::__construct();
		$this->load->model('MainAdmin');
		$this->load->model('Produk_act');
		$this->load->model('BuatKode_Act');
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
	}
	public function index()
	{
//		$this->MainAdmin->get_index();
		if($this->session->userdata('LOGGED')){
			$this->MainAdmin->get_index();
		}else{
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}
	public function v_produk(){
		if(($this->session->flashdata('status') != null)){
			$data['status'] = $this->session->flashdata('status');
		}
		$data['data'] = $this->Produk_act->get_produk();
		$this->content = $this->load->view('produk/index',$data,true);
		$this->index();
	}
	public function add_produk(){
		$data['kode_produk'] = $this->BuatKode_Act->kode_produk();
		$data['action'] = site_url().'/produk/store_produk';		
		$this->content = $this->load->view('produk/form',$data,true);
		$this->index();
	}
	function edit_produk($id){	
		$data['data'] = $this->Produk_act->get_produk($id);
		$data['action'] = site_url().'/produk/update_produk/'.$id;
		$this->content = $this->load->view('produk/form',$data,true);
		$this->index();
	}

	function store_produkxx(){
		$return = $this->Produk_act->process_add();
		if($return){
			$data = "success";
		}else{
			$data = "error";
		}
		$this->session->set_flashdata('status', $data);
		redirect('produk/v_produk');
	}
	function store_produk(){
		// $this->load->helper('file');  
		$data = $this->input->post('data');
		$config = array(
			array(
				'field' => 'photo',
				'label' => 'photo',
				'rules' => 'callback_upload_image'
			)
		);
		$this->form_validation->set_rules($config);
		if($this->form_validation->run() == FALSE)
        {
			$data['kode_produk'] = $this->BuatKode_Act->kode_produk();
			$data['action'] = site_url().'/produk/store_produk';		
			$this->content = $this->load->view('produk/form',$data,true);
			$this->index();
		}else{
			$config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf|doc';
            $config['max_size']             = 1000;
            $config['max_width']            = 1300;
            $config['max_height']           = 1024;
            $this->load->library('upload', $config);
			if(isset($_FILES['photo']) && !empty($_FILES['photo']['name'])){
				if ($this->upload->do_upload('photo'))
                {
                	$upload_data = $this->upload->data();
					$data['photo'] = $upload_data['file_name'];
					$return = $this->Produk_act->process_add($data);
				}else{
					$this->form_validation->set_message('upload_image', $this->upload->display_errors());
					return FALSE;
				}				
			}else{
				$return = $this->Produk_act->process_add($data);
			}
			if($return){
				$data = "success";
			}else{
				$data = "error";
			}
			$this->session->set_flashdata('status', $data);
			redirect('produk/v_produk');
		}
	}
	function update_produkxxx($id){
		$return = $this->Produk_act->process_update($id);
		if($return){
			$data = "success";
		}else{
			$data = "error";
		}
		$this->session->set_flashdata('status', $data);
		redirect('produk/v_produk');		
	}
	function update_produk($id){
		$data = $this->input->post('data');
		$config = array(
			array(
				'field' => 'photo',
				'label' => 'photo',
				'rules' => 'callback_upload_image'
			)
		);
		$this->form_validation->set_rules($config);
		if($this->form_validation->run() == FALSE)
        {
			$data['data'] = $this->Produk_act->get_produk($id);
			$data['action'] = site_url().'/produk/update_produk/'.$id;
			$this->content = $this->load->view('produk/form',$data,true);
			$this->index();
		}else{
			$config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf|doc';
            $config['max_size']             = 1000;
            $config['max_width']            = 1300;
            $config['max_height']           = 1024;
            $this->load->library('upload', $config);
			if(isset($_FILES['photo']) && !empty($_FILES['photo']['name'])){				
				if ($this->upload->do_upload('photo'))
                {
                	$upload_data = $this->upload->data();
					$data['photo'] = $upload_data['file_name'];
					$return = $this->Produk_act->process_update($id,$data);
					//menghapus photo sebelumnya
					$photo_old = $this->input->post('photo_old');
					if($photo_old != "default.jpg"){
						unlink("./uploads/".$photo_old);
					}					
					//end
				}else{
					$this->form_validation->set_message('upload_image', $this->upload->display_errors());
					return FALSE;
				}				
			}else{
				$return = $this->Produk_act->process_update($id,$data);
			}			
			if($return){
				$data = "success";
			}else{
				$data = "error";
			}
			$this->session->set_flashdata('status', $data);
			redirect('produk/v_produk');	
		}	
	}

	function delete_produk($id){
		$this->Produk_act->process_delete($id);
		redirect('produk/v_produk');
	}
	
	public function upload_image() {
			$nmfile = "image_".time();
			$config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf|doc';
            $config['max_size']             = 1000;
            $config['max_width']            = 1300;
            $config['max_height']           = 1024;
			$config['file_name'] 			= $nmfile;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if(isset($_FILES['photo']) && !empty($_FILES['photo']['name']))
			{
				if ( ! $this->upload->do_upload('photo'))
				{
					$this->form_validation->set_message('upload_image',$this->upload->display_errors());
					return FALSE;
				}else{
					$upload_data = $this->upload->data();
					unlink("./uploads/".$upload_data['file_name']);
					return TRUE;
				}
			}else{
				return TRUE;
			}
	}
	
}
