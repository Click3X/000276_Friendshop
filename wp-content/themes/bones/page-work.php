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
								<div class="mixedContent">
									<h2>Player Select</h2>
								<button class="prev-no-style">&laquo;</button>
								<button class="next-no-style">&raquo;</button>

								<div class="carousel-no-style" style="margin: auto">
								    <ul>
								        <li class="player1" style="width:350px; height:370px;">
								        	
								        	<div></div>
								        	<p>Ben</p>

								        </li>
								        <li class="player2" style="width:350px; height:370px;">
								        	<div></div>
								        	<p>Tim</p>
								        </li>
								      

								    </ul>
								</div>
								</div>



									<div id="tab-container" class="tab-container">

										<!-- <div class="work-tabs-container cf"> -->
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
													<?php } ?>
													<?php endwhile; ?>  
												<?php endif; ?>
											</ul>
										<!-- </div> -->

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

										</div>

									<?php
										// the content (pretty self explanatory huh)
										// the_content();
										// layerslider(1);

										wp_link_pages( array(
											'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
											'after'       => '</div>',
											'link_before' => '<span>',
											'link_after'  => '</span>',
										) );
									?>
								</section>

							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div>

						<?php get_sidebar(); ?>

				</div>

			</div>


<?php get_footer(); ?>
