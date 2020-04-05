<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class khs extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('M_khs');
        $this->load->helper('hitung');
        
    }

    // List all your items
    public function index( $offset = 0 )
    {
        $this->load->view('include/head');
        $this->load->view('include/header');
        $this->load->view('include/sidebar');   
        $this->load->view('operator/khs');
    }
   
    public function data_khs()
    {
        
        $data=$this->M_khs->getdata();
        $output=array();
        $no=0;
        foreach ($data as $key) {
            $row=array();
            $no++;
            $row[] = $no;
            $row[]=$key->nim;
            $row[]=$key->nama;
            $row[]=$key->semester;
            $row[]=$this->M_khs->get_ip($key->semester,$key->nim);
            $row[]=status($key->status);
            $row[]='
            <button class="btn btn-icon btn-round btn-info tggl"><i class="fas fa-eye"></i></button>
            <button class="btn btn-icon btn-round btn-info print"><i class="fas fa-print"></i></button>';
            $output[]=$row;
        }
        $result=array(
         
            'data'=>$output,
            
        );
        echo json_encode($result);

		
    }
    public function get_khs()
    {
        $sem=$this->input->get('semester');
        $nim=$this->input->get('nim');
        $data=$this->M_khs->get_khs($sem,$nim);
        $output=array();
        $no=0;
        foreach ($data as $key) {
            $row=array();
            $no++;
            $row[] = $no;
            $row[]=$key->kodemk;
            $row[]=$key->namamk;
            $row[]=$key->am;
            $row[]=hitung_nilai($key->am);
            $row[]=$key->sks;
            $output[]=$row;
        }
        $result=array(
         
            'data'=>$output,
            
        );
        echo json_encode($result);

    }
    public function cetak_khs()
    {
        
    }

    // Add a new item
    public function add()
    {
        
    }

    //Update one item
    public function update( $id = NULL )
    {

    }

    //Delete one item
    public function delete( $id = NULL )
    {

    }
}

/* End of file Controllername.php */
