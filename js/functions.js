//=============Copyright - Minh Dat Hoang - 2013===============
//function list:
//===validateCheckbox(class) -> check if the checkboxes has been at least 1 checked, have to give them the same class name
//===nl2br(text) -> \r \n \r\n -> <br />

function validateCheckbox(classKeo) {
	var anychecked = false;
	$("."+classKeo).each(function(){
		if($(this).is(':checked')) {
			anychecked = true;
		}
	});
	if(anychecked) {
		return true;
	} else {
		return false;
	}
}

function nl2br(text) {
        var newText = text.replace('\r\n','<br />',"g");
        newText = newText.replace('\r','<br />',"g");
        newText = newText.replace('\n','<br />',"g");
        return newText;
}

(function( $ ) {
  $.fn.fullHeight = function() {
  
    this.css({'height': $(window).height() + 'px'});


  };
})( jQuery );

(function( $ ) {
  $.fn.customFullHeight = function() {
  	var navContainerPaddingTop = 50;
	var navContainerPaddingBottom = 25;
	var navTopMarginBottom = 25;
	var navMainBlackLine = 25;
    this.css({'height': $("nav").height() - navContainerPaddingTop - navContainerPaddingBottom - navTopMarginBottom - (navMainBlackLine*2) - $("#nav_top").height() + 'px'});
  };
})( jQuery );

(function( $ ) {
  $.fn.coverNavTop = function() {
  	this.css({"width":"14.285%"});


  };
})( jQuery );

(function( $ ) {
  $.fn.widthAdjust = function() {
  	
	this.css({'width': $("#nav_top").width() * 14.285/100 * 3 + 'px'});


  };
})( jQuery );

function animationFrame(functionName) {
  /**
 * Provides requestAnimationFrame in a cross browser way.
 * http://paulirish.com/2011/requestanimationframe-for-smart-animating/
 */

  if ( !window.requestAnimationFrame ) {
  
    window.requestAnimationFrame = ( function() {
  
      return window.webkitRequestAnimationFrame ||
      window.mozRequestAnimationFrame || // comment out if FF4 is slow (it caps framerate at ~30fps: https://bugzilla.mozilla.org/show_bug.cgi?id=630127)
      window.oRequestAnimationFrame ||
      window.msRequestAnimationFrame ||
      function( /* function FrameRequestCallback */ callback, /* DOMElement Element */ element ) {
  
        window.setTimeout( callback, 1000 / 60 );
  
      };
  
    } )();
  
  }
  
  function animate() {

    requestAnimationFrame( animate );
    functionName();

  }
  animate();  
  
}

//capitalize first letter of name
  function capitalize(s)
  {
      return s[0].toUpperCase() + s.slice(1);
  }

  //get rid of http://www.
  function httpRemove(s) {
    s = s.replace('http://','');
    s = s.replace('https://','');
    s = s.replace('www.','');
    return s;
  }

  function createCookie(name,value,days) {
  if (days) {
    var date = new Date();
    date.setTime(date.getTime()+(days*24*60*60*1000));
    var expires = "; expires="+date.toGMTString();
  }
  else var expires = "";
  document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for(var i=0;i < ca.length;i++) {
    var c = ca[i];
    while (c.charAt(0)==' ') c = c.substring(1,c.length);
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
  }
  return null;
}

function eraseCookie(name) {
  createCookie(name,"",-1);
}