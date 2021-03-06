<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>

<script>
    var clickLatLong = new google.maps.LatLng(40.740339, -73.993118),
    map,
    mapOptions,
    marker;

    function initialize() {

        mapOptions = {
            zoom: 14,
            zoomControl: true,
            scaleControl: false,
            scrollwheel: false,
            disableDoubleClickZoom: true,
            center: clickLatLong,
            disableDefaultUI: true,
            styles: [
                {"stylers":[
                    {"hue":"#ff1a00"},
                    {"invert_lightness":true},
                    {"saturation":-100},
                    {"lightness":33},
                    {"gamma":0.5}
                    ]
                },
                {"featureType":"water",
                "elementType":"geometry",
                "stylers":[
                    {"color":"#2D333C"}
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "stylers": [
                      { "visibility": "on" },
                      { "color": "#000000" }
                    ]
                  },
                  {
                    "featureType": "road.local",
                    "stylers": [
                      { "color": "#000000" },
                      { "visibility": "on" }
                    ]
                  }
            ]
        };

        map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

        marker = new google.maps.Marker({
            position: clickLatLong,
            map: map
        });

    }

    google.maps.event.addDomListener(window, "load", initialize);

</script>