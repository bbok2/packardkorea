<?php
$sub_menu = "600100";
include_once("./_common.php");

$page_size = $rows = 20;
$colspan = 11;

if ($page < 1) $page = 1;

auth_check($auth[$sub_menu], "r");

$sql_search = " where cs_del_yn='N' ";
//if ($city) { $sql_search .= " and st_city='{$city}' "; }
if ($sopt != '' && $sval != "") { $sql_search .= " and {$sopt} like '%{$sval}%' "; }

$sql = "select count(*) as cnt from g5_counseling {$sql_search}";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = " select * from g5_counseling {$sql_search} order by cs_id desc limit {$from_record}, {$rows} ";
$result = sql_query($sql);


$g5['title'] = "창업 상담";

include_once(G5_ADMIN_PATH.'/admin.head.php');
?>

    <form name="search_form" id="search_form" action=<?php echo $_SERVER['SCRIPT_NAME'];?> class="local_sch01 local_sch" method="get">

    <label for="st" class="sound_only">검색대상</label>
    <select name="sopt" class="frm_input">
        <option value="cs_name" <?echo get_selected("cs_name",$sopt)?>>성명</option>
        <option value="cs_tel" <?echo get_selected("cs_tel",$sopt)?>>연락처</option>
        <option value="cs_memo" <?echo get_selected("cs_memo",$sopt)?>>문의내용</option>
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
                <th scope="col">문의일시</th>
                <th scope="col">상태</th>
                <th scope="col">성명</th>
                <th scope="col">연락처</th>
                <th scope="col">이메일</th>
                <th scope="col">창업비용</th>
                <th scope="col">창업희망지역</th>
                <th scope="col">문의내용(50자)</th>
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
                    <tr class="<?php echo $bg; ?> tr_hover" onclick="location.href='view.php?<?echo query_except()?>&cs_id=<?=$res['cs_id']?>'">
                        <td class="td_datetime"><?php echo date('Y-m-d H:i', strtotime($res['cs_write_dt']))?></td>
                        <td class="ac"><?php echo $res['cs_status']?></td>
                        <td class="ac"><?php echo $res['cs_name']?></td>
                        <td class="ac"><?php echo $res['cs_tel']?></td>
                        <td class="ac"><?php echo $res['cs_mail']?></td>
                        <td class="ac"><?php echo $res['cs_price']?> 만원</td>
                        <td class="ac"><?php echo $res['cs_place']?></td>
                        <td><span><?php echo utf8_strcut($res['cs_memo'], 80);?></span></td>
                    </tr>
                <?php } } ?>
            </tbody>
        </table>
    </div>

<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, $_SERVER['SCRIPT_NAME']."?sopt=$sopt&amp;sval=$sval&amp;page="); ?>

<?php
include_once(G5_ADMIN_PATH.'/admin.tail.php');
?>