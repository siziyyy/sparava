		<?php
			if(isset($account_confirm) and $account_confirm) {
				$this->load->view('common/modal');
			}
		?>
		
		<footer>
			<div class="content_helper">
				<div class="f_block">
					<a href="/">
						<div class="f_logo sprite"></div>
					</a>
					<div class="f_socials">
						<a href="/" target="_blank" class="f_social sprite f_social_in"></a>
						<a href="/" target="_blank" class="f_social sprite f_social_fb"></a>
						<a href="/" target="_blank" class="f_social sprite f_social_vk"></a>
					</div>
				</div>
				<div class="f_block">
					<div class="f_delivery_icon sprite"></div>
					<div><a href="/information" class="f_block_link">Доставка и способы оплаты</a></div>
					<div><a href="/information#anch1" class="f_block_link">Претензии и предложения</a></div>
					<div><a href="/information#anch2" class="f_block_link">Условия доставки (договора-оферты)</a></div>
					<div class="f_block_link_foot">Минимальный заказ 1500 руб.</div>
				</div>
				<div class="f_block">
					<div class="f_block_header">Программы <br>лояльности</div>
					<div><a href="/information#anch3" class="f_block_link">Преимущества первого заказа</a></div>
					<div><a href="/information#anch4" class="f_block_link">Если вы блогер</a></div>
				</div>
				<div class="f_block">
					<div class="f_block_header">Информация <br>о нас</div>
					<div><a href="/information#anch5" class="f_block_link">О нас</a></div>
					<div><a href="/information#anch6" class="f_block_link">Отзывы о нас</a></div>
					<div><a href="/information#anch7" class="f_block_link">Контакты</a></div>
				</div>
				<div class="f_block">
					<div class="f_block_header">Поиск товара по<br>артикулу</div>
					<div class="f_block_search">
						<form method="post" action="/search">
							<input type="text" class="f_block_search_inp" name="articul">
							<button type="submit" class="f_block_search_butt">найти</button>
						</form>
					</div>
				</div>
			</div>
		</footer>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script><!-- always -->
        <script src="/assets/mdl/slick/slick.min.js"></script><!-- only index -->
        <script src="/assets/mdl/masonry/masonry.js"></script><!-- only index -->
        <script src="/assets/js/main.js"></script><!-- always -->
	</body>
</html>