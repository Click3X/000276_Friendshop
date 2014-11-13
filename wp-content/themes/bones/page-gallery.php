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

										$sub_title = get_sub_field('title'); 

										$gif = get_sub_field('gif');
										if( !empty($gif) ): 

											$gif_url = $gif['url'];

										endif; ?>
									  
									    <li class="thumb"><img src="<?php echo $gif_url ?>" alt="Thumb"></li>  

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

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div>

				</div>

			</div>


<?php get_footer(); ?>
