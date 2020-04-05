<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_khs extends CI_Model {

   
    public function __construct()
    {
        parent::__construct();
        //Load Dependencies

    }

    // List all your items
    public function getdata()
    {
        $this->db->select('khs.nim,mahasiswa.nama,khs.semester,khs.status');
        $this->db->from('khs,matakulah,mahasiswa');
        $this->db->where('mahasiswa.nim=khs.nim AND matakulah.kodemk=khs.kodemk');
        $this->db->where('khs.takademik', $this->session->userdata('takademik')); 
        if($this->input->post('semester'))
        {
            $this->db->where('khs.semester', $this->input->post('semester'));
        }
        if($this->input->post('kelas'))
        {
            $this->db->like('mahasiswa.kelas', $this->input->post('kelas'));
        }
        if($this->input->post('angkatan'))
        {
            $this->db->like('mahasiswa.angkatan', $this->input->post('angkatan'));
        }
        $this->db->group_by('khs.semester');
    
        return $this->db->get()->result();

    }
    public function get_khs($semester,$nim)
    {
        $this->db->select('khs.am,khs.semester, matakulah.kodemk,matakulah.namamk ,matakulah.sks');
        $this->db->from('khs,matakulah,mahasiswa');
        $this->db->where('mahasiswa.nim=khs.nim AND matakulah.kodemk=khs.kodemk');
        $this->db->where('khs.semester',$semester);
        $this->db->where('khs.nim', $nim);
        
        return $this->db->get()->result();
    }
   
    public function get_ip($semester,$nim)
    {
        $this->load->helper('hitung');
        $data=$this->get_khs($semester,$nim);
        $jumlah= 0;
        $jumlahsks=0; 
        foreach ($data as $key) {
            $jumlah += jnilai($key->am,$key->sks);
            $jumlahsks += (float)$key->sks;
        }
        return round ($jumlah/$jumlahsks,2);
    }
    public function cetak_khs()
    {
        
    } 

    // Add a new item
    public function add()
    {

    }

    //Update one item
    public function update( $id = NULL )
    {

    }

    //Delete one item
    public function delete( $id = NULL )
    {

    }
}
