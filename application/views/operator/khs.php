<div class="main-panel scr">
	<div class="content">
		<div class="page-inner" style="margin-top: 60px;">

			<div class="row">
				<div class="col-md-12">

					<div class="tab-content" id="v-pills-without-border-tabContent">
						<!-- tab-home -->
						<div class="tab-pane fade show active" id="v-pills-home-nobd" role="tabpanel"
							aria-labelledby="v-pills-home-tab-nobd">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">KHS</h4>
										<div class="ml-auto">
											<button class="btn btn-outline-success btn-round mr-3" data-toggle="collapse" data-target="#filter"
												aria-expanded="false" aria-controls="collapseExample">
												<i class="fas fa-filter"></i>
												Filter
											</button>
											<button class="btn btn-primary btn-round mr-3 tambah">
												<i class="fas fa-add"></i>
												Tambah
											</button>

										</div>
									</div>
								</div>
								<div class="collapse" id="filter">
									<div class="card card-body">
										<div class="row">

											<div class="form-group  col-md-3 col-12 mr-2">
												<label>Kelas</label>
												<select class="form-control fill" id="kelas">
													<?=op_kelas();?>
												</select>
											</div>
											<div class="form-group  col-md-3 col-12 mr-2">
												<label>Semester</label>
												<select class="form-control fill" id="semester">
													<?=op_semester();?>
												</select>
											</div>
											<div class="form-group col-md-3 col-12 mr-2">
												<label>Angkatan</label>
												<input type="text" placeholder="Pilh Angkatan" class="form-control fill" id="angkatan"
													name="angkatan">
											</div>
											<div class="col-md-2" style="margin-top:40px;">
												<button type="reset" id="tampil" class="btn btn-primary btn-sm " style="height:40px;"><span
														class="btn-label"><i class="fas fa-undo-alt"></i></span> Reset</button>
											</div>

										</div>
									</div>
								</div>
								<div class="card-body">

									<table id="tb-khs" class="display table table-striped table-hover "  cellspacing="0" style="width:100%;">
										<thead>
											<tr>
												<th>No</th>
												<th>Nim</th>
												<th>Nama</th>
												<th>Semester</th>
												<th>IP</th>
												<th>Status Verivikasi</th>
												<th>aksi</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>No</th>
												<th>Nim</th>
												<th>Nama</th>
												<th>Semester</th>
												<th>IP</th>
												<th>Status Verivikasi</th>
												<th>aksi</th>
											</tr>
										</tfoot>

									</table>

								</div>
							</div>
						</div>

						<!-- tab-detail -->
						<div class="tab-pane fade show  " id="v-pills-detail-nobd" role="tabpanel"
							aria-labelledby="v-pills-home-tab-nobd">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<button class="btn btn-info btn-icon btn-round btn-sm mr-3 tggl">
											<i class="fas fa-arrow-left"></i>

										</button>

										<h4 class="card-title nama"></h4>
									</div>
								</div>

								<div class="card-body">

									<table id="tb-khs-detail" class="display table table-striped table-hover " style="width:100%;"  cellspacing="0">
										<thead>
											<tr>
												<th>No</th>
												<th>Kode Matakuliah</th>
												<th>Nama Matakuliah</th>
												<th>Angka Mutu</th>
												<th>Nilai</th>
												<th>SKS</th>
												<th></th>
												<th>id</th>
											</tr>
										</thead>

									</table>

								</div>
							</div>
						</div>

						<!-- end tab detail -->

					</div>
					<!-- end tab -->
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal add -->
<div class="modal fade" id="my-modal" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="flaticon-cross"></i></span>
				</button>
			</div>
			<form id="myform">
				<div class="modal-body">
					<div class="row">
						<input type="hidden" name="id" value="">
						<input type="hidden" name="idta" value="">
						<div class="form-group col-md-12">
							<label>Mahasiswa</label>
							<select name="nim" class="form-control myselect2" style="width:100%;">
							</select>
						</div>
						<div class="form-group col-md-12">
							<label>Matakuliah</label>
							<select name="Matakuliah" class="form-control">
								<option value='' disabled="" selected="">pilih Matakuliah</option>
								<?php foreach ($mk as $key): ?>
									<option value="<?=$key->kodemk?>"><?=$key->namamk?></option>
								<?php endforeach ?>
								
							</select>
						</div>
						<div class="form-group col-md-12">
							<label>nilai</label>
							<input type="text" class="form-control txt" name="am" placeholder="masukan Nilai">
						</div>
						<div class="form-group col-md-12 judul">
							<label>Judul TA</label>
							<textarea class="form-control txt" placeholder="masukan judul TA" name="judul"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary btn-border btn-round" data-dismiss="modal">batal</button>
					<button type="submit" class="btn btn-primary btn-round add-data">Simpan</button>
					<button type="submit" class="btn btn-success btn-round edit-data">Edit</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php $this->load->view('include/script');?>


