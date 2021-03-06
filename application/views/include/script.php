    <!-- Custom template | don't include it in your project! -->
    <div class="custom-template">
    	<div class="title">Tahun Akademik</div>
    	<div class="custom-content">
    		<div class="switcher">
    			<div class="switch-block">
    				<ol class="activity-feed selectgroup selectgroup-pills">
    					<?php
              $tgla=getdate();
              $warna=['info','warning','danger','success','primary','secondary','info','warning','danger','success'];
              for ($a=$tgla['year']; $a>= 2015;$a--)

              { $i=substr($a, 3,1);?>
							<li class="feed-item feed-item-<?=$warna[$i]?>">
								<time class="date" datetime="9-25">Tahun <?=$a;?></time>
								<label class="selectgroup-item">
                    <input type="radio" name="tahunAng" value="<?=$a;?>" class="selectgroup-input">
                    <span class="selectgroup-button"><?php echo $a; ?>/<?php echo $a+1; ?></span>
                </label>
							</li>
							<?php  } ?>

						</ol>



    			</div>
    		</div>
    	</div>
    	<div class="custom-toggle ">
    		<i class="flaticon-calendar animated swing infinite"></i>
    	</div>
    </div>
    <div id="iframe">
        <iframe id="pdf" src="" width="100%" height="0px"></iframe>
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

        $(document).ready(function(){
        		// ta terpilih
        		let sTa="<?=$this->session->userdata('takademik');?>";
        		$('[name="tahunAng"][value="'+sTa+'"]').attr('checked',true);

            $('#iframe').hide();
            $('.scrollbar-inner').scrollbar();
            $('#printModal').modal({
                keyboard: true,
                backdrop: 'static',
                show:false,
            });
        });


    	$(function () {

    		var table, current = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');

    		console.log(current);

    		$('.nav a[href~="' + location.href + '"]').parent('li').addClass('active');

    		switch (current) {
    			case "elemen_mk":
    				$('.nav .collapse').parent('li').addClass('active ');
    				$('.nav .collapse').addClass('show');
    				break;
    			case "matakuliah":

    				$('.nav .collapse').parent('li').addClass('active ');
    				$('.nav .collapse').addClass('show');
    				break;
                case "user":
                    $('.nav .BARUUU').parent('li').addClass('active ');
                    $('.nav .BARUUU').addClass('show');
                    break;
                case "pejabat":
                    $('.nav .BARUUU').parent('li').addClass('active ');
                    $('.nav .BARUUU').addClass('show');
                    break;
                case "batas":
                    $('.nav .BARUUU').parent('li').addClass('active ');
                    $('.nav .BARUUU').addClass('show');
                    break;

    			default:
    				$('.nav .collapse').parent('li').removeClass('active ');
    				$('.nav .collapse').removeClass('show');
    				break;
    		}

    	});

    	$('input[name="tahunAng"]').on('change', function(){
    		setTA($(this).val());
    	});

    	function setTA(ta) {
    		$.ajax({
    			type: "GET",
    			url: "<?php echo base_url('ta')?>",
    			data: {
    				ta: ta
    			},
    			success: function (data) {
    				swal("Tahun Akademik Diganti", {

    					icon: "success",
    					buttons: {
    						confirm: {
    							className: 'btn btn-success'
    						}
    					}
    				});
    				table.ajax.reload();
    			}
    		});
    	}
        function setProdi(prodi) {
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('ta/prodi')?>",
                data: {
                    prodi: prodi
                },
                success: function (data) {
                    
                    $('.ttp').attr('title', 'Prodi : '+data);
                    swal( {
                        title:"Prodi Di ganti",
                        text:"prodi :"+data,
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        }
                    });
                    table.ajax.reload();
                }
            });
        }

        $('.selectNim').select2({
            theme: "bootstrap",
            ajax: {
                url: '<?=base_url();?>api/mahasiswa',
                data: function (q) {
                    return {
                        q: q.term
                    }
                },
                dataType: 'JSON',
                cache: true
            },

            minimumInputLength: 1,
            placeholder: 'Pilih Mahasiswa',
        });

        $('#PrintForm').on('submit',  function(e){  
            e.preventDefault();
            let nim= $('#PrintForm [name="nimPrint"]').val();
            let judulTa= $('#PrintForm [name="judulTa"]').val();
            $('#pdf').attr('src','<?=base_url()?>operator/report/daftarNilai?judulta='+judulTa+'&nim='+nim+'');
            $('#printModal').modal('hide');
            $('#PrintForm').trigger("reset");
            
            $('#iframe').hide();                             
                
        });

    </script>
    <script>
    $('#pop').popover({
        title:"Verivikasi Nilai",
        placement:"bottom",
        trigger:'hover',
        html:true,
        content:'Nilai Yang Belum Diverifikasi <br> <a href="<?=base_url()?>kajur/khs/veriviAll">verifikasi Semua</a>',
        delay:{
            'show':60,
            'hide':3000
        },
        template:'<div class="popover " role="tooltip"><div class="arrow"></div><h3 class="popover-header text-warning"></h3><div class="popover-body"></div></div>'
    });
    setTimeout(() => {
        $('#pop').popover('show');
    }, 300);
    

    setTimeout(() => {
        $('#pop').popover('hide');
    }, 4000);
    </script>
