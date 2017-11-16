<?php $this->load->view('common/header',$header);?>
        <div class="contacts_bg_helper"></div>
        <section class="content contacts_content">
            <div class="content_helper">
                <div class="c_cart" id="fullpage">
					<?php if($first_block) { ?>
						<?php $this->load->view('information/'.$first_block); ?>
					<?php } ?>
					
					<?php foreach($blocks as $block) { ?>
						<?php if($first_block == $block) { ?>
							<?php continue; ?>
						<?php } ?>
					
						<?php $this->load->view('information/'.$block); ?>
					<?php } ?>
                </div>
            </div>
        </section>
<?php $this->load->view('common/footer',$footer);?>