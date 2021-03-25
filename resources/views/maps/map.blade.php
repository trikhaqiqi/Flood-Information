<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<style>
    #mapid {
        height: 350px;
        width: 500px;
    }
</style>



<div id="mapid" class="mapid mb-0"></div>

<script type="text/javascript">
    // ini adalah koordinat saat awal ditampilkan map
    var mymap = L.map('mapid').setView([-6.914744, 107.609811], 13);

    // ini adalah token yang harus diisi agar map tersebut jalan
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        //! kalo mau ganti jadi peta yang warna hitam ganti di id menjadi dark dan v10
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoiaWx5YXNzc3RyaSIsImEiOiJja2h5aTE1dm4wNjJkMnlsNmQzN3BvZjZqIn0.6nCTmv8x9K6HLNr_eBYmqg'
    }).addTo(mymap);

    //! Get Coordinat Locations
    // var latInput = document.querySelector("[name=latitude]");
    // var lngInput = document.querySelector("[name=longitude]");
    var locationInput = document.querySelector("[name=location]");

    var curLocation = [-6.914744, 107.609811];

    mymap.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation, {
        draggable: 'true'
    });

    marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update();
        // $("#latitude").val(position.lat);
        // $("#longitude").val(position.lng);
        $("#location").val(position.lat + "," + position.lng);
    });

    mymap.addLayer(marker);

    mymap.on("click", function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;
        if (!marker) {
            marker = L.marker(e.latlng).addTo(mymap);
        } else {
            marker.setLatLng(e.latlng);
        }
        // latInput.value = lat;
        // lngInput.value = lng;
        locationInput.value = lat + "," + lng;
    });
</script>
</div>