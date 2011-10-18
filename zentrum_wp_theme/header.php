<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers HTML5 3.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php bloginfo('name');?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php

		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );


		wp_head();
?>

<script src="<?php bloginfo('template_directory'); ?>/js/modernizr-1.6.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>
<script>
		$(document).ready(function() {

    // Hook up the first divs
    $(".item a").click(function() {

        // Get the target from the name of the anchor
        var targetDiv = $(this).attr("name");

        // Show the new div and hide the parent div
        $("#" + targetDiv).css("display", "");
        $(this).parents("span:last").css("display", "none");

    });

});


	</script> 


</head>
 
<body <?php body_class(); ?>>
	
	<div id="container">

		<div id="logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php zentrum_logo(); ?>" alt="<?php bloginfo('name');?>" /></a>
		</div>
