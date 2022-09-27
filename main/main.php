<?php
$mmenu = 9999;
$smenu = 9999;
include_once '../contents/inc/config.php';
// include_once '../common.php';  // 디비연결해야 오류 안남
include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
?>

<body class="">
    <div id="wrap">

        <div class="main num1">
            <?php include '../contents/inc/top.php';?>
            <div class="main_visual">
                <div class="content">
                    <div class="mainslide">
                        <ul>
                            <li class="ms_list07"></li>
                            <li class="ms_list04"></li>
                            <li class="ms_list03"></li>
                            <li class="ms_list06"></li>
                            <li class="ms_list05"></li>
                        </ul>
                    </div>
                    <script>
                    $(document).on('ready',function(){
                        // $('.mainslide>ul').on('init', function(event, slick) {
                        //     $(".slick-slide").eq(0).addClass("active");
                        // });
                        // $('.mainslide>ul').on('afterChange', function(event, slick, currentSlide, nextSlide){
                        //     $(".slick-slide").removeClass("active");
                        //     $(this).find(".slick-slide").eq(currentSlide).addClass("active")
                        // });

                        $('.mainslide>ul').slick({
                            dots: false,
                            infinite: true,
                            arrows:true,
                            pauseOnHover:false,
                            autoplay:true,
                            fade:true,
                            autoplaySpeed: 7000,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            cssEase: 'linear'
                        });

                        $('.visual .txt02').css('opacity',0).delay(1500).animate({
                            'opacity':1,
                            'marginTop':'5px'
                        },1200);
                        $('.visual .txt03').css('opacity',0).delay(1800).animate({
                            'opacity':1,
                            'marginTop':'5px'
                        },1200);

                    })
</script>
<div class="visual">
    <!-- <p class="txt01">A Spirit of</p> -->
    <p class="txt02">신성장 동력 개발, 우리의 미래</p>
    <p class="txt03">㈜패커드코리아는 업계 선두의 기술력과 신뢰를 바탕으로 한국 자동차산업의 발전에 충실히 기여하고 있습니다.</p>
</div>
</div>
</div>
</div>

<div id="sec01" class="intro num2">
    <div class="content">
        <p class="txt01">Be Recognized by our Customers as their Best Supplier!</p>
        <p class="txt02">㈜패커드코리아는 업계 선두의 기술력과 신뢰를 바탕으로 한국 자동차산업의 발전에 충실히 기여하고 있습니다. </p>
        <div class="btn">
            <a href="/contents/about/overview.php" class="btn_type01"><span>회사소개</span></a>
        </div>
    </div>
</div>

<div id="sec02" class="business num3 stg_w">
    <div class="content">
        <h2 class="con_tit">사업영역</h2>
        <div class="top clear">
            <div class="box box01 motion_stg">
                <div class="">
                    <div class="txt">
                        <h3 class="m_tit">Wiring Harness</h3>
                        <p class="m_stit">복잡한 W/Harness System의 자체 설계능력을 보유</p>
                        <div class="btn">
                            <a href="/contents/business/wiring_harness.php" class="btn_type08"><span>more</span></a>
                        </div>
                    </div>
                    <div class="img">
                        <!--img src="/img/@img_business01.jpg" alt=""-->
                    </div>
                </div>
            </div>
            <div class="box box02 motion_stg">
                <div>
                    <div class="txt">
                        <h3 class="m_tit">Component</h3>
                        <p class="m_stit">부품의 표준 CODE 및 SYMBOL의 DATA BASE를 구축</p>
                        <div class="btn">
                            <a href="/contents/business/component.php" class="btn_type08"><span>more</span></a>
                        </div>
                    </div>
                    <div class="img">
                        <!--img src="/img/@img_business02.jpg" alt=""-->
                    </div>
                </div>
            </div>
        </div>
        <div class="btm cleardiv">
            <div class="box box04 motion">
                <div>
                    <div class="txt">
                        <h3 class="m_tit">홍보영상</h3>
                        <p class="m_stit">(주)패커드코리아의 홍보영상을 보실 수 있습니다.</p>
                        <div class="btn">
                            <a href="/contents/promote/media.php" class="btn_type02"><span class="hide">more</span></a>
                        </div>
                    </div>
                    <div class="img">
                        <!--img src="/img/@img_business04.jpg" alt=""-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="sec03" class="develope num4 stg_w">
    <div class="content">
        <ul class="clear">
            <li class="develope_tit motion_stg">
                <div class="ml0">
                    <h2>연구개발</h2>
                    <p>신기술로 경쟁력 우위 확보와 고객만족을 실현합니다.</p>
                </div>
            </li>
            <li class="dev01 motion_stg">
                <div>
                    <a href="/contents/develop/field.php">
                        <div class="img"></div>
                        <p class="tit">연구소 소개</p>
                    </a>
                </div>
            </li>
            <li class="dev02 motion_stg">
                <div>
                    <a href="/contents/develop/research.php">
                        <div class="img"></div>
                        <p class="tit">연구개발</p>
                    </a>
                </div>
            </li>
            <li class="dev03 motion_stg">
                <div class="mr0">
                    <a href="/contents/develop/tools.php?pos=sec02">
                        <div class="img"></div>
                        <p class="tit">시험설비</p>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>

