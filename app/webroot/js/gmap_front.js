var initialLocation;
var cali = new google.maps.LatLng(3.447625, -76.517029);
var newyork = new google.maps.LatLng(40.69847032728747, -73.9514422416687);
var browserSupportFlag = new Boolean();
var map;
var geocoder = new google.maps.Geocoder();
var markers = [];
function initialize() {
	var myOptions = {
		zoom : 14,
		mapTypeId : google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
	//EVENTOS DEL MAPA
	google.maps.event.addListenerOnce(map, 'center_changed', function() {// La primer
		var latLng = map.getCenter()
		var marker = new google.maps.Marker({
			position : latLng,
			map : map,
			draggable : true,
			title : "Mueve el icono para actualizar la ubicación"
		});
		google.maps.event.addListener(marker, 'position_changed', function() {
			$(".lat").val(marker.getPosition().lat());
			$(".lng").val(marker.getPosition().lng());
			;
		});
		$(".lat").val(latLng.lat());
		$(".lng").val(latLng.lng());
	});
	// Try W3C Geolocation (Preferred)
	if(navigator.geolocation) {
		browserSupportFlag = true;
		navigator.geolocation.getCurrentPosition(function(position) {
			initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
			map.setCenter(initialLocation);
		}, function() {
			handleNoGeolocation(browserSupportFlag);
		});
		// Try Google Gears Geolocation
	} else if(google.gears) {
		browserSupportFlag = true;
		var geo = google.gears.factory.create('beta.geolocation');
		geo.getCurrentPosition(function(position) {
			initialLocation = new google.maps.LatLng(position.latitude, position.longitude);
			map.setCenter(initialLocation);
		}, function() {
			handleNoGeoLocation(browserSupportFlag);
		});
		// Browser doesn't support Geolocation
	} else {
		browserSupportFlag = false;
		handleNoGeolocation(browserSupportFlag);
	}
}

function initializeMainMap() {
	var myOptions = {
		zoom : 12,
		mapTypeId : google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map(document.getElementById("main_map"), myOptions);
	var colombia = new google.maps.LatLng('4.570868', '-74.29733299999998');
	updateCoordinates();
	getOffices();
}

function handleNoGeolocation(errorFlag) {
	if(errorFlag == true) {
		alert("El Servicio de Geolocalizacion falló, el mapa se ha centrado en la ciudad de Cali");
		initialLocation = cali;
	} else {
		alert("Su navegador no soporta geolocalización, el mapa se ha centrado en la ciudad de Cali.");
		initialLocation = cali;
	}
	map.setCenter(initialLocation);
}

function getOffices() {
	if(markers.length){
		for( i in markers){
			markers[i].setMap(null);
		}
		markers.length=0;
	}
	BJS.JSON('/cities/getOffices/' + $('#ciudad option:selected').val() + '/' + $('#tipo option:selected').val(), {}, function(offices) {
		$.each(offices, function(i, val) {
			console.log(val);
			coordinates = new google.maps.LatLng(val.Office.latitud, val.Office.longitud);
				markers[val.Office.id] = new google.maps.Marker({
				position : coordinates,
				map : map,
				draggable : true,
				title :val.Office.nombre,
				icon:'../img/'+val.TypeOffice.image
			});
			markers[val.Office.id].setPosition(coordinates);
		});
		//marker.setPosition(coordinates);
	});
}

function updateCoordinates(cityId) {
	BJS.JSON('/cities/getCoordinates/' + $('#ciudad option:selected').val(), {}, function(latLng) {
		if(latLng) {
			var coordinates = new google.maps.LatLng(latLng.lat, latLng.lng);
			map.setCenter(coordinates);
		}

	});
}

$(function() {
	initializeMainMap();
	$('#ciudad').change(function() {
		updateCoordinates();
		getOffices();
	});
	$('#tipo').change(function() {
		getOffices();
	});
});
