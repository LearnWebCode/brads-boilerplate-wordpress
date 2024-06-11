<header class="site-header">
    <div class="container">
      <h1 class="school-logo-text float-left"><a href="<?php echo site_url() ?>"><strong>Fictional</strong> University</a></h1>
      <a href="<?php echo esc_url(site_url('/search')); ?>" class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></a>
      <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
      <div class="site-header__menu group">
        <nav class="main-navigation">
          <ul>
            <li <?php if (is_page('about-us') or wp_get_post_parent_id(0) == 22) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/about-us') ?>">About Us</a></li>
            <li <?php if (is_page('example-page-1')) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/example-page-1') ?>">Example Page 1</a></li>
            <li <?php if (is_page('example-page-2')) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/example-page-2') ?>">Example Page 2</a></li>
            <li <?php if (is_page('example-page-3')) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/example-page-3') ?>">Example Page 3</a></li>
          </ul>
        </nav>
        <div class="site-header__util">
          <?php if(is_user_logged_in()) { ?>
            <a href="<?php echo wp_logout_url();  ?>" class="btn btn--small  btn--dark-orange float-left btn--with-photo">
            <span class="site-header__avatar"><?php echo get_avatar(get_current_user_id(), 60); ?></span>
            <span class="btn__text">Log Out</span>
            </a>
            <?php } else { ?>
              <a href="<?php echo wp_login_url(); ?>" class="btn btn--small btn--orange float-left">Login</a>
             <?php } ?>
          
          <a href="<?php echo esc_url(site_url('/search')); ?>" class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></a>
        </div>
      </div>
    </div>
  </header>