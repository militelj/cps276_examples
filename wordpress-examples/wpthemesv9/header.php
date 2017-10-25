<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php bloginfo('name');?></title>
		<?php wp_head(); ?>
	</head>
	
	<body <?php body_class() ?>>
		<div id="wrapper">
			<header class="site-header">
				<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a><span><?php bloginfo('description'); 
				
				/*ADDED THE CONDITIONAL LOGIC HERE SO THE MESSAGE WILL ONLY APPEAR ON THE PORTFOLIO PAGE.*/
				if(is_page('portfolio')){
					echo " - Thank you for viewing our work";
			
				} ?></span></h1>
				<nav class="site-nav">
					<!-- THIS LIST ALL THE PAGES THAT WE HAVE IN OUR WORDPRESS SITE AND PUTS THEM IN AN UNORDERED LIST. -->
					<?php
						$args = array(
							"theme_location" => "primary"
						);

						wp_nav_menu($args); 
					?>
				</nav>
			</header>


