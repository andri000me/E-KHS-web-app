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
										<h4 class="card-title">Nilai KHS</h4>
										<div class="ml-auto">
											<button class="btn btn-success btn-round mr-3" data-toggle="collapse" data-target="#filter"
												aria-expanded="false" aria-controls="collapseExample">
												<i class="fas fa-filter"></i>
												Filter
											</button>
											<div class="btn-group mr-3">
												<button type="button" class="btn btn-info tambah"
														data-toggle="collapse" data-target="#jadwal"
														aria-expanded="false" aria-controls="collapseExample">
													Tambah
												</button>
												<button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<span class="sr-only">Toggle Dropdown</span>
												</button>
												<div class="dropdown-menu">
													<a class="dropdown-item tambah-satu" href="#">Tambah Per Mahasiswa</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="collapse" id="jadwal">
									<div class="card card-body">
										<div class="row">
											<div class="col-12 ">
												<table id="data-tb" class="display table table-hover "  cellspacing="0" style="width:100%;">
													<thead>
														<tr>
															<!-- <th>No</th> -->
															<th>Prodi</th>
															<th>Semester</th>
															<th>Kelas</th>
															<th>Kode MK</th>
															<th>Matakuliah</th>
															<th></th>
														</tr>
													</thead>
												</table>
											</div>
										</div>
									</div>
								</div>
								<div class="collapse" id="filter">
									<div class="card card-body">
										<div class="row">
											<div class="form-group col-md-2 col-12 ">
												<label>Prodi</label>
												<select class="form-control fill" id="prodi">
													<option value="" selected="" disabled="">pilih Prodi</option>
													<?php foreach ($prod as $key): ?>
														
														<option value="<?=$key->kodeprodi?>"><?=$key->prodi?></option>
													<?php endforeach ?>
												</select>
											</div>
											<div class="form-group  col-md-2 col-12">
												<label>Kelas</label>
												<select class="form-control fill" id="kelas">
													<option value="" selected="" disabled="">pilih Kelas</option>
													<?php foreach ($kel as $key): ?>
														
														<option value="<?=$key->kelas?>">Kelas <?=$key->kelas?></option>
													<?php endforeach ?>
												</select>
											</div>
											<div class="form-group  col-md-2 col-12 ">
												<label>Semester</label>
												<select class="form-control fill" id="semester">
													<option value="" selected="" disabled="">pilih Semester</option>
													<?php foreach ($sem as $key): ?>
														
														<option value="<?=$key->semester?>">Semester <?=$key->semester?></option>
													<?php endforeach ?>
												</select>
											</div>
											<div class="form-group col-md-3 col-12 ">
												<label>Matakuliah</label>
												<select class="form-control fill" id="mk">
													<option value="" selected="" disabled="">pilih Matakuliah</option>
													<?php foreach ($mk as $key): ?>
														
														<option value="<?=$key->kode?>"><?=$key->nama?></option>
													<?php endforeach ?>
												</select>
											</div>
											
											<div class="col-md-2 d-flex" style="margin-top:40px;">
												<button type="reset" id="tampil" class="mr-2 btn btn-warning btn-sm " style="height:40px;">
													<span class="btn-label"><i class="fas fa-undo-alt"></i></span> Reset
												</button>
											
											</div>
											

										</div>
									</div>
								</div>
								<div class="card-body">

									<table id="tb-khs" class="display table table-striped table-hover "  cellspacing="0" style="width:100%;">
										<thead>
											<tr>
												<th>id</th>
												<th>No</th>
												<th>Nim</th>
												<th>Nama</th>
												<th>Kelas</th>
												<th>Semester</th>
												<th>matakuliah</th>
												<th>Nilai(Am)</th>
												<th>Status</th>
												<th>aksi</th>
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

