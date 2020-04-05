<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">DataTables.Net</h4>
        <ul class="breadcrumbs">
          <li class="nav-home">
            <a href="#">
              <i class="flaticon-home"></i>
            </a>
          </li>
          <li class="separator">
            <i class="flaticon-right-arrow"></i>
          </li>
          <li class="nav-item">
            <a href="#">Tables</a>
          </li>
          <li class="separator">
            <i class="flaticon-right-arrow"></i>
          </li>
          <li class="nav-item">
            <a href="#">Datatables</a>
          </li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">

          <div class="tab-content" id="v-pills-without-border-tabContent">
            <!-- tab-home -->
            <div class="tab-pane fade show active" id="v-pills-home-nobd" role="tabpanel" aria-labelledby="v-pills-home-tab-nobd">
              <div class="card">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                    <h4 class="card-title">KHS</h4>
                    <div class="ml-auto">
                      <button class="btn btn-success btn-round mr-3" data-toggle="collapse" data-target="#filter" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fas fa-filter"></i>
                        Filter
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
                          <select class="form-control fill" id="semester">
                            <?=op_semester();?>
                        </select>
                      </div>
                      <div class="form-group col-md-3 col-12 mr-2">
                        <label>Angkatan</label>
                        <input type="text" placeholder="Pilh Angkatan" class="form-control fill" id="angkatan" name="angkatan">
                      </div>
                      <div class="col-md-2" style="margin-top:40px;">
                        <button type="reset" id="tampil" class="btn btn-primary btn-sm " style="height:40px;" ><span class="btn-label"><i class="fas fa-undo-alt"></i></span> Reset</button>
                      </div>
                      
                    </div>	
                  </div>
                </div>
                <div class="card-body">
                  
                    <table id="tb-khs" class="display table table-striped table-hover "style="width:100%;">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nim</th>
                          <th>Nama</th>
                          <th>Semester</th>
                          <th>IP</th>
                          <th>Status Verivikasi</th>
                          <th>aksi</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>Nim</th>
                          <th>Nama</th>
                          <th>Semester</th>
                          <th>IP</th>
                          <th>Status Verivikasi</th>
                          <th>aksi</th>
                        </tr>
                      </tfoot>
                      
                    </table>
                  
                  </div>
              </div>
            </div>

            <!-- tab-detail -->
            <div class="tab-pane fade show  " id="v-pills-detail-nobd" role="tabpanel" aria-labelledby="v-pills-home-tab-nobd">
              <div class="card">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                      <button class="btn btn-info btn-icon btn-round btn-sm mr-3 tggl">
                        <i class="fas fa-arrow-left"></i>
                  
                      </button>
                    
                    <h4 class="card-title nama"></h4>
                  </div>
                </div>
              
                <div class="card-body">
                  
                    <table id="tb-khs-detail" class="display table table-striped table-hover "style="width:100%;">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Kode Matakuliah</th>
                          <th>Nama Matakuliah</th>
                          <th>Angka Mutu</th>
                          <th>Nilai</th>
                          <th>SKS</th>
                        </tr>
                      </thead>
                     
                      
                    </table>
                  
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
<?php $this->load->view('include/script');?>


<script>
  $(document).ready(function () {
    var nim,semester;
    
    
    var detailkhs;
    table = $('#tb-khs').DataTable({
      "scrollX":true,
      "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
      }, 

        "processing": true,  
        "deferRender":true,
        "ajax": {
            "url": "<?php echo site_url('operator/khs/data_khs')?>",
            "type": "POST",  
            "data": function ( data ) {
              data.kelas = $('#kelas').val();
              data.semester = $('#semester').val();
              data.angkatan = $('#angkatan').val();
              },
        },
    });

    detailkhs=$('#tb-khs-detail').DataTable({
      "scrollX":true,
      "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
      }, 

        "processing": true,  
        "deferRender":true,
        "ajax": {
            "url": "<?php echo site_url('operator/khs/get_khs')?>",
            "type": "GET",  
            "data": function ( data ) {
              data.nim = nim;
              data.semester =semester;
             
              },
        },
    });

        //datatables
    $('.fill, #angkatan').on('change',function(){ //button filter event click
      table.ajax.reload();  //just reload table
    });
    $('[type="reset"]').on('click',function(){ //button filter event click
      $('.fill').val("");
      
      table.ajax.reload();  //just reload table
    });
    $('#angkatan').datetimepicker({
        format: 'YYYY',
        viewMode:'years'
       
		}).on('dp.change',function () {
      table.ajax.reload();
    });

    $('.tggl').on('click', function () { 
      
      $('.tab-pane').toggleClass('active');
    
    });

    $('tbody').on('click','.tggl', function () { 
      let data=table.row($(this).parents('tr')).data();
      $('.tab-pane').toggleClass('active');
      nim=data[1];
      semester = data[3];
      $('.nama').html(`KHS : ${data[2]}, Semester ${data[3]}`);
      detailkhs.ajax.reload();

    });

    $('tbody').on('click','.print', function () { 
      let data=table.row($(this).parents('tr')).data();
      
      nim=data[1];
      semester = data[3];
      
    });
      
    });


   


</script>
</body>
</html>