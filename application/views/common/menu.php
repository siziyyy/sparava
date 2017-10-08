				<div class="c_menu">
					<?php foreach($categories_first_line as $category) { ?>
						<?php 						
							if($category['current_category']) { 
								$current_class = 'c_current_menu_link';
								
								if(isset($category['childs']) and !isset($childs)) {
									$childs = $category['childs'];
								}
							} else {
								$current_class = '';
							}
						?>
					
						<a href="/category/<?php echo ( $category['seo_url'] ? $category['seo_url'] : $category['category_id'] ) ?>" class="c_menu_link <?php echo $category['class'] ?> <?php echo $current_class ?>"><?php echo $category['title'] ?></a>
					<?php } ?>
                    <a class="c_menu_more">Еще <span class="c_menu_more_span sprite"></span></a>            
                </div>
                <div class="c_menu c_menu_secondary c_menu_hidden">
					<?php foreach($categories_second_line as $category) { ?>
						<?php
							if($category['current_category']) { 
								$current_class = 'c_current_menu_link';
								
								if(isset($category['childs']) and !isset($childs)) {
									$childs = $category['childs'];
								}
							} else {
								$current_class = '';
							}
						?>
						
						<a href="/category/<?php echo ( $category['seo_url'] ? $category['seo_url'] : $category['category_id'] ) ?>" class="c_menu_link <?php echo $category['class'] ?> <?php echo $current_class ?>"><?php echo $category['title'] ?></a>
					<?php } ?>
                </div>
				<?php if(isset($childs)) { ?>
					<div class="c_subcat_menu">
						<?php ksort($childs); ?>
						<?php foreach($childs as $child) { ?>
							<a href="/category/<?php echo ( $child['seo_url'] ? $child['seo_url'] : $child['category_id'] ) ?>" class="c_subcat_menu_link <?php echo ( $child['current_category'] ? 'c_current_subcat_link' : '' ) ?>"><?php echo $child['title'] ?></a>
						<?php } ?>
					</div>
				<?php } ?>