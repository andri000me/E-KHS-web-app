<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ta extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
       
        
    }

    // List all your items
    public function index()
    {
       
       $ta=$this->input->get('ta');
       $this->session->set_userdata('takademik',$ta);
       
    }
}