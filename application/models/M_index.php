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
        return $this->db->query("SELECT COUNT(mhs.nim) as jumlah,p.kodeprodi, p.prodi,p.jenjang,d.nama,d.nip FROM mahasiswa mhs, prodi p,dosen d WHERE d.nip=p.kepro and mhs.prodi=p.kodeprodi GROUP BY p.prodi ORDER BY p.kodeprodi ASC")->result();
    }
    public function prodi()
    {
        return $this->db->query("SELECT p.kodeprodi, p.prodi,p.jenjang,d.nama,d.nip FROM prodi p,dosen d WHERE d.nip=p.kepro GROUP BY p.prodi ORDER BY p.kodeprodi ASC")->result();
    }

        
}