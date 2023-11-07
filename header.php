<!DOCTYPE html>
<html lang="<?php language_attributes();?>">
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Ricardo Castro">
  <meta name="keywords" content="argos, congreso argos">
  <title><?php bloginfo('name'); ?> <?php is_front_page() ? bloginfo('description') : " | ".wp_title(''); ?></title>

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap"
          rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-md">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand mx-auto mx-lg-0" href="/">
                Argos 2023
            </a>
	            <?php
	            wp_nav_menu([
		            'theme_location' => 'main-menu',
		            'depth' => 2,
		            'container' => 'div',
		            'container_class' => 'collapse navbar-collapse',
		            'container_id'    => 'main-menu',
		            'menu_class' => 'navbar-nav me-auto',
		            'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
		            'walker' => new WP_Bootstrap_Navwalker()
	            ]);
	            ?>
        </div>
    </nav>
</header>