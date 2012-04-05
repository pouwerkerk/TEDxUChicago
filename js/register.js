function topicsWrite() {
  var one = getTopic("#firstTopic");
  var two = getTopic("#secondTopic");
  var three = getTopic("#thirdTopic");
  
  $('#conversationTopicsPreview').empty().html(one + two + three); 
}

function getTopic(id) {
  var value = $(id).val();
  if (value == "") {
    return "";
  } else if (id == "#thirdTopic") {
    return value;
  } else {
    return (value + ' &bull; ');
  }
}

function tweetlength(object) {
	var length = $(object).val().length;
	var $selector = $(object).siblings(".count");
	var remaining = 140 - length;
	$selector.html(remaining);
	if (remaining < 10 && remaining >= 0) {
		$selector.addClass("warning").removeClass("alert");
		$("#submit").removeAttr("disabled");
	} else if (remaining <= 0) {
		$selector.removeClass("warning").addClass("alert");
		$("#submit").attr("disabled", true);
	} else {
		$selector.removeClass("warning").removeClass("alert");
		$("#submit").removeAttr("disabled");
	}
}

function replace(email) {
	var result = '<h2>Thank you for Applying to TEDxUChicago</h2><div id="checkmark"></div><p>You will receive an application submission confirmation at <span class="email">'+email+'</span> shortly. To accelerate the application process, please <b>confirm your email address</b> through the confirmation message at your earliest convenience. We process most applications within 48 hours. Thank you for your interest in TEDxUChicago.</p>';
	$("#application").html(result);
}

$(window).load(function() {
	$('#firstTopic').appear(function () {
		$("#badge").fadeIn(1500);
	});
	$('#firstName').keyup(function(event) {
		var value = $(this).val();
		if (value == "") {
			value = "Your";
		}
		$('#firstNamePreview').empty().html(value);
	});

	$('.tweetlength textarea').keydown(function() {
		tweetlength(this);
	}).keypress(function() {
		tweetlength(this);
	});

	$('#lastName').keyup(function(event) {
		var value = $(this).val();
		if (value == "") {
			value = "&nbsp;";
		}	
		$('#lastNamePreview').empty().html(value);
	});

	$('input.topic').keyup(function(event) {
    	topicsWrite();
	});
	$("#submit").click(function(event) {	
	/* Stop form from submitting normally */
	$(".validator").hide();
	event.preventDefault();
	if(validate() != 1) {
		$(this).attr("disabled", "disabled");
		$(".loader").show();
        
		/* Get some values from elements on the page: */
   
		var values = $("#application-form").serializeArray();

		/* Send the data using post and put the results in a div */
		$.ajax({
			url: "action.php",
			data: values,
			dataType: 'json',
			type: "POST",
			success: function(data) {
				if(data.result == "success") {
					replace(data.email);
				}
	    }});
	}
	});

});

function validate() {
	var fields = ["#firstName", "#lastName", "#email", "#questionOne", "#questionTwo", "#firstTopic", "#secondTopic", "#thirdTopic"];
	fail = 0;
	for(var i in fields) { 
		if($(fields[i]).val() == "") {
			$(fields[i]).siblings(".validator").css("display", "block");
			fail = 1;
		}
	}
	return fail;
}