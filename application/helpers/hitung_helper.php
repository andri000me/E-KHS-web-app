<?php

if(!function_exists('hitung_nilai'))
{
    function hitung_nilai($am)
    {
        $CI =& get_instance();
        $CI->load->model('M_setting','setting');
        $skala=$CI->setting->getSkala();
        foreach ($skala as $key ){
            if ($am >= $key->am) return $key->nilai;
        }
    }
}
if (!function_exists('nilai_huruf')) {
    function nilai_huruf($am)
    {
        $CI =& get_instance();
        $CI->load->model('M_setting','setting');
        $skala=$CI->setting->getSkala();
        foreach ($skala as $key ){
            if ($am >= $key->am) return $key->huruf;
        }
        
    }
}
if(!function_exists('nilai_kurang')){
    function nilai_kurang($am)
    {
        if($am<55){
            return "1";
        }
        else{
            return "0";
        }
    }
}
if (!function_exists('predikatKelulusan')){
    function predikatKelulusan($ip)
    {
        if ($ip<= 3) return "MEMUASKAN";
        elseif (($ip>3) && ($ip<=3.5)) return "SANGAT MEMUASKAN";
        elseif ($ip>3.5) return "DENGAN PUJIAN";
    }
}
if(!function_exists('jnilai')){
    function jnilai($am, $sks)
    {
        return hitung_nilai($am)*$sks;
    }
}
if (!function_exists('isKepro')) {
    function isKepro($nip)
    {
        $CI =& get_instance();
        $CI->db->where('kepro', $nip);
        $true=$CI->db->get('prodi')->num_rows();
        if ($true > 0) {
            return true;
        }
        return false;


    }
}

if(!function_exists('status')){
    function status($val)
    {
        if ($val== "2") return '<span style="cursor:pointer;" class="okk badge badge-warning">Menunggu Validasi Kajur/Sekjur</span>';
        else if($val=="1") return '<span style="cursor:pointer;" class="okk2 badge badge-success">Tervalidasi</span>';
        else return '<span style="cursor:pointer;" class="badge badge-danger okk2">Menunggu Verivikasi Kepro</span>';
    }
}

if(!function_exists('btnEdit')){
    function btnEdit($val)
    {
        if ($val== "1" or $val=="2") return '<div class="d-flex flex-row "><button disabled="disabled" class="btn btn-icon btn-round btn-info"><i class="fas fa-pen"></i></button></div>';
        else return '<div class="d-flex flex-row "><button class="btn btn-icon btn-round btn-info edit"><i class="fas fa-pen"></i></button></div>';
    }
}

if(!function_exists('stats')){
    function stats($val)
    {
        if ($val== "Aktif") 
        {
            return '<div class="btn-group dropdown">
            	<button type="button" class="btn btn-success btn-round dropdown-toggle btn-sm" data-toggle="dropdown"
            		aria-haspopup="true" aria-expanded="false">
            		Aktif
            	</button>
            	<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
            		<a class="dropdown-item statusChange cuti" href="#"><i class="text-warning fas fa-exclamation-circle"></i> Cutika</a>
            		<a class="dropdown-item statusChange do" href="#"><i class="text-danger fas fa-times-circle"></i> Drop
            			Out</a>
            	</ul>
            </div>';
        }
        else if ($val== "Cuti")
        {
            return '<div class="btn-group dropdown">
            	<button type="button" class="btn btn-warning btn-round dropdown-toggle btn-sm" data-toggle="dropdown"
            		aria-haspopup="true" aria-expanded="false">
            		Cuti
            	</button>
            	<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
            		<a class="dropdown-item statusChange aktif" href="#"><i class="text-success fas fa-check-circle"></i>
            			Aktifkan Kembali</a>
            		<a class="dropdown-item statusChange do" href="#"><i class="text-danger fas fa-times-circle"></i> Drop
            			Out</a>
            	</ul>
            </div>';
        }
        else if ($val== "Alumni") {
            return '<a class="btn btn-info btn-sm btn-round text-light ">Alumni</a>';
        } 
        else return '<a class="btn btn-danger btn-sm btn-round text-light ">Drop Out</a>';
    }
}

if(!function_exists('sts')){
    function sts($val)
    {
        if ($val== "Aktif") return '<span class="badge bg-success text-success"style="border: 2px solid white !important;">.</span>';
        else if ($val== "Cuti") return '<span class="text-warning badge bg-warning" style="border: 2px solid white !important;">.</span>';
        else if ($val== "Alumni") return '<span class="text-info badge bg-info" style="border: 2px solid white !important;">.</span>';
        else return '<span class="badge bg-danger text-danger" style="border: 2px solid white !important;">.</span>';
    }
}

if(!function_exists('sts2')){
    function sts2($val)
    {
        if ($val== "Aktif") return '<span class="badge bg-success text-light "style="border: 2px solid white !important;">Aktif</span>';
        else if ($val== "Cuti") return '<span class="text-light badge bg-warning" style="border: 2px solid white !important;">Cuti</span>';
        else if ($val== "Alumni") return '<span class="text-light badge bg-info" style="border: 2px solid white !important;">Alumni</span>';
        else return '<span class="badge bg-danger text-light" style="border: 2px solid white !important;">Drop Out</span>';
    }
}

if(!function_exists('semester')){
    function semester($semester = null)
    {
        if (($semester=="I" ) or ($semester=="III" )or($semester=="V" ) or ($semester=="VII" ) or ($semester=="XI" ))
		{
			return "GANJIL";
		}
		else return "GENAP";
    }
}

if(!function_exists('tgl_indo')){
    function tgl_indo($tanggal)
    {
        $bulan= array(
        1 =>'January',
            'February',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        return $pecahkan[2].' '.$bulan[ (int)$pecahkan[1] ].' '.$pecahkan[0];
    }
}

if(!function_exists('tgl_indo2')){
    function tgl_indo2($tanggal)
    {
        $bulan= array(
        1 =>'January',
            'February',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('/', $tanggal);
        return $pecahkan[1].' '.$bulan[ (int)$pecahkan[0] ].' '.$pecahkan[2];
    }
}

if(!function_exists('nama_depan')){
    function nama_depan($nama)
    {
        $pecahkan = explode(' ', $nama);
        return $pecahkan[0];
    }
}

if (!function_exists('getSemester')){
    function getSemester($semester)
    {
        $romawi= array(
            1 =>'I',
                'II',
                'III',
                'IV',
                'V',
                'VI',
                'VII',
                'VIII'
            );
        return $romawi[(int)$semester];
    }
}

if (!function_exists('getjadwalsem')){
    function getjadwalsem($angkatan)
    {
        $tgl=getdate();
        $tahun=$tgl['year'];
        $sisa=$tahun-(int)$angkatan;
        if($sisa < 4){
            $bulan=date('m');
            if ($bulan>=1 && $bulan<8){
                $semester= array(
                0 =>'II',
                    'IV',
                    'VI',
                    'VIII'
                );
                return $semester[(int)$sisa];

            }
            else{
                $semester= array(
                0 =>'I',
                    'III',
                    'V',
                    'VII'
                );
                return $semester[(int)$sisa];
                
            }
        }
        else{
            return 'Akhir (Tidak Ada Jadwal)';        }
        
    }
}



?>
