<?php get_header(); ?>

<section class="header">
	<div class="container">
		<span class="header__subtitle"><?php the_field('sub_title_h'); ?></span>
		<h1 class="header__title"><?php the_field('title_h'); ?></h1>
		<?php $benefits = get_field('benefits');
		if ($benefits) {
			$n = 1; ?>
			<div class="benefits">
				<?php foreach ($benefits as $row) { ?>
					<div class="benefits__wrapper">
						<h6 class="benefits__title"><?php echo $row['title']; ?></h6>
						<div class="benefits__subtitle">
							<span>
								<?php echo $row['number']; ?>
							</span>
							<?php if ($n > 1) {
								echo ' +';
							} ?>
						</div>
						<p class="benefits__text"><?php echo $row['text']; ?></p>
					</div>
				<?php $n++;
				} ?>
			</div>
		<?php } ?>
	</div>
</section>

<?php $services = get_field('services');
if ($services) { ?>
	<section class="rervices">
		<div class="container">

			<h2><?php the_field('title_s'); ?></h2>
			<p><?php the_field('text_s'); ?></p>

			<div class="row">
				<?php foreach ($services as $row) { ?>
					<div class="col">
						<div class="serv-one">
							<img src="<?php echo $row['img']; ?>" alt="<?php echo $row['title']; ?>">
							<h3><?php echo $row['title']; ?></h3>
						</div>
					</div>
				<?php } ?>
			</div>

		</div>
	</section>
<?php } ?>

<?php $projects = get_field('projects');
if ($projects) { ?>
	<section class="s-projects" id="projects">
		<div class="container">

			<h2><?php the_field('title_p'); ?></h2>

			<div class="projects-grid row">
				<?php
				$the_query = new WP_Query(array(
					'post_type'      	=> 'projects',
					'posts_per_page'	=> -1,
					'post__in'			=> $projects,
					'orderby'        	=> 'post__in'
				));
				$n = 1;
				?>

				<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
					<div class="projects-item col-md-6">
						<div class="projects-one">
							<img src="<?php the_post_thumbnail_url(); ?>" alt="">
							<div class="projects-text">
								<h3><?php the_title(); ?></h3>
								<?php
								$my_excerpt = get_the_excerpt();
								if (has_excerpt()) {
									echo wpautop($my_excerpt);
								}
								?>
								<div class="row-btn">
									<a class="btn-link" href="<?php the_permalink(); ?>">View Details</a>
									<a class="btn-link2" href="<?php the_field('website'); ?>">Visite Website</a>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile;
				wp_reset_postdata();  ?>

				<div class="projects-item col-md-6">
					<a class="btn-circle" href="<?php the_field('link_btn_p'); ?>"><?php the_field('text_circle_p'); ?></a>
				</div>

			</div>

		</div>
	</section>
<?php } ?>

<?php $content_hw = get_field('content_hw');
if ($content_hw) { ?>
	<section class="s-we-works" id="we-works">
		<div class="container">

			<h2><?php the_field('title_hw'); ?></h2>
			<p><?php the_field('text_hw'); ?></p>

			<div class="row">
				<?php foreach ($content_hw as $row) { ?>
					<div class="col">
						<div class="ww-one">
							<?php echo $row['text']; ?>
						</div>
					</div>
				<?php } ?>
				<div class="col">
					<a class="btn-circle" href="<?php the_field('link_circle_hw'); ?>"><?php the_field('text_circle_tm'); ?></a>
				</div>
			</div>

		</div>
	</section>
<?php } ?>

<?php $team = get_field('team');
if ($team) { ?>
	<section class="s-team" id="team">
		<div class="container">

			<h2><?php the_field('title_team'); ?></h2>

			<div class="row">
				<?php foreach ($team as $row) { ?>
					<div class="col-md-4">
						<div class="team-one">
							<img src="<?php echo $row['img']; ?>" alt="<?php echo $row['name']; ?>">
							<div class="team-text">
								<h3><?php echo $row['name']; ?></h3>
								<p><?php echo $row['position']; ?></p>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>

			<div class="row-btn">
				<a class="btn-link" href="<?php the_field('link_btn_t1'); ?>"><?php the_field('text_btn_t1'); ?></a>
				<a class="btn-link2" href="<?php the_field('link_btn_t2'); ?>"><?php the_field('text_btn_t2'); ?></a>
			</div>

		</div>
	</section>
<?php } ?>

<?php $testimonials = get_field('testimonials');
if ($testimonials) { ?>
	<section class="s-testimonials" id="testimonials">
		<div class="container">

			<h2><?php the_field('title_tm'); ?></h2>

			<div class="testimonials-slider owl-carousel dots-st1">
				<?php foreach ($testimonials as $row) { ?>
					<div class="testimonials-item">
						<?php echo $row['text']; ?>
					</div>
				<?php } ?>
			</div>

		</div>
	</section>
<?php } ?>

<?php get_footer(); ?>