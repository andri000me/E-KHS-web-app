<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Khs extends CI_Controller {

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
		$data=[
			'mk' => $this->db->query("SELECT mkprodi.kodemk as kode ,matakulah.namamk as nama FROM mkprodi,matakulah WHERE mkprodi.kodemk=matakulah.kodemk AND mkprodi.nip='".$this->session->userdata('username')."' AND mkprodi.takademik='".$this->session->userdata('takademik')."' group by mkprodi.kodemk")->result(),
			"sem"=> $this->db->query("SELECT mkprodi.semester FROM mkprodi WHERE mkprodi.nip='".$this->session->userdata('username')."' AND mkprodi.takademik='".$this->session->userdata('takademik')."' group by mkprodi.semester")->result(),
			"kel"=> $this->db->query("SELECT mkprodi.kelas FROM mkprodi WHERE mkprodi.nip='".$this->session->userdata('username')."' AND mkprodi.takademik='".$this->session->userdata('takademik')."' group by mkprodi.kelas")->result(),

			"prod"=> $this->db->query("SELECT mkprodi.kodeprodi,prodi.prodi FROM mkprodi, prodi WHERE mkprodi.kodeprodi=prodi.kodeprodi AND  mkprodi.nip='".$this->session->userdata('username')."' AND mkprodi.takademik='".$this->session->userdata('takademik')."' group by mkprodi.kodeprodi ")->result(),
		];
		$this->load->view('include/head');
		$this->load->view('include/header_dosen');
		$this->load->view('include/sidebar_dosen');   
		$this->load->view('dosen/khs',$data);
	}
   
	public function data_khs()
	{
		$this->db->select('khs.id,khs.status,mhs.nim,mhs.nama,mhs.kelas,mk.kodemk,mk.namamk,khs.am,khs.semester');
		$this->db->from('khs, matakulah mk,mahasiswa mhs,mkprodi mkp ');
		$this->db->where('khs.takademik', $this->session->userdata('takademik'));
		
		$this->db->group_by('khs.id');
		$this->db->where("mk.kodemk=khs.kodemk AND khs.nim=mhs.nim and mk.kodemk=mkp.kodemk and mkp.nip='".$this->session->userdata('username')."'  ");
		if($this->input->post('semester'))
		{
			$this->db->where('khs.semester', $this->input->post('semester'));
		}
		if($this->input->post('kelas'))
		{
			$this->db->like('mhs.kelas', $this->input->post('kelas'));
		}
		if($this->input->post('matakuliah'))
		{
			$this->db->like('mk.kodemk', $this->input->post('matakuliah'));
		}
		if($this->input->post('prodi'))
		{
			$this->db->like('mhs.prodi', $this->input->post('prodi'));
		}
		
		$data=$this->db->get()->result();
		$output=array();
		$no=0;
		foreach ($data as $key) {
			$row=array();
			$no++;
			$row[]=$key->id;
			$row[]=$no;
			$row[]=$key->nim;
			$row[]=$key->nama;
			$row[]=$key->kelas;
			$row[]=$key->semester;
			$row[]=$key->namamk;
			$row[]=$key->am;
			$row[]=status($key->status);
			$row[]='<div class="d-flex flex-row ">
			
			<button class="btn btn-icon btn-round btn-info edit"><i class="fas fa-pen"></i></button></div>';
			$output[]=$row;
		}
		$result=array(
		 
			'data'=>$output,
			
		);
		echo json_encode($result);

		
	}

	public function getMhs()
	{
		$ta='';
		$output = '';
		$query = 'Z';
		$output=array();
		$tahun=$this->session->userdata('takademik');
		if($this->input->post('kelas'))
		{

			$query = $this->input->post('kelas');
			$mk=$this->input->post('matakuliah');
			$sm=$this->input->post('semester');
			$pr=$this->input->post('prodi');
			if ($sm=='I' | $sm=='II')  {
				$ta=$tahun;
			}
			if ($sm=='III' | $sm=='IV')  {
				$ta=$tahun-1;
			}
			if ($sm=='V' | $sm=='VI')  {
				$ta=$tahun-2;
			}
			if ($sm=='VII' | $sm=='VII')  {
				$ta=$tahun-3;
			}

			$this->db->select('mhs.nim,mhs.nama,mhs.kelas');
			$this->db->from('mahasiswa mhs, mkprodi mkp');
			$this->db->where('mhs.prodi=mkp.kodeprodi and mhs.kelas=mkp.kelas');
			$this->db->where('mkp.nip', $this->session->userdata('username'));
			$this->db->where('mhs.angkatan', $ta);
			$this->db->where('mhs.status','Aktif');
			$this->db->where('mhs.kelas', $query);
			$this->db->where('mhs.prodi', $pr);
			$this->db->group_by('mhs.nim');

			$data=$this->db->get()->result();
			
			$no=0;
			foreach ($data as $key) {
				$row=array();
				$no++;
				$row[]= $no;
				$row[]='
				<input type="hidden" class="mk" name="mk[]" value="'.$mk.'">
				<input type="hidden" class="sm" name="sm[]" value="'.$sm.'">
				<input type="hidden" class="sm" name="ta[]" value="'.$tahun.'">
				<input type="text" style="background-color: rgba(0 0 0 0); border: none;" name="nim[]" readonly value="'.$key->nim.'">';
				$row[]=$key->nama;
				$row[]='<input type="text" style="background-color: rgba(0 0 0 0); border: none;" name="am[]" placeholder="Masukan AM">';
				$output[]=$row;
			}
		}
		$result=array(
		 
			'data'=>$output,
			
		);
		echo json_encode($result);
		

	
	}

   
	// Add a new item
	public function add()
	{
		$nim=$_POST['nim'];
		$kodemk=$_POST['mk'];
		$semester=$_POST['sm'];
		$takademik=$_POST['ta'];
		$am=$_POST['am'];
		$index=0;
		$data=array();
		// $cek=$this->db->query("SELECT id from khs WHERE nim IN ('$nim') and kodemk IN '($kodemk)'");
	
		// if ($cek->num_rows() > 0) {
  //       $message = array(
  //         'type' =>'error',
  //         'text'=>'Data Sudah Ada');
  //       echo json_encode($message);
  //   }
  //   else{
			foreach($nim as $datanim)
			{ 
				$data[]= array(
				'nim'=>$datanim,
				'kodemk'=>$kodemk[$index],
				'semester'=>$semester[$index], 
				'am'=>$am[$index],
				'takademik'=>$takademik[$index], 
				);
				$index++;
			}
			$input=$this->db->insert_batch('khs', $data);
			if($input){
				$message = array(
					'type' =>'success',
					'text'=>'Data Berhasil di Input' );
				echo json_encode($message);
			}
			else{
				$message = array(
					'type' =>'Gagal',
					'text'=>'Data Sudah Ada');
				echo json_encode($message);
			}
			
	   
  	//}
	}

	// Add a new item
	public function add_one()
	{
			$data=$this->M_khs->add();
			echo json_encode($data);
	}

	//Update one item
	public function update()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('am', 'am', 'required');

        if($this->form_validation->run()==FALSE){
            $message = array(
                'type' =>'error',
                'text'=>'Data Gagal Diedit');
            echo json_encode($message);
        }
        else{
           
            $data=array(

                "am"=>$_POST['am'],

            );

            $this->db->where('id', $_POST['id']);
            $this->db->update('khs',$data);

            $message = array(
                'type' =>'success',
                'text'=>'Data Berhasil di Edit' );
            echo json_encode($message);
        }
	}

	//Delete one item
	public function delete( $id = NULL )
	{
		$this->db->where('id', $this->input->get('id'));
		$this->db->delete('khs');
		echo "ok";
	}
}

/* End of file Controllername.php */