<div class="modal fade bd-example-modal-lg" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered ">
		<div class="modal-content">
			<div class="modal-header">
				
				<table class="modal-title ">

					<tr>
						<th>Matakuliah</th>
						<th>:</th>
						<th id="matKul">asasa</th>
					</tr>
					<tr>
						<th>Kelas</th>
						<th>:</th>
						<th id="kelS">A</th>
					</tr>
					<tr>
						<th>Semester</th>
						<th>:</th>
						<th id="semS">III</th>
					</tr>
					<tr>
						<th>TA</th>
						<th>:</th>
						<th id="TA">TA <?=$this->session->userdata('takademik');?> /<?php echo  $this->session->userdata('takademik')+1; ?>
							
						</th>
					</tr>
					<tr>
						<th>Prodi</th>
						<th>:</th>
						<th id="prodiS">TKJ</th>
					</tr>
				</table>
			</div>
			<form id="form-tambah">
				
			<div class="modal-body">
				<table class="table display" style="width:100%;" id="tb-input">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nim</th>
							<th scope="col">Nama</th>
							<th scope="col">Angka Mutu</th>
						</tr>
					</thead>
				</table>
			</div>
			<div class="modal-footer">

				<button class="btn btn-primary btn-border btn-round" data-dismiss="modal">batal</button>
				<button type="submit" class="btn btn-primary btn-round add-data">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade bd-example-modal-lg" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered ">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title ">Edit Data</h2>
			</div>
			<form method="post" id="form-edit">
				<div class="modal-body">
					<input type="hidden" name="id" value="">
					<div class="form-group col-md-12">
						<label>Nama</label>
						<input type="text" class="form-control" name="nama" readonly="" >
					</div>
					<div class="form-group col-md-12">
						<label>Nilai (AM)</label>
						<input type="text" class="form-control" name="am" placeholder="masukan Anggka Mutu">
					</div>
				</div>
				<div  class="modal-footer">
					<button class="btn btn-primary btn-border btn-round" data-dismiss="modal">batal</button>
					<button type="submit" class="btn btn-primary btn-round add-data">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal add 1 mhs-->