<div id="sec04" class="system clear num5 stg_w">
    <div class="management motion_stg">
        <h2 class="m_tit">품질경영</h2>
        <p class="m_stit">고객 기대치 이상의 고객 만족</p>
        <div class="btn">
            <a href="/contents/management/quality.php" class="btn_type04"><span>품질경영시스템</span></a>
        </div>
    </div>
    <div class="process motion_stg">
        <h2 class="m_tit">생산공정</h2>
        <p class="m_stit">제품에 기술과 정성을 담는 생산공정</p>
        <div class="btn">
            <a href="/contents/business/wiring_harness.php?pos=sec02" class="btn_type04"><span>생산공정안내</span></a>
        </div>
    </div>
</div>

<div id="sec05" class="recruitment num6 stg_w">
    <div class="content">
        <h2 class="con_tit">인재채용</h2>
        <ul class="clear">
            <li class="fl recu01 motion_stg">
                <div class="txt">
                    <h3 class="m_tit">채용정보</h3>
                    <p class="m_stit">채용정보에 대해 안내 해드립니다.</p>
                    <div class="btn">
                        <a href="/contents/recruit/talent.php" class="btn_type09"><span>더보기</span></a>
                    </div>
                </div>
            </li>
            <li class="fr recu02 motion_stg">
                <div class="txt">
                    <h3 class="m_tit">채용공고</h3>
                    <p class="m_stit">채용공고를 확인하실 수 있습니다.</p>
                    <div class="btn">
                        <a href="/bbs/board.php?bo_table=recruit" class="btn_type09"><span>더보기</span></a>
                    </div>
                </div>
            </li>

        </ul>
    </div>
</div>

<div id="sec06" class="partner num7 motion">
    <div class="content">
        <h2 class="con_tit">주요고객사</h2>
        <ul class="grid clear">
            <li class="grid-item"><img src="/img/common/partners01.jpg" alt="GM 코리아"></li>
            <li class="grid-item"><img src="/img/common/partners02.jpg" alt="르노삼성자동차"></li>
            <li class="grid-item"><img src="/img/common/partners03.jpg" alt="현대자동차"></li>
            <li class="grid-item"><img src="/img/common/partners04.jpg" alt="기아자동차"></li>
            <li class="grid-item"><img src="/img/common/partners07.jpg" alt="닛산"></li>
            <li class="grid-item"><img src="/img/common/partners05.jpg" alt="쌍용자동차"></li>
            <li class="grid-item"><img src="/img/common/partners06.jpg" alt="두산인프라코어"></li>
            <li class="grid-item"><img src="/img/common/partners11.jpg" alt="현대건설"></li>
            <li class="grid-item"><img src="/img/common/partners00.jpg" alt="APTIV"></li>
            <li class="grid-item"><img src="/img/common/partners08.jpg" alt="대한"></li>
            <li class="grid-item"><img src="/img/common/partners09.jpg" alt="한온시스템"></li>
            <li class="grid-item"><img src="/img/common/partners10.jpg" alt="대한 칼소닉"></li>
            <li class="grid-item"><img src="/img/common/partners12.jpg" alt="에스엘"></li>

        </ul>
    </div>
</div>
<!--
<div id="sec07" class="notice clear num8">
<div class="fl">
<div class="swiper-container">
<div class="swiper-wrapper">
<div class="swiper-slide">
<a href="#">
<strong>2017 패커드코리아 하반기 부문별 신입/경력 사원 채용안내</strong>
<span>2017-07-07</span>
</a>
</div>
<div class="swiper-slide">
<a href="#">
<strong>공지사항2번</strong>
<span>2017-07-07</span>
</a>
</div>
<div class="swiper-slide">
<a href="#">
<strong>공지사항3번</strong>
<span>2017-07-07</span>
</a>
</div>
</div>
<div class="prev btn"><a href="#none" class="btn_type06 prev"><span class="hide">이전글보기</span></a></div>
<div class="next btn"><a href="#none" class="btn_type07 next"><span class="hide">다음글보기</span></a></div>
</div>
</div>
<div class="right">
<div>
<ul class="clear">
<li><a href="/contents/promote/article.php">보도기사</a></li>
<li><a href="/contents/cscenter/support.php">기술지원</a></li>
<li><a href="/contents/cscenter/site.php">관련사이트</a></li>
</ul>
</div>
</div>
</div>  -->

<script>
$(document).ready(function() {
  $("a").on("click touchend", function(e) {
    var el = $(this);
    var link = el.attr("href");
    window.location = link;
  });
});

var swiper = new Swiper('.swiper-container', {
    paginationClickable: true,
    nextButton: '.next',
    prevButton: '.prev',
    loop:true,
    direction:'vertical'
});
</script>
<?php include '../contents/inc/copy.php';?>

