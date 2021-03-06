<!doctype html>
<html <?php language_attributes(); ?>>
<head>
          <meta charset="<?php bloginfo('charset'); ?>">
          <link rel="profile" href="http://gmpg.org/xfn/11">
          <link rel="pingback" href="<? bloginfo('pingback_url'); ?>">


          <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
          <meta name="viewport"
                content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

          <title><?php wp_title(''); ?></title>


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>
    <div class="container">
            <div class="header_nav">
                        <div class="header_logo">
                                <a class="logo" href="/">Isabel Teixeira</a>
                        </div>
                        <div class="header_nav_principal animated">
                            <?php wp_nav_menu(array('theme_location' => 'menu-principal', 'container' => 'nav')); ?>
                        </div>
                        <div class="menu_burger">
                                <i class="fas fa-bars"></i>
                        </div>
            </div>
    </div>


</header>