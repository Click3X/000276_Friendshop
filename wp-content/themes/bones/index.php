<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="wrap cf">

			<div id="main" class="m-all t-2of3 d-5of7 cf" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

				<section class="entry-content cf" style="color: white; font-size: 2em">
					<?php //the_content(); ?>
				</section>

			</article>

			<?php endwhile; ?>

			<?php endif; ?>

		</div>

	</div>

</div>

<?php get_footer(); ?>