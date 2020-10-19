<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ta extends CI_Controller {

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
       
       echo $this->session->userdata('takademik');
       
    }
    public function prodi()
    {
       
       $prodi=$this->input->get('prodi');

       $this->session->set_userdata('prodiLog',$prodi);
       $this->db->where('kodeprodi', $prodi);
       echo $this->db->get('prodi')->row()->prodi;
    }
    public function setMenu()
    {
      // $value=$this->session->userdata('toggle');
      // if ($value !='') {
      //   $this->session->set_userdata('toggle','sidebar_minimize');
      //   echo 'oke';
      // } else {
      //   $this->session->set_userdata('toggle','');
      //   echo 'okk';
      // }
      
    }
}