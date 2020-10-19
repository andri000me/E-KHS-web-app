<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

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
        $this->load->view('include/header_dosen');
        $this->load->view('include/sidebar_dosen');
        $this->load->view('dosen/mahasiswa',$data);
        
    }
    public function get_data()
    {
        $data=$this->M_mhs->get_data($this->session->userdata('username'));
        $output=array();
        $no=0;
        foreach ($data as $key) {
            $row=array();
            $no++;
            $row[]=$key->nim;
            $row[]=$no;
            $row[]=$key->nim;
            $row[]=ucwords(strtolower($key->nama));
            $row[]=$key->prodi;
            $row[]=$key->kelas;
            $row[]=sts2($key->status);
            $row[]='
            <div class="d-flex flex-row">
                <button class="mr-2 btn btn-icon btn-round btn-secondary tggl"><i class="fas fa-eye"></i></button>
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
            $row['nama']=ucwords(strtolower($key->nama));
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
