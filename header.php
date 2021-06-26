<?php
/**
 * Website header
 *
 * @package Opti
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="profile" href="https://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

		<?php wp_head(); ?>
		<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script><![endif]-->
	</head>

	<body <?php body_class(); ?> data-breakpoint="1023">
		<?php wp_body_open(); ?>

		<section class="container hfeed">
			<header id="masthead" role="banner">
			<?php do_action( 'before' ); ?>

				<section class="row">
				<?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); } ?>
					<hgroup id="branding">
						<h1 id="logo" class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( 'Home', 'opti' ); ?>"><?php bloginfo( 'name' ); ?></a>
						</h1>
						<?php if ( get_bloginfo( 'description' ) ) { ?>
						<h2 id="description" class="site-description">
							<?php bloginfo( 'description' ); ?>
						</h2>
						<?php } ?>
					</hgroup>
<?php
	opti_custom_header( 'header' );
?>
				</section>
				<nav class="menu" id="nav-primary">
					<section class="row clearfloat">
						<?php opti_navmenu( 'navigation_top' ); ?>
						<?php get_template_part( 'searchform' ); ?>
					</section>
				</nav>
<?php
	if ( has_nav_menu( 'navigation_bottom' ) ) {
?>
				<nav class="menu clearfloat" id="nav-lower">
					<section class="row clearfloat">
						<?php wp_nav_menu( array( 'theme_location' => 'navigation_bottom', 'menu_class' => 'nav' ) ); ?>
					</section>
				</nav>
<?php
	}
?>
			</header>

			<?php do_action( 'before' ); ?>

			<section class="wrapper">

				<section id="main">
<?php

	opti_custom_header();

	do_action( 'opti_after_header' );
