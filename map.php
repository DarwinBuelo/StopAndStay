<?php
include_once 'includes/db.php';
include_once 'view_ads.php';
include_once 'init.php';
session_start();
$Outline->header('Home');
?>
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.3.1/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.3.1/mapbox-gl.css' rel='stylesheet'/>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            position: absolute;
            top: 142px;
            bottom: 0;
            width: 100%;
        }

        #menu {
            position: absolute;
            background: #fff;
            padding: 10px;
            font-family: 'Open Sans', sans-serif;
        }

        .coordinates {
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            position: absolute;
            bottom: 55px;
            left: 10px;
            padding: 5px 10px;
            margin: 0;
            font-size: 11px;
            line-height: 18px;
            border-radius: 3px;
            display: none;
        }
    </style>

<?php
// will handle all the data for the map


$Properties = UserProperty::LoadArray();

?>
<div id='map'></div>
<div id='menu'>
    <input id='streets-v11' type='radio' name='rtoggle' value='streets' checked='checked'>
    <label for='streets'>streets</label>
    <input id='light-v10' type='radio' name='rtoggle' value='light'>
    <label for='light'>light</label>
    <input id='dark-v10' type='radio' name='rtoggle' value='dark'>
    <label for='dark'>dark</label>
    <input id='outdoors-v11' type='radio' name='rtoggle' value='outdoors'>
    <label for='outdoors'>outdoors</label>
    <input id='satellite-v9' type='radio' name='rtoggle' value='satellite'>
    <label for='satellite'>satellite</label>
</div>
<pre id='coordinates' class='coordinates'></pre>
<div id="coordinate" style="display:none">123.73472378685148,13.138748870162956</div>
<div id="locName" style="display:none"></div>
<script>

    var long = 123.73472378685148;
    var lat = 13.138748870162956;
    mapboxgl.accessToken = 'pk.eyJ1IjoibWljcm9zYW0iLCJhIjoiY2pwOXdlM2hxMDBsZzNycGs4ODBwbTBxZyJ9.NUTOMtn_cFkY3tNXeffz8A';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        zoom: 12.5,
        center: [long, lat]
    });

    map.addControl(new mapboxgl.GeolocateControl({
        positionOptions: {
            enableHighAccuracy: true
        },
        trackUserLocation: true
    }));

    var layerList = document.getElementById('menu');
    var inputs = layerList.getElementsByTagName('input');

    function switchLayer(layer) {
        var layerId = layer.target.id;
        map.setStyle('mapbox://styles/mapbox/' + layerId);
    }

    for (var i = 0; i < inputs.length; i++) {
        inputs[i].onclick = switchLayer;
    }
    <?php

    foreach ($Properties as $Obj) {

        if (!empty($Obj->getCoord())) {
            //echo "var popup = new mapboxgl.Popup({ offset: 25 }).setText('".stripcslashes($Obj->getLocation())."');".PHP_EOL;
            //echo "new mapboxgl.Marker({draggable: false}).setLngLat([" . $Obj->getCoord() . "]).setPopup(popup).addTo(map);".PHP_EOL;
            echo "new mapboxgl.Marker({draggable: false}).setLngLat([" . $Obj->getCoord() . "]).addTo(map);".PHP_EOL;
        }
    }

    ?>
</script>
