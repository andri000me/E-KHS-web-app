<div class="main-panel scr" >
	<div class="content">
		<div class="page-inner" style="margin-top: 60px;">

			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Nama Tabel</h4>
								<div class="ml-auto d-flex flex-row">
									<a class="btn btn-secondary btn-round btn-sm mr-3 tambah text-light">
										<i class="icon-note"></i>
										Tambah Data
									</a>

								</div>
							</div>
						</div>
						<div class="card-body">

							<table id="data-tb" class="display table table-hover table-bordered" cellspacing="0" style="width:100%;">
								<thead>
									<tr>
										
										<th>No</th>
										<th>field 1</th>
										<th>field 2</th>
										<th>field 3</th>
										<th>field n</th>
										<th>aksi</th>
									</tr>
								</thead>
								
								<tbody>
									<tr>
										<td>1</td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td><div class="d-flex flex-row">
							                <button class="mr-2 btn btn-icon btn-round btn-success edit"><i class="icon-pencil"></i></button>
							                <button class="btn btn-icon btn-round btn-danger hapus"><i class="icon-trash"></i></button>
							            </div>
							        	</td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr><tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr><tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr><tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr><tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>

								</tbody>

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
				<h5 class="modal-title" id="exampleModalLongTitle">Form</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="flaticon-cross"></i></span>
				</button>
			</div>
			<form id="myform">
				<div class="modal-body">
					<div class="row">
						<input type="hidden" name="id" value="">
						<div class="form-group col-md-12">
							<label>field 1</label>
							<select name="elemenmk" class="form-control myselect" style="width:100%;">
							
							<option></option>
							<option></option>
							<option></option>
							</select>
						</div>
						<div class="form-group col-md-12">
							<label>field 2</label>
							<input type="text" class="form-control txt" name="namamk" placeholder="">
						</div>
						<div class="form-group col-md-12">
							<label>field 3</label>
							<input type="text" class="form-control txt" name="namamk" placeholder="">
						</div>
						<div class="form-group col-md-12">
							<label>field n</label>
							<input type="number" class="form-control txt" name="sks" placeholder="">
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


	});

</script>
</body>

</html>
