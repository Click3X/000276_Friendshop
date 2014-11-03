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

								<?php //layerslider(1) ?>

								<!-- SELECT PLAYERS -->
								<?php if (is_page(6)) { ?>	

								<div class="mixedContent player-select-container">
									<h2 class="players-title">Player Select</h2>
									<button class="prev">&#10094;</button>
									<button class="next">&#10095;</button>

									<div class="carousel-no-style" style="margin: auto;">
									    <ul>
									        <li class="player1">
									        	<a href="#" name="player1">
									        	<img class="float-top" src="selector-top.png">									        	
									        	<div></div>
									        	<img class="float-bottom" src="selector-bottom.png">
									        	</a>
									        	<p>Ben</p>
									        		
									        </li>
									        <li class="player2">
									        	<a href="#" name="player2">
									        	<img class="float-top" src="selector-top.png">	
									        	<div></div>
									        	<img class="float-bottom" src="selector-bottom.png">	
									        	</a>
									        	<p>Tim</p>
									        	
									        </li>
									    </ul>
									</div>
								</div>

								<?php if(isset($_GET['player2'])) {
									echo 'fuck';
								} ?>
								<?php } ?>

									<div id="tab-container" class="tab-container">
										
										<ul id="work-ul" class='etabs work-tabs cf'>
											<?php if(get_field('tabs')): 
												while(has_sub_field('tabs')): 

													$tab1 = get_sub_field('tab1'); 
													$tab2 = get_sub_field('tab2'); 
													$tab3 = get_sub_field('tab3'); 
													?>

												<?php if (is_page(4)) { ?>									    
													<li class='tab'><a href="#tab1"><?php echo $tab1 ?></a></li>
													<li class='tab'><a href="#tab2"><?php echo $tab2 ?></a></li>
													<li class='tab'><a href="#tab3"><?php echo $tab3 ?></a></li>

												<?php } elseif (is_page(6)) { ?>
													<li class='tab-gallery tab'><a href="#tab1"><?php echo $tab1 ?></a></li>
													<li class='tab-gallery tab'><a href="#tab2"><?php echo $tab2 ?></a></li>
													<li class='tab-gallery tab'><a href="#tab3"><?php echo $tab3 ?></a></li>
												<?php } 
												endwhile;
											endif; 
											?>
										</ul>
										<!-- </div> -->

										<!-- TAB 1 CREATIVE DIRECTION / COMEDY-->
										<div id="tab1">

												<section class="clearfix videogroup-list">
												<?php			
												if (is_page(4)) { 
													// CREATIVE DIRECTION
												    $args = array(
													'tax_query' => array(
														array(
															'taxonomy' => 'video_groups',
															'terms' => 3
																		)
															)
													);

												} else {
													// COMEDY
													$args = array(
													'tax_query' => array(
														array(
															'taxonomy' => 'video_groups',
															'terms' => 6
																		)
															)
													);
												}
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
										</div>

										<!-- TAB 2 FEATURED WORK / GENERAL-->
										<div id="tab2">
											<section class="clearfix videogroup-list">
												<?php			

												if (is_page(4)) { 
													// FEATURED WORK
												    $args = array(
													'tax_query' => array(
														array(
															'taxonomy' => 'video_groups',
															'terms' => 4
																		)
															)
													);

												} else {
													// GENERAL
													$args = array(
													'tax_query' => array(
														array(
															'taxonomy' => 'video_groups',
															'terms' => 7
																		)
															)
													);
												}
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
										</div>

										<!-- TAB 3 FRIENDSHOP PRODUCTIONS / LONG FORM-->
										<div id="tab3">

											<section class="clearfix videogroup-list">
												<?php			

												if (is_page(4)) { 
													// FRIENDSHOP PRODUCTION
												    $args = array(
													'tax_query' => array(
														array(
															'taxonomy' => 'video_groups',
															'terms' => 5
																		)
															)
													);

												} else {
													// LONG FORM
													$args = array(
													'tax_query' => array(
														array(
															'taxonomy' => 'video_groups',
															'terms' => 8
																		)
															)
													);
												}
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
