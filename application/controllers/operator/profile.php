<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profile extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('M_profile');

    }

    // List all your items
    public function index( $offset = 0 )
    {
        
        $this->load->view('include/head');
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('operator/profile');
        
        
    }
    public function getData()
    {
        $data=$this->M_profile->getData();
         echo json_encode($data);
    }

    
   
    //Update one item
    public function update()

    {
        $data=$this->M_profile->update();
        echo json_encode($data);
    }

    public function ubahPassword()
    {
        $data=$this->M_profile->change_password();
        echo json_encode($data);
    }
    public function ubahFoto()
    {
        $data=$this->M_profile->change_photo();
        echo json_encode($data);
    }

   
}

/* End of file Controllername.php */

