<?php
header('Content-Type: text/html; charset=utf-8');
include_once('../extend/location.config.php');

$city = $_GET['city'];

echo $loc[$city];
?>