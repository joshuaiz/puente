<?php 

// Location widget template for the ACF Widgets plugin.

// Grab our repeater field
if( have_rows('locations', $acfw) ): ?>

	<ul class="locations-list">

	<script src='//maps.googleapis.com/maps/api/js' type='text/javascript'></script>

	<?php $count = 0; // start our count for our map ID selectors, otherwise Google has a fit ?>

	<?php while( have_rows('locations', $acfw) ): the_row(); 

	$count++; // increase the count after each loop

		// vars
		$name = get_sub_field('name', $acfw);
		$address = get_sub_field('address', $acfw);
		$map = get_sub_field('map', $acfw);
		$link = get_sub_field('link', $acfw);
		$hours = get_sub_field('hours', $acfw);

		?>

		<li class="location">

			<h4 class="widgettitle"><?php echo $name; ?></h4>

			<p><?php echo $address; ?></p>

			<div class="google-map">

				<?php if( ! empty($map) ): ?>
			
			<div id="map<?php echo $count; ?>" class="google-maps" style="width: 100%; height: 300px;"></div>

				<script type="text/javascript">
				  //<![CDATA[
					function load() {
					var lat = <?php echo $map['lat']; ?>;
					var lng = <?php echo $map['lng']; ?>;
				// coordinates to latLng
					var latlng = new google.maps.LatLng(lat, lng);
				// map Options
					var myOptions = {
					zoom: 11,
					center: latlng,
					scrollwheel: false, // disables zooming with mouse or trackpad
					mapTypeId: google.maps.MapTypeId.ROADMAP
				   };
				//draw a map
					var map = new google.maps.Map(document.getElementById("map<?php echo $count; ?>"), myOptions);
					var marker = new google.maps.Marker({
					position: map.getCenter(),
					map: map
				   });
				}
				// call the function
				   load();
				//]]>
				</script>
				<?php endif; ?> 

				<span class="small"><a href="<?php echo $link; ?>" target="_blank">View on Google Maps</a></span>

			</div>

			<div class="location-hours">
				
				<?php echo $hours; ?>

			</div>

		</li>

	<?php endwhile; ?>

	</ul>

<?php endif; ?>

<p class="small">These hours are for August – June. For summer hours, please call the office.</p>