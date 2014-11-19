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

    									<div class="slider-container">

											<ul id="video-bxslider">
													    
												<?php while ($query->have_posts()) : $query->the_post(); 

													$title = get_field('title'); 
													$hover_text2 = get_field('hover_text2'); 
													$link = get_field('embed_video_link'); 
													$poster = get_field('featured_poster'); ?>

													<li>
														<div class="wrapper"> 
		    												<div class="h_iframe"> 
																<img class="ratio" src="wp-content/themes/bones/library/css/mask.png"/>

																<img class="video-poster" src="<?php echo $poster['url'] ?>" data-video="<?php echo $link ?>">
																<img class="mqplay-btn" src="img/play-btn.png" data-video="<?php echo $link ?>">
																<?php //echo $link ?>
															</div>
														</div>

														<!-- CREDITS at the bottom -->
														<div class="credit-content hide">
															<!-- CREDITS -->
																	<div class="credits">

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
														<div class="credit-bar"><?php echo $title ?>  <div class="credit-arrow arrow-r"></div></div>
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

										<!-- TAB 1 CREATIVE DIRECTION -->
										<div id="tab1">

												<section class="clearfix videogroup-list">
												<?php			

													// CREATIVE DIRECTION
												    $args = array(
													'tax_query' => array(
														array(
															'taxonomy' => 'video_groups',
															'terms' => 3
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
													       	$link = get_field('embed_video_link'); 
													       	$title_clean = cleanString($title);
															if( !empty($thumbnail) ): 
																$thumbnail_url = $thumbnail['url'];
															endif; ?>


																<!-- HOVER EFFECT DOMO 1 -->
																<li class="video-thumb">
																	<a href="#<?php echo $title_clean ?>-container" class="fancybox various">
																	    <figure class="rift">
																	      <img src="<?php echo $thumbnail_url ?>" alt="Image 01">
																	      <figcaption class="caption">
																	      	<?php echo $title ?></br >
																	      	<?php echo $hover_text2 ?>

																	      </figcaption>
																	    </figure>
																    </a>
															    </li>

																<!-- LIGHTBOX -->
																<div id="<?php echo $title_clean ?>-container" style="width:100%;display: none;">
																	<div class="iframe-wrapper">
																	<div class="iframe-container">
																	<!-- <img class="ratio" src="wp-content/themes/bones/library/css/mask.png"/> -->
																	<?php echo $link ?>

																	<!-- CREDITS -->
																	<div class="credits">

																		<h2><?php echo $title ?></h2>
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

													wp_reset_query();  ?>
											</section>
										</div>

										<!-- TAB 2 FEATURED WORK -->
										<div id="tab2">
											<section class="clearfix videogroup-list">
												<?php			
												    $args = array(
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
													       	$hover_text2 = get_field('hover_text2'); 
													       	$thumbnail = get_field('thumbnail');
															if( !empty($thumbnail) ): 
																$thumbnail_url = $thumbnail['url'];
															endif; ?>


																<!-- TEST HOVER DEMO 2 -->
																	
																<li class="video-thumb">
																	<div class="grid">
																	<figure class="effect-sadie">
																		<img src="<?php echo $thumbnail_url ?>" />
																		<figcaption>
																			<h2>Holy <span>Sadie</span></h2>
																			<p>Sadie never took her eyes off me. <br>She had a dark soul.</p>
																			<a href="#">View more</a>
																		</figcaption>			
																	</figure>
																	</div>
																</li>
																
													        
													       <?php endwhile; ?>
													      </ul>
													      </div>
													 <?php  }

													wp_reset_query();  
													?>
											</section>
										</div>

										<!-- TAB 3 FRIENDSHOP PRODUCTIONS-->
										<div id="tab3">

											<section class="clearfix videogroup-list">
												<?php			

												    $args = array(
													'tax_query' => array(
														array(
															'taxonomy' => 'video_groups',
															'terms' => 5
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

																<!-- TEST HOVER DEMO 3 -->
																<li class="video-thumb">
																<div class="grid">
																	<figure class="effect-selena">
																		<img src="<?php echo $thumbnail_url ?>"/>
																		<figcaption>
																			<h2>Happy <span>Selena</span></h2>
																			<p>Selena is a tiny-winged bird.</p>
																			<a href="#">View more</a>
																		</figcaption>			
																	</figure>
																</div>
																</li>
												        
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

					<?php get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
