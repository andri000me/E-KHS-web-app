<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profile extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('M_dosen');
        $this->load->model('M_profile');

    }

    // List all your items
    public function index( $offset = 0 )
    {
        
        $this->load->view('include/head');
        $this->load->view('include/header_dosen');
        $this->load->view('include/sidebar_dosen');
        $this->load->view('dosen/profile');
        
        
    }
    public function getData()
    {
        $data=$this->M_dosen->getDosen();
        echo json_encode($data);
    }

    
   
    //Update one item
    public function update()

    {
        $data=$this->M_profile->update('dosen');
        echo json_encode($data);
    }

    public function ubahPassword()
    {
        $data=$this->M_profile->change_password('dosen');
        echo json_encode($data);
    }
    public function ubahFoto()
    {
        $config['upload_path']          = './assets/images/dosen/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->session->userdata('username');
        $config['overwrite']            = true;
        $config['max_size']             = 1024 * 10; // 1MB
        
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto')) {
            $this->load->library('simple_image');
                $this->simple_image
                     ->fromFile('./assets/images/dosen/'.$this->upload->data("file_name"))
                     ->thumbnail(500, 500, 'center')
                     ->toFile('./assets/images/dosen/'.$this->upload->data("file_name"));
            $data=array(
                "foto"=>$this->upload->data("file_name"),   
            );
            $this->db->where('nip', $this->session->userdata('username'));
            $this->db->update('dosen', $data);
            $this->session->set_userdata($data);
            $message = array(
                'type' =>'success',
                'text'=>'Foto Profil Berhasil Di Ubah');
            echo json_encode($message);
        }
        else{
           $message = array(
                'type' =>'error',
                'text'=>'Foto Profil Gagal Di Upload');
            echo json_encode($message);
        }
    }

   
}

/* End of file Controllername.php */

