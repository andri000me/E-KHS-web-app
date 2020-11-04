<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Kepro extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('M_khs');
        $this->load->helper('hitung');
        

    }

    // List all your items
    public function index()
    {

    }
    public function verifikasi()
    {
    	$this->load->view('include/head');
        $this->load->view('include/header_dosen');
        $this->load->view('include/sidebar_dosen');
        $this->load->view('dosen/verifikasi');
    }
    public function data_khs()
    {
    	$nip=$this->session->userdata('username');
        $prodi=$this->db->query("SELECT * FROM prodi where kepro='$nip'")->row()->kodeprodi;
        $data=$this->M_khs->getdata($prodi);
        $output=array();
        $no=0;
        foreach ($data as $key) {
            $row=array();
            $no++;
            $row[] = $no;
            $row[]=$key->nim;
            $row[]=ucwords(strtolower($key->nama));
            $row[]=$key->semester;
            $row[]=$this->M_khs->get_ip($key->semester,$key->nim);
            $row[]=status($key->status);
            $row[]='<div class="d-flex flex-row ">
            <button class="mr-2 btn btn-icon btn-round btn-secondary tggl"><i class="fas fa-eye"></i></button></div>';
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
            $row[]=$key->khd.'%';
            $row[]=$key->tg;
            $row[]=$key->uts;
            $row[]=$key->uas;
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

    public function verifi()
    {
        $data=[
            "status"=>'2'
        ];
        $this->db->where('nim', $this->input->post('nim'));
        $this->db->where('semester', $this->input->post('semester'));
        $this->db->update('khs', $data);

        $message = array(
        'type' =>'success',
        'text'=>'Verifikasi Brhasil');

        echo json_encode($message);
    }
    public function veriviAll()
    {
        $data=[
            "status"=>'2'
        ];
        $this->db->not_like('status', '1');
        $this->db->update('khs', $data);

        $message = array(
        'type' =>'success',
        'text'=>'Verifikasi Brhasil');

        redirect('dosen/kepro/verifikasi');
    }
}