
function classToggle() {
  const navs = document.querySelectorAll('.NavbarItems')
  
  navs.forEach(nav => nav.classList.toggle('Navbar__ToggleShow'));
}
document.querySelector('.NavbarLink-toggle')
  .addEventListener('click', classToggle);
  
  
   
$(document).ready(function() {
	
var timeout;
var $window = $(window);


function SlideHead(){
   var head = $('#head');
   head.css({"position" : "relative", "opacity" : "0", "bottom" : "+=100"});
   head.animate({bottom:0, opacity: 1}, 2000);
	
}

function SlideImgDown() {
	var wholeImg = $('.newBack');
	
   wholeImg.css({"position" : "relative", "bottom" : "+=100"});
   wholeImg.animate({bottom:0, opacity: 1}, 2000);
}



function SlideImg() {
	var img = $('.oldBack');
	
	
	img.css({"opacity" : "0", "bottom" : "+=100"}).slideDown()
	.animate({bottom: 0, opacity: 1}, 2000);
	
}

function chyron(){
	var slide = $('.lead');
	
	slide.addClass("active");
   
}

function text() {
	var leadP = $('.leadP');
	
	 leadP.css({"opacity" : "1"});
}

setTimeout(SlideHead, 4990);
setTimeout(SlideImg, 2000);
setTimeout(SlideImgDown, 5000);


setTimeout(chyron, 8000);
setTimeout(text, 8000);





});