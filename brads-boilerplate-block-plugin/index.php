<?php

/*
  Plugin Name: Brad&rsquo;s Boilerplate Block Plugin
  Version: 1.0
  Author: Brad
  Author URI: https://github.com/LearnWebCode
*/

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function bradsboilerplateblockregister() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'bradsboilerplateblockregister' );