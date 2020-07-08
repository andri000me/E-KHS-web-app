<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class khs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('M_khs');
		$this->load->helper('hitung');
		
	}

	// List all your items
	public function index( $offset = 0 )
	{
		$this->db->where_in('namamk', ["TA","PKL"]);
		$data['mk']=$this->db->get('matakulah')->result();
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/sidebar');   
		$this->load->view('operator/khs',$data);
	}
   
	public function data_khs()
	{
		
		$data=$this->M_khs->getdata();
		$output=array();
		$no=0;
		foreach ($data as $key) {
			$row=array();
			$no++;
			$row[] = $no;
			$row[]=$key->nim;
			$row[]=$key->nama;
			$row[]=$key->semester;
			$row[]=$this->M_khs->get_ip($key->semester,$key->nim);
			$row[]=status($key->status);
			$row[]='<div class="d-flex flex-row ">
			<button class="mr-2 btn btn-icon btn-round btn-secondary tggl"><i class="fas fa-eye"></i></button>
			<button class="btn btn-icon btn-round btn-info print"><i class="fas fa-print"></i></button></div>';
			$output[]=$row;
		}
		$result=array(
		 
			'data'=>$output,
			
		);
		echo json_encode($result);

		
	}
	public function get_khs()
	{
		$sem=$this->input->get('semester');
		$nim=$this->input->get('nim');
		if ($this->input->get('semester')) {
			
			$this->db->where('nim', $nim);
			$prodi= $this->db->get('mahasiswa')->row()->prodi;
			$btn ='';
			$jenjang=$this->db->query("SELECT * FROM prodi where kodeprodi='$prodi'")->row()->jenjang;
			if (($jenjang=='D3') && ($sem=='VI')) {
				$btn ='<div class="d-flex flex-row">
					<button class="mr-2 btn btn-icon btn-round btn-success btn-edit"><i class="icon-pencil"></i></button>
					<button class="btn btn-icon btn-round btn-danger hapus"><i class="icon-trash"></i></button>
				</div>';
			}
			else if (($jenjang=='D4') && ($sem=='VIII')){
				$btn ='<div class="d-flex flex-row">
					<button class="mr-2 btn btn-icon btn-round btn-success btn-edit"><i class="icon-pencil"></i></button>
					<button class="btn btn-icon btn-round btn-danger hapus"><i class="icon-trash"></i></button>
				</div>';
			}
		}
		
		$data=$this->M_khs->get_khs($sem,$nim);
		$output=array();
		$no=0;
		foreach ($data as $key) {
			$row=array();
			$no++;
			$row[] = $no;
			$row[]=$key->kodemk;
			$row[]=$key->namamk;
			$row[]=$key->am;
			$row[]=hitung_nilai($key->am);
			$row[]=$key->sks;
			$row[]=$btn;
			$row[]=$key->id;
			$output[]=$row;
		}
		$result=array(
		 
			'data'=>$output,
			
		);
		echo json_encode($result);

	}
	public function cetak_khs()
	{
		
	}

	// Add a new item
	public function add()
	{
			$data=$this->M_khs->add();
			echo json_encode($data);
	}

	//Update one item
	public function update()
	{
			$data=$this->M_khs->update();
			echo json_encode($data);
	}

	//Delete one item
	public function delete()
	{

		$id=$this->input->get('id');

		$this->db->where('id', $id);
		$tb_khs=$this->db->get('khs')->row();

		$nim=$tb_khs->nim;
		$kodemk=$tb_khs->kodemk;

		$this->db->where('kodemk', $kodemk);
		$mk=$this->db->get('matakulah')->row()->namamk;

		
    $this->db->where('id', $id);
    $khs=$this->db->delete('khs');
		if ($mk=="TA") {
	    $this->db->where('nim', $nim);
	    $ta=$this->db->delete('tugas_akhir');

	    $dt=["status"=>"Aktif"];
			$this->db->where('nim', $nim);
			$this->db->update('mahasiswa', $dt);
		}
    echo "ok";
	}
}

/* End of file Controllername.php */

