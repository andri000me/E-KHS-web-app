<?php
    $badge=$this->db->query("SELECT COUNT(status) as jumlah from khs WHERE status != '1' GROUP BY semester, nim")->num_rows();
?>


<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="<?=base_url()?>/assets/images/<?=$this->session->userdata('foto');?>" alt="..." class="avatar-img rounded-circle FotoUser">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <span class="nUser"><?=$this->session->userdata('nama');?></span>
                            
                            <span class="user-level"><?=$this->session->userdata('lv');?></span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="<?=base_url()?>kajur/profile">
                                    <span class="link-collapse">Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>login/logout">
                                    <span class="link-collapse">Log Out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item">
                    <a href="<?=base_url()?>kajur/index">
                        <i class="fas fa-desktop"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fas fa-copy"></i>
                    </span>
                    <h4 class="text-section">Data</h4>
                </li>
                <li class="nav-item ">
                    <a href="<?=base_url()?>kajur/khs">
                        <i class="fas fa-list-alt"></i>
                        <p>Nilai</p>
                       
                        <?php if ($badge > 0)  echo ' <span class="badge badge-warning">'.$badge.'</span>';?>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="<?=base_url()?>kajur/jadwal">
                        <i class="far fa-calendar-alt"></i>
                        <p>Jadwal</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="<?=base_url()?>kajur/absensi">
                        <i class="far fa-calendar-check"></i>
                        <p>Absensi</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fas fa-database"></i>
                    </span>
                    <h4 class="text-section">Master Data</h4>
                </li>
                <li class="nav-item ">
                    <a href="<?=base_url()?>kajur/mahasiswa">
                        <i class="fas fa-user-graduate"></i>
                        <p>Mahasiswa</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="<?=base_url()?>kajur/dosen">
                        <i class="fas fa-user-tie"></i>
                        <p>Dosen</p>
                    </a>
                </li>
        
                <li class="nav-item ">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-book"></i>
                        <p>Matakuliah</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse " id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?=base_url()?>kajur/elemen_mk">
                                    <span class="sub-item">Elemen Kompetensi</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>kajur/matakuliah">
                                    <span class="sub-item">Matakuliah</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fas fa-cogs"></i>
                    </span>
                    <h4 class="text-section">Pengaturan</h4>
                </li>
                <li class="nav-item ">
                    <a data-toggle="collapse" href="#sett">
                        <i class="fas fa-cog"></i>
                        <p>Setting</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse BARUUU " id="sett">
                        <ul class="nav nav-collapse ">
                            <li>
                                <a href="<?=base_url()?>kajur/user">
                                    <span class="sub-item">User/Operator</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>kajur/pejabat">
                                    <span class="sub-item">Pejabat</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>kajur/batas_Waktu">
                                    <span class="sub-item">Batas Input Nilai</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->