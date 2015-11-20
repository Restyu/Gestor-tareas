
<pre>
  <?php var_dump($mapalocalizacion); ?>
</pre>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Mapa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <style>
      body nav{
        height: 6%;
        padding-bottom: 10px;
      }
      html, body {
        height: 95%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
  </head>
  <body>
          <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target="#bs-example">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button> 
                    <a href="<?=$base_url?>" class="navbar-brand">tareas</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example">
                    <ul class="nav navbar-nav">
                        <li><a href="<?=$base_url?>/completadas">completadas</a></li>
                        <li><a href="<?=$base_url?>/eliminadas">eliminadas</a></li>
                        <li><a href="<?=$base_url?>/localizaciones">localizaciones</a></li>
                    </ul>
                </div>
            </div>
        </nav>

    <div id="map"></div>
    <script>

function initMap() {

  <?php  

    foreach($mapalocalizacion as $mapa){

        $localizacion ="var myLatLng".$mapa['id'] . " = { lat: " . $mapa['lat'] . ", lng:" . $mapa['lon'] . "}; \n ";
        echo $localizacion; 
    }
  ?>

  <?php 

    foreach($mapalocalizacion as $mapa){

      $nueva = "var map = new google.maps.Map(document.getElementById('map'), { \nzoom: 12, \ncenter: myLatLng".$mapa['id']."\n});"; 
      echo $nueva;
    }

   ?>

  <?php  

    foreach ($mapalocalizacion as $mapa) {
    
   $contentString = "var contentString". $mapa['id'] ." = '<div id=\"content\">".
      '<div id="siteNotice">'.
      '</div>'.
      '<h1 id="firstHeading" class="firstHeading">'.$mapa['name'].'</h1>'.
      '<div id="bodyContent">'.
      '<p><b>'. $mapa['task'].
      '</div>'.
      "</div>';\n\n";

   echo $contentString;

  }

  foreach ($mapalocalizacion as $mapa) {

    $infowindow = "var infowindow". $mapa['id']. " = new google.maps.InfoWindow({\ncontent: contentString".$mapa['id']."\n});\n";
    echo $infowindow;
  }

  ?>

  <?php

    foreach($mapalocalizacion as $mapa){

        $etiquetas = "var marker".$mapa['id']." = new google.maps.Marker({\nposition: myLatLng".$mapa['id'].",\nmap: map,\ntitle: '".$mapa['task']."'});\n";
        echo $etiquetas;
    }

    ?>

    <?php

    foreach($mapalocalizacion as $mapa){
        $marker="marker" .$mapa['id']. ".addListener('click', function() { \ninfowindow" .$mapa['id']. ".open(map, marker".$mapa['id'].");\n});\n";
        echo $marker;
    }

  ?>

}

    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdFc4cSyskNEPT1X6xyI7-XVxmOcVm9K0&signed_in=true&callback=initMap"></script>
  </body>
</html>