<?php
/**
 * PHP file to use when rendering the block type on the server to show on the front end.
 *
 * The following variables are exposed to the file:
 *     $attributes (array): The block attributes.
 *     $content (string): The block default content.
 *     $block (WP_Block): The block instance.
 *
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

	wp_interactivity_state('create-block', array('solvedCount' => 0, 'grassColor' => 'green'));

?>

<div data-wp-interactive="create-block">
	<p>Questions solved: <strong><span data-wp-text="state.solvedCount"></span></strong></p>
</div>

