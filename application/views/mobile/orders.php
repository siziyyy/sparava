<?php $this->load->view('mobile/common/header',$header);?>
        <div class="cabinet_page_header">
            <a href="/cart/logout" class="cabinet_page_exit">выйти</a>
            <div class="cabinet_page_header_tabs">
                <a href="/orders/" class="cabinet_page_header_tab active">Мои заказы</a>
                <a href="/favourites/" class="cabinet_page_header_tab">Избранное</a>
                <!-- <a href="/pages/cabinet/settings/" class="cabinet_page_header_tab">Настройки</a> -->
            </div>
        </div>
        <div class="cabinet_page_body content">
            <form class="cabinet_page_orders_form" method="get">
                <?php if(isset($orders)) { ?>
                    <?php foreach($orders as $c_order_id => $create_date) { ?>                
                        <label class="cabinet_page_orders_label">
                            <input type="radio" class="cabinet_page_orders_checkbox" <?php echo ($c_order_id == $order_id ? 'checked' : '' ) ?> name="order_id" value="<?php echo $c_order_id ?>">
                            <span class="cabinet_page_orders_checkbox_text"><?php echo '№'.$c_order_id.' - от '.$create_date ?></span>
                        </label>
                    <?php } ?>
                <?php } ?>
                <button class="cabinet_orders_button" type="submit">применить</button>
            </form>

            <?php if(isset($products)) { ?>
                <?php foreach($products as $product) { ?>
                    <?php $info['product'] = $product; ?>
                    <?php $this->load->view('mobile/common/load-product',$info);?> 
                <?php } ?>
            <?php } ?>            
        </div>
<?php $this->load->view('mobile/common/footer',$footer);?>