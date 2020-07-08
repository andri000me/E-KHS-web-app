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
										<h4 class="card-title">KHS</h4>
										<div class="ml-auto">
											<button class="btn btn-success btn-round mr-3" data-toggle="collapse" data-target="#filter"
												aria-expanded="false" aria-controls="collapseExample">
												<i class="fas fa-filter"></i>
												Filter
											</button>

										</div>
									</div>
								</div>
								<div class="collapse" id="filter">
									<div class="card card-body">
										<div class="row">

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
											<div class="form-group col-md-2 col-12 ">
												<label>Prodi</label>
												<select class="form-control fill" id="prodi">
													<option value="" selected="" disabled="">pilih Prodi</option>
													<?php foreach ($prod as $key): ?>
														
														<option value="<?=$key->kodeprodi?>"><?=$key->prodi?></option>
													<?php endforeach ?>
												</select>
											</div>
											<div class="col-md-2 d-flex" style="margin-top:40px;">
												<button type="reset" id="tampil" class="mr-2 btn btn-warning btn-sm " style="height:40px;">
													<span class="btn-label"><i class="fas fa-undo-alt"></i></span> Reset
												</button>
												<button id="tambah" class=" btn btn-primary btn-sm " style="height:40px;">
													<span class="btn-label"><i class="fas fa-plus"></i></span> Tambah
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

<?php $this->load->view('include/script');?>


<script>
	$(document).ready(function () {
		

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

		//datatables
		$('.fill').on('change', function () { //button filter event click
			table.ajax.reload(); //just reload table
		});
		$('[type="reset"]').on('click', function () { //button filter event click
			$('.fill').val("");

			table.ajax.reload(); //just reload table
			 //just reload table
		});

		// tamabah Modal
		$('#tambah').click(function(){
				let kelas = $('#kelas').val();
				let semester = $('#semester').val();
				let matakuliah = $('#mk').val();
				let pro = $('#prodi').val();
				let matakuliahq = $('option[value="'+matakuliah+'"]').text();
				let prdd = $('option[value="'+pro+'"]').text();
				$('#matKul').text(matakuliahq);
				$('#semS').text(semester);
				$('#kelS').text(kelas);
				$('#prodiS').text(prdd);

				tbInput.ajax.reload();
				$('#modal-tambah').modal({
					keyboard: false,
					backdrop: 'static',
				});
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
