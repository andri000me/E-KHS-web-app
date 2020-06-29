<div class="main-panel">
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
								>

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



<?php $this->load->view('include/script');?>


<script>
	$(document).ready(function () {
		//===============plugin init==================
		$('.myselect').select2({
			theme: "bootstrap"
		});
		$('.jam').datetimepicker({
			format: 'h:mm',
		});


		// ===============end int===============

		// ==========get data===============
		var url = "<?php echo site_url('dosen/jadwal/get_data')?>";
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



	});

</script>
</body>

</html>
