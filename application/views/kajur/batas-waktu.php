<div class="main-panel" style="height: 100%; overflow-y: scroll;">
	<div class="container">
		<div class="page-inner">
			<h4 class="page-title">Batas Penginputan Nilai</h4>
			<div class="row justify-content-center">
				<div class="col-md-4">
					<div class="card ">
						<center>
						<h5 class="card-header">Atur Batas</h5>
						<div class="card-body">
							<h1 class="card-title"> </h1>
							<input  type="text" value="<?= $batas->value?>" class="text-center form-control form-control-lg input-solid" id="batas" name="">
						</div>
						</center>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>
<?php $this->load->view('include/script'); ?>
<script src="<?=base_url()?>assets/js/plugin/jquery.validate/jquery.validate.min.js"></script>
<script>

	$('#batas').datetimepicker({
			format: 'DD/MM/YYYY',
		}).on('dp.change', function () {
			var url = "<?php echo base_url('kajur/batas_Waktu/update')?>";
			var data = {
				tgl: $('#batas').val()
			};
			post(url, data);
		});
</script>