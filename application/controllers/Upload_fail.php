<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
//				$this->load->library('upload');
        }

        public function index()
        {
                $this->load->view('upload_form', array('error' => ' ' ));
        }

        public function do_upload()
        {
//				$this->config->load('upload');
                $config['upload_path'] = './assets/foto_pelamar/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 1024;
//                $config['max_width']            = 1024;
//                $config['max_height']           = 768;
//				print_r($config);
//				$this->upload->initialize($config);
//                $this->load->library('upload');
//				$this->upload->set_upload_path("./upload/");
				//CANNOT DO THIS BECAUSE ITS USED IN do_upload function you would need to extend the upload library and create your own set function.
//				$this->upload->set_file_name("test");
//
//				$this->upload->do_upload();
				$this->upload->initialize($config);
                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('upload_success', $data);
                }
        }
}
?>