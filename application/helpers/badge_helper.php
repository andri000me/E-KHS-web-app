<?php

if(!function_exists('statMhs'))
{
    function statMhs($val)
    {
		if ($val== "Aktif") return '<div class="badge badge-success badge-pill">Aktif</div>';
        else if ($val== "Cuti") return '<div class="badge badge-warning badge-pill">Cuti</div>';
        else if ($val== "Alumni") return '<div class="badge badge-info badge-pill">Alumni</div>';
        else return '<div class="badge badge-danger badge-pill">Drop Out</div>';
    }
}