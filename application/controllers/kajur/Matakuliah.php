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
        $this->load->view('kajur/include/header');
        $this->load->view('kajur/include/sidebar');
        $data['el']=$this->db->get('elemenmk')->result();
        $this->load->view('kajur/matakuliah',$data);
        
        
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
            $output[]=$row;
        }
        $result=array('data'=>$output);
        echo json_encode($result);
    }


    // Add a new item
   
}

/* End of file Controllername.php */

