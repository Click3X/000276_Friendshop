			<?php 

				$logo = get_field('logo', 'option');
				$address = get_field('address', 'option');

				if( !empty($logo) ): 

					// vars
					$logo_url = $logo['url'];

				endif; 


			?>			


			<footer class="footer" role="contentinfo">


			

				<div id="inner-footer" class="wrap cf">

					<nav role="navigation">
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
					</nav>

					<!-- <p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p> -->

					<a href="<?php echo bloginfo('url'); ?>">

						<img src="<?php echo $logo_url; ?>" alt="<?php echo "friendshop"; ?>" width="181" height="32" />

					</a>

					<?php echo $address ?>

					<?php if(get_field('social_media', 'option')): ?>

						<ul>

						<?php while(has_sub_field('social_media', 'option')): ?>

							<li>sub_field_1 = <?php the_sub_field('twitter'); ?>, sub_field_2 = <?php the_sub_field('facebook'); ?>, etc</li>

						<?php endwhile; ?>

						</ul>

				<?php endif; ?>


				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
