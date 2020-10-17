<!DOCTYPE html>
<html>
<head>
	<title>
		<?php echo $title; ?>
		
	</title>


	

	<style type="text/css">
		.judul{
			border: 0;
			border-style: inset;
			border-top: 1px solid #000;
		}

		
		.gbr{
			width: 80px;
			height: auto;
		}
		.bor{
			border: 2px solid black;
		}
		th{
			text-align: center;
		}
		b{
			font-style: bold;
		}
		.tb12 th{
			
			border-right: 0.5px;
			border-left: 0.5px;
			border-top: 0.5px;
			border-bottom: 2px;
			border-style: solid;
		}
		h2{
			margin-block-start: 0em !important;
    		margin-block-end: 0em !important;
		}
	</style>
</head>
<body style="font-family: calibri;">

	<div class="bor">
	<table width= "100%" cellspacing="0">
		<thead>
			<tr class="tb12">
				<th width="20%" >
					<center>
						<img src="<?=base_url() ?>/assets/img/pnk.jpg" class="gbr" >
					</center>
				</th>
				<th width="80%" >
				<CENTER>
				<h2>KARTU HASIL STUDI (KHS)</h2>
				<h2>MAHASISWA</h2>
				SEMESTER <?php echo $tsem; ?> T.A <?php echo $takd;?>/<?php echo $takd+1;?><br>
				JURUSAN TEKNIK ELEKTRO
				</CENTER>
			</th>
			</tr>
		</thead>
		<tbody>
			<tr >
				<td colspan="2" class="judul"></td>
				
			</tr>
			
			<tr>
				<td>
					<b>
					Nama          <br>
					NIM           <br>
					Semester/Kelas<br>
					Program studi </b>
				</td>
				<?php foreach ($mhs as $key) {?>
				<td><b>
					: <?php echo ucwords(strtolower($key->nama)); ?><br>
					: <?php echo $key->nim; ?><br>
					: <?php echo $smt; ?>/<?php echo $key->kelas; ?><br>
					: <?php echo $key->prodi; ?></b>
				</td>
			<?php }?>
			</tr>
			<tr>
			</tr>
		</tbody>
	</table>
				<table border="1" cellspacing="0" width= "100%">
					<thead>
						<tr>	
							<th>NO</th>
							<th>KODE MK</th>
							<th>NAMA MATA KULIAH </th>
							<th>AM</th>
							<th>SKS</th>
							<th>N</th>
							<th>N x SKS</th>
							<th>NILAI KUARANG</th>
						</tr>
					</thead>
					<tbody>
								
								<?php $jsks=0;$jnsks=0; $no=1;  foreach ($all as $row): ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $row->kodemk; ?></td>
									<td><?php echo $row->namamk; ?></td>
									<td><center><?php echo $row->am; ?></center></td>
									<td><center><?php echo $row->sks; ?></center></td>
									<td><center><?php echo hitung_nilai($row->am); ?></center></td>
									<td><center><?php echo jnilai($row->am,$row->sks) ?></center></td>
									<td><center><?php echo "0"; ?></center></td>
									<?php 
										$jsks += $row->sks;
										$jnsks +=(float)jnilai($row->am,$row->sks);
									?>
								</tr>
								<?php endforeach; ?>
								
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td><center><?=$jsks  ?></center></td>
									<td></td>
									<td><center><?=$jnsks  ?></center></td>
									<td></td>
								</tr>

							
				</table>
				<br>
				<br>
				<table width= "100%">
					<tr>
						<td><center>
								NxSKS<br>
							IP=--------=<?php echo $ip; ?><br>

								 SKS</center>
						</td>
						<td>
							<center>
								IPK =<?php echo $ipk; ?>
							</center>
						</td>
					</tr>
				</table>
				<br>
				<br>
				<table width= "100%">
					<tr>
						<td bgcolor="silver"><center><h2>Status : <?php echo $status; ?></h2> </center></td>
					</tr>
				</table>
				<br>

				<table width= "100%">
					<tr>
						<td style="padding-left: 30px">
								Data Kehadiran Mahasiswa:<br>
							<?php foreach ($abs as $key ) { ?>
							Alpa = <?php echo $key->alpa; ?> jam<br>
							sakit= <?php echo $key->sakit; ?> jam<br>
							Ijin = <?php echo $key->ijin; ?> jam
							<?php } ?>
							
						</td>
						<td>
						<pre style="font-family: calibri; line-height:10px;">
							Skala Nilai (N):<br>
							00 - 39,99  = E	=0,0<br>
							40 - 54,99  = D	=1,0<br>
							55 - 59,99  = CD	=1,5<br>
							60 - 64,99  = C	=2,0<br>
							65 - 69,99  = BC	=2,5<br>
							70 - 74,99  = B	=3,0<br>
							75 - 79,99  = AB	=3,5<br>
							80 -   100  = A	=4,0
						</pre>
						</td>
					</tr>
				</table>
				<table width= "100%" style="border-top: 2px solid black;">
					<tr >
						<td colspan="2">
							<center>Arti Singkatan:</center>
						</td>
						
					</tr>
					<tr>
						<td style="padding-left: 30px">
							AM = Angka Mutu<br>
							SKS = Satuan Kredit Semester<br>
							N = Nilai
						</td>
						<td>
							SMT = Semester<br>
							IP = Indeks Prestasi<br>
							IPK = Indeks Prestasi Komulatif
						</td>
					</tr>
				</table>
				<table width= "100%" style="border-top: 2px solid black; padding:30px;">
					<tr>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<?php 
						foreach ($kajur as $row) {?>
							<td>
							<br>
								Ketua Jurusan,  <br>
								<br>
								<br>
								<u> <?php echo $row->nama; ?></u><br>
								Nip. <?php echo $row->nip; ?>
							</td>
						<?php } ?>
						<td style="padding-left: 200px">
							Kupang,<?php echo $tgl; ?> <br>
							Ketua Prodi <?=$prodi->prodi ?> <br>
							<br>
							<br>
							<u> <?php echo $prodi->nama ?></u><br>
							Nip. <?php echo $prodi->kepro; ?>
						</td>
					</tr>
					<tr>
					<?php foreach ($pudir as $row) {?>
						<td colspan='2' style="text-align:center">
							Mengetahui,</br>Pembantu Dir. Bid. Akademik
							<br>
							<br>
							<br>
							<b><?php echo $row->nama; ?></br>NIP:<?php echo $row->nip; ?></b>
						</td>
					<?php }?>
					</tr>
				</table>


				

	</div>
	

</body>
<script type="text/javascript">
	window.print();
</script>
</html>