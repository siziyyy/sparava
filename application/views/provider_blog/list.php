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
                    <div class="blog_header_left fl_l"><a href="/blogs" class="blog_header_left_link">Вкусный блог</a> Информация о поставщиках</div>
                    <div class="blog_header_right fl_r">
						<?php echo $counter ?>					
					</div>
                    <div class="clear"></div>
                </div>
				<?php foreach($blogs as $date => $blogs_for_date) { ?>
					<div class="blog_date_sep">
					<?php $date = explode('-',$date); ?>
					<?php echo $months[(int)$date[0]].' '.(int)$date[1] ?>
					</div>
					<div class="blog_content">
						<?php if(false) { ?>
						<?php $large_post = array_shift($blogs_for_date); ?>
						<div class="blog_item">
							<a href="/providers_blogs/<?php echo $large_post['blog_id']; ?>">
								<div class="blog_img" style="background: url('/assets/img/providers_blogs/<?php echo $large_post['image_file_1']; ?>');"></div>
							</a>
							<div class="clog_date"><?php echo date('d.m',$large_post['create_date']); ?></div>
							<a href="/providers_blogs/<?php echo $large_post['blog_id']; ?>" class="blog_name_link">
								<div class="blog_name">
									<?php echo $large_post['title']; ?>
								</div>
							</a>
							<div class="blog_text">
								<?php echo $large_post['content']; ?> 
							</div>
							<a href="/providers_blogs/<?php echo $large_post['blog_id']; ?>" class="blog_next_link">
								<div class="blog_next">дальше</div>
							</a>
						</div>						
						<?php } ?>
						
						<?php foreach($blogs_for_date as $blog) { ?>
							<div class="blog_item">
								<a href="/providers_blogs/<?php echo $blog['blog_id']; ?>">
									<div class="blog_img">
										<img src="<?php echo $blog['image_file_2']; ?>" class="blog_img_img">
									</div>
								</a>
								<div class="clog_date"><?php echo date('d.m',$blog['create_date']); ?></div>
								<a href="/providers_blogs/<?php echo $blog['blog_id']; ?>" class="blog_name_link">
									<div class="blog_name">
										<div class="blog_name_1_line">
											<?php echo $blog['title_1']; ?>
										</div>
										<div class="blog_name_2_line">
											<?php echo $blog['title_2']; ?>
										</div>
									</div>
								</a>
								<div class="blog_text">
									<?php echo $blog['content']; ?>  
								</div>
								<a href="/providers_blogs/<?php echo $blog['blog_id']; ?>" class="blog_next_link">
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