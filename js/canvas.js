var canvas;
var ctx;

$(document).ready(function(e){
	canvas = document.getElementById('canvas');
	context = canvas.getContext('2d');
	canvas.width = $(window).width() - $("#canvas_container ul").outerWidth();
	canvas.height = $(window).height();
	$("#canvas_container ul").css({"height": $(window).height() + 'px'});
	window.onresize = function(){
		canvas.width = $(window).width() - $("#canvas_container ul").outerWidth();
		canvas.height = $(window).height();
		$("#canvas_container ul").css({"height": $(window).height() + 'px'});
		$("#nav_main").customFullHeight();
		$(".nav_top_item").widthAdjust();
		$("#nav_top, #nav_top li, .nav_top_item, .nav_top_icon").css({"height": $("#nav_top").width() * 14.285/100 + "px"});
	}
	window.ondevice
	var canvasMouseDown = false;
	var mouseX;
	var mouseY;
	var lines = [];
	var savedLines = [];
	function Line() {
		this.lineWidth = 4;
		this.color = 'black';
		this.dots = [];
		this.opacity = 1;
		this.eraser = false;
	}
	var currentSetting = new Line();
	$("canvas").on('vmousedown',function(e){
		//if(e.which == 1){
			canvasMouseDown = true;
		//}
		
		//hide color picker
		$("#colorPicker input.minicolors").spectrum("hide");

		if(canvasMouseDown){
			mouseX = e.pageX;
			mouseY = e.pageY;
			lines.push(new Line());
			var newestLine = lines[lines.length - 1];
			newestLine.lineWidth = currentSetting.lineWidth;
			newestLine.color = currentSetting.color;
			newestLine.opacity = currentSetting.opacity;
			newestLine.eraser = currentSetting.eraser;
		}
	});

	$("canvas").on('vmouseup', function(e){
		canvasMouseDown = false;
	});

	$("canvas").on('vmousemove', function(e){
		
		if(canvasMouseDown){
			mouseX = e.pageX;
			mouseY = e.pageY;
			var newestLine = lines[lines.length - 1];
			newestLine.dots.push({x: mouseX, y:mouseY});
		}
	})

	function keoCanvas() {
		context.clearRect(0,0,canvas.width,canvas.height);
			
			
		for(var i = 0; i < lines.length; i++){
			if(lines[i].dots.length > 1){
				
				context.beginPath();
				context.moveTo(lines[i].dots[0].x, lines[i].dots[0].y);
				for(var t = 1; t < lines[i].dots.length; t++) {
					
					context.lineTo(lines[i].dots[t].x, lines[i].dots[t].y);
					
				}
				if(!lines[i].eraser){
					context.lineWidth = lines[i].lineWidth;
					context.strokeStyle = lines[i].color;
					context.globalAlpha = lines[i].opacity;
				} else  {
					context.lineWidth = 14;
					
					context.globalAlpha = 1;
					context.globalCompositeOperation = "copy";
					context.strokeStyle = 'rgba(0,0,0,0)';
				}
				context.lineCap = 'round';
				context.lineJoin = 'round';
				context.stroke();			
			}
			
		}
	}

	animationFrame(keoCanvas);

	//canvas options
	var currentHighlight = 'normal_brush';
	function highlight(id) {
		$("#"+currentHighlight).css({"background":"none"});
		$("#"+id).css({"background":"rgba(255,255,255,0.5)"});
		currentHighlight = id;
	}
	$("#canvas_container ul").on('tap, vmousedown, click', function(e){
		e.stopPropagation();
	});
	
	//color picker
	$("#colorPicker input.minicolors").spectrum({
		color: "#000000",
		clickoutFiresChange: true,
		showButtons: false,
		change: function(color){
			currentSetting.color = color.toHexString();
		},
		move: function(color) {
			currentSetting.color = color.toHexString();
		}
	});

	//bring canvas in
	$("#signBtn").on('click',function(){
		$("#canvas_container").fadeIn(300);
		canvas.width = $(window).width() - $("#canvas_container ul").outerWidth();
		canvas.height = $(window).height();
	});

	$("#skinny_brush").on("click", function(){
		currentSetting.lineWidth = 2;
		currentSetting.eraser = false;
		highlight($(this).attr("id"));
	});
	$("#normal_brush").on("click", function(){
		currentSetting.lineWidth = 5;
		currentSetting.eraser = false;
		$(this).css({"background":"rgba(255,0,0,0.6)"});
		highlight($(this).attr("id"));
	});
	$("#fat_brush").on("click", function(){
		currentSetting.lineWidth = 15;
		currentSetting.eraser = false;
		highlight($(this).attr("id"));
	});
	$("#eraser").on('click',function(){
		currentSetting.eraser = true;
		highlight($(this).attr("id"));
	})
	$("#undo").on('click',function(){
		lines.pop();
	})
	$("#clear").on('click',function(){
		lines = [];
	});
	$("#cancleCanvas").on('click',function(){
		if(lines.length != savedLines.length) {
			if(confirm('You haven\'t saved it, are you sure you want to cancel?')) {
				$("#canvas_container").fadeOut(400);
				lines = [];
				savedLines = [];
			}
		} else {
			$("#canvas_container").fadeOut(400);
			lines = [];
			savedLines = [];
		}
	});
	$("#saveCanvas").on('click', function(){
		
		if(savedLines != lines){
			savedLines = lines;
			$("#loading").fadeIn(300);
			var canvasData = canvas.toDataURL();
			$.ajax({
				type: "POST",
				url: "saveImage.php",
				data: {
					imgBase64: canvasData,
					student: currentStudent
				},
				success: function(data) {
					var addImage = '';
					addImage += '<li>';
					addImage += '<img alt="" src="studentSigns/SS-'+capitalize(currentStudent)+data+'.png">';
					addImage += '</li>';
					$("#yearbook_main ul").prepend(addImage);
					$("#canvas_container").fadeOut(400);
					lines = [];
					savedLines = [];
					$("#loading").fadeOut(300);
				},
				error: function(){
					$("#loading").fadeOut(300);
				}
			})
		}
		
	})
});
