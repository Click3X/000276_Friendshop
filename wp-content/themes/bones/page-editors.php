<?php
/*
 Template Name: Editors
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="cf">

						<div id="main" class="m-all cf" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<section class="entry-content cf" itemprop="articleBody">

								<!-- SELECT PLAYERS -->
									<div class="mixedContent player-select-container">
									<h2 class="players-title">Player Select</h2>
									<button class="prev">&#10094;</button>
									<button class="next">&#10095;</button>

									<div class="carousel-no-style" style="margin: auto;">


									<?php if (function_exists('get_terms_meta')) {

										$term_id = 10;
										$taxonomy_name = 'video_groups';
										$termchildren = get_term_children( $term_id, $taxonomy_name );

										$meta_key1 = 'player-image';
										$meta_key2 = 'player-image-hover';
										
										echo '<ul>';
										foreach ( $termchildren as $child ) {
											$term = get_term_by( 'id', $child, $taxonomy_name );
											$child_ids = $term->term_id;

											// $metaValue1 = get_terms_meta($child_ids, $meta_key1);
    										$metaValue2 = get_terms_meta($child_ids, $meta_key2);

    										// $img_url = $metaValue1[0];
											$img_hover_url = $metaValue2[0];

											?>

											<li class="players">
									        	
									        	<img class="float-top" src="selector-top.png">							        	
									        	<a class="players_link" href="<?php echo get_term_link( $child, $taxonomy_name ) ?>">
									        	<div class="grayscale" style="background-image: url( <?php echo $img_hover_url ?> );"></div></a>
									        	<img class="float-bottom" src="selector-bottom.png">
									        	
									        	<p><?php echo $term->name ;?></p>
									        		
									        </li>
									
										<?php } 

										echo '</ul> 

										</div>
								</div>';
									} ?>

										
									<!-- TABS -->
									<div id="tab-container" class="tab-container">
										
										<ul id="work-ul" class='etabs work-tabs cf'>

										<?php
											// GET TAXONOMY INFO ON TABS
											$new_tabs = get_field('vid_tax');														
											$i=1;
											
											foreach ($new_tabs as $key => $new_tab) {													
												echo '<li class="tab-gallery tab"><a href="#tab'.$i.'" data-video-group="'.$new_tab->term_id.'">'.$new_tab->name.'</a></li>';
												$i++;
											}
										?>											
										</ul>


										<!-- TAB 1 COMEDY -->
										<div id="tab1">

												<section class="clearfix videogroup-list">
												<?php			

													// COMEDY
													$args = array(
													'tax_query' => array(
														array(
															'taxonomy' => 'video_groups',
															'terms' => array(6, 9),
															'operator' => 'AND',
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
																	<div class="credits">
																		<h2>CREDITS</h2>
																		<span class="credit-title">Client: </span><span class="credit-name">Pabst Blue Ribbon</span><br />
																		<span class="credit-title">Director: </span><span class="credit-name">Oison Weles</span><br />
																		<span class="credit-title">Production: </span><span class="credit-name">ACME</span><br />
																		<span class="credit-title">Editor: </span><span class="credit-name">Tim Wilson</span>

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

										<!-- TAB 2 GENERAL -->
										<div id="tab2">
											<section class="clearfix videogroup-list">
												<?php			

													$args = array(
													'tax_query' => array(
														array(
															'taxonomy' => 'video_groups',
															'terms' => 7
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

										<!-- TAB 3 LONG FORM -->
										<div id="tab3">

											<section class="clearfix videogroup-list">
												<?php			
	
													$args = array(
													'tax_query' => array(
														array(
															'taxonomy' => 'video_groups',
															'terms' => 8
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

				</div>

			</div>

<?php get_footer(); ?>