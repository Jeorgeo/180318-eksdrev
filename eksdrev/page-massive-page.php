<?php
/**
 * Template Name: Мебель из массива
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eksdrev
 */

get_header();

$clients = get_posts(
		array(
				'numberposts' => -1,
				'offset' => 0,
				'orderby'     => 'date',
				'order'       => 'DESC',
				'category' => '',
				'include' => '',
				'exclude' => '',
				'meta_key' => '',
				'meta_value' => '',
				'post_type' => 'clients',
				'post_parent' => '',
				'post_status' => 'publish'
		)
);

$materials = get_posts(
		array(
				'numberposts' => -1,
				'offset' => 0,
				'orderby'     => 'date',
				'order'       => 'DESC',
				'category' => '',
				'include' => '',
				'exclude' => '',
				'meta_key' => '',
				'meta_value' => '',
				'post_type' => 'mmaterials',
				'post_parent' => '',
				'post_status' => 'publish'
		)
);
?>

<main>
	<section class="main block-1 massive">
		<div class="container">
			<div class="title-box">
				<h1>
					<?php echo get_field('title-text' ); ?>
				</h1>
				<p>
					<?php echo get_field('title-description' ); ?>
				</p>
				<a class="order-btn cloud-link" href="#">Оставить заявку</a>
			</div>
		</div>
	</section>
	<section class="production" id="production">
		<div class="production__cell">
			<div class="production__advantage">
				<p>
					<?php echo get_field('advantage-1' ); ?>
				</p>
			</div>
			<div class="production__product">
				<?php echo get_field('product-1' ); ?>
			</div>
		</div>
		<div class="production__cell">
			<div class="production__advantage">
				<p>
					<?php echo get_field('advantage-2' ); ?>
				</p>
			</div>
			<div class="production__product">
				<?php echo get_field('product-2' ); ?>
			</div>
		</div>
		<div class="production__cell inverse-md">
			<div class="production__advantage">
				<p>
					<?php echo get_field('advantage-3' ); ?>
				</p>
			</div>
			<div class="production__product">
				<?php echo get_field('product-3' ); ?>
			</div>
		</div>
		<div class="production__cell inverse-md inverse">
			<div class="production__advantage">
				<p>
					<?php echo get_field('advantage-4' ); ?>
				</p>
			</div>
			<div class="production__product">
				<?php echo get_field('product-4' ); ?>
			</div>
		</div>
		<div class="production__cell inverse">
			<div class="production__advantage">
				<p>
					<?php echo get_field('advantage-5' ); ?>
				</p>
			</div>
			<div class="production__product">
				<?php echo get_field('product-5' ); ?>
			</div>
		</div>
		<div class="production__cell inverse">
			<div class="production__advantage">
				<p>
					<?php echo get_field('advantage-6' ); ?>
				</p>
			</div>
			<div class="production__product">
				<?php echo get_field('product-6' ); ?>
			</div>
		</div>
	</section>
	<section class="order">
		<h3>Сделать заказ очень просто</h3>
		<ul>
			<li>
				<figure>
					<img src="<?php bloginfo('template_url'); ?>/img/eksdrev_order-1.jpg" alt="">
				</figure>
				<p class="order__list-title">
					<span class="order__list-title_number">1</span>
					<span >Сделать выбор</span>
				</p>
				<p class="order__list-desc">
					<?php echo get_field('order-1' ); ?>
				</p>
			</li>
			<li>
				<figure>
					<img src="<?php bloginfo('template_url'); ?>/img/eksdrev_order-2.jpg" alt="">
				</figure>
				<p class="order__list-title">
					<span class="order__list-title_number">2</span>
					<span >Заключить договор</span>
				</p>
				<p class="order__list-desc">
					<?php echo get_field('order-2' ); ?>
				</p>
			</li>
			<li>
				<figure>
					<img src="<?php bloginfo('template_url'); ?>/img/eksdrev_order-3.jpg" alt="">
				</figure>
				<p class="order__list-title">
					<span class="order__list-title_number">3</span>
					<span >Наслаждаться!</span>
				</p>
				<p class="order__list-desc">
					<?php echo get_field('order-3' ); ?>
				</p>
			</li>
		</ul>
		<div class="order__form">
			<form method="post">
				<input id="name" type="text" name="name" placeholder="Ваше имя">
				<input type="text" name="phone" placeholder="Ваш номер телефона">
				<button class="cloud-link" class="cloud-link" type="button" name="button">Заказать звонок</button>
			</form>
		</div>
	</section>
	<section class="clients">
		<div class="container">
			<h3>Наши клиенты</h3>
			<div class="clients__slider">
				<?php
					foreach ($clients as $obj) {
						if($obj->post_name == 'archive'){
								continue;
						}
				 ?>
				<figure class="clients__client">
					<a href="<?php echo get_field('clients-link', $obj->ID); ?>" target="_blank">
						<img src="<?php echo get_field('clients-img', $obj->ID); ?>">
						<p><?php echo get_field('clients-title', $obj->ID); ?></p>
					</a>
				</figure>
				<?php
					}
				 ?>
			</div>
		</div>
	</section>
	<section class="partners" id="partners">
		<div class="partners__box">
			<figure class="partners__left-side">
				<img src="<?php echo get_field('partner1-img' ); ?>">
				<div class="shadow-box">
					<span><?php echo get_field('partner1-sale' ); ?></span>
					<?php echo get_field('partner1-description' ); ?>
				</div>
			</figure>
			<figure class="partners__right-side">
				<img src="<?php echo get_field('partner2-img' ); ?>">
				<div class="shadow-box">
					<span><?php echo get_field('partner2-sale' ); ?></span>
					<?php echo get_field('partner2-description' ); ?>
				</div>
			</figure>
		</div>
		<p class="section-title">
			<?php echo get_field('partners-description' ); ?>
		</p>
		<div class="order__form">
			<form class="" method="post">
				<input id="name" type="text" name="name" placeholder="Ваше имя">
				<input type="text" name="phone" placeholder="Ваш номер телефона">
				<button class="cloud-link" type="button" name="button">Получить скидку</button>
			</form>
		</div>
	</section>
	<section class="materials" id="materials">
		<div class="materials__slider">
			<?php echo get_field('materials-slider' ); ?>
			<div class="materials__slider-title">
				<?php
				the_post();
				the_content();
				?>
			</div>
		</div>
		<div class="materials__cards">
			<?php
				foreach ($materials as $obj) {
					if($obj->post_name == 'archive'){
							continue;
					}
			 ?>
			<figure class="materials__card">
				<a href="<?php echo get_field('materials-img', $obj->ID); ?>" data-lightbox="roadtrip" data-title="<?php echo get_field('materials-title', $obj->ID); ?>">
					<img src="<?php echo get_field('materials-img-s', $obj->ID); ?>" alt="ЛидаЭксДрев <?php echo get_field('materials-title', $obj->ID); ?>">
				</a>
				<p>
					<?php echo get_field('materials-title', $obj->ID); ?>
				</p>
			</figure>
			<?php
				}
			 ?>

		</div>
		<div class="order__form">
			<form class="" method="post">
				<input id="name" type="text" name="name" placeholder="Ваше имя">
				<input type="text" name="phone" placeholder="Ваш номер телефона">
				<button class="cloud-link" type="button" name="button">Заказать консультацию</button>
			</form>
		</div>
	</section>
</main>

<?php
get_footer();
