<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class batas_Waktu extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies

        $this->load->helper('hitung_helper');
        
    }
    public function index()
    {
    	$data=[
    		"batas"=>$this->db->get('setting')->row(),
            
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
        'text'=>'Tanggal Berhasil diubah' );

        echo json_encode($message);
    }

}