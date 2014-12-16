<?php
/*
 Template Name: Contact
*/
?>

<?php get_header(); 

	$title1 = get_field('title1');
	$title2 = get_field('title2');
	$image = get_field('image');
	$address = get_field('address');
	if( !empty($image) ): 

		$image_url = $image['url'];

	endif;

?>

<div id="content" class="about-container">

	<div id="inner-content" class="inner-about-container inner-contact-container wrap cf ">

		<div id="main" class="m-all cf" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<section class="entry-content cf" itemprop="articleBody">

					<div class="content-container">

						<div class="contact-left">

							<div class="contact-address"><?php echo $address ?></div>
														
							<?php if(get_field('contact_list')): ?>

							<ul>
								<?php while(has_sub_field('contact_list')): 
									$sub_title = get_sub_field('title'); 
									$sub_content = get_sub_field('content'); 
									$job_title = get_sub_field('job_title');

									$values = get_sub_field('type');
									$value = $values[0]; ?>

									<li>
										<h3><?php echo $sub_title ?></h3>
										<h4><?php echo $job_title ?></h4>

										<?php if($value == 'email') { ?>
											<a href="mailto:<?php echo antispambot($sub_content); ?>" class="contact-text" target="_blank"><?php echo antispambot($sub_content); ?></a>
										<?php } else { ?>
											<h4><?php echo $sub_content ?></h4>
										<?php } ?>
																				
									</li>

								<?php endwhile; ?>

							</ul>

							<?php endif; ?>

							

						</div>

					</div>

				</section>

			</article>

			<?php endwhile;?>

			<?php endif; ?>

		</div>

	</div>

	<!-- GOOGLE MAP -->
	<div id="map-canvas" class="map"></div>

</div>

<?php get_footer(); ?>