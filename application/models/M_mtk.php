<?php
//php intelifens
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mtk extends CI_Model {


    public function __construct()
    {
    parent::__construct();
      //Load Dependencies


    }
    public function get_data()
    {
        
        return $this->db->get('matakulah')->result();

    }

    public function get_mkById()
    {
        $this->db->where('kodemk', $this->input->get('id'));
        return $this->db->get('matakulah')->row();
    }
    public function add()
    {
        $cek=$this->db->query("select * from matakulah where kodemk='".$_POST['elemenmk'].$_POST['kodemk']."'");
        
        $this->form_validation->set_rules('elemenmk', 'elemenmk', 'required');
        $this->form_validation->set_rules('kodemk', 'kodemk', 'required');
        $this->form_validation->set_rules('namamk', 'namamk', 'required');
        $this->form_validation->set_rules('sks', 'sks', 'required');
        
        if($this->form_validation->run()==FALSE){
            $message = array(
            'type' =>'error',
            'text'=>'Data Gagal Ditambahkan' );
            return $message;
        }
        else if ($cek->num_rows() > 0) {
            $message = array(
            'type' =>'error',
            'text'=>'Kode Matakuliah Sudah Ada' );
            return $message;
        }
        else{
            $data=array(

                "elemenmk"=>$_POST['elemenmk'],
                "kodemk"=>$_POST['elemenmk'].$_POST['kodemk'],
                "namamk"=>$_POST['namamk'],
                "sks"=>$_POST['sks'],
            );
            $this->db->insert('matakulah',$data);
            $message = array(
                'type' =>'success',
                'text'=>'Data Berhasil Disimpan' );
            return $message;

        }
    }
    public function update()
    {
        $this->form_validation->set_rules('elemenmk', 'elemenmk', 'required');
        $this->form_validation->set_rules('kodemk', 'kodemk', 'required');
        $this->form_validation->set_rules('namamk', 'namamk', 'required');
        $this->form_validation->set_rules('sks', 'sks', 'required');

        if($this->form_validation->run()==FALSE){
            $message = array(
                'type' =>'error',
                'text'=>'Data Gagal Diedit' );
            return $message;
        }
        else{
           
            $data=array(

                "elemenmk"=>$_POST['elemenmk'],
                "kodemk"=>$_POST['elemenmk'].$_POST['kodemk'],
                "namamk"=>$_POST['namamk'],
                "sks"=>$_POST['sks'],

            );

            $this->db->where('kodemk', $_POST['origin_kodemk']);
            $this->db->update('matakulah',$data);

            $message = array(
                'type' =>'success',
                'text'=>'Data Berhasil di Edit' );
            return $message;
        }
    }
}
