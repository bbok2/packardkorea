<?php
$sub_menu = "400100";
include_once("./_common.php");

$page_size = $rows = 20;
$colspan = 11;

if ($page < 1) $page = 1;

auth_check($auth[$sub_menu], "r");

$sql_search = " where (pr_del_yn='N') ";
if ($cat) { $sql_search .= " and pr_cats like '%,{$cat}%' "; }
if ($sopt != '' && $sval != "") {
    if ($sopt == 'pr_desc') {
        $sql_search .= " and pr_desc like '%{$sval}%' ";
    }
    else {
        $sql_search .= " and (pr_nm_kr like '%{$sval}%' or pr_nm_en like '%{$sval}%') ";
    }
}

$sql = "select count(*) as cnt from g5_product {$sql_search}";

$row = sql_fetch($sql);
$total_count = $row['cnt'];

$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = " select * from g5_product {$sql_search} order by pr_sort asc, pr_id desc limit {$from_record}, {$rows} ";
$result = sql_query($sql);


$g5['title'] = "상품 관리";

include_once(G5_ADMIN_PATH.'/admin.head.php');
?>
<script type="text/javascript" src="/common/js/validate.lib.js"></script>
    <form name="search_form" id="search_form" action=<?php echo $_SERVER['SCRIPT_NAME'];?> class="local_sch01 local_sch" method="get">

    <label for="st" class="sound_only">검색대상</label>
    <select name="cat" class="frm_input">
        <option value="">-카테고리-</option>
    <?php foreach ($prodCategory as $k=>$v) { ?>
    <option value="<?php echo $k?>"<?echo get_selected($k,$cat)?>><?php echo $v['en'];?></option>
    <?php }?>
    </select> /

    <select name="sopt" class="frm_input">
        <option value="pr_nm"<?echo get_selected("prd_nm",$sopt)?>>상품명(한/영)</option>
        <option value="pr_desc"<?echo get_selected("prd_nm",$sopt)?>>설명</option>
    </select>
    <input type="text" name="sval" value="<?php echo $sval ?>" id="sv" class="frm_input">
    <input type="submit" value="검색" class="btn_submit">

    </form>

    <div class="tbl_head01 tbl_wrap">
        * <?php echo $total_count?> 건 검색
        <table>
            <caption><?php echo $g5['title']; ?> 목록</caption>
            <thead>
            <tr>
                <th scope="col" width="120">이미지</th>
                <th scope="col">상품명</th>
                <th scope="col" width="120">카테고리</th>
                <th scope="col" width="500">설명</th>
                <th scope="col" width="120">등록일시</th>
                <th scope="col">저장</th>
            </tr>
            </thead>
            <tbody>
            <form name="frmAdd" method="post" enctype="multipart/form-data" action="save.php" onsubmit="javascript:return formCheck(this);">
            <input type="hidden" name="pr_id" value="" />
            <input type="hidden" name="w" value="" />
            <tr>
                <td>&nbsp;</td>
                <td style="line-height:26px;">
                    이미지 : <input type="file" name="pr_img" data-valid="required,allowext[jpg|gif|png]"><br>
                    한글 : <input type="text" name="pr_nm_kr" class="frm_input" maxlength="200" size="50" data-valid="required"><br>
                    영문 : <input type="text" name="pr_nm_en" class="frm_input" maxlength="200" size="50">
                </td>
                <td><?php foreach ($prodCategory as $k=>$v) {
                        echo "<label><input type='checkbox' name='pr_cats[]' value='{$k}'> {$v['en']}</label><br>";
                    }?></td>
                <td><textarea rows="3" cols="60" name="pr_desc"></textarea></td>
                <td class="td_numbig">정렬번호 : <input type="text" name="pr_sort" class="frm_input" value="9999" size="10"></td>
                <td>
                    <div class="btn_confirm01 btn_confirm"><input type="submit" value="추가" class="btn_submit" accesskey="s"></div>
                </td>
            </tr>
            </form>
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
                    <form name="frmEdit<?php echo $i;?>" method="post" enctype="multipart/form-data" action="save.php?<?php echo query_except();?>" onsubmit="javascript:return formCheck(this);">
                    <input type="hidden" name="w" value="u" />
                    <input type="hidden" name="pr_id" value="<?php echo $res['pr_id'];?>" />
                    <tr class="<?php echo $bg; ?>">
                        <td class="td_datetime"><img src="/data/product/<?php echo $res['pr_img'];?>" width="100" height="80"></td>
                        <td style="line-height:26px;">
                        이미지 : <input type="file" name="pr_img" data-valid="allowext[jpg|gif|png]"><br>
                        한글 : <input type="text" name="pr_nm_kr" class="frm_input" maxlength="200" size="50" value="<?php echo get_text($res['pr_nm_kr']);?>" data-valid="required"><br>
                        영문 : <input type="text" name="pr_nm_en" class="frm_input" maxlength="200" size="50" value="<?php echo get_text($res['pr_nm_en']);?>">
                        </td>
                        <td>
                        <?php foreach ($prodCategory as $k=>$v) {
                        echo "<label><input type='checkbox' name='pr_cats[]' value='{$k}'";
                        if (strpos($res['pr_cats'], ",". $k) !== false) { echo " checked"; }
                        echo "> {$v['en']}</label><br>";
                        }?>
                        </td>
                        <td><textarea rows="3" cols="60" name="pr_desc"><?php echo $res['pr_desc'];?></textarea></td>
                        <td class="td_numbig">
                           <?php echo date('Y-m-d H:i', strtotime($res['pr_reg_dt']))?><br><br>
                           정렬번호 : <input type="text" name="pr_sort" class="frm_input" value="<?php echo $res['pr_sort'] ?>" size="10">
                        </td>
                        <td class="td_datetime">
                            <div class="btn_confirm01 btn_confirm">
                                <input type="submit" value="수정" class="btn_submit">
                                <input type="button" value="삭제" class="btn_cancel" onclick="javascript:delProd(document.frmEdit<?php echo $i;?>);">
                            </div>
                        </td>
                    </tr>
                    </form>
                <?php } } ?>
            </tbody>
        </table>
    </div>

<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, $_SERVER['SCRIPT_NAME']."?sopt=$sopt&amp;sval=$sval&amp;page="); ?>
<script type="text/javascript">
function delProd(f) {
    if (confirm("선택하신 상품을 정말 삭제하시겠습니까?")) {
        f.w.value = 'd';
        f.submit();
    }
}
</script>
<?php
include_once(G5_ADMIN_PATH.'/admin.tail.php');
?>
