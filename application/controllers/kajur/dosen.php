
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dosen extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('M_dosen');
        $this->load->helper('hitung');

    }

    // List all your items
    public function index()
    {
        $data['dosen']=$this->db->get('dosen')->result();
        $data['prodi']=$this->db->get('prodi')->result();
        $this->load->view('include/head');
        $this->load->view('kajur/include/header');
        $this->load->view('kajur/include/sidebar');
        $this->load->view('kajur/dosen');
        
    }
    public function get_data()
    {
        $data=$this->M_dosen->get_data();
        $output='';
        foreach ($data as $key) {
           
       $output .= '<div class="col-sm-6 col-lg-3 ">
                <div class="card">
                    <div class="m-5 m-md-2 m-lg-2"  style=" position: relative;" >
                        <img class="img-thumbnail img-fluid rounded-circle" src="'.base_url().'assets/images/dosen/'.$key->foto.'" alt="'.$key->nama.'">

                    </div>
                    <div class="card-body px-3 py-0">
                        <h4 class="mb-1 fw-bold" style="font-size: 13px;"><i class="fas fa-user-alt"> </i>  '.$key->nama.'</h4>
                        <p class="mb-2"> <i class="fas fa-address-card"> </i> '.$key->nip.'</p>
                        <div class="separator-dashed"></div>
                        <p class="text-muted small"><i class="fas fa-phone"> </i> '.$key->no_hp.'</p>
                    </div>
                </div>
            </div>';
        }
        echo $output;


    }
    

}

/* End of file Controllername.php */
