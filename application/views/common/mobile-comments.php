<div class="reviews_line">
    <div class="reviews_line_header">Отзывы к данному товару</div>
    <?php if($account) { ?>
        <div class="add_review">
            <textarea class="add_review_area comment_content"></textarea>
            <button class="add_review_button send" data-type="add_product_comment">добавить отзыв</button>
        </div>
    <?php } else { ?>        
        <div class="reviews_line_subheader">
            Чтобы добавить отзыв, Вы должны 
            <span class="reviews_line_subheader_link">авторизоваться</span> на сайте.
        </div>
    <?php } ?>
</div>
<?php if(isset($comments)) { ?>
    <?php foreach($comments as $comment) { ?>    
        <div class="reviews_line">
            <div class="reviews_line_header"><?php echo $comment['account']['name'] ?></div>
            <div class="reviews_line_body"><?php echo $comment['content'] ?></div>
        </div>
    <?php } ?>
<?php } ?>    