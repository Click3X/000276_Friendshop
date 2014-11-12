<?php //get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<div id="main" class="m-all t-2of3 d-5of7 cf" role="main">


							<div id="tab-container" class="tab-container">
										
										<ul id="work-ul" class='etabs work-tabs cf'>
												
													<li class='tab-gallery tab'><a href="#tab1">COMEDY</a></li>
													<li class='tab-gallery tab'><a href="#tab2">GENERAL</a></li>
													<li class='tab-gallery tab'><a href="#tab3">LONG FORM</a></li>

										</ul>

							<!-- </div> -->

							<div id="tab1">

								<?php
									
									$args= array(
										'post_type'=>'videos',
										'tax_query' => array(
											'taxonomy' => 'video_groups',
											'terms' => 6
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
																			<h3><?php echo $title; ?></h3>
																			<h4><?php echo $hover_text2; ?></h4>
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
							<div id="tab2">Nothing Here</div>
							<div id="tab3">Nothing Here</div>
						</div>


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

					<?php //get_sidebar(); ?>

				</div>

			</div>

<?php //get_footer(); ?>
