<div class="main-panel" style="height: 100%; overflow-y: scroll;">
	<div class="content">
		<div class="page-inner" style="margin-top: 60px;">

			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Elemen Kompetensi</h4>
							
							</div>
						</div>
						<div class="card-body">

							<table id="data-tb" class="display table table-striped table-hover" cellspacing="0" style="width:100%;">
								<thead>
									<tr>
										<th>id</th>
										<th>No</th>
										<th>Kode</th>
										<th>Nama</th>
										
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>id</th>
										<th>No</th>
										<th>Kode</th>
										<th>Nama</th>
										
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

<?php $this->load->view('include/script');?>


<script>
	$(document).ready(function () {

		// ==========get data===============
		var url = "<?php echo site_url('kajur/elemen_mk/get_data')?>";
		
		table = get(url, null);
		// ==================end get data===============


		

	});

</script>
</body>

</html>
