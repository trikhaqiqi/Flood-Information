<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Proyek</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <style>
        #mapid {

            height: 300px;
            width: 415px;

        }

        .mapid {
            text-align: center;
        }
    </style>
</head>

<body>

    <div id="mapid" class="mapid"></div>

    <script type="text/javascript">
        // ini adalah koordinat saat awal ditampilkan map
        var mymap = L.map('mapid').setView([{{ $post->location }}], 13);

        // ini adalah token yang harus diisi agar map tersebut jalan
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoiaWx5YXNzc3RyaSIsImEiOiJja2h5aTE1dm4wNjJkMnlsNmQzN3BvZjZqIn0.6nCTmv8x9K6HLNr_eBYmqg'
        }).addTo(mymap);

        // ini adalah pin untuk menandai lokasi
        var marker = L.marker([{{ $post->location }}]).addTo(mymap);

        // ini adalah lingkaran untuk menandai suatu lokasi tersebut
        var circle = L.circle([{{$post->location}}], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 500
        }).addTo(mymap);

        // ini adalah popup kejadian 
        marker.bindPopup("<b>{{ $post->title }}</b><br>").openPopup();
        circle.bindPopup("I am a circle.");
        polygon.bindPopup("I am a polygon.");


        var popup = L.popup()
            .setLatLng([51.5, -0.09])
            .setContent("I am a standalone popup.")
            .openOn(mymap);

        function onMapClick(e) {
            alert("You clicked the map at " + e.latlng);
        }

        mymap.on('click', onMapClick);

        var popup = L.popup();

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("You clicked the map at " + e.latlng.toString())
                .openOn(mymap);
        }

        mymap.on('click', onMapClick);
    </script>
</body>

</html>