<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class elemen_mk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
    
        $this->session->set_flashdata('aktif', 'active');
        

    }

    // List all your items
    public function index( $offset = 0 )
    {
        $this->load->view('include/head');
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        // $this->load->view('operator/index');
        echo "elemen";
        $this->load->view('include/script');
        
        
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

