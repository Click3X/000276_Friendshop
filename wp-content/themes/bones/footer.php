		</div> <!-- END CONTAINER -->

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


				<!-- <div class="ftlogo-container" id="transition">
					<a href="<?php // echo bloginfo('url'); ?>">
						<img src="<?php // echo $logo_url; ?>" alt="<?php // echo "friendshop"; ?>" width="181" height="32" class="logo-png" />

                        <?php include('php/logo-svg.php'); ?>
					</a>
				</div> -->

				<!-- <div class="footer-left"> -->
                
	                <!-- <div class="ftlogo-container-new">
	                    <a href="<?php echo bloginfo('url'); ?>"> -->
	                        <!-- <img src="<?php echo $logo_url; ?>" alt="<?php echo "friendshop"; ?>" width="181" height="32" class="logo-png" /> -->
	                        <!-- NEW SVG LOGO -->
	                        <?php //include('php/logo-svg.php'); ?>
	                   <!--  </a>
	                </div> -->




				<!-- </div> -->


				<?php if(get_field('social_media', 'option')): ?>
					<div class="ftsocial-container">
						<ul>
						<?php while(has_sub_field('social_media', 'option')): 
							$sub_title = get_sub_field('title'); 

							//if ($sub_title == 'Mail') { ?>
<!-- 								<li class="social">
									<a href="<?php echo 'mailto:' . get_sub_field('link'); ?>" target="_blank" title="<?php echo $sub_title;?>" class="<?php echo $sub_title; ?>"></a>
								</li> -->
							<?php //} else { ?>
									<li class="social">
										<a ontouchend="this.onclick=fix" href="<?php echo get_sub_field('link'); ?>" target="_blank" title="<?php echo $sub_title ;?>" class="<?php echo $sub_title; ?>">
											<img src="<?php echo bloginfo('url'); ?>/img/deer.jpg" class="dr-ori">
											<img src="<?php echo bloginfo('url'); ?>/img/deer_hover.jpg" class="dr-hov">
										</a>
									</li>
							<?php //} ?>

							<?php endwhile; ?>
						</ul>
					</div>
				<?php endif; ?>

				<div class="ftaddress-container">
					<?php echo $address ?>
				</div>


			</div>
		</footer>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>


		<?php
			// CONDITIONALLY LOAD OUTLINE SCRIPT
            $server = $_SERVER['REMOTE_ADDR'];
            // IF SERVER IS LOCAL, ADD OUTLINE BUTTON
            if($server == '127.0.0.1') {
                echo "<script>
                    jQuery('head').append('<style>#outline {position:fixed;z-index:1000;bottom:50px;right:50px;} .outlines {outline:1px solid rgba(255, 0, 0, 0.3);}</style>');
                    jQuery('body').append('<input id=\"outline\" type=\"button\">');

                    jQuery('#outline').click(function() {
                        jQuery('*').toggleClass('outlines');
                   });
                </script>";
            }
        ?>

	</body>
</html>