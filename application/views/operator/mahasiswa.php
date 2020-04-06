<div class="main-panel">
  <div class="content">
    <div class="page-inner" style="margin-top: 60px;">
      
      <div class="row">
        <div class="col-md-12">
          <div class="tab-content" id="v-pills-without-border-tabContent">
            <!-- tab-home -->
            <div class="tab-pane fade show " id="v-pills-home-nobd" role="tabpanel" aria-labelledby="v-pills-home-tab-nobd">
              <div class="card">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                    <h4 class="card-title">Jadwal Perkuliahan</h4>
                    <div class="ml-auto d-flex flex-row">
                      <button class="btn btn-success btn-round btn-sm mr-3" data-toggle="collapse" data-target="#filter" aria-expanded="false" aria-controls="collapseExample">
                        <i class="icon-eyeglass"></i>
                        Filter
                      </button>
                      <button class="btn btn-secondary btn-round btn-sm mr-3 tambah">
                        <i class="icon-note"></i>
                        Tambah Data
                      </button>
                    </div>
                  </div>
                </div>
                <div class="collapse" id="filter">
                  <div class="card card-body">
                    <div class="row">
                      
                      <div class="form-group  col-md-3 col-12 mr-2">
                        <label>Kelas</label>
                        <select class="form-control fill" id="kelas">
                          <?=op_kelas();?>
                          
                        </select>
                      </div>	
                      <div class="form-group  col-md-3 col-12 mr-2">
                        <label>Semester</label>
                          <select class="form-control fill" id="angkatan">
                          <?=op_semester();?>
                        </select>
                      </div>
                      <div class="col-md-2" style="margin-top:40px;">
                        <button type="reset" id="tampil" class="btn btn-primary btn-sm " style="height:40px;" ><span class="btn-label"><i class="fas fa-undo-alt"></i></span> Reset</button>
                      </div>
                      
                    </div>	
                  </div>
                </div>
                <div class="card-body">
                  
                    <table id="data-tb" class="display table table-striped table-hover "style="width:100%;">
                      <thead>
                        <tr>
                          <th>nim</th>
                          <th>No</th>
                          <th>Nim</th>
                          <th>Nama</th>
                          <th>Prodi</th>
                          <th>Kelas</th>
                          <th>Status</th>
                          <th>Detail</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>nim</th>
                          <th>No</th>
                          <th>Nim</th>
                          <th>Nama</th>
                          <th>Prodi</th>
                          <th>Kelas</th>
                          <th>Status</th>
                          <th>Detail</th>
                        </tr>
                      </tfoot>
                      
                    </table>
                  
                </div>
              </div>
            </div>

              <!-- tab-detail -->
            <div class="tab-pane fade show active " id="v-pills-detail-nobd" role="tabpanel" aria-labelledby="v-pills-home-tab-nobd">
              <div class="card">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                      <button class="btn btn-info btn-icon btn-round btn-sm mr-3 tggl">
                        <i class="fas fa-arrow-left"></i>
                      </button>
                    <h4 class="card-title flex-1" style="margin-left: -32px;"><center>Detail</center> </h4>
                  </div>
                </div>
              </div>

              <div class="col-md-4" style="margin: auto;">
                <div class="card card-profile">
                  <div class="card-header" style="background-image: url('<?=base_url()?>assets/img/blogpost.jpg');
                  padding: 10px !important;">
                    <button tabindex="0" class="pull-right btn btn-light btn-icon btn-round btn-sm mr-3 action">
                        <i class="icon-options-vertical"></i>
                    </button>
                    <div class="profile-picture">
                      <div class="avatar avatar-xl">
                        <img src="<?=base_url()?>assets/img/profile.jpg" alt="" class="avatar-img rounded-circle" style="border: 2px solid white !important;">
                        <span  data-toggle="tooltip" data-placement="right" title="Aktif" style="cursor: pointer; position: absolute; bottom: -5px; right: -1px;"><?= sts("Aktif");?></span>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="user-profile text-center">
                      <div class="name">Bonaventura P Jemi, 21</div>
                      <div class="job">1623734335</div>
                      <div class="desc">Kelas A</div>
              
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="row user-stats text-center">
                      <div class="col">
                        <div class="title">Program Studi</div>
                        <div class="title" style ="font-weight: bold;">Teknik Instalasi Listrik</div>
                      </div>
                      <div class="col">
                        <div class="title">Dosen PA</div>
                        <div class="title"style ="font-weight: bold;" >Pembimbing Akademik</div>
                      </div>
                    </div>
                   
                  </div>
                </div>
              </div>

            </div>


            <!-- end tab detail -->
          </div>

          <!-- end tab -->
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal add -->
<div class="modal fade" id="my-modal"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="flaticon-cross"></i></span>
				</button>
			</div>
			<div class="modal-body">
        <form class="row">
          <div class="form-group col-12 ">
            <label>Matakuliah</label>
            <select name="matakuliah" class="form-control myselect" style="width:100%;">
              <option value="" selected disabled >Pilih Matakuliah</option>
              <?php foreach ($mk as $key) :?>  
                <option value="<?=$key->kodemk?>"><?=$key->namamk?></option>   
              <?php endforeach;?>
            </select>
           
            
          </div>
          <div class="form-group col-12">
            <label>Pengajar</label>
            <select name="dosen" class="form-control myselect" style="width:100%;">
              <option value="" selected disabled >Dosen Pegajar</option>
              <?php foreach ($dosen as $key) :?>  
                <option value="<?=$key->nip?>"><?=$key->nama?></option>   
              <?php endforeach;?>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label>Semester</label>
            <select name="semeseter" class="form-control myselect" style="width:100%;">
                <?=op_semester();?>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label>Kelas</label>
            <select name="kelas"  class="form-control myselect" style="width:100%;">
              
                <?=op_kelas();?>
             
            </select>
          </div>
          <div class="form-group col-12">
            <label>Hari</label>
            <select name="hari" class="form-control myselect" style="width:100%;">
              <option value="" selected disabled>Pilih Hari</option>
              <option value="Senin"> Hari Senin </option>
              <option value="Selasa"> Hari Selasa </option>
              <option value="Rabu"> Hari Rabu </option>
              <option value="Kamis"> Hari Kamis </option>
              <option value="Jumad"> Hari Jumad </option>
            </select>
          </div><div class="form-group col-md-6">
            <label>Jam Mulai</label>
            <input type="text" class="form-control jam"  name="mulai" placeholder="Mulai Jam ?">
          </div><div class="form-group col-md-6">
            <label >Jam Selesai</label>
            <input type="text" class="form-control jam"  name="selesai" placeholder="Sampai Jam ?" >
          </div><div class="form-group col-12">
            <label>Ruangan</label>
            <select name="ruangan" class="form-control myselect" style="width:100%;">
              <option value="" selected disabled>Pilih Ruangan</option>
              <?php foreach ($ruang as $key) :?>  
                <option value="<?=$key->id_ruangan?>"><?=$key->nama_ruangan?></option>   
              <?php endforeach;?>
            </select>
          </div>
        </form>
			</div>
			<div class="modal-footer">
        <button  class="btn btn-primary btn-border btn-round" data-dismiss="modal">batal</button>
        <button  type="submit" class="btn btn-primary btn-round add-data">Simpan</button>
        <button  type="submit" class="btn btn-success btn-round edit-data">Edit</button>
			</div>
		</div>
	</div>
