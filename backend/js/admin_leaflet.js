var locationFound = false;


jQuery(document).ready(function($) {

var map = L.map('admin_rock_map').setView([30, -105], 6);

var markers = new L.FeatureGroup();
var marker;

if( document.getElementById('postdiv') )
{
    jQuery('#rock_metabox').insertBefore('#postdiv');
}
else if( document.getElementById('postdivrich') )
{
    jQuery('#rock_metabox').insertBefore('#postdivrich');
}


L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6IjZjNmRjNzk3ZmE2MTcwOTEwMGY0MzU3YjUzOWFmNWZhIn0.Y8bhBaUMqFiPrDRW9hieoQ', {
	maxZoom: 18,
	attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
		'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
		'Imagery © <a href="http://mapbox.com">Mapbox</a>',
	id: 'mapbox.streets'
}).addTo(map);


if( $('#rock_longitude').val() != ""  && $('#rock_latitude').val() != "" ) {
	marker = L.marker([ $('#rock_latitude').val(), $('#rock_longitude').val() ])
		.bindPopup("Rock!").openPopup();
	
	markers.addLayer(marker);

	markers.addTo(map);

}

function onMapClick(e) {
	

	if( ! locationFound ) {

	    map.removeLayer(markers);


		markers = new L.FeatureGroup();

		markers.addTo(map);

		marker = L.marker([ e.latlng.lat, e.latlng.lng ])
			.bindPopup(  e.latlng.lat + " : " + e.latlng.lng ).openPopup();

		markers.addLayer(marker);

		$('#rock_longitude').val( e.latlng.lng );
		$('#rock_latitude').val( e.latlng.lat );

	}

}

map.on('click', onMapClick);



// create control and add to map
var lc = L.control.locate({
	icon: 'fa fa-map-marker',
	markerClass: L.marker,
	follow: true,
    layer: markers,
    position: 'topleft'

}).addTo(map);

// request location update and set location
//lc.start();





		function onLocationFound(e) {

			locationFound = true;
			
			map.removeLayer(markers);

	    	var radius = e.accuracy / 2;

			$('#rock_longitude').val( e.latlng.lng );
			$('#rock_latitude').val( e.latlng.lat );

		}

		map.on('locationfound', onLocationFound);


		function onLocationError(e) {
		    alert(e.message);
		}

		map.on('locationerror', onLocationError);


		map.on('stopfollowing', function() {

		    locationFound = false;
		    map.off('dragstart', lc._stopFollowing, lc);
		});


});