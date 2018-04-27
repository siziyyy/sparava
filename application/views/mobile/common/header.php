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

    <?php
        $method = $this->router->fetch_method();

        if($method == 'blogs') {
            $class = 'blog_header';
        } elseif($method == 'information') {
            $class = 'info_header';
        } elseif($method == 'cart') {
            $class = 'cart_header';
        } elseif($method == 'account') {
            $class = 'cabinet_header';
        } elseif(isset($body_class)) {
            $class = 'post_and_item_header';
        } else {
            $class = '';
        }
    ?>

    <body class="<?php echo (isset($body_class) ? $body_class : '') ?>">
        <!-- Facebook Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window,document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
         fbq('init', '298862557184301'); 
        fbq('track', 'PageView');
        </script>
        <noscript>
         <img height="1" width="1" 
        src="https://www.facebook.com/tr?id=298862557184301&ev=PageView
        &noscript=1"/>
        </noscript>
        <!-- End Facebook Pixel Code -->    
        
        <!-- Yandex.Metrika counter -->
        <script type="text/javascript" >
            (function (d, w, c) {
                (w[c] = w[c] || []).push(function() {
                    try {
                        w.yaCounter46865034 = new Ya.Metrika({
                            id:46865034,
                            clickmap:true,
                            trackLinks:true,
                            accurateTrackBounce:true
                        });
                    } catch(e) { }
                });

                var n = d.getElementsByTagName("script")[0],
                    s = d.createElement("script"),
                    f = function () { n.parentNode.insertBefore(s, n); };
                s.type = "text/javascript";
                s.async = true;
                s.src = "https://mc.yandex.ru/metrika/watch.js";

                if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f, false);
                } else { f(); }
            })(document, window, "yandex_metrika_callbacks");
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/46865034" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->    
        
        <div class="pixel_perfect"></div>
        <section class="page_scrollbar_helper">
            <header class="<?php echo $class ?>"> <!-- add / remove .blog_header / .cart_header / .info_header / .cabinet_header / .post_and_item_header-->
                <div class="content">
                    <div class="header_icons_left fl_l">
                        <a href="#" class="header_icon sprite header_icon_hamburger fl_l"></a>
                        <a href="#" class="header_icon sprite header_icon_search fl_l"></a>
                        <div class="clear"></div>
                    </div>
                    <a href="/" class="header_logo sprite blog_logo"></a>
                    <div class="cart_header_text">Корзина</div>
                    <div class="header_icons_right fl_r">
                        <a href="/callme" class="header_icon sprite header_icon_phone fl_r"></a>
                        <a href="/favourites" class="header_icon sprite header_icon_favorite header_icon_favorite_active fl_r"></a><!-- .header_icon_favorite_active-->
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </header>
            <?php $this->load->view('mobile/common/products_menu');?>