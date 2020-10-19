<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('M_index','i');

    }

    // List all your items
    public function index( $offset = 0 )
    {
        $jumlah=[];
        $prod=[];
        foreach ($this->i->grafik() as $key) {
            $jumlah[] = $key->jumlah;
            $prod[] = $key->prodi;
        }

        $data=[
            "mhs"=>$this->i->count("mahasiswa"),
            "dsn"=>$this->i->count("dosen"),
            "prodi"=>$this->i->count("prodi"),
            "mk"=>$this->i->count("matakulah"),
            "jumlah"=>$jumlah,
            "prod"=>$prod,
            "dt"=>$this->i->grafik()
        ];
        $this->load->view('include/head');
        $this->load->view('include/header_dosen');
        $this->load->view('include/sidebar_dosen');
        $this->load->view('dosen/index',$data);


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

