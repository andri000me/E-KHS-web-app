<style type="text/css">
	.tb-form{
		background-color: rgba(0 0 0 0); border: none;
		width:100%;
	}
</style>
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
										<h4 class="card-title">Data Mahasiswa</h4>
										<div class="ml-auto d-flex flex-row">
											<button class="btn btn-outline-success mr-3" data-toggle="collapse" data-target="#filter"
												aria-expanded="false" aria-controls="collapseExample">
												<i class="icon-eyeglass"></i>
												Filter
											</button>
											<div class="btn-group mr-3">
												<button type="button" class="btn btn-info tambah">Tambah</button>
												<button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<span class="sr-only">Toggle Dropdown</span>
												</button>
												<div class="dropdown-menu">
													<a class="dropdown-item tambah-mul" href="#">Tambah Per Kelas</a>
												</div>
											</div>
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
												<th>nim</th>
												<th>No</th>
												<th>Nim</th>
												<th>Nama</th>
												<th>Prodi</th>
												<th>Kelas</th>
												<th>Status</th>
												<th>Aksi</th>
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
												<th>Aksi</th>
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
						<input type="hidden" name="nimOri" value="">
						<div class="form-group col-12 ">
							<label>Nim</label>
							<input type="text" class="form-control" name="nim" placeholder="Masukan Nim Mahasiswa">
						</div>
						<div class="form-group col-12 ">
							<label>Nama</label>
							<input type="text" class="form-control" name="nama" placeholder="Masukan Nama Mahasiswa">
						</div>
						<div class="form-group col-md-6">
							<label>Kelas</label>
							<select name="kelas" class="form-control myselect" style="width:100%;">
								<?=op_kelas();?>
							</select>
						</div>
						<div class="form-group col-md-6">
							<label>Angkatan</label>
							<input type="text" class="form-control" id="tang" name="angkatan" placeholder="Pilih Angkatan">
						</div>
						<div class="form-group col-12" id="popdos">
							<label>Dosen PA</label>
							<select name="dosen" class="form-control myselect2" style="width:100%;"></select>
						</div>


					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary btn-border btn-round" data-dismiss="modal">batal</button>
					<button type="submit" class="btn btn-primary btn-round add-data">Simpan</button>
					<button type="button" class="btn btn-success btn-round edit-data">Edit</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="my-modal-add-mul" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" style="max-width: 90%;" role="document">
		<div class="modal-content">
			<div class="modal-header justify-content-start">
				<div class="form-group col-md-3">
					<label>Kelas</label>
					<select id="val-kelas" class="form-control myselect" style="width:100%;">
						<?=op_kelas();?>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label>Angkatan</label>
					<input type="text" class="form-control" id="tang1"  placeholder="Pilih Angkatan">
				</div>
				<div class="form-group col-md-3">
					<label>Jumlah</label>
					<input type="number" id="value-jumlah" class="form-control" value="20">
				</div>
				<div class="col-md-2"  style="margin-top:40px;">
					<button class="btn btn-outline-primary" id="t-go">Go</button>
				</div>
			</div>
			<form id="form-mul">
				<div class="modal-body">
					<div class="row">
						<div class="col-12">
							<table class="display table table-bordered" id="tbInput">
								<thead>
									<tr>
										<th>No</th>
										<th>Nim</th>
										<th>Nama</th>
										<th>Dosen PA</th>
										<th></th>
									</tr>
								</thead>
								<tbody id="tbody12">
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary btn-border btn-round" data-dismiss="modal">batal</button>
					<button type="submit" class="btn btn-primary btn-round">Simpan</button>
				</div>
			</form>
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

		$('.myselect2').select2({
			theme: "bootstrap",
			ajax: {
				url: '<?=base_url();?>api/dosen',
				data: function (q) {
					return {
						q: q.term
					}
				},
				dataType: 'JSON',
				cache: true
			},
			minimumInputLength: 1,
			placeholder: 'Pilih Dosen Pembimbing Akademik',
		});

		$('#tang , #tang1').datetimepicker({
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
		var url = "<?php echo site_url('operator/mahasiswa/get_data')?>";
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
			let url = "<?php echo base_url('operator/mahasiswa/getmhsbynim')?>";
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

		//==============add data===========================

		$('.tambah').click(function (e) {
			$('.add-data').show();
			$('.edit-data').hide();
			$('.modal-header #exampleModalLongTitle').html('Tambah Data');
			$('#my-modal').modal({
				keyboard: false,
				backdrop: 'static',

			});

		});

		$('.tambah-mul').click(function (e) {
			
			$('#my-modal-add-mul').modal({
				keyboard: false,
				backdrop: 'static',

			});

		});
		$('.add-data').click(function (e) {
			e.preventDefault();
			let url = "<?php echo base_url('operator/mahasiswa/add')?>";
			let data = {
				nim: $('#my-modal [name="nim"]').val(),
				nama: $('#my-modal [name="nama"]').val(),
				kelas: $('#my-modal [name="kelas"]').val(),
				angkatan: $('#my-modal [name="angkatan"]').val(),
				dosen: $('#my-modal [name="dosen"]').val(),
			};

			post(url, data);

			$('#my-modal').modal('hide');

		});


		//=====end add=========== 

		//================= edit=========

		// set data
		$('tbody').on('click', '.edit', function () {
			$('.add-data').hide();
			$('.edit-data').show();
			$('.modal-header #exampleModalLongTitle').html('Edit Data');
			let data = table.row($(this).parents('tr')).data();
			let id = data[0];
			$('#my-modal [name="nimOri"]').val(id);
			let url_1 = "<?php echo base_url('operator/mahasiswa/getmhsbynim')?>";
			var dt_set = function (data) {
				var option = new Option(data[0].dosen, data[0].nip, true, true);
				$('#my-modal [name="dosen"]').append(option).trigger('change');
				$('#my-modal [name="nim"]').val(data[0].nim);
				$('#my-modal [name="nama"]').val(data[0].nama);
				$('#my-modal [name="kelas"]').val(data[0].kelas).trigger('change');
				$('#my-modal [name="angkatan"]').val(data[0].angkatan);
				if((data[0].nip=='') | (data[0].nip==null)){
					$('#popdos').popover({
		        title:'<div class="text-warning"> Perhatian !!</div>',
		        placement:"bottom",
		        trigger:'hover',
		        offset:"-100",
		        html:true,
		        content:'<div>Tentukan Dosen Pembimbing Untuk Mahasiswa Ini !</div>',
		        delay:{
		            'show':60,
		            'hide':100
		        },
		        
		    	});
		    	setTimeout(() => {
			      $('#popdos').popover('show');
			    }, 300);
				}
			}
			$('#my-modal').modal({
				keyboard: false,
				backdrop: 'static',
			});
			set(url_1, id, dt_set);

		});
		//proses edit
		$('.edit-data').on('click', function (e) {
			var url = "<?php echo base_url('operator/mahasiswa/update')?>";
			var data = {
				origin_nim: $('#my-modal [name="nimOri"]').val(),
				nim: $('#my-modal [name="nim"]').val(),
				nama: $('#my-modal [name="nama"]').val(),
				kelas: $('#my-modal [name="kelas"]').val(),
				angkatan: $('#my-modal [name="angkatan"]').val(),
				dosen: $('#my-modal [name="dosen"]').val(),
			};
			post(url, data);
			table.ajax.reload();
			$('#my-modal').modal('hide');
		});

		// aktif DO Cuti
		$('tbody').on('click', '.statusChange', function () {
			var el = this.classList[2];
			const url = '<?= base_url()?>operator/mahasiswa/updateStatus';
			let data = table.row($(this).parents('tr')).data();
			let id = data[0];
			console.log(id);
			switch (el) {
				case 'aktif':

					changeStatus('Aktif', url, {
						status: 'Aktif',
						id: id,
					});
					break;
				case 'cuti':
					changeStatus('Cuti', url, {
						status: 'Cuti',
						id: id,
					});
					break;
				case 'do':
					changeStatus('Drop Out', url, {
						status: 'DO',
						id: id,
					});
					break;

				default:
					break;
			}
		});
		//============end edit================


		//===============hapus data==============
		$('tbody').on('click', '.hapus', function () {
			var url = "<?php echo base_url('operator/mahasiswa/delete')?>";
			let data = table.row($(this).parents('tr')).data();
			id = data[0];
			hapus(url, id);
			table.ajax.reload();

		});
		//=============end hapus================

		// Print
		$('#prinData').on('click',  function(e){  
      	let kelas = $('#kelas').val();
				let angkatan = $('#angkatan').val();
        $('#pdf').attr('src','<?=base_url()?>operator/report/mahasiswa?kelas='+kelas+'&angkatan='+angkatan+'');
        
        $('#iframe').hide();                             
            
    });

	});

