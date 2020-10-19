<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pejabat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        //$this->load->model('M_user');

    }
    public function index()
    {
    	$data=[
    		"pejabat"=>$this->db->get('pejabat')->result()
    	];
    	$this->load->view('include/head');
        $this->load->view('kajur/include/header');
        $this->load->view('kajur/include/sidebar',$data);
        $this->load->view('kajur/pejabat',$data);
    }
    public function edit()
    {
    	$this->form_validation->set_rules('nip', 'nip', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');

        if($this->form_validation->run()==FALSE){
            $message = array(
            'type' =>'error',
            'text'=>'Data Gagal Di Diedit' );
            $this->session->set_flashdata('error', 'Data Gagal Di Diedit');
            redirect('kajur/pejabat','refresh');
        }
        else{
            $data=array(

                "nip"=>$_POST['nip'],
                "nama"=>$_POST['nama'],
            );
            if(!empty($_FILES["foto"]["name"])){
              $config['upload_path']          = './assets/images/pejabat/';
              $config['allowed_types']        = 'gif|jpg|png';
              $config['file_name']            = $this->input->post('id');
              $config['overwrite']            = true;
              $config['max_size']             = 1024 * 10; // 1MB
              
              $this->load->library('upload', $config);
              if ($this->upload->do_upload('foto')) {
                  $this->load->library('simple_image');
                      $this->simple_image
                           ->fromFile('./assets/images/pejabat/'.$this->upload->data("file_name"))
                           ->thumbnail(500, 500, 'center')
                           ->toFile('./assets/images/pejabat/'.$this->upload->data("file_name"));
                $data=array(
                  "nip"=>$_POST['nip'],
                  "nama"=>$_POST['nama'],
                  "foto"=>$this->upload->data("file_name")
                );

              }
              else{
                $this->session->set_flashdata('error', 'Foto Gagal Di Upload');
                redirect('kajur/pejabat','refresh');
              }
            }

            $this->db->where('kode', $_POST['id']);
            $this->db->update('pejabat',$data);
            $message = array(
                'type' =>'success',
                'text'=>'Data Dosen Berhasil Diedit');
            $this->session->set_flashdata('success', 'Data Dosen Berhasil Diedit');
            redirect('kajur/pejabat','refresh');
        }
    }
    public function delete()
    {
    	
    }
}