<?php
/*
Template Name: Special Layout
*/
get_header();

if(have_posts()) : 
	while(have_posts()) : the_post(); ?>

	<article class="post">
		<h2 class="page"><?php the_title(); ?></h2>

		<div class="info-box">
			<h3>Disclaimer Title</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum facilis amet qui ut mollitia delectus molestiae! Ab explicabo, dolorum ea praesentium esse placeat corporis.</p>
		</div>

		<?php the_content(); ?>
	</article>

	<?php endwhile;

	else :
		echo '<p>No content found</p>';

	endif;

get_footer();
?>