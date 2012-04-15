function center(id, constant) {
  var posTop = (($(window).height() - $(id).height()) / 2) - constant;
  $(id).css({marginTop: (posTop + "px")});
}

$(document).ready(function() {
  center("#container", 150);
});

