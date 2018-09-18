

$(document).ready(function(){
	
	// Lift card and show stats on Mouseover
	$('.product-card').hover(function(){
			$(this).addClass('animate');
			$('div.carouselNext, div.carouselPrev').addClass('visible');			
		 }, function(){
			$(this).removeClass('animate');			
			$('div.carouselNext, div.carouselPrev').removeClass('visible');
	});	
	
	
$('#imgControl').change(function(){
	var color= $('#imgControl').val();
	console.log(color);
	$.ajax({
		url: 'colorSelect.php',
		type: 'post',
		data:{'color':color},
		success: function(data){

		console.log(data);
			
			$('#prodSlides').attr('src',data);
			
			
		}
		
	});
		
	});
	
	});
	
	
	
	


/*


var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("prodSlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
*/