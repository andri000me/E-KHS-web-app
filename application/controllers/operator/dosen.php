
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

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
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('operator/dosen');
        
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
                        <button onclick="getDosen(\''.$key->nip.'\')" style="border: 2px solid white !important; position: absolute; right :10%;bottom: 6%;" data-nip="'.$key->nip.'" class=" edit-btn btn btn-icon btn-round btn-info text-white">
                            <i class="icon-pencil"></i>
                        </button>
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
    public function getDosenByNip()
    {
        $data=$this->M_dosen->getDosen();
        echo json_encode($data);
    }

    // Add a new item
    public function add()
    {
        $data=$this->M_dosen->add();
        echo json_encode($data);
    }

    //Update one item
    public function update( )
    {
        $data=$this->M_dosen->update();
        echo json_encode($data);
    }


    //Delete one item
    public function delete( $id = NULL )
    {
        $id=$this->input->get('id');
        $this->db->where('nip', $id);
        $this->db->delete('dosen');
        
        echo "ok";

    }

}

/* End of file Controllername.php */
