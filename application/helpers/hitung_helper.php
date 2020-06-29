<?php

if(!function_exists('hitung_nilai'))
{
    function hitung_nilai($am)
    {
        if ($am <= 34)  return 0.0;
        else if(($am >=35) && ($am<=45)) return 1.0;
        else if (($am>=46) && ($am<=55)) return 1.5;
        else if (($am >=56) && ($am<=64)) return 2.0;
        else if (($am >=65) &&($am<=69)) return 2.5;
        else if (($am >= 70) && ($am<=74)) return 3.0;
        else if (($am >= 75) && ($am<=79)) return 3.5;
        else if ($am >= 80) return 4.0;
    }
}
if (!function_exists('nilai_huruf')) {
    function nilai_huruf($value)
    {
        if ($value <= 34) return "E";
        else if(($value >=35) && ($value<=45)) return "D";
        else if (($value>=46) && ($value<=55)) return "CD";
        else if (($value >=56) && ($value<=64)) return "C";
        else if (($value >=65) &&($value<=69)) return "BC";
        else if (($value >= 70) && ($value<=74)) return "B";
        else if (($value >= 75) && ($value<=79)) return "AB";
        else if ($value >= 80)return "A";    
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
        if ($val== "1") return '<span style="cursor:pointer;" class="badge badge-success">Verivied</span>';
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
        else return '<a class="btn btn-danger btn-sm btn-round text-light ">Drop Out</a>';
    }
}

if(!function_exists('sts')){
    function sts($val)
    {
        if ($val== "Aktif") return '<span class="badge bg-success text-success"style="border: 2px solid white !important;">.</span>';
        else if ($val== "Cuti") return '<span class="text-warning badge bg-warning" style="border: 2px solid white !important;">.</span>';
        else return '<span class="badge bg-danger text-danger" style="border: 2px solid white !important;">.</span>';
    }
}

if(!function_exists('sts2')){
    function sts2($val)
    {
        if ($val== "Aktif") return '<span class="badge bg-success text-light "style="border: 2px solid white !important;">Aktif</span>';
        else if ($val== "Cuti") return '<span class="text-light badge bg-warning" style="border: 2px solid white !important;">Cuti</span>';
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



?>
