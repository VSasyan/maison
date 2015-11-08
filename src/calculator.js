var marker = false; ////Has the user plotted their location marker? 
var ville = false;
var data_response = false;
var lat, lng;

function initialize() {
	var opts = {
		center: new google.maps.LatLng(46.77863469527167, 2.53896484375),
		zoom: 6
	};
	map = new google.maps.Map(document.getElementById('map-canvas'), opts);
	geocoder = new google.maps.Geocoder();
	
	//Listen for any clicks on the map.
	google.maps.event.addListener(map, 'click', function(event) {
		//Get the location that the user clicked.
		var clickedLocation = event.latLng;
		//If the marker hasn't been added.
		if(marker === false){
			//Create the marker.
			marker = new google.maps.Marker({
				position: clickedLocation,
				map: map,
				draggable: true //make it draggable
			});
			//Listen for drag events!
			google.maps.event.addListener(marker, 'dragend', function(event){
				markerLocation();
			});
		} else{
			//Marker has already been added, so just change its location.
			marker.setPosition(clickedLocation);
		}
		//Get the marker's location.
		markerLocation();
		//appel au php
		$('#city').html('');
		$('#result').removeClass('no');
		$('#ajax').html('<center><img src="img/ajax-loader.gif"/></center>');

		$.ajax({
			url: "position.json.php?lat="+lat+"&lon="+lng,
			success: function (resp) {
				data_response = JSON.parse(resp);
				console.log(data_response.data);
				$('#ajax').html(data_response.html);
				var ctx = $('#myChart').get(0).getContext("2d");
				var myDoughnutChart = new Chart(ctx).Doughnut(data_response.data, {
					legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
				});
				$('#legende').html(myDoughnutChart.generateLegend());
				$('html, body').animate({
					scrollTop:$('#result').offset().top
				}, 'slow');
			}
		});

		// Géocodage :
		geocoder.geocode({'location': {lat: lat, lng: lng}}, function (results, status) {
			var temp = false;
			main: for (var i = 0, l = results.length; i < l; i++) {
				var res = results[i];
				for (var j = 0, m = res.types.length; j < m; j++) {
					var t = res.types[j];
					if (t === 'locality' && res.address_components[0] && res.address_components[0].long_name) {
						temp = res.address_components[0].long_name;
						break main;
					}
				}
			}
			if (temp) {
				$('#city').html(' – ' + temp);
			} else {
				$('#city').html('');
			}
		});
	});

}
//This function will get the marker's current location and then add the lat/long
//values to our textfields so that we can save the location.
function markerLocation(){
	//Get location.
	currentLocation = marker.getPosition();
	//Add lat and lng values to a field that we can save.
	lat = currentLocation.lat(); //latitude
	lng = currentLocation.lng(); //longitude
}