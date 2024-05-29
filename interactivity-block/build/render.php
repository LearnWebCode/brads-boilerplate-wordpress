<?php

	$ourContext = array("showSkyColor" => false, "showGrassColor" => false, "attributes" => $attributes);

?>

<div class="ourboilerplate-frontend" data-wp-interactive="bradsboilerplate" <?php echo wp_interactivity_data_wp_context($ourContext) ?>>
	<p>
		<button data-wp-on--click="actions.toggleSkyColor">Toggle view sky color</button>
		<span data-wp-bind--hidden="!context.showSkyColor"><?php echo $attributes['skyColor'] ;?></span>
	</p>
	<p>
		<button data-wp-on--click="actions.toggleGrassColor">Toggle view grass color</button>
		<span data-wp-bind--hidden="!context.showGrassColor"><?php echo $attributes['grassColor'] ;?></span>
	</p>
	<p>
		<button data-wp-on--click="actions.accessExample">How to access attribute from JS inside of function</button>
	</p>
	<p>
		This is an example of grass color being visible via interactivity API instead of traditional PHP echo:
		<strong data-wp-text="context.attributes.grassColor"></strong>
	</p>
</div>