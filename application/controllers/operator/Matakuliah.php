<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matakuliah extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('M_mtk');

        
    }

    // List all your items
    public function index( $offset = 0 )
    {
        
        $this->load->view('include/head');
        $this->load->view('include/header');
        $this->load->view('include/sidebar');
        $data['el']=$this->db->get('elemenmk')->result();
        $this->load->view('operator/matakuliah',$data);
        
        
    }

    public function get_mkById($value='')
    {
        $data=$this->M_mtk->get_mkById();
        echo json_encode($data);
    }

    public function get_data()
    {
        $data=$this->M_mtk->get_data();
        $output=array();
        $no=0;
        foreach ($data as $key) {
            $row=array();
            $no++;
            $row[]=$key->kodemk;
            $row[]=$no;
            $row[]=$key->elemenmk;
            $row[]=$key->kodemk;
            $row[]=$key->namamk;
            $row[]=$key->sks;
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
        $data=$this->M_mtk->add();
        echo json_encode($data);
    }

    //Update one item
    public function update()
    {
        $data=$this->M_mtk->update();
        echo json_encode($data);
    }

    //Delete one item
    public function delete( $id = NULL )
    {
        $id=$this->input->get('id');
        $this->db->where('kodemk', $id);
        $this->db->delete('matakulah');
        echo "ok";
    }
}

/* End of file Controllername.php */

