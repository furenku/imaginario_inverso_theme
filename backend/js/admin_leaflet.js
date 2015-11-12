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
	
    map.removeLayer(markers);


	markers = new L.FeatureGroup();

	markers.addTo(map);

	marker = L.marker([ e.latlng.lat, e.latlng.lng ])
		.bindPopup("Rock!").openPopup();

	markers.addLayer(marker);

	$('#rock_longitude').val( e.latlng.lng );
	$('#rock_latitude').val( e.latlng.lat );

}

map.on('click', onMapClick);



// create control and add to map
var lc = L.control.locate().addTo(map);

// request location update and set location
lc.start();

console.log(lc);



});