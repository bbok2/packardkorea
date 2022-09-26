<?php
$mmenu = 9999;
$smenu = 9999;
include_once '../contents/inc/config.php';
?>

<body class="english">
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
    <p class="txt02">Development of New Growth Power, It’s Our Future</p>
    <p class="txt03">The leading automotive wiring harness company, PACKARD KOREA</p>
</div>
</div>
</div>
</div>

<div id="sec01" class="intro num2">
    <div class="content">
        <p class="txt01">Be Recognized by our Customers as their Best Supplier!</p>
        <p class="txt02">PACKARD KOREA is faithfully contributing to the development of the Korean automobile industry based on the industry’s leading technology and trust.</p>
        <div class="btn">
            <a href="/contents/about/overview.php" class="btn_type01"><span>About Packard Korea</span></a>
        </div>
    </div>
</div>

<div id="sec02" class="business num3 stg_w">
    <div class="content">
        <h2 class="con_tit">Business Areas</h2>
        <div class="top clear">
            <div class="box box01 motion_stg">
                <div class="">
                    <div class="txt">
                        <h3 class="m_tit">Wiring Harness</h3>
                        <p class="m_stit">Independent design of complex wiring harness systems.</p>
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
                        <p class="m_stit">Standardized database of codes and symbols</p>
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
                        <h3 class="m_tit">PR video</h3>
                        <p class="m_stit">Watch the PACKARD KOREA PR video.</p>
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
                    <h2>R&amp;D</h2>
                    <p>Securing competitiveness and customer satisfaction with new technology.</p>
                </div>
            </li>
            <li class="dev01 motion_stg">
                <div>
                    <a href="/contents/develop/field.php">
                        <div class="img"></div>
                        <p class="tit">Introduction of Our R&amp;D Center </p>
                    </a>
                </div>
            </li>
            <li class="dev02 motion_stg">
                <div>
                    <a href="/contents/develop/research.php">
                        <div class="img"></div>
                        <p class="tit">R&amp;D</p>
                    </a>
                </div>
            </li>
            <li class="dev03 motion_stg">
                <div class="mr0">
                    <a href="/contents/develop/tools.php?pos=sec02">
                        <div class="img"></div>
                        <p class="tit">Test Equipment</p>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>

<div id="sec04" class="system clear num5 stg_w">
    <div class="management motion_stg">
        <h2 class="m_tit">Quality Management</h2>
        <p class="m_stit">Exceed Customer Expectations</p>
        <div class="btn">
            <a href="/contents/management/quality.php" class="btn_type04"><span>Quality Management System</span></a>
        </div>
    </div>
    <div class="process motion_stg">
        <h2 class="m_tit">Manufacturing Process</h2>
        <p class="m_stit">A manufacturing process that includes both technology and sincerity</p>
        <div class="btn">
            <a href="/contents/business/wiring_harness.php?pos=sec02" class="btn_type04"><span>Manufacturing Process</span></a>
        </div>
    </div>
</div>

<div id="sec05" class="recruitment num6 stg_w">
    <div class="content">
        <h2 class="con_tit">Recruitment</h2>
        <ul class="clear">
            <li class="fl recu01 motion_stg">
                <div class="txt">
                    <h3 class="m_tit">Recruitment information</h3>
                    <p class="m_stit">Information on Recruitment.</p>
                    <div class="btn">
                        <a href="/contents/recruit/talent.php" class="btn_type09"><span>MORE</span></a>
                    </div>
                </div>
            </li>
            <li class="fr recu02 motion_stg">
                <div class="txt">
                    <h3 class="m_tit">Recruitment Notice</h3>
                    <p class="m_stit">Notification of Recruitment opportunities.</p>
                    <div class="btn">
                        <a href="/bbs/board.php?bo_table=recruit" class="btn_type09"><span>MORE</span></a>
                    </div>
                </div>
            </li>

        </ul>
    </div>
</div>

<div id="sec06" class="partner num7 motion">
    <div class="content">
        <h2 class="con_tit">Main Customers</h2>
        <ul class="grid clear">
            <li class="grid-item"><img src="/img/common/partners01.jpg" alt="GM KOREA"></li>
            <li class="grid-item"><img src="/img/common/partners02.jpg" alt="Renault Samsung"></li>
            <li class="grid-item"><img src="/img/common/partners03.jpg" alt="HYUNDAI"></li>
            <li class="grid-item"><img src="/img/common/partners04.jpg" alt="KIA"></li>
            <li class="grid-item"><img src="/img/common/partners07.jpg" alt="NISSAN"></li>
            <li class="grid-item"><img src="/img/common/partners05.jpg" alt="SSANGYONG"></li>
            <li class="grid-item"><img src="/img/common/partners06.jpg" alt="DOOSAN"></li>
            <li class="grid-item"><img src="/img/common/partners11.jpg" alt="HYUNDAI Engineering and construction"></li>
            <li class="grid-item"><img src="/img/common/partners00.jpg" alt="APTIV"></li>
            <li class="grid-item"><img src="/img/common/partners08.jpg" alt="DAEHAN"></li>
            <li class="grid-item"><img src="/img/common/partners09.jpg" alt="HANON"></li>
            <li class="grid-item"><img src="/img/common/partners10.jpg" alt="DAIHAN CALSONIC"></li>
            <li class="grid-item"><img src="/img/common/partners12.jpg" alt="SL Corporation"></li>

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

