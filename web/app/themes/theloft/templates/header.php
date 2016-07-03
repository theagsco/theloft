<header class="banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container">
    <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>">
      <img class="svg logo-main" src="<?php bloginfo('template_directory'); ?>/assets/images/theloft_logo.svg"/>
      <img class="svg logo-small" src="<?php bloginfo('template_directory'); ?>/assets/images/theloft_logo_small.svg"/>
    </a>
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only"><?= __('Toggle navigation', 'sage'); ?></span>
        <span class="nav-hamburger"><img class="svg" src="<?php bloginfo('template_directory'); ?>/assets/images/icons_hamburger.svg"/></span>
      </button>
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      endif;
      ?>
    </nav>

    <?php if (is_front_page()) : ?>

	 <?php endif; ?>

  </div>
</header>
<div style="clear:both;"></div>
