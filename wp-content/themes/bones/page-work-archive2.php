<?php
/*
 Template Name: Work
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="cf">

						<div id="main" class="m-all cf" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<section class="entry-content cf" itemprop="articleBody">

									<!-- MARQUEE CAROUSEL AT THE TOP -->
									<?php 
									$args = array(

										'tax_query' => array(
											array(
												'taxonomy' => 'video_groups',
												'terms' => 12
											)
										)
									);

									$query = new WP_Query( $args ); 

									if( $query->have_posts() ) { ?>

    									<div class="slider-container" style="max-height: 524px; overflow-y: hidden">

											<ul id="video-bxslider">
													    
												<?php while ($query->have_posts()) : $query->the_post(); 

													$title = get_field('title'); 
													$hover_text2 = get_field('hover_text2'); 
													$link = get_field('embed_video_link'); 
												?>

													<li>
														<div class="wrapper"> 
		    												<div class="h_iframe"> 
																<img class="ratio" src="wp-content/themes/bones/library/css/mask.png"/>


																<?php if (has_post_thumbnail( $post->ID ) ): ?>
																	<?php $poster = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'video-large' ); ?>
																	<!-- <div class="preloader-container"> -->
																		<img class="myLoader" src="<?php echo bloginfo('url'); ?>/img/loading.gif" width="36" height="36" alt="loading gif" style="display: none">
																		<img class="video-poster" src="<?php echo $poster[0]; ?>" data-video="<?php echo $link ?>">
																	<!-- </div>	 -->																									
																<?php endif; ?>
																
																<img class="mqplay-btn" src="img/play-btn.png" data-video="<?php echo $link ?>">
																
															</div>
														</div>

														<!-- CREDITS at the bottom -->
														<div class="credit-content hide">
															<!-- CREDITS -->
																	<div class="credits">

																		<div class="cb-inner" style="line-height: 1">
																			<div class="credit-arrow arrow-d ca-left"></div>
																			<div class="credit-arrow arrow-d ca-right"></div>
																			<span><?php the_title(); ?></span>
																		</div>

																		<!-- <h2><?php echo $title ?></h2> -->
																		<?php if(get_field('credits')): ?>

																			<ul class="credit-marquee">
																				<?php while(has_sub_field('credits')): 

																				$credit_title = get_sub_field('title'); 
																				$credit_name = get_sub_field('name'); 
																				?>

																				<li>
																					<span class="credit-title"><?php echo $credit_title; ?>: </span>
																					<span class="credit-name"><?php echo $credit_name; ?></span>
																				</li>

																				<?php endwhile; ?>
																			</ul>

																		<?php endif; ?>

																	</div>

														</div>
														<div class="credit-bar" style="line-height: 1">
															<div class="credit-arrow arrow-u ca-left"></div>
															<div class="credit-arrow arrow-u ca-right"></div>
															<span><?php the_title(); ?></span>
														</div>
													</li>

													
											
													        
												<?php endwhile; ?>

											</ul>

											<span id="video-slider-prev"></span>
											<span id="video-slider-next"></span>

											

										</div> <!-- END OF slider-container -->

									<?php  }

									wp_reset_query();  ?>


									<!-- TABS -->
									<div id="tab-container" class="tab-container">
										
										<ul id="work-ul" class='etabs work-tabs cf'>

										<?php
											// GET TAXONOMY INFO ON TABS
											$new_tabs = get_field('vid_tax');														
											$i=1;
											
											foreach ($new_tabs as $key => $new_tab) {													
												echo '<li class="tab"><a href="#tab'.$i.'" data-video-group="'.$new_tab->term_id.'">'.$new_tab->name.'</a></li>';
												$i++;
											}
										?>											
										</ul>


										<!-- TAB 1 FEATURED WORK -->
										<div id="tab1">
											<section class="clearfix videogroup-list">
												<?php			
												    $args = array(
												    	'posts_per_page'=> -1,
														'tax_query' => array(
															array(
																'taxonomy' => 'video_groups',
																'terms' => 4
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
													       	$hover_text_client = get_field('hover_text_client'); 
													       	$hover_text_director = get_field('hover_text_director'); 
															$title_clean = cleanString($title);
															$link = get_field('embed_video_link'); 
													       	
															?>

																<!-- HOVER EFFECT -->
																<li class="video-thumb" data-video="<?php echo $link ?>">
																	<div class="grid">
																		<a href="#<?php echo $title_clean ?>-container" class="fancybox various video-hook">
																		<figure class="effect-selena">
																			<?php if ( has_post_thumbnail() ) { 
																				the_post_thumbnail( 'video-small' ); 
																			}

																			
																			?>
																			<div class="hover-shadow"></div>
																			<figcaption>
																				<h2><?php the_title(); ?></h2>
																				<p><?php echo $hover_text_client; ?><br />
																				<?php echo $hover_text_director; ?></p>																		
																			</figcaption>			
																		</figure>
																		</a>
																	</div>
																</li>

																<!-- LIGHTBOX -->
																<div id="<?php echo $title_clean ?>-container" style="width:100%;display: none;">
																	<div class="iframe-wrapper">
																	<div class="iframe-container">
																		<div class="preloader-container">
																			<img class="myLoader" src="<?php echo bloginfo('url'); ?>/img/loading.gif" width="36" height="36" alt="loading gif" style="display: none">
																			<iframe src="" class="myFrames"></iframe>
																		</div>
																		<!-- CREDITS -->
																		<div class="credits">

																			<h2><?php the_title(); ?></h2>
																			<?php if(get_field('credits')): ?>

																				<ul>
																					<?php while(has_sub_field('credits')): 

																					$credit_title = get_sub_field('title'); 
																					$credit_name = get_sub_field('name'); 
																					?>

																					<li>
																						<span class="credit-title"><?php echo $credit_title; ?>: </span>
																						<span class="credit-name"><?php echo $credit_name; ?></span>
																					</li>

																					<?php endwhile; ?>
																				</ul>

																			<?php endif; ?>

																		</div>

																	</div>
																	</div>
																</div>
												        
													       <?php endwhile; ?>
													      </ul>
													      </div>
													 <?php  }

													wp_reset_query();  
													?>
											</section>

										</div>
							
									</div> <!-- END TAB CONTAINER -->


									<?php 

									$posts = get_field('marquee_list');

									if( $posts ): ?>
									    <ul>
									    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
									        <?php setup_postdata($post); ?>
									        <li>
									            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									            <?php echo the_field('title'); ?>
									            <!-- <span>Custom field from $post: <?php the_field('author'); ?></span> -->
									        </li>
									    <?php endforeach; ?>
									    </ul>
									    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
									<?php endif; ?>

<!-- 								<?php
									wp_link_pages( array(
										'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
										'after'       => '</div>',
										'link_before' => '<span>',
										'link_after'  => '</span>',
									) );
								?> -->
								</section>

							</article>

							<?php endwhile; ?>

						<?php endif; ?>

					</div>

					<?php get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
