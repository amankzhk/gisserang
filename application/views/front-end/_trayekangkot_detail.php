
      <div class="col-sm-8 content">
	
        <div class="panel">
          <!-- <div class="panel-heading">
            <h3 class="panel-title">trayekangkot</h3>
          </div> -->
          <div class="panel-body" style="padding:0;">
            <div class="detailtrayek">
                <h2 style="padding:0;margin:0;"><a href="<?=base_url().'web/trayekangkot_detail/'.$bo['id_trayek'] ?>"><?=$bo['judul'] ?></a> </h2>
                <div class="well well-sm" style="margin-top:10px;padding:5px;">
                    <i class="fa fa-user"></i> By <?=$bo['penulis'] ?> | 
                    <i class="fa fa-calendar"></i> <?=$bo['tanggal'] ?> | 
                    <i class="fa fa-eye"></i> <?=$bo['dibaca'] ?> Kali
                </div>
                <p><?=$bo['isi_trayek'] ?>
            </div>
          </div>
        </div>
      </div>
      <!-- ./CONTENT -->