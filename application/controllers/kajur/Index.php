<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('M_index','i');

    }

    // List all your items
    public function index( $offset = 0 )
    {
        $jumlah=[];
        $prod=[];
        foreach ($this->i->grafik() as $key) {
            $jumlah[] = $key->jumlah;
            $prod[] = $key->prodi;
        }

        $data=[
            "mhs"=>$this->i->count("mahasiswa"),
            "dsn"=>$this->i->count("dosen"),
            "prodi"=>$this->i->count("prodi"),
            "mk"=>$this->i->count("matakulah"),
            "jumlah"=>$jumlah,
            "prod"=>$prod,
            "dt"=>$this->i->prodi()
        ];
        $this->load->view('include/head');
        $this->load->view('kajur/include/header');
        $this->load->view('kajur/include/sidebar');
        $this->load->view('kajur/index',$data);


    }

    // Add a new item
    public function add()
    {
        $data=[
            "prodi"=>$this->input->post('nama'),
            "jenjang"=>$this->input->post('jenjang'),
            "kepro"=>$this->input->post('kepro')
        ];
        $this->db->insert('prodi', $data);
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('kajur/index','refresh');
    }

    //Update one item
    public function update()
    {
        $data=[
            "prodi"=>$this->input->post('nama'),
            "jenjang"=>$this->input->post('jenjang'),
            "kepro"=>$this->input->post('kepro')
        ];
        $this->db->where('kodeprodi', $this->input->post('id'));
        $this->db->update('prodi', $data);
        $this->session->set_flashdata('success', 'Data Berhasil Edit');
        redirect('kajur/index','refresh');

    }

    //Delete one item
    public function delete()
    {

    }
}

/* End of file Controllername.php */

