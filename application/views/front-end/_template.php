<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Peta Digital Sarana Transportasi Umum Kota Serang</title>
    <link href="<?php echo base_url().'assets/dist/img/favorit.png' ?>" rel="shortcut icon" type="image/ico" />
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?=base_url().'assets/' ?>bootstrap/css/bootstrap.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans|Archivo+Narrow|Play|Ubuntu+Condensed|Droid+Sans" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?=base_url().'assets/' ?>plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url().'assets/' ?>dist/css/costum.css">
    
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="<?=base_url() ?>assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?=base_url() ?>assets/js/markerclusterer_packed.js"></script>

    <script type="text/javascript">
	
	// Variabel untuk menyimpan informasi (desc)
                    var infoWindow = new google.maps.InfoWindow;
      var peta;
      var gambar_kantor = new Array();
      var nama     = new Array();
      var kategori = new Array();
      var alamat   = new Array();
      var telpon   = new Array();
      var x        = new Array();
      var y        = new Array();
      var i;
      var url;
      var gambar_tanda;
      var gambar_kantor;
      var baseurl  = "<?php echo base_url() ?>";

      function peta_awal() {
          var serang = new google.maps.LatLng(-6.1104,106.1640);

          // ini buat ngilangin icon place bawaan google maps
          var myStyles =[
          {
              featureType: "poi",
              elementType: "labels",
              stylers: [
                    { visibility: "off" }
              ]
          }
          ];

          var petaoption = {
              zoom: 14,
              center: serang,
              mapTypeId: google.maps.MapTypeId.ROADMAP,
              styles: myStyles 
              };

          peta = new google.maps.Map(document.getElementById("map_canvas"),petaoption);

          // panggil pungsi ini buat nampilin markernya di peta
          ambildatabase();

      }

      function ambildatabase(){
          // kita bikin dulu array marker dan content info
          var markers = [];
          var info = [];
          
          <?php
          // koneksi database
          // $link   = mysql_connect('localhost','root','');
          // mysql_select_db('googlemaps_multiicon', $link);

          $query = $this->db->query("SELECT l.id, l.nama, l.gambar, l.alamat, l.telp, l.latittude, l.longitude, k.nama_kategori, k.ikon
                                    FROM lokasi as l, kategori as k
                                    WHERE l.kategori=k.id");
          $i = 0;
          $js = "";

          // kita lakuin looping datanya disini
          // while ($value = mysql_fetch_assoc($query)) {
          foreach ($query->result() as $value) {

          $js .= 'nama['.$i.'] = "'.$value->nama.'";
                  gambar_kantor['.$i.'] = "'.base_url().'uploads/instansi/'.$value->gambar.'";
                  alamat['.$i.'] = "'.$value->alamat.'";
                  telpon['.$i.'] = "'.$value->telp.'";
                  x['.$i.'] = "'.$value->latittude.'";
                  y['.$i.'] = "'.$value->longitude.'";
                  set_icon("'.$value->ikon.'");
                  
                  // kita set dulu koordinat markernya
                  var point = new google.maps.LatLng(parseFloat(x['.$i.']),parseFloat(y['.$i.']));

                  // disini kita masukin konten yang akan ditampilkan di InfoWindow
                  var contentString = "<table>"+
                                              "<tr>"+
                                                  "<td align=center><img class=img-responsive width=150px src=" + gambar_kantor['.$i.'] + "></td>"+
                                              "</tr>"+
                                              "<tr>"+
                                                  "<td align=center><br><b>" + nama['.$i.'] + "</b></td>"+
                                              "</tr>"+
                                              "<tr>"+
                                                  "<td align=center width=300px>" + alamat['.$i.'] + "</td>"+
                                              "</tr>"+
                                              "<tr>"+
                                                  "<td align=center> Telp: " + telpon['.$i.'] + "</td>"+
                                              "</tr>"+
                                          "</table>";

                  var infowindow = new google.maps.InfoWindow({
                      content: contentString
                  });
                  

                  tanda = new google.maps.Marker({
                          position: point,
                          map: peta,
                          icon: gambar_tanda,
                          clickable: true
                      });
                  
                 
                  // nah, disini kita buat marker dan infowindow-nya kedalam array
                  markers.push(tanda);
                  info.push(infowindow);

                  // ini fungsi untuk menampilkan konten infowindow kalo markernya diklik
                  google.maps.event.addListener(markers['.$i.'], "click", function() { info['.$i.'].open(peta,markers['.$i.']); });

                  ';

          
              $i++;  
          }

          // kita tampilin deh output jsnya :D
          echo $js;
          ?>
          
          // nah untuk yang satu ini...kita push semua markernya kedalam array untuk dikelompokan
          var markerCluster = new MarkerClusterer(peta, markers);
          
      }

      // fungsi inilah yang akan menampilkan gambar ikon sesuai dengan kategori markernya sendiri
      function set_icon(ikon){
          if (ikon == "") {
          } else {
              gambar_tanda = baseurl+"uploads/icon/"+ikon;
          }
      }

	  // Menampilkan informasi pada masing-masing marker yang diklik
                        function bindInfoWindow(marker, map, infoWindow, html) {
                          google.maps.event.addListener(marker, 'click', function() {
                            infoWindow.setContent(html);
                            infoWindow.open(map, marker);
                          });
                        }
                 
                        }
                      google.maps.event.addDomListener(window, 'load', initialize);
					  
					  
    </script>

  </head>

  <body onload="peta_awal()">

  <!-- <body onload="initialize()"> -->
  <body>

    <div class="container bg_content">
      <div class="container">
        
        <div class="col-sm-12 header">
          <img src="<?=base_url().'uploads/' ?>imgheader.png" class="img-responsive">
        </div><!-- ./ HEADER -->
        
        <div class="col-sm-12 header-menu">
          <ul class="nav navbar-nav">
            <li><a href="<?=base_url().'web' ?>"> Home</a></li>
			<li><a href="<?=base_url().'web/fasilitas' ?>">Fasilitas</a></li>
            <li><a href="<?=base_url().'web/lokasi' ?>">Lokasi</a></li>
            <li><a href="<?=base_url().'web/direction'?>">Direction</a></li>
			<li><a href="<?=base_url().'web/trayekangkot' ?>"> Info Trayek ANgkot</a></li>
			<li><a href="<?=base_url().'web/trayekbus' ?>"> Info Trayek BUS</a></li>
			</ul>
        </div><!-- ./ HEADER-MENU -->
        
        <?php echo $contents ?>
        
        <div class="col-sm-12 bottom-footer">
          BETA VERSION<br>
          Peta Digital Sarana Transportasi Umum, Kota Serang<br>
          Copyright © 2017, Jamal
        </div>
        <!-- ./ BOTTOM-FOOTER -->
      </div>
    </div>
    

    <!-- jQuery 2.2.3 -->
    <script src="<?=base_url().'assets/' ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="<?=base_url().'assets/' ?>bootstrap/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?=base_url().'assets/' ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url().'assets/' ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });

        //Initialize Select2 Elements
        $(".select2").select2();
      });
    </script>
  </body>
</html>