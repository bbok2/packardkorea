<?php
$sub_menu = "300100";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'w');

include_once('../extend/location.config.php');

$html_title = '매장';
$poimgs = array();
if ($w == '')
    $html_title .= ' 추가';
else if ($w == 'u')  {
    $html_title .= ' 수정';
    $sql = " select * from {$g5['store']} where st_id = '{$st_id}' ";
    $po = sql_fetch($sql);
    $st_tel = explode('-', $po['st_tel']);
    $poimgs = json_decode_array($po['st_img_list']);
} else
    alert('w 값이 제대로 넘어오지 않았습니다.');

$g5['title'] = $html_title;
include_once('./admin.head.php');
add_javascript(G5_POSTCODE_JS, 0);
?>

<form name="fpoll" id="fpoll" action="./store_form_update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="st_id" value="<?php echo $st_id ?>">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="token" value="">

    <div class="tbl_frm01 tbl_wrap">

        <table>
            <caption><?php echo $g5['title']; ?></caption>
            <tbody>
            <tr>
                <th scope="row">매장명</th>
                <td>
                    <input type="text" name="st_name" value="<?php echo $po['st_name'] ?>" required class="required frm_input" size="80" maxlength="125">
                </td>
            </tr>
            <tr>
                <th scope="row">주소(도로명)</th>
                <td>
                    <input type="text" name="st_new_addr" id="st_new_addr" value="<?php echo $po['st_new_addr'] ?>" required class="required frm_input" size="80" maxlength="125">
                    <span class="btn_add01 btn_add">
                        <a href="javascript:;" class="btn_type04" onclick="javascript:win_zip('fpoll', '', 'st_new_addr', 'st_old_addr', 'st_city|st_gugun', '', 0, '2');">주소찾기</a>
                    </span>
                </td>
            </tr>
            <tr>
                <th scope="row">주소(지번)</th>
                <td><input type="text" name="st_old_addr" id="st_old_addr" value="<?php echo $po['st_old_addr'] ?>" required class="required frm_input" size="80" maxlength="125"></td>
            </tr>
            <tr>
                <th scope="row">지역</th>
                <td>
                    <select name="st_city" onchange="javascript:getGugun(this.value, '#st_gugun');" required class="required frm_input">
                        <option value="">-시/도-</option>
                        <?php
                        foreach ($sidoData as $k=>$v){
                            echo "<option value='{$k}'";
                            echo get_selected($po['st_city'], $k);
                            echo ">{$v}</option>" . PHP_EOL;
                        }
                        ?>
                    </select>

                    <select name="st_gugun" id="st_gugun" required class="required frm_input">
                        <option value="">-구/군-</option>
                        <?php
                        if ($w == 'u') {
                            foreach ($gugunData[$po['st_city']] as $k => $v) {
                                echo "<option value='{$k}'";
                                echo get_selected($po['st_gugun'], $k);
                                echo ">{$v}</option>" . PHP_EOL;
                            }
                        }
                        ?>
                    </select>
                    &nbsp;&nbsp;&nbsp;
                    사업자번호 : <input type="text" name="st_busino" value="<?php echo $po['st_busino'] ?>" class="frm_input" size="20" maxlength="15">
                </td>
            </tr>
            <tr>
                <th scope="row">위치(GPS좌표)</th>
                <td>
                    <input type="text" name="st_gps_lat" id="st_gps_lat" value="<?php echo $po['st_gps_lat'] ?>" required class="required frm_input" size="25" maxlength="25">,
                    <input type="text" name="st_gps_long" id="st_gps_long" value="<?php echo $po['st_gps_long'] ?>" required class="required frm_input" size="25" maxlength="25">
                    <span class="btn_add01 btn_add">
                        <!-- a href="javascript:;" onclick="javascript:openGoogleGeo({ 'addrId':'#st_old_addr', 'callback':'setLatLng', 'lat':'st_gps_lat', 'lng':'st_gps_long' });">GPS 위치</a -->
                        <a href="javascript:;" class="btn_type04" onclick="javascript:openNaverGeo({ 'addrId':'#st_old_addr', 'callback':'setLatLng', 'lat':'st_gps_lat', 'lng':'st_gps_long' });">GPS 위치</a>
                    </span>
                </td>
            </tr>
            <tr>
                <th scope="row">전화번호</th>
                <td>
                    <input type="text" name="st_tel[0]" value="<?php echo $st_tel[0] ?>" required class="required frm_input" size="5" maxlength="4"> -
                    <input type="text" name="st_tel[1]" value="<?php echo $st_tel[1] ?>" required class="required frm_input" size="6" maxlength="4"> -
                    <input type="text" name="st_tel[2]" value="<?php echo $st_tel[2] ?>" required class="required frm_input" size="6" maxlength="4">
                    &nbsp;&nbsp;&nbsp;점주명 :  <input type="text" name="st_owner" value="<?php echo $po['st_owner'] ?>" class="frm_input" size="20" maxlength="15">
                    &nbsp;&nbsp;
                    매장오픈일 : <input type="text" name="st_open_ymd" value="<?php echo $po['st_open_ymd'] ?>" class="frm_input" size="15" maxlength="15">
                    * 반드시 2017-07-15 형식으로 입력하세요.
                </td>
            </tr>
            <tr>
                <th scope="row">영업시간</th>
                <td>
                    <textarea name="st_op_time" style="width: 400px;height:100px"><?php echo $po['st_op_time'] ?></textarea>
                </td>
            </tr>
            <tr>
                <th scope="row">옵션</th>
                <td>
                    <label><input type="checkbox" name="st_dlvr_yn" value="Y" <?php echo get_checked("Y",$po['st_dlvr_yn']);?>> 배달 가능</label>
                    <label style="padding-left:20px"><input type="checkbox" name="st_new_yn" value="Y" <?php echo get_checked("Y",$po['st_new_yn']);?>> 신규 오픈점</label>
                    <label style="padding-left:20px"><input type="checkbox" name="st_yet_yn" value="Y" <?php echo get_checked("Y",$po['st_yet_yn']);?>> 오픈 예정점</label>
                </td>
            </tr>
            <tr>
                <th scope="row">매장이미지</th>
                <td>
                <?
                for ($i=1; $i<=8; $i++) :
                ?>
                <label style="padding-right: 20px;"><input type="radio" name="st_img_no" value="<?echo $i;?>"<?
                    if ($w=='') {
                        if ($i == 1) echo " checked";
                    }
                    else {
                        if ($i == $po['st_img_no']) echo 'checked';
                    }?>> 대표이미지</label> <input type="file" name="fileimg[<?echo $i?>]">
                <? if ($w == 'u') { ?>
                    <?if ($poimgs[$i] != "") {?><a href="/data/store/<?echo $poimgs[$i];?>" target="_blank"><?echo $poimgs[$i];?></a><?}?>
                    <label style="padding-left:40px;"><input type="checkbox" name="chkdel[<?echo $i?>]" value="Y"> 삭제</label>
                <? } ?>
                <input type="hidden" name="oldfileimg[<?echo $i?>]" value="<?echo $poimgs[$i]?>"><br>
                <?
                endfor
                ?>
                </td>
            </tr>
            </tbody>
        </table>

    </div>

    <div class="btn_confirm01 btn_confirm">
        <input type="submit" value="확인" class="btn_submit" accesskey="s">
        <a href="./store_list.php?<?php echo $qstr ?>" class="btn_type01">목록</a>
    </div>

</form>
<script type="text/javascript">
function setLatLng(position) {
    $("#st_gps_lat").val(position.lat);
    $("#st_gps_long").val(position.lng);
}
</script>
<?php
include_once('./admin.tail.php');
?>
