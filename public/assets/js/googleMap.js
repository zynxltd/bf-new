// When the window has finished loading create our google map below
function initMap() {
	// Check if map element exists before initializing
	var mapElement = document.getElementById('gMap');
	if (!mapElement) {
		return; // Exit if map element doesn't exist
	}

	// Basic options for a simple Google Map
	// For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
	var mapOptions = {
		// How zoomed in you want the map to start at (always required)
		zoom: 14,

		// The latitude and longitude to center the map (always required)
		center: new google.maps.LatLng(33.4465154, -86.7318209), // New York

		// How you would like to style the map. 
		// This is where you would paste any style found on Snazzy Maps.
		styles: []
	};

	var map = new google.maps.Map(mapElement, mapOptions);
	
	// Let's also add a marker while we're at it
	marker = new google.maps.Marker({
		map:map,
		draggable:true,
		animation: google.maps.Animation.DROP,
		position: new google.maps.LatLng(33.4465154, -86.7318209), 
		// Change those co-ordinates to yours, to change your location with given location.
		icon: '' // null = default icon
	});
}

// Initialize map when Google Maps API is loaded
if (typeof google !== 'undefined' && google.maps) {
	google.maps.event.addDomListener(window, 'load', initMap);
} else {
	// Wait for Google Maps API to load
	window.addEventListener('load', function() {
		if (typeof google !== 'undefined' && google.maps) {
			initMap();
		}
	});
}