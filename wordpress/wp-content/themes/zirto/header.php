<?php
/**
 * header.php
 * @package WordPress
 * @subpackage Zirto
 * @since Zirto 1.0
 * 
 */
 ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="wrapper">
	
	    <!--  page-loader  -->
		<div id="preloader">
		   <div class="pulse bg-main"></div>
		</div>

		<?php get_template_part('includes/navbar'); ?>
		<?php if( get_option_tree( 'zirto_donate_button' ) == 'on') { ?>
			<?php get_template_part('includes/donate-popup'); ?>
		<?php } ?>