                <div class="content">
                    <?php if($account) { ?>
                        <div class="item_page_comms_add_comm">
                            <form>
                                <textarea class="item_page_comms_add_comm_textarea comment_content" placeholder="отзыв"></textarea>
                                <button class="item_page_add_comm send" data-type="add_product_comment">добавить</button>
                            </form>
                        </div>
                    <?php } else { ?>
                        <div class="item_page_comms_sign_in_please">
                            Чтобы добавить отзыв, Вы должны <a href="/account" class="item_page_comms_sign_in_please_link">авторизоваться</a> на сайте.
                        </div>
                    <?php } ?>

                    <?php if(isset($comments)) { ?>
                        <?php foreach($comments as $comment) { ?>
                            <div class="item_page_one_comm">
                                <div class="item_page_one_comm_img fl_l"><?php echo mb_strtoupper(mb_substr($comment['account']['name'], 0, 1, 'UTF-8'),'UTF-8') ?></div>
                                <div class="item_page_one_comm_name_text fl_l">
                                    <div class="item_page_one_comm_name"><?php echo $comment['account']['name'] ?></div>
                                    <div class="item_page_one_comm_text">
                                        <?php echo $comment['content'] ?> 
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>