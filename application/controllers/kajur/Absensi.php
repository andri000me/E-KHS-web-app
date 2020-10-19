<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('M_absensi');

    }

    // List all your items
    public function index( $offset = 0 )
    {
        $this->load->view('include/head');
        $this->load->view('kajur/include/header');
        $this->load->view('kajur/include/sidebar');
        $this->load->view('kajur/absensi');
    }

    public function get_data()
    {
        $data=$this->M_absensi->get_data();
        $output=array();
        $no=0;
        foreach ($data as $key) {
            $row=array();
            $no++;
            $row[]=$key->id;
            $row[]=$no;
            $row[]=ucwords(strtolower($key->nama));
            $row[]=$key->nama;
            $row[]=$key->kelas;
            $row[]=$key->semester;
            $row[]=$key->sakit;
            $row[]=$key->ijin;
            $row[]=$key->alpa;

            $output[]=$row;
        }
        $result=array('data'=>$output);
        echo json_encode($result);

    }

   
}

/* End of file Controllername.php */
