<?php
/*
 Template Name: Gallery
*/
?>

<?php get_header(); ?>

			<div id="content" class="">

				<div id="inner-content" class="inner-gallery-container cf">

						<div id="main" class="m-all cf" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">


								<section class="entry-content cf thumb-wrapper" itemprop="articleBody">

	 								<ul class="thumb-list">
									<?php if(get_field('gallery_list')): 

									while(has_sub_field('gallery_list')): 

										$title = get_sub_field('title'); 
										$title_clean = cleanString($title); 

										// CROPPED THUMBNAIL
										$gif = get_sub_field('gif');

										// ORIGINAL IN LIGHTBOX
										// $gif_lightbox = get_sub_field('gif_lightbox');

										if( !empty($gif) ): 
											$gif_url = $gif['url'];
										endif; 

										//if( !empty($gif_lightbox) ): 
											// $gifL_url = $gif_lightbox['url'];
										//endif; ?>
									  
									    <li class="thumb">
									    	<?php //echo getOriginal($gif_url); ?>
									    	<?php //print_r($gif)?>

									    	<a href="#<?php echo $title_clean ?>-container" class="fancybox various gallery-fancy" rel="f-gallery">
									    		<!-- CROPPED -->
									    		<img src="<?php echo $gif_url ?>" alt="<?php echo $title_clean;?> ">
									    	</a>
									    </li> 

									     <!-- LIGHTBOX -->
									     <div id="<?php echo $title_clean ?>-container" style="width:100%;display: none;">
									    	<?php //if ($gif_lightbox) { ?>

									    		<img class="lb-image" src="<?php echo getOriginal($gif_url); ?>" alt="Original">	
									    	<?php //} elseif (empty($gif_lightbox)) { ?>
									    		<!-- <img class="lb-image" src="<?php echo $gif_url ?>" alt="Original">	 -->
									    	<?php //} ?>
														
										</div>
<!-- 									    <div id="<?php echo $title_clean ?>-container" style="width:100%;display: none;">
									    	<?php if ($gif_lightbox) { ?>

									    		<img class="lb-image" src="<?php echo $gifL_url ?>" alt="Original">	
									    	<?php } elseif (empty($gif_lightbox)) { ?>
									    		<img class="lb-image" src="<?php echo $gif_url ?>" alt="Original">	
									    	<?php } ?>
														
										</div> -->

									    <?php endwhile; ?>  

									<?php endif; ?>
									</ul> 

								</section>



									<?php

										wp_link_pages( array(
											'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
											'after'       => '</div>',
											'link_before' => '<span>',
											'link_after'  => '</span>',
										) );
									?>
								</section>

							</article>

							<?php endwhile; else : ?>


							<?php endif; ?>

						</div>

				</div>

			</div>


<?php get_footer(); ?>
