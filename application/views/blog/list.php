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
      <span class="grey">
		<?php if(count($blogs) == 1) { ?>
			<?php echo count($blogs) ?> публикация
		<?php } elseif(count($blogs) >= 2 and count($blogs) <= 4) { ?>
			<?php echo count($blogs) ?> публикации
		<?php } else { ?>
			<?php echo count($blogs) ?> публикаций
		<?php } ?>
	  </span>
    </div>
    <div class="row">
	
		<?php $large_post = array_shift($blogs); ?>
		  <div class="post_large">
			<div class="post_photo1">
				<img src="https://aydaeda.ru/assets/img/blogs/<?php echo $large_post['image_file_1']; ?>">
			</div>
			<div class="post_text">
			  <div class="date"><span><?php echo date('d.m',$large_post['create_date']); ?></span></div>
			  <div class="header"><span><?php echo $large_post['title']; ?></span></div>
			  <div class="body"><span><?php echo $large_post['content']; ?></span></div>
			  <a href="/blogs/<?php echo $large_post['blog_id']; ?>" class="next"><span>дальше</span></a>
			</div>
		  </div> 

		<?php foreach($blogs as $blog) { ?>
		  <div class="post">
			<div class="post_photo2">
				<img src="https://aydaeda.ru/assets/img/blogs/<?php echo $blog['image_file_2']; ?>">
			</div>
			<div class="post_text">
			  <div class="date"><span><?php echo date('d.m',$blog['create_date']); ?></span></div>
			  <div class="header"><span><?php echo $blog['title']; ?></span></div>
			  <div class="body"><span><?php echo $blog['content']; ?></span></div>
			  <a href="/blogs/<?php echo $blog['blog_id']; ?>" class="next"><span>дальше</span></a>
			</div>
		  </div> 
		<?php } ?>
		
    </div>
  </div>
</body>
</html>