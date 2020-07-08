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
		$this->db->group_by('khs.nim');
	
		return $this->db->get()->result();

	}
	public function get_khs($semester,$nim)
	{
		$this->db->select('khs.id,khs.am,khs.semester, matakulah.kodemk,matakulah.namamk ,matakulah.sks');
		$this->db->from('khs,matakulah,mahasiswa');
		$this->db->where('mahasiswa.nim=khs.nim AND matakulah.kodemk=khs.kodemk');
		$this->db->where('khs.semester',$semester);
		$this->db->where('khs.nim', $nim);
		
		return $this->db->get()->result();
	}
	public function nilaiE($semester,$nim)
	{
		$this->db->where('semester',$semester);
		$this->db->where('nim', $nim);
		$this->db->where('am<=34');
		$cekE =$this->db->get('khs');
		return $cekE->num_rows();
	}
	public function nilaiD($semester,$nim)
	{
		$this->db->where('semester',$semester);
		$this->db->where('nim', $nim);
		$this->db->where('am>=35');
		$this->db->where('am<=45');
		$cekD =$this->db->get('khs');
		return $cekD->num_rows();
	}
	public function cekVer($semester,$nim)
	{
		$this->db->where('semester',$semester);
		$this->db->where('nim', $nim);
		$this->db->where('status != 1');
		return $this->db->get('khs')->num_rows();
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
	public function getIPK($semester,$nim)
	{
		$this->load->helper('hitung');
		$this->db->select('khs.am,khs.semester, matakulah.kodemk,matakulah.namamk ,matakulah.sks');
		$this->db->from('khs,matakulah,mahasiswa');
		$this->db->where('mahasiswa.nim=khs.nim AND matakulah.kodemk=khs.kodemk');
		$this->db->where("khs.semester BETWEEN 'I' AND '".$semester."' ");
		$this->db->where('khs.nim', $nim);
		$data=$this->db->get()->result();
		$jumlah= 0;
		$jumlahsks=0; 
		foreach ($data as $key) {
			$jumlah += jnilai($key->am,$key->sks);
			$jumlahsks += (float)$key->sks;
		}
		return round ($jumlah/$jumlahsks,2);
   
	}

	//select berdasarkan elemen mk
	public function daftarNilai($nim,$el)
	{
		$this->db->select('khs.kodemk,matakulah.namamk,khs.am,matakulah.sks,khs.semester');
		$this->db->from('khs,matakulah');
		$this->db->where('khs.kodemk=matakulah.kodemk');
		$this->db->where('khs.nim', $nim);
		$this->db->where('matakulah.elemenmk', $el);
		return $this->db->get()->result();
	}


	

	// Add a new item
	public function add()
	{
		$semester="";
		$nim=$_POST['nim'];
		$this->db->where('nim', $nim);
		$prodi= $this->db->get('mahasiswa')->row()->prodi;
		$jenjang=$this->db->query("SELECT * FROM prodi where kodeprodi='$prodi'")->row()->jenjang;
		if ($jenjang=="D3") {
			$semester="VI";
		} else {
			$semester="VIII";
		}
		$kodemk=$_POST['matakuliah'];
		$takademik=$this->session->userdata('takademik');
		$am=$_POST['am'];

		$cek=$this->db->query("SELECT * FROM khs where nim='$nim' and kodemk='$kodemk'");
		if ($cek->num_rows() > 0) {
			$message = array(
				'type' =>'error',
				'text'=>'Data Sudah Ada' );
			return $message ;
		} else {

			$data=[
				'nim'=>$nim,
				'kodemk'=>$kodemk,
				'semester'=>$semester, 
				'am'=>$am,
				'takademik'=>$takademik 
			];
			$this->db->insert('khs', $data);
			if ($this->input->post('judul')) {
				$data1=[
					"nim"=>$nim,
					"judul"=>$this->input->post('judul'),
					"tanggal_lulus"=>date('Y-m-d')
				];
				$this->db->insert('tugas_akhir', $data1);
				$dt=["status"=>"Alumni"];
				$this->db->where('nim', $nim);
				$this->db->update('mahasiswa', $dt);
			}
			$message = array(
				'type' =>'success',
				'text'=>'Data Berhasil di Input' );
			return $message ;
		}
		
	}

	//Update one item
	public function update()
	{
			$data=[ 
				'am'=>$this->input->post('am'),
			];
			$this->db->where('id', $this->input->post('id_khs'));
			$this->db->update('khs', $data);
			if ($this->input->post('judul')) {
				$data1=[
					"judul"=>$this->input->post('judul'),
				];
				$this->db->where('nim', $this->input->post('nim'));
				$this->db->update('tugas_akhir', $data1);
			}
			$message = array(
				'type' =>'success',
				'text'=>'Data Berhasil di Update' );
			return $message ;
	}

	//Delete one item
	public function delete( $id = NULL )
	{

	}
}
