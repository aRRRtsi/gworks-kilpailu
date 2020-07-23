<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gworksKilpailu
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div id="page" class="site">

    <header id="masthead" class="site-header">
      <div class="site-branding">
        <?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
            rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php
			else :
				?>
        <p class="site-title">Palvelun tarjoaa </p>
        <img src="https://arileskinen.com/wp-content/uploads/kansallisteatterilogo.png" height="50">
        <?php
			endif;
			$gworkskilpailu_description = get_bloginfo( 'description', 'display' );
			if ( $gworkskilpailu_description || is_customize_preview() ) :
				?>
        <p class="site-description">
          <?php echo $gworkskilpailu_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        </p>
        <?php endif; ?>
      </div><!-- .site-branding -->

    </header><!-- #masthead -->