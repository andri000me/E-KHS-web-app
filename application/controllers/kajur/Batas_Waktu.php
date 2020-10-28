<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Batas_Waktu extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies

        $this->load->helper('hitung_helper');
        
    }
    public function index()
    {
        $this->db->order_by('id', 'desc');
        $skala=$this->db->get('skala')->result();
    	$data=[
    		"batas"=>$this->db->get('setting')->row(),
            "skala"=>$skala
    	];
    	$this->load->view('include/head');
        $this->load->view('kajur/include/header');
        $this->load->view('kajur/include/sidebar');
        $this->load->view('kajur/batas-waktu',$data);
    }
    public function update()
    {
        $data=[
            "value"=>$this->input->post('tgl')
        ];
        $this->db->where('id', '1');
        $this->db->update('setting', $data);

        $message = array(
            'type' =>'success',
            'text'=>'Batas Waktu Berhasil diubah' );

        echo json_encode($message);
    }
    public function changeNdef()
    {
        $data=[
            "value"=>$this->input->post('ndef')
        ];
        $this->db->where('id', '2');
        $this->db->update('setting', $data);

        $message = array(
            'type' =>'success',
            'text'=>'Nilai Default Berhasil diubah' );

        echo json_encode($message);
    }

    public function ubahskala()
    {
        $post=$this->input->post();
        for ($i=8; $i > 0 ; $i--) {
            $this->db->where('id', $i);
            $this->db->update('skala', ['am'=>$post[$i]]);
        }
        $this->session->set_flashdata('pesan', 'Skala Berhasil Di Ubah');
        redirect('kajur/Batas_Waktu','refresh');
       
    }



}