<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
	<meta charsert="<?php bloginfo('charset');?>"/>
	<title><?php 
	wp_title('|','true','right');
	bloginfo('name');?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url');?>" />
	<?php wp_head(); ?>
</head>
<body>
<nav class="navbar navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>				
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Site Name</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<?php xlion_bootstrap_menu(); ?>			
		</div>
	</div>
</nav>
