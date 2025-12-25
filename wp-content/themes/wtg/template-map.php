<?php
/*
* Template Name:  Map
*/
?>
<!DOCTYPE html>
<html>
  <head>
    <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 500px;  /* The width is the width of the web page */
        left:0;
        right:0;
        margin:auto;
       }
    </style>
  </head>
  <body>
    <h3>Get on down in Hackney</h3>
    <!--The div element for the map -->
    <div id="map"></div>
    <script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  // 51.53944,-0.05663
    var dolphin = {lat: 51.539859, lng: -0.056411};
    var name = '';
    var urllink = 'https://www.worldtravelguide.net';
    var infoWindow = new google.maps.InfoWindow;

  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), 
      {
        zoom: 11, 
        center: dolphin,
        gestureHandling: 'none',
        zoomControl: false    
      });

       var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: dolphin, map: map, label: name, icon: image });
  var CTMstyles = [
          {
            featureType: "poi",
            stylers: [{visibility: "off"}]
          },
  ];

  var infowincontent = 'This is the infamous <a href="https://www.designmynight.com/london/bars/hackney/the-dolphin/review"><h1>Dophin Pub</h1></a> as frequented by the infamous CTM Crew....';
  marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });

}



    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBx-1ry9KwxCmLrWJQf7Tk9gzj7HumPy9Y&callback=initMap">
    </script>
  </body>
</html>

