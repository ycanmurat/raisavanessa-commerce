<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_API_KEY&callback=initMap"></script>

<section class="stockists">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="storeFinderWrapper">
					<h2>Mağaza Bul</h2>
					<!-- <p>REQUIRED FIELDS</p>
					<p>REGION / COUNTRY</p>
					<select name="" id="">
						<option value="">SELECT A REGION / COUNTRY</option>
					</select>
					<select name="" id="">
						<option value="">SELECT A CITY</option>
					</select>
					<button onclick="getLocation()">USE MY LOCATION</button>
				-->
				<div class="stores">
					<?php foreach ($list as $key => $val) { ?>
						<div class="item">
							<h2><?=$val->name?></h2>
							<p><?=$val->address?></p>
							<p><?=$val->gsm?></p>
							<p><?=$val->email?></p>
							<p><?=$val->site?></p>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div id="map" style="width: 100%; height: 70vh;"></div>
		</div>
	</div>
</div>
</section>

<script>
	function initMap() {


		var locations = [
		<?php foreach ($list as $key => $val) { ?>
			["<?=$val->name?>", <?=$val->geo_1?>, <?=$val->geo_2?>], 
		<?php } ?>
		];
		
		const image = "assets/Front/images/map-pin.png";

		const map = new google.maps.Map(document.getElementById('map'), {
			zoom: 4,
			center: new google.maps.LatLng(<?=$list[0]->geo_1?>, <?=$list[0]->geo_2?>),
			styles: [
			{
				"featureType": "all",
				"elementType": "geometry.fill",
				"stylers": [
				{
					"weight": "2.00"
				}
				]
			},
			{
				"featureType": "all",
				"elementType": "geometry.stroke",
				"stylers": [
				{
					"color": "#9c9c9c"
				}
				]
			},
			{
				"featureType": "all",
				"elementType": "labels.text",
				"stylers": [
				{
					"visibility": "on"
				}
				]
			},
			{
				"featureType": "landscape",
				"elementType": "all",
				"stylers": [
				{
					"color": "#f2f2f2"
				}
				]
			},
			{
				"featureType": "landscape",
				"elementType": "geometry.fill",
				"stylers": [
				{
					"color": "#ffffff"
				}
				]
			},
			{
				"featureType": "landscape.man_made",
				"elementType": "geometry.fill",
				"stylers": [
				{
					"color": "#ffffff"
				}
				]
			},
			{
				"featureType": "poi",
				"elementType": "all",
				"stylers": [
				{
					"visibility": "off"
				}
				]
			},
			{
				"featureType": "road",
				"elementType": "all",
				"stylers": [
				{
					"saturation": -100
				},
				{
					"lightness": 45
				}
				]
			},
			{
				"featureType": "road",
				"elementType": "geometry.fill",
				"stylers": [
				{
					"color": "#eeeeee"
				}
				]
			},
			{
				"featureType": "road",
				"elementType": "labels.text.fill",
				"stylers": [
				{
					"color": "#7b7b7b"
				}
				]
			},
			{
				"featureType": "road",
				"elementType": "labels.text.stroke",
				"stylers": [
				{
					"color": "#ffffff"
				}
				]
			},
			{
				"featureType": "road.highway",
				"elementType": "all",
				"stylers": [
				{
					"visibility": "simplified"
				}
				]
			},
			{
				"featureType": "road.arterial",
				"elementType": "labels.icon",
				"stylers": [
				{
					"visibility": "off"
				}
				]
			},
			{
				"featureType": "transit",
				"elementType": "all",
				"stylers": [
				{
					"visibility": "off"
				}
				]
			},
			{
				"featureType": "water",
				"elementType": "all",
				"stylers": [
				{
					"color": "#46bcec"
				},
				{
					"visibility": "on"
				}
				]
			},
			{
				"featureType": "water",
				"elementType": "geometry.fill",
				"stylers": [
				{
					"color": "#c8d7d4"
				}
				]
			},
			{
				"featureType": "water",
				"elementType": "labels.text.fill",
				"stylers": [
				{
					"color": "#070707"
				}
				]
			},
			{
				"featureType": "water",
				"elementType": "labels.text.stroke",
				"stylers": [
				{
					"color": "#ffffff"
				}
				]
			}
			]
		});

		var infowindow = new google.maps.InfoWindow();

		var marker, i;

		for (i = 0; i < locations.length; i++) {  
			marker = new google.maps.Marker({
				position: new google.maps.LatLng(locations[i][1], locations[i][2]),
				map: map,
				icon: image
			});

			google.maps.event.addListener(marker, 'click', (function(marker, i) {
				return function() {
					infowindow.setContent(locations[i][0]);
					infowindow.open(map, marker);
				}
			})(marker, i));
		}

	}


	function getLocation() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition);
		} else { 
			x.innerHTML = "Error";
		}
		
	}

	function showPosition(position) {
		console.log("Latitude:" + position.coords.latitude + "- Longitude:" + position.coords.longitude);
	}

</script>


