<div class="main-panel" style="height: 100%; overflow-y: scroll;">
	<div class="container">
		<div class="page-inner">
			<h4 class="page-title">Pejabat</h4>
			<div class="row">
				<?php foreach ($pejabat as $key): ?>
				<div class="col-md-4">
					<div class="card card-profile">
						<div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
							<div class="profile-picture">
								<div class="avatar avatar-xl">
									<img src="<?=base_url()?>/assets/images/pejabat/<?=$key->foto?>" alt="..." class="FotoUser avatar-img rounded-circle">
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="user-profile text-center">
								<div class="name nUser"><?= $key->nama?></div>
								<div class="job"><?= $key->jabatan?></div>
								<div class="level"><?= $key->nip?></div>
								
								<div class="view-profile mt-5 ">
									<button class="col-12 btn btn-primary" data-toggle="modal" data-target="#my-modal<?= $key->kode?>">
										<i class="fas fa-edit"></i> Edit
									</button>
								</div>
							</div>
						</div>
			
					</div>
				</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
	
</div>
<?php foreach ($pejabat as $key): ?>
<div class="modal fade" id="my-modal<?= $key->kode?>" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered " role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle">Edit <?= $key->jabatan?></h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true"><i class="flaticon-cross"></i></span>
			</button>
		</div>
		<form id="myform" enctype="multipart/form-data" method="post" action="<?=base_url() ?>/kajur/pejabat/edit">
		<div class="modal-body">
			<div class="row">
				<input type="hidden" name="id" value="<?= $key->kode?>">
				<div class="form-group col-md-12">
					<label>Nip</label>
					<input type="text" class="form-control txt" value="<?= $key->nip?>" name="nip" placeholder="Masukan Nip">
				</div>
				<div class="form-group col-md-12">
					<label>Nama</label>
					<input type="text" class="form-control txt" value="<?= $key->nama?>" name="nama" placeholder="Masukan Nama">
				</div>
				<div class="form-group col-md-12">
					<label>Foto</label>
					<input type="File" class="form-control txt" name="foto" placeholder="pilih foto" value="<?= base_url()?>/assets/images/pejabat/<?=$key->foto?>">
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary btn-round add-data">Simpan</button>
		</div>
		</form>
	</div>
</div>
</div>
<?php endforeach ?>


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
</script>
