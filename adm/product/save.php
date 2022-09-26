<?php
$sub_menu = "400300";
include_once('./_common.php');

$w = $_POST['w'];
if ($w == 'u' || $w == 'd')
    check_demo();

auth_check($auth[$sub_menu], 'w');

if ($w == 'u' || $w == 'd') { if ($pr_id == '') { exit; } }

$pr_cats = implode(',', $_POST['pr_cats']);
if ($pr_sort == "" && !is_numeric($pr_sort)) { $pr_sort = 9999; }

$file_img = upload_uniqfile(G5_DATA_PATH . '/product/', $_FILES['pr_img'], array('regAllowExt' => "/(\.gif|\.jpg|\.png)$/i"));
if ($file_img[0]['realname'] != '') { $pr_img = $file_img[0]['realname']; }

$sql_common = "pr_nm_kr='$pr_nm_kr', pr_nm_en='$pr_nm_en', pr_desc='$pr_desc', pr_cats=',$pr_cats', pr_sort=$pr_sort ";
if ($pr_img != '') { $sql_common .= ", pr_img='$pr_img'"; }

if ($w == '') {
    $sql = "insert into g5_product set " . $sql_common . ", pr_del_yn='N', pr_reg_dt='" . G5_TIME_YMDHIS . "'";
    sql_query($sql);
    $pr_id = sql_insert_id();
}
else if ($w == 'u') {
    $sql = "update g5_product set " . $sql_common . ", pr_upd_dt='" . G5_TIME_YMDHIS . "' where pr_id=$pr_id";
    sql_query($sql);
}
else if ($w == 'd') {
    $sql = "update g5_product set pr_del_yn='Y', pr_upd_dt='" . G5_TIME_YMDHIS . "' where pr_id=$pr_id";
    sql_query($sql);
}

goto_url('./list.php?'.query_except());
?>
