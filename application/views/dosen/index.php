<div class="main-panel scr">
	<div class="content ">
		<div class="panel-header bg-primary-gradient " style="margin-top: 60px;">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>
						<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
						<h5 class="text-white op-7 mb-2">Aplikasi KHS Jurusan Elektro</h5>
					</div>
					<div class="ml-md-auto py-2 py-md-0">
						
					</div>
				</div>
			</div>
		</div>
		<div class="page-inner mt--5">
			<div class="row">
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body ">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-primary bubble-shadow-small">
										<i class="flaticon-users"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Mahasiswa</p>
										<h4 class="card-title"><?= $mhs ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-info bubble-shadow-small">
										<i class="flaticon-diagram"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Prodi</p>
										<h4 class="card-title"><?= $prodi ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-success bubble-shadow-small">
										<i class="flaticon-profile-1"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Dosen</p>
										<h4 class="card-title"><?= $dsn ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-secondary bubble-shadow-small">
										<i class="flaticon-interface-2"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Matakuliah</p>
										<h4 class="card-title"><?= $mk ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="card">
						<div class="card-header">
							<div class="card-head-row">
								<div class="card-title">Grafik Jumlah Mahasiswa</div>
						
							</div>
						</div>
						<div class="card-body">
							<div class="chart-container" style="min-height: 375px">
								<canvas id="jumlamhs"></canvas>
							</div>
							<div id="myChartLegend"></div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
						<div class="card-header">
							<div class="card-title">Prodi</div>
						</div>
						<div class="card-body pb-0">
							<?php
							$bgc=['#f3545d','#fdaf4b','#1d7af3','#28a745','#6610f2','#f3545d','#fdaf4b','#1d7af3'];
							$i=0;
							foreach ($dt as $key) :?>
							<div class="d-flex align-items-center">
								<div class="avatar " style="width: 1.5rem; height: 1.5rem; border-radius: 50%; background-color : <?=$bgc[$i++]?>;">
									
								</div>
								<div class="flex-1 pt-1 ml-2">
									<h6 class="fw-bold mb-1"><?=$key->prodi ?></h6>
									<small class="text-muted"><?=$key->nama ?></small>
								</div>
								<div class="d-flex ml-auto align-items-center">
									<h3 class="text-info fw-bold"><?=$key->jenjang?></h3>
								</div>
							</div>
							<div class="separator-dashed"></div>
						<?php endforeach ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('include/script'); ?>
<script type="text/javascript">
let data=<?=json_encode($jumlah)?>;
let labels=<?=json_encode($prod)?>;
var doughnutChart = document.getElementById('jumlamhs').getContext('2d');

var myDoughnutChart = new Chart(doughnutChart, {
	type: 'doughnut',
	data: {
		datasets: [{
			data: data,
			backgroundColor: ['#f3545d','#fdaf4b','#1d7af3','#28a745','#6610f2','#f3545d','#fdaf4b','#1d7af3']
		}],

		labels:labels
	},
	options: {
		responsive: true,
		maintainAspectRatio: false,
		legend : {
			display:false,
			position: 'bottom'
		},
		layout: {
			padding: {
				left: 20,
				right: 20,
				top: 20,
				bottom: 20
			}
		}
	}
});

	console.log(myDoughnutChart.data.datasets[0].backgroundColor);

</script>