<style type="text/css">
	.skala input{
		border-style: none;
		text-align: center;
		width: 80px;

	}
	.inputskala.aktif{
		background-color: #dcdcdc;
		border-radius: 20px;
		border-style: solid !important;
		border-width: 1px;
		border-color: #007bff;
	}
</style>

<div class="main-panel" style="height: 100%; overflow-y: scroll;">
	<div class="container">
		<div class="page-inner">
			<h4 class="page-title">Pengaturan Penilaian</h4>
			<div class="row ">
				<div class="col-md-12">
					<div class="card ">
						<h5 class="card-header">Atur Batas Waktu Penginputan Nilai</h5>
						<div class="card-body row">
							<div class="form-group col-md-6">
								<label for="inlineinput" class="col-md-3 col-form-label">Batas Waktu Penginputan Nilai</label>
								<div class="col-md-9 ">
									<input type="text" value="<?= $batas->value?>" class="col-md-4 form-control  input-solid" id="batas" name="">
								</div>
							</div>
							<div class="form-group">
								<label for="inlineinput" class="col-md-3 col-form-label">Nilai Default</label>
								<div class="input-group">
									<input type="text" id="nilai-default" readonly="" class="form-control input-solid" placeholder="" value="70">
									<div class="input-group-append">
										<button class="btn btn-primary ubah-ndefault" type="button">Edit</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="card ">
						<div class="card-header row px-5"> 
							<div class="card-title">Skala Nilai</div>
							<div class="ml-auto">
								<button class="btn btn-sm btn-secondary btn-round btn-change-skala">Ubah Skala</button>
							</div>
						</div>
						<div class="card-body">
							<table class="table  mt-3 col-md-4 table-bordered">
								<thead>
									<tr>
										<th scope="col">Angka Mutu</th>
										<th scope="col">Nilai</th>
									</tr>
								</thead>
								<form id="form-skala" action="<?=base_url()?>Kajur/Batas_Waktu/ubahskala" method="post">
								<tbody>
									<?php
									$bel="100";
									foreach ($skala as $key): ?>
									<tr>
										
										<td class="skala">
											<input type="text" readonly="" class="inputskala" value="<?=$key->am ?>" name="<?=$key->id ?>"> 
											<span class="strep">-</span> 
											<input type="text" readonly="" class="inputskala1" value="<?=$bel ?>">
										</td>
										
										<td><?=$key->nilai ?></td>
									</tr>
									<?php $bel=$key->am - 0.01;  endforeach ?>
								</tbody>
								</form>
							</table>

							<div class="row col-md-4 action-skala">
								<div class="ml-auto">
									<button class="btn btn-sm mr-3 btn-round btn-outline-danger cancel">batal</button>
									<button class="btn btn-sm btn-primary btn-round save-skala">Simpan Perubahan</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>
<?php $this->load->view('include/script'); ?>
<script src="<?=base_url()?>assets/js/plugin/jquery.validate/jquery.validate.min.js"></script>
<script>
	$('.action-skala').hide();
	$('.simpan-ndefault').hide();

	$('#batas').datetimepicker({
		format: 'DD/MM/YYYY',
	}).on('dp.change', function () {
		var url = "<?php echo base_url('kajur/batas_Waktu/update')?>";
		var data = {
			tgl: $('#batas').val()
		};
		post(url, data);
	});

	//ubah n default
	$('.ubah-ndefault').click(function(event) {
		let state= $(this).text();
		if(state=='Edit'){
			$(this).text('Simpan');
			$('#nilai-default').attr('readonly',false);
			$('#nilai-default').focus();
		}
		else{
			$(this).text('Edit');
			$('#nilai-default').attr('readonly',true);
			let url = "<?php echo base_url('kajur/batas_Waktu/changeNdef')?>";
			let data = {
				ndef: $('#nilai-default').val()
			};
			post(url, data);
		}
		
	});

	//simpan perubahan n default
	$('.simpan-ndefault').click(function(event) {
		$('.ubah-ndefault').show();
		$(this).hide();
		$('#nilai-default').attr('readonly',true);
	});


	//ubah skala nilai
	$('.btn-change-skala').click(function(event) {
		$('.inputskala').attr('readonly',false);
		$('.inputskala1').hide();
		$('.strep').hide();
		$('.action-skala').show();
		$('input[name=8]').focus();
		$('.inputskala').addClass('aktif');
	});

	//batal
	$('.cancel').click(function(event) {
		window.location.reload();
	});

	//simpan skala
	$('.save-skala').click(function(event) {
		$('#form-skala').submit();
	});

	let message="<?=$this->session->flashdata('pesan'); ?>";
	if (message){
		notif('success', message);
	}
	
</script>