<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_index extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies

    }
    public function count($table)
    {
        return $this->db->get($table)->num_rows();
    }
    public function grafik()
    {
        $this->db->select('COUNT(mhs.nim) as jumlah,p.kodeprodi, p.prodi,p.jenjang,d.nama,d.nip');
        $this->db->from('prodi p');
        $this->db->join('mahasiswa mhs', 'mhs.prodi=p.kodeprodi', 'left');
        $this->db->join('dosen d', 'd.nip=p.kepro', 'left');
        $this->db->group_by('p.prodi');
        $this->db->order_by('p.kodeprodi', 'asc');
        return $this->db->get()->result();

    }
    public function prodi()
    {
        $this->db->select('p.kodeprodi, p.prodi,p.jenjang,d.nama,d.nip');
        $this->db->from('prodi p');
        $this->db->join('dosen d', 'd.nip=p.kepro', 'left');
        $this->db->group_by('p.prodi');
        $this->db->order_by('p.kodeprodi', 'asc');
        return $this->db->get()->result();

        // return $this->db->query("SELECT p.kodeprodi, p.prodi,p.jenjang,d.nama,d.nip FROM prodi p,dosen d WHERE d.nip=p.kepro GROUP BY p.prodi ORDER BY p.kodeprodi ASC")->result();
    }

        
}