<?php 
/*

Template Name: Video Archive

*/


get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<div id="main" class="m-all t-2of3 d-5of7 cf" role="main">

							<?php if (is_category()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e( 'Posts Categorized:', 'bonestheme' ); ?></span> <?php single_cat_title(); ?>
								</h1>

							<?php } elseif (is_tag()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e( 'Posts Tagged:', 'bonestheme' ); ?></span> <?php single_tag_title(); ?>
								</h1>

							<?php } elseif (is_author()) {
								global $post;
								$author_id = $post->post_author;
							?>
								<h1 class="archive-title h2">

									<span><?php _e( 'Posts By:', 'bonestheme' ); ?></span> <?php the_author_meta('display_name', $author_id); ?>

								</h1>
							<?php } elseif (is_day()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e( 'Daily Archives:', 'bonestheme' ); ?></span> <?php the_time('l, F j, Y'); ?>
								</h1>

							<?php } elseif (is_month()) { ?>
									<h1 class="archive-title h2">
										<span><?php _e( 'Monthly Archives:', 'bonestheme' ); ?></span> <?php the_time('F Y'); ?>
									</h1>

							<?php } elseif (is_year()) { ?>
									<h1 class="archive-title h2">
										<span><?php _e( 'Yearly Archives:', 'bonestheme' ); ?></span> <?php the_time('Y'); ?>
									</h1>
							<?php } ?>

							<div id="tab-container" class="tab-container">
										
										<ul id="work-ul" class='etabs work-tabs cf'>
												
													<li class='tab-gallery tab'><a href="#tab1">COMEDY</a></li>
													<li class='tab-gallery tab'><a href="#tab2">GENERAL</a></li>
													<li class='tab-gallery tab'><a href="#tab3">LONG FORM</a></li>

										</ul>

							</div>


<!-- 							<div id="tab1">

												<section class="clearfix videogroup-list">
												<?php			

													// COMEDY
													$args = array(
													'tax_query' => array(
														array(
															'taxonomy' => 'video_groups',
															'terms' => 6,
															
																		)
															)
													);
												
													$query = new WP_Query( $args ); 

													    if( $query->have_posts() ) { ?>
													      <div class="category section">

													      	<ul class="video-list">
														    
														    <?php
													      while ($query->have_posts()) : $query->the_post(); 

													      	$title = get_field('title'); 
													       	$hover_text2 = get_field('hover_text2'); 
													       	$thumbnail = get_field('thumbnail');
															if( !empty($thumbnail) ): 
																$thumbnail_url = $thumbnail['url'];
															endif; ?>
													       		<li class="video-thumb">
																	<div class="poster-container">
																		<img src="<?php echo $thumbnail_url ?>" alt="Video">
																		<div class="poster-hover">
																			<h3><?php echo $title ?></h3>
																			<h4><?php echo $hover_text2 ?></h4>
																		</div>
																	</div>
																</li>	
													        
													       <?php endwhile; ?>
													      </ul>
													      </div>
													 <?php  }

													wp_reset_query();  // Restore global post data stomped by the_post().
													?>
											</section>
										</div>  -->

										<!-- END OF TAB1 -->

							<?php //if (have_posts()) : while (have_posts()) : the_post(); ?>

							<!-- <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article"> -->
							<div id="tab1">

								<?php
									// $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
									$args= array(
										'post_type'=>'videos',
										'tax_query' => array(
											'taxonomy' => 'video_groups',
											'terms' => 6
											)
										);
									// query_posts($args);
									

										$query = new WP_Query( $args ); 

													    if( $query->have_posts() ) { ?>
													      <div class="category section">

													      	<ul class="video-list">
														    
														    <?php
													      while ($query->have_posts()) : $query->the_post(); 

													      	$title = get_field('title'); 
													       	$hover_text2 = get_field('hover_text2'); 
													       	$thumbnail = get_field('thumbnail');
															if( !empty($thumbnail) ): 
																$thumbnail_url = $thumbnail['url'];
															endif; ?>
													       		<li class="video-thumb">
																	<div class="poster-container">
																		<img src="<?php echo $thumbnail_url ?>" alt="Video">
																		<div class="poster-hover">
																			<h3><?php echo $title ?></h3>
																			<h4><?php echo $hover_text2 ?></h4>
																		</div>
																	</div>
																</li>	
													        
													       <?php endwhile; ?>
													      </ul>
													      </div>
													 <?php  }

													wp_reset_query();  // Restore global post data stomped by the_post().
													?>

							</div>

<!-- 								<header class="article-header">

									<h3 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

								</header> 
 -->
								<section class="entry-content cf">

									<?php //the_post_thumbnail( 'bones-thumb-300' ); ?>

									<?php //the_excerpt(); ?>





								</section>




							<!-- </article> -->

							<?php //endwhile; ?>

									<?php bones_page_navi(); ?>

							<?php //else : ?>

<!-- 									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the archive.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article> -->

							<?php //endif; ?>

						</div>

					<?php get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
