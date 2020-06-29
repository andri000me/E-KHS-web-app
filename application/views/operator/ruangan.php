<div class="main-panel scr" >
	<div class="content">
		<div class="page-inner" style="margin-top: 60px;">

			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Ruangan</h4>
								<div class="ml-auto d-flex flex-row">
									<a class="btn btn-secondary btn-round btn-sm mr-3 tambah text-light">
										<i class="icon-note"></i>
										Tambah Data
									</a>

								</div>
							</div>
						</div>
						<div class="card-body">

							<table id="data-tb" class="display table table-striped table-hover" cellspacing="0" style="width:100%;">
								<thead>
									<tr>
										<th>id</th>
										<th>No</th>
										<th>Nama</th>
										<th>aksi</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>id</th>
										<th>No</th>
										<th>Nama</th>
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
					<input type="hidden" name="id" value="">
					<div class="form-group col-md-12">
						<label>Nama</label>
						<input type="text" class="form-control txt" name="nama" placeholder="Masukan Nama Ruangan">
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

		// ==========get data===============
		var url = "<?php echo site_url('operator/Ruangan/get_data')?>";
		
		table = get(url, null);
		// ==================end get data===============


		//==============add data===========================

		$('.tambah').click(function (e) {

			$('.add-data').show();
			$('.edit-data').hide();
			$('.txt').val(null);
			

			$('#my-modal').modal({
				keyboard: false,
				backdrop: 'static',

			});


		});
		// proses add
		$('.add-data').click(function (e) {
			e.preventDefault();
			var url = "<?php echo base_url('operator/Ruangan/add')?>";
			var data = {
				nama: $('#my-modal [name="nama"]').val(),
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
			let nama = data[2];
			$('#my-modal [name="id"]').val(id);
			$('#my-modal [name="nama"]').val(nama);
		
			$('#my-modal').modal({
				keyboard: false,
				backdrop: 'static',
			});


		});
		//proses edit
		$('.edit-data').click(function (e) {
			var url = "<?php echo base_url('operator/Ruangan/update')?>";
			e.preventDefault();
			var data = {
				id: $('#my-modal [name="id"]').val(),
				kode: $('#my-modal [name="kode"]').val(),
				nama: $('#my-modal [name="nama"]').val(),
				
			};

			post(url, data);
			table.ajax.reload();
			$('#my-modal').modal('hide');


		});

		//============end edit================


		//===============hapus data==============
		$('tbody').on('click', '.hapus', function () {
			var url = "<?php echo base_url('operator/Ruangan/delete')?>";
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
