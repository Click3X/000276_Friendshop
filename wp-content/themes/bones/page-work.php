<?php
/*
 Template Name: Work
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<div id="main" class="m-all t-2of3 cf" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

<!-- 								<header class="article-header">

									<h1 class="page-title"><?php the_title(); ?></h1>

									<p class="byline vcard">
										<?php printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span>', 'bonestheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
									</p>


								</header> -->

								<section class="entry-content cf" itemprop="articleBody">
								<?php layerslider(1) ?>

								<?php //echo //do_shortcode( 

									// '[tabby title="Creative Direction"]

									// Tabby ipsum dolor sit amet, kitty sunbathe dolor, feed me.

									// [tabby title="Featured Work"]

									// Lay down in your way catnip stuck in a tree, sunbathe kittens.

									// [tabby title="Friendshop Productions"]

									// sleep in the sink climb the curtains attack, give me fish.
									// [tabbyending]'


								//) ?>

								<section class="thumb-wrapper">

 								<ul class="thumb-list video-list">
								<?php if(get_field('video_list')): 

								while(has_sub_field('video_list')): 

									$hover_text1 = get_sub_field('hover-text1'); 
									$hover_text2 = get_sub_field('hover-text2'); 

									$poster = get_sub_field('poster');
									if( !empty($poster) ): 

										$poster_url = $poster['url'];

									endif; ?>

								
  
								  
								    <li class="video-thumb thumb">
								    	<div class="poster-container">
								    		<img src="<?php echo $poster_url ?>" alt="Video">
								    		<div class="poster-hover">
								    			<h3><?php echo $hover_text1 ?></h3>
								    			<h4><?php echo $hover_text2 ?></h4>
								    		</div>
								    	</div>
								    </li>	
								    	  

								    <?php endwhile; ?>  
								  </ul> 
								  
								

								<?php endif; ?>

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


<!-- 								<footer class="article-footer">

                  <?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

								</footer> -->

								<?php //comments_template(); ?>

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
