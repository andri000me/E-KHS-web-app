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
        $this->load->view('include/header_dosen');
        $this->load->view('include/sidebar_dosen');
        $this->load->view('dosen/jadwal',$data);
        
    }

    public function get_data()
    {
        $data=$this->M_jadwal->get_jadwal($this->session->userdata('username'));
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
           
            
            $output[]=$row;
        }
        $result=array(
        
            'data'=>$output,
            
        );
        echo json_encode($result);

    }

    public function jdwl()
    {
        $data=$this->M_jadwal->get_jadwal($this->session->userdata('username'),"kodemk");
        $output=array();
        $no=0;
        foreach ($data as $key) {
            $row=array();
            $no++;
            // $row[] =$no;
            $row[]=$key->prodi;
            $row[]=$key->semester;
            $row[]=$key->kelas;
            $row[]=$key->kodemk;
            $row[]=$key->namamk;
            $row[]=$key->kodeprodi;
            $output[]=$row;
        }
        $result=array(
        
            'data'=>$output,
            
        );
        echo json_encode($result);

    }


}

/* End of file Controllername.php */
