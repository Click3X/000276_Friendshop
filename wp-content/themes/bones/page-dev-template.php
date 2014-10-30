<?php 
/*

Template Name: Dev Template

*/
get_header(); 


$args = array(
	// GIF GALLERY
	// 'page_id' => 8
	// ABOUT
	// 'page_id' => 13
	// EDITORS
	'page_id' => 6
);

$query = new WP_Query( $args );

?>
		<div id="demo-holder">
			<?php 
				// IF IS FRACTAL
				if (is_page(75)) { include('php/html5demos/fractal.php'); }
				// HEXAGONAL
				if (is_page(77)) { include('php/html5demos/hexagonal.php'); }
				// WAVE
				if (is_page(79)) { include('php/html5demos/wave.php'); }
			?>
		</div> <!-- END DEMO HOLDER -->


		<!-- EXAMPLE GALLERY CONTENT OVER DEMO BG -->
		<div id="content" class="cf">

			<div id="inner-content" class="wrap cf">

					<div id="main" class="m-all t-3of3 d-7of7 cf" role="main">

						<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

							<section class="entry-content cf" itemprop="articleBody">

								<?php 

									// GIF GALLERY - PAGE ID 8
									if($args['page_id'] == 8 ) {
										if(get_field('gallery_list')) {
											echo '<ul class="thumb-list">';
											$gall = get_field('gallery_list');
											foreach ($gall as $key => $gal) {
												$sub_title = $gal['title']; 
												$gif = $gal['gif'];
												$gif_url = $gif['url'];
												echo '<li class="thumb"><img src="'. $gif_url .'" alt="Thumb"></li>';  
											}
											echo '</ul>';
										}
									}


									// ABOUT PAGE - PAGE ID 13
									if($args['page_id'] == 13 ) {
										$title = get_field('title');
										$profile = get_field('profile');
										$content = get_field('content');
										$profile_url = $profile['url'];

										echo '<div class="content-container">
												<img id="permanent" src="'. $profile_url .'" alt="friendshop" />
												<h1>'.$title.'</h1>
											<p>'.$content.'</p>
										</div>';
									}


									// EDITORS PAGE - PAGE ID 6
									// START EDITORS --------------------------------------------------------------------------
									if($args['page_id'] == 6 ) { ?>
										<!-- SELECT PLAYERS -->
										<div class="mixedContent player-select-container">
											<h2 class="players-title">Player Select</h2>
											<button class="prev-no-style">&#10094;</button>
											<button class="next-no-style">&#10095;</button>
											<div class="carousel-no-style" style="margin: auto; overflow: hidden;">
											    <ul>
											        <li class="player1">
											        	<div></div>
											        	<p>Ben</p>
											        </li>
											        <li class="player2">
											        	<div></div>
											        	<p>Tim</p>
											        </li>
											    </ul>
											</div>
										</div>
										<!-- TAB CONTAINER -->
										<div id="tab-container" class="tab-container">
											<ul id="work-ul" class='etabs work-tabs cf'>
												<?php if(get_field('tabs')): 
													$tabs = get_field('tabs');
													foreach ($tabs as $key => $tab) {
														$tab1 = $tab['tab1']; 
														$tab2 = $tab['tab2']; 
														$tab3 = $tab['tab3'];
													} ?>
													<li class='tab'><a href="#tab1"><?php echo $tab1 ?></a></li>
													<li class='tab'><a href="#tab2"><?php echo $tab2 ?></a></li>
													<li class='tab'><a href="#tab3"><?php echo $tab3 ?></a></li>
													<?php
												endif; 
												?>
											</ul>
											<!-- TAB 1 -->
											<div id="tab1">
												<section>
					 								<ul class="video-list">
													<?php if(get_field('video_list1')): 
													while(has_sub_field('video_list1')): 
														$hover_text1 = get_sub_field('hover-text1'); 
														$hover_text2 = get_sub_field('hover-text2'); 
														$poster = get_sub_field('poster');
														if( !empty($poster) ): 
															$poster_url = $poster['url'];
														endif; ?>
													    <li class="video-thumb">
													    	<div class="poster-container">
													    		<img src="<?php echo $poster_url ?>" alt="Video">
													    		<div class="poster-hover">
													    			<h3><?php echo $hover_text1 ?></h3>
													    			<h4><?php echo $hover_text2 ?></h4>
													    		</div>
													    	</div>
													    </li>	
													    	  
													    <?php endwhile; ?>  
													  </ul> 
													<?php endif; ?>
												</section>
											</div>
											<!-- TAB 2 -->
											<div id="tab2">
												<section>
				 									<ul class="video-list">
													<?php if(get_field('video_list2')): 
														while(has_sub_field('video_list2')): 
															$hover_text1 = get_sub_field('hover-text1'); 
															$hover_text2 = get_sub_field('hover-text2'); 
															$poster = get_sub_field('poster');
															if( !empty($poster) ): 
																$poster_url = $poster['url'];
															endif; ?>
														    <li class="video-thumb">
														    	<div class="poster-container">
														    		<img src="<?php echo $poster_url ?>" alt="Video">
														    		<div class="poster-hover">
														    			<h3><?php echo $hover_text1 ?></h3>
														    			<h4><?php echo $hover_text2 ?></h4>
														    		</div>
														    	</div>
														    </li>	
												    	<?php endwhile; ?>  
												  	</ul> 
													<?php endif; ?>
												</section>
											</div>
											<!-- TAB 3 -->
											<div id="tab3">
											  	<section>
					 								<ul class="video-list">
													<?php if(get_field('video_list3')): 
													while(has_sub_field('video_list3')): 
														$hover_text1 = get_sub_field('hover-text1'); 
														$hover_text2 = get_sub_field('hover-text2'); 
														$poster = get_sub_field('poster');
														if( !empty($poster) ): 
															$poster_url = $poster['url'];
														endif; ?>
													    <li class="video-thumb">
													    	<div class="poster-container">
													    		<img src="<?php echo $poster_url ?>" alt="Video">
													    		<div class="poster-hover">
													    			<h3><?php echo $hover_text1 ?></h3>
													    			<h4><?php echo $hover_text2 ?></h4>
													    		</div>
													    	</div>
													    </li>	
													    <?php endwhile; ?>  
													</ul> 
													<?php endif; ?>
												</section>
											</div>
								
										</div> <!-- END TAB CONTAINER -->
									<?php										
									} 
									// END EDITORS --------------------------------------------------------------------------

								?>
								
							</section> 

						</article>

						<?php endwhile; ?>

						<?php endif; ?>

					</div>

					<?php // get_sidebar(); ?>

			</div>

		</div>

<?php get_footer(); ?>
