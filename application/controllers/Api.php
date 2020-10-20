<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
     //Load Dependencies
    $this->load->model('M_api','api');
  }
  public function mahasiswa ()
  {
    echo json_encode(array('results' =>$this->api->mhs()));
    
  }
  public function mhs_dos()
  {
    echo json_encode(array('results' =>$this->api->mhs_dos()));
  }
  public function dosen ()
  {
    echo json_encode(array('results' =>$this->api->dosen()));

  }
}

/* End of file filename.php */

?>
