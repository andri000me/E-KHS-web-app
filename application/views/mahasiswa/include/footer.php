 </div>
  </div>
  <!-- plugins:js -->
  <script src="<?php echo base_url(); ?>assets/mhs/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->






  <!-- Plugin js for this page-->
  <script src="<?php echo base_url(); ?>assets/mhs/assets/vendors/chartjs/Chart.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/mhs/assets/vendors/sweetalert/sweetalert.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/mhs/assets/vendors/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/mhs/assets/vendors/owlcarousel/jquery.mousewheel.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo base_url(); ?>assets/mhs/assets/js/material.js"></script>
  <script src="<?php echo base_url(); ?>assets/mhs/assets/js/misc.js"></script>
  <!-- endinject -->
 
  <!-- End custom js for this page-->
  <script src="<?php echo base_url(); ?>assets/mhs/assets/js/dialog.js"></script>
  <script>
    $(document).ready(function(){
      $('#submit1').hide();


      $(function(){
          $("#foto11").on("change",function(){
             $("#postfoto").submit();
          });     
      });

      $('#btn-edit').mouseup(function(){
        if ($('.ikon').text() === 'close') {
          $('.frm').attr('readonly',true);
          console.log('tutup');
          $('.ikon').text("edit");
          
          $('#submit1').hide();
        }
        else{

          $('.frm').attr('readonly',false);
          console.log('klik');
          $('.ikon').text("close");
          $('#text-field-hero-input15').focus();
          $('#submit1').show();
        }
      });

    });

  function onf() {
        interval=setInterval("validasi()",1);
    }
    function validasi() {
        var np,cnp;
        
        np=$('#NewPassword').val();
        cnp=$('#NewPasswordConfirm').val(); 
        console.log("ok");

        if (np!=cnp)
        {
            document.getElementById('lba').innerHTML="*tidak cocok";
            document.getElementById('submit').disabled=true;
        } 
        else
        { 
            document.getElementById('lba').innerHTML="";
            document.getElementById('submit').disabled=false;
        }
    }
    function onb() {
        clearInterval(interval);
    }
</script>


   <!-- Toast -->
  <?php 
  
  $data2=$this->session->flashdata('error');
  $data1=$this->session->flashdata('sukses');
  ?>
    
  
    <?php 

    if($data2!=""){ ?>
    <script type="text/javascript">
    $(function(){
      swal(
        'Gagal',
        '<?=$this->session->flashdata('error');?>',
        'error'
      );
    });

    </script>
    <?php  } ?>


   <?php if($data1!=""){ ?>
    <script type="text/javascript">
      $(function(){
        swal({
          title: 'Berhasil!',
          text: '<?=$data1;?>',
          icon: 'success',
          button: {
            text: "OK",
            value: true,
            visible: true,
            className: "mdc-button mdc-button--raised"
          }
        });
      });

    </script>
    <?php } ?>

    <script>
      let newlog="<?=$this->session->flashdata('pertama'); ?>";
      if (newlog!=""){
        $(function(){
          swal({
            title: 'Selamat Datang !',
            text: newlog,
            closeOnClickOutside:false,
            icon: 'success',
            button: {
              text: "OK",
              value: true,
              visible: true,
              className: "mdc-button mdc-button--raised"
            }
          })
          .then((ok)=>{
              const dl=new mdc.dialog.MDCDialog(document.querySelector('#mdc-dialog-default'));
              dl.open();
          });
        });
      }
    </script>
   


</body>
</html> 