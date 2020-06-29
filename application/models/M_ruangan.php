<?php
//php intelifens
defined('BASEPATH') OR exit('No direct script access allowed');



class M_ruangan extends CI_Model {


    public function __construct()
    {
    parent::__construct();
      //Load Dependencies

    }



    public function add()
    {
        $cek=$this->db->query("select * from ruangan where nama_ruangan='".$_POST['nama']."'");
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
            'text'=>'Ruangan Sudah Ada' );
            return $message;
        }
        else{
            $data=array(

                "nama_ruangan"=>$_POST['nama'],
            );
            $this->db->insert('ruangan',$data);
            $message = array(
                'type' =>'success',
                'text'=>'Data Berhasil Disimpan' );
            return $message;

        }
    }
    public function update()
    {

        $this->form_validation->set_rules('nama', 'nama', 'required');

        if($this->form_validation->run()==FALSE){
            $message = array(
                'type' =>'error',
                'text'=>'Data Gagal Diedit' );
            return $message;
        }
        else{
           
            $data=array(

                "nama_ruangan"=>$_POST['nama'],

            );

            $this->db->where('id_ruangan', $_POST['id']);
            $this->db->update('ruangan',$data);

            $message = array(
                'type' =>'success',
                'text'=>'Data Berhasil di Edit' );
            return $message;
        }
    }
}
