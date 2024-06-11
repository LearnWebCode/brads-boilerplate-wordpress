<?php

require get_theme_file_path('/inc/search-route.php');

function myallowedblocks($allowed_block_types, $editor_context) {
  // If you are on a page/post editor screen
  if (!empty($editor_context->post)) {
    return $allowed_block_types;
  }

  // if you are on the FSE screen
  return array('ourblocktheme/header', 'ourblocktheme/footer');
}

// Uncomment the line below if you actually want to restrict which block types are allowed
//add_filter('allowed_block_types_all', 'myallowedblocks', 10, 2);

function university_custom_rest() {
  register_rest_field('post', 'authorName', array(
    'get_callback' => function() {return get_the_author();}
  ));
}

add_action('rest_api_init', 'university_custom_rest');

function pageBanner($args = NULL) {
  
  if (!isset($args['title'])) {
    $args['title'] = get_the_title();
  }

  if (!isset($args['subtitle'])) {
    $args['subtitle'] = '';
  }

  if (!isset($args['photo'])) {
    $args['photo'] = get_theme_file_uri('/images/ocean.jpg');
  }

  ?>
  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php echo $args['title'] ?></h1>
      <div class="page-banner__intro">
        <p><?php echo $args['subtitle']; ?></p>
      </div>
    </div>  
  </div>
<?php }

function university_files() {
  wp_enqueue_script('main-university-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('university_main_styles', get_theme_file_uri('/build/style-index.css'));
  wp_enqueue_style('university_extra_styles', get_theme_file_uri('/build/index.css'));

  wp_localize_script('main-university-js', 'universityData', array(
    'root_url' => get_site_url(),
    'nonce' => wp_create_nonce('wp_rest')
  ));

}

add_action('wp_enqueue_scripts', 'university_files');

function university_blocks() {
  wp_localize_script('wp-editor', 'ourThemeData', array('themePath' => get_stylesheet_directory_uri()));

  register_block_type_from_metadata( __DIR__ . '/build/interactivity-quiz' );
	register_block_type_from_metadata( __DIR__ . '/build/solved-counter' );
  register_block_type_from_metadata( __DIR__ . '/build/eventsandblogs' );
  register_block_type_from_metadata( __DIR__ . '/build/header' );
  register_block_type_from_metadata( __DIR__ . '/build/footer' );
  register_block_type_from_metadata( __DIR__ . '/build/singlepost' );
  register_block_type_from_metadata( __DIR__ . '/build/page' );
  register_block_type_from_metadata( __DIR__ . '/build/blogindex' );
  register_block_type_from_metadata( __DIR__ . '/build/archive' );
  register_block_type_from_metadata( __DIR__ . '/build/search' );
  register_block_type_from_metadata( __DIR__ . '/build/searchresults' );
  register_block_type_from_metadata( __DIR__ . '/build/genericbutton' );
  register_block_type_from_metadata( __DIR__ . '/build/genericheading' );
  register_block_type_from_metadata( __DIR__ . '/build/banner' );
  register_block_type_from_metadata( __DIR__ . '/build/slide' );
  register_block_type_from_metadata( __DIR__ . '/build/slideshow' );
  register_block_type_from_metadata( __DIR__ . '/build/container' );
}
add_action( 'init', 'university_blocks');


function university_features() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_image_size('pageBanner', 1500, 350, true);
  add_theme_support('editor-styles');
  add_editor_style(array('https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i', 'build/style-index.css', 'build/index.css'));
}

add_action('after_setup_theme', 'university_features');

// Customize Login Screen
add_filter('login_headerurl', 'ourHeaderUrl');

function ourHeaderUrl() {
  return esc_url(site_url('/'));
}

add_action('login_enqueue_scripts', 'ourLoginCSS');

function ourLoginCSS() {
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('university_main_styles', get_theme_file_uri('/build/style-index.css'));
  wp_enqueue_style('university_extra_styles', get_theme_file_uri('/build/index.css'));
}

add_filter('login_headertitle', 'ourLoginTitle');

function ourLoginTitle() {
  return get_bloginfo('name');
}