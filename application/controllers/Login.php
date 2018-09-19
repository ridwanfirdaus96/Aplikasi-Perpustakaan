<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mainmodel','model');
	}
	public function index()
	{
		if ($this->session->userdata('username')===null) {
			$this->load->view('admin/v_login');
		}else{
			redirect('admin','refresh');
		}
	}
	public function dologin()
	{
		$cek = $this->model->dologin();
		if ($cek) {
			redirect('admin','refresh');
		}else{
			$this->session->set_flashdata('error', 'Username atau password tidak cocok!');
			redirect('login','refresh');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login','refresh');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */