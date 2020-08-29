<?php

if(!function_exists('hitung_nilai'))
{
    function hitung_nilai($am)
    {
        if ($am < 40)  return 0.0;
        else if(($am >=40) && ($am<55)) return 1.00;
        else if (($am>=55) && ($am<60)) return 1.50;
        else if (($am >=60) && ($am<65)) return 2.00;
        else if (($am >=65) &&($am<70)) return 2.50;
        else if (($am >= 70) && ($am<75)) return 3.00;
        else if (($am >= 75) && ($am<80)) return 3.50;
        else if ($am >= 80) return 4.00;
    }
}
if (!function_exists('nilai_huruf')) {
    function nilai_huruf($am)
    {
        if ($am < 40)  return "E";
        else if(($am >=40) && ($am<55)) return "D";
        else if (($am>=55) && ($am<60)) return "CD";
        else if (($am >=60) && ($am<65)) return "C";
        else if (($am >=65) &&($am<70)) return "BC";
        else if (($am >= 70) && ($am<75)) return "B";
        else if (($am >= 75) && ($am<80)) return "AB";
        else if ($am >= 80) return "A";   
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

if(!function_exists('status')){
    function status($val)
    {
        if ($val== "1") return '<span style="cursor:pointer;" class="okk badge badge-success">Verivied</span>';
        else return '<span style="cursor:pointer;" class="badge okk badge-warning">Not Verivied</span>';
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



?>
