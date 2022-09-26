<?php
$sub_menu = "900100";
include_once("./_common.php");

$page_size = 20;
$colspan = 11;

if ($page < 1) $page = 1;

auth_check($auth[$sub_menu], "r");

$sms = new SmartSMS();
$list = $sms->getDailyList('ALL', '', 'list', true, $page_size, $page, $sopt, $sval);
//print_rr($list);

$g5['title'] = "건별 전송내역 (남은금액 : ". number_format($list['stat']['remain']) . "원)";

include_once(G5_ADMIN_PATH.'/admin.head.php');
?>

    <form name="search_form" id="search_form" action=<?php echo $_SERVER['SCRIPT_NAME'];?> class="local_sch01 local_sch" method="get">

    <label for="st" class="sound_only">검색대상</label>
    <select name="sopt" class="frm_input">
        <option value="sndmsg" <?echo get_selected("sndmsg",$sopt)?>>메시지</option>
        <option value="sndphone" <?echo get_selected("sndphone",$sopt)?>>발송번호</option>
        <option value="recphone" <?echo get_selected("recphone",$sopt)?>>수신번호</option>
    </select>
    <label for="sv" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
    <input type="text" name="sval" value="<?php echo $sval ?>" id="sv" class="frm_input">
    <input type="submit" value="검색" class="btn_submit">

    </form>

    <div class="tbl_head01 tbl_wrap">
        <table>
            <caption><?php echo $g5['title']; ?> 목록</caption>
            <thead>
            <tr>
                <th scope="col">전송일시</th>
                <th scope="col">메세지</th>
                <th scope="col">발송번호</th>
                <th scope="col">수신번호</th>
                <th scope="col">전송결과</th>
                <th scope="col">타입</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($list['result']['pages']['totalcount'] < 1) { ?>
                <tr>
                    <td colspan="<?php echo $colspan?>" class="empty_table" >
                        데이터가 없습니다.
                    </td>
                </tr>
                <?php
            }
            else {
                $bg = 'bg'.($line++%2);
                foreach ($list['result']['smslist'] as $res) {
                ?>
                <tr class="<?php echo $bg; ?>">
                    <td class="td_datetime"><?php echo date('Y-m-d H:i', strtotime($res['snddate']))?></td>
                    <td><span title="<?php echo $res['sndmsg']?>"><?php echo $res['sndmsg']?></span></td>
                    <td class="td_numbig"><?php echo $res['sndphone']?></td>
                    <td class="td_numbig"><?php echo $res['recphone']?></td>
                    <td class="td_numbig"><?php echo $res['resmsg']?></td>
                    <td class="td_numbig"><?php echo $res['msgtype']?></td>
                </tr>
            <?php } } ?>
            </tbody>
        </table>
    </div>

<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $list['result']['pages']['totalpage'], $_SERVER['SCRIPT_NAME']."?sopt=$sopt&amp;sval=$sval&amp;page="); ?>

<?php
include_once(G5_ADMIN_PATH.'/admin.tail.php');
?>