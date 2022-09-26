<?php
$sub_menu = "400100";
include_once("./_common.php");

auth_check($auth[$sub_menu], "r");

if ($w == 'd') {
    $sql = "update g5_counseling set cs_del_yn='Y', cs_upd_dt='". G5_TIME_YMDHIS ."' where cs_id='{$_POST['cs_id']}'";
}
else {
    $sql = "update g5_counseling set cs_status='{$_POST['cs_status']}', cs_adm_memo='{$_POST['cs_adm_memo']}', cs_upd_dt='". G5_TIME_YMDHIS ."' where cs_id='{$_POST['cs_id']}'";
}
sql_query($sql);

goto_url("list.php?". query_except("cs_id"));
?>