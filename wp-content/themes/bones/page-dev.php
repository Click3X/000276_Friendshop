<?php get_header(); ?>
	
		<div id="demo-holder">

			<?php 
				// IF IS FRACTAL
				if (is_page(75)) {	
					include('php/html5demos/fractal.php');
				}

			?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<div id="main" class="m-all t-2of3 d-5of7 cf" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<section class="entry-content cf" itemprop="articleBody">


									
								</section> 

							</article>

							<?php endwhile; ?>

							<?php endif; ?>

						</div>

						<?php // get_sidebar(); ?>

				</div>

			</div>

		</div> <!-- END DEMO HOLDER -->

<?php get_footer(); ?>
