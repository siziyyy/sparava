<!DOCTYPE html>
<html lang="ru">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
  <title>Document</title>

  <link rel="stylesheet" href="/assets/css/blog.css">
</head>
<body>
  <div class="wrapper">

    <div class="menu">
      <ul class="nav">
        <li class="item1">ай да еда</li>
        <li class="item2">наш вкусный блог</li>
        <li class="item3"> вся информация</li>
        <li class="item4">8 800 450 10 25</li>
        <li class="item5">8 495 541 20 20</li>
        <li class="item6">
          <div class="cart"></div>
          <div class="text"><a href="#">корзина пуста</a></div>
        </li>
      </ul>
    </div>

    <div class="add_info">
      <span class="green">Вкусый блог</span>
    </div>
    <div class="navigation">
      <a href="/blogs/">
      <div class="arrow"></div>
      <span class="back">назад ко всем блогам</span> 
      </a>
      <span class="date"><?php echo date('d.m',$blogs['create_date']); ?></span>
    </div>
    <div class="post_full">
      <div class="post_image">
		<img src="https://aydaeda.ru/assets/img/blogs/<?php echo $blogs['image_file_3']; ?>">
	  </div>
      <div class="post_text">
        <div class="header">
          <span class="h"><?php echo $blogs['title']; ?></span>
          <a href="#">
          <span class="share_button"></span>
          <span class="share_text">поделиться</span>
          </a>
        </div>
        <span class="body"><?php echo $blogs['content']; ?></span>
		<?php if(isset($price)) { ?>
		<form action="/search/" method="post"> 
			<input type="hidden" value="<?php echo $blogs['linked_product_id']; ?>" name="articul">
			<input type="submit" class="button" value="Купить у нас товар у нас за <?php echo $price ?> руб.">
		</form>
		<?php } ?>
		<br><br><br><br><br>
      </div>
    </div>

  </div>
</body>
</html>