<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title><?php wp_title() ?></title>
	<link href="<?php url() ?>/css/screen.css" rel="stylesheet">
	<?php wp_head() ?>
</head>
<body <?php body_class( (is_page() ? 'page-' : 'post-') . $post->post_name ) ?>>
	<header class="head" role="banner">
		<div class="logo">
			<a href="<?php home() ?>" rel="home">
				<img alt="<?php name() ?>" data-at2x="<?php url() ?>/img/logo@2x.png" height="175" src="<?php url() ?>/img/logo.png" width="230">
			</a>
		</div>
	</header>
	<hr>
	<?php 
	wp_nav_menu( array(
		'container' => 'nav',
		'container_class' => 'nav',
		'menu_class' => 'menu'
	) );
	?>

	<hr>
	<div class="main" role="main">
