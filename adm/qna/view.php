<?php
$sub_menu = "600100";
include_once("./_common.php");

auth_check($auth[$sub_menu], "r");

$g5['title'] = "창업 상담";

if ($cs_id == '') { alert("상담번호가 올바르지 않습니다."); }

$sql = "select * from g5_counseling where cs_id={$cs_id}";
$res = sql_fetch($sql);
if (!$res) { alert("상담번호가 올바르지 않습니다."); }

include_once(G5_ADMIN_PATH.'/admin.head.php');
?>
<form name="fmailform" id="fmailform" action="./view_save.php?<?php echo query_except("cs_id")?>" method="post">
    <div class="tbl_frm01 tbl_wrap">
        <table>
            <caption><?php echo $g5['title']; ?></caption>
            <colgroup>
                <col class="grid_4">
                <col>
            </colgroup>
            <tbody>
            <tr>
                <th scope="row">등록 일시</th>
                <td><?php echo date('Y-m-d H:i', strtotime($res['cs_write_dt']))?></td>
            </tr>
            <tr>
                <th scope="row">상담자 정보</th>
                <td>
                    <span>성명 : <?php echo $res['cs_name']?></span>
                    <span style="padding-left: 30px;padding-right: 30px;">연락처 : <?php echo $res['cs_tel']?></span>
                    <span>이메일 : <?php echo $res['cs_mail']?></span>
                </td>
            </tr>
            <tr>
                <th scope="row">창업 정보</th>
                <td>
                    <span>창업비용 : <?php echo $res['cs_price']?>만원</span>
                    <span style="padding-left: 30px;padding-right: 30px;">희망지역 : <?php echo $res['cs_place']?></span>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="ma_content">상담 내용<strong class="sound_only">필수</strong></label></th>
                <td><?php echo nl2br(htmlspecialchars2($res['cs_memo']));?></td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="tbl_frm01 tbl_wrap" style="padding-top:30px;">
        <table>
            <colgroup>
                <col class="grid_4">
                <col>
            </colgroup>
            <tr>
                <th scope="row">상담 상태</th>
                <td>
                    <input type="hidden" name="w" value="u" />
                    <input type="hidden" name="cs_id" value="<?php echo $res['cs_id'];?>" />
                    <select name="cs_status">
                        <option value="신규">신규</option>
                        <option value="상담중" <?php echo get_selected("상담중", $res['cs_status'])?>>상담중</option>
                        <option value="보류중" <?php echo get_selected("보류중", $res['cs_status'])?>>보류중</option>
                        <option value="상담완료" <?php echo get_selected("상담완료", $res['cs_status'])?>>상담완료</option>
                    </select>
                    <?php if ($res['cs_upd_dt'] != null) { echo date('Y-m-d H:i', strtotime($res['cs_upd_dt'])); }?>
                </td>
            </tr>
            <tr>
                <th scope="row">상담 메모</th>
                <td>
                    <textarea name="cs_adm_memo"><?php echo $res['cs_adm_memo']; ?></textarea>
                </td>
            </tr>
        </table>
    </div>

    <div class="btn_confirm01 btn_confirm">
        <input type="submit" class="btn_submit" accesskey="s" value="저장">
        <input type="button" class="btn_submit" value="목록" onclick="javascript:location.href='list.php?<?php echo query_except('cs_id');?>';">
        <input type="button" class="btn_submit" value="삭제" onclick="javascript:delQna();">
    </div>
</form>

<script type="text/javascript">
function delQna() {
    if (confirm("현재의 상담을 정말 삭제하시겠습니까?")) {
        document.fmailform.w.value = "d";
        document.fmailform.submit();
    }
}
</script>
<?php
include_once(G5_ADMIN_PATH.'/admin.tail.php');
?>
