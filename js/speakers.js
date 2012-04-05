$(window).load(function(){
	$(".speaker").click(function() {
		if ($(this).hasClass("next")) {
			$(".speaker").fadeIn();
			$(this).removeClass("next", 500);
		} else {
			$(".speaker").not(this).hide();
			$(this).addClass("next", 500);			
		}
	});
});