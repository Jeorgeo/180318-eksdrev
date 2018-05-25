<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eksdrev
 */

?>


<footer id="contacts">
	<div class="footer__box">
		<div class="footer__box-map">
			<img src="<?php bloginfo('template_url'); ?>/img/eksdrev_map.jpg" alt="ЛидаЭксДрев Производство корпусной мебели в Лиде">
		</div>
		<div class="container">
			<div class="logo-box">
				<?php the_custom_logo(); ?>
			</div>
			<div class="footer__box-contacts">
				<?php dynamic_sidebar( 'contacts-adress' ); ?>
				<?php dynamic_sidebar( 'contacts-vel' ); ?>
				<?php dynamic_sidebar( 'contacts-mts' ); ?>
				<?php dynamic_sidebar( 'contacts-mail' ); ?>
				<div class="social">
					<?php dynamic_sidebar( 'social-vk' ); ?>
					<?php dynamic_sidebar( 'social-ok' ); ?>
					<?php dynamic_sidebar( 'social-inst' ); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="footer__copy">
		<div class="container">
			<?php dynamic_sidebar( 'f-bottom-1' ); ?>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
