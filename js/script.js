$(window).load(function() {
	initialize();
	$('#map_canvas').appear(function() {
		dropPin();
	});
	$(".speaker").click(function() {
		if ($(this).hasClass("unannounced")) {
			return;
		}
		if ($(this).hasClass("next")) {
			$(".speaker").fadeIn();
			$(this).removeClass("next", 500);
		} else {
			$(".speaker").not(this).hide();
			$(this).addClass("next", 500);			
		}
	});
	$('.speakers ul').each(function(){
            // get current ul
            var $ul = $(this);
            // get array of list items in current ul
            var $liArr = $ul.children('li');
            // sort array of list items in current ul randomly
            $liArr.sort(function(a,b){
                  // Get a random number between 0 and 10
                  var temp = parseInt( Math.random()*10 );
                  // Get 1 or 0, whether temp is odd or even
                  var isOddOrEven = temp%2;
                  // Get +1 or -1, whether temp greater or smaller than 5
                  var isPosOrNeg = temp>5 ? 1 : -1;
                  // Return -1, 0, or +1
                  return( isOddOrEven*isPosOrNeg );
            })
            // append list items to ul
            .appendTo($ul);            
      });
});
  
  var map;
  var marker;
  function initialize() {
    geocoder = new google.maps.Geocoder();
    var origin = new google.maps.LatLng(41.7910762, -87.6983111);
    var mapOptions = {
      zoom: 12,
      center: origin,
      scrollwheel: false,
	  disableDefaultUI: true,      
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

  }
  
  function dropPin() {
    var latlng = new google.maps.LatLng(41.7910762, -87.5983111);
    marker = new google.maps.Marker({
	  map:map,
      animation: google.maps.Animation.DROP,
      position: latlng
    });
	var contentString = '<div class="infoWindow">'+
    '<img src="/images/logo-black-small.png" alt="TEDxUChicago" title="TEDxUChicago">' +
    '<h4>Mandel Hall</h4>'+
    '<h4>The University of Chicago</h4>'+
    '<h5>5706 S. University Ave.</h5>'+
    '<h5>Chicago, IL 60637</h5>'+
    '<a href="http://maps.google.com/maps?aq=&sll=41.790913,-87.598093&sspn=0.005335,0.013078&ie=UTF8&hq=university+of+chicago+mandel+hall&z=16&vpsrc=0&iwloc=A&daddr=1131+East+57th+Street,+Chicago,+IL+60637+%28University+Of+Chicago,+Mandel+Hall%29">Directions &gt;</a>'+
    '</div>';
    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });
    google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map,marker);
    });
  }