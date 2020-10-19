<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        //$this->load->model('M_user');

    }
    public function index()
    {
    	$data=[
    		"user"=>$this->db->get('user')->result(),
            "prodi"=>$this->db->get('prodi')->result()
    	];
    	$this->load->view('include/head');
        $this->load->view('kajur/include/header');
        $this->load->view('kajur/include/sidebar');
        $this->load->view('kajur/user',$data);
    }
    public function add()
    {
    	$cek=$this->db->query("select * from user where username='".$_POST['namaUser']."'");
        
        $this->form_validation->set_rules('namaUser', 'nip', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('level', 'level', 'required');
        
        if($this->form_validation->run()==FALSE){
            $message = array(
            'type' =>'error',
            'text'=>'Data Gagal Ditambahkan' );
            $this->session->set_flashdata('error', 'Data Gagal Ditambahkan');
            redirect('kajur/user/index','refresh');
        }
        else if ($cek->num_rows() > 0) {
            $message = array(
            'type' =>'error',
            'text'=>'Data Sudah Ada' );
            $this->session->set_flashdata('error', 'Username Sudah Ada');
            redirect('kajur/user/index','refresh');
        }
        else{
            $data=array(

                "nama"=>$_POST['nama'],
                "username"=>$_POST['namaUser'],
                "password"=>md5($_POST['Password']),
                "no_hp"=>$_POST['phone'],
                "level"=>$_POST['level'],
                "prodi"=>$_POST['prodi'],
            );
            $this->db->insert('user',$data);
            $message = array(
                'type' =>'success',
                'text'=>'Data Berhasil Disimpan' );
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('kajur/user/index','refresh');
        }
    }
    public function delete($id)
    {
    	$this->db->where('id', $id);
        $this->db->delete('user');
        $this->session->set_flashdata('success', 'Data Berhasil di Hapus');
        redirect('kajur/user/index','refresh');
    }
}