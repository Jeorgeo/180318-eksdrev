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
</div>
<div class="wrap"></div>
<div id="window" class="popup-question">
	<div class="popup-question-close">
		close
	</div>
	<div class="details-form">
		<form id="js_form" method="post" class="cloud-form order-form">
			<!-- Hidden Required Fields -->
			<input type="hidden" name="project_name" value="eksdrev.by">
			<?php dynamic_sidebar( 'admin_mail' ); ?>
			<input class="cloud-title" type="hidden" name="form_subject" value="Заявка с сайта.Консультация">
			<!-- END Hidden Required Fields -->
			<label class="cloud-form__phone" for="name">Как к Вам обращаться?</label>
			<input id="phone" class="cloud-form__phone" type="text" name="name"
			value="" placeholder="Имя" required>
			<label class="cloud-form__phone" for="phone">Ваш номер телефона</label>
			<input id="phone" class="cloud-form__phone" type="text" name="phone"
			value="" placeholder="+375(___) ___-__-__" required>
			<button id="submit" class="cloud-form__submit" type="submit" name="submit">
				Заказать звонок
			</button>
		</form>
	</div>
</div>
<div class="popup-question-thanks">
	<div class="popup-question-close">
		close
	</div>
	<div class="box-content">
		<p class="thanks">
			Спасибо! Наш специалист свяжется с вами в ближайшее время.
		</p>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>
