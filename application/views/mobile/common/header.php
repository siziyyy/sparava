<!DOCTYPE html>
<html class="no-js" lang="ru">
    <head>
        <?php if(count($this->_seo_data)) { ?>
            <?php if($this->_seo_data['seo_keywords']) { ?>
                <meta name="keywords" content="<?php echo $this->_seo_data['seo_keywords'] ?>"/>
            <?php } ?>

            <?php if($this->_seo_data['seo_description']) { ?>
                <meta name="description" content="<?php echo $this->_seo_data['seo_description'] ?>"/>
            <?php } ?>

            <?php if($this->_seo_data['seo_title']) { ?>
                <title><?php echo $this->_seo_data['seo_title'] ?></title>
            <?php } ?>

            <?php if($this->_seo_data['seo_canonical']) { ?>
                <link rel="canonical" href="<?php echo $this->_seo_data['seo_canonical'] ?>"/>
            <?php } ?>           

            <meta name="robots" content="index,follow" />
        <?php } else { ?>
            <title>ай да еда - Продукты с Фуд Сити</title>
        <?php } ?>

        <title>АйДаЕда</title>
        <link rel="apple-touch-icon" sizes="180x180" href="/assets/mobile/img/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/assets/mobile/img/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="194x194" href="/assets/mobile/img/favicons/favicon-194x194.png">
        <link rel="icon" type="image/png" sizes="192x192" href="/assets/mobile/img/favicons/android-chrome-192x192.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/assets/mobile/img/favicons/favicon-16x16.png">
        <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/carlito" type="text/css"/>
        <link rel="manifest" href="/assets/mobile/img/favicons/site.webmanifest">
        <link rel="mask-icon" href="/assets/mobile/img/favicons/safari-pinned-tab.svg" color="#004bff">
        <link rel="shortcut icon" href="/assets/mobile/img/favicons/favicon.ico">
        <meta name="msapplication-TileColor" content="#004bff">
        <meta name="msapplication-TileImage" content="/assets/mobile/img/favicons/mstile-144x144.png">
        <meta name="msapplication-config" content="/assets/mobile/img/favicons/browserconfig.xml">
        <meta name="theme-color" content="#004bff">
        <link rel="stylesheet" href="/assets/mobile/css/reset.css">
        <link rel="stylesheet" href="/assets/mobile/css/main.css">
        <meta charset="utf-8">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0;">
    </head>

    <body>
        <div class="pixel_perfect"></div>
        <section class="page_scrollbar_helper">
            <header class=""> <!-- add / remove .blog_header / .cart_header / .info_header / .cabinet_header / .post_and_item_header-->
                <div class="content">
                    <div class="header_icons_left fl_l">
                        <a href="#" class="header_icon sprite header_icon_hamburger fl_l"></a>
                        <a href="#" class="header_icon sprite header_icon_search fl_l"></a>
                        <div class="clear"></div>
                    </div>
                    <a href="/" class="header_logo sprite blog_logo"></a>
                    <div class="cart_header_text">Корзина</div>
                    <div class="header_icons_right fl_r">
                        <a href="#" class="header_icon sprite header_icon_phone fl_r"></a>
                        <a href="#" class="header_icon sprite header_icon_favorite fl_r"></a>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </header>
            <?php $this->load->view('mobile/common/products_menu');?>