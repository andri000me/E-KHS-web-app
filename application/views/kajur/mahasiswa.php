<div class="main-panel" style="height: 100%; overflow-y: scroll;">
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
										<h4 class="card-title">Data Mahasiswa</h4>
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
												<label>Angkatan</label>
												<input type="text" class="form-control fill" id="angkatan" name="angkatan"
													placeholder="Pilih Angkatan">
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
												<th>nim</th>
												<th>No</th>
												<th>Nim</th>
												<th>Nama</th>
												<th>Prodi</th>
												<th>Kelas</th>
												<th>Status</th>
												<th>Detail</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>nim</th>
												<th>No</th>
												<th>Nim</th>
												<th>Nama</th>
												<th>Prodi</th>
												<th>Kelas</th>
												<th>Status</th>
												<th>Detail</th>
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
										<h4 class="card-title flex-1" style="margin-left: -32px;">
											<center>Detail</center>
										</h4>
									</div>
								</div>
							</div>

							<div class="col-md-4" style="margin: auto;">
								<div class="card card-profile">
									<div class="card-header hidden-caret" style="background-image: url('<?=base_url()?>assets/img/gg.svg');
                  padding: 10px !important; background-size:cover;">
						
										<div class="profile-picture">
											<div class="avatar avatar-xl">
												<img id="dt_foto" src="<?=base_url()?>assets/img/profile.jpg" alt="mahasiswa"
													class="avatar-img rounded-circle" style="border: 2px solid white !important;">
												<div id="dt_status" style="cursor: pointer; position: absolute; bottom: -5px; right: -1px;">
												</div>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="user-profile text-center">
											<div class="name"><span id="dt_nama">Bonaventura P Jemi </span></div>
											<div class="nim" id="dt_nim">1623734335</div>
											<div class="class" id="dt_prodi">TKJ</div>
											<div class="class" id="dt_kelas">Kelas A</div>

										</div>
										<div class="d-flex flex-row justify-content-between">
											
										</div>
									</div>
									<div class="card-footer">
										<div class="row user-stats text-center">
											<div class="col">
												<div class="title">Dosen PA</div>
												<div class="title" id="dt_pa" style="font-weight: bold;">Pembimbing Akademik</div>
											</div>
										</div>

									</div>
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



<?php $this->load->view('include/script');?>
<script src="<?=base_url()?>assets/js/plugin/jquery.validate/jquery.validate.min.js"></script>


<script>
	$(document).ready(function () {

		//===============plugin init==================
		$('.myselect').select2({
			theme: "bootstrap"
		});

		

		$('#tang').datetimepicker({
			format: 'YYYY',
			viewMode: 'years'

		})

		$('#angkatan').datetimepicker({
			format: 'YYYY',
			viewMode: 'years'

		}).on('dp.change', function () {
			table.ajax.reload();
		});

		$('.cutikan').click(function () {
			alert('baka');
		});



		// ===============end int===============

		// ==========get data===============
		var url = "<?php echo site_url('kajur/mahasiswa/get_data')?>";
		var dtfilter = (data) => {
			data.kelas = $('#kelas').val();
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

		// ===========detail data============
		$('tbody').on('click', '.tggl', function () {
			let data = table.row($(this).parents('tr')).data();

			nim = data[0];
			let url = "<?php echo base_url('kajur/mahasiswa/getmhsbynim')?>";
			var dt_set = function (data) {

				$('#dt_nama').html(`${data[0].nama}`);
				$('#dt_nim').html(`${data[0].nim}`);
				$('#dt_kelas').html(`Kelas ${data[0].kelas}`);
				$('#dt_foto').attr('src', `<?= base_url()?>/assets/foto/${data[0].foto}`);
				$('#dt_status').html(`${data[0].status}`);
				$('#dt_pa').html(`${data[0].dosen}`);
				$('#dt_prodi').html(`${data[0].prodi}`);
				$('#dt_status').attr('title', `${data[0].st}`);
				$('#dt_status').tooltip('dispose');
				$('#dt_status').tooltip({
					placement: "right",
				});

			}
			set(url, nim, dt_set);

			$('.tab-pane').toggleClass('active');

		});

		$('.tggl').on('click', function () {

			$('.tab-pane').toggleClass('active');

		});
		//==============end detail============



		
	});

</script>
</body>

</html>
