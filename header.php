<!DOCTYPE html>
<html>
<head>
    <?php wp_head();?>
</head>
<body>

<header>
    <a href="<?php bloginfo('url');?>">ARLS</a>
    <?php wp_nav_menu( array( 'theme_location' => 'utility-menu' ) ); ?>
    <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
</header>