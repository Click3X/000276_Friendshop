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
									        	<!-- <a class="players_link director-btn" data-director="<?php echo $term->name ;?>" href="<?php echo get_term_link( $child, $taxonomy_name ) ?>"> -->
									        	<a class="players_link director_btn" data-director="<?php echo $term->term_id ;?>" href="#">
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

<!-- 										<?php
											// GET TAXONOMY INFO ON TABS
											$new_tabs = get_field('vid_tax');														
											$i=1;
											
											foreach ($new_tabs as $key => $new_tab) {													
												echo '<li class="tab-gallery tab"><a class="cat_btn" data-category="'.$new_tab->term_id.'" href="#tab'.$i.'" data-video-group="'.$new_tab->term_id.'">'.$new_tab->name.'</a></li>';
												$i++;
											}
										?>	 -->	

										<li class='tab-gallery tab'><a href="#tab1">Reels</a></li>									
										</ul>

										<!-- test ajax container -->
										<main id="videoList">
											<?php 
												



											?>


										</main>


										<!-- TAB 1 COMEDY -->
										<div id="tab1">

												<section class="clearfix videogroup-list">
												<?php			

													// REELS - BEN
													$args = array(
													'tax_query' => array(
														array(
															'taxonomy' => 'video_groups',
															'terms' => 13,
															// 'operator' => 'AND',
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
															$title_clean = cleanString($title); ?>


																<!-- TEST HOVER EFFECT -->
																<li class="video-thumb">
																<div class="grid">
																	<a href="#<?php echo $title_clean ?>-container" class="fancybox various">
																	<figure class="effect-selena">
																		<?php if ( has_post_thumbnail() ) { 
																			the_post_thumbnail( 'video-small' ); 
																		}
																		?>
																		<div class="hover-shadow"></div>
																		<figcaption>
																			<h2><?php echo $title; ?></h2>
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
																	<!-- <img class="ratio" src="wp-content/themes/bones/library/css/mask.png"/> -->
																	<?php //echo $link ?>
																	<iframe src="https://friendshop.wiredrive.com/?routekey=iframe-embed&token=5feea034cffd7e7bb3b7bd9ebb08a350&autoplay=0&loop=0&controls=1"></iframe>

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