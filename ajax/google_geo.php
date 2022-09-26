<?php
include_once '../extend/user.config.php';

$addr = $_GET['addr'];
$callback = $_GET['callback'];
$lat = $_GET['lat'];
$lng = $_GET['lng'];
?>
<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<title>geocoder</title>
<link rel="stylesheet" href="/css/default.css" />
<style>
#searchbox { position:absolute;top:10px;left:100px;width:300px;z-index:5;background-color:#fff;padding:5px;border:1px solid #999 }
#positionbox { position:absolute;top:10px;left:430px;width:280px;z-index:5;background-color:#fff;padding:5px;border:1px solid #999 }
</style>
<script src="/js/jquery-1.8.3.min.js"></script>
<script>
var map, position = { lat:37.56662335853239, lng:126.9785213470459 };
var markers = [];
<?php if ($lat != '' && $lng != '') { ?>
position = { lat:<?php echo $lat;?>, lng:<?php echo $lng;?> };
<?php } else if ($addr != '') { ?>
$.ajax({
    url: "https://maps.googleapis.com/maps/api/geocode/json?address=<?php echo $addr;?>&key=<?php echo GoogleMapAPI;?>",
    type: "GET", dataType: "json", async: false, cache: false,
    success: function (data, textStatus) {
        if (data.results.length > 0) {
            position = { lat:data.results[0].geometry.location.lat, lng:data.results[0].geometry.location.lng };
        }
    }
});
<?php } ?>

function initMap() {
    map = new google.maps.Map(document.getElementById('maps'), {
        center: position, scrollwheel: true, zoom: 14
    });
    google.maps.event.addListener(map,'tilesloaded', function(event){
        var myLatLng = new google.maps.LatLng(position);
        addMarker(myLatLng);
    });

    google.maps.event.addListener(map,'click',function(event){
        deleteMarkers();
        addMarker(event.latLng);
    });

    var searchBox = new google.maps.places.SearchBox(document.getElementById('address'));
    google.maps.event.addListener(searchBox,'places_changed',function(){
        var places = searchBox.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        deleteMarkers();
        for(var i=0,place;place=places[i];i++){
            addMarker(place.geometry.location);
            bounds.extend(place.geometry.location);
        }
        map.fitBounds(bounds);
        map.setZoom(16);
    });
    $("#address").focus();
}

function addMarker(location){
    var marker = new google.maps.Marker({ position:location, map:map });
    markers.push(marker);
    $("#gps").val(location.lat() + "," + location.lng());
}

// Sets the map on all markers in the array.
function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}

function deleteMarkers() {
    setMapOnAll(null);
    markers = [];
}

<?php if ($callback != '') { ?>
function callback() {
    var gps = $("#gps").val();
    if (gps != "") {
        gps = gps.split(",");
        window.opener.<?php echo $callback?>({ 'lat':gps[0], 'lng':gps[1] });
    }
    window.close();
}
<?php } ?>
</script>
</head>
<body>
<div id="searchbox">
    <input id="address" type="text" placeholder="주소 or 장소" value="<?php echo $addr?>" style="border:none;width:95%;height:20px;" autocomplete="off">
</div>
<div id="positionbox">
    <input id="gps" type="text" readonly placeholder="GPS 좌표" style="border:none;width:230px;height:20px;">
    <?php if ($callback != '') { ?>
    <span class="btn_add01 btn_add"><button style="font-size:14px;width:40px;" onclick="javascript:callback();">확인</button></span>
    <?php } ?>
</div>
<div id="maps" style="width:100%;height:680px"></div>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=<?php echo GoogleMapAPI;?>&callback=initMap" async defer></script>
</body>
</html>