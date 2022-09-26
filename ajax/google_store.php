<?php
include '../common.php';

$dlvr = $_GET['dlvr'];
$bounds = explode("|", $_GET['bounds']);
if (count($bounds) != 2) { ajax_json("1001", "좌표 파라미터 오류"); }

$lats = explode(",", $bounds[0]);
$lngs = explode(",", $bounds[1]);
if (count($lats) != 2) { ajax_json("1002", "lat 좌표 파라미터 오류"); }
if (count($lngs) != 2) { ajax_json("1003", "lng 좌표 파라미터 오류"); }

$sql_common = " from g5_store ";
$sql_search = " where st_gps_lat>={$lats[0]} and st_gps_lat<=$lats[1] and st_gps_long>={$lngs[0]} and st_gps_long<={$lngs[1]}";
if ($dlvr == 'Y' || $dlvr == 'N') { $sql_search .= " and st_dlvr_yn='{$dlvr}' "; }
$sql_order = " order by st_gugun asc, st_id desc";

$sql = "select * {$sql_common} {$sql_search} {$sql_order}";
$result = sql_result(sql_query($sql));

if (count($result) < 1) {
    ajax_json("1004", "검색결과 없음");
}
else {
    ajax_json("0000","", array('totalCount'=>count($result), 'results'=>$result));
}
?>