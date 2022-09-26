<?php
$sub_menu = "600200";
include_once("./_common.php");

$page_size = $rows = 10;
$colspan = 11;

if ($page < 1) $page = 1;

auth_check($auth[$sub_menu], "r");

$sql_search = " where sm_del_yn='N' ";
//if ($city) { $sql_search .= " and st_city='{$city}' "; }
if ($sopt != '' && $sval != "") { $sql_search .= " and {$sopt} like '%{$sval}%' "; }

$sql = " select count(*) as cnt from g5_sms_edan {$sql_search}";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = " select * from g5_sms_edan {$sql_search} order by sm_id desc limit {$from_record}, {$rows} ";
$result = sql_query($sql);


$g5['title'] = "문자 상담";

include_once(G5_ADMIN_PATH.'/admin.head.php');
?>

    <form name="search_form" id="search_form" action=<?php echo $_SERVER['SCRIPT_NAME'];?> class="local_sch01 local_sch" method="get">

    <label for="st" class="sound_only">검색대상</label>
    <select name="sopt" class="frm_input">
        <option value="sm_msg" <?echo get_selected("sm_msg",$sopt)?>>메시지</option>
        <option value="sm_from_hp" <?echo get_selected("sm_from_hp",$sopt)?>>발송번호</option>
        <option value="sm_to_hp" <?echo get_selected("sm_to_hp",$sopt)?>>수신번호</option>
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
                <th scope="col">등록일시 / IP</th>
                <th scope="col">발송번호</th>
                <th scope="col">수신번호</th>
                <th scope="col">메세지</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($total_count == 0) { ?>
                <tr>
                    <td colspan="<?php echo $colspan?>" class="empty_table" >
                        데이터가 없습니다.
                    </td>
                </tr>
                <?php
            }
            else {
                $bg = 'bg'.($line++%2);
                for ($i=0; $res=sql_fetch_array($result); $i++) {
                    ?>
                    <form name="frm<?php echo $i;?>" id="frm_<?php echo $i;?>" method="post" action="request_save.php?<?php echo query_except();?>">
                    <tr class="<?php echo $bg; ?>">
                        <td class="td_datetime"><?php echo date('Y-m-d H:i', strtotime($res['sm_write_dt']))?><br><?php echo $res['sm_ip']?></td>
                        <td class="td_numbig"><?php echo $res['sm_from_hp']?></td>
                        <td class="td_numbig"><?php echo $res['sm_to_hp']?>
                            <span class="btn_confirm01 btn_confirm"><input type="button" value="삭제" class="btn_submit" onclick="javascript:delSMS('<?php echo $i;?>');"></span>
                        </td>
                        <td><span title="<?php echo $res['sm_msg']?>" style="padding-bottom: 20px;"><?php echo ($res['sm_msg'])?></span><br>
                            <input type="hidden" name="sm_id" value="<?echo $res['sm_id']?>">
                            <input type="hidden" name="w" id="md_<?echo $i;?>" value="u">
                            <textarea name="adm_memo" style="height:50px;"><?php echo $res['sm_adm_memo']?></textarea>
                            <span class="btn_confirm01 btn_confirm"><input type="submit" value="저장" class="btn_submit"></span>
                        </td>
                    </tr>
                    </form>
                <?php } } ?>
            </tbody>
        </table>
    </div>

<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, $_SERVER['SCRIPT_NAME']."?sopt=$sopt&amp;sval=$sval&amp;page="); ?>
<script type="text/javascript">
function delSMS(i){
    if (confirm("선택하신 문자 상담을 삭제하시겠습니까?")) {
        $("#md_"+i).val("d");
        $("#frm_"+i).submit();
    }
}
</script>
<?php
include_once(G5_ADMIN_PATH.'/admin.tail.php');
?>