<?php $this->load->view('common/header',$header);?>
        <section class="content">
            <div class="content_helper">
                <div class="blog_header">
                    <div class="blog_header_left fl_l">Вкусный блог</div>
                    <div class="clear"></div>
                </div>
                <a href="/blogs/" class="blog_date_sep fl_l"><span class="blog_date_sep_arrow">←</span>назад ко всем постам</a>
                <div class="blog_date_sep_inner fl_r"><?php echo date('d.m',$blogs['create_date']); ?></div>
                <div class="clear"></div>
                <div class="blog_post">
                    <div class="blog_post_left fl_l">
                        <div class="post_img" style="background: url('/assets/img/blogs/<?php echo $blogs['image_file_3']; ?>');"></div>
                    </div>
                    <div class="blog_post_right fl_l">
                        <div class="post_right_header">
                            <div class="post_header_name fl_l"><?php echo $blogs['title']; ?></span></div>
                            <a class="post_header_share fl_r">поделиться<span class="post_share_img"></span></a>
                            <div class="clear"></div>
                        </div>
                        <div class="post_text">
                            <?php echo $blogs['content']; ?>
                        </div>
						<?php if(isset($price)) { ?>
							<form action="/search/" method="post"> 
								<input type="hidden" value="<?php echo $blogs['linked_product_id']; ?>" name="articul">
								<button type="submit" class="buy_this_stuff">Купить этот товар у нас за <?php echo $price ?> руб.</button>
							</form>
						<?php } ?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </section>
<?php $this->load->view('common/footer',$footer);?>