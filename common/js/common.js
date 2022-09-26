

$(window).load(function(){
	
	var $btn = $(".nav_toggle");
	var $subbtn = $(".subnav_toggle");
	var $lnb = $(".lnb_wrap");
	var $mm = $(".lnb>li");
	var $sm = $mm.find('>ul>li');
	var $nav = $('.nav');	
	var $body = $('html,body');
	var $win = $(window)


	$btn.click(function(){
		$lnb.toggleClass('on');
		$('.header').toggleClass('on');
	}); 

	$(window).on('resize',function(){
		resize();		
	});

	function resize(){
		$viewW = $(this).width();		
		if($viewW>999){
			$lnb.show(),
			$btn.hide(),
			$('.tmenu > ul').show()
		}else{
			$btn.show()
		}
	}
	resize();


	// $mm.removeClass('on').eq(mmenu-1).addClass('on').find('li').removeClass('on').eq(smenu-1).addClass('on');
	// $tmenu.find('li').removeClass('on').eq(smenu-1).addClass('on');


	$(window).on('scroll',function(){
		animate();
	})
	animate();
	function animate(){
		var scrY = $(window).scrollTop()+$(window).height()-300;
		$('.motion').each(function(){
			if(scrY>$(this).offset().top){
				TweenMax.to($(this), 0.8886, {top:0, opacity:1, ease:Power2.easeOut});		
			}
		})
		$('.stg_w').each(function(){
			if(scrY>$(this).offset().top){				
				TweenMax.staggerTo($(this).find('.motion_stg'), 0.5, {top:0, opacity:1, ease:Power2.easeOut},.1);		
			}
		})
		
		
		
	}
	// TweenLite.to(photo, 1, {css:{scaleX:0.5, rotation:30}, ease:Power3.easeOut});



	//스크롤되면서 메뉴이동
	//$('.go_intro').click(function(){
	//	$('html, body').animate({ 
	//		scrollTop: $('#sec01').offset().top-85
	//	}, 1000);
	//});

	//$('.go_business').click(function(){
	//	$('html, body').animate({ 
	//		scrollTop: $('#sec02').offset().top-85
	//	}, 1000);
	//});

	//$('.go_develope').click(function(){
	//	$('html, body').animate({ 
	//		scrollTop: $('#sec03').offset().top-85
	//	}, 1000);
	//});

	//$('.go_system').click(function(){
	//	$('html, body').animate({ 
	//		scrollTop: $('#sec04').offset().top-85
	//	}, 1000);
	//});

	//$('.go_recruitment').click(function(){
	//	$('html, body').animate({ 
	//		scrollTop: $('#sec05').offset().top-85
	//	}, 1000);
	//});


	// go_top버튼 페이드인, 맨위로가기
	
	
	

	$('.go_top > a').click( function() {
		$body.animate({ 
			scrollTop : 0 }, 800 
			);
		num = 1;
		return false;
	});


	$('.etc .eng').on('click',function(){
		$('#global').slideToggle(300);
		return false;
	})




	var sec = $('.sub_section');
	var tm = $('.tmenu');
	var tsm = $('.tmenu li a');
	var secH = []; 
	var secNum = 0;
	var subCon = $('.sub_content');


	sec.each(function(i){
		secH[i] = sec.eq(i).offset().top;
	});

	tsm.on('click',function(){		
		var i = $(this).parent().index();
		var pos = sec.eq(i).offset().top-100;
		// console.log(pos)
		$body.animate({
			'scrollTop' : pos
		},600,'easeInOutQuart');
		return false;
		
	});

	$('.tmenu > p').on('click',function(){		
		$('.tmenu > ul').slideToggle();
	});	





	function tmActive(){
		tsm.removeClass('on').eq(secNum).addClass('on');
	}

	function objFix(){
		if ($(this).scrollTop() > 300) {
			tm.addClass('fix');
			subCon.css('padding-top','54px')
			$('.go_top').fadeIn();
		} else {
			tm.removeClass('fix');
			subCon.css('padding-top','0')		
			$('.go_top').fadeOut();
		}
		if ($(this).scrollTop() > 100) {
			$('#header_wrap').addClass('fix');			
		}else{
			$('#header_wrap').removeClass('fix');
		}
	}
	
	$win.on('scroll',function(){
		objFix();		
		var sh = $(this).scrollTop();
		
		for (i=0;i<sec.length;i++){ // 위치값 확인
			if(sh >= parseInt(secH[i]) - ($win.height()/2)){
				secNum = i;
				tmActive();
			}
		}
	});

	objFix();
	tmActive();

	var familybtn = $(".family > p");
	var familymenu = $(".family > ul");

	familybtn.on('click',function(){
		console.log('object')
		$(this).toggleClass('on');
		familymenu.slideToggle();
	});


	/*생산공정*/
	var step = $('.detail01 .step li');
	var progress = $('.detail01 .step .progress .bar');
	var len = step.length;
	var num = 0;

	function timer(){
		$('.detail01 .step li').find('div').removeClass('on').eq(num).addClass('on');
		$('.detail01 .pic li').hide().eq(num).fadeIn(400);		
		num++;
		if(num==len){
			num = 0;
		}
	}


	start();

	function start(){
		progress.stop().css('width',(num*25)+'%')
		check = setTimeout(start,5000);		
		timer();
	}

	function restart(){
		clearTimeout(check);
		start();
		clearTimeout(check);
		check = setTimeout(start,5000);
	}

	step.find('div').on('click',function(){
		num = $(this).parent().index();
		if(!$(this).hasClass('on')){
			restart();
		}		
	});


	/*탭메뉴텍스트*/
	var tmenutxt = $('.tmenu > ul > li > a.on').text();
	$('.tmenu > p').text(tmenutxt);

	$('.tmenu>ul>li>a').click(function(){
		var tmenuretxt = $(this).text();
		$('.tmenu > p').text(tmenuretxt);
	});

});

