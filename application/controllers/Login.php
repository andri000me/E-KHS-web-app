<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {



	public function index()
	{
		$this->load->model('M_login');
		$this->M_login->masuk();
		$this->load->view('login');
	
	}
	public function Cek_Login()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		
		$this->load->model('M_login');
		$this->M_login->get_data($username,md5($password));
	}

	public function logout()
	{
		$this->session->set_userdata('username',FALSE);
		$this->session->sess_destroy();
		redirect('login');
	}
}
