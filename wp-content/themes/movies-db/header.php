<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php echo wp_title(); ?></title>

    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">
            MOVIES DB
        </a>

		<?php wp_nav_menu( [
			'location'        => 'header_menu',
			'container_class' => 'collapse navbar-collapse',
			'menu_class'      => 'navbar-nav',

		] ); ?>
    </div>
</nav>
<main class="container">
