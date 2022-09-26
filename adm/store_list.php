<?php
$sub_menu = "300100";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'r');

include_once('../extend/location.config.php');

$sql_common = " from {$g5['store']} ";

$sql_search = " where (1) ";

if ($city) { $sql_search .= " and st_city='{$city}' "; }
if ($dlvr == 'Y' || $dlvr == 'N') { $sql_search .= " and st_dlvr_yn='{$dlvr}' "; }

if ($opnew=='Y') { $sql_search .= " and st_new_yn='Y' "; }
if ($opyet=='Y') { $sql_search .= " and st_yet_yn='Y' "; }

if ($stx) {
    $sql_search .= " and ( ";
        switch ($sfl) {
            default :
            $sql_search .= " ({$sfl} like '%{$stx}%') ";
            break;
        }
        $sql_search .= " ) ";
}

if (!$sst) {
    $sst  = "st_id";
    $sod = "desc";
}
$sql_order = " order by {$sst} {$sod} ";

$sql = " select count(*) as cnt
{$sql_common}
{$sql_search}
{$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = " select *
{$sql_common}
{$sql_search}
{$sql_order}
limit {$from_record}, {$rows} ";
$result = sql_query($sql);

$listall = '<a href="'.$_SERVER['SCRIPT_NAME'].'" class="ov_listall">전체목록</a>';

$g5['title'] = '매장관리';
include_once('./admin.head.php');


if ($qstr == '') { $qstr.= "&"; }
$qstr = "&city={$city}&dlvr={$dlvr}&opnew={$opnew}&opyet={$opyet}";
$colspan = 7;
?>
<div class="local_ov01 local_ov">
    <?php echo $listall ?>
    매장수 <?php echo number_format($total_count) ?>개
</div>

<form name="fsearch" id="fsearch" class="local_sch01 local_sch" method="get">
    <div class="sch_last">
        <label for="sfl" class="sound_only">검색대상</label>
        <select name="city">
            <option value="">-시도 전체-</option>
            <?php
            foreach ($sidoData as $k=>$v){
                echo "<option value='{$k}'";
                echo get_selected($_GET['city'], $k);
                echo ">{$v}</option>" . PHP_EOL;
            }
            ?>
        </select>
        <select name="dlvr">
            <option value="">-배달-</option>
            <option value="Y"<?php echo get_selected($_GET['dlvr'], "st_dlvr_yn"); ?>>배달가능</option>
            <option value="N"<?php echo get_selected($_GET['dlvr'], "st_dlvr_yn"); ?>>배달불가</option>
        </select>

        <label><input type="checkbox" name="opnew" <?php echo get_checked("Y",$opnew);?> value="Y" /> 신규오픈</label>
        <label><input type="checkbox" name="opyet" <?php echo get_checked("Y",$opyet);?> value="Y" /> 오픈예정</label>
        /
        <select name="sfl" id="sfl">
            <option value="st_name"<?php echo get_selected($_GET['sfl'], "st_name"); ?>>매장명</option>
            <option value="st_old_addr"<?php echo get_selected($_GET['sfl'], "st_old_addr"); ?>>지번주소</option>
            <option value="st_new_addr"<?php echo get_selected($_GET['sfl'], "st_new_addr"); ?>>도로명주소</option>
            <option value="st_owner"<?php echo get_selected($_GET['sfl'], "st_owner"); ?>>사업자명의</option>
        </select>
        <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
        <input type="text" name="stx" value="<?php echo $stx ?>" id="stx" class="frm_input">
        <input type="submit" class="btn_submit" value="검색">
    </div>
</form>

<div class="btn_add01 btn_add">
    <a href="./store_form.php" id="poll_add" class="btn_type03">매장 추가</a>
</div>

<form name="fpolllist" id="fpolllist" action="./store_form_update.php" method="post">
    <input type="hidden" name="w" value="">
    <input type="hidden" name="city" value="<?php echo $city ?>">
    <input type="hidden" name="dlvr" value="<?php echo $dlvr ?>">
    <input type="hidden" name="opnew" value="<?php echo $opnew ?>">
    <input type="hidden" name="opyet" value="<?php echo $opyet ?>">

    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="token" value="">

    <div class="tbl_head01 tbl_wrap">
        <table>
            <caption><?php echo $g5['title']; ?> 목록</caption>
            <thead>
                <tr>
                    <th scope="col">
                        <label for="chkall" class="sound_only">현재 페이지 매장 전체</label>
                        <label><input type="checkbox" name="chkall" value="1" id="chkall" onclick="check_all(this.form)"></label>
                    </th>                    
                    <th scope="col">매장명</th>
                    <th scope="col">지역</th>
                    <th scope="col">주소(도로명)</th>
                    <th scope="col">전화번호</th>
                    <th scope="col">배달가능</th>
                    <th scope="col">신규오픈</th>
                    <th scope="col">오픈예정</th>
                    <th scope="col">등록일</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i=0; $row=sql_fetch_array($result); $i++) {
                    $po_etc = ($row['st_dlvr_yn'] == "Y") ? "배달가능" : "배달불가";
                    $po_etc .= ($row['st_new_yn'] == "Y") ? ", 신규오픈" : "";
                    $po_etc .= ($row['st_yet_yn'] == "Y") ? ", 오픈예정" : "";
                    $bg = 'bg'.($i%2);
                    ?>

                    <tr class="<?php echo $bg; ?> tr_hover">
                        <td class="td_chk">
                            <label for="chk_<?php echo $i; ?>" class="sound_only"><?php echo cut_str(get_text($row['po_subject']),70) ?> 매장</label>
                            <input type="checkbox" name="chk[]" value="<?php echo $row['st_id'] ?>" id="chk_<?php echo $i ?>">
                        </td>                        
                        <td class="ac" onclick="location.href='./store_form.php?<?echo $qstr?>&amp;w=u&amp;st_id=<?echo $row['st_id']?>'"><?php echo cut_str(get_text($row['st_name']),70) ?></td>
                        <td class="" onclick="location.href='./store_form.php?<?echo $qstr?>&amp;w=u&amp;st_id=<?echo $row['st_id']?>'"><?php echo $sidoData[$row['st_city']] ?> <?php echo $gugunData[$row['st_city']][$row['st_gugun']] ?></td>
                        <td class="" onclick="location.href='./store_form.php?<?echo $qstr?>&amp;w=u&amp;st_id=<?echo $row['st_id']?>'"><?php echo $row['st_new_addr'] ?></td>
                        <td class="ac" onclick="location.href='./store_form.php?<?echo $qstr?>&amp;w=u&amp;st_id=<?echo $row['st_id']?>'"><?php echo $row['st_tel'] ?></td>



                        <td class="td_etc">
                            <div class="switch">
                               <input type="radio" id="no<?echo $row['st_id']?>" class="switch-input" name="st_dlvr_yn[<?echo $row['st_id']?>]" value="N"<?php echo get_checked("N",$row['st_dlvr_yn']);?>>
                               <label for="no<?echo $row['st_id']?>" class="switch-label switch-label-off">불가</label>
                               <input type="radio" id="yes<?echo $row['st_id']?>" class="switch-input" name="st_dlvr_yn[<?echo $row['st_id']?>]" value="Y"<?php echo get_checked("Y",$row['st_dlvr_yn']);?>>
                               <label for="yes<?echo $row['st_id']?>" class="switch-label switch-label-on">가능</label>
                               <span class="switch-selection"></span>
                               <span class="switch-bg"></span>
                           </div>
                       </td>
                       <td class="td_etc">
                         <div class="switch">
                           <input type="radio" id="o_no<?echo $row['st_id']?>" class="switch-input" name="st_new_yn[<?echo $row['st_id']?>]" value="N"<?php echo get_checked("N",$row['st_new_yn']);?>>
                           <label for="o_no<?echo $row['st_id']?>" class="switch-label switch-label-off">불가</label>
                           <input type="radio" id="o_yes<?echo $row['st_id']?>" class="switch-input" name="st_new_yn[<?echo $row['st_id']?>]" value="Y"<?php echo get_checked("Y",$row['st_new_yn']);?>>
                           <label for="o_yes<?echo $row['st_id']?>" class="switch-label switch-label-on">가능</label>
                           <span class="switch-selection"></span>
                           <span class="switch-bg"></span>
                       </div>


                   </td>
                   <td class="td_etc">

                     <div class="switch">
                       <input type="radio" id="r_no<?echo $row['st_id']?>" class="switch-input" name="st_yet_yn[<?echo $row['st_id']?>]" value="N"<?php echo get_checked("N",$row['st_yet_yn']);?>>
                       <label for="r_no<?echo $row['st_id']?>" class="switch-label switch-label-off">불가</label>
                       <input type="radio" id="r_yes<?echo $row['st_id']?>" class="switch-input" name="st_yet_yn[<?echo $row['st_id']?>]" value="Y"<?php echo get_checked("Y",$row['st_yet_yn']);?>>
                       <label for="r_yes<?echo $row['st_id']?>" class="switch-label switch-label-on">가능</label>
                       <span class="switch-selection"></span>
                       <span class="switch-bg"></span>
                   </div>



               </td>
               <td class="td_mngsmall"><?php echo conv_date_format('Y-m-d', $row['st_reg_dt']); ?></td>
           </tr>



           <?php
       }

       if ($i==0)
        echo '<tr><td colspan="'.$colspan.'" class="empty_table">자료가 없습니다.</td></tr>';
    ?>
</tbody>
</table>
</div>



<div class="btn_list01 btn_list">
    <input type="button" value="선택삭제" onclick="javascript:checkedDel();" class="btn_type02">
    <input type="button" value="옵션저장" onclick="javascript:optSave();" class="btn_type01">
</div>
</form>

<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, "{$_SERVER['SCRIPT_NAME']}?$qstr&amp;page="); ?>

<script>
function checkedDel() {
    if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
        if (!is_checked("chk[]")) {
            alert("선택삭제 하실 항목을 하나 이상 선택하세요.");
            return;
        }
        fpolllist.w.value = "d";
        fpolllist.submit();
    } else {
        return;
    }
}

function optSave() {
    fpolllist.w.value = "o";
    fpolllist.submit();
}




</script>

<?php
include_once ('./admin.tail.php');
?>
