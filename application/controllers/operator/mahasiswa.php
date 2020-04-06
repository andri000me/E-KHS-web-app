<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('M_mhs');
        $this->load->helper('hitung');

    }

    // List all your items
    public function index( $offset = 0 )
    {
        $this->load->view('include/head');
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('operator/mahasiswa');
        $this->load->view('include/script');
        
    }
    public function get_data()
    {
        $data=$this->M_mhs->get_data();
        $output=array();
        $no=0;
        foreach ($data as $key) {
            $row=array();
            $no++;
            $row[]=$key->nim;
            $row[]=$no;
            $row[]=$key->nim;
            $row[]=$key->nama;
            $row[]=$key->prodi;
            $row[]=$key->kelas;
            $row[]=stats($key->status);
            $row[]='<button class="mr-2 btn btn-icon btn-round btn-secondary tggl"><i class="fas fa-eye"></i></button>';
            $output[]=$row;
        }
        $result=array(
         
            'data'=>$output,
            
        );
        echo json_encode($result);

    }

    // Add a new item
    public function add()
    {

    }

    //Update one item
    public function update( $id = NULL )
    {

    }

    //Delete one item
    public function delete( $id = NULL )
    {

    }
}

/* End of file Controllername.php */

