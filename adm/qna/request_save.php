<?php
$sub_menu = "400200";
include_once("./_common.php");

auth_check($auth[$sub_menu], "r");

if ($w == 'd') {
    $sql = "update g5_sms_edan set sm_del_yn='Y', sm_upd_dt='". G5_TIME_YMDHIS ."' where sm_id='{$_POST['sm_id']}'";
}
else {
    $sql = "update g5_sms_edan set sm_adm_memo='{$_POST['adm_memo']}', sm_upd_dt='" . G5_TIME_YMDHIS . "' where sm_id='{$_POST['sm_id']}'";
}
//echo $sql;
//exit;
sql_query($sql);

goto_url("request.php?". query_except());

?>