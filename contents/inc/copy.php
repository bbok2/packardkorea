<div id="footer">
    <div class="top">   
        <div class="content ta_l clear">   
            <h2 class="fl">(주)패커드코리아</h2>
            <ul class="fl">
                <li class="ml0">
					<a href="#none" class="pop_pri">개인정보처리방침</a>
					<div class="priarea"><?php include '../contents/privacy/privacy.php';?></div>
				</li>
            </ul>
            <div class="family fr">
                <p>패밀리사이트</p>
                <ul>
                    <li><a href="http://www.dhsol.com" target="_blank">대한솔루션</a></li>
                    <li><a href="https://www.aptiv.com/" target="_blank">APTIV</a></li>
                </ul>
            </div> 
        </div>
    </div>        
    <div class="btm">   
        <div class="content ta_c">
            <p class="mb5">
                <span>본사 및 천안공장 : 충청남도 천안시 서북구 직산읍 부송상덕길 5-14</span>
                <span>전화 : (+82)-41-580-8114</span>
                <span>FAX : (+82)-41-584-6001</span>
            </p>
            <span>COPYRIGHT (c) 2018 packard korea INC. All Right Reserved</span>
            <a href="/bbs/login.php?url=/adm" class="adm_btn">admin</a>
        </div>
    </div>          
</div> 

<div class="go_top">
    <a href="#none"><span><!-- TOP --></span></a>
</div>




<div class="popMask"></div>
<div class="pop pop01">
    <p class="popClose"></p>
    <div class="popCont"></div>
</div>


<script>
var popMask = $('.popMask'),
pop = $('.pop'),
prd_list = $('.pop_pri'),
popClose = $('.popClose');

prd_list.on('click',function(){
    var popCont = $('.priarea').html();

    pop.find('.popCont').html(popCont);
    popMask.show();     
    pop.delay(400).fadeIn(300);

    return false;

})
popMask.on('click',function(){
    $(this).hide();
    pop.hide();
    pop.find('.popCont').html('');
})
popClose.on('click',function(){
    popMask.hide();
    pop.hide(); 
    pop.find('.popCont').html('');
})
</script>

<script>
mmenu = <?=$mmenu?>;
smenu = <?=$smenu?>;
</script>


<?if($pos){?>
<script>
console.log('asas')
$('html,body').animate({
    'scrollTop' : $('.<?=$pos?>').offset().top-100
},900,'easeInOutQuart');
</script>
<?}?>