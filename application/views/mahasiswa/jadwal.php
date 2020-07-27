














      <div class="page-wrapper mdc-toolbar-fixed-adjust" style="">
        <center>
        <main class="content-wrapper" >
	        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
		        <div class="mdc-card p-0">
		          <h6 class="card-title card-padding pb-0">Jadwal Semester: <?=$Semester?></h6>
		          <div class="table-responsive">
		            <table class="table table-striped">
		              <thead>
		                <tr>
		                  <th class="text-left">No</th>
		                  <th>Hari</th>
		                  <th>Matakuliah</th>
		                  <th>Jam</th>
		                  <th>Dosen</th>
		                </tr>
		              </thead>
		              <tbody>
		              	<?php $no=1; foreach ($all as $key): ?>
		              		
		                <tr>
		                  <td class="text-left"><?=$no;?></td>
		                  <td><?=$key->hari;?></td>
		                  <td><?=$key->namamk;?></td>
		                  <td><?=$key->jam_mulai;?> - <?=$key->jam_selesai;?></td>
		                  <td><?=$key->nama;?></td>
		                </tr>
		              	<?php $no++; endforeach ?>
		                
		               
		              </tbody>
		            </table>
		          </div>
		        </div>
		    </div>
        </main>
        </center>
        <!-- partial:partials/_footer.html -->
        
        <!-- partial -->
      </div>
   