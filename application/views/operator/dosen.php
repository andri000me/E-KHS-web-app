<div class="main-panel scr" >
	<div class="container container-full">
		<div class="page-navs bg-white">
			<div class="nav-scroller">
				<div class="nav nav-tabs nav-line nav-color-secondary d-flex align-items-center justify-contents-center w-100">
					<a class="nav-link active show" data-toggle="tab" href="#">Dosen</a>
					<div class="form-group">
						<div class="input-icon">
							<input type="search" class="form-control input-solid input-pill" id="cari" placeholder="Search for...">
							<span class="input-icon-addon">
								<i class="fa fa-search"></i>
							</span>
						</div>
					</div>
					<div class="ml-auto">
						<button  class="btn btn-success tambah btn-sm"><i class="icon-user-follow"></i></button>
					</div>

				</div>
			</div>
		</div>
		<div class="page-inner"  >
			<div class="row row-projects is-loading is-loading-lg">

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
			<form id="myform" enctype="multipart/form-data" >
			<div class="modal-body">
				<div class="row">
					<input type="hidden" name="id" value="">
					<div class="form-group col-md-12">
						<label>Nip</label>
						<input type="text" class="form-control txt" name="nip" placeholder="Masukan Nip">
					</div>
					<div class="form-group col-md-12">
						<label>Nama</label>
						<input type="text" class="form-control txt" name="nama" placeholder="Masukan Nama">
					</div>
					<div class="form-group col-md-12">
						<label>No Hp</label>
						<input type="text" class="form-control txt" name="no_hp" placeholder="Masukan Nomor Hp">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="mr-auto btn btn-danger btn-round hapus-data">Hapus</button>
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
		getData('');
	});
	let url="";
	function getDosen(nip) {
		url = "<?php echo base_url('operator/dosen/update')?>";
		let url_1 = "<?php echo base_url('operator/dosen/getDosenByNip')?>";
		var dt_set = function (data) {
			console.log(data);
			$('#my-modal [name="id"]').val(data.nip);
			$('#my-modal [name="nip"]').val(data.nip);
			$('#my-modal [name="nama"]').val(data.nama);
			$('#my-modal [name="no_hp"]').val(data.no_hp);
		}
		set(url_1, nip, dt_set);
		$('.edit-data').show();
		$('.hapus-data').show();
		$('.add-data').hide();
		$('#my-modal').modal({
			keyboard: false,
			backdrop: 'static',
		});
	}

	$('#cari').on('search', function(){
		getData($('#cari').val());
	});

	function getData(q) {
		$.ajax({
			type: "GET",
			cache: false,  
			url: "<?= base_url('operator/dosen/get_data')?>",
			data: {
				q: q
			},
			success: function (data) {
				$('.row-projects').html(data);
				$('.row-projects').removeClass('is-loading')

			}
		});
	}
	

	$('.tambah').click(function (e) {

		$('.add-data').show();
		$('.hapus-data').hide();
		$('.edit-data').hide();
		$('.txt').val(null);
		url = "<?php echo base_url('operator/dosen/add')?>";
		$('#my-modal').modal({
			keyboard: false,
			backdrop: 'static',
		});
	});


	$('.hapus-data').click( async function (e) {

		var url2 = "<?php echo base_url('operator/dosen/delete')?>";
		id =$('#my-modal [name="id"]').val();
		$('#my-modal').modal('hide');
		
		await hapus(url2, id);
		getData();
		
	});

	$('#myform').on('submit',  function(e){  
        e.preventDefault();
     
		var data ={
				origin_nip: $('#my-modal [name="id"]').val(),
				nip: $('#my-modal [name="nip"]').val(),
				nama: $('#my-modal [name="nama"]').val(),
				no_hp: $('#my-modal [name="no_hp"]').val(),
			};
		post(url, data);
		 getData();
		$('#my-modal').modal('hide');
        $('#myform').trigger("reset");                             
            
    }); 

</script>

</body>

</html>
