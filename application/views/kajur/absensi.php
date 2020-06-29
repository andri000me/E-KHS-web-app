<div class="main-panel" style="height: 100%; overflow-y: scroll;">
	<div class="content">
		<div class="page-inner" style="margin-top: 60px;">

			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Absensi</h4>
								<div class="ml-auto d-flex flex-row">
									<button class="btn btn-success btn-round btn-sm mr-3" data-toggle="collapse" data-target="#filter"
										aria-expanded="false" aria-controls="collapseExample">
										<i class="icon-eyeglass"></i>
										Filter
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
									<div class="form-group  col-md-3 col-12 mr-2">
										<label>Angkatan</label>
										<input type="text" class="form-control fill" id="angkatan">
									</div>
									<div class="col-md-2" style="margin-top:40px;">
										<button type="reset" id="tampil" class="btn btn-primary btn-sm " style="height:40px;"><span
												class="btn-label"><i class="fas fa-undo-alt"></i></span> Reset</button>
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
										<th>Nim</th>
										<th>Nama</th>
										<th>Kelas</th>
										<th>Semester</th>
										<th>Sakit</th>
										<th>Ijin</th>
										<th>Alpa</th>
										
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>id</th>
										<th>No</th>
										<th>Nim</th>
										<th>Nama</th>
										<th>Kelas</th>
										<th>Semester</th>
										<th>Sakit</th>
										<th>Ijin</th>
										<th>Alpa</th>
										
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


<?php $this->load->view('include/script');?>


<script>
	$(document).ready(function () {
		//===============plugin init==================
		$('.myselect').select2({
			theme: "bootstrap",
		});

		$('#angkatan').datetimepicker({
			format: 'YYYY',
			viewMode: 'years'

		}).on('dp.change', function () {
			table.ajax.reload();
		});


		// ===============end int===============

		// ==========get data===============
		var url = "<?php echo site_url('kajur/absensi/get_data')?>";
		var dtfilter = (data) => {
			data.kelas = $('#kelas').val();
			data.semester = $('#semester').val();
			data.angkatan = $('#angkatan').val();

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

	
		// proses add
		$('.add-data').click(function (e) {
			var url = "<?php echo base_url('operator/absensi/add')?>";

			e.preventDefault();
			var data = {
				nim: $('#my-modal [name="nim"]').val(),
				semester: $('#my-modal [name="semester"]').val(),
				sakit: $('#my-modal [name="sakit"]').val(),
				ijin: $('#my-modal [name="ijin"]').val(),
				alpa: $('#my-modal [name="alpa"]').val(),

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
			let nama = data[3];
			$('#my-modal [name="id"]').val(id);
			let url_1 = "<?php echo base_url('operator/absensi/get_absenbyId')?>";
			var dt_set = function (data) {
				var option = new Option(nama, data.nim, true, true);
				$('#my-modal [name="nim"]').append(option).trigger('change');
				$('#my-modal [name="semester"]').val(data.semester).trigger('change');
				$('#my-modal [name="sakit"]').val(data.sakit);
				$('#my-modal [name="ijin"]').val(data.ijin);
				$('#my-modal [name="alpa"]').val(data.alpa);
			}
			$('#my-modal').modal({
				keyboard: false,
				backdrop: 'static',
				
			});
			set(url_1, id, dt_set);


		});
		//proses edit
		$('.edit-data').click(function (e) {
			var url = "<?php echo base_url('operator/absensi/update')?>";
			e.preventDefault();
			var data = {
				id: $('#my-modal [name="id"]').val(),
				nim: $('#my-modal [name="nim"]').val(),
				semester: $('#my-modal [name="semester"]').val(),
				sakit: $('#my-modal [name="sakit"]').val(),
				ijin: $('#my-modal [name="ijin"]').val(),
				alpa: $('#my-modal [name="alpa"]').val(),
			};

			post(url, data);
			table.ajax.reload();
			$('#my-modal').modal('hide');


		});

		//============end edit================


		//===============hapus data==============
		$('tbody').on('click', '.hapus', function () {
			var url = "<?php echo base_url('operator/absensi/delete')?>";
			let data = table.row($(this).parents('tr')).data();
			id = data[0];
			hapus(url, id);
			table.ajax.reload();

		});
		//=============end hapus================

	});

</script>
</body>

</html>
