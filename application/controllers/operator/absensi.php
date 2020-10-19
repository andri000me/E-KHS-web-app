<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('M_absensi');

    }

    // List all your items
    public function index( $offset = 0 )
    {
        $this->load->view('include/head');
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('operator/absensi');
    }

    public function get_data()
    {
        $data=$this->M_absensi->get_data();
        $output=array();
        $no=0;
        foreach ($data as $key) {
            $row=array();
            $no++;
            $row[]=$key->id;
            $row[]=$no;
            $row[]=$key->nim;
            $row[]=ucwords(strtolower($key->nama));
            $row[]=$key->kelas;
            $row[]=$key->semester;
            $row[]=$key->sakit;
            $row[]=$key->ijin;
            $row[]=$key->alpa;
            $row[]='<div class="d-flex flex-row">
                <button class="mr-2 btn btn-icon btn-round btn-success edit"><i class="icon-pencil"></i></button>
                <button class="btn btn-icon btn-round btn-danger hapus"><i class="icon-trash"></i></button>
            </div>';
            $output[]=$row;
        }
        $result=array('data'=>$output);
        echo json_encode($result);

    }

    public function get_absenbyId()
    {
        $data=$this->M_absensi->get_absenbyId();
        echo json_encode($data);
    }

    // Add a new item
    public function add()
    {
        $data=$this->M_absensi->add();
        echo json_encode($data);
    }

    //Update one item
    public function update()
    {
        $data=$this->M_absensi->update();
        echo json_encode($data);
    }

    //Delete one item
    public function delete()
    {
        $id=$this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('absen');

        echo "ok";
    }
}

/* End of file Controllername.php */
