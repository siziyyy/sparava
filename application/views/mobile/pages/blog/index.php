<?php include '../../parts/_header.php'; ?>
    <div class="blog_page">
        <div class="blog_page_header">
            <div class="blog_page_avatar" style="background-image: url('/assets/img/peoples/3.jpg')"></div>
            <div class="blog_page_name">Ирина Понарошко</div>
        </div>
        <div class="blog_page_body">
            <div class="blog_page_body_header">Вкусный блог</div>
            <div class="blog_page_body_items">
                <?php for ($i=0; $i < 15; $i++) { ?>
                    <a href="/pages/blog/post/" class="blog_page_body_item">
                        <img src="/assets/img/blog/1.jpg" alt="" class="blog_page_body_item_img">
                    </a>
                <?php } ?>
            </div>
            <a href="/pages/blog/posts/" class="blog_page_body_show_all fl_r">все статьи <span class="blog_page_body_show_all_arrow sprite"></span></a>
            <div class="clear"></div>
            <div class="blog_page_body_header">О постащиках</div>
            <div class="blog_page_body_items">
                <?php for ($i=0; $i < 15; $i++) { ?>
                    <a href="/pages/blog/post/" class="blog_page_body_item">
                        <img src="/assets/img/blog/2.jpg" alt="" class="blog_page_body_item_img">
                    </a>
                <?php } ?>
            </div>
            <a href="/pages/blog/posts/" class="blog_page_body_show_all fl_r">все статьи <span class="blog_page_body_show_all_arrow sprite"></span></a>
            <div class="clear"></div>
        </div>
    </div>
<?php include '../../parts/_footer.php'; ?>