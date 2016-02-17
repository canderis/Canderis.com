<?php
//posts.php

function processPosts($postFile){
	require_once($postFile);
	foreach ($posts as $post) :?>
		<div style="width: 100%">
			<h3>
				<span class="bracket">[</span><?php echo $post['title'];?><span class="bracket">]</span>
			</h3>
			<?php if($post['download']): ?>
				<a class="post-download" href= <?php echo '"'.$post['download'].'"';?> download ><i class="fa fa-arrow-circle-down"></i></a>
			<?php endif; ?>
		</div>
		<hr style="width: 80%;">
		<div>
			<?php if($post['icon']): ?>
				<img src= <?php echo '"'.$post['icon'].'"'; ?> alt="icon" class="post-image">
			<?php endif; ?>
			<div class="post"> <?php echo $post['desc']; ?> </div>
		</div>
		<hr style="width: 85%;">
	<?php endforeach;
}

?>