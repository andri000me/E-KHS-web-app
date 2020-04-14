<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_api extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies

    }
    public function mhs()
    {
        $this->db->select('nim as id,nama as text');
        $this->db->from('mahasiswa');
        
        
        $this->db->where('prodi',$this->session->userdata('prodiLog'));
        $this->db->like('nim', $this->input->get('q'),'both');
        $this->db->or_like('nama',$this->input->get('q'),'both');
        $this->db->where('prodi',$this->session->userdata('prodiLog'));
        return $this->db->get('', 20)->result_array();
        
    }
    public function dosen()
    {
        $this->db->select('nip as id,nama as text');
        
        $this->db->like('nip', $this->input->get('q'),'both');
        $this->db->or_like('nama',$this->input->get('q'),'both');
        return $this->db->get('dosen', 20)->result_array();

    }
}
