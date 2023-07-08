<?php

require get_theme_file_path('/inc/search-route.php');

class PlaceholderBlock {
  function __construct($name) {
    $this->name = $name;
    add_action('init', [$this, 'onInit']);
  }

  function ourRenderCallback($attributes, $content) {
    ob_start();
    require get_theme_file_path("/our-blocks/{$this->name}.php");
    return ob_get_clean();
  }

  function onInit() {
    wp_register_script($this->name, get_stylesheet_directory_uri() . "/our-blocks/{$this->name}.js", array('wp-blocks', 'wp-editor'));
    
    register_block_type("ourblocktheme/{$this->name}", array(
      'editor_script' => $this->name,
      'render_callback' => [$this, 'ourRenderCallback']
    ));
  }
}

/*
  Create a new instance of PlaceholderBlock when you don't need JSX on the admin
  side or the public client side. Look at one of the following block names
  in the "our-blocks" folder as an example; there's a matching js file name and
  a matching php file name. The Admin block appearance is not interactive,
  it's just a gray placeholder block that users can insert, move up or down etc...
*/

new PlaceholderBlock("eventsandblogs");
new PlaceholderBlock("header");
new PlaceholderBlock("footer");
new PlaceholderBlock("singlepost");
new PlaceholderBlock("page");
new PlaceholderBlock("blogindex");
new PlaceholderBlock("archive");
new PlaceholderBlock("search");
new PlaceholderBlock("searchresults");

class JSXBlock {
  function __construct($name, $renderCallback = null, $data = null) {
    $this->name = $name;
    $this->data = $data;
    $this->renderCallback = $renderCallback;
    add_action('init', [$this, 'onInit']);
  }

  function ourRenderCallback($attributes, $content) {
    ob_start();
    require get_theme_file_path("/our-blocks/{$this->name}.php");
    return ob_get_clean();
  }

  function onInit() {
    wp_register_script($this->name, get_stylesheet_directory_uri() . "/build/{$this->name}.js", array('wp-blocks', 'wp-editor'));
    
    if ($this->data) {
      wp_localize_script($this->name, $this->name, $this->data);
    }

    $ourArgs = array(
      'editor_script' => $this->name
    );

    if ($this->renderCallback) {
      $ourArgs['render_callback'] = [$this, 'ourRenderCallback'];
    }

    register_block_type("ourblocktheme/{$this->name}", $ourArgs);
  }
}

/*
  Create a new instance of JSXBlock if you want intearctive 
  JSX for admin side and PHP SSR for public client side.

  When you create a new instance of JSXBlock you need to go into
  package.json and in the "start" script task, you need to add
  your matching name's JS file as a listed reference. For example,
  you'll see all of the names below also in our package.json's
  start task. This way the official @wordpress/scripts task
  will process your JSX.
*/

new JSXBlock('banner', true, ['fallbackimage' => get_theme_file_uri('/images/library-hero.jpg')]);
new JSXBlock('genericheading');
new JSXBlock('genericbutton');
new JSXBlock('slideshow', true);
new JSXBlock('container', true);
new JSXBlock('slide', true, ['themeimagepath' => get_theme_file_uri('/images/')]);

class PublicClientSideBlock {
  function __construct($name) {
    $this->name = $name;
    add_action('init', [$this, 'adminAssets']);
  }

  function adminAssets() {
    wp_register_style($this->name, get_stylesheet_directory_uri() . "/build/{$this->name}-admin.css");
    wp_register_script($this->name, get_stylesheet_directory_uri() . "/build/{$this->name}-admin.js", array('wp-blocks', 'wp-element', 'wp-editor'));
    register_block_type('ourplugin/' . $this->name, array(
      'editor_script' => $this->name,
      'editor_style' => $this->name,
      'render_callback' => array($this, 'theHTML')
    ));
  }

  function theHTML($attributes) {
    if (!is_admin()) {
      wp_enqueue_script("{$this->name}-frontend", get_stylesheet_directory_uri() . "/build/{$this->name}-frontend.js", array('wp-element'), '1.0', true);
      wp_enqueue_style("{$this->name}-frontend", get_stylesheet_directory_uri() . "/build/{$this->name}-frontend.css");
    }    

    ob_start(); ?>
    <div class="<?php echo $this->name ?>-update-me"><pre style="display: none;"><?php echo wp_json_encode($attributes) ?></pre></div>
    <?php return ob_get_clean();
  }
}

/*
  Create a new instance of PublicClientSideBlock when you need
  interactive JSX for both the admin side and the public client side.

  When you create a new instance of PublicClientSideBlock you need
  to create a new folder in the "our-blocks" directory with your matching
  name (e.g. quiz as below). In that new folder you'll need 4 files.
  Replace "name" with whatever your actual block's shortname is.

  name-admin.js
  name-admin.scss

  name-frontend.js
  name-frontend.scss

  You can use the quiz block as an example you can copy/paste and
  hollow out and experiment with.

  When you create a new instance of PublicClientSideBlock you need
  to go into package.json and add TWO new items to your "start" task;
  both name-admin.js and name-frontend.js
*/

new PublicClientSideBlock("quiz");

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