    <div class="main-wrapper mdc-drawer-app-content">
      <!-- partial:partials/_navbar.html -->
      <header class="mdc-top-app-bar"  >
        <div class="mdc-top-app-bar__row">
          <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
            <button class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button sidebar-toggler">menu</button>

          </div>
          <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end mdc-top-app-bar__section-right">
            <div class="menu-button-container menu-profile  d-md-block">
              <button class="mdc-button mdc-menu-button">
                <span class="d-flex align-items-center">
                  <span class="figure">
                    <img src="<?php echo base_url(); ?>assets/foto/<?=$this->session->userdata('foto')?>" alt="user" class="user">
                  </span>
                </span>
              </button>
              <div class="mdc-menu mdc-menu-surface" tabindex="-1" style="z-index: 101010010101010101010101010;">
                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail item-thumbnail-icon-only">
      
                      <i class="mdi mdi-settings-outline text-primary"></i> 
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <a class="item-subject font-weight-normal" data-toggle="dialog" target-dialog="mdc-dialog-default" >Setting</a>
                    </div>
                  </li>
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail item-thumbnail-icon-only">
                      <i class="material-icons text-primary">assignment_return</i>                 
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <a href="<?php echo site_url(); ?>login/logout" class="item-subject font-weight-normal">Logout</a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            
          </div>
        </div>
      </header>
      <!-- partial -->
      <!-- dialog -->
      <div id="mdc-dialog-default"
          class="mdc-dialog"
          role="alertdialog"
          aria-modal="true"
          data-backdrop="static"
          aria-labelledby="my-dialog-title"
          aria-describedby="my-dialog-content">
        <div class="mdc-dialog__container">
          <div class="mdc-dialog__surface">
            <header class="mdc-dialog__title">
              <h5 id="mdc-dialog-default-label" class="mdc-dialog__header__title">
                Ubah Password
              </h5>
            </header>
            <form action="editPassword" method="post">
            <section id="mdc-dialog-default-description" class="mdc-dialog__content">

              <div class="mt-4 mdc-text-field mdc-text-field--outlined">
                <input class="mdc-text-field__input" id="text-field-hero-input" name="OldPassword" type="Password" >
                <div class="mdc-notched-outline">
                  <div class="mdc-notched-outline__leading"></div>
                  <div class="mdc-notched-outline__notch">
                    <label for="text-field-hero-input" class="mdc-floating-label">Password Lama</label>
                  </div>
                  <div class="mdc-notched-outline__trailing"></div>
                </div>
              </div>

              <div class="mt-4 mdc-text-field mdc-text-field--outlined">
                <input class="mdc-text-field__input" name="NewPassword" id="NewPassword" type="Password" >
                <div class="mdc-notched-outline">
                  <div class="mdc-notched-outline__leading"></div>
                  <div class="mdc-notched-outline__notch">
                    <label for="text-field-hero-input2" class="mdc-floating-label">Password Baru</label>
                  </div>
                  <div class="mdc-notched-outline__trailing"></div>
                </div>
              </div>

              <div class="mt-4 mdc-text-field mdc-text-field--outlined">
                <input class="mdc-text-field__input" name="NewPasswordConfirm" onfocus="onf();" onblur="onb();" id="NewPasswordConfirm" type="Password" >
                <div class="mdc-notched-outline">
                  <div class="mdc-notched-outline__leading"></div>
                  <div class="mdc-notched-outline__notch">
                    <label for="text-field-hero-input1" class="mdc-floating-label">Konfirmasi Password</label>
                  </div>
                  <div class="mdc-notched-outline__trailing"></div>
                </div>
              </div>
              <label style="font-size: 10px; color: red;" id="lba"></label>

            </section>
            <footer class="mdc-dialog__actions">
              <button type="button" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="no">
                <span class="mdc-button__label">Batal</span>
              </button>
              <button type="submit" disabled="" id="submit" class="mdc-button mdc-dialog__button" data-mdc-dialog-action="yes">
                <span class="mdc-button__label">Simpan</span>
              </button>
            </footer>
            </form>
          </div>
        </div>
        <div class="mdc-dialog__scrim"></div>
      </div>