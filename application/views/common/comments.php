<!--<div class="comments_header">
    <a class="comments_header_sec">Рекомендация от Aydaeda</a>
    <span class="comments_header_sep">|</span>
    <a class="comments_header_sec comments_header_active">Отзывы к данному товару</a>
    <?php if(!$account) { ?>
        <span class="comments_header_desc">Чтобы добавить отзыв, Вы должны <a href="/" class="comments_header_link login_from_comment">авторизоваться</a> на сайте.</span>
    <?php } ?>
</div>
<?php if(!isset($comments)) { ?> 
    <div class="no_comments">К данному товару не добавлено отзывов</div>
<?php } ?>
<?php if($account) { ?>
<div class="add_comment">
    <div class="comment_photo fl_l" style="background: #009933;"><?php echo mb_strtoupper(mb_substr($account['name'], 0, 1, 'UTF-8'),'UTF-8') ?></div>
    <textarea class="add_new_comm fl_l comment_content"></textarea>
    <button class="add_new_comm_butt fl_l send" data-type="add_product_comment">добавить отзыв</button>
    <div class="clear"></div>
</div>
<?php } ?>
<?php if(isset($comments)) { ?>    
    <?php foreach($comments as $comment) { ?>  
        <div class="comment">
            <div class="comment_photo fl_l" style="background: #4994D1;"><?php echo mb_strtoupper(mb_substr($comment['account']['name'], 0, 1, 'UTF-8'),'UTF-8') ?></div>
            <div class="comment_desc fl_l">
                <div class="comment_name"><?php echo $comment['account']['name'] ?></div>
                <div class="comment_text"><?php echo $comment['content'] ?></div>
            </div>
            <div class="clear"></div>
        </div>
    <?php } ?>
<?php } ?>-->
<div class="comments_header">
    <a class="comments_header_sec comments_header_active">Рекомендация от Aydaeda</a>
    <span class="comments_header_sep">|</span>
    <a class="comments_header_sec">Отзывы к данному товару</a>
</div>
<div class="recomendations_in_commets">
    <div class="goods">
        <?php foreach($products as $product) { ?>
            <?php $info['product'] = $product; ?>
            <?php $this->load->view('common/load-product',$info);?>                 
        <?php } ?>
        
        <?php if($empty_products) { ?>
            <?php for($i=0;$i<$empty_products;$i++) { ?>
                <div class="g_good fl_l hide_on_mobile">&nbsp;</div>
            <?php } ?>
        <?php } ?>
        <div id="wrapper_for_product_load"></div>
        <div class="clear"></div>
    </div>
</div>