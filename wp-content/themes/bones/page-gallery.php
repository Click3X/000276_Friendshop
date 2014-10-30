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

 								<!-- <section class="thumb-wrapper"> -->

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
										// the content (pretty self explanatory huh)
										// the_content();
									// layerslider(1);

										/*
										 * Link Pages is used in case you have posts that are set to break into
										 * multiple pages. You can remove this if you don't plan on doing that.
										 *
										 * Also, breaking content up into multiple pages is a horrible experience,
										 * so don't do it. While there are SOME edge cases where this is useful, it's
										 * mostly used for people to get more ad views. It's up to you but if you want
										 * to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
										 *
										 * http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
										 *
										*/
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

						<?php get_sidebar(); ?>

				</div>

			</div>


<?php get_footer(); ?>
