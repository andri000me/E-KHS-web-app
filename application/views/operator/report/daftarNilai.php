<!DOCTYPE html>
<html>
<head>
	<title>
		<?php echo $title;
			$no=1;
		 ?>
	</title>


	

	<style type="text/css">
		
		.judul{
			border: 0;
			border-style: inset;
			border-top: 1px solid #000;
		}
		.pd0{
			padding: 0px;
		}
		pre{
			margin-top: 0em !important;
  			
    		margin-bottom: -1em !important;
		}

		
		.gbr{
			width: 50px;
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
		h3{
			margin-block-start: 0em !important;
    		margin-block-end: 0em !important;
		}
		h6{
			margin-block-start: 0em !important;
    		margin-block-end: 0em !important;
		}
		h5{
			margin-block-start: 0em !important;
    		margin-block-end: 0em !important;
		}
		.bord{
			border-bottom: 1px;
			border-left: 0px;
			border-right: 0px;
			border-top: 0px;
			border-style: dotted;
		}
		.tb1 th{
			
			border-right: 0.5px;
			border-left: 0.5px;
			border-top: 2px;
			border-bottom: 2px;
			border-style: solid;
		}
		.tb12 th{
			
			border-right: 0.5px;
			border-left: 0.5px;
			border-top: 0.5px;
			border-bottom: 2px;
			border-style: solid;
		}
		.tb11 th{
			
			border-right: 0.5px;
			border-left: 0.5px;
			border-top: 2px;
			border-bottom: 0px;
			border-style: solid;
		}
		.tb2 td{
			border-bottom: 0px;
			
			border-right: 1px;
			border-top: 0px;
			border-left:  1px;
			border-style: solid;
		}
		.tb22 td{
			border-bottom: 1px;
			
			border-right: 1px;
			border-top: 0px;
			border-left:  1px;
			border-style: solid;
		}
		.tbn{
			border-bottom: 0px;
			border-top: 0px;
			border-left: 1px;
			border-right: 1px;
			border-style: solid;
		}
		
		
	</style>
</head>
<body id="print pdn">

	<div class="bor">
	<table  cellspacing="0px" width= "100%">
		<thead style="font-family: calibri;" >
			<tr class="tb12">
				<th width="20%" >
					<center>
						<img src="<?=base_url() ?>/assets/img/pnk.jpg" class="gbr" >
					</center>
				</th>
				<th width="50%" >
				<CENTER>
					<h6>DEPARTEMEN PENDIDIKAN NASIONAL</h6>
					<h5>POLITEKNIK NEGERI KUPANG</h4>
					<H3>DAFTER NILAI</H2>
				</CENTER>
				</th>
				<th class="pd0" width="30%" style="text-align: left; font-size: 12px;">
					<div style="width: 40%; float: left;" >
					&nbsp;Jurusan			<br>
					&nbsp;program Studi	
					</div>
					<div style="width: 60%; float: right;">
						: TEKNIK ELEKTRO<br>: <?php echo $mhs->prodi; ?>
					</div>
					<br><br><br>
					<center>JENJANG PENDIDIKAN <?php echo $mhs->jenjang; ?></center>
				</th>
			</tr>
		</thead>	
	</table>
	<table width="100%" class="tbn">
		<tbody style="font-weight: bold; font-family: calibri; font-size: 12px;" >
			
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><?php echo $mhs->nama; ?></td>
				<td>lahir Di</td>
				<td>:</td>
				<td> <?php echo $mhs->tempat_lahir; ?></td>
				
				
			</tr>
			<tr>
				<td>No. Register</td>
				<td>:</td>
				<td><?php echo $mhs->nim; ?></td>
				<td>Tanggal</td>
				<td>:</td>
				<td><?php echo $tgl_lahir; ?></td>
				
				
			</tr>
			<tr>
				<td>No. Ijazah</td>
				<td>:</td>
				<td></td>
			</tr>
		</tbody>
	</table>
	<table width="100%"  cellspacing="0"  >
		<thead style=" font-family: calibri; font-size: 12px;">
			<tr class="tb1">
				<th width="2%">NO</th>
				<th>KODE MK</th>
				<th>MATA KULIAH</th>
				<th width="7%">AM</th>
				<th width="5%">SKS</th>
				<th width="7%"colspan="2">N</th>
				<th width="8%">N x SKS</th>
				<th width="5%">SMST</th>	
			</tr>			
		</thead>
		<tbody style=" font-family: calibri; font-size: 11px;">
			<tr class="tb2">
				<td><div class="bord">&nbsp; </div></td>
				<td><div class="bord"> &nbsp;</div></td>
				<td><div class="bord"><b>I.&nbsp; Matakuliah Pengembangan Kepribadian (MPK)</b></div></td>
				<td><div class="bord"> &nbsp;</div></td>
				<td><div class="bord">&nbsp; </div></td>
				<td><div class="bord">&nbsp; </div></td>
				<td><div class="bord">&nbsp; </div></td>
				<td><div class="bord">&nbsp; </div></td>
				<td><div class="bord">&nbsp; </div></td>
			</tr>

			<?php foreach ($mpk as $key): ?>				
			<tr class="tb2">
				<td>
					<div class="bord"><?php echo $no; ?></div>
				</td>
				<td><div class="bord"><?php echo $key->kodemk; ?></div></td>
				<td><div class="bord"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $key->namamk; ?></div></td>
				<td align="center"><div class="bord"><?php echo $key->am; ?></div></td>
				<td align="center"><div class="bord"><?php echo $key->sks; ?></div></td>
				<td align="center"><div class="bord"><?php echo nilai_huruf($key->am); ?></div></td>
				<td align="center"><div class="bord"><?php echo hitung_nilai($key->am); ?></div></td>
				<td align="center"><div class="bord"><?php echo jnilai($key->am,$key->sks); ?></div></td>
				<td align="center"><div class="bord"><?php echo $key->semester; ?></div></td>
			</tr>
			<?php $no++; endforeach; ?>

			<!-- 2 -->
			<tr class="tb2">
				<td><div class="bord">&nbsp; </div></td>
				<td><div class="bord"> &nbsp;</div></td>
				<td><div class="bord"><b>II.&nbsp; Matakuliah Keilmuan Dan Keterampilan (MKK)</b></div></td>
				<td><div class="bord"> &nbsp;</div></td>
				<td><div class="bord">&nbsp; </div></td>
				<td><div class="bord">&nbsp; </div></td>
				<td><div class="bord">&nbsp; </div></td>
				<td><div class="bord">&nbsp; </div></td>
				<td><div class="bord">&nbsp; </div></td>
			</tr>

			<?php foreach ($mkk as $key): ?>				
			<tr class="tb2">
				<td>
					<div class="bord"><?php echo $no; ?></div>
				</td>
				<td><div class="bord"><?php echo $key->kodemk; ?></div></td>
				<td><div class="bord"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $key->namamk; ?></div></td>
				<td align="center"><div class="bord"><?php echo $key->am; ?></div></td>
				<td align="center"><div class="bord"><?php echo $key->sks; ?></div></td>
				<td align="center"><div class="bord"><?php echo nilai_huruf($key->am); ?></div></td>
				<td align="center"><div class="bord"><?php echo hitung_nilai($key->am); ?></div></td>
				<td align="center"><div class="bord"><?php echo jnilai($key->am,$key->sks); ?></div></td>
				<td align="center"><div class="bord"><?php echo $key->semester; ?></div></td>
			</tr>
			<?php $no++; endforeach; ?>


			<!-- 3 -->
			<tr class="tb2">
				<td><div class="bord">&nbsp; </div></td>
				<td><div class="bord"> &nbsp;</div></td>
				<td><div class="bord"><b>III.&nbsp; Matakuliah Keahlian Berkarya (MKB)</b></div></td>
				<td><div class="bord"> &nbsp;</div></td>
				<td><div class="bord">&nbsp; </div></td>
				<td><div class="bord">&nbsp; </div></td>
				<td><div class="bord">&nbsp; </div></td>
				<td><div class="bord">&nbsp; </div></td>
				<td><div class="bord">&nbsp; </div></td>
			</tr>

			<?php foreach ($mkb as $key): ?>				
			<tr class="tb2">
				<td>
					<div class="bord"><?php echo $no; ?></div>
				</td>
				<td><div class="bord"><?php echo $key->kodemk; ?></div></td>
				<td><div class="bord"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $key->namamk; ?></div></td>
				<td align="center"><div class="bord"><?php echo $key->am; ?></div></td>
				<td align="center"><div class="bord"><?php echo $key->sks; ?></div></td>
				<td align="center"><div class="bord"><?php echo nilai_huruf($key->am); ?></div></td>
				<td align="center"><div class="bord"><?php echo hitung_nilai($key->am); ?></div></td>
				<td align="center"><div class="bord"><?php echo jnilai($key->am,$key->sks); ?></div></td>
				<td align="center"><div class="bord"><?php echo $key->semester; ?></div></td>
			</tr>
			<?php $no++; endforeach; ?>

			<!-- 4 -->

			<tr class="tb2">
				<td><div class="bord">&nbsp; </div></td>
				<td><div class="bord"> &nbsp;</div></td>
				<td><div class="bord"><b>IV.&nbsp; Matakuliah Perilaku Berkarya (MPB)</b></div></td>
				<td><div class="bord"> &nbsp;</div></td>
				<td><div class="bord">&nbsp; </div></td>
				<td><div class="bord">&nbsp; </div></td>
				<td><div class="bord">&nbsp; </div></td>
				<td><div class="bord">&nbsp; </div></td>
				<td><div class="bord">&nbsp; </div></td>
			</tr>

			<?php foreach ($mpb as $key): ?>				
			<tr class="tb2">
				<td>
					<div class="bord"><?php echo $no; ?></div>
				</td>
				<td><div class="bord"><?php echo $key->kodemk; ?></div></td>
				<td><div class="bord"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $key->namamk; ?></div></td>
				<td align="center"><div class="bord"><?php echo $key->am; ?></div></td>
				<td align="center"><div class="bord"><?php echo $key->sks; ?></div></td>
				<td align="center"><div class="bord"><?php echo nilai_huruf($key->am); ?></div></td>
				<td align="center"><div class="bord"><?php echo hitung_nilai($key->am); ?></div></td>
				<td align="center"><div class="bord"><?php echo jnilai($key->am,$key->sks); ?></div></td>
				<td align="center"><div class="bord"><?php echo $key->semester; ?></div></td>
			</tr>
			<?php $no++; endforeach; ?>

			<!-- 5 -->
			<tr class="tb2">
				<td><div class="bord">&nbsp; </div></td>
				<td><div class="bord"> &nbsp;</div></td>
				<td><div class="bord"><b>V.&nbsp; Matakuliah Berkehidupan Bermasyarakat (MBB)</b></div></td>
				<td><div class="bord"> &nbsp;</div></td>
				<td><div class="bord">&nbsp; </div></td>
				<td><div class="bord">&nbsp; </div></td>
				<td><div class="bord">&nbsp; </div></td>
				<td><div class="bord">&nbsp; </div></td>
				<td><div class="bord">&nbsp; </div></td>
			</tr>

			<?php foreach ($mbb as $key): ?>				
			<tr class="tb2">
				<td>
					<div class="bord"><?php echo $no; ?></div>
				</td>
				<td><div class="bord"><?php echo $key->kodemk; ?></div></td>
				<td><div class="bord"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $key->namamk; ?></div></td>
				<td align="center"><div class="bord"><?php echo $key->am; ?></div></td>
				<td align="center"><div class="bord"><?php echo $key->sks; ?></div></td>
				<td align="center"><div class="bord"><?php echo nilai_huruf($key->am); ?></div></td>
				<td align="center"><div class="bord"><?php echo hitung_nilai($key->am); ?></div></td>
				<td align="center"><div class="bord"><?php echo jnilai($key->am,$key->sks); ?></div></td>
				<td align="center"><div class="bord"><?php echo $key->semester; ?></div></td>
			</tr>
			<?php $no++; endforeach ?>
			<tr class="tb2">
				<td> &nbsp;</td>
				<td> &nbsp;</td>
				<td> &nbsp;</td>
				<td> &nbsp;</td>
				<td> &nbsp;</td>
				<td> &nbsp;</td>
				<td> &nbsp;</td>
				<td> &nbsp;</td>
				<td> &nbsp;</td>
			</tr>
		</tbody>
		<tfoot style=" font-family: calibri; font-size: 12px;">
			<tr class="tb11">
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th><?php echo $tot->jumsks; ?></th>
				<th colspan="4"><?php echo jnilai($tot->nilai,$tot->jumsks); ?></th>
			</tr>
			<tr class="tb11">
				
				<th colspan="4"> INDEX PRESTASI KOMULATIF</th>
				<th colspan="3">PREDIKAT</th>
				<th colspan="2">TANGGAL LULUS</th>
			</tr>
			<tr class="tb11">
				
				<th colspan="4" style="text-align: left !important;"> 

						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S(NxSKS) &nbsp; &nbsp;  &nbsp;<?php echo jnilai($tot->nilai,$tot->jumsks); ?><br>
							IPK=------------- = ------- =&nbsp;&nbsp;&nbsp;<?php echo $ipk; ?><br>

								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S SKS&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; <?php echo $tot->jumsks; ?>
				</th>
				<th colspan="3" ><?php echo $predikat; ?></th>
				<th colspan="2">_________ 20</th>
			</tr>
			<tr class="tb11">
				<th colspan="9" style="text-align: left !important;">
					<br>
				&nbsp;&nbsp;&nbsp;JUDUL TUGAS AKHIR :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $judul; ?>
					<br>&nbsp;
				</th>
				
			</tr>
		</tfoot>
	</table>
	</div>
	<table width= "100%" style=" font-family: calibri; font-size: 12px;" >
					<tr>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
					</tr>
					<tr>
						
						<td style="padding-left: 30px" width ="60%">
							Mengetahui<br>
							Pemb.Dir.Bid.Akademik <br>
							<br>
							<br>
							<u> <?php echo $pudir->nama; ?></u><br>
							Nip. <?php echo $pudir->nip; ?>
						</td>
					
						<td style="padding-left: 100px">
							Kupang,<?php echo $tgl; ?> <br>
							Ketua Jurusan Teknik Elektro,  <br>
							<br>
							<br>
							<u> <?php echo $kajur->nama; ?></u><br>
							Nip. <?php echo $kajur->nip; ?>
						</td>
					
					</tr>
	</table>
	<table width="100%"  cellspacing="0" style=" font-family: calibri; font-size: 12px;" >
		<thead>
			<tr class="tb1">
				
				<th>SKALA NILAI</th>
				<th>ARTI SINGKATAN</th>
				
			</tr>		
		</thead>
		<tbody>
			<tr class="tb22">
				<td>
					<pre style="font-family: calibri;">
							00 - 34  = E  	=	0,0	(Gagal)
							35 - 45  = D  	=	1,0	(Sangat Kurang)
							46 - 55  = CD	=	1,5	(Kurang)
							56 - 64  = C  	=	2,0	(Cukup)
							65 - 69  = BC 	=	2,5	(Cukup Baik)
							70 - 74  = B  	=	3,0	(Baik)
							75 - 79  = AB 	=	3,5	(Memuaskan)
							80 - 100 = A  	=	4,0	(Sangat Memuaskan)
					</pre>
				</td>
				<td> 
					<div style="width: 20%; float: left;" >
					AM<br>
					SKS<br>
					N<br>
					SMT<br>
					IPK	
					</div>
					<div style="width: 80%; float: right;">
						: Angka Mutu<br>
						: Satuan Kredit Semester<br>
						: Nilai<br>
						: Semester<br>
						: Indeks Prestasi Komulatif<br>
					</div>
				</td>
				
			</tr>
		</tbody>
	</table>
	<div   style="font-family: calibri; margin-left: 50px;" >
		<i>Keterangan :</i><br>
		Lembaran Daftar Nilai Ini Merupakan Lampiran Dari Ijazah
	</div>

<script type="text/javascript">
	window.print();
</script>
</body>
</html>