<?php
/*
 Template Name: Editors
*/
?>


<?php get_header(); ?>

			<div id="content" class="editors-main">

				<div id="inner-content" class="cf">

						<div id="main" class="m-all cf" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<section class="entry-content cf" itemprop="articleBody">

								<!-- SELECT PLAYERS -->


									<?php if (function_exists('get_terms_meta')) {
										$term_id_ben = 13;
										$term_id_tim = 14;
										$taxonomy = 'video_groups';
										$term_Ben = get_term( $term_id_ben, $taxonomy );
										$term_Tim = get_term( $term_id_tim, $taxonomy );
										$slug_Ben = $term_Ben->slug;
										$slug_Tim = $term_Tim->slug;

										$meta_key1 = 'player-image';
										$meta_key2 = 'player-image-hover';
										
										$metaValueB1 = get_terms_meta($term_id_ben, $meta_key1);
    									$metaValueB2 = get_terms_meta($term_id_ben, $meta_key2);
    									$metaValueT1 = get_terms_meta($term_id_tim, $meta_key1);
    									$metaValueT2 = get_terms_meta($term_id_tim, $meta_key2);

    									$imgB_url = $metaValueB1[0];
										$imgB_hover_url = $metaValueB2[0];
										$imgT_url = $metaValueT1[0];
										$imgT_hover_url = $metaValueT2[0];
									?>

<!-- 										<div class="editors-parent">
											<div class="editors-wrapper center">
												<div class="editors-container" class="ben-wrapper">
													<a href="#tab-container" id="dir-<?php echo $slug_Ben;?>" class="new-players">
													    <img src="<?php echo $imgB_url; ?>" class="e-top img_ben" style="width: 100%">
													    <img src="<?php echo $imgB_hover_url; ?>" class="e-bottom img_ben" style="width: 100%">
													</a>
												</div>
												
												<div class="editors-container" class="tim-wrapper">
													<a href="#tab-container" id="dir-<?php echo $slug_Tim;?>" class="new-players">
													    <img src="<?php echo $imgT_url; ?>" class="e-top img_tim">
													    <img src="<?php echo $imgT_hover_url; ?>" class="e-bottom img_tim">
													</a>
												</div>
											</div>	
										</div>		 -->


									<!-- NEW EDITORS NAMES -->
									<div class="editors-parent">
											<div class="editors-wrapper center">
												<div class="editors-container" class="ben-wrapper">
													<a href="#tab-container" id="dir-<?php echo $slug_Ben;?>" class="new-players">
													    <p>Ben Suenaga</p>
													</a>
												</div>
												
												<div class="editors-container" class="tim-wrapper">
													<a href="#tab-container" id="dir-<?php echo $slug_Tim;?>" class="new-players">
													    <p>Tim Wilson</p>
													</a>
												</div>
											</div>	
									</div>	

									

									<?php } ?> 


																		
										
									<!-- TABS -->
									<div id="tab-container" class="tab-container">
										
										<ul id="work-ul" class='etabs work-tabs cf' style="visibility:hidden">

										<li class='tab-gallery tab'><a href="#tab1">Reels</a></li>									
										</ul>


										<!-- TAB 1 COMEDY -->
										<div id="tab1">
											<!-- INVISIBLE AT THE BIGINNING -->
											<section class="clearfix videogroup-list editors-videos" id="<?php echo $slug_Ben;?>-container">

												<!-- REELS - BEN -->
												<?php $posts = get_field('editor_ben_list');

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
																<div id="<?php echo $title_clean ?>-container" style="width:100%;display: none;">
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

											<!-- TIM - INVISIBLE -->
												<section class="clearfix videogroup-list editors-videos" id="<?php echo $slug_Tim;?>-container">
													<?php $posts = get_field('editor_tim_list');
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
																<div id="<?php echo $title_clean ?>-container" style="width:100%;display: none;">
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

							<?php endwhile; ?>

						<?php endif; ?>

					</div>

				</div>

			</div>

<?php get_footer(); ?>