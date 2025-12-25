<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>" charset="<?php bloginfo('charset'); ?>" />
	<title>WTG | Listing Management</title>
	<?php
	header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
	header("Pragma: no-cache"); // HTTP 1.0.
	header("Expires: 0"); // Proxies.
	$icon = get_template_directory_uri().'/images/favicon.ico';
	echo "<link aysnc type='image/x-icon' href='$icon' rel='shortcut icon'>";
    //echo '<title>'.wp_title().'</title>';
	echo '<meta name="robots" content="index, follow">';
	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
	if (!current_user_can('administrator'))	{ show_admin_bar( false ); }
    wp_head();
    ?>
	<link rel="stylesheet" type="text/css" defer href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i&subset=latin-ext" />
</head>
<style> .copyright {width:100%} </style>
<body itemscope itemtype="https://schema.org/WebPage">

		<?php do_action('wtg_after_body'); ?>
		
	<header class="no_carousel" itemscope itemtype="https://schema.org/WPHeader">
		<?php do_action('listing_header'); ?>
	</header>
		<?php do_action('wtg_before_content'); ?>
	<main>
		<?php do_action('wtg_content_top'); ?>



