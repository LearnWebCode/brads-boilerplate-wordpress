<?php

	$ourContext = array("showSkyColor" => false, "showGrassColor" => false, "attributes" => $attributes);

?>

<div class="my-unique-plugin-wrapper-class">
<div class="bg-amber-100 border-2 border-amber-300 p-4 my-3 rounded shadow-md" data-wp-interactive="bradsboilerplatetailwind" <?php echo wp_interactivity_data_wp_context($ourContext) ?>>
	<p>
		<button class="rounded bg-gray-100 hover:bg-gray-200 active:bg-gray-300 border border-gray-300 py-1 px-3 mr-3 mb-3 inline-block" data-wp-on--click="actions.toggleSkyColor">Toggle view sky color</button>
		<span data-wp-bind--hidden="!context.showSkyColor"><?php echo $attributes['skyColor'] ;?></span>
	</p>
	<p>
		<button class="rounded bg-gray-100 hover:bg-gray-200 active:bg-gray-300 border border-gray-300 py-1 px-3 mr-3 mb-3 inline-block" data-wp-on--click="actions.toggleGrassColor">Toggle view grass color</button>
		<span data-wp-bind--hidden="!context.showGrassColor"><?php echo $attributes['grassColor'] ;?></span>
	</p>
	<p>
		<button class="rounded bg-gray-100 hover:bg-gray-200 active:bg-gray-300 border border-gray-300 py-1 px-3 mr-3 mb-3 inline-block" data-wp-on--click="actions.accessExample">How to access attribute from JS inside of function</button>
	</p>
	<p class="text-amber-900">
		This is an example of grass color being visible via interactivity API instead of traditional PHP echo:
		<strong data-wp-text="context.attributes.grassColor"></strong>
	</p>
</div>
</div>