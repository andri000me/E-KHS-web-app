<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Elemen_mk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('M_elemen');
        

    }

    // List all your items
    public function index( $offset = 0 )
    {
        $this->load->view('include/head');
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $this->load->view('operator/elemenMk');

    }

    public function get_data()
    {
        $data=$this->M_elemen->get_data();
        $output=array();
        $no=0;
        foreach ($data as $key) {
            $row=array();
            $no++;
            $row[]=$key->elemenmk;
            $row[]=$no;
            $row[]=$key->elemenmk;
            $row[]=$key->nama;
            $row[]='<div class="d-flex flex-row">
                <button class="mr-2 btn btn-icon btn-round btn-success edit"><i class="icon-pencil"></i></button>
                <button class="btn btn-icon btn-round btn-danger hapus"><i class="icon-trash"></i></button>
            </div>';
            $output[]=$row;
        }
        $result=array('data'=>$output);
        echo json_encode($result);
    }

    public function get_elemenById()
    {
        $data=$this->M_elemen->get_elemenById();
        echo json_encode($data);
    }

    // Add a new item
    public function add()
    {
        $data=$this->M_elemen->add();
        echo json_encode($data);
    }

    //Update one item
    public function update()
    {
        $data=$this->M_elemen->update();
        echo json_encode($data);
    }

    //Delete one item
    public function delete()
    {
        $id=$this->input->get('id');
        $this->db->where('elemenmk', $id);
        $this->db->delete('elemenmk');

        echo "ok";
    }
}

/* End of file Controllername.php */

