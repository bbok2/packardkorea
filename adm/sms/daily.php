<?php
$sub_menu = "900200";
include_once("./_common.php");

$page_size = 20;
$colspan = 11;

auth_check($auth[$sub_menu], "r");

if ($yy == '' || !isset($yy)) { $yy = date('Y'); }
if ($mm == '' || !isset($mm)) { $mm = str_pad(date('m'), 2, '0', STR_PAD_LEFT); }

$sms = new SmartSMS();
$list = $sms->getDailyList($yy, $mm, 'daily', true, $page_size, $page, $sopt, $sval);
$result = &$list['result'];
//print_rr($result);

$g5['title'] = "일별 전송결과 (남은금액 : ". number_format($list['stat']['remain']) . "원)";
$g5['title'] .= ", SMS : " . number_format($result['total']['sms_price'],0) . "원 (". $result['total']['sms_success'] . "건), ";
$g5['title'] .= "LMS : ". number_format($result['total']['lms_price'],0) . "원 (". $result['total']['lms_success'] . "건) = ";
$g5['title'] .= number_format($result['total']['sms_price']+$result['total']['lms_price'],0) . " 원";
include_once(G5_ADMIN_PATH.'/admin.head.php');
?>

    <form name="search_form" id="search_form" action=<?php echo $_SERVER['SCRIPT_NAME'];?> class="local_sch01 local_sch" method="get">

    <label for="st" class="sound_only">검색대상</label>
    <select name="yy" class="frm_input">
        <?php for ($y=date('Y'); $y>=2017; $y--) { ?>
            <option value="<?echo $y;?>" <?echo get_selected($y,$yy)?>><?echo $y;?></option>
        <?php }?>
    </select> 년
    <select name="mm" class="frm_input">
        <?php for ($m=1; $m<=12; $m++) { ?>
            <option value="<?echo str_pad($m, 2, '0', STR_PAD_LEFT);?>" <?echo get_selected($m,$mm)?>><?echo $m;?></option>
        <?php }?>
    </select> 월&nbsp;&nbsp;
    <input type="submit" value="검색" class="btn_submit">

    </form>

    <div class="tbl_head02 tbl_wrap">
        <table class="st2">
            <thead>
            <tr>
                <th rowspan="2" scope="col">Date</th>
                <th colspan="4" scope="col">SMS</th>
                <th colspan="4" scope="col">LMS</th>
            </tr>
            <tr>
                <th scope="col">Total</th>
                <th scope="col">Success</th>
                <th scope="col">Error</th>
                <th scope="col">Fail</th>
                <th scope="col">Total</th>
                <th scope="col">Success</th>
                <th scope="col">Error</th>
                <th scope="col">Fail</th>
            </tr>
            </thead>
            <tr>
                <td><b><?php echo $result['total']['year'] . '년 ' . $result['total']['month'] . '월'?> 합계</b></td>
                <td><?php echo $result['total']['sms_total']?></td>
                <td><?php echo $result['total']['sms_success']?></td>
                <td><?php echo $result['total']['sms_error']?></td>
                <td><?php echo $result['total']['sms_fail']?></td>
                <td><?php echo $result['total']['lms_total']?></td>
                <td><?php echo $result['total']['lms_success']?></td>
                <td><?php echo $result['total']['lms_error']?></td>
                <td><?php echo $result['total']['lms_fail']?></td>
            </tr>
            <?php foreach($result['days'] as $row) {?>
                <tr>
                    <td><?php echo conv_date_format('Y년 m월 d일 (W)', $result['total']['year']."-".$result['total']['month']."-".$row['day'])?></td>
                    <td><?php echo $row['sms_total']?></td>
                    <td><?php echo $row['sms_success']?></td>
                    <td><?php echo $row['sms_error']?></td>
                    <td><?php echo $row['sms_fail']?></td>
                    <td><?php echo $row['lms_total']?></td>
                    <td><?php echo $row['lms_success']?></td>
                    <td><?php echo $row['lms_error']?></td>
                    <td><?php echo $row['lms_fail']?></td>
                </tr>
            <?php }?>
        </table>
    </div>


<?php
include_once(G5_ADMIN_PATH.'/admin.tail.php');
?>