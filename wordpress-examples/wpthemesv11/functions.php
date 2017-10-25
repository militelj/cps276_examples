<?php

function resources(){
	wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts','resources');

/*MOVED NAV MENUS TO GO INSIDE OF THE LEARNINGWORDPRESSSETUP FUNCTION BECAUSE THAT FUNCTION ALLOWS US TO SETUP OUR THEME*/


/* get top ancestor */
function get_top_ancestor_id(){

	global $post;

	if($post->post_parent){
		$ancestors = array_reverse(get_post_ancestors($post->ID));
		return $ancestors[0];
	}
	return $post->ID;
}

/*does page have children */
function has_children(){
	global $post;
	$pages = get_pages('child_of=' .$post->ID);
	return count($pages);
}

/* CUSTOMIZE EXCERPT WORD COUNT LENGTH */
function custom_excerpt_length(){
	return 25;
}


/* ADD_FILTER ALLOWS US TO HOOK ON TO FILTERS AND REPLACE THEM WITH OUR FUNCTION */
add_filter('excerpt_length', 'custom_excerpt_length');




function learningWordPressSetup(){
	/* NAV MENUS */
	register_nav_menus(array(
		'primary' => __('Primary Menu'),
		'footer' => __('Footer Menu')
	));

	/* ADD FEATURE IMAGES SUPPORT */
	add_theme_support('post-thumbnails');

	/* ADD_IMAGE_SIZE RESIZES IMAGES.  VALUES ARE LISTED AS NAME, WIDTH, HEIGHT, WHETHER TO CROP IMAGES TO SPECIFIED WIDTH AND HEIGHT OR RESIZE. AN ARRAY CAN SPECIFY POSITIONING OF THE CROP AREA.  NOTE IF THE AREA IS NOT SPECIFIED THEN IT WILL DO THE CENTER.  NOTE2: WHEN YOU CHANGE THE SETTINGS YOU HAVE TO RELOAD THE IMAGE.
	
	YOU CAN OPTIONALLY CROP THE IMAGE BY CLICKING EDIT IMAGE IN THE DASHBOARD (WHERE THE IMAGE IS POSTED) AND USING THE CROPPING TOOL.  THIS WILL CROP THE IMAGE FOR ALL VIEWS.

	THE CODE BELOW DOES WORK BUT I HAVE FOUND THAT IF I ATTEMPT TO RESIZE THE IMAGE TO SOMETHING LESS THEN 960 IT DOES NOT SEEM TO WORK CONSISTENTLY 

	*/
	add_image_size('small-thumbnail', 960, 230, array('left','top'));
	add_image_size('banner-image');

}

add_action('after_setup_theme','learningWordPressSetup');
