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
<body class="chinese">

    <div id="wrap">
        <div id="sub_header">
            <?php include 'top.php';?>
            <div class="sub_visual s0<?=$mmenu?>">
             <h2 class="sub_tit"><?=$mEtit[$mmenu-1]?><p class="sub_stit"><?=$mtit[$mmenu-1]?></p></h2>
         </div>

     </div>


     <div id="sub_content">


        <h2 class="sub_ctit">
            <strong><?=$stit[$mmenu-1][$smenu-1]?></strong>
            <?php if($stxt[$mmenu-1]!=''){?><span><?=$stxt[$mmenu-1]?></span><?}?>
        </h2>