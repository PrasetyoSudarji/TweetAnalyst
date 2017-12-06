<body>
	<div id='map'></div>
	
</body>

<script type='text/javascript'>
	// create basemap

	var map = new L.Map('map', {
		 	 	 center: new L.LatLng(-5.3921745,105.2751123),
		 	 	 zoom: 12
	});

	var googleLayer = new L.Google('ROADMAP');
	map.addLayer(googleLayer);

	// create marker in map

 	<?php
 		foreach ($json_data as $key => $value) {
 			# code...
 			echo 'L.marker(['.$value['lat'].','.$value['long'].'])
		         .bindPopup("created_at : '.$value['created_at'].'<br/> User : '.$value['screen_name'].'<br/> Tweet : '.$value['tweet_content'].'")
		         .addTo( map );';
 		}

 	?>

 	setTimeout(function(){
	   window.location.reload(1);
	}, 60000);

</script> 