</div>


<?php $this->load->view('include/script');?>


<script>
  $(document).ready(function () {
//===============plugin init==================
    $('.myselect').select2({
			theme: "bootstrap"
		});

    $('.jam').datetimepicker({
			format: 'h:mm', 
    });
    $('.action').popover({
      title:'Aksi',
      html:true,
      trigger: 'focus',
      placement:'bottom',
      content:'<button class="mr-2 btn btn-warning btn-sm cutikan">Cutikan</button>'+
              '<button class="btn btn-danger btn-sm">D O</button>',

    });
    $('.cutikan').click(function(){
      alert('baka');
    });


// ===============end int===============

// ==========get data===============
    var url="<?php echo site_url('operator/mahasiswa/get_data')?>";
    var dtfilter = (data) => {
      data.kelas = $('#kelas').val();
      data.semester = $('#angkatan').val();
  
    }
    table = get(url,dtfilter);
// ==================end get data===============

// =============filter data==================
    $('.fill').on('change',function(){ //button filter event click
      table.ajax.reload();
    });
    $('[type="reset"]').on('click',function(){ //button filter event click
      $('.fill').val("");
      
      table.get.ajax.reload();  //just reload table
    });
//============end filter=================

// ===========detail data============
$('tbody').on('click','.tggl', function () { 
    let data=table.row($(this).parents('tr')).data();
    $('.tab-pane').toggleClass('active');
    nim=data[0];
    $('.nama').html(`KHS : ${data[2]}, Semester ${data[3]}`);
    

});

$('.tggl').on('click', function () { 
      
    $('.tab-pane').toggleClass('active');
    
});
//==============end detail============

//==============add data===========================

    $('.tambah').click(function (e) { 
      $('.myselect , .jam').val(null).trigger('change');
      
      $('.add-data').show();
      $('.edit-data').hide();

      $('#my-modal').modal({
        keyboard: false,
        backdrop:'static',
       
      });


      // proses add
      $('.add-data').click(function (e) { 
        var url="<?php echo base_url('operator/jadwal/add')?>";
        alert("ini add");
        e.preventDefault();
        var data={
              jam_mulai :$('#my-modal [name="mulai"]').val(),
              jam_selesai :$('#my-modal [name="selesai"]').val(),
              kodemk :$('#my-modal [name="matakuliah"]').val(),
              hari:$('#my-modal [name="hari"]').val(),
              nip :$('#my-modal [name="dosen"]').val(),
              id_ruangan:$('#my-modal [name="ruangan"]').val(),
              semester :$('#my-modal [name="semeseter"]').val(),
              kelas :$('#my-modal [name="kelas"]').val(),
             };
       
        post(url,data);
        table.ajax.reload();
        $('#my-modal').modal('hide');
        
      });
    });


//=====end add=========== 

//================= edit=========

      // set data
    $('tbody').on('click','.edit', function () { 
      $('.add-data').hide();
      $('.edit-data').show();

      let data=table.row($(this).parents('tr')).data();
      let id=data[0];
      let url_1="<?php echo base_url('operator/jadwal/get_jadwalbyId')?>";
      var dt_set = function  (data){
          $('#my-modal [name="mulai"]').val(data.jam_mulai);
          $('#my-modal [name="selesai"]').val(data.jam_selesai);
          $('#my-modal [name="matakuliah"]').val(data.kodemk).trigger('change');
          $('#my-modal [name="hari"]').val(data.hari).trigger('change');
          $('#my-modal [name="dosen"]').val(data.nip).trigger('change');
          $('#my-modal [name="ruangan"]').val(data.id_ruangan).trigger('change');
          $('#my-modal [name="semeseter"]').val(data.semester).trigger('change');
          $('#my-modal [name="kelas"]').val(data.kelas).trigger('change');      
      }
      $('#my-modal').modal({
          keyboard: false,
          backdrop:'static',
      });
      set(url_1,id,dt_set);


      //proses edit
      $('.edit-data').click(function (e) { 
        var url="<?php echo base_url('operator/jadwal/update')?>";
        e.preventDefault();
        var data={
              id:id,
              jam_mulai :$('#my-modal [name="mulai"]').val(),
              jam_selesai :$('#my-modal [name="selesai"]').val(),
              kodemk :$('#my-modal [name="matakuliah"]').val(),
              hari:$('#my-modal [name="hari"]').val(),
              nip :$('#my-modal [name="dosen"]').val(),
              id_ruangan:$('#my-modal [name="ruangan"]').val(),
              semester :$('#my-modal [name="semeseter"]').val(),
              kelas :$('#my-modal [name="kelas"]').val(),
             };
       
        post(url,data);
        table.ajax.reload();
        $('#my-modal').modal('hide');

        
      });
    });

//============end edit================


//===============hapus data==============
    $('tbody').on('click','.hapus', function () {
      var url="<?php echo base_url('operator/jadwal/delete')?>"; 
      let data=table.row($(this).parents('tr')).data();
      id=data[0];
      hapus(url,id);
      table.ajax.reload();
     
    });
//=============end hapus================

  });
   


</script>
</body>
</html>