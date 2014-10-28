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


				<div class="ftlogo-container" id="transition">
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

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>
</html>