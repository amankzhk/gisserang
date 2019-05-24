

      <div class="col-sm-8 content">
        <div class="panel">
          <div class="panel-heading">
            <h3 class="panel-title">Daftar Trayek</h3>
          </div>
          <?php foreach($ab->result() as $r){ ?>
          <div class="panel-body" style="margin-top:10px;">
            <div class="media">
                <div class="media-left media-top">
                  <a href="<?=base_url().'web/trayekbus_detail/'.$r->id_trayek ?>">
                  </a>
                </div>
                <div class="media-body">
                  <h3 class="media-heading"><a href="<?=base_url().'web/trayekbus_detail/'.$r->id_trayek ?>"><?=$r->judul ?></a> </h3>
                  <div class="well well-sm">
                    <i class="fa fa-user"></i> By <?=$r->penulis ?> | 
                    <i class="fa fa-calendar"></i> <?=$r->tanggal ?> | 
                    <i class="fa fa-eye"></i> <?=$r->dibaca ?> Kali
                  </div>
                  <?=substr($r->isi_trayek, 0,10)."..." ?><p>
                <a href="<?=base_url().'web/trayekbus_detail/'.$r->id_trayek ?>" class="btn btn-success btn-sm btn-flat" style="float:left;"><i class="fa fa-angle-double-right"></i> Read More</a>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <!-- ./CONTENT -->