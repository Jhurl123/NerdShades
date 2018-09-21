

$(document).ready(function(){
	
	
	
$('.product-card').hover(function(){
	var prod= $(this).attr('id');
	var prodString = prod.toString();
	var id = prodString.substring(4,5);
	console.log(id);
	$('#prodTitle',this).toggle();
	$('#prodPrice',this).toggle();
	$(this).addClass('animate');
	
	}, function(){
	$(this).removeClass('animate');
	$('#prodTitle',this).toggle();
	$('#prodPrice',this).toggle();
		
	});
	
	
$('#imgControl').change(function(){
	var color= $('#imgControl').val();
	
	$.ajax({
		url: 'colorSelect.php',
		type: 'post',
		dataType: 'json',
		data:{'color':color},
		success: function(data){
			
			$('#prodSlides').attr('src',data.path);
			$('#prodForm').attr('action', "cart.php?action=add&id=" + data.colorId);
			
			
			
		}
		
	});
		
	});
	
	
$('#prodForm').submit(function (evt) {
    evt.preventDefault();
    window.history.back();
});
	
	});
	
	
	
	
