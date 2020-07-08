<div class="main-panel scr" >
	<div class="content">
		<div class="page-inner" style="margin-top: 60px;">

			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Elemen Kompetensi</h4>
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
										<th>Elemen</th>
										<th>Kode MK</th>
										<th>Nama Mk</th>
										<th>SKS</th>
										<th>aksi</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>id</th>
										<th>No</th>
										<th>Elemen</th>
										<th>Kode MK</th>
										<th>Nama Mk</th>
										<th>SKS</th>
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
			<form id="myform">
				<div class="modal-body">
					<div class="row">
						<input type="hidden" name="id" value="">
						<div class="form-group col-md-12">
							<label>Elemen Matakuliah</label>
							<select name="elemenmk" class="form-control myselect" style="width:100%;">
							<option value="" selected disabled>Pilih Elemen Matakuliah</option>
							<?php foreach ($el as $key) :?>
							<option value="<?=$key->elemenmk?>"><?=$key->elemenmk?> - <?=$key->nama?></option>
							<?php endforeach;?>
						</select>
						</div>
						<div class="form-group col-md-12">
							<label>Kode Mk</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">...</span>
								</div>
								<input disabled="true" type="text" class="form-control kmk" name="kodemk" placeholder="kode matakuliah" aria-label="kodemk" aria-describedby="basic-addon1">
							</div>
						</div>
						<div class="form-group col-md-12">
							<label>Nama Mk</label>
							<input type="text" class="form-control txt" name="namamk" placeholder="Masukan Nama Elemen">
						</div>
						<div class="form-group col-md-12">
							<label>SKS</label>
							<input type="number" class="form-control txt" name="sks" placeholder="Masukan Nama Elemen">
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
		$('.myselect').select2({
			theme: "bootstrap"
		});
		$('.myselect').on('change', function(){
			$('#basic-addon1').text($('.myselect').val());
			$('.kmk').attr("disabled",false);
		});
		var url1 = "<?php echo site_url('operator/matakuliah/get_data')?>";
		table = get(url1, null);
	});
	$(document).ready(function () {
		let url="";
		//==============add data===========================

		$('.tambah').click(function (e) {
			url="<?php echo site_url('operator/matakuliah/add')?>";
			$('.add-data').show();
			$('.edit-data').hide();
			$('.txt').val(null);
			
			$('#my-modal').modal({
				keyboard: false,
				backdrop: 'static',
			});

		});



		$('#myform').on('submit',  function(e){  
	    e.preventDefault();
			var data ={
					origin_kodemk: $('#my-modal [name="id"]').val(),
					elemenmk: $('#my-modal [name="elemenmk"]').val(),
					kodemk: $('#my-modal [name="kodemk"]').val(),
					namamk: $('#my-modal [name="namamk"]').val(),
					sks: $('#my-modal [name="sks"]').val(),
				};
			post(url, data);
			table.ajax.reload();
	    $('#myform').trigger("reset");
    	$('#my-modal').modal('hide');                             
	            
	  });
		// proses add

		//=====end add=========== 

		//================= edit=========

		//set data
		$('tbody').on('click', '.edit', function () {
			$('.add-data').hide();
			$('.edit-data').show();
			url="<?php echo site_url('operator/matakuliah/update')?>";
			let data = table.row($(this).parents('tr')).data();
			let id = data[0];
			$('#my-modal [name="id"]').val(id);
			let url_1 = "<?php echo base_url('operator/matakuliah/get_mkById')?>";
			var dt_set = function (data) {
				$('#my-modal [name="elemenmk"]').val(data.elemenmk).trigger('change');
				$('#basic-addon1').text(data.elemenmk);
				$('#my-modal [name="kodemk"]').val(data.kodemk.substring(3));
				$('#my-modal [name="namamk"]').val(data.namamk);
				$('#my-modal [name="sks"]').val(data.sks);
			}
			$('#my-modal').modal({
				keyboard: false,
				backdrop: 'static',
			});
			set(url_1, id, dt_set);


		});
		//proses edit
		

		//============end edit================


		//===============hapus data==============
		$('tbody').on('click', '.hapus', function () {
			var url = "<?php echo base_url('operator/matakuliah/delete')?>";
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
