<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('M_ruangan');
        

    }

    // List all your items
    public function index( $offset = 0 )
    {
        $this->load->view('include/head');
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('operator/ruangan');

    }

    public function get_data()
    {
        $data=$this->db->get('ruangan')->result();
        $output=array();
        $no=0;
        foreach ($data as $key) {
            $row=array();
            $row[]=$key->id_ruangan;
            $no++;
            $row[]=$no;
            $row[]=$key->nama_ruangan;
            $row[]='<div class="d-flex flex-row">
                <button class="mr-2 btn btn-icon btn-round btn-success edit"><i class="icon-pencil"></i></button>
                <button class="btn btn-icon btn-round btn-danger hapus"><i class="icon-trash"></i></button>
            </div>';
            $output[]=$row;
        }
        $result=array('data'=>$output);
        echo json_encode($result);
    }


    // Add a new item
    public function add()
    {
        $data=$this->M_ruangan->add();
        echo json_encode($data);
    }

    //Update one item
    public function update()
    {
        $data=$this->M_ruangan->update();
        echo json_encode($data);
    }

    //Delete one item
    public function delete()
    {
        $id=$this->input->get('id');
        $this->db->where('id_ruangan', $id);
        $this->db->delete('Ruangan');

        echo "ok";
    }
}

/* End of file Controllername.php */

