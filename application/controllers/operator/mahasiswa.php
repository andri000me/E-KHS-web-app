<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('M_mhs');
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
        $this->load->view('operator/mahasiswa',$data);
        
    }
    public function get_data()
    {
        $data=$this->M_mhs->get_data();
        $output=array();
        $no=0;
        foreach ($data as $key) {
            $row=array();
            $no++;
            $row[]=$key->nim;
            $row[]=$no;
            $row[]=$key->nim;
            $row[]=$key->nama;
            $row[]=$key->prodi;
            $row[]=$key->kelas;
            $row[]=stats($key->status);
            $row[]='
            <div class="d-flex flex-row">
                <button class="mr-2 btn btn-icon btn-round btn-secondary tggl"><i class="fas fa-eye"></i></button>
                <div class="dropdown">
                    <button class="btn btn-icon btn-round btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-options-vertical"></i>
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                        <a class="dropdown-item edit" href="#"><i class="text-warning fas fas fa-edit"></i> Edit</a>
                        <a class="dropdown-item hapus" href="#"><i class="text-danger fas fa-trash-alt"></i> Hapus</a>
                    </ul>
                </div>
            </div>';
            $output[]=$row;
        }
        $result=array(
            'data'=>$output,
            
        );
        echo json_encode($result);

    }
    public function getmhsbynim()
    {
        $data=$this->M_mhs->get_mhs();
        $output=array();
        foreach ($data as $key) {
            $row=array();
            $row['nim']=$key->nim;
            $row['nama']=$key->nama;
            $row['prodi']=$key->prodi;
            $row['kelas']=$key->kelas;
            $row['angkatan']=$key->angkatan;
            $row['st']=$key->status;
            $row['status']=sts($key->status);
            $row['dosen']=$key->dosen;
            $row['nip']=$key->nip;
            $row['foto']=$key->foto;
            $output[]=$row;
            
        }
        echo json_encode($output);
    }

    // Add a new item
    public function add()
    {
        $data=$this->M_mhs->add();
        echo json_encode($data);
    }

    //Update one item
    public function update( )
    {
        $data=$this->M_mhs->update();
        echo json_encode($data);
    }

    public function updateStatus()
    {
        $data=$this->M_mhs->updateStatus();
        echo json_encode($data);
    }

    //Delete one item
    public function delete( $id = NULL )
    {
        $id=$this->input->get('id');
        $this->db->where('nim', $id);
        $this->db->delete('mahasiswa');

        echo "ok";

    }

}

/* End of file Controllername.php */
