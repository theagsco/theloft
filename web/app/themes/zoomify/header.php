<?php
/**
 * The themes Header file.
 *
 * Displays all of the <head> section and everything up till <div id="main-wrap">
 *
 * @package Zoomify
 */
 ?><!DOCTYPE html>
<html id="doc" <?php language_attributes(); ?> <?php zoomify_html_tag_schema(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="search-overlay">
		<div class="search-wrap">
			<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
        <input type="text" class="field mainsearch" name="s" id="s" autofocus="autofocus" placeholder="<?php echo esc_attr_x( 'Type to Search &hellip;', 'placeholder', 'zoomify' ); ?>" />
        <input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'zoomify' ); ?>" />
      </form>
			<div class="search-close"></div>
			<p class="search-info"><?php _e('Type your search terms above and press return to see the search results.', 'zoomify') ?></p>
		</div><!-- end .search-wrap -->
	</div><!-- end .search-overlay -->

	<header class="tr-header clearfix" role="banner">
	<?php if ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) {
			jetpack_the_site_logo();
		} else { ?>
		<div id="site-title">
      <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
      <?php if ( '' != get_bloginfo('description') ) { ?>
  		<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
  		<?php } ?>
    </div>
		<?php } ?>

    <button class="menu-toggle"></button>
    <nav id="site-navigation" class="main-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header>

<?php zoomify_page_header($post->ID); ?>

<main class="site-content" role="main">