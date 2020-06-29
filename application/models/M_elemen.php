<?php
//php intelifens
defined('BASEPATH') OR exit('No direct script access allowed');

class M_elemen extends CI_Model {


    public function __construct()
    {
    parent::__construct();
      //Load Dependencies

    }
    public function get_data()
    {
        
        return $this->db->get('elemenmk')->result();

    }

    public function get_elemenById()
    {
        $this->db->where('elemenmk', $this->input->get('id'));
        return $this->db->get('elemenmk')->row();
    }
    public function add()
    {
        $cek=$this->db->query("select * from elemenmk where elemenmk='".$_POST['kode']."'");
        
        $this->form_validation->set_rules('kode', 'kode', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        
        if($this->form_validation->run()==FALSE){
            $message = array(
            'type' =>'error',
            'text'=>'Data Gagal Ditambahkan' );
            return $message;
        }
        else if ($cek->num_rows() > 0) {
            $message = array(
            'type' =>'error',
            'text'=>'Data Sudah Ada' );
            return $message;
        }
        else{
            $data=array(

                "elemenmk"=>$_POST['kode'],
                "nama"=>$_POST['nama'],
            );
            $this->db->insert('elemenmk',$data);
            $message = array(
                'type' =>'success',
                'text'=>'Data Berhasil Disimpan' );
            return $message;

        }
    }
    public function update()
    {
        $this->form_validation->set_rules('kode', 'kode', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');

        if($this->form_validation->run()==FALSE){
            $message = array(
                'type' =>'error',
                'text'=>'Data Gagal Diedit' );
            return $message;
        }
        else{
           
            $data=array(

                "elemenmk"=>$_POST['kode'],
                "nama"=>$_POST['nama'],

            );

            $this->db->where('elemenmk', $_POST['id']);
            $this->db->update('elemenmk',$data);

            $message = array(
                'type' =>'success',
                'text'=>'Data Berhasil di Edit' );
            return $message;
        }
    }
}
