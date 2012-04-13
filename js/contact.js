$(window).load(function() {
	$("#submit").click(function(event) {	
	/* Stop form from submitting normally */
	$(".validator").hide();
	event.preventDefault();
	if(validate() != 1) {
		$(this).attr("disabled", "disabled");
		$(".loader").show();
		/* Get some values from elements on the page: */
   
		var values = $("form").serializeArray();

		/* Send the data using post and put the results in a div */
		$.ajax({
			url: "action.php",
			data: values,
			dataType: 'json',
			type: "POST",
			success: function(data) {
				if(data.result == "success") {
					replace(data.email);
					$("#badge").fadeOut();
					$('#page.register').css("height","450px");
					$('footer').css('top','0');
					$('#submit').hide();					
				}
	    }});
	}
	});

});

function validate() {
	var fields = ["#name", "#email", "#subject", "#message"];
	fail = 0;
	for(var i in fields) { 
		if($(fields[i]).val() == "") {
			$(fields[i]).siblings(".validator").css("display", "block");
			fail = 1;
			$("html").scrollTop();
		}
	}
	return fail;
}