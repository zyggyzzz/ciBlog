<h2><?= $title; ?></h2>
<ul class="list-group">
	<?php foreach($categories as $category) : ?>
		<li class="list-gorup-item">
			<a href="<?php echo site_url('categories/posts/' . strtolower($category['name'])) ?>">
				<?php echo $category['name']; ?>
			</a>
		</li>
	<?php endforeach; ?>
</ul>
