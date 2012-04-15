function center(id, constant) {
  var posTop = (($(window).height() - $(id).height()) / 2) - constant;
  $(id).css({marginTop: (posTop + "px")});
}

function showResult(data) {
  if (data.result == "success") {
	$(".name").hide();
	$(".email").hide();
	$(".submit").hide();
	$(".url").slideDown(250);
	$("#url").val("http://ubazaar.uchicago.edu/seller/tedxuchicago/?ref=" + data.code);
	$("#url").focus().select();
  } else {
  	$("form").replaceWith("Error: " + data.error);
  }
}

$(document).ready(function() {
  center("#container", 150);
  $("#submit").click(function(e) {
    e.preventDefault();
    if ($("#name").val() == "" || $("#email").val() == "") {
			alert("One or more fields is empty! Please completely fill out the form.");
	  }
    $(this).attr("disabled");
    $.ajax({
      type: 'POST',
      url: "action.php",
      dataType: 'json',
      data: $("#codeRetrieve").serialize(),
      success: function(data) {
        showResult(data);
      }
    });
  });
});

