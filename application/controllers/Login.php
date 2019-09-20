<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	var $content = "";
	public function __construct(){
		parent::__construct();
		$this->load->model('Login_act');
		$this->load->helper('url');
		$this->load->model('MainAdmin');
	}
	public function index($data = array('error'=>''))
	{
//		$this->MainAdmin->get_index();
		if($this->session->userdata('username',true)){			
			$this->MainAdmin->get_index();
		}else{
			$this->load->view('login',$data);
		}
	}
	public function lupa_password($data = ""){
		$this->load->view('lupa_password',$data);
	}
	public function proses_lupa_password(){
		$user = $this->input->post('username',true);
		$email = $this->input->post('email',true);
		$ret = $this->Login_act->proses_lupa_password($user,$email);
		print_r($ret);
		//return false;
		if($ret['return'] == '1'){
			$this->sendMail($ret['email'],$ret['username'],$ret['password'],$ret['nama_sekolah']);
			$data = "success";
			$pesan = "Kami Telah Mengirimkan Username dan Password Akun Ke Email Anda";
			$this->session->set_flashdata('status', $data);
			$this->session->set_flashdata('pesan', $pesan);
			redirect('dataSekolah');	
		}else{
			$this->lupa_password($ret);
		}
	}
	public function process_login(){	
		$data = $this->Login_act->process_login();
		$this->index($data);	
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
	
//	function sendMail($email,$username,$password,$nama_sekolah) {
//        $ci = get_instance();
//        $ci->load->library('email');
//        $config['protocol'] = "smtp";
//        $config['smtp_host'] = "ssl://smtp.gmail.com";
//        $config['smtp_port'] = "465";
//        $config['smtp_user'] = "khariri5@gmail.com";
//        $config['smtp_pass'] = "ojongesu";
//        $config['charset'] = "utf-8";
//        $config['mailtype'] = "html";
//        $config['newline'] = "\r\n";
//        
//        $ci->email->initialize($config);
// 
//        $ci->email->from('khariri5@gmail.com', 'Aplikasi Cari Info Sekolah');
//        $list = array($email);
//		$message = '<html><body bgcolor="#DDDDDD" style="background: #DDDDDD; padding: 0px; margin: 0px auto;">
//					<table width="100%" border="0" cellpadding="0" cellspacing="0" >
//					  <tr>
//						<td bgcolor="#6C7A89" align="center" style="text-align: center; padding-top: 0px; padding-right: 10px; padding-bottom: 0px; padding-left: 10px; margin: 0px;" ><div align="center">
//							<table width="630" border="0" cellpadding="0" cellspacing="0">
//							  <tr>
//								<td><table width="630" border="0" cellspacing="0" cellpadding="0">
//									<tr>
//									  <td align="left" colspan="2" style="border-top: none; border-right: none; border-bottom: 12px solid #586BFC; border-left: none;"><table width="630" border="0" cellspacing="0" cellpadding="0">
//										  <tr>
//											<td align="left" valign="middle"><table border="0" cellspacing="30" cellpadding="0" >
//												<tr>
//												  <td><img src="'.base_url().'assets/icon5.png" border="no" style="margin: 0px; padding: 0px; display: block;"/></td>
//												</tr>
//											  </table>
//											</td>
//										  </tr>
//										</table></td>
//									</tr>
//									<tr>
//									  <td align="left" bgcolor="#FFFFFF" colspan="2" style="border-top: none; border-right: none; border-bottom: 4px solid #DDDDDD; border-left: none;"><table align="left" width="630" border="0" cellspacing="0" cellpadding="0">
//										  <tr>
//											<td bgcolor="#FFFFFF" width="210" align="left" valign="top" style="padding: 0px"><table width="209" border="0" cellspacing="0" cellpadding="0">
//												<tr>
//												  <td align="right" bgcolor="#F1F1F1" style="font-family: Arial,Helvetica,sans-serif; font-size: 16px; line-height: 20px; font-weight: bold; color: #222222; padding-top: 16px; padding-right: 10px; padding-bottom: 16px; padding-left: 24px; ">
//												  Lupa Password<br><span style="color: #222222; font-size: 10px; text-decoration: none;">'.$nama_sekolah.'</span><br/>
//												  </td>
//												</tr>
//											  </table></td>
//											<td bgcolor="#FFFFFF" width="420" align="left" valign="top" ><table border="0" cellspacing="0" cellpadding="0" >
//												<tr>
//												  <td align="left" style="font-family: Arial,Helvetica,sans-serif; font-size: 12px; line-height: 18px; color: #999999; padding-top: 12px; padding-right: 24px; padding-bottom: 24px; padding-left: 24px;"><table width="372" border="0" cellspacing="0" cellpadding="0" style="font-family: Arial,Helvetica,sans-serif; font-size: 12px; line-height: 18px; color: #222222;">
//													  <tr>
//														<td height="30" align="left" valign="middle">		
//														Password Akun Anda Yaitu:
//														<table style="margin: 4px 4px 4px 0px; font-family: arial; font-size:12px; font-weight: 700;">
//														<tr>
//															<td width="65">Username</td>
//															<td>: <b>'.$username.'</b></td>
//														</tr>
//														<tr>
//															<td>Password</td>
//															<td>: <b>'.$password.'</b></td>
//														</tr>
//														</table>
//													  </td>
//													 </tr>
//													</table></td>
//												</tr>
//											  </table></td>
//										  </tr>
//										</table></td>
//									</tr>
//									<tr>
//									  <td align="left" bgcolor="#FFFFFF" colspan="2" style="border-top: 11px solid #222222; border-right: none; border-bottom: none; border-left: none; font-size: 11px;"><table align="left" width="630" border="0" cellspacing="0" cellpadding="0">
//										  <tr>
//											<td bgcolor="#F1F1F1" width="210" align="left" valign="top" ><table width="210" border="0" cellspacing="0" cellpadding="0" style="font-family: Arial,Helvetica,sans-serif; font-size: 11px; line-height: 18px; color: #999999;">
//												<tr>
//												  <td style="font-family: Arial,Helvetica,sans-serif; font-size: 11px; line-height: 20px; font-weight: bold; color: #222222; padding-top: 16px; padding-right: 24px; padding-bottom: 0px; padding-left: 20px;"> Browse online</td>
//												</tr>
//												<tr>
//												  <td style="font-family: Arial,Helvetica,sans-serif; font-size: 11px; line-height: 18px; color: #222222; padding-top: 0px; padding-right: 24px; padding-bottom: 0px; padding-left: 20px;">&#8226; <a href="'.site_url().'" title="Cari Info Sekolah" target="_blank" style="color: #586BFC; text-decoration: none;">Cari Info Sekolah</a></td>
//												</tr>
//											  </table></td>
//											<td bgcolor="#F1F1F1" width="209" align="left" valign="top" style="border-left: 1px solid #DDDDDD;"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family: Arial,Helvetica,sans-serif; font-size: 11px; line-height: 18px; color: #999999; ">
//												<tr>
//												  <td style="font-family: Arial,Helvetica,sans-serif; font-size: 11px; line-height: 20px; font-weight: bold; color: #222222; padding-top: 16px; padding-right: 24px; padding-bottom: 0px; padding-left: 20px;"> Contact Person</td>
//												</tr>
//												<tr>
//												  <td style="font-family: Arial,Helvetica,sans-serif; font-size: 11px; line-height: 18px; color: #999999; padding-top: 0px; padding-right: 24px; padding-bottom: 0px; padding-left: 20px;">Phone : +0213 (6889) </td>
//												</tr>
//												<tr>
//												  <td style="font-family: Arial,Helvetica,sans-serif; font-size: 11px; line-height: 18px; color: #999999; padding-top: 0px; padding-right: 1px; padding-bottom: 10px; padding-left: 20px;">Email : cari_infosekolah@gmail.com<br></td>
//												</tr>
//												<tr>
//												  <td style="font-family: Arial,Helvetica,sans-serif; font-size: 11px; line-height: 18px; color: #999999; padding-top: 0px; padding-right: 1px; padding-bottom: 0px; padding-left: 20px;">&nbsp;</td>
//												</tr>
//											  </table></td>
//										  </tr>
//										</table></td>
//									</tr>
//							</table>
//						  </div></td>
//					  </tr>
//					</table>
//					</body></html>';
//        $ci->email->to($list);
//        $ci->email->subject('Aplikasi Cari Info Sekolah');
//        $ci->email->message($message);
//        if ($this->email->send()) {
//            echo 'Email sent.';
//        } else {
//            show_error($this->email->print_debugger());
//        }
//    }
}
