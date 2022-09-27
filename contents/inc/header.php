<?php


if($bo_table=="notice"){
    $mmenu = 7;
    $smenu = 1;
}else if($bo_table=="free"){
    $mmenu = 7;
    $smenu = 2;
}else if($bo_table=="recruit"){
    $mmenu = 5;
    $smenu = 2;
}else if($bo_table=="skill"){
    $mmenu = 7;
    $smenu = 2;
}


include 'config.php'

?>	
<body>
	
    <div id="wrap">
        <div id="sub_header">
            <?php include 'top.php';?>
            <div class="sub_visual s0<?=$mmenu?>">
             <h2 class="sub_tit"><?=$mEtit[$mmenu-1]?><p class="sub_stit"><?=$mtit[$mmenu-1]?></p></h2>
         </div>

     </div>


     <div id="sub_content">

        <div class="wrap_nav">
            <div class="clear">
                <ul class="nav fl">
                    <li class="nav_home"><a href="/main/main.php"><img src="/img/ico/ico_house.png" alt="홈으로가기"></a></li>
                    <li class="nav_depth01">
                        <a href="#none"><span><?=$mtit[$mmenu-1]?></span></a>
                        <ul>    
                            <li><a href="/contents/about/overview.php"><span>회사소개</span></a></li>
                            <li><a href="/contents/business/wiring_harness.php"><span>사업소개</span></a></li>
                            <li><a href="/contents/develop/field.php"><span>연구개발</span></a></li>
                            <li><a href="/contents/management/produce.php"><span>생산공정 및 품질관리</span></a></li>
                            <li><a href="/contents/recruit/talent.php"><span>채용정보</span></a></li>
                            <li><a href="/contents/promote/media.php"><span>홍보센터</span></a></li>
                            <li><a href="/contents/cscenter/notice.php"><span>고객센터</span></a></li>
                        </ul>
                    </li>
                    <li class="nav_depth02">
                        <a href="#none"><span><?=$stit[$mmenu-1][$smenu-1]?></span></a>
                        <ul>
                            <?php include 'smenu.php';?>
                        </ul>
                    </li>
                </ul>
                <ul class="fr">    
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
        <h2 class="sub_ctit">
            <strong><?=$stit[$mmenu-1][$smenu-1]?></strong>
            <? php if($stxt[$mmenu-1]!=''){ ?><span><?=$stxt[$mmenu-1]?></span><?}?>
        </h2>