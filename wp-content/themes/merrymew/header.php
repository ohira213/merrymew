<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no,address=no,email=no">
<title><?php wp_title('|',true,'right'); bloginfo('name'); ?></title>

<meta name="description" content="">

<meta property="og:title" content="">
<meta property="og:url" content="">
<meta property="og:image" content="">
<meta property="og:description" content="">

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/reset.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/common.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style_pc.css" media="screen and (min-width:769px)">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style_sp.css" media="screen and (max-width:768px)">
	
<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/css/modaal.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/css/modaal.min.css"/>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico">

</head>
<body <?php body_class(); ?>>
<header>
    <div class="header_logo">
        <div class="hamburger-menu sp">
            <span></span>
            <span></span>
            <span></span>
        </div>
		<?php if ( is_home() || is_front_page() ) : ?>
            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="pc" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_merry_mew_white.png" alt=""><img class="sp" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_merry_mew.png" alt=""></a></h1>
        <?php else: ?>
            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_merry_mew.png" alt=""></a></h1>
        <?php endif; ?>
    </div>
    <div class="mobile-nav-overlay sp"></div>
    <nav class="mobile-nav">
        <ul>
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#features"><span>About</span>はじめての方へ<span class="sp"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/aicon_arrow05.svg" alt=""></span></a></li>
			<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>stories"><span>Stories</span>卒業生の事例<span class="sp"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/aicon_arrow05.svg" alt=""></span></a></li>
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>news"><span>News</span>お知らせ<span class="sp"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/aicon_arrow05.svg" alt=""></span></a></li>
            <li>
                <a href="https://lin.ee/NMihbEU" class="cmn-btn_line">
                    <div class="button-content">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/aicon_line.svg" alt="">
                        友だち追加
                    </div>
                </a>
            </li>
        </ul>
        <button class="close-btn sp">&times;</button>
    </nav>
    <div class="sp cmn-btn_line_wrap">
        <a href="https://lin.ee/NMihbEU" class="cmn-btn_line">
            <div class="button-content">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/aicon_line.svg" alt="">
                友だち追加
            </div>
        </a>
    </div>
</header>