<script>
	$(document).ready(function () {
		let pos_url="";
		$('.myselect2').select2({
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

		// tambah
		$('.tambah').click(function (e) {
			pos_url="<?=base_url();?>operator/khs/add";
			$('.add-data').show();
			$('.edit-data').hide();
			$('.judul').hide();
			$('#my-modal [name="Matakuliah"]').attr('disabled',false);
			$('#my-modal [name="nim"]').attr('disabled',false);
			$('#my-modal [name="nim"]').val('').trigger('change');
			$('#myform').trigger("reset");
			$('#my-modal').modal({
				keyboard: false,
				backdrop: 'static',
			});
		});

		
		var nim, semester,nama, detailkhs;

		// edit
		$('#tb-khs-detail').on('click', '.btn-edit', function () {
			pos_url="<?=base_url();?>operator/khs/update";

			$('.add-data').hide();
			$('.edit-data').show();
			$('.judul').hide();
			let data1 = detailkhs.row($(this).parents('tr')).data();

			var option = new Option(nama, nim, true, true);
			$('#my-modal [name="nim"]').append(option).trigger('change');
			$('#my-modal [name="Matakuliah"]').val(data1[1]).trigger('change');
			$('#my-modal [name="am"]').val(data1[3]);
			$('#my-modal [name="id"]').val(data1[7]);
			$('#my-modal [name="Matakuliah"]').attr('disabled',true);
			$('#my-modal [name="nim"]').attr('disabled',true);
			$('#my-modal').modal({
				keyboard: false,
				backdrop: 'static',
			});
		});

		// hapus
		$('#tb-khs-detail').on('click', '.hapus', function () {
			let data = detailkhs.row($(this).parents('tr')).data();
			let url="<?=base_url()?>operator/khs/delete";
			hapus(url, data[7]);
			$('.tab-pane').toggleClass('active');
			detailkhs.ajax.reload();
		});

		//tabel utama
		table = $('#tb-khs').DataTable({
			"scrollX": true,
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
			},

			"processing": true,
			"deferRender": true,
			"ajax": {
				"url": "<?php echo site_url('operator/khs/data_khs')?>",
				"type": "POST",
				"data": function (data) {
					data.kelas = $('#kelas').val();
					data.semester = $('#semester').val();
					data.angkatan = $('#angkatan').val();
				},
			},
		});

		//tabel detail
		detailkhs = $('#tb-khs-detail').DataTable({
			"scrollX": true,
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
			},

			"processing": true,
			"deferRender": true,
			"ajax": {
				"url": "<?php echo site_url('operator/khs/get_khs')?>",
				"type": "GET",
				"data": function (data) {
					data.nim = nim;
					data.semester = semester;
				},
			},
			"columnDefs": [{
				"targets": [7],
				"visible": false,
			}]
		});

		//datatables
		$('.fill, #angkatan').on('change', function () { //button filter event click
			table.ajax.reload(); //just reload table
		});
		$('[type="reset"]').on('click', function () { //button filter event click
			$('.fill').val("");

			table.ajax.reload(); //just reload table
		});
		$('#angkatan').datetimepicker({
			format: 'YYYY',
			viewMode: 'years'

		}).on('dp.change', function () {
			table.ajax.reload();
		});

		$('.tggl').on('click', function () {

			$('.tab-pane').toggleClass('active');

		});

		$('tbody').on('click', '.tggl', function () {
			let data = table.row($(this).parents('tr')).data();
			$('.tab-pane').toggleClass('active');
			nim = data[1];
			semester = data[3];
			nama = data[2];
			$('.nama').html(`KHS : ${data[2]}, Semester ${data[3]}`);
			detailkhs.ajax.reload();


		});

		$('tbody').on('click', '.print', function () {
			let data = table.row($(this).parents('tr')).data();

			nim = data[1];
			semester = data[3];
			

			$('#pdf').attr('src','<?=base_url()?>operator/report/khs?semester='+semester+'&nim='+nim+'');
			$('#iframe').hide();

		});


		//tambah TA
		$('[name="Matakuliah"]').on('change',function(){
			
			let isTa=$('option[value="'+$(this).val()+'"').text(); 
			if(isTa=='TA'){
				$('.judul').show();
			}
			else{
				$('.judul').hide();
			}
		});

		$('#myform').on('submit',  function(e){  
	    e.preventDefault();
			var data ={
				id_khs: $('#my-modal [name="id"]').val(),
				id_tugas_akhir: $('#my-modal [name="idta"]').val(),
				nim: $('#my-modal [name="nim"]').val(),
				matakuliah: $('#my-modal [name="Matakuliah"]').val(),
				am: $('#my-modal [name="am"]').val(),
				judul: $('#my-modal [name="judul"]').val(),
			};
			post(pos_url, data);
			table.ajax.reload();
	    $('#myform').trigger("reset");
    	$('#my-modal').modal('hide');
    	detailkhs.ajax.reload()                                    
	  });

	});

</script>
</body>

</html>
