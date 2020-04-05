<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_jadwal extends CI_Model {

   
    public function __construct()
    {
        parent::__construct();
        //Load Dependencies

    }
    public function get_jadwal()
    {
        $this->db->select('p.id,p.hari,p.jam_mulai,p.jam_selesai, P.kodeprodi, p.kodemk, p.nip, p.kelas, p.semester,d.nama, mk.namamk,prod.prodi,rk.nama_ruangan,rk.id_ruangan');
		$this->db->from('mkprodi p,dosen d, prodi prod, matakulah mk,ruangan rk');
        $this->db->where("rk.id_ruangan=p.id_ruangan AND p.nip=d.nip AND p.kodemk=mk.kodemk AND p.kodeprodi=prod.kodeprodi");
        $this->db->where('p.takademik', $this->session->userdata('takademik'));
        if($this->input->post('semester'))
        {
            $this->db->where('P.semester', $this->input->post('semester'));
        }
        if($this->input->post('kelas'))
        {
            $this->db->like('P.kelas', $this->input->post('kelas'));
        }
       
        return $this->db->get()->result();
        
        
    }
    public function get_jadwalbyId()
    {
        $this->db->select('p.id,p.hari,p.jam_mulai,p.jam_selesai ,P.kodeprodi, p.kodemk, p.nip, p.kelas, p.semester,d.nama, mk.namamk,prod.prodi,rk.nama_ruangan,rk.id_ruangan');
		$this->db->from('mkprodi p,dosen d, prodi prod, matakulah mk,ruangan rk');
        $this->db->where("rk.id_ruangan=p.id_ruangan AND p.nip=d.nip AND p.kodemk=mk.kodemk AND p.kodeprodi=prod.kodeprodi");
        $this->db->where('P.id', $this->input->get('id'));
        return $this->db->get()->row();
    }
    public function add()
    {
        $cek=$this->db->query("SELECT * FROM mkprodi where nip='".$_POST['nip']."' and hari='".$_POST['hari']."' and jam_mulai='".$_POST['jam_mulai']."' and takademik='".$this->session->userdata("takademik")."'");
		$cekR=$this->db->query("SELECT * FROM mkprodi 
			where id_ruangan ='".$_POST['id_ruangan']."' AND hari='".$_POST['hari']."' and jam_mulai='".$_POST['jam_mulai']."' and takademik='".$this->session->userdata("takademik")."' ");


        $this->form_validation->set_rules('nip', 'nip', 'required');
		$this->form_validation->set_rules('kodemk', 'kodemk', 'required');
		$this->form_validation->set_rules('kelas', 'kelas', 'required');
        $this->form_validation->set_rules('semester', 'semester', 'required');
        

		if($this->form_validation->run()==FALSE){
            
            $message = array(
                "type" =>'error',
                "text"=>'Data Gagal Ditambahkan',
                );
			return $message;
        }
        elseif ($cek->num_rows() > 0) {
		
			$message = array(
                'type' =>'error',
                'text'=>'Sudah Ada Jadwal' );
			return $message;
		}
		elseif ($cekR->num_rows() > 0) {
		
			$message = array(
                'type' =>'error',
                'text'=>'Ruangan Sudah Terpakai' );
			return $message;
		}

		else{
			$idh='';
			if($_POST['hari'] === 'Senin')$idh='1';
			else if($_POST['hari'] === 'Selasa')$idh='2';
			else if($_POST['hari'] === 'Rabu')$idh='3';
			else if($_POST['hari'] === 'Kamis')$idh='4';
			else if($_POST['hari'] === 'Jumad')$idh='5';
			$data=array(

				"nip"=>$_POST['nip'],
				"kodemk"=>$_POST['kodemk'],
				"kodeprodi"=>'1',
				"kelas"=>$_POST['kelas'],
				"semester"=>$_POST['semester'],
				"hari"=>$_POST['hari'],
				"id_hari"=>$idh,
				"takademik"=>$this->session->userdata("takademik"),
				"jam_mulai"=>$_POST['jam_mulai'],
				"jam_selesai"=>$_POST['jam_selesai'],
				"id_ruangan"=>$_POST['id_ruangan'],


			);
			$this->db->insert('mkprodi',$data);
			
			$message = array(
                'type' =>'success',
                'text'=>'Data Berhasil Disimpan' );
			return $message;
			
		}
    }

    public function update()
    {
        $idh='';
            if($_POST['hari'] === 'Senin')$idh='1';
            else if($_POST['hari'] === 'Selasa')$idh='2';
            else if($_POST['hari'] === 'Rabu')$idh='3';
            else if($_POST['hari'] === 'Kamis')$idh='4';
            else if($_POST['hari'] === 'Jumad')$idh='5';
        $data=array(

            "nip"=>$_POST['nip'],
            "kodemk"=>$_POST['kodemk'],
            "kodeprodi"=>'1',
            "kelas"=>$_POST['kelas'],
            "semester"=>$_POST['semester'],
            "hari"=>$_POST['hari'],
            "id_hari"=>$idh,
            "takademik"=>$this->session->userdata("takademik"),
            "jam_mulai"=>$_POST['jam_mulai'],
            "jam_selesai"=>$_POST['jam_selesai'],
            "id_ruangan"=>$_POST['id_ruangan'],
        );
        $this->db->where('id', $_POST['id']);
        $edit=$this->db->update('mkprodi',$data);
        if ($edit) {
            $message = array(
                'type' =>'success',
                'text'=>'Data Berhasil Di Edit' );
            return $message;
        }
        else{
            $message = array(
                'type' =>'error',
                'text'=>'Data Gagal Di Edit' );
            return $message;
        }
    }
}