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
        #positionbox { position:absolute;top:10px;left:280px;width:280px;z-index:5;background-color:#fff;padding:5px;border:1px solid #999 }

        .search { position:absolute;z-index:1000;top:20px;left:20px; }
        .search #address { width:150px;height:20px;line-height:20px;border:solid 1px #555;padding:5px;font-size:12px;box-sizing:content-box; }
        .search #submit { height:30px;line-height:30px;padding:0 10px;font-size:12px;border:solid 1px #555;border-radius:3px;cursor:pointer;box-sizing:content-box; }
    </style>
    <script src="/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?clientId=<?php echo NaverMapAPI;?>&amp;submodules=geocoder"></script>
</head>
<body>

<div id="map" style="width:100%;height:680px;">
</div>
<div class="search" style="">
    <input id="address" type="text" placeholder="검색할 주소" value="<?php echo $addr?>" />
    <input id="submit" type="button" value="주소 검색" />
</div>
<div id="positionbox">
    <input id="gps" type="text" readonly placeholder="GPS 좌표" style="border:none;width:230px;height:20px;">
    <?php if ($callback != '') { ?>
        <span class="btn_add01 btn_add"><button style="font-size:14px;width:40px;" onclick="javascript:callback();">확인</button></span>
    <?php } ?>
</div>
<script type="text/javascript">
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

    // search by tm128 coordinate
    function searchCoordinateToAddress(latlng) {
        var tm128 = naver.maps.TransCoord.fromLatLngToTM128(latlng);
        infoWindow.close();
        naver.maps.Service.reverseGeocode({
            location: tm128,
            coordType: naver.maps.Service.CoordType.TM128
        }, function(status, response) {
            if (status === naver.maps.Service.Status.ERROR) {
                return alert('Something Wrong!');
            }

            var items = response.result.items,
                htmlAddresses = [];

            for (var i=0, ii=items.length, item, addrType; i<ii; i++) {
                item = items[i];
                addrType = item.isRoadAddress ? '[도로명]' : '[지번]';
                htmlAddresses.push((i+1) +'. '+ addrType +' '+ item.address);
            }

            infoWindow.setContent([
                '<div style="padding:10px;min-width:200px;line-height:150%;">',
                htmlAddresses.join('<br />'),
                '</div>'
            ].join('\n'));
            $("#gps").val(latlng.lat() + "," + latlng.lng());
            infoWindow.open(map, latlng);
        });
    }

    // result by latlng coordinate
    function searchAddressToCoordinate(address) {
        naver.maps.Service.geocode({
            address: address
        }, function(status, response) {
            if (status === naver.maps.Service.Status.ERROR) {
                return alert('Something Wrong!');
            }

            var item = response.result.items[0],
                addrType = item.isRoadAddress ? '[도로명]' : '[지번]',
                point = new naver.maps.Point(item.point.x, item.point.y);

            infoWindow.setContent([
                '<div style="padding:10px;min-width:200px;line-height:150%;">',
                '<h4 style="margin-top:5px;">검색 주소 : '+ response.result.userquery +'</h4>',
                addrType +' '+ item.address +'<br />',
                '</div>'
            ].join('\n'));


            map.setCenter(point);
            infoWindow.open(map, point);
        });
    }

    function initGeocoder() {
        map.addListener('click', function(e) {
            searchCoordinateToAddress(e.coord);
        });

        $('#address').on('keydown', function(e) {
            var keyCode = e.which;

            if (keyCode === 13) { // Enter Key
                searchAddressToCoordinate($('#address').val());
            }
        });

        $('#submit').on('click', function(e) {
            e.preventDefault();
            searchAddressToCoordinate($('#address').val());
        });

        <?php if ($lat != '' && $lng != '') { ?>
        searchCoordinateToAddress(new naver.maps.LatLng(<?php echo $lat;?>, <?php echo $lng;?>));
        <?php } else if ($addr != '') { ?>
        searchAddressToCoordinate('<?php echo $addr;?>');
        <?php } ?>
    }

    var position = { lat:37.56662335853239, lng:126.9785213470459 };

    <?php if ($lat != '' && $lng != '') { ?>
    position = { lat:<?php echo $lat;?>, lng:<?php echo $lng;?> };
    <?php } ?>

    var map = new naver.maps.Map("map", {
        center: new naver.maps.LatLng(position.lat, position.lng),
        zoom: 14,
        mapTypeControl: true
    });

    var infoWindow = new naver.maps.InfoWindow({
        anchorSkew: true
    });

    map.setCursor('pointer');
    naver.maps.onJSContentLoaded = initGeocoder;
</script>
</body>
</html>