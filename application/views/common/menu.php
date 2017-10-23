               <div class="c_new_menu_line index_c_new_menu">
					<?php foreach($categories_first_line as $category) { ?>
						<div class="c_new_menu_line_item fl_l">
							<a href="/category/<?php echo ( $category['seo_url'] ? $category['seo_url'] : $category['category_id'] ) ?>" class="c_new_menu_link <?php echo $category['class'] ?>"><?php echo $category['title'] ?></a>
						</div>
					<?php } ?>
                    <div class="c_new_menu_line_item c_new_menu_line_item_right fl_r">
                        <span class="c_new_menu_more">все продукты</span>
                        <span class="c_new_menu_more_icon"></span>
                    </div>
                    <div class="clear"></div>
              </div>