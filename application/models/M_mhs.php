<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_mhs extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies

    }
    public function get_data($dosen="")
    {
        $this->db->select('nim,nama,kelas,prodi.prodi,status');
        $this->db->from('mahasiswa');
        $this->db->join('prodi', 'mahasiswa.prodi = prodi.kodeprodi', 'left');
        if ($dosen=="") {
            
            $this->db->where('mahasiswa.prodi', $this->session->userdata('prodiLog'));
        }
        if($this->input->post('kelas'))
        {
            $this->db->where('mahasiswa.kelas', $this->input->post('kelas'));
        }
        if($this->input->post('angkatan'))
        {
            $this->db->like('mahasiswa.angkatan', $this->input->post('angkatan'),'righ');
        }
        if($dosen !=""){
         $this->db->like('mahasiswa.nip', $dosen, 'BOTH');   
        }
        return $this->db->get()->result();

    }
    public function get_mhs(){
        $this->db->select('mahasiswa.*,prodi.prodi,dosen.nama as dosen');
        $this->db->from('mahasiswa');
        $this->db->join('prodi', 'mahasiswa.prodi = prodi.kodeprodi','left');
        $this->db->join('dosen', 'dosen.nip = mahasiswa.nip', 'left');
        
        $this->db->where('mahasiswa.nim',$this->input->get('id'));
        return $this->db->get()->result();
        
        
    }
    public function add()
    {
        $cek=$this->db->query("SELECT * from mahasiswa where nim='".$_POST['nim']."'");
        $this->form_validation->set_rules('nim', 'nim', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('kelas', 'kelas', 'required');
        $this->form_validation->set_rules('angkatan', 'angkatan', 'required');
        if($this->form_validation->run()==FALSE){
            $message = array(
                'type'=>'error',
                'text'=>'Data Gagal Di Tambahkan');
            return $message;
        }
        elseif ($cek->num_rows() > 0) {
            $message = array(
                'type' =>'error',
                'text'=>'Nim Sudah Ada' );
            return $message;
        }
        else{
        $data=array(

            "nim"=>$_POST['nim'],
            "nama"=>$_POST['nama'],
            "prodi"=>$this->session->userdata('prodiLog'),
            "kelas"=>$_POST['kelas'],
            "angkatan"=>$_POST['angkatan'],
            "nip"=>$_POST['dosen'],
            "status"=>"Aktif"
        );
        $this->db->insert('mahasiswa',$data);
        $message = array(
            'type' =>'success',
            'text'=>'Data Mahasiswa Berhasil DiSimpan');
        return $message;
        }
    }

}
