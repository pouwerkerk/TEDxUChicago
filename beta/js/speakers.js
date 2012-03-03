$(window).load(function(){
	$(".speaker").click(function() {
		$(".speaker").not(this).fadeOut();
		// $(this).toggleClass( "next" );
		$(this).toggleClass("next", 500);
	});
});