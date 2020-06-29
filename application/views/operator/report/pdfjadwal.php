<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa <?php echo $judul; ?></title>
</head>
<style type="text/css">
	
	.gbr{
			width: 100px;
			height: auto;
		}
	th{
			text-align: center;
		}
	.judul{
			
			border-style: solid;
			border-top: 2px solid #000;
		}

	h4{
			margin-block-start: 0em !important;
    		margin-block-end: 0em !important;
		}
	h3{
			margin-block-start: 0em !important;
    		margin-block-end: 0em !important;
		}


</style>
<body>

<table width="100%">
	<thead>
			<tr>
				<th width="20%" >
					<center>
						<img src="<?=base_url()?>/assets/img/pnk.jpg" class="gbr" >
					</center>
				</th>
				<th width="80%" >
				<CENTER>
					<b>
						<h3>Politeknik Negeri Kupang</h3>
						<h3>Jurusan Teknik Elektro</h3>
						<h4>Jadwal Perkuliahan <?php echo $judul; ?></h4>
					</b>
				</CENTER>
			</th>
			</tr>
		</thead>
		</table>
		<table width="100%">
		<tbody>
			<tr >
				<td class="judul"></td>
				
			</tr>
		</tbody>
		</table>

<br>
<br>
<br>

<table border="1" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>No</th>
			<th>Hari</th>
			<th>Kode MK</th>
			<th>Nama MK</th>
			<th>Jam Mulai</th>
			<th>Jam Selesai</th>
			<th>Pengajar</th>
			<th>Ruangan</th>

			
		</tr>
	</thead>
	<tbody>

  <?php $no=1; $jum = 1; foreach($all as $row): ?>
	  <tr >
	  	<?php if($jum <= 1)
	  	 { 
	  	 	echo '<td align="center" rowspan="'.$row->jum.'">'.$no.'</td>'; $no++;
	  		echo '<td rowspan="'.$row->jum.'">'.$row->hari.' </td>';  
        	$jum = $row->jum;
        	
       	 }
       	 else 
       	 {
        	$jum = $jum - 1;
    	 }
	  	?>
	  	
	    <td style="text-align: center;"><?php echo $row->kodemk; ?></td>
	    <td style="text-align: left;"><?php echo $row->namamk; ?></td>
	    
	    <td style="text-align: left;"><?php echo $row->jam_mulai; ?></td>
	    <td style="text-align: left;"><?php echo $row->jam_selesai; ?></td>
	    <td style="text-align: left;"><?php echo $row->nama; ?></td>
	    <td style="text-align: left;"><?php echo $row->nama_ruangan; ?></td>
	    
	  <?php endforeach; ?>
  </tbody>
</table>
<br><br><br>
<table width= "100%">
				<tr>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
				</tr>
				<tr>
					
					<td width="70%">
					</td>
				
					<td width="30%">
						Kupang,<?php echo $tgl; ?> <br>
						Ketua Jurusan Teknik Elektro,  <br>
						<br>
						<br>
						<u> <?php echo $kajur->nama; ?></u><br>
						Nip. <?php echo $kajur->nip; ?>
					</td>
				
				</tr>
</table>

<script type="text/javascript">
		
		window.print();
	</script>

</body>
</html>