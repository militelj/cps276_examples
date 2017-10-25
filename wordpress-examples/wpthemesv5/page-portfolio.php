<?php

get_header();

if(have_posts()) : 
	while(have_posts()) : the_post(); ?>

	<article class="post">
		<div class="column-container">
			<div class="title-column">
				<h2 class="page"><?php the_title(); ?></h2>
			</div>
			<div class="content-column">
				<?php the_content() ?>
			</div>
		</div>
	</article>

	<?php endwhile;

	else :
		echo '<p>No content found</p>';

	endif;

get_footer();
?>

