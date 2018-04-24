        </section>

        <?php
            $method = $this->router->fetch_method();

            if($method == 'blogs') {
                $current_element = 'blog';
                $class = 'footer_button_line_blog';
            } elseif($method == 'information') {
                $current_element = 'info';
                $class = 'footer_button_line_info';
            } elseif($method == 'cart') {
                $current_element = 'cart';
                $class = 'footer_button_line_cart';
            } elseif($method == 'account') {
                $current_element = 'account';
                $class = 'footer_button_line_my';
            } else {
                $current_element = 'market';
                $class = 'footer_button_line_shop';
            }
        ?>

        <?php if(!isset($body_class)) { ?>
            <footer>
                <div class="footer_button_current <?php echo $class ?>"></div>
                <a href="/cart" class="footer_button footer_button_img_cart fl_l <?php echo ($current_element == 'cart' ? 'active' : '') ?>">
                    <div class="footer_button_img sprite"></div>
                    <div class="footer_button_text">корзина</div>
                </a>
                <a href="/account" class="footer_button footer_button_img_my fl_l <?php echo ($current_element == 'account' ? 'active' : '') ?>"> <!-- add / remove .active -->
                    <div class="footer_button_img sprite"></div>
                    <div class="footer_button_text">моё</div>
                </a>
                <a href="/" class="footer_button footer_button_img_shop fl_l <?php echo ($current_element == 'market' ? 'active' : '') ?>"> <!-- add / remove .active -->
                    <div class="footer_button_img sprite"></div>
                    <div class="footer_button_text">магазин</div>
                </a>
                <a href="/blogs?type=m" class="footer_button footer_button_img_blog fl_l <?php echo ($current_element == 'blog' ? 'active' : '') ?>"> <!-- add / remove .active -->
                    <div class="footer_button_img sprite"></div>
                    <div class="footer_button_text">блог</div>
                </a>
                <a href="/information" class="footer_button footer_button_img_info fl_l <?php echo ($current_element == 'info' ? 'active' : '') ?>"> <!-- add / remove .active -->
                    <div class="footer_button_img sprite"></div>
                    <div class="footer_button_text">инфо</div>
                </a>
                <div class="clear"></div>
            </footer>
        <?php } ?>
        <script type="text/javascript" src="/assets/mobile/js/jquery-1.11.2.min.js"></script>
        <script src="/assets/mobile/js/slider.js"></script><!-- ONLY ON INDEX ! -->        
        <script src="//ulogin.ru/js/ulogin.js"></script>
        <script src="/assets/mobile/js/main.js"></script>
    </body>

    <span class="product_iframe_wrapper">
        <iframe name="product_iframe" class="fullscreen product_iframe"></iframe>
    </span>
</html>