</script>

<script type="text/javascript">
	//MULTIPLE ADD

	$('#t-go').click(function(){
		let kelas =	$('#val-kelas').val();
		let Jumlah =	$('#value-jumlah').val();
		let angkatan=	$('#tang1').val() ;
		$.ajax({
			type: "POST",
			url: "<?=base_url()?>operator/mahasiswa/formTb",
			data:{
				kelas:kelas,
				Jumlah:Jumlah,
				angkatan:angkatan,
			},
			success: function (data) {
				$('#tbody12').html(data);
				$('.myselect2').select2({
				theme: "bootstrap",
				ajax: {
					url: '<?=base_url();?>api/dosen',
					data: function (q) {
						return {
							q: q.term
						}
					},
					dataType: 'JSON',
					cache: true
				},
				minimumInputLength: 1,
				placeholder: 'Pilih Dosen Pembimbing Akademik',
			});
			},
			error: function (err) {
				console.log(err);
			}
		});
	});

	$('#form-mul').on('submit',function(e){
		e.preventDefault();
		$.ajax({  
         url:"<?php echo site_url('operator/mahasiswa/addMul')?>",
         method:"POST",  
         data:new FormData(this),
         contentType: false,
         dataType: "JSON", 
         cache: false,  
         processData:false,  
         success:function(data)  
         {  
         	notif(data.type, data.text);
					table.ajax.reload();
					$('#tbody12').html("");
         },
         error:function(err){
         	notif('error', 'data Gagal Ditambahkan');
         }   
      });
    $('#my-modal-add-mul').modal('hide');

	});
	function remove(i,nomor) {
		
		let data = $(i).closest('tr').index()+1;
		console.log(data);
		swal({
			title: 'Anda Yakin?',
			icon: "warning",
			text: "Anda Akan Menghapus Baris Ini ("+nomor+") !",
			type: 'warning',
			buttons: {
				cancel: {
					visible: true,
					text: 'Batal!',
					className: 'btn btn-danger'
				},
				confirm: {
					text: 'Ya, Hapus !',
					className: 'btn btn-success'
				}
			}
		}).then((willDelete) => {
			if (willDelete) {
				document.getElementById('tbInput').deleteRow(data);
			}
		});
	}
</script>
</body>

</html>
