<?php
include '../common.php';

$stid = $_GET['stid'];

if ($stid == '') { ajax_json('1001', '파라미터 오류'); }

$sql = "select * from g5_store where st_id={$stid}";
$result = sql_result(sql_query($sql), array('st_img_list'));

if (!$result) {
    ajax_json('1002', '상점이 존재하지 않습니다.');
}
else {
    $res = &$result[0];
    $res['st_op_time'] = nl2br(htmlspecialchars($res['st_op_time']));
    $nimg = array();
    $i = 1;
    foreach ($res['st_img_list'] as $imgnm) {
        if ($imgnm != "") {
            if ($imgnm == $res['st_img_rep']) {
                $nimg[0] = $imgnm;
            }
            else {
                $nimg[$i] = $imgnm;
            }
            $i++;
        }
    }
    ksort($nimg);
    $imgarr = array();
    foreach ($nimg as $img) {
        $imgarr[] = $img;
    }

    $res['st_img_list'] = $imgarr;
    $res['st_gps_lat'] = floatval($res['st_gps_lat']);
    $res['st_gps_long'] = floatval($res['st_gps_long']);
    ajax_json('0000', '', array('store'=>$res));
}
?>