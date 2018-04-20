<?php $this->load->view('mobile/common/header',$header);?>
        <div class="blog_posts_page">
            <?php foreach($blogs as $date => $blogs_for_date) { ?>
                <?php foreach($blogs_for_date as $blog) { ?>
                    <a href="/blogs/<?php echo $blog['blog_id']; ?>" class="blog_posts_page_item">
                        <div class="content">
                            <img src="/assets/img/blog/1.jpg" alt="" class="blog_page_body_item_img">
                            <div class="blog_posts_page_date"><?php echo date('d.m',$blog['create_date']); ?></div>
                            <div class="blog_posts_page_name"><?php echo $blog['title_1']; ?> <?php echo $blog['title_2']; ?></div>
                            <div class="blog_posts_page_text">
                                <?php echo $this->baselib->text_limiter($blog['content'],100) ?><span class="blog_page_body_show_all_arrow sprite"></span>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            <?php } ?>
        </div>
<?php $this->load->view('mobile/common/footer',$footer);?>