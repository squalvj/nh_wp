

$(document).ready(function() {
 	var namaAnchor = []
 	$('.section').each(function(el, i) {
 		namaAnchor[el] = $(this).data('nama')
 	});
 	var w = $(window).width();
 	var isInvert = false;
 	var interval = [];
 	var interval2 = [];
	if ($("#fullpage").length == 1){
		$('#fullpage').fullpage({
			css3: true,
			scrollingSpeed: 2000,
			scrollOverflow: true,
			anchors: ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'],
			onLeave: function(index, nextIndex, direction) {
			    var el = $(this);
			    var child = el.find('.wrapper-content').children()
			    var nextEl = el.parent().children().eq(nextIndex-1)
		     	var childrenNext = nextEl.find('.wrapper-content').children()
			    opacity(childrenNext)
			    child.each(function(index, el) {
			    	var i = index+=1;
			    	ilang(el,i * 0.8)
			    });
			    childrenNext.each(function(index, el) {
			    	var i = index+=1;
			    	muncul(el, i* 0.9)
			    });
		  	},
		  	afterLoad: function(anchorLink, index) {
			    //muncul($(this))
		  	}
		});
	}
	if ($("#fullpage-office").length == 1){
		$('#fullpage-office').fullpage({
			scrollingSpeed: 2500,
			css3: true,
			scrollOverflow: true,
			// anchors: ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine','ten'],

			//slidesNavigation: false,
			anchors: namaAnchor,
			controlArrows: false,
			//slidesNavPosition: 'bottom',
			onLeave: function(index, nextIndex, direction) {
			    var el = $(this);
			    var child = el.find('.items-left-right').children()
			    var nextEl = el.parent().children().eq(nextIndex-1)
			    ilangStagger(child,.5)
			    var childrenNext = nextEl.find('.items-left-right').children()
			    opacity(childrenNext)
			   	munculStagger(childrenNext,.3)
			   	// if (nextIndex == 1){
			   	// 	stopAutoScroll();
			   	// }
			   	changeBulletNav(nextIndex)
			   	var nextEl = $(".section").eq(nextIndex-1)
			   	var invert = nextEl.find('.invert')

			   	if (invert.length){
			   		fadeInOut($(".top-left").first(), $(".top-left").last())
			   		right($(".top-right").first(),$(".top-right").last() )
			   		opacity2($(".bottom-left").first(), $(".bottom-left").last())
			   		opacity2($(".bottom-right").first(), $(".bottom-right").last())
			   		$(".bullet-right").addClass('invert')
			   	}
			   	else{
			   		fadeInOut($(".top-left").last(), $(".top-left").first())
			   		right($(".top-right").last(),$(".top-right").first() )
			   		opacity2($(".bottom-left").last(), $(".bottom-left").first())
			   		opacity2($(".bottom-right").last(), $(".bottom-right").first())
			   		$(".bullet-right").removeClass('invert')
			   	}

		  	},
		  	afterLoad: function(anchorLink, index) {
		  		
		  	},
	  	 	afterRender: function () {

			}
		});
	}

	if ($("#fullpage-lifestyle").length == 1){
		$('#fullpage-lifestyle').fullpage({
			scrollingSpeed: 2500,
			css3: true,
			// scrollOverflow: true,
			scrollOverflow:true,
			// anchors: ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine','ten'],

			//slidesNavigation: false,
			anchors: namaAnchor,
			controlArrows: false,
			//responsiveWidth: 767,
			//slidesNavPosition: 'bottom',
			onLeave: function(index, nextIndex, direction) {
			    var el = $(this);
			    var child = el.find('.items-left-right').children()
			    var nextEl = el.parent().children().eq(nextIndex-1)
			    ilangStagger(child,.5)
			    var childrenNext = nextEl.find('.items-left-right').children()
			    opacity(childrenNext)
			   	munculStagger(childrenNext,.3)
			   	changeBulletNav(nextIndex)
			   	var nextEl = $(".section").eq(nextIndex-1)
			   	var invert = nextEl.find('.invert')
			   	if (invert.length){
			   		fadeInOut($(".top-left").first(), $(".top-left").last())
			   		right($(".top-right").first(),$(".top-right").last() )
			   		opacity2($(".bottom-left").first(), $(".bottom-left").last())
			   		opacity2($(".bottom-right").first(), $(".bottom-right").last())
			   		$(".bullet-right").addClass('invert')
			   	}
			   	else{
			   		fadeInOut($(".top-left").last(), $(".top-left").first())
			   		right($(".top-right").last(),$(".top-right").first() )
			   		opacity2($(".bottom-left").last(), $(".bottom-left").first())
			   		opacity2($(".bottom-right").last(), $(".bottom-right").first())
			   		$(".bullet-right").removeClass('invert')
			   	}
		   		var accordion = nextEl.find('.container-accordion')
			   	if (accordion.length){
			   		fadeInOut($(".top-left").first(), $(".top-left").last())
			   		right($(".top-right").first(),$(".top-right").last() )
			   		console.log("ASD")
			   	}
			   	else{
			   		fadeInOut($(".top-left").last(), $(".top-left").first())
			   		right($(".top-right").last(),$(".top-right").first() )
			   	}
		  	},
		  	afterLoad: function(anchorLink, index) {
		  		
		  	},
	  	 	afterRender: function () {
			}
		});
	}



	function setBulletSlide(el){
		var index = parseInt(el.find('.active').data('index'))
		var bullet = el.closest('.container').siblings('.bullet-nav')
		bullet.find('.bullet-child').removeClass('active')
		bullet.children().eq(index-1).addClass('active')
	}

	function fadeInOut(el, el2){
		TweenMax.to(el, 1, {scale:2,delay:1,opacity:0,display:'none'})
		TweenMax.to(el2, 1, {scale:1,delay:1,opacity:1,display:'block'})
	}

	function right(el,el2){
		TweenMax.to(el, 1, {x:150,opacity:0,delay:1})
		TweenMax.to(el2, 1, {x:0,opacity:1,delay:1})
	}

	function opacity2(el, el2){
		TweenMax.to(el, 1, {opacity:0,delay:1,display:'none'})
		TweenMax.to(el2, 1, {opacity:1,delay:1,display:'flex'})
	}

	// function initBulletSlide(){
	// 	var bullet = $(".bullet-nav")
	// 	var parent = bullet.parent()
	// 	var slide = [];
	// 	var anc = [[],[]];
	// 	for (var i = 0; i < parent.length; i++){
	// 		slide[i] = parent.eq(i).find('.slide')
	// 		anc[i][''] = i
	// 		for (var l = 0; l < parent.eq(i).find('.slide').length; l++){
	// 			anc[i][l] = parent.eq(i).find('.slide').eq(l).data('anchor')
	// 			//console.log(parent.eq(i).find('.slide').eq(l).data('anchor'))
	// 		}
	// 	}
	// 	for (var k = 0; k < slide.length; k++){
	// 		var bulletInside = slide[k].closest('.section').find('.bullet-nav')
	// 		for (var z = 0; z < slide[k].length; z++){
	// 			var it2 = k;
	// 			var anchor = slide[k].closest('.section').data('anchor')
	// 			// bulletInside.append('<a class="bullet-child" data-interval="'+ it2 +'" href="#'+anchor+'/slide'+ it +'"></a>')
	// 			bulletInside.append('<a class="bullet-child" href="#'+anchor+'/'+ anc[k][z] + '" data-interval="'+ it2 +'"></a>')
	// 		}
	// 	}
	// }

	function fadeIns(el){
		TweenMax.to(el, 1, {opacity:1})
	}
	function fadeOuts(el){
		TweenMax.to(el, 1, {opacity:0})
	}

	function initBulletSlideGallery(){
		var bullet = $(".bullet-nav-tab")
		var parent = bullet.parent();
		var gallery = bullet.siblings('.gallery-tab-slider')
		var galleryGroup = gallery.children('.gallery-group');
		var container = [];
		var bulletGroup = [];
		var bullet = []
		for (var i = 0; i < parent.length; i++){
			container[i] = parent.eq(i);
		}
		for (var i = 0; i < container.length; i++){
			var bulletInside = container[i].children('.bullet-nav-tab')
			bulletGroup[i] = container[i].find(".gallery-tab-slider").children()
			for (var c = 0; c < bulletGroup[i].length; c++){
				var gallery = bulletGroup[i].eq(c).data('gallery')
				bulletInside.append('<div data-gallery="'+gallery+'" class="bullet-group"></div>')
				for (var z = 0; z < bulletGroup[i].eq(c).children().length; z++){
					bulletInside.children('.bullet-group').eq(c).append('<a class="bullet-tab-child" data-index="'+z+'" data-gallery="'+gallery+'" href="#"></a>')
				}
				
			}
		}
		$(".gallery-group").children('img:first-child').addClass('active')
		$(".bullet-group:first-child").addClass('active')
		$(".bullet-tab-child:first-child").addClass('active')
		startAutoScroll2()
	}

	function startAutoScroll2(){
		var bulletnav = $(".bullet-group")
		
		for (var i = 0; i < bulletnav.length; i++){
			var container = bulletnav.eq(i)
			var section = container.closest('.section')
			startauto2(interval2, container, section)
		}
	}

	function startauto2(el, container, section){
		el.push(setInterval(function () {
			if (section.hasClass('active') && container.hasClass('active')){
				var bullet = container.find('.bullet-tab-child.active')
				var next = bullet.next();
				if (bullet.is(':last-child')){
					bullet.removeClass('active')
					bullet = container.children('.bullet-tab-child:first-child')
					next = bullet
				}
				bullet.removeClass('active')
				next.addClass('active')

				var img = section.find('.gallery-tab-slider').children('.gallery-group.active').children();
				var indexEl = next.data('index')
				img.removeClass('active')
				img.each(function(index, el) {
					if (parseInt($(this).data('index')) === indexEl){
						$(this).addClass('active')
					}
				});
			}
		}, 7000));
	}



	function initBulletSlide(){
		var bullet = $(".bullet-nav")
		var parent = bullet.siblings('.container').find('.gallery-slider')
		var gallery = [];
		var child = [];
		for (var i = 0; i < parent.length; i++){
			gallery[i] = parent.eq(i);
		}
		
		for (var i = 0; i < gallery.length; i++){
			var child = gallery[i].children();
			gallery[i].children().each(function(index, el) {
				$(this).attr('data-index', index)
				
			});
			TweenMax.set(gallery[i].children(), {opacity:0})
			TweenMax.set(gallery[i].children().first(), {opacity:1})
			var bulletInside = gallery[i].closest('.container').siblings('.bullet-nav')
			for (var z = 0; z < child.length; z++){
				bulletInside.append('<a class="bullet-child" data-index="'+z+'"></a>')
			}
		}
		
			
		// for (var i = 0; i < child.length; i++){
		// 	bullet.append('<a class="bullet-child" data-index="'+i+'"></a>')
		// }
		var bfirst = $(".bullet-nav .bullet-child:first-child")
		bfirst.addClass('active')
	}

	// function initBulletSlide(){
	// 	var bullet = $(".bullet-nav")
	// 	var child = bullet.siblings('.container').find('.gallery-slider').children()
	// 	var parent = bullet.siblings('.container').find('.gallery-slider')
	// 	var gallery = [];
	// 	console.log(parent.length)
	// 	for (var i = 0; i < parent.length; i++){
	// 		gallery[i] = parent.eq(i);
	// 	}
	// 	// TweenMax.set(parent, {opacity:0})
	// 	// TweenMax.set(parent.first(), {opacity:1})

	// 	child.each(function(index, el) {
	// 		$(this).attr('data-index', index)
	// 	});
	// 	console.log(gallery)
	// 	for (var i = 0; i < child.length; i++){
	// 		bullet.append('<a class="bullet-child" data-index="'+i+'"></a>')
	// 	}
	// 	var bfirst = $(".bullet-nav .bullet-child:first-child")
	// 	bfirst.addClass('active')
	// }

	function initBulletRight(el, eq){
		var count = el.length
		var anchor
		for (var i = 1; i <= count; i++){
			anchor = el.eq(i-1).data('anchor')
			$(".bullet-right").append('<a class="bullet-right-child '+i+'" href="#'+anchor+'"><span></span></a>')
		}
		$(".bullet-right-child").eq(eq).addClass('active')
	}

	function startAutoScroll(){
		var bulletnav = $(".bullet-nav")
		
		for (var i = 0; i < bulletnav.length; i++){
			var container = bulletnav.eq(i)
			var section = container.closest('.section')
			startauto(interval,i, container, section)
		}
	}

	function startauto(el, index, container, section){
		el.push(setInterval(function () {
			if (section.hasClass('active')){
				var bullet = container.find('.bullet-child.active')
				var next = bullet.next();
				if (bullet.is(':last-child')){
					bullet.removeClass('active')
					bullet = container.children('.bullet-child:first-child')
					next = bullet
				}
				bullet.removeClass('active')
				next.addClass('active')
				var img = section.find('.gallery-slider').children();
				var indexEl = next.data('index')
				fadeOuts(img)
				img.each(function(index, el) {
					if ($(this).data('index') == indexEl){
						fadeIns($(this))
					}
				});
			}
		}, 7000));
	}

	function addIndexSlide(parent){
		parent.children('.slide').each(function(index, el) {
			$(this).attr('data-index', index+1);
		});
	}

	function stopAutoScroll(i){
		clearInterval(interval[i]);
	}

	function ilang(el, del){
		TweenMax.to(el, del, {y:40, opacity:0 ,ease: Back.easeIn.config(1.7)})
	}

	function muncul(el, del){
		TweenMax.from(el, del, {opacity:0, y:-20 ,delay:2.1, ease: Power4.easeOut})
	}

	function ilangStagger(el,del){
		TweenMax.staggerTo(el, 1, {y:40, opacity:0 ,ease: Back.easeIn.config(1.7)}, del)
	}

	function munculStagger(el,del){
		TweenMax.staggerFrom(el, .5, {opacity:0, y:-20 ,delay:2.1, ease: Power4.easeOut},del)
	}


	function opacity(el){
		TweenMax.set(el,{opacity:1,y:0})
	}

	function changeBulletNav(nextIndex){
		$(".bullet-right .bullet-right-child").removeClass('active')
	   	$(".bullet-right ").find('.'+nextIndex).addClass('active')
	}

	$(".wrapper-item-accordion").click(function(event) {
		$(".wrapper-group-accordion .wrapper-item-accordion").addClass('shrink')
		$(this).removeClass('shrink').addClass('active')
		if (w < 767){
	 		setTimeout(function(){
	 			$.fn.fullpage.reBuild();
	 		},1000)
		}
	});

	$(".back-accordion").click(function(event) {
		$(".wrapper-group-accordion .wrapper-item-accordion").removeClass('active shrink')
		event.stopPropagation();
		if (w < 767){
 			setTimeout(function(){
	 			$.fn.fullpage.reBuild();
	 		},1000)
		}
	});

	$(".tab-type-pill").click(function(event) {
		var nameGallery = $(this).data('gallery')
		var section = $(this).closest('.section')
		var parentGallery = section.find('.gallery-tab-slider')
		var galleryGroup = parentGallery.children('.gallery-group')
		galleryGroup.removeClass('active')
		galleryGroup.each(function(index, el) {
			if ($(this).data('gallery') == nameGallery){
				$(this).addClass('active')
			}
		});
		var navGroup = section.find(".bullet-nav-tab")
		navGroup.children().removeClass('active')
		navGroup.children().each(function(index, el) {
			if ($(this).data('gallery') == nameGallery){
				$(this).addClass('active')
			}
		});
	});

	$(".bullet-nav").on('click', '.bullet-child', function(event) {
		var parent = $(this).parent('.bullet-nav')
		var indexEl = parseInt($(this).data('index'));
		var img = parent.siblings('.container').find('.gallery-slider').children();
		fadeOuts(img)
		img.each(function(index, el) {
			if ($(this).data('index') == indexEl){
				fadeIns($(this))
			}
		});
		parent.find('.bullet-child').removeClass('active')
		$(this).addClass('active')
	});

	$(".bullet-nav-tab").on('click', '.bullet-tab-child', function(event) {
		var parent = $(this).parent();
		var indexs = parseInt($(this).data('index'));
		var namaGallery = $(this).data('gallery')
		var activeGallery = $(this).closest('.section').find(".gallery-tab-slider").find('.active')
		activeGallery.children().removeClass('active')
		activeGallery.children().each(function(index, el) {
			if (parseInt($(this).data('index')) === indexs){
				$(this).addClass('active')
			}
		});
		parent.children().removeClass('active')
		$(this).addClass('active')
	});

	$('[data-toggle="collapse"]').click(function() {
		var parent = $(this).closest('.item-left')
		parent.find('.collapse.in').collapse('hide')
		$(this).parent().next().collapse('toggle')
		parent.find('.btn-accor').not($(this)).removeClass('active')
		$(this).toggleClass('active')
		
	});

	$("#close-nav").click(function(event) {
		$(".side-nav").removeClass('active')
	 	$.fn.fullpage.setMouseWheelScrolling(true);
    	$.fn.fullpage.setAllowScrolling(true);
    	$(".contact-nav").removeClass('active')
    	TweenMax.to($(".menu-ul"), .10, {opacity:1})
    	TweenMax.to($(".bg-black"),.5, {opacity:0,right:'-100vw'})
	});
	$(".open-nav").click(function(event) {
		$(".side-nav").addClass('active')
		$.fn.fullpage.setMouseWheelScrolling(false);
		$.fn.fullpage.setAllowScrolling(false);
		TweenMax.to($(".bg-black"),.5, {opacity:1,right:0})
	});

	$(".bg-black").click(function(event) {
		$(".side-nav").removeClass('active')
	 	$.fn.fullpage.setMouseWheelScrolling(true);
    	$.fn.fullpage.setAllowScrolling(true);
    	TweenMax.to($(".bg-black"),.5, {opacity:0,right:'-100vw'})
    	$(".contact-nav").removeClass('active')
		TweenMax.to($(".menu-ul"), .10, {opacity:1})
	});

	$("#contact-btn").click(function(event) {
		$(".contact-nav").addClass('active')
		TweenMax.to($(".menu-ul"), .10, {opacity:0})
	});

	$("#back-contact").click(function(event) {
		$(".contact-nav").removeClass('active')
		TweenMax.to($(".menu-ul"), .10, {opacity:1})
	});

	$(".btn-close-modal").click(function(event) {
		TweenMax.to($(".modal"), 1, {opacity:0, display:'none'})
	});

	function init(){
		var arrow = $(".wrapper-arrow img")
		var firstButtonPlus = $('.item-accordion-c.in').prev().find('button')
		firstButtonPlus.addClass('active')
		TweenMax.to($(".top-left").last(), 0, {scale:2,opacity:0})
		TweenMax.to($(".top-right").last(), 0, {x:150,opacity:0})
		TweenMax.to($(".bottom-left").last(), 0, {display:'none', opacity:0})
		TweenMax.to($(".bottom-right").last(), 0, {display:'none', opacity:0})
		TweenMax.fromTo(arrow, 2, {y:-20,ease:Circ},{y:20,repeatDelay:1, ease:Circ, repeat:-1,})

		var container = $(".fullpg");
 		var section = container.find('.section')
 		for (var i = 0; i < section.length; i++){
 			section.eq(i).attr('data-count', i);
 		}
 		setTimeout( function(){ 
	 		var active = container.find('.fp-section.active')
	 		initBulletRight($(".section"),active.data('count'))
  		}  , 500 );
 		initBulletSlide()
 		if ($(".gallery-tab-slider").length)
 			initBulletSlideGallery();
		startAutoScroll()
	}
	init();
});