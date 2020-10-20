<div class="main-panel scr">
	<div class="content">
		<div class="page-inner" style="margin-top: 60px;">

			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Jadwal Perkuliahan</h4>
								<div class="ml-auto d-flex flex-row">
									<button class="btn btn-success btn-round btn-sm mr-3" data-toggle="collapse" data-target="#filter"
										aria-expanded="false" aria-controls="collapseExample">
										<i class="icon-eyeglass"></i>
										Filter
									</button>
									<a class="btn btn-secondary btn-round btn-sm mr-3 tambah text-light">
										<i class="icon-note"></i>
										Tambah Data
									</a>

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
									<div class="col-md-2 d-flex" style="margin-top:40px;">
										<button id="prinData" class="mr-5 btn btn-warning btn-sm " style="height:40px;">
											<span class="btn-label"><i class="fas fa-print"></i></span> Print
										</button>

										<button type="reset" id="tampil" class="btn btn-primary btn-sm " style="height:40px;">
											<span class="btn-label"><i class="fas fa-undo-alt"></i></span> Reset
										</button>

									</div>

								</div>
							</div>
						</div>
						<div class="card-body">

							<table id="data-tb" class="display table table-striped table-hover "  cellspacing="0" style="width:100%;">
								<thead>
									<tr>
										<th>id</th>
										<th>No</th>
										<th>Prodi</th>
										<th>Semester</th>
										<th>Kelas</th>
										<th>Kode MK</th>
										<th>Matakuliah</th>
										<th>Hari</th>
										<th>Jam Mulai</th>
										<th>Jam Selesai</th>
										<th>Ruangan</th>
										<th>Dosen Pengajar</th>
										<th>aksi</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>id</th>
										<th>No</th>
										<th>Prodi</th>
										<th>Semester</th>
										<th>Kelas</th>
										<th>Kode MK</th>
										<th>Matakuliah</th>
										<th>Hari</th>
										<th>Jam Mulai</th>
										<th>Jam Selesai</th>
										<th>Ruangan</th>
										<th>Dosen Pengajar</th>
										<th>aksi</th>
									</tr>
								</tfoot>

							</table>

						</div>
					</div>
				</div>
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
			<div class="modal-body">
				<form class="row">
					<div class="form-group col-12 ">
						<input type="hidden" name="id">
						<label>Matakuliah</label>
						<select name="matakuliah" class="form-control myselect" style="width:100%;">
							<option value="" selected disabled>Pilih Matakuliah</option>
							<?php foreach ($mk as $key) :?>
							<option value="<?=$key->kodemk?>"><?=$key->namamk?></option>
							<?php endforeach;?>
						</select>


					</div>
					<div class="form-group col-12">
						<label>Pengajar</label>
						<select name="dosen" class="form-control myselect" style="width:100%;">
							<option value="" selected disabled>Dosen Pegajar</option>
							<?php foreach ($dosen as $key) :?>
							<option value="<?=$key->nip?>"><?=$key->nama?></option>
							<?php endforeach;?>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label>Semester</label>
						<select name="semeseter" class="form-control myselect" style="width:100%;">
							<?=op_semester();?>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label>Kelas</label>
						<select name="kelas" class="form-control myselect" style="width:100%;">

							<?=op_kelas();?>

						</select>
					</div>
					<div class="form-group col-12">
						<label>Hari</label>
						<select name="hari" class="form-control myselect" style="width:100%;">
							<option value="" selected disabled>Pilih Hari</option>
							<option value="Senin"> Hari Senin </option>
							<option value="Selasa"> Hari Selasa </option>
							<option value="Rabu"> Hari Rabu </option>
							<option value="Kamis"> Hari Kamis </option>
							<option value="Jumad"> Hari Jumad </option>
						</select>
					</div>

					<div class="form-group col-md-6">
						<label>Jam Mulai</label>
						<input type="text" class="form-control jam" name="mulai" placeholder="Mulai Jam ?">
					</div>
					<div class="form-group col-md-6">
						<label>Jam Selesai</label>
						<input type="text" class="form-control jam" name="selesai" placeholder="Sampai Jam ?">
					</div>
					<div class="form-group col-12">
						<label>Ruangan</label>
						<select name="ruangan" class="form-control myselect" style="width:100%;">
							<option value="" selected disabled>Pilih Ruangan</option>
							<?php foreach ($ruang as $key) :?>
							<option value="<?=$key->id_ruangan?>"><?=$key->nama_ruangan?></option>
							<?php endforeach;?>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary btn-border btn-round" data-dismiss="modal">batal</button>
				<button type="submit" class="btn btn-primary btn-round add-data">Simpan</button>
				<button type="submit" class="btn btn-success btn-round edit-data">Edit</button>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('include/script');?>


