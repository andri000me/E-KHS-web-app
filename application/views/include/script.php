    <!-- Custom template | don't include it in your project! -->
    <div class="custom-template">
        <div class="title">Settings</div>
        <div class="custom-content">
            <div class="switcher">
                <div class="switch-block">
                    <h4>Logo Header</h4>
                    <div class="btnSwitch">
                        <button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
                        <button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
                        <br/>
                        <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
                    </div>
                </div>
                <div class="switch-block">
                    <h4>Navbar Header</h4>
                    <div class="btnSwitch">
                        <button type="button" class="changeTopBarColor" data-color="dark"></button>
                        <button type="button" class="changeTopBarColor" data-color="blue"></button>
                        <button type="button" class="changeTopBarColor" data-color="purple"></button>
                        <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
                        <button type="button" class="changeTopBarColor" data-color="green"></button>
                        <button type="button" class="changeTopBarColor" data-color="orange"></button>
                        <button type="button" class="changeTopBarColor" data-color="red"></button>
                        <button type="button" class="changeTopBarColor" data-color="white"></button>
                        <br/>
                        <button type="button" class="changeTopBarColor" data-color="dark2"></button>
                        <button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
                        <button type="button" class="changeTopBarColor" data-color="purple2"></button>
                        <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
                        <button type="button" class="changeTopBarColor" data-color="green2"></button>
                        <button type="button" class="changeTopBarColor" data-color="orange2"></button>
                        <button type="button" class="changeTopBarColor" data-color="red2"></button>
                    </div>
                </div>
                <div class="switch-block">
                    <h4>Sidebar</h4>
                    <div class="btnSwitch">
                        <button type="button" class="selected changeSideBarColor" data-color="white"></button>
                        <button type="button" class="changeSideBarColor" data-color="dark"></button>
                        <button type="button" class="changeSideBarColor" data-color="dark2"></button>
                    </div>
                </div>
                <div class="switch-block">
                    <h4>Background</h4>
                    <div class="btnSwitch">
                        <button type="button" class="changeBackgroundColor" data-color="bg2"></button>
                        <button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
                        <button type="button" class="changeBackgroundColor" data-color="bg3"></button>
                        <button type="button" class="changeBackgroundColor" data-color="dark"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="custom-toggle">
            <i class="flaticon-settings"></i>
        </div>
    </div>
    <!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="<?=base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?=base_url()?>assets/js/core/popper.min.js"></script>
	<script src="<?=base_url()?>assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="<?=base_url()?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="<?=base_url()?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
    
    <!-- Moment JS -->
	<script src="<?=base_url()?>assets/js/plugin/moment/moment.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?=base_url()?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
    <script src="<?=base_url()?>assets/js/plugin/chart.js/chart.min.js"></script>
    
    <!-- DateTimePicker -->
	<script src="<?=base_url()?>assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="<?=base_url()?>assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="<?=base_url()?>assets/js/plugin/chart-circle/circles.min.js"></script>

	
	<!-- Bootstrap Notify -->
	<script src="<?=base_url()?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>


	<!-- Sweet Alert -->
	<script src="<?=base_url()?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Select2 -->
	<script src="<?=base_url()?>assets/js/plugin/select2/select2.full.min.js"></script>

	<!-- Datatables -->
	<script src="<?=base_url()?>assets/js/plugin/datatables/datatables.min.js"></script>
	
	<!-- Atlantis JS -->
	<script src="<?=base_url()?>assets/js/atlantis.min.js"></script>
    <script src="<?=base_url()?>assets/js/setting-demo2.js"></script>
    <?php
    $this->load->view('include/crud');
    
    ?>

	
    <script>
        $(function () {
            
            var table, current = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
            
            console.log(current);
            
            $('.nav a[href~="'+location.href+'"]').parent('li').addClass('active');

            switch (current) {
                case "elemen_mk":
                    $('.nav .collapse').parent('li').addClass('active ');
                    $('.nav .collapse').addClass('show');
                    break;
                case "matakuliah":

                    $('.nav .collapse').parent('li').addClass('active ');
                    $('.nav .collapse').addClass('show');
                    break;
                default:
                    $('.nav .collapse').parent('li').removeClass('active ');
                    $('.nav .collapse').removeClass('show');
                    break;
            }
            
           
        });
        function setTA (ta) {
            $.ajax({
            type : "GET",
            url  : "<?php echo base_url('ta')?>",
            data : {ta: ta},
            success: function(data){
              swal("Tahun Akademik Diganti", {
                  icon: "success",
                  buttons : {
                    confirm : {
                      className: 'btn btn-success'
                    }
                  }
                });
              table.ajax.reload(); 
              }
            });
        }
    </script>
	