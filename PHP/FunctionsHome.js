
if (document.getElementById("mainImage") !== null) {
var slideIndex = 0;
showSlides();
var slides;
var initial;


function plusSlides(position) {
	
	
    slideIndex += position;
    if (slideIndex > slides.length) {slideIndex = 1}
	
    else if(slideIndex <= 1){slideIndex = slides.length}
	
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }

		
	
        slides[slideIndex-1].style.display = "block";  
		slideIndex--;
		
       clearTimeout(initial);
	   showSlides();
    }

function currentSlide(index) {
    if (index > slides.length) {index = 1}
    else if(index < 1){index = slides.length}
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
  
        slides[index-1].style.display = "block";  
   
    }


function showSlides() {
    var i;
    slides = document.getElementsByClassName("mySlides");
    initial = slides.setTimeout
	
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}    
   
   
    
    slides[slideIndex-1].style.display = "block";  
   
   
     initial = setTimeout(showSlides, 3000); 
	 // Change image every 3 second
   
}


}
$(document).ready(function() {
	
$("#topMess").delay('2000').slideToggle('slow');
$("#topMess").delay('10000').slideToggle('slow');
$("topMess").css("display: none");






});