		<footer class="site-footer">
				
				<nav class="site-nav">
					<!-- THIS LIST ALL THE PAGES THAT WE HAVE IN OUR WORDPRESS SITE AND PUTS THEM IN AN UNORDERED LIST. -->
					<?php
						$args = array(
							"theme_location" => "footer"
						);

						wp_nav_menu($args); 
					?>
				</nav>
				<p><?php bloginfo('name'); ?> - &copy; <?php echo date('Y'); ?></p>
		</footer>
		
	</div><!-- END WRAPPER -->
	<?php wp_footer();?>
</body>
</html>