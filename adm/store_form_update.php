<?php
$sub_menu = "200950";
include_once('./_common.php');

$w = $_POST['w'];
if ($w == 'u' || $w == 'd')
    check_demo();

auth_check($auth[$sub_menu], 'w');
//check_admin_token();
if ($w != 'o') {
    $_POST['st_dlvr_yn'] = ($_POST['st_dlvr_yn'] == "Y") ? "Y" : "N";
    $_POST['st_new_yn'] = ($_POST['st_new_yn'] == "Y") ? "Y" : "N";
    $_POST['st_yet_yn'] = ($_POST['st_yet_yn'] == "Y") ? "Y" : "N";
    $_POST['st_img_no'] = ($_POST['st_img_no'] == "") ? 1 : $_POST['st_img_no'];
    $st_tel = implode('-', $_POST['st_tel']);

    $file_photo = upload_uniqfile(G5_DATA_PATH . '/store/', $_FILES['fileimg'], array('keyRetain' => 'Y', 'regAllowExt' => "/(\.gif|\.jpg|\.png)$/i"));

    $sql_file = "";
    $sql_common = "st_city = '{$_POST['st_city']}',
             st_gugun = '{$_POST['st_gugun']}',
             st_name = '{$_POST['st_name']}',
             st_new_addr = '{$_POST['st_new_addr']}',
             st_old_addr = '{$_POST['st_old_addr']}',
             st_tel = '{$st_tel}',
             st_op_time = '{$_POST['st_op_time']}',
             st_gps_lat = {$_POST['st_gps_lat']},
             st_gps_long = {$_POST['st_gps_long']},
             st_dlvr_yn = '{$_POST['st_dlvr_yn']}',
             st_new_yn = '{$_POST['st_new_yn']}',
             st_yet_yn = '{$_POST['st_yet_yn']}',
             st_owner = '{$_POST['st_owner']}',
             st_busino = '{$_POST['st_busino']}',
             st_open_ymd = '{$_POST['st_open_ymd']}',
             st_upd_dt = '" . G5_TIME_YMDHIS . "',
             st_img_no = {$_POST['st_img_no']} ";
}

$tmp_rep_img = '';
$imgs = array();

for ($i=1; $i<=8; $i++) {
    if (is_null($oldfileimg[$i])) { $oldfileimg[$i]=''; }
    if (isset($file_photo[$i]) && $file_photo[$i]['error'] == 0) {
        $imgs[$i] = $file_photo[$i]['realname'];
    }
    else if ($_POST['chkdel'][$i] == 'Y') { //파일 삭제
        $imgs[$i] = '';
        @unlink(G5_DATA_PATH. '/store/' .$oldfileimg[$i]);
    }
    else {
        $imgs[$i] = $oldfileimg[$i];
    }

    if ($imgs[$i] != '' && $tmp_rep_img == '') {
        $tmp_rep_img = $imgs[$i];
    }
}
$rep_img = $imgs[$_POST['st_img_no']]; //대표 이미지
if ($rep_img == '') { $rep_img = $tmp_rep_img; }
$sql_file = ", st_img_rep='{$rep_img}', st_img_list='" . json_encode_unicode($imgs) . "' ";

if ($w == '')
{
    $sql_common .= ", st_reg_dt='". G5_TIME_YMDHIS ."' ";
    $sql = " insert {$g5['store']} set {$sql_common} {$sql_file} ";
    sql_query($sql);

    $st_id = sql_insert_id();
}
else if ($w == 'u')
{
    $sql = "update {$g5['store']} set {$sql_common} {$sql_file} where st_id = '{$_POST['st_id']}'";
    sql_query($sql);
}
else if ($w == 'd')
{
    $st_id = implode(",", $_POST['chk']);
    $sql = " delete from {$g5['store']} where st_id in ({$st_id})";
    sql_query($sql);
}
else if ($w == 'o') {
    foreach ($_POST['st_dlvr_yn'] as $k=>$v) {
        $sql = "update {$g5['store']} set st_dlvr_yn='{$_POST['st_dlvr_yn'][$k]}', st_new_yn='{$_POST['st_new_yn'][$k]}', st_yet_yn='{$_POST['st_yet_yn'][$k]}' where st_id={$k}";
        sql_query($sql);
    }
}

if ($w == 'd' || $w == 'o')
    goto_url('./store_list.php?'.$qstr);
else
    goto_url('./store_form.php?w=u&st_id='.$st_id.'&amp;'.$qstr);
?>
