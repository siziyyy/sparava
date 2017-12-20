<?php $this->load->view('common/header',$header);?>
<style>
	@media all and (max-width: 800px) {
		header {
			display: none;
		}
		.content {
			margin-top: 50px;
		}
	}
</style>
        <section class="content">
            <div class="content_helper">
                <div class="blog_header">
                    <div class="blog_header_left fl_l">Вкусный блог <a href="/" class="blog_header_left_link">Информация о поставщиках</a></div>
                    <div class="blog_header_right fl_r">
						<?php if(count($blogs) == 1) { ?>
							<?php echo count($blogs) ?> публикация
						<?php } elseif(count($blogs) >= 2 and count($blogs) <= 4) { ?>
							<?php echo count($blogs) ?> публикации
						<?php } else { ?>
							<?php echo count($blogs) ?> публикаций
						<?php } ?>					
					</div>
                    <div class="clear"></div>
                </div>
				<?php foreach($blogs as $date => $blogs_for_date) { ?>
					<div class="blog_date_sep">
					<?php $date = explode('-',$date); ?>
					<?php echo $months[$date[0]].' '.$date[1] ?>
					</div>
					<div class="blog_content">
						<?php $large_post = array_shift($blogs_for_date); ?>
						<div class="blog_item blog_wide">
							<a href="/blogs/<?php echo $large_post['blog_id']; ?>">
								<div class="blog_img" style="background: url('/assets/img/blogs/<?php echo $large_post['image_file_1']; ?>');"></div>
							</a>
							<div class="clog_date"><?php echo date('d.m',$large_post['create_date']); ?></div>
							<a href="/blogs/<?php echo $large_post['blog_id']; ?>" class="blog_name_link">
								<div class="blog_name">
									<?php echo $large_post['title']; ?>
								</div>
							</a>
							<div class="blog_text">
								<?php echo $large_post['content']; ?> 
							</div>
							<a href="/blogs/<?php echo $large_post['blog_id']; ?>" class="blog_next_link">
								<div class="blog_next">дальше</div>
							</a>
						</div>						
						
						<?php foreach($blogs_for_date as $blog) { ?>
							<div class="blog_item">
								<a href="/blogs/<?php echo $blog['blog_id']; ?>">
									<div class="blog_img" style="background: url('/assets/img/blogs/<?php echo $blog['image_file_1']; ?>');"></div>
								</a>
								<div class="clog_date"><?php echo date('d.m',$blog['create_date']); ?></div>
								<a href="/blogs/<?php echo $blog['blog_id']; ?>" class="blog_name_link">
									<div class="blog_name">
										<?php echo $blog['title']; ?>
									</div>
								</a>
								<div class="blog_text">
									<?php echo $blog['content']; ?>  
								</div>
								<a href="/blogs/<?php echo $blog['blog_id']; ?>" class="blog_next_link">
									<div class="blog_next">дальше</div>
								</a>
							</div>
						<? } ?>
						<div class="clear"></div>
					</div>
				<?php } ?>
            </div>
        </section>
<?php $this->load->view('common/footer',$footer);?>