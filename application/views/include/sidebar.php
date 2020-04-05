
<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="<?=base_url()?>/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            Hizrian
                            <span class="user-level">Administrator</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Log Out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item">
                    <a href="<?=base_url()?>operator/index">
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
                    <a href="<?=base_url()?>operator/khs">
                        <i class="fas fa-list-alt"></i>
                        <p>KHS</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="<?=base_url()?>operator/jadwal">
                        <i class="far fa-calendar-alt"></i>
                        <p>Jadwal</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="<?=base_url()?>operator/absensi">
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
                    <a href="<?=base_url()?>operator/mahasiswa">
                        <i class="fas fa-graduation-cap"></i>
                        <p>Mahasiswa</p>
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
                                <a href="<?=base_url()?>operator/elemen_mk">
                                    <span class="sub-item">Elemen Kompetensi</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>operator/matakuliah">
                                    <span class="sub-item">Matakuliah</span>
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