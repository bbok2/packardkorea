<?php
$mmenu = 9999;
$smenu = 9999;
include_once '../contents/inc/config.php';
?>

<body class="chinese">
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
    <p class="txt02">新成長 動力 開發, 我们的未来</p>
    <p class="txt03">Packard Korea 以技术能力和诚信为基础，占据业界领先地位。</p>
</div>
</div>
</div>
</div>

<div id="sec01" class="intro num2">
    <div class="content">
        <p class="txt01">成为顾客认可的最佳供应商！</p>
        <p class="txt02">(株)Packard Korea以行业领先的技术力和信任为基础，为韩国汽车产业的发展贡献自己的力量</p>
        <div class="btn">
            <a href="/contents/about/overview.php" class="btn_type01"><span>公司简介</span></a>
        </div>
    </div>
</div>

<div id="sec02" class="business num3 stg_w">
    <div class="content">
        <h2 class="con_tit">业务领域</h2>
        <div class="top clear">
            <div class="box box01 motion_stg">
                <div class="">
                    <div class="txt">
                        <h3 class="m_tit">Wiring Harness</h3>
                        <p class="m_stit">拥有复杂的W/Harness System自主设计能力</p>
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
                        <h3 class="m_tit">零配件</h3>
                        <p class="m_stit">构建零配件的标准代码和符号数据库</p>
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
                        <h3 class="m_tit">宣传视频</h3>
                        <p class="m_stit">可观看（株）Packard Korea的宣传视频。</p>
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
                    <h2>研究开发</h2>
                    <p>凭借新技术确保竞争力，得到顾客认可。</p>
                </div>
            </li>
            <li class="dev01 motion_stg">
                <div>
                    <a href="/contents/develop/field.php">
                        <div class="img"></div>
                        <p class="tit">研究所介绍</p>
                    </a>
                </div>
            </li>
            <li class="dev02 motion_stg">
                <div>
                    <a href="/contents/develop/research.php">
                        <div class="img"></div>
                        <p class="tit">研究开发</p>
                    </a>
                </div>
            </li>
            <li class="dev03 motion_stg">
                <div class="mr0">
                    <a href="/contents/develop/tools.php?pos=sec02">
                        <div class="img"></div>
                        <p class="tit">实验设备</p>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>

<div id="sec04" class="system clear num5 stg_w">
    <div class="management motion_stg">
        <h2 class="m_tit">品质经营</h2>
        <p class="m_stit">超出顾客期待值的产品和服务</p>
        <div class="btn">
            <a href="/contents/management/quality.php" class="btn_type04"><span>品质经营体系</span></a>
        </div>
    </div>
    <div class="process motion_stg">
        <h2 class="m_tit">生产工序</h2>
        <p class="m_stit">将技术和真诚赋予产品的生产工序</p>
        <div class="btn">
            <a href="/contents/business/wiring_harness.php?pos=sec02" class="btn_type04"><span>生产工序指南</span></a>
        </div>
    </div>
</div>

<div id="sec05" class="recruitment num6 stg_w">
    <div class="content">
        <h2 class="con_tit">人才招聘</h2>
        <ul class="clear">
            <li class="fl recu01 motion_stg">
                <div class="txt">
                    <h3 class="m_tit">招聘信息</h3>
                    <p class="m_stit">为您提供招聘信息</p>
                    <div class="btn">
                        <a href="/contents/recruit/talent.php" class="btn_type09"><span>more</span></a>
                    </div>
                </div>
            </li>
            <li class="fr recu02 motion_stg">
                <div class="txt">
                    <h3 class="m_tit">招聘公告</h3>
                    <p class="m_stit">可查看招聘公告</p>
                    <div class="btn">
                        <a href="/bbs/board.php?bo_table=recruit" class="btn_type09"><span>more</span></a>
                    </div>
                </div>
            </li>

        </ul>
    </div>
</div>

<div id="sec06" class="partner num7 motion">
    <div class="content">
        <h2 class="con_tit">主要客户公司</h2>
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

