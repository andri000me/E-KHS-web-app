<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Elemen_mk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('M_elemen');
        

    }

    // List all your items
    public function index( $offset = 0 )
    {
        $this->load->view('include/head');
        $this->load->view('kajur/include/header');
        $this->load->view('kajur/include/sidebar');
        $this->load->view('kajur/elemenMk');

    }

    public function get_data()
    {
        $data=$this->M_elemen->get_data();
        $output=array();
        $no=0;
        foreach ($data as $key) {
            $row=array();
            $no++;
            $row[]=$key->elemenmk;
            $row[]=$no;
            $row[]=$key->elemenmk;
            $row[]=$key->nama;
           
            $output[]=$row;
        }
        $result=array('data'=>$output);
        echo json_encode($result);
    }

    
}

/* End of file Controllername.php */

