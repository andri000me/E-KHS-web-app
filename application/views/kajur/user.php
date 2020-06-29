<div class="main-panel" style="height: 100%; overflow-y: scroll;">
	<div class="container">
		<div class="page-inner">
			<h4 class="page-title">User</h4>
			<div class="row">
				<div class="col-md-4">
					<div class="card card-with-nav">
						<div class="card-header">
							<div class="row row-nav-line">
								<ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-3" role="tablist">
									<li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Tambah User</a> </li>
								</ul>
							</div>
						</div>
						<div class="card-body">
							<div class="tab-content" id="v-pills-tabContent">
								<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="v-pills-home-tab">
									<form id="profileForm" method="post" action="<?=base_url()?>kajur/user/add">
									<div class="row mt-3">
										<div class="col-md-12">
											<div class="form-group form-group-default">
												<label>Nama</label>
												<input type="text" class="form-control" name="nama" placeholder="Name" value="">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group form-group-default">
												<label>Username</label>
												<input type="text" class="form-control" name="namaUser" placeholder="username" value="">
											</div>
										</div>
									</div>
									<div class="row mt-3">
										<div class="col-md-12">
											<div class="form-group form-group-default">
												<label>No Hp</label>
												<input type="text" class="form-control" value="" name="phone" placeholder="Phone">
											</div>
										</div>
									</div>
									<div class="row mt-3">
										<div class="col-md-12">
											<div class="form-group form-group-default">
												<label>Password</label>
												<input type="text" class="form-control" value="" name="Password" placeholder="Password">

											</div>
										</div>
									</div>
									<div class="row mt-3">
										<div class="col-md-12">
											<div class="form-group">
												<label class="form-label">Level</label>
												<div class="selectgroup w-100">
													<label class="selectgroup-item">
														<input type="radio" name="level" value="Kajur/Sekjur"  class="selectgroup-input">
														<span class="selectgroup-button">Kajur/Sekjur</span>
													</label>
													<label class="selectgroup-item">
														<input type="radio" name="level" value="Operator" class="selectgroup-input" >
														<span class="selectgroup-button">Operator</span>
													</label>
													
												</div>
											</div>
										</div>
									</div>
									<div class="collapse" id="prodi">
										<div class="card-body">
											<div class="row">

												<div class="form-group  col-md-12 col-12">
													<label>Prodi</label>
													<select class="form-control fill" name="prodi" id="kelas">
														<?php foreach ($prodi as $key): ?>
															<option value="<?=$key->kodeprodi ?>"><?=$key->prodi ?></option>
														<?php endforeach ?>
													</select>
												</div>
											</div>
										</div>
									</div>
									
									<div class="text-right mt-3 mb-3">
										<button class="btn btn-success">Simpan</button>
									</div>
									</form>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="card ">
						<div class="card-body">
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">Nama</th>
										<th scope="col">Username</th>
										<th scope="col">level</th>
										<th scope="col">No Hp</th>
										<th scope="col"></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($user as $key) : ?>
									<tr>
										<td><?= $key->nama ?></td>
										<td><?= $key->username ?></td>
										<td><?= $key->level ?></td>
										<td><?= $key->no_hp ?></td>
										<td> <a href="<?=base_url()?>kajur/user/delete/<?= $key->id?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> </td>
									</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
			
					</div>
				</div>
				
			</div>
		</div>
	</div>
	
</div>

<div class="modal fade" id="my-modal" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Pilih Prodi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="flaticon-cross"></i></span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="form-group col-md-12">
						<label>Prodi</label>
						<input type="text" class="form-control txt" name="kode" placeholder="Masukan Kode Elemen">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				
				<button class="btn btn-primary btn-round add-data">Ok</button>
				
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('include/script'); ?>
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


	$('.selectgroup-input').on('change', function () { 
		let a = $('[name="level"]:checked').val();
		if(a == "Operator" ){
			$('#prodi').collapse('show');
		}	
		else{
			$('#prodi').collapse('hide');
		}
	});
</script>
