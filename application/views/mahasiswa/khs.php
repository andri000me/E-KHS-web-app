
      <div class="page-wrapper mdc-toolbar-fixed-adjust" style="">
        <center>
        <main class="content-wrapper" >
        	<div class="owl-carousel owl-theme">
				   
				<?php foreach ($semester as $key ): ?>
					<div data-dot="I" class="item">
					  	<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
					        <div class="mdc-card p-0">
					          <h6 class="card-title card-padding pb-0">Semester <?=$key->semester?></h6>
					          <div class="table-responsive">
					            <table class="table table-striped">
					              <thead>
					                <tr class="text-center">
					                   <th class="text-center">No</th>
					                   <th class="text-center">Kode Matakuliah</th>
					                   <th class="text-center">Matakuliah</th>
					                   <th class="text-center">SKS</th>
					                   <th class="text-center">Am</th>
					                   <th class="text-center">Nilai</th>
					                   <th class="text-center">Predikat</th>
					                </tr>
					              </thead>
					              <tbody>
					              
					              	<?php $no=1; foreach ($this->M_khs->get_khs($key->semester,$this->session->userdata('username')) as $row ): ?>
					              
					                <tr>
					                  <td class="text-center"><?=$no;?></td>
					                  <td class="text-center"><?=$row->kodemk;?></td>
					                  <td class="text-center"><?=$row->namamk;?></td>
					                  <td class="text-center"><?=$row->sks;?></td>
					                  <td class="text-center"><?=$row->am;?></td>
					                  <td class="text-center"><?=hitung_nilai($row->am);?></td>
					                  <td class="text-center"><?=nilai_huruf($row->am);?></td>
					                </tr>
					                <?php $no++; endforeach ?>
					                          
					               
					              </tbody>
					            </table>
					          </div>
					        </div>
					    </div>
					</div>
				<?php endforeach ?>
				
				
			  

			</div>
	        
        </main>
        </center>
        <!-- partial:partials/_footer.html -->
        
        <!-- partial -->
      </div>
   