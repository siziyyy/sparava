		<?php
			if(isset($account_confirm) and $account_confirm) {
				$this->load->view('common/modal');
			}
		?>
		<iframe src="https://admin.aydaeda.ru/main/iframe" height="1" width="1" name="admin"></iframe>
		<footer>
			<div class="content_helper">
				<div class="f_block">
					<div class="f_logo_uzor_ept">
							<img src="/assets/img/uzir.png" alt="aydaeda">
					</div>
					<a href="/">
						<div class="f_logo_image">
							<img src="/assets/img/h_logo.png" alt="aydaeda" style="width: 195px;">
						</div>
					</a>
					<!--<div class="f_block_search_header">Поиск товара по артикулу</div>
					<div class="f_block_search">
						<form method="post" action="/search">
							<input type="text" class="f_block_search_inp" name="value">
							<button type="submit" class="f_block_search_butt">найти</button>
						</form>
					</div>-->
				</div>
				<div class="f_block">
					<div class="f_block_header">Доставка, гарантия<br>качества, обмен, возврат </div>
					<div><a href="/information/delivery" class="f_block_link">Доставка и способы оплаты</a></div>
					<div><a href="/information/return" class="f_block_link">Прием заказа, обмен и возврат</a></div>
					<div><a href="/information/guarantee" class="f_block_link">Гарантия качества</a></div>
				</div>
				<div class="f_block">
					<div class="f_block_header">Программы <br>лояльности</div>
					<div><a href="/information/first" class="f_block_link">Преимущества первого заказа</a></div>
					<div><a href="/information/bonus" class="f_block_link">Бонусная система</a></div>
					<div><a href="/information/claims" class="f_block_link">Претензии и предложения</a></div>
					<div><a href="/information/agreement" class="f_block_link">Публичная оферта</a></div>
				</div>
				<div class="f_block">
					<div class="f_block_header">Информация <br>о нас</div>
					<div><a href="/information/about" class="f_block_link">О нас</a></div>
					<div><a href="/information/testimonials" class="f_block_link">Отзывы о нас</a></div>
					<div><a href="/information/contacts" class="f_block_link">Контакты</a></div>
				</div>
				<div class="f_block">
					<div class="f_block_header">Сотрудничество <br>и работа</div>
					<div><a href="/information/caterer" class="f_block_link">Поставщики</a></div>
					<div><a href="/information/vacancy" class="f_block_link">Работы</a></div>
					<div><a href="/information/bloger" class="f_block_link">Блогерам</a></div>
				</div>
				<!--<div class="f_block">
					<div class="f_block_header">Поиск товара по<br>артикулу</div>
					<div class="f_block_search">
						<form method="post" action="/search">
							<input type="text" class="f_block_search_inp" name="articul">
							<button type="submit" class="f_block_search_butt">найти</button>
						</form>
					</div>
				</div>-->
			</div>
		</footer>
		
		<?php $this->load->view("common/youtube"); ?>	
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script><!-- always -->
        <script src="/assets/mdl/slick/slick.min.js"></script><!-- only index -->
        <script src="/assets/mdl/masonry/masonry.js"></script><!-- only index -->
        <script src="/assets/mdl/scroll/jquery.scrollbar.min.js"></script>
        <script src="/assets/js/main.js"></script>
        <script>
		    $(document).ready(function() {
		        <?php if(isset($videos)) { ?>
		          <?php foreach($videos as $video) { ?>
		          	  load_youtube_data('<?php echo $video ?>');
		          <?php } ?>
		        <?php } ?>
		    });
		</script>        
	</body>
</html>
