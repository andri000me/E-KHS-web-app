
<script src="<?php echo base_url(); ?>assets/mhs/assets/js/preloader.js"></script>
  <div class="body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
      <div class="mdc-drawer__header">
        <a href="index" class="brand-logo">
          <img src="<?php echo base_url(); ?>assets/mhs/assets/images/logo.svg" alt="logo">
        </a>
      </div>
      <div class="mdc-drawer__content">
        <div class="user-info">
          <p class="name"><?=$this->session->userdata('nama')?></p>
          <p class="email"><?=$this->session->userdata('username')?></p>
        </div>
        <div class="mdc-list-group">
          <nav class="mdc-list mdc-drawer-menu">
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="<?php echo base_url(); ?>mahasiswa/index">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">home</i>
                Home
              </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="<?php echo base_url(); ?>mahasiswa/profile">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">assignment_ind</i>
                Profile
              </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="<?php echo base_url(); ?>mahasiswa/khs">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">chrome_reader_mode</i>
                Nilai
              </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="<?php echo base_url(); ?>mahasiswa/jadwal">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">event_note</i>
               Jadwal Matakuliah
              </a>
            </div>

            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="<?php echo base_url(); ?>mahasiswa/grafik">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">timeline</i>
               Grafik
              </a>
            </div>
           
          </nav>
        </div>
       
      </div>
    </aside>
    <!-- partial -->
