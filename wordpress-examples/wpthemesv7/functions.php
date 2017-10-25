<?php

function resources(){
	wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts','resources');

/* nav menus*/
register_nav_menus(array(
	'primary' => __('Primary Menu'),
	'footer' => __('Footer Menu')
));


/* get top ancestor */
function get_top_ancestor_id(){

	/* get the $post associative array and make is global so I can access it within this function */
	global $post;

	if($post->post_parent){
		$ancestors = array_reverse(get_post_ancestors($post->ID));
		/* $ancestors[0] takes the first index value of the array*/
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