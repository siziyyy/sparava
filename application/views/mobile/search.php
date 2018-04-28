<?php $this->load->view('mobile/common/header');?>
	<div class="search_page content">
        <div class="search_pack">
            <div class="search_input_pack">
                <form method="get" action="/search">
                    <input type="text" class="search_input" value="<?php echo (isset($value) ? $value : ''); ?>" name="value">
                    <button type="submit" class="search_button">поиск</button>
                </form>
            </div>
            <div class="search_result">
                <?php foreach($products as $product) { ?>                       
                    <?php $info['product'] = $product; ?>
                    <?php $this->load->view('mobile/common/load-product',$info);?>                             
                <?php } ?>
                <?php if(count($products) == 0 and !empty($value)) { ?>
                    <div class="search_result_error">по запросу ничего<br>не найдено</div>
                <?php } ?>
                <?php if(empty($value)) { ?>
                    <div class="search_result_error">введите запрос для поиска</div>
                <?php } ?>  
            </div>
        </div>
    </div>
<?php $this->load->view('mobile/common/footer');?>