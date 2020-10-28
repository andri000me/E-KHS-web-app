
      <div class="page-wrapper mdc-toolbar-fixed-adjust" style="">
        <main class="content-wrapper" >
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-8-tablet">
                <div class="mdc-card">
                  <div class="d-flex justify-content-center">
                    <div>
                      <img src="<?php echo base_url(); ?>assets/foto/<?=$this->session->userdata('foto')?>" class="user-profile">
                    </div >
                    <div class="wrap">
                       <button  style="position: relative; overflow: visible; border: 2px solid white;" class=" mdc-button mdc-menu-button mdc-button--raised icon-button shaped-button secondary-filled-button">
                      <i class="material-icons mdc-button__icon">add_a_photo</i>
                      <form method="Post" id="postfoto" action="<?php echo site_url();?>mahasiswa/editfoto" enctype="multipart/form-data" >
                        <input type="file" name="foto" accept="image/*" id="foto11">
                      </form>
                    </div>
                  </button>
                  </div>
                 
                  <div class="chart-container mt-2 justify-content-center text-center">
                    <h5><?=$this->session->userdata('nama')?></h5>
                    <h6 class="mdc-typography--overline"><?=$this->session->userdata('username')?></h6> 
                     <?=statMhs($status); ?>

                    <h6 class="mt-5">Teknik Elektro | <?=$mhs->prodi?></h6>

                  </div>

                </div>
              </div>

              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-8">
                <div class="mdc-card">
                  <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-2 mb-sm-0">Detail Profile</h4>
                    <div class="d-flex justtify-content-between align-items-center">
                      
                      <button id="btn-edit" class="mdc-button mdc-menu-button mdc-button--raised icon-button shaped-button secondary-filled-button">
                        <i class="material-icons mdc-button__icon ikon">edit</i>
                      </button>
                    </div>
                  </div>
                  <div class="chart-container mt-4">
                   <form action="edit" method="post">
                     <div class="template-demo">
                      <div class="mdc-layout-grid__inner">
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                          
                          <div class="mdc-text-field mdc-text-field--outlined ">
                            <input class="mdc-text-field__input frm" id="text-field-hero-input15" name="nama" value="<?=$mhs->nama?>"readonly>
                            <div class="mdc-notched-outline">
                              <div class="mdc-notched-outline__leading"></div>
                              <div class="mdc-notched-outline__notch">
                                <label for="text-field-hero-input15" class="mdc-floating-label">Nama</label>
                              </div>
                              <div class="mdc-notched-outline__trailing"></div>
                            </div>
                          </div>

                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                          
                          <div class="mdc-text-field mdc-text-field--outlined">
                            <input class="mdc-text-field__input frm" name="tempat_lahir" id="text-field-hero-input14" value="<?=$mhs->tempat_lahir?>"readonly>
                            <div class="mdc-notched-outline">
                              <div class="mdc-notched-outline__leading"></div>
                              <div class="mdc-notched-outline__notch">
                                <label for="text-field-hero-input14" class="mdc-floating-label">Tempat Lahir</label>
                              </div>
                              <div class="mdc-notched-outline__trailing"></div>
                            </div>
                          </div>

                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                          
                          <div class="mdc-text-field mdc-text-field--outlined">
                            <input type="date" class="mdc-text-field__input frm" id="text-field-hero-input13 " name="tgl_lahir" value="<?=$mhs->tgl_lahir?>"readonly>
                            <div class="mdc-notched-outline">
                              <div class="mdc-notched-outline__leading"></div>
                              <div class="mdc-notched-outline__notch">
                                <label for="text-field-hero-input13" class="mdc-floating-label">Tgl Lahir</label>
                              </div>
                              <div class="mdc-notched-outline__trailing"></div>
                            </div>
                          </div>

                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                          
                          <div class="mdc-text-field mdc-text-field--outlined">
                            <input class="mdc-text-field__input" id="text-field-hero-input12" value="<?= $mhs->dosen;?>"readonly>
                            <div class="mdc-notched-outline">
                              <div class="mdc-notched-outline__leading"></div>
                              <div class="mdc-notched-outline__notch">
                                <label for="text-field-hero-input12" class="mdc-floating-label">Dosen PA</label>
                              </div>
                              <div class="mdc-notched-outline__trailing"></div>
                            </div>
                          </div>

                        </div>
                      </div>
                      <button id="submit1" type="submit" class="mdc-button mdc-button--outlined outlined-button--success" style="float: right;">
                        simpan
                      </button>
                    </div>
                   </form>
                  </div>
                </div>
              </div>

              

            </div>
          </div>  
        </main>
        
        <!-- partial:partials/_footer.html -->
        
        <!-- partial -->
      </div>

      <!-- snacbar -->
      <div class="mdc-snackbar" id="mdc-default-snackbar" aria-live="assertive" aria-atomic="true" aria-hidden="true">
        <div class="mdc-snackbar__text">Edit Sukses</div>
        <div class="mdc-snackbar__action-wrapper">
          <button type="button" class="mdc-snackbar__action-button">Action</button>
        </div>
      </div>

         