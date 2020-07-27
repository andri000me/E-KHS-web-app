<div class="main-panel" style="height: 100%; overflow-y: scroll;">
	<div class="content">
		<div class="page-inner" style="margin-top: 60px;">

			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Matakuliah</h4>
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


<?php $this->load->view('include/script');?>


<script>
	$(document).ready(function () {
		var url1 = "<?php echo site_url('operator/matakuliah/get_data')?>";
		table = get(url1, null);
	});

</script>
</body>

</html>
