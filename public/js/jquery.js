$(document).ready(function(){
	$('.pull-right').click(function(){
	    $(this).parent().fadeTo(400, 0, function () { // Links with the class "close" will close parent
					$(this).slideUp(400);
				});
				return false;
	});
});
