var currentStudent = '';
var currentPage = 'logoBtn';
$(document).ready(function(e){
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) == false ) {
	 	window.location = 'desktop.html';
	}

	//enable scrolling in nav
	$("#nav_main").on('touchstart',function(e){
		e.stopPropagation();
	});
	$("#nav_main").on('touchmove',function(e){
		e.stopPropagation();
	});
	$("#student_biography").on('touchstart',function(e){
		e.stopPropagation();
	});
	$("#student_biography").on('touchmove',function(e){
		e.stopPropagation();
	});
	$("#yearbook_main").on('touchstart',function(e){
		e.stopPropagation();
	});
	$("#yearbook_main").on('touchmove',function(e){
		e.stopPropagation();
	});
	$(document).on('touchmove',function(e) {
		e.preventDefault();
	});
	
	//prevent click bubbling
	$("#nav_container, #yearbook, #yearbookBtn, #canvas_container").on('tap',function(e){
		e.stopPropagation();
	});



	//info page
	$("#infoBtn").on('tap', function(){
		switchTab('infoBtn');
		closeNav();
		closeLanding();
		openInfo();
	})

	//yearbook panel
	var yearbookActive = false;
	$("#yearbookBtn").on('tap', function(e){
		openYearbook();
	});
	function closeYearbook(){
		if(yearbookActive){
			$("#yearbook").css({"left":"100%"});
			yearbookActive = false;
		}
		
	}
	function openYearbook(){
		if(!yearbookActive){
			$("#yearbook").css({"left":"38%"});
			yearbookActive = true;
		}
		
	}

	var infoActive = false;
	function openInfo(){
		if(!infoActive){
			$("#info").css({"display": "block"});
			infoActive = true;
		}
	}
	function closeInfo(){
		if(infoActive){
			$("#info").css({"display": "none"});
			infoActive = false;
		}
	}

	//position and size adjust
	$("#yearbook").fullHeight();
	$("#nav_main").customFullHeight();
	$(".nav_top_item").widthAdjust();
	$("#nav_top, #nav_top li, .nav_top_item, .nav_top_icon").css({"height": $("#nav_top").width() * 14.285/100 + "px"});
	window.onresize = function(){
		//$("aside, nav").fullHeight();
		
	}
	
	//reveal nav method
	var isNavActive = false;
	function revealNav() {
		if(!isNavActive){
			$('section').css({"margin-left":"40.7%"});
			isNavActive = true;
		} else {
			$('section').css({"margin-left":"5.37%"});
			isNavActive = false;
		}
	}
	function closeNav(){
		if(isNavActive) {
			$('section').css({"margin-left":"5.37%"});
			isNavActive = false;
		}
	}
	$("aside ul li#studentBtn").on('tap',function(e){
		switchTab('studentBtn');
		revealNav();
		e.stopPropagation();
	});
	$("body").on('tap',function(){
		closeNav();
		closeYearbook();
	});
	
	//nav_top animation
	$('#nav_top li').on('tap', function(){
		$('#nav_top li').coverNavTop();
		$(this).css({'width':'42.855%'});
	});
	
	//nav_top sorting
	$("#nav_top li").on('tap',function(){
		if($(this).attr('id') == 'allBtn')  {
			$("#nav_main li").css({'display':'block'});
		} else if($(this).attr('id') == 'designBtn') {
			$("#nav_main li").css({'display':'none'});
			$(".designStudent").css({'display':'block'});
		} else if($(this).attr('id') == 'developBtn') {
			$("#nav_main li").css({'display':'none'});
			$(".developStudent").css({'display':'block'});
		} else if($(this).attr('id') == 'videoBtn') {
			$("#nav_main li").css({'display':'none'});
			$(".videoStudent").css({'display':'block'});
		} else if($(this).attr('id') == 'hybridBtn') {
			$("#nav_main li").css({'display':'none'});
			$(".hybridStudent").css({'display':'block'});
		}
	});
	
	function dash2space(s) {
		return s.replace('-', ' ', "g");
	}

	//init
	$('#allBtn').trigger('tap');

	//ajax for dynamic content
	$("#nav_main li").on("tap", function(){
		closeNav();
		closeLanding();
		closeInfo();
		closeYearbook();
		//alert($(this).attr('data-fname'));
		var sfname = $(this).attr('data-fname');
		currentStudent = sfname;
		var picname = $(this).attr('data-image');
		
		$.ajax({
			url: 'api.php?fname='+sfname,
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				//update student links
				$('#link-website').attr('href',data.studentWebsite);
				$("#link-website p").html(httpRemove(data.studentWebsite));
				$('#student_bio').colorbox({
					html: '<h2 class='+'aboutthisgradheader'+'>'+(capitalize(data.studentFName) + ' ' + capitalize(data.studentLName))+'</h2><img src='+'imgs/ic-twitter.svg'+' alt='+'twitter icon'+' class='+'tweetericon'+'><span class='+'tweeter'+'>'+' '+data.studentTwitter+'</span><br><br><p class='+'aboutthisgrad'+'>'+data.studentDescription+'</p>',
					innerWidth: '50%',
					innerHeight: '50%'
				});
				

				//hide loading screen	
				$("#student_work img:first-child, #student_work img.last, #pose img").preload({
					onFinish: function(){
						$("#selected_work2").delay(600).animate({opacity: 0}, 200,function(){
							//update student work 2
							$("#selected_work2 img").attr('src','./studentWork2/'+data.studentWorkPic2);
							$("#selected_work2").animate({opacity: 1},200);

							
						});
						$("#main_content_image img, #main_content_cover, #student_name").animate({opacity: 0}, 200, function(){
							//update student cover photo
							$("#main_content_cover").css({"background-image":"url(./studentCover/"+data.studentCover+")"});
							//update student info
							$("#student_name").html(dash2space(capitalize(data.studentFName)) + ' ' + capitalize(data.studentLName));
							$("#main_content_image img, #main_content_cover, #student_name").animate({opacity: 1},200);

						});
						$("#selected_work1").delay(300).animate({opacity: 0},200,function(){
							
							
							//update student work 1
							$("#selected_work1 img").attr('src','./studentWork1/'+data.studentWorkPic1);
							
							$("#selected_work1").animate({opacity: 1},200);
						});
						$('#pose').delay(200).animate({opacity: 0}, 200, function(){
							$('#pose1').attr('src','imgs/studentPose1/'+picname);
							$('#pose2').attr('src','imgs/studentPose2/'+picname);
							$('#pose').animate({opacity: 1}, 200);
						});
					}
				});

				var signImage = '';
				for(var i = 0; i < data.signCount; i++){
					signImage += '<li>';
					signImage += '<img alt="" src="studentSigns/SS-'+capitalize(currentStudent)+(data.signCount - i - 1)+'.png">';
					signImage += '</li>';
				}
				$("#yearbook_main ul").html(signImage);
				$(".yearbook_student").html(data.studentFName);
			},
			error: function(){
				console.log('error update info');
			}
		});
	});

	//close landing page
	var landingActive = true;
	function closeLanding() {
		if(landingActive){
			$("#landing").css({"display":"none"});
			landingActive = false;
		}
	}
	function openLanding() {
		if(!landingActive) {
			$("#landing").css({"display":"block"});
			landingActive = true;
		}
	}
	$("#logoBtn").on('tap',function(){
		switchTab('logoBtn');
		openLanding();
		closeInfo();
	});

	//===preloader
	//get image names
	function getImageName(s) {
		return s.substring(0,s.indexOf('.'));
	}
	var circlePics = [];
	var work1Pics = [];
	var work2Pics = [];
	var coverPics = [];
	var posPic1 = [];
	var posPic2 = [];
	$.ajax({
		url: 'getInfo.php?pic=workPic1',
		type: 'GET',
		async: false,
      	cache: false,
		dataType: 'json',
		success: function(data) {
			work1Pics = data;
			for(var i = 0; i < work1Pics.length; i++) {
				if(work1Pics[i]){
					work1Pics[i] = 'studentWork1/'+work1Pics[i].toString();
				} else {
					work1Pics.splice(i,1);
				}
			}
		},
		error: function(){
			console.log('error get pic name');
		}
	});
	$.ajax({
		url: 'getInfo.php?pic=workPic2',
		type: 'GET',
		async: false,
      	cache: false,
		dataType: 'json',
		success: function(data) {
			work2Pics = data;
			for(var i = 0; i < work2Pics.length; i++) {
				if(work2Pics[i]){
					work2Pics[i] = 'studentWork2/'+work2Pics[i].toString();
				} else {
					work2Pics.splice(i,1);
				}
			}
		},
		error: function(){
			console.log('error get pic name');
		}
	});
	$.ajax({
		url: 'getInfo.php?pic=cover',
		type: 'GET',
		async: false,
      	cache: false,
		dataType: 'json',
		success: function(data) {
			coverPics = data;
			for(var i = 0; i < coverPics.length; i++) {
				if(coverPics[i]){
					coverPics[i] = 'studentCover/'+coverPics[i].toString();
				} else {
					coverPics.splice(i,1);
				}
			}
		},
		error: function(){
			console.log('error get pic name');
		}
	});
	
	$("#nav_main li").each(function(){
		circlePics.push('imgs/studentPic/'+$(this).attr('data-image'));
		posPic1.push('imgs/studentPose1/'+$(this).attr('data-image'));
		posPic2.push('imgs/studentPose2/'+$(this).attr('data-image'));
	});
	var pics = [];
	pics=pics.concat(circlePics,work1Pics,work2Pics,coverPics);

	$.preload( pics, {
		base:'http://humberinteractive.com/2013/yearbook/',
		onComplete:function( data ){
			var string = Math.round(data.loaded/data.total*100);
			$("#loadingPercent").html(string + '%');
		},
		onFinish:function(){
			$("#loading_text h1").html('Have fun ^_^');
			$("#loading").fadeOut(1000);
		}
	});

	//swipe events
	var swipePos = '';
	$.event.special.swipe.start = function( event ) {
		var data = event.originalEvent.touches ?
	    event.originalEvent.touches[ 0 ] : event;
	    if(data.pageX < 300) {
	    	swipePos = 'left';	
	    } else if (data.pageX > $(window).width - 300) {
	    	swipePos = 'right';
	    } else {
	    	swipePos = 'middle';
	    }
	    return {
	      	time: ( new Date() ).getTime(),
	      	coords: [ data.pageX, data.pageY ],
	      	origin: $( event.target )
	    };
	}
	$("body").on('swipeleft', function(){
		if(swipePos == 'middle'){
			closeNav();
		}
	});
	$("body").on('swiperight', function(){
		if(swipePos == 'left'){
			if(isNavActive){
				closeNav();
			} else {
				revealNav();
			}
		} else if (swipePos == 'middle') {
			closeYearbook();
		}
	});

	//work slide
	/*var slidePos = 1;
	$("#slider_container").on('swiperight', function(event){
		if(slidePos > 1){
			slidePos--;
		}
		
		if(slidePos == 1){
			$(this).css({"margin-left":"0"});
		} else if (slidePos == 3) {
			$(this).css({"margin-left":"-100%"});
		}
	});
	$("#slider_container").on('swipeleft', function(){
		if(slidePos < 5){
			slidePos++;
		}
		if(slidePos == 3){
			$(this).css({"margin-left":"-100%"});
		} else if (slidePos == 5) {
			$(this).css({"margin-left":"-200%"});
		}
	});*/
	
	//pic switch
	var picID = 2;
	$('#pose').on('vmousedown',function() {
		if(picID == 2){
			$('#pose1').css({opacity: 1});
			$('#pose2').css({opacity: 0});
			picID = 1;
		} else {
			$('#pose1').css({opacity: 0});
			$('#pose2').css({opacity: 1});
			picID = 2;
		}
	});
	$('.yearbook_lightbox').colorbox({
		iframe:true, width:"90%", height:"90%"
	});
	//rotate image
	var originalX = 0;
	var currentDeg = 0;
	var mouseDownOnSlide = false;
	var tempDeg = 0;
	$('#slider').on('vmousedown', function(e) {
		mouseDownOnSlide = true;
		originalX = e.pageX;
		$('#slider_container').css({
			"transition":"none",
			"-webkit-transition":"none"
		});
	});
	$('#slider').on('vmousemove', function(e) {
		if(mouseDownOnSlide){
			
			tempDeg = currentDeg + (e.pageX - originalX)/2;
			$('#slider_container').css({
				"transform": "rotateY("+tempDeg+"deg)",
				"-ms-transform": "rotateY("+tempDeg+"deg)",
				"-webkit-transform": "rotateY("+tempDeg+"deg)"
			});
		}
		
	});
	$('#slider').on('vmouseup', function(e) {
		mouseDownOnSlide = false;
		currentDeg = tempDeg;
		//turn on transition
		$('#slider_container').css({
			"transition":"all 0.3s",
			"-webkit-transition":"all 0.3s"
		});

		//rounding
		//0 -> 90 come back, 90 -> 180 come up
		if(Math.floor(currentDeg/90)%2 != 0){
			//inside 90->180, round up
			currentDeg = (Math.floor(currentDeg/90) + 1) * 90;
			$('#slider_container').css({
				"transform": "rotateY("+currentDeg+"deg)",
				"-ms-transform": "rotateY("+currentDeg+"deg)",
				"-webkit-transform": "rotateY("+currentDeg+"deg)"
			});
		} else {
			//inside 0->90, round down
			currentDeg = Math.floor(currentDeg/90) * 90;
			$('#slider_container').css({
				"transform": "rotateY("+currentDeg+"deg)",
				"-ms-transform": "rotateY("+currentDeg+"deg)",
				"-webkit-transform": "rotateY("+currentDeg+"deg)"
			});
		}
		
	});

	function switchTab(next){
		if(currentPage != next){
			$('aside li').css({"background":"none"});
			$('#'+next).css({"background":"#cccccc"});
			currentPage = next;
		}
		
	}

	//device orientation
});