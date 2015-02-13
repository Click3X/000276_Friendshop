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
									<?php $posts = get_field('marquee_list');

									if( $posts ): ?>

    									<div class="slider-container">

											<ul id="video-bxslider">
													    
												<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) 
									        		setup_postdata($post); 
													$title = get_field('title'); 
													$hover_text2 = get_field('hover_text2'); 
													$link = get_field('embed_video_link'); 
													$thumb = get_field('thumbnail');
													$title_clean = cleanString($title);
													$if_width = get_field('width');
													$if_height = get_field('height');
												?>

													<li>
														<div class="wrapper">

														<?php if(!empty($if_width) && ($if_width < 850) )  { ?> 

															<div class="h_iframe_small"> 

														<?php //} elseif (!empty($if_width) && !empty($if_height) && ($if_height < 477) && ($if_width >= 850)) { ?> 	

															<!-- <div class="h_iframe_smallH"> -->

														<?php } else { ?> 
															<div class="h_iframe"> 

														<?php } ?> 

														
		    												
																<img class="ratio" src="wp-content/themes/bones/library/css/mask.png"/>
																<img class="myLoader" src="<?php echo bloginfo('url'); ?>/img/loading.gif" width="36" height="36" alt="loading gif" style="display: none">

																<?php if (!empty($thumb)) { ?>
																	<img class="video-poster video-large" src="<?php echo $thumb['url']; ?>" data-video="<?php echo $link ?>" data-name="<?php echo $title_clean ?>">
																	
																	<?php } else { ?>
																	<img class="video-poster video-large" src="<?php echo bloginfo('url'); ?>/img/fs_missing.jpg" data-video="<?php echo $link ?>" data-name="<?php echo $title_clean ?>" >
																<?php } ?>																									
																
																
																<img class="mqplay-btn" src="img/play-btn.png" data-video="<?php echo $link ?>" data-name="<?php echo $title_clean ?>">
																
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
														<div class="credit-bar credit-barH" style="line-height: 1">
															<div class="credit-arrow arrow-u ca-left"></div>
															<div class="credit-arrow arrow-u ca-right"></div>
															<span><?php the_title(); ?></span>
														</div>
													</li>

												<?php endforeach; ?>
											</ul>
											<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
											<?php endif; ?>

											<span id="video-slider-prev" class="pause"></span>
											<span id="video-slider-next" class="pause"></span>
											

										</div> <!-- END OF slider-container -->


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

												<?php $posts = get_field('featured_work_list');
												if( $posts ): ?>

													<div class="category section">

													    <ul class="video-list">
														    
														   	<?php foreach( $posts as $post): 
									        				setup_postdata($post); 

													      	$title = get_field('title'); 
													       	$hover_text_client = get_field('hover_text_client'); 
													       	$hover_text_director = get_field('hover_text_director'); 
															$title_clean = cleanString($title);
															$link = get_field('embed_video_link'); 
													       	$thumb = get_field('thumbnail');
													       	$if_width = get_field('width');
															$if_height = get_field('height');
															?>

																<!-- HOVER EFFECT -->
																<li class="video-thumb" data-video="<?php echo $link ?>">
																	<div class="grid">
																		<a href="#<?php echo $title_clean ?>-container" class="fancybox various video-hook">
																		<figure class="effect-selena">
																			<?php if (!empty($thumb)) { ?>
																				<!-- the_post_thumbnail( 'video-small' );  -->
																				<img src="<?php echo $thumb['url']; ?>" class="video-small">

																			<?php } else { ?>
																				<img src="<?php echo bloginfo('url'); ?>/img/FS_missing.jpg" class="video-small">

																			<?php } ?>
																																						
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
																<div id="<?php echo $title_clean ?>-container" style="width:100%; display:none;">
																	<div class="iframe-wrapper">


																	<?php if(!empty($if_width) && ($if_width < 850) )  { ?> 

																		<div class="iframe-container-small">

																	<?php //} elseif (!empty($if_width) && !empty($if_height) && ($if_height < 477) && ($if_width >= 850)) { ?> 	

																		<!-- <div class="h_iframe_smallH"> -->

																	<?php } else { ?> 
																		<div class="iframe-container">

																	<?php } ?> 

																	
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

													     <?php endforeach; ?>
														</ul>
														<?php wp_reset_postdata(); ?>
														<?php endif; ?>
													    </div>

											</section>

										</div>
							
									</div> <!-- END TAB CONTAINER -->


								</section>

							</article>

							<?php endwhile; ?>

						<?php endif; ?>

					</div>

					<?php get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
