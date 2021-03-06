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
        $this->load->view('kajur/include/header');
        $this->load->view('kajur/include/sidebar');
        $this->load->view('kajur/jadwal',$data);
        
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
            
            
            $output[]=$row;
        }
        $result=array(
        
            'data'=>$output,
            
        );
        echo json_encode($result);

    }
   
}

/* End of file Controllername.php */
