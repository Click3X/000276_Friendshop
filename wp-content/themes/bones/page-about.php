<?php
/*
 Template Name: About
*/
?>

<?php get_header(); 
	$title = get_field('title');
	$profile = get_field('profile');
	$content = get_field('content');
	if( !empty($profile) ): 

		$profile_url = $profile['url'];

	endif;

	$read_btn = get_field('read_btn');
	$session_title = get_field('session_title');
	

?>

			<div id="content" class="about-container">

				<div id="inner-content" class="inner-about-container wrap cf ">

						<div id="main" class="m-all cf" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<section class="entry-content cf" itemprop="articleBody">

									<div class="content-container">

										<img id="permanent" src="<?php echo $profile_url; ?>" alt="<?php echo "friendshop"; ?>" />

										<h1><?php echo $title; ?></h1>
																
										<p><?php echo $content; ?></p>

<!-- 										<div class="news-wrapper">


										<?php if(get_field('friendly_news')): ?>

											<h2 class="news-toptitle"><?php echo $session_title; ?></h2>

											<ul id="news-bxslider">

											<?php while(has_sub_field('friendly_news')): 

											$press_name = get_sub_field('press_name'); 
											$news_title = get_sub_field('news_title'); 
											$link = get_sub_field('link'); ?>

												<li>
													
													<h3><?php echo $press_name; ?></h3>

													<h1>&ldquo;<?php echo $news_title; ?>&rdquo;</h1>
													
													

													<a href="<?php echo $link ?>" target="_blank"><?php echo $read_btn; ?></a>

												</li>

											<?php endwhile; ?>

											</ul>

										<?php endif; ?>

										</div> -->

									</div>

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


				<div class="news-wrapper">


										<?php if(get_field('friendly_news')): ?>

											<h2 class="news-toptitle"><?php echo $session_title; ?></h2>

											<ul id="news-bxslider">

											<?php while(has_sub_field('friendly_news')): 

											$press_name = get_sub_field('press_name'); 
											$news_title = get_sub_field('news_title'); 
											$link = get_sub_field('link'); ?>

												<li>
													
													<h3><?php echo $press_name; ?></h3>

													<h1>&ldquo;<?php echo $news_title; ?>&rdquo;</h1>
													
													

													<a href="<?php echo $link ?>" target="_blank"><?php echo $read_btn; ?> →</a>

												</li>

											<?php endwhile; ?>

											</ul>

											<!-- <div class="outside"> -->
 
  <!-- <p> --><span id="news-slider-prev"></span> <span id="news-slider-next"></span><!-- </p> -->
<!-- </div> -->

										<?php endif; ?>

										</div>

				</div>


<?php get_footer(); ?>
