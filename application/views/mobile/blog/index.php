<?php $this->load->view('mobile/common/header',$header);?>
    <div class="blog_page">
        <div class="blog_page_header">
            <!-- <div class="blog_page_avatar" style="background-image: url('/assets/img/peoples/3.jpg')"></div>
            <div class="blog_page_name">Ирина Понарошко</div> -->
        </div>
        <div class="blog_page_body">
            <div class="blog_page_body_header">Вкусный блог</div>
            <div class="blog_page_body_items">
                <?php foreach($blogs as $date => $blogs_for_date) { ?>
                    <?php foreach($blogs_for_date as $blog) { ?>
                        <a href="/blogs/<?php echo $blog['blog_id']; ?>" class="blog_page_body_item">
                            <img src="<?php echo $blog['image_file_2']; ?>" alt="" class="blog_page_body_item_img">
                        </a>
                    <?php } ?>
                <?php } ?>
            </div>
            <a href="/blogs" class="blog_page_body_show_all fl_r">все статьи <span class="blog_page_body_show_all_arrow sprite"></span></a>
            <div class="clear"></div>
            <div class="blog_page_body_header">О постащиках</div>
            <div class="blog_page_body_items">
                <?php foreach($provider_blogs as $date => $blogs_for_date) { ?>
                    <?php foreach($blogs_for_date as $blog) { ?>
                        <a href="/providers_blogs/<?php echo $blog['blog_id']; ?>" class="blog_page_body_item">
                            <img src="<?php echo $blog['image_file_2']; ?>" alt="" class="blog_page_body_item_img">
                        </a>
                    <?php } ?>
                <?php } ?>
            </div>
            <a href="/providers_blogs" class="blog_page_body_show_all fl_r">все статьи <span class="blog_page_body_show_all_arrow sprite"></span></a>
            <div class="clear"></div>
        </div>
    </div>
<?php $this->load->view('mobile/common/footer',$footer);?>