<script>
	$(document).ready(function () {
		//===============plugin init==================
		$('.myselect').select2({
			theme: "bootstrap"
		});
		$('.jam').datetimepicker({
			format: 'H:mm',
		});


		// ===============end int===============

		// ==========get data===============
		var url = "<?php echo site_url('operator/jadwal/get_data')?>";
		var dtfilter = (data) => {
			data.kelas = $('#kelas').val();
			data.semester = $('#semester').val();
		}
		table = get(url, dtfilter);
		// ==================end get data===============

		// =============filter data==================
		$('.fill').on('change', function () { //button filter event click
			table.ajax.reload();
		});
		$('[type="reset"]').on('click', function () { //button filter event click
			$('.fill').val("");

			table.ajax.reload(); //just reload table
		});
		//============end filter=================

		//==============add data===========================

		$('.tambah').click(function (e) {
			$('.myselect , .jam').val(null).trigger('change');

			$('.add-data').show();
			$('.edit-data').hide();
			$('.modal-header #exampleModalLongTitle').html('Tambah Data');

			$('#my-modal').modal({
				keyboard: false,
				backdrop: 'static',

			});


		});
		// proses add
		$('.add-data').click(function (e) {
			var url = "<?php echo base_url('operator/jadwal/add')?>";

			e.preventDefault();
			var data = {
				jam_mulai: $('#my-modal [name="mulai"]').val(),
				jam_selesai: $('#my-modal [name="selesai"]').val(),
				kodemk: $('#my-modal [name="matakuliah"]').val(),
				hari: $('#my-modal [name="hari"]').val(),
				nip: $('#my-modal [name="dosen"]').val(),
				id_ruangan: $('#my-modal [name="ruangan"]').val(),
				semester: $('#my-modal [name="semeseter"]').val(),
				kelas: $('#my-modal [name="kelas"]').val(),
			};

			post(url, data);
			table.ajax.reload();
			$('#my-modal').modal('hide');

		});


		//=====end add=========== 

		//================= edit=========

		// set data
		$('tbody').on('click', '.edit', function () {
			$('.add-data').hide();
			$('.edit-data').show();

			let data = table.row($(this).parents('tr')).data();
			let id = data[0];
			$('.modal-header #exampleModalLongTitle').html('Edit Data');
			let url_1 = "<?php echo base_url('operator/jadwal/get_jadwalbyId')?>";
			var dt_set = function (data) {
				
				$('#my-modal [name="id"]').val(data.id);
				$('#my-modal [name="mulai"]').val(data.jam_mulai);
				$('#my-modal [name="selesai"]').val(data.jam_selesai);
				$('#my-modal [name="matakuliah"]').val(data.kodemk).trigger('change');
				$('#my-modal [name="hari"]').val(data.hari).trigger('change');
				$('#my-modal [name="dosen"]').val(data.nip).trigger('change');
				$('#my-modal [name="ruangan"]').val(data.id_ruangan).trigger('change');
				$('#my-modal [name="semeseter"]').val(data.semester).trigger('change');
				$('#my-modal [name="kelas"]').val(data.kelas).trigger('change');
			}
			$('#my-modal').modal({
				keyboard: false,
				backdrop: 'static',
			});
			set(url_1, id, dt_set);


			
		});
		//proses edit
		$('.edit-data').click(function (e) {
			var url = "<?php echo base_url('operator/jadwal/update')?>";
			e.preventDefault();
			var data = {
				id: $('#my-modal [name="id"]').val(),
				jam_mulai: $('#my-modal [name="mulai"]').val(),
				jam_selesai: $('#my-modal [name="selesai"]').val(),
				kodemk: $('#my-modal [name="matakuliah"]').val(),
				hari: $('#my-modal [name="hari"]').val(),
				nip: $('#my-modal [name="dosen"]').val(),
				id_ruangan: $('#my-modal [name="ruangan"]').val(),
				semester: $('#my-modal [name="semeseter"]').val(),
				kelas: $('#my-modal [name="kelas"]').val(),
			};

			post(url, data);
			table.ajax.reload();
			$('#my-modal').modal('hide');


		});

		//============end edit================


		//===============hapus data==============
		$('tbody').on('click', '.hapus', function () {
			var url = "<?php echo base_url('operator/jadwal/delete')?>";
			let data = table.row($(this).parents('tr')).data();
			id = data[0];
			hapus(url, id);
			table.ajax.reload();

		});
		//=============end hapus================


		// Print
		$('#prinData').on('click',  function(e){  
        let kelas = $('#kelas').val();
				let semester = $('#semester').val();
        $('#pdf').attr('src','<?=base_url()?>operator/report/jadwal?kelas='+kelas+'&semester='+semester+'');
        
        $('#iframe').hide();                             
            
    });

	});

</script>
</body>

</html>
