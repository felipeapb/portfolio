<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); wp_title(); ?></title>

<link rel="alternate" type="application/rss+xml" title="RSS Feed" href="<?php bloginfo_rss('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />

<?php ts_theme_head(); ?>
<?php wp_head(); ?>
</head>

<body <?php ds_body_id(); ?>>

<div id="main">

        <div id="header">

                <h1 id="blog-title">
                        <img id="blog-logo" src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="logo" width="220" height="40"/>
                        <?php bloginfo('description'); ?>
                </h1>

                <div id="header-top">

                        <ul id="page-menu">
                                <?php $ex_pages = get_option('destyle_exclude_pages'); wp_list_pages('title_li=&depth=-1&sort_column=menu_order&exclude='.$ex_pages); ?>
                        </ul>

                        <div id="rss">
                                <a href="<?php bloginfo_rss('rss2_url'); ?>"><?php _e('Subscreva o Feed!','destyle'); ?></a>
                        </div>

                </div>

        </div><!-- end header -->

        <div id="menu" class="clearfix">

                <ul class="sf-menu">
                        <li <?php if(is_front_page()) echo 'class="current"'; ?>><a href="<?php bloginfo('url'); ?>"><?php _e('Início','destyle'); ?></a></li>
                        <?php
                                if(is_single()) : $category = get_the_category(); $current_cat = $category[0]->cat_ID; else : $current_cat = ''; endif;
                                $ex_cats = get_option('destyle_exclude_cats'); wp_list_categories('title_li=&current_category='.$current_cat.'&exclude='.$ex_cats); ?>
                </ul>

        </div><!-- end menu -->

        <div id="content-top"></div>

        <div id="content-wrap">

                <div id="content">