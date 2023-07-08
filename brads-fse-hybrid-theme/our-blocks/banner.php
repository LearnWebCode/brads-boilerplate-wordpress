<?php

if (!isset($attributes['imgURL'])) {
  $attributes['imgURL'] = get_theme_file_uri('/images/library-hero.jpg');
}

?>

<div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url('<?php echo $attributes['imgURL'] ?>')"></div>
      <div class="page-banner__content container t-center c-white">
        <?php echo $content; ?>
      </div>
    </div>