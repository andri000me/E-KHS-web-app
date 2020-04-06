<div class="main-header">
	<!-- Logo Header -->
	<div class="logo-header" data-background-color="blue">
		
		<a href="index-2.html" class="logo">
			<img src="<?=base_url()?>assets/img/logo.svg" alt="navbar brand" class="navbar-brand">
		</a>
		<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon">
				<i class="icon-menu"></i>
			</span>
		</button>
		<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
		<div class="nav-toggle">
			<button class="btn btn-toggle toggle-sidebar">
				<i class="icon-menu"></i>
			</button>
		</div>
	</div>
	<!-- End Logo Header -->

	<!-- Navbar Header -->
	<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
		
		<div class="container-fluid">
		
			<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

				<li class="nav-item dropdown hidden-caret">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                        <span class="TA">TA <?=$this->session->userdata('takademik');?> /<?php echo  $this->session->userdata('takademik')+1; ?></span>
                        <i class="icon-calendar"></i>
					</a>
                    <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
						<li>
							<div class="dropdown-title">Tahun Akademik</div>
						</li>
                        <?php
                        $tgla=getdate();
                        for ($a=$tgla['year']; $a>= 2016;$a--)
                        {?>
                            <li>
                                <a class="see-all" href="javascript:setTA(<?=$a;?>);"><?php echo $a; ?>/<?php echo $a+1; ?><i class="fa fa-angle-right"></i> </a>
                            </li>
                        <?php  } ?>
						
					</ul>
                </li>
				<li class="nav-item dropdown hidden-caret">
					<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
						<i class="icon-layers"></i>
					</a>
					<div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
						<div class="quick-actions-header">
							<span class="title mb-1">Quick Actions</span>
							<span class="subtitle op-8">Shortcuts</span>
						</div>
						<div class="quick-actions-scroll scrollbar-outer">
							<div class="quick-actions-items">
								<div class="row m-0">
									<a class="col-6 col-md-4 p-0" href="#">
										<div class="quick-actions-item">
											<div class="avatar-item bg-danger rounded-circle">
												<i class="flaticon-calendar"></i>
											</div>
											<span class="text">Print Jadwal</span>
										</div>
									</a>
									<a class="col-6 col-md-4 p-0" href="#">
										<div class="quick-actions-item">
											<div class="avatar-item bg-warning rounded-circle">
												<i class="flaticon-file-1"></i>
											</div>
											<span class="text">Daftar Nilai</span>
										</div>
									</a>
									<a class="col-6 col-md-4 p-0" href="#">
										<div class="quick-actions-item">
											<div class="avatar-item bg-info rounded-circle">
												<i class="flaticon-list"></i>
											</div>
											<span class="text">Report Absensi</span>
										</div>
									</a>
									
								</div>
							</div>
						</div>
					</div>
				</li>
				
				<li class="nav-item dropdown hidden-caret">
					<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
						<div class="avatar-sm">
							<img src="<?=base_url()?>assets/images/<?=$this->session->userdata('foto');?>" alt="user" class="avatar-img rounded-circle">
						</div>
					</a>
					<ul class="dropdown-menu dropdown-user animated fadeIn">
						<div class="dropdown-user-scroll scrollbar-outer">
							<li>
								<div class="user-box">
									<div class="avatar-lg"><img src="<?=base_url()?>assets/images/<?=$this->session->userdata('foto');?>" alt="user" class="avatar-img rounded"></div>
									<div class="u-text">
										<h4><?=$this->session->userdata('nama');?></h4>
										<p class="text-muted"><?=$this->session->userdata('lv');?></p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">Profile</a>
									</div>
								</div>
							</li>
							<li>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?=base_url()?>login/logout">Logout</a>
							</li>
						</div>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
	<!-- End Navbar -->
</div>
