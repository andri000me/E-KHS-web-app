<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_mhs extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies

    }
    public function get_data()
    {
        $this->db->select('nim,nama,kelas,prodi.prodi,status');
        $this->db->from('mahasiswa');
        $this->db->join('prodi', 'mahasiswa.prodi = prodi.kodeprodi', 'left');
        $this->db->where('mahasiswa.prodi', $this->session->userdata('prodiLog'));
        if($this->input->post('kelas'))
        {
            $this->db->where('mahasiswa.kelas', $this->input->post('kelas'));
        }
        if($this->input->post('angkatan'))
        {
            $this->db->like('mahasiswa.angkatan', $this->input->post('angkatan'));
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
}
