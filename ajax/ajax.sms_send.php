<?php
include_once '../common.php';
include_once "../lib/smartsms.lib.php";

$token = trim($_POST['_token']);
$msg = trim($_POST['sms_msg']);
$sms_hp1 = trim($_POST['sms_hp1']);
$sms_hp2 = trim($_POST['sms_hp2']);
$sms_hp3 = trim($_POST['sms_hp3']);
$sms_hp = $sms_hp1 . $sms_hp2 . $sms_hp3;

if (!valid_token($token, 'sms')) {
//    ajax_json("1000", "새로 고침후 다시 입력해 주세요.");
}

if ($msg == '') {
    ajax_json("1001", "메시지가 입력되지 않았습니다.");
}

if (strlen($sms_hp1) != 3 || strlen($sms_hp2) < 3 || strlen($sms_hp3) != 4){
    ajax_json("1002", "문의하시는 분의 전화번호가 올바르지 않습니다.");
}

$msg .= "\n\n" . $sms_hp1 . $sms_hp2 . $sms_hp3;

$sms = new SmartSMS();

$sql = "insert into g5_sms_edan set sm_from_hp='{$sms_hp}', sm_to_hp='{$sms->ToPhone}', sm_msg='{$msg}', sm_write_dt='". G5_TIME_YMDHIS ."', sm_ip='{$_SERVER['REMOTE_ADDR']}', sm_res='REQ'";
sql_query($sql);

$result = $sms->sendSMS('문의', '', '', '', $msg);

if ($result == '0') {
    ajax_json("0000", "성공");
}
else {
    ajax_json("1003", $sms->resultMsg);
}
?>