<div class="modal fade" id="my-modal" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle"></h5>
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
							<select name="nim" class="form-control myselect5" style="width:100%;">
							</select>
						</div>
						<div class="form-group col-md-12">
							<label>Matakuliah</label>
							<select name="Matakuliah" class="form-control myselect22" style="width:100%;">
								<option value='' disabled="" selected="">pilih Matakuliah</option>
								<?php foreach ($mk as $key): ?>
									<option value="<?=$key->kode?>"><?=$key->nama?></option>
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
		$('.myselect5').select2({
			theme: "bootstrap",
			ajax: {
				url: '<?=base_url();?>Api/mhs_dos',
				data: function (q) {
					return {
						q: q.term
					}
				},
				dataType: 'JSON',
				cache: false
			},

			minimumInputLength: 1,
			placeholder: 'Pilih Mahasiswa',
		});

		$('.myselect22').select2({
			theme: "bootstrap",
			minimumInputLength: 1,
			placeholder: 'Pilih Matakuliah',
		});

		$('#myform').on('submit',  function(e){  
		    e.preventDefault();
		    pos_url="<?=base_url();?>dosen/Khs/add_one";
			var data ={
				namaMk:$('option[value="'+$('#my-modal [name="Matakuliah"]').val()+'"').text(),
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
			var option3 = new Option("Mahasiswa", "", true, true);
			$('#my-modal [name="nim"]').append(option3).trigger('change');
	    	$('#my-modal').modal('hide');
	    	detailkhs.ajax.reload();                                    
		  });

		// tambah satu
		$('.tambah-satu').click(function (e) {
			pos_url="<?=base_url();?>operator/khs/add";
			$('.add-data').show();
			$('.edit-data').hide();
			$('.judul').hide();
			$('.modal-header #exampleModalLongTitle').html('Tambah Data');
			$('#my-modal [name="Matakuliah"]').attr('disabled',false);
			$('#my-modal [name="nim"]').attr('disabled',false);
			$('#my-modal [name="nim"]').val('').trigger('change');
			
			$('#my-modal').modal({
				keyboard: false,
				backdrop: 'static',
			});
		});

		table = $('#tb-khs').DataTable({
			"scrollX": true,
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
			},

			"processing": true,
			"deferRender": true,
			"ajax": {
				"url": "<?php echo site_url('dosen/khs/data_khs')?>",
				"type": "POST",
				"data": function (data) {
					data.kelas = $('#kelas').val();
					data.semester = $('#semester').val();
					data.matakuliah = $('#mk').val();
					data.prodi = $('#prodi').val();
				},
				
			},
			"columnDefs": [{
				"targets": [0],
				"visible": false,
			}]
		});

		tbInput =$('#tb-input').DataTable({
			
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
			},

			"processing": true,
			"searching":false,
			"paging":false,
			"ordering":false,
			"deferRender": true,
			"ajax": {
				"url": "<?php echo site_url('dosen/khs/getMhs')?>",
				"type": "POST",
				"data": function (data) {
					data.kelas = $('#kelas').val();
					data.semester = $('#semester').val();
					data.matakuliah = $('#mk').val();
					data.prodi = $('#prodi').val();
				},

			},
		});

		tbjadwal =$('#data-tb').DataTable({
			
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
			},

			"processing": true,
			"searching":false,
			"paging":false,
			"ordering":false,
			"deferRender": true,
			"ajax": {
				"url": "<?php echo site_url('dosen/jadwal/jdwl')?>",
				"type": "GET",
			},
			"columnDefs": [{
				"targets": [5],
				"visible": false,
			}]
			
		});

		$('#data-tb tbody').on('click','td', function () {
			let data = tbjadwal.row($(this).parents('tr')).data();
			console.log(data);
			let kelas =data[2];
			let semester = data[1];
			let matakuliah = data[3];
			let pro = data[5];
			let matakuliahq = data[4];
			let prdd = data[0];
			$('#matKul').text(matakuliahq);
			$('#semS').text(semester);
			$('#kelS').text(kelas);
			$('#prodiS').text(prdd);

			$('#kelas').val(kelas).trigger('change');
			$('#semester').val(semester).trigger('change');
			$('#mk').val(matakuliah).trigger('change');
			$('#prodi').val(pro).trigger('change');

			tbInput.ajax.reload();
			$('#modal-tambah').modal({
				keyboard: false,
				backdrop: 'static',
			});

		});

		//datatables
		$('.fill').on('change', function () { //button filter event click
			table.ajax.reload(); //just reload table
		});
		$('[type="reset"]').on('click', function () { //button filter event click
			$('.fill').val("");

			table.ajax.reload(); //just reload table
			 //just reload table
		});


		$('tbody').on('click', '.hapus', function () {
			let url="<?php echo site_url('dosen/khs/delete')?>";
			let data = table.row($(this).parents('tr')).data();
			id = data[0];
			hapus(url, id);
			table.ajax.reload();

		});

		$('tbody').on('click', '.edit', function () {
			
			let data = table.row($(this).parents('tr')).data();
			$('#modal-edit [name="nama"]').val(data[3]);
			$('#modal-edit [name="am"]').val(data[7]);
			$('#modal-edit [name="id"]').val(data[0]);
			$('#modal-edit').modal({
					keyboard: false,
					backdrop: 'static',
			});
			
		});

		$('#form-edit').on('submit', function (e) {
			e.preventDefault();
			var url = "<?php echo site_url('dosen/khs/update')?>";
			var data = {
				id: $('#modal-edit [name="id"]').val(),
				am: $('#modal-edit [name="am"]').val(),
			};
			post(url, data);
			table.ajax.reload();
			$('#modal-edit').modal('hide');

		});

		$('#form-tambah').on('submit', function (e) {
			e.preventDefault();
			$.ajax({  
         url:"<?php echo site_url('dosen/khs/add')?>",                        
         method:"POST",  
         data:new FormData(this),  
         contentType: false,
         dataType: "JSON", 
         cache: false,  
         processData:false,  
         success:function(data)  
         {  
         		
      			table.ajax.reload();
						$('#modal-tambah').modal('hide');
						notif(data.type, data.text);
         }  
      });  
			

		});


	});

</script>
<script type="text/javascript">
	$(document).ready(function(){
		let success="<?= $this->session->flashdata('success')?>";
		let error= "<?= $this->session->flashdata('error')?>";
		if (success!=''){
				notif('success', success);
		}
		else if (error!=''){
				notif('error', error);
		}
	});
</script>

<script type="text/javascript">
	$('#tambah').hide();
	$('.fill').on('change',function(){
		let contoh=$('#tb-khs tbody tr td').text();
		if (contoh =="No data available in table"){
			$('#tambah').show();
		}
		else{
			$('#tambah').hide();
		}
	});

</script>
</body>

</html>
