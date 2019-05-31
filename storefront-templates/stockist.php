<?include("header.php");?>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_API_KEY&callback=initMap"></script>

<section class="stockists">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="storeFinderWrapper">
					<h2>FIND A STORE</h2>
					<p>REQUIRED FIELDS</p>
					<p>REGION / COUNTRY</p>
					<select name="" id="">
						<option value="">SELECT A REGION / COUNTRY</option>
					</select>
					<select name="" id="">
						<option value="">SELECT A CITY</option>
					</select>
					<button onclick="getLocation()">USE MY LOCATION</button>
					
					<div class="stores">
						<div class="item">
							<h2>RAISAVANESSA SHOWROOM</h2>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur esse cum, suscipit, sunt distinctio earum quam quasi eaque ex quod excepturi obcaecati saepe voluptatum, tempore consequatur. Rem, unde error quisquam.</p>
							<p>+9023465621</p>
							<p>INFO@RAISAVESSA.COM</p>
							<p>WWW.RAISAVESSA.COM</p>
						</div>
						<div class="item">
							<h2>RAISAVANESSA SHOWROOM</h2>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur esse cum, suscipit, sunt distinctio earum quam quasi eaque ex quod excepturi obcaecati saepe voluptatum, tempore consequatur. Rem, unde error quisquam.</p>
							<p>+9023465621</p>
							<p>INFO@RAISAVESSA.COM</p>
							<p>WWW.RAISAVESSA.COM</p>
						</div>
						<div class="item">
							<h2>RAISAVANESSA SHOWROOM</h2>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur esse cum, suscipit, sunt distinctio earum quam quasi eaque ex quod excepturi obcaecati saepe voluptatum, tempore consequatur. Rem, unde error quisquam.</p>
							<p>+9023465621</p>
							<p>INFO@RAISAVESSA.COM</p>
							<p>WWW.RAISAVESSA.COM</p>
						</div>
						<div class="item">
							<h2>RAISAVANESSA SHOWROOM</h2>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur esse cum, suscipit, sunt distinctio earum quam quasi eaque ex quod excepturi obcaecati saepe voluptatum, tempore consequatur. Rem, unde error quisquam.</p>
							<p>+9023465621</p>
							<p>INFO@RAISAVESSA.COM</p>
							<p>WWW.RAISAVESSA.COM</p>
						</div>
						<div class="item">
							<h2>RAISAVANESSA SHOWROOM</h2>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur esse cum, suscipit, sunt distinctio earum quam quasi eaque ex quod excepturi obcaecati saepe voluptatum, tempore consequatur. Rem, unde error quisquam.</p>
							<p>+9023465621</p>
							<p>INFO@RAISAVESSA.COM</p>
							<p>WWW.RAISAVESSA.COM</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div id="map" style="width: 100%; height: 70vh;"></div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">

	function initMap() {


		var locations = [
		['MagazaName', 41.06466752550854, 29.041024929827444], // Magaza Koordinatları
		['MagazaName', 41.00314763040729, 29.0555 000 00 00154],
		['MagazaName', 41.0431165804094, 29.04094211651591],
		['MagazaName', 40.98004221338571, 29.022700098833404],
		['MagazaName', 41.08188888024431, 28.87908996580577],
		['MagazaName', 41.120252630572104, 29.068755134038902],
		];
		const image = "images/map-pin.png";

		const map = new google.maps.Map(document.getElementById('map'), {
			zoom: 10,
			center: new google.maps.LatLng(41.022958726449914, 28.978757014304257), // Haritanın ortaladığı koordinatlar
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
<?include("footer.php");?>