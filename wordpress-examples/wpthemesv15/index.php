<?php

get_header();?>

	<div class="clearfix">
		
		<div class="maincolumn">
			<?php if(have_posts()) : 
				while(have_posts()) : the_post();

				get_template_part('content');

				endwhile;

				else :
				echo '<p>No content found</p>';

			endif;?>
			
		</div>

		<?php get_sidebar(); ?>

	</div>


<?php get_footer(); ?>

