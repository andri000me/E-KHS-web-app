<div class="main-panel" style="height: 100%; overflow-y: scroll;">
			<div class="container">
				<div class="page-inner">
					<h4 class="page-title">Profile Saya</h4>
					<div class="row">
						<div class="col-md-4">
							<div class="card card-profile">
								<div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
									<div class="profile-picture">
										<div class="avatar avatar-xl">
											<img src="" alt="..." class="FotoUser avatar-img rounded-circle">
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="user-profile text-center">
										<div class="name nUser"></div>
										<div class="job"></div>
										
										<div class="view-profile mt-5">
											<div class="input-file input-file-image">
												<form id="uploadgambar" enctype="multipart/form-data">
												<input type="file" class="form-control form-control-file" id="uploadImg" name="foto" accept="image/*" required>
												<label for="uploadImg" class="btn-block label-input-file btn btn-primary">
												<span class="btn-label">
													<i class="fas fa-camera"></i>
												</span>
												Ubah Foto Profil</label>
												</form>
											</div>
											
										</div>
									</div>
								</div>
					
							</div>
						</div>
						<div class="col-md-8">
							<div class="card card-with-nav">
								<div class="card-header">
									<div class="row row-nav-line">
										<ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-3" role="tablist">
											<li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Edit Profil</a> </li>
						
											<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Ubah Password</a> </li>
										</ul>
									</div>
								</div>
								<div class="card-body">
									<div class="tab-content" id="v-pills-tabContent">
										<div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="v-pills-home-tab">
											<form id="PasswordForm">
											<div class="row mt-3">
												<div class="col-md-12">
													<div class="form-group form-group-default">
														<label>Password Lama</label>
														<input type="Password" class="form-control" placeholder="Masukan Password Lama" name="oldpassword">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group form-group-default">
														<label>Password Baru</label>
														<input type="Password" placeholder="Masukan Password Baru" class="form-control" name="newpasword">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group form-group-default">
														<label>Konfirmasi Password Baru</label>
														<input onfocus="onf()" onblur="onblur()" type="Password" placeholder="Konfirmasi Password Baru" class="form-control" name="confirm" >
														 <label style="font-size: 10px; color: red;" id="lba"></label>
													</div>
												</div>
											</div>
											<div class="text-right mt-3 mb-3">
												<button type="submit" disabled="true" id="submit" class="btn btn-success">Simpan</button>
											</div>
											</form>
										</div>
										<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="v-pills-home-tab">
											<form id="profileForm">
											<div class="row mt-3">
												<div class="col-md-12">
													<div class="form-group form-group-default">
														<label>Nama</label>
														<input type="text" class="form-control" name="nama" placeholder="Name" value="<?=$this->session->userdata('nama');?>">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group form-group-default">
														<label>Nip</label>
														<input type="text" class="form-control" name="nip" placeholder="Name" value="<?=$this->session->userdata('username');?>">
													</div>
												</div>
											</div>
											<div class="row mt-3">
												
												<div class="col-md-12">
													<div class="form-group form-group-default">
														<label>No Hp</label>
														<input type="text" class="form-control no_hp" value="<?=$this->session->userdata('no_hp');?>" name="phone" placeholder="Phone">
													</div>
												</div>
											</div>
											<div class="text-right mt-3 mb-3">
												<button type="submit" class="btn btn-success">Simpan</button>
											</div>
											</form>
											
										</div>
									</div>
									
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			
		</div>
<?php $this->load->view('include/script'); ?>
<script>
	$(document).ready(function(){
		getData();
		$('.FotoUser').addClass('is-loading');
	});
	function getData() {
		let url0="<?php echo base_url('dosen/profile/getData')?>";
		let id="<?php echo $this->session->userdata('username'); ?>";
		$('.nUser1').text("<?=nama_depan($this->session->userdata('nama'))?>");
		var dt_set = function (data) {
			console.log(data);
			$('.FotoUser').attr('src','<?=base_url()?>/assets/images/dosen/'+data.foto+'?triger='+Date.now());
			$('.nUser').text(data.nama);
			
			$('.job').text(''+data.nip);
			
		}
		set(url0, id, dt_set);
		console.log("oke");
	}

	$('#profileForm').on('submit', function(e){
		e.preventDefault();
		const url="<?php echo base_url('dosen/profile/update')?>"
		var data ={
				nama: $('#profileForm [name="nama"]').val(),
				nip: $('#profileForm [name="nip"]').val(),
				no_hp: $('#profileForm [name="phone"]').val(),
			};
		post(url, data);
		getData();


	});
	$('#PasswordForm').on('submit', function(e){
		e.preventDefault();
		const url2="<?php echo base_url('dosen/profile/ubahPassword')?>";
		var data ={
				oldpassword: $('#PasswordForm [name="oldpassword"]').val(),
				confirm: $('#PasswordForm [name="confirm"]').val(),
			};
		post(url2, data);
		$('#PasswordForm').trigger('reset');
	});
	$('#uploadImg').on('change',function () {
		$('#uploadgambar').submit();
	});

	$('#uploadgambar').on('submit',function(e){
		e.preventDefault();
		const url3="<?php echo base_url('dosen/profile/ubahFoto')?>";
		 $.ajax({  
	         url:url3,                        
	         method:"POST",  
	         data:new FormData(this),  
	         contentType: false,
	         dataType: "JSON", 
	         cache: false,  
	         processData:false,  
	         success:function(data)  
	         {  
	         	localStorage.clear();
	         	getData();
	            notif(data.type, data.text);
	                
	         }  
        });  

	});




//utils
	function onf() {
        interval=setInterval("validasi()",1);
    }
    function validasi() {
        let np,cnp;
        
        np=$('#PasswordForm [name="newpasword"]').val();
        cnp=$('#PasswordForm [name="confirm"]').val();
        console.log(cnp);
        if (cnp.length >= np.length){
	        if (np!=cnp)
	        {
	            $('#lba').text("*tidak cocok");
	            $('#submit').attr('disabled',true);
	        } 
	        else
	        { 
	            $('#lba').text("");
	            $('#submit').attr('disabled',false);
	        }
        }
        else{
        	$('#submit').attr('disabled',true);
        } 
    }
    function onb() {
        clearInterval(interval);
    }


</script>