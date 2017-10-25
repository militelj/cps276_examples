<?php

get_header();

if(have_posts()) : 

?>

<h2><?php
	if(is_category()){
		single_cat_title();
	}
	elseif (is_tag()) {
		single_tag_title();
	}
	elseif (is_author()) {
		the_post();
		echo "Author Archives: " . get_the_author();
		rewind_posts();
	}
	elseif (is_day()){
		echo "Daily Archives: " . get_the_date();
	}
	elseif (is_month()) {
		echo "Monthly Archives: " . get_the_date('F Y');
	}
	elseif (is_year()) {
		echo "Yearly Archives: " . get_the_date('Y');
	}
	else {
		echo "Archives: ";
	}

?></h2>


<?php




	while(have_posts()) : the_post(); ?>

	<article class="post">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

		<!-- THIS CODE LIST THE DATE AND THE AUTHOR NAME IT ALSO PROVIDES A LINK ON THE AUTHORS NAME TO GO JUST THE POSTS FOR THAT AUTHOR. -->
		<p class="post-info"><?php the_time('F j, Y g:i a') ?> | by <a href="<?php get_author_posts_url(get_the_author_meta('ID')) ?>"><?php the_author();  ?></a> | Posted in 

			<?php 
				/* GET_THE_CATEGORY RETURNS AN ARRAY OF ALL THE CATAGORES FOR EACH POST*/
				$categories = get_the_category();
				$seperator = ", ";
				$output = '';

				
				if($categories){
					foreach($categories as $category){
						/* GET_CATEGORY_LINK LINKS TO EACH CATEGORY SECTION AND THE TERM_ID MAPS TO THE CATEGORY ID. CAT_NAME IS THE CATEGORY NAME.*/
						$output .= '<a href="' .get_category_link($category->term_id). '">' . $category->cat_name . '</a>' . $seperator;
					}
				}

				/* THIS TRIMS THE COMMA FORM THE END OF THE LAST CATAGORY LISTED TRIM IS A PHP FUNCTION*/
				echo trim($output, $seperator);


			?>
		</p>

		<?php the_excerpt(); ?>
	</article>

	<?php endwhile;

	else :
		echo '<p>No content found</p>';

	endif;

get_footer();
?>

