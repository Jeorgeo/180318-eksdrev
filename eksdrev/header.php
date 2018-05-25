<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eksdrev
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header class="main-header">
		<div class="container">
			<div id="js-toggle" class="header__menu-toggle">
				<button class="header__toggle-btn"><span>menu</span></button>
			</div>
			<div class="logo-box">
				<?php the_custom_logo(); ?>
			</div>
			<div class="header__mobile-menu">
				<nav class="menu-box">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
					?>
				</nav>
				<div class="contacts-box">
					<?php dynamic_sidebar( 'contacts-vel' ); ?>
					<?php dynamic_sidebar( 'contacts-mts' ); ?>
				</div>
			</div>
		</div>
	</header>
