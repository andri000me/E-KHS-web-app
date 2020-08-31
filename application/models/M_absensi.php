<?php
//php intelifens
defined('BASEPATH') OR exit('No direct script access allowed');

class M_absensi extends CI_Model {


    public function __construct()
    {
    parent::__construct();
      //Load Dependencies

    }
    public function alpa($semester,$nim)
    {
        $this->db->where('semester',$semester);
        $this->db->where('nim', $nim);
        return $this->db->get('absen')->row()->alpa;
    }
    public function get_data()
    {
        $this->db->select('abs.id,abs.nim,abs.semester,mhs.nama,mhs.kelas,abs.sakit,abs.ijin,abs.alpa');
        $this->db->from('absen abs,mahasiswa mhs');
        $this->db->where("mhs.nim=abs.nim");
        $this->db->where('abs.takademik', $this->session->userdata('takademik'));
        $this->db->where('mhs.prodi', $this->session->userdata('prodiLog'));
        if($this->input->post('semester'))
        {
            $this->db->where('abs.semester', $this->input->post('semester'));
        }
        if($this->input->post('kelas'))
        {
            $this->db->like('mhs.kelas', $this->input->post('kelas'));
        }       
        if($this->input->post('angkatan'))
        {
            $this->db->like('mhs.angkatan', $this->input->post('angkatan'));
        }
        $this->db->order_by('abs.semester','asc');     
        return $this->db->get()->result();

    }

    public function get_absenbyId()
    {
        $this->db->where('id', $this->input->get('id'));
        return $this->db->get('absen')->row();
    }
    public function add()
    {
        $cek=$this->db->query("select * from absen where nim='".$_POST['nim']."' and semester
        ='".$_POST['semester']."'");
        

        $this->form_validation->set_rules('nim', 'nim', 'required');
        $this->form_validation->set_rules('semester', 'semester', 'required');
        $this->form_validation->set_rules('sakit', 'sakit', 'required');
        $this->form_validation->set_rules('ijin', 'ijin', 'required');
        $this->form_validation->set_rules('alpa', 'alpa', 'required');

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
            $semester=$_POST['semester'];
            $takademik=$this->db->query("select * from mahasiswa WHERE nim='".$_POST['nim']."'")->row()->angkatan;
            if (($semester=='I') or ($semester=='II'))$takademik=$takademik;
            if (($semester=='III') or ($semester=='IV'))$takademik=$takademik+1;
            if (($semester=='V') or ($semester=='VI'))$takademik=$takademik+2;
            if (($semester=='VII') or ($semester=='VIII'))$takademik=$takademik+3;
            $data=array(

                "nim"=>$_POST['nim'],
                "semester"=>$_POST['semester'],
                "sakit"=>$_POST['sakit'],
                "takademik"=>$takademik,
                "ijin"=>$_POST['ijin'],
                "alpa"=>$_POST['alpa'],

            );
            $this->db->insert('absen',$data);
            $message = array(
                'type' =>'success',
                'text'=>'Data Berhasil Disimpan' );
            return $message;

        }
    }
    public function update()
    {
        $this->form_validation->set_rules('nim', 'nim', 'required');
        $this->form_validation->set_rules('semester', 'semester', 'required');
        $this->form_validation->set_rules('sakit', 'sakit', 'required');
        $this->form_validation->set_rules('ijin', 'ijin', 'required');
        $this->form_validation->set_rules('alpa', 'alpa', 'required');


        if($this->form_validation->run()==FALSE){
            $message = array(
                'type' =>'error',
                'text'=>'Data Gagal Diedit' );
            return $message;
        }
        else{
            $semester=$_POST['semester'];
            $takademik=$this->db->query("select * from mahasiswa WHERE nim='".$_POST['nim']."'")->row()->angkatan;
            if (($semester=='I') or ($semester=='II'))$takademik=$takademik;
            if (($semester=='III') or ($semester=='IV'))$takademik=$takademik+1;
            if (($semester=='V') or ($semester=='VI'))$takademik=$takademik+2;
            if (($semester=='VII') or ($semester=='VIII'))$takademik=$takademik+3;
            $data=array(

                "nim"=>$_POST['nim'],
                "semester"=>$_POST['semester'],
                "takademik"=>$takademik,
                "sakit"=>$_POST['sakit'],
                "ijin"=>$_POST['ijin'],
                "alpa"=>$_POST['alpa'],

            );

            $this->db->where('id', $_POST['id']);
            $this->db->update('absen',$data);

            $message = array(
                'type' =>'success',
                'text'=>'Data Berhasil di Edit' );
            return $message;
        }
    }
}
