<?php
//php intelifens
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dosen extends CI_Model {


    public function __construct()
    {
    parent::__construct();
      //Load Dependencies

    }
    public function get_data()
    {

        $this->db->where("nip != ''");
        if ($this->input->get('q')){
         $this->db->like('nip', $_GET['q'], 'BOTH'); 
         $this->db->or_like('nama', $_GET['q'], 'BOTH');  
        }
    	return $this->db->get('dosen')->result();
    }
    public function getDosen()
    {
        $this->db->where('nip', $this->input->get('id'));
        return $this->db->get('dosen')->row();
    }
   	public function add()
   	{
   		$cek=$this->db->query("select * from dosen where nip='".$_POST['nip']."'");
        
        $this->form_validation->set_rules('nip', 'nip', 'required');
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

                "nip"=>$_POST['nip'],
                "nama"=>$_POST['nama'],
                "no_hp"=>$_POST['no_hp'],
            );
            $this->db->insert('dosen',$data);
            $message = array(
                'type' =>'success',
                'text'=>'Data Berhasil Disimpan' );
            return $message;

        }
   	}
    public function update()
    {
        $this->form_validation->set_rules('nip', 'nip', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');

        if($this->form_validation->run()==FALSE){
            $message = array(
            'type' =>'error',
            'text'=>'Data Gagal Di Diedit' );
            return $message;
        }
        else{
            $data=array(

                "nip"=>$_POST['nip'],
                "nama"=>$_POST['nama'],
                "no_hp"=>$_POST['no_hp'],
            );
            $this->db->where('nip', $_POST['origin_nip']);
            $this->db->update('dosen',$data);
            $message = array(
                'type' =>'success',
                'text'=>'Data Dosen Berhasil Diedit');
            return $message;
        }
    }
}