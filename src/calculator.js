var marker = false; ////Has the user plotted their location marker? 
 var lat;
 var lng;
 var data;
 function initialize() {

  /*map = new google.maps.Map(document.getElementById("map_canvas"), {
        zoom: 15,
        center: new google.maps.LatLng(35.62148037, -106.0604306),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });*/
	var opts = {
		center: new google.maps.LatLng(35.62148037, -106.0604306),
		zoom: 15
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
		$.ajax({
			url: "position.json.php?lat="+lat+"&lon="+lng,
			success: function (resp) {
				 data_response = JSON.parse(resp);
				 console.log(resp,data_response.data);
				 $('#ajax').html(data_response.html);
				 google.load("visualization", "1", {packages:["corechart"]});
				 google.setOnLoadCallback(draw);
				 function draw(){
					 var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
				 }
				
			}  
		});
    });


}
//This function will get the marker's current location and then add the lat/long
//values to our textfields so that we can save the location.
function markerLocation(){
    //Get location.
    var currentLocation = marker.getPosition();
    //Add lat and lng values to a field that we can save.
    lat = currentLocation.lat(); //latitude
    lng = currentLocation.lng(); //longitude
}