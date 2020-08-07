<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class report extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('M_khs');
        $this->load->model('M_absensi');
        $this->load->helper('hitung');

    }

    // List all your items
    public function khs()
    {
        $sem=$this->input->get('semester');
        $nim=$this->input->get('nim');
        $all=$this->M_khs->get_khs($sem,$nim);

        $kodeProdi=$this->db->query("SELECT prodi FrOM mahasiswa where nim='$nim'")->row()->prodi;
        $prodi=$this->db->query("SELECT prodi.*, dosen.nama FROM dosen,prodi wherE prodi.kepro=dosen.nip AND kodeprodi='$kodeProdi'")->row();
        // cek niali
        $nilaiE=$this->M_khs->nilaiE($sem,$nim);
        $nilaiD=$this->M_khs->nilaiD($sem,$nim);

        // cek absensi
        $alpa=$this->M_absensi->alpa($sem,$nim);

        //cek status
        $cekVer=$this->M_khs->cekVer($sem,$nim);

        $ip=$this->M_khs->get_ip($sem,$nim);
        $ipk=$this->M_khs->getIPK($sem,$nim);

        
        $semester = semester($sem);
        $status="";
       
        
        if (($nilaiE >0)  or ($alpa>76))  
        {
            $status="TIDAK LULUS";
        }
        elseif ( ($ipk < 2) & ($nilaiD >4) ) {
            $status="TIDAK LULUS";
        }
        else $status="LULUS";

    


        $data=array(
            "all"=>$all,
            "ip"=> $ip,

            
            "ipk"=>$ipk,
            "abs"=>$this->db->query("SELECT * FROM absen WHERE nim='$nim' and semester='$sem'")->result(),
            "mhs"=>$this->db->query("SELECT mhs.nim,mhs.nama,prod.prodi,mhs.kelas,mhs.angkatan from mahasiswa mhs,prodi prod WHERE prod.kodeprodi=mhs.prodi and mhs.nim like '".$nim."'")->result(),
            "smt"=>$semester,
            "tsem"=>$sem,
            "status"=>$status,
            "title"=>"KHS",
            "takd"=>$this->session->userdata('takademik'),
            'tgl'=>tgl_indo(date('Y-m-d')),
            "kajur"=>$this->db->query('SELECT * FROM pejabat WHERE kode=1')->result(),
            "pudir"=>$this->db->query('SELECT * FROM pejabat WHERE kode=2')->result(),
            "prodi"=>$this->db->query("SELECT prodi.*, dosen.nama FROM dosen,prodi wherE prodi.kepro=dosen.nip AND kodeprodi='$kodeProdi'")->row(),

            
         );
        if ($cekVer > 0) {
            echo("<script>alert('Data Belum Di Verifikasi Oleh Kajur / Sekjur'); </script>");
        }
        else 
            {
                $this->load->view('operator/report/khs',$data);
        
            }
        
        
    }
    public function daftarNilai()
    {
        $nim=$_GET['nim'];
        $tugas_akhir=$this->db->query("SELECT * FROM tugas_akhir where nim='$nim'");
        $mhs=$this->db->query("SELECT mahasiswa.nim, mahasiswa.tempat_lahir, mahasiswa.nama, mahasiswa.tgl_lahir, prodi.prodi, prodi.jenjang FROM mahasiswa, prodi WHERE mahasiswa.nim = '".$nim."' and mahasiswa.prodi = prodi.kodeprodi")->row();
        $kajur=$this->db->query("SELECT pejabat.nip, pejabat.nama FROM pejabat WHERE pejabat.kode = '1'")->row();
        $pudir=$this->db->query("SELECT pejabat.nip, pejabat.nama FROM pejabat WHERE pejabat.kode = '2'")->row();

        $tot=$this->db->query("SELECT SUM(matakulah.sks)as jumsks,SUM(khs.am)/COUNT(khs.am) as nilai FROM khs, matakulah WHERE khs.kodemk = matakulah.kodemk AND khs.nim = '$nim'")->row();

        $ipk= number_format (jnilai($tot->nilai,$tot->jumsks)/$tot->jumsks,2);//round($tot->jnxsks/$tot->jumsks);

        
        if ($tugas_akhir->num_rows() < 1) {
           echo "<script>alert('Mahasiswa ini Belum Lulus'); </script>";
        }
        else{
            $data= array(
            'tgl'=>tgl_indo(date('Y-m-d')),
            'tgl_lahir'=>tgl_indo($mhs->tgl_lahir),
            'mhs' =>$mhs,
            'predikat'=>predikatKelulusan($ipk),
            'mpk'=>$this->M_khs->daftarNilai($nim,'MHR'),
            'mkk'=>$this->M_khs->daftarNilai($nim,'MSD'),
            'mkb'=>$this->M_khs->daftarNilai($nim,'MSK'),
            'mpb'=>$this->M_khs->daftarNilai($nim,'MST'),
            'tot'=>$tot,
            'judul'=>$tugas_akhir->row()->judul,
            'tgl_lulus'=>tgl_indo($tugas_akhir->row()->tanggal_lulus),
            'ipk'=>$ipk ,
            'kajur'=>$kajur,
            'pudir'=>$pudir,
            'title'=>"Daftar Nilai - ".$mhs->nama,

        );
            $this->load->view('operator/report/daftarNilai',$data);
        }

         

    }
   
    
    public function jadwal()

    {
        $semester=$_GET['semester'];
        $prod=$this->session->userdata('prodiLog');
        $kelas=$_GET['kelas'];
        $ta1=$this->session->userdata('takademik');

        $this->db->select("p.id_hari,p.hari, (SELECT COUNT(hari) FROM mkprodi WHERE hari=p.hari and 
            kelas=p.kelas and
            kodeprodi=p.kodeprodi and
            takademik=p.takademik and
            semester=p.semester) as jum, p.jam_mulai,p.jam_selesai, p.id,P.kodeprodi, p.kodemk, p.nip, p.kelas, p.semester,d.nama, mk.namamk,prod.prodi,r.nama_ruangan");
        $this->db->from('ruangan r, mkprodi p,dosen d, prodi prod, matakulah mk');
        $this->db->where('r.id_ruangan=p.id_ruangan AND p.nip=d.nip AND p.kodemk=mk.kodemk AND p.kodeprodi=prod.kodeprodi');
        $this->db->where('p.kelas', $kelas);
        $this->db->where('p.kodeprodi', $prod);
        $this->db->where('p.takademik', $ta1);
        $this->db->where('p.semester', $semester);
        $this->db->order_by('p.id_hari,p.jam_mulai', 'asc');

        $all=$this->db->get()->result();

        $prodi=$this->db->query("SELECT * FROM prodi where kodeprodi='".$prod."'")->row();
      
        $data=array(
            'all'=>$all,
            'judul'=>"Kelas ".$kelas." Prodi ".$prodi->prodi." semester ".$semester,
            'kajur'=>$this->db->query("SELECT pejabat.nip, pejabat.nama FROM pejabat WHERE pejabat.kode = '1'")->row(),
            'tgl'=>tgl_indo(date('Y-m-d')),

        );
        $this->load->view('operator/report/pdfjadwal', $data);
    }
    public function mahasiswa()

    {
        $kelas=$_GET['kelas'];
        $prodi=$this->session->userdata('prodiLog');
        $angkatan=$_GET['angkatan'];
        $all=$this->db->query("SELECT mahasiswa.*,prodi.prodi as namaprodi FROM mahasiswa,prodi where mahasiswa.prodi=prodi.kodeprodi and kelas='".$kelas."' AND mahasiswa.prodi='".$prodi."' and angkatan='".$angkatan."'")->result();
        $prodi=$this->db->query("SELECT * FROM prodi where kodeprodi='".$prodi."'")->row();

        $data=array(
            'all'=>$all,
            'kop'=>"Data Mahasiswa",
            'judul'=>"Prodi ".$prodi->prodi." Kelas ".$kelas." angkatan ".$angkatan,
            'kajur'=>$this->db->query("SELECT pejabat.nip, pejabat.nama FROM pejabat WHERE pejabat.kode = '1'")->row(),
            'tgl'=>tgl_indo(date('Y-m-d')),

        );
        $this->load->view('operator/report/pdfmhs', $data);
    }
    public function absensi()

    {
        $semester=$_GET['semester'];
        $prod=$this->session->userdata('prodiLog');
        $kelas=$_GET['kelas'];
        $takademik=$this->session->userdata('takademik');
        $prodi=$this->db->query("SELECT * FROM prodi where kodeprodi='".$prod."'")->row();

        $this->db->select('ab.id,mhs.nama,ab.nim,ab.semester,ab.sakit,ab.ijin,ab.alpa');
        $this->db->from('mahasiswa mhs,absen ab');
        $this->db->where('ab.nim=mhs.nim');
        $this->db->where('mhs.kelas', $kelas);
        $this->db->where('mhs.prodi', $prod);
        $this->db->where('ab.semester', $semester);
        $this->db->where('ab.takademik', $takademik);

        $all=$this->db->get()->result();
        // $all=$this->db->query("SELECT ab.id,mhs.nama,ab.nim,ab.semester,ab.sakit,ab.ijin,ab.alpa FROM mahasiswa mhs,absen ab WHERE ab.nim=mhs.nim AND mhs.kelas='".$kelas."' AND mhs.prodi='".$prod."' AND ab.semester='".$semester."' AND ab.takademik='".$takademik."'")->result();


        $data=array(
            'all'=>$all,
            'judul'=>"Kelas ".$kelas." Prodi ".$prodi->prodi." semester ".$semester,
            'kajur'=>$this->db->query("SELECT pejabat.nip, pejabat.nama FROM pejabat WHERE pejabat.kode = '1'")->row(),
            'tgl'=>tgl_indo(date('Y-m-d')),

        );
        $this->load->view('operator/report/pdfabsen', $data);
    }
   



   
}

/* End of file Controllername.php */

