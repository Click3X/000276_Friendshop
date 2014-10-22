			<?php 

				$logo = get_field('logo', 'option');
				$address = get_field('address', 'option');

				if( !empty($logo) ): 

					// vars
					$logo_url = $logo['url'];

				endif; 


			?>			


			<footer class="footer" role="contentinfo">


			

				<div id="inner-footer" class="cf">

<!-- 					<nav role="navigation">
						<?php wp_nav_menu(array(
    					'container' => '',                              // remove nav container
    					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
    					'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
    					'menu_class' => 'nav footer-nav cf',            // adding custom nav class
    					'theme_location' => 'footer-links',             // where it's located in the theme
    					'before' => '',                                 // before the menu
        			'after' => '',                                  // after the menu
        			'link_before' => '',                            // before each link
        			'link_after' => '',                             // after each link
        			'depth' => 0,                                   // limit the depth of the nav
    					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
						)); ?>
					</nav> -->

					<!-- <p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p> -->
					<div class="ftlogo-container">
											
						<a href="<?php echo bloginfo('url'); ?>">

							<img src="<?php echo $logo_url; ?>" alt="<?php echo "friendshop"; ?>" width="181" height="32" />

						</a>

					</div>

					<div class="ftaddress-container">

						<?php echo $address ?>

					</div>

					<?php if(get_field('social_media', 'option')): ?>
					
						<div class="ftsocial-container">
							<ul>

							<?php while(has_sub_field('social_media', 'option')): 
								$sub_title = get_sub_field('title'); 

							if ($sub_title == 'Mail') { ?>
								<li class="social">
									<a href="<?php echo 'mailto:' . get_sub_field('link'); ?>" target="_blank" title="<?php echo $sub_title;?>" class="<?php echo $sub_title; ?>"></a>
								</li>
							<?php } else { ?>
									<li class="social"><a href="<?php echo get_sub_field('link'); ?>" target="_blank" title="<?php echo $sub_title ;?>" class="<?php echo $sub_title; ?>"></a>
									</li>
							<?php } ?>

								

							<?php endwhile; ?>

							</ul>

						</div>

				<?php endif; ?>


				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
