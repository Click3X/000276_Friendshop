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
	// $contact_list = get_field('contact_list');
	if( !empty($image) ): 

		$image_url = $image['url'];

	endif;

?>

			<div id="content" class="about-container">

				<div id="inner-content" class="inner-about-container inner-contact-container cf ">

						<div id="main" class="m-all cf" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<div id="map-canvas" class="map"></div>

							<?php
								
								endwhile;
								
								endif; 

							?>

						</div>

						<?php get_sidebar(); ?>

				</div>

			</div>


<?php get_footer(); ?>
