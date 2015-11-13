<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple markers</title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>

function initMap() {

  //hacer bucle for
  //variable

  //var myLatLng = {lat: -25.363, lng: 131.044};
  var myLatLng = {lat: 37.3903205, lng: -5.9453086};

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 12,
    center: myLatLng
  });

  //variable
  // bucle for

  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'Hello World!'
  });
}

    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdFc4cSyskNEPT1X6xyI7-XVxmOcVm9K0&signed_in=true&callback=initMap"></script>
  </body>
</html>