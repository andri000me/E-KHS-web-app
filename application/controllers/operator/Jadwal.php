<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('M_jadwal');
    
    }

    // List all your items
    public function index()
    {
        $data = array(
            'mk' => $this->db->get('matakulah')->result(),
            'dosen'=> $this->db->get('dosen')->result(),
            'ruang'=> $this->db->get('ruangan')->result(),
        );
        $this->load->view('include/head');
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('operator/jadwal',$data);
        
    }

    public function get_data()
    {
        $data=$this->M_jadwal->get_jadwal();
        $output=array();
        $no=0;
        foreach ($data as $key) {
            $row=array();
            $no++;
            $row[]=$key->id;
            $row[] =$no;
            $row[]=$key->prodi;
            $row[]=$key->semester;
            $row[]=$key->kelas;
            $row[]=$key->kodemk;
            $row[]=$key->namamk;
            $row[]=$key->hari;
            $row[]=$key->jam_mulai;
            $row[]=$key->jam_selesai;
            $row[]=$key->nama_ruangan;
            $row[]=$key->nama;
            $row[]='<div class="d-flex flex-row">
            <button class="mr-2 btn btn-icon btn-round btn-success edit"><i class="icon-pencil"></i></button>
            <button class="btn btn-icon btn-round btn-danger hapus"><i class="icon-trash"></i></button>
            </div>';
            
            
            $output[]=$row;
        }
        $result=array(
        
            'data'=>$output,
            
        );
        echo json_encode($result);

    }
    public function get_jadwalbyId()
    {
        $data=$this->M_jadwal->get_jadwalbyId();
        echo json_encode($data);
    }

    // Add a new item
    public function add()
    {
        $data=$this->M_jadwal->add();
        echo json_encode($data);
    }

    //Update one item
    public function update()
    {
        $data=$this->M_jadwal->update();
        echo json_encode($data);
    }

    //Delete one item
    public function delete( )
    {
        $id=$this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('mkprodi');
        
        echo "ok";
    }
}

/* End of file Controllername.php */
