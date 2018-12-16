<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tooba
 * @subpackage ToobaPortal
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="container" class="site">
    <header class="clearfix" id="header" role="banner">
        <nav id="site-navigation" class="navbar navbar-default" role="navigation"
             aria-label="<?php esc_attr_e( 'Top Menu', 'tooba' ); ?>">
            <div class="container">
                <div class="navbar-header">
                    <button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
						<?php
						echo twentyseventeen_get_svg( array( 'icon' => 'bars' ) );
						echo twentyseventeen_get_svg( array( 'icon' => 'close' ) );
						_e( 'Menu', 'twentyseventeen' );
						?>
                    </button>
                    <!--<a class="navbar-brand" href="<?php get_bloginfo('url')?>"><img alt="<?php get_bloginfo('name') ?>" src="<?php get_custom_logo() ?>"></a>-->
                    <?php the_custom_logo() ?>
                </div>

				<?php wp_nav_menu( array( 'theme_location' => 'top', 'menu_id' => 'top-menu', ) ); ?>

				<?php if ( ( twentyseventeen_is_frontpage() || ( is_home() && is_front_page() ) ) && has_custom_header() ) : ?>
                    <a href="#content" class="menu-scroll-down">
						<?php echo twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ); ?>

                        <span class="screen-reader-text"><?php _e( 'Scroll down to content', 'twentyseventeen' ); ?>
                    </span>
                    </a>
				<?php endif; ?>
            </div>
        </nav><!-- #site-navigation -->
    </header>


    <div class="site-content-contain">
        <div id="content" class="site-content">
