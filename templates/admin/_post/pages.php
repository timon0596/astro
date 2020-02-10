<?php
//echo $id;
$post = Post::get($id);

//print_r( $post );

?>
<div>
	<p>Заголовок</p>
	<input type="text" name="title" value="<?php echo $post['title'];?>">
</div>
<div>
	<p>Изображение</p>
	<p><?php echo $post['img'];?></p>
	<p><input type="radio" name="load" value="1" checked> Существующее изображение</p>
	<div>
		<?php
			$list = Media::getList('image');
			//print_r( $list );
			foreach ($list as $id => $item):
			?>
				<input type="radio" name="id" value="<?php echo $id; ?>">
				<img src="<?php echo $item['src'] . $item['name']; ?>" alt="">
			<?php
			endforeach;
		?>
	</div>
	<p><input type="radio" name="load" value="1"> Изображение с компьютера</p>
	<p><input type="file" name="img"></p>
</div>
<div>
	<p>Контент</p>
	<textarea name="content"><?php echo $post['content'];?></textarea>
</div>
<div>
	<p>Дата</p>
	<input type="date" name="date" value="<?php echo $post['date'];?>">
</div>