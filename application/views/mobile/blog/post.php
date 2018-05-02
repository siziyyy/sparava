<?php $this->load->view('mobile/common/header',$header);?>
        <div class="blog_posts_page blog_single_post">
            <a href="/blogs?type=m" class="item_page_back sprite"></a>
            <div class="blog_posts_page_item">
                <div class="content">
                    <img src="<?php echo $blogs['image_file_3']; ?>" alt="" class="blog_page_body_item_img">
                    <div class="blog_posts_page_date"><?php echo date('d.m',$blogs['create_date']); ?></div>
                    <div class="blog_posts_page_name"><?php echo $blogs['title_1']; ?>&nbsp;<?php echo $blogs['title_2']; ?></div>
                    <div class="blog_posts_page_text">
                        <?php echo $blogs['content'] ?>
                    </div>
                    <?php if(isset($price)) { ?>
                        <a href="/product/<?php echo $blogs['linked_product_id']; ?>" class="filters_button">Купить этот товар</a>
                    <?php } ?>
                </div>
            </div>
        </div>
<?php $this->load->view('mobile/common/footer',$footer);?>