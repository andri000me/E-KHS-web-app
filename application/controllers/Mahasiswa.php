<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {






	public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
        if ($this->session->userdata('lv')!='mahasiswa')
        {
            redirect(base_url());        
        }
        if ($this->session->userdata('lv')=='')
        {
            redirect(base_url());        
        }
        $this->load->model('M_khs');
        $this->load->helper('hitung_helper');
		
		$img=$this->db->query("SELECT * FROM `mahasiswa` where nim='".$this->session->userdata('username')."'");
		
		$this->session->set_userdata('foto',$img->row()->foto);
		$this->session->set_userdata('nama',$img->row()->nama);
		if ($this->session->userdata('foto') ==''){

		$this->session->set_userdata('foto','user.jpg');
		}

    }



	public function index()
	{
		$data = array(	'title' =>"Mahasiswa - Home" ,
						 );

		$this->load->view('Mahasiswa/include/head',$data);
		$this->load->view('Mahasiswa/include/sidebar',$data);
		$this->load->view('Mahasiswa/include/header',$data);
		$this->load->view('Mahasiswa/index1',$data);
		$this->load->view('Mahasiswa/include/footer');

	}

	public function Profile()
	{
		$data = array(	'title' =>"Profile - Mahasiswa" ,
						'mhs'=>$this->db->query("SELECT mahasiswa.*,dosen.nama as dosen,prodi.prodi FROM  mahasiswa 
							LEFT JOIN prodi ON prodi.kodeprodi=mahasiswa.prodi
							LEFT JOIN dosen ON mahasiswa.nip=dosen.nip 
							where mahasiswa.nim='".$this->session->userdata('username')."'")->row(),
						'dosen'=> $this->db->query("SELECT dosen.*  FROM dosen, mahasiswa WHERE Mahasiswa.nip=dosen.nip AND mahasiswa.nim='".$this->session->userdata('username')."'")->row(), );

		$this->load->view('Mahasiswa/include/head',$data);
		$this->load->view('Mahasiswa/include/sidebar',$data);
		$this->load->view('Mahasiswa/include/header',$data);
		$this->load->view('Mahasiswa/profile',$data);
		$this->load->view('Mahasiswa/include/footer');

	}

	public function khs()
	{
		$data = array('title' =>"KHS - Mahasiswa",
						'semester'=>$this->db->query("SELECT khs.semester FROM khs WHERE khs.nim='".$this->session->userdata('username')."' GROUP BY khs.semester")->result(),
						 );

		$this->load->view('Mahasiswa/include/head',$data);
		$this->load->view('Mahasiswa/include/sidebar',$data);
		$this->load->view('Mahasiswa/include/header',$data);
		$this->load->view('Mahasiswa/khs',$data);
		$this->load->view('Mahasiswa/include/footer');
		$this->load->view('Mahasiswa/include/khs');


	}

	public function jadwal()
	{
		$sm="";
		$semester="";
		$img=$this->db->query("SELECT * FROM `mahasiswa` where nim='".$this->session->userdata('username')."'")->row();
		// $semester=$this->db->query("SELECT khs.semester FROM khs WHERE khs.nim='".$this->session->userdata('username')."' GROUP BY khs.semester  ORDER BY khs.semester DESC");
		// if ($semester->num_rows()>=1) {
		// 	if ($semester->row()->semester =="I")$sm="II";
		// 	else if ($semester->row()->semester =="II")$sm="III";
		// 	else if ($semester->row()->semester =="III")$sm="IV";
		// 	else if ($semester->row()->semester =="IV")$sm="V";
		// 	else if ($semester->row()->semester =="V")$sm="VI";
		// 	else if ($semester->row()->semester =="VI")$sm="VII";
		// 	else if ($semester->row()->semester =="VII")$sm="VIII";

		// }
		
		
		$sm=getjadwalsem($img->angkatan);
		
		$tgl=getdate();
		$tahun=$tgl['year'];

		$this->db->select('p.id,p.hari,p.jam_mulai,p.jam_selesai, P.kodeprodi, p.kodemk, p.nip, p.kelas, p.semester,d.nama, mk.namamk,prod.prodi,rk.nama_ruangan,rk.id_ruangan');
		$this->db->from('mkprodi p');
        $this->db->join('dosen d', 'p.nip=d.nip', 'left');
        $this->db->join('prodi prod', 'p.kodeprodi=prod.kodeprodi', 'left');
        $this->db->join('matakulah mk', 'p.kodemk=mk.kodemk', 'left');
        $this->db->join('ruangan rk', 'rk.id_ruangan=p.id_ruangan', 'left');
        $this->db->where('p.takademik', $tahun);
        $this->db->where('P.semester', getjadwalsem($img->angkatan));
		$this->db->like('P.kelas', $img->kelas);
		$sql=$this->db->get()->result();
		
		
		// $query="SELECT  p.hari,p.jam_mulai,p.jam_selesai, p.id,P.kodeprodi, p.kodemk, p.nip, p.kelas, p.semester,d.nama, mk.namamk,prod.prodi FROM mkprodi p,dosen d, prodi prod, matakulah mk WHERE p.nip=d.nip AND p.kodemk=mk.kodemk AND p.kodeprodi=prod.kodeprodi AND p.takademik='2016' AND p.semester ='I'AND p.kodeprodi='1'";
		// $sql=$this->db->query($query)->result();
		$data = array('title' =>"jadwal - Mahasiswa",
						'all'=>$sql,
					'Semester'=>$sm);
		

		$this->load->view('Mahasiswa/include/head',$data);
		$this->load->view('Mahasiswa/include/sidebar',$data);
		$this->load->view('Mahasiswa/include/header',$data);
		$this->load->view('Mahasiswa/jadwal',$data);
		$this->load->view('Mahasiswa/include/footer');

	}
	public function grafik()
	{
		$this->db->select('khs.nim,mahasiswa.nama,khs.semester,khs.status');
        $this->db->from('khs,matakulah,mahasiswa');
        $this->db->where('mahasiswa.nim=khs.nim AND matakulah.kodemk=khs.kodemk');
        $this->db->where('mahasiswa.nim', $this->session->userdata('username'));
        $this->db->group_by('khs.semester');
        $ip=$this->db->get()->result();
        // echo json_encode($ip);
        // die();
		$absen=$this->db->query("SELECT ab.semester,ab.sakit,ab.ijin,ab.alpa FROM mahasiswa mhs,absen ab WHERE ab.nim=mhs.nim AND ab.nim like '".$this->session->userdata('username')."'")->result(); 
		$a="";
		$s="";
		$i="";
		$al="";
		$sem='';
		foreach ($ip as $key) {
			$a .=$this->M_khs->get_ip($key->semester,$key->nim).",";
			$sem .= '"'.$key->semester.'",';
		}
		foreach ($absen as $key) {
			$s .=$key->sakit.",";
			$i .=$key->ijin.",";
			$al .=$key->alpa.",";
		}

		$data = array('title' =>"grafik - Mahasiswa" ,
						'ip'=>$a,
						'sem'=>$sem,
						's'=>$s,
						'i'=>$i,
						'a'=>$al,
						);

		$this->load->view('Mahasiswa/include/head',$data);
		$this->load->view('Mahasiswa/include/sidebar',$data);
		$this->load->view('Mahasiswa/include/header',$data);
		$this->load->view('Mahasiswa/grafik',$data);
		$this->load->view('Mahasiswa/include/footer');
		$this->load->view('Mahasiswa/include/grafik');

	}

	public function edit()
	{
		$data=array(
				
				"nama"=>$_POST['nama'],
				"tempat_lahir"=>$_POST['tempat_lahir'],
				"tgl_lahir"=>$_POST['tgl_lahir'],
				

			);
			$this->db->where('nim',$this->session->userdata('username') );
			$this->db->update('mahasiswa',$data);

			$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
			redirect('mahasiswa/profile');
	}
	public function editfoto()
	{
		
		$config['upload_path']          = './assets/foto/';
		$config['allowed_types']        = 'gif|jpg|png|JPEG|JPG';
		$config['file_name']            = $this->session->userdata('username');
		$config['overwrite']			= true;
		$config['max_size']             = 2048 * 20;
		
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('foto')) {
			$this->load->library('simple_image');
				$this->simple_image
				     ->fromFile('./assets/foto/'.$this->upload->data("file_name"))
				     ->thumbnail(1000, 1000, 'center')
				     ->toFile('./assets/foto/'.$this->upload->data("file_name"));
			$data=array(
				"foto"=>$this->upload->data("file_name"),	
			);
			$this->db->where('nim', $this->session->userdata('username'));
			$this->db->update('mahasiswa', $data);
			$this->session->set_flashdata('sukses',"Foto Berhasil Di upload");
			redirect('mahasiswa/profile');   

			
		}
		else 
		{
			$this->session->set_flashdata('error',"Foto Gagal Di upload");
			redirect('mahasiswa/profile');
		}
	}
	public function editPassword()
	{
		$this->form_validation->set_rules('NewPasswordConfirm', 'NewPasswordConfirm', 'required');
		

		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Password Gagal Di Edit");
			redirect('mahasiswa/index');
		}
		else if (md5($_POST['OldPassword'])!=$this->session->userdata('password')) {
			$this->session->set_flashdata('error',"Password Lama Tidak Cocok");
			redirect('mahasiswa/index');
		}
		else{

		$data=array(
				"password"=>md5($_POST['NewPasswordConfirm']),
				
			);
			$this->db->where('nim', $this->session->userdata('username') );
			$this->db->update('mahasiswa',$data);
			$this->session->set_userdata('password',md5($_POST['NewPasswordConfirm']));
			$this->session->set_flashdata('sukses',"Password Berhasil Diedit");
			redirect('mahasiswa/index');
		}
	}








}