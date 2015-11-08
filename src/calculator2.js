var marker = false; ////Has the user plotted their location marker? 
var ville = false;
var data_response = false;
var lat, lng;
var map;

function initialize() {
	map = L.map('map-canvas').setView([46.77863469527167, 2.53896484375], 6);
	/*L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);*/http://wxs.ign.fr/j5tcdln4ya4xggpdu4j0f0cn/geoportail/wmts?SERVICE=WMTS&REQUEST=GetTile&VERSION=1.0.0&LAYER=GEOGRAPHICALGRIDSYSTEMS.PLANIGN&STYLE=normal&TILEMATRIXSET=PM&TILEMATRIX=8&TILEROW=106&TILECOL=151&FORMAT=image/jpeg

	var layerTypeIGN = 'GEOGRAPHICALGRIDSYSTEMS.MAPS';
	var clefIGN = 'urk9sxx23nr83rdxicj4d1ga';
	var urlIGN = "http://wxs.ign.fr/" + clefIGN + "/wmts?LAYER=" + layerTypeIGN + "&EXCEPTIONS=text/xml&FORMAT=image/jpeg&SERVICE=WMTS&VERSION=1.0.0&REQUEST=GetTile&STYLE=normal&TILEMATRIXSET=PM&TILEMATRIX={z}&TILECOL={x}&TILEROW={y}";
	this.layerIGN = L.tileLayer(urlIGN, {
		attribution : '&copy; <a href="http://www.ign.fr/">IGN-France</a>',
		opacity:0.80
	}).addTo(map);
	geocoder = new google.maps.Geocoder();

	map.on('click', function(e) {
		if (marker === false) {
			marker = L.marker(e.latlng).addTo(map);
		} else{
			marker.setLatLng(e.latlng);
		}
		lat = e.latlng.lat;
		lng = e.latlng.lng;

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