<h2><?php echo $post['title']; ?></h2>
<div class="post-body">
	<small class="post-date">
		Posted on <?php echo $post['created_at']; ?>
	</small>
	<img class="thumbnail" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
	<p><?php echo $post['body']; ?></p>
</div>

<hr>
<?php if($this->session->userdata('user_id') == $post['user_id']) :?>
	<a class="btn btn-info"
	   href="edit/<?php echo $post['slug'] ?>">Edit</a>
	<?php echo form_open('/posts/delete/' . $post['id']); ?>
		<input type="submit" value="delete" class="btn btn-danger" />
	</form>
<?php endif; ?>
<hr>
<h3>Comments</h3>
<?php if ($comments) : ?>
	<?php foreach ($comments as $comment) : ?>
		<div class="well">
			<h5><?php echo $comment['body']; ?></h5>
			[by <strong><?php echo $comment['name'] ?></strong>]
		</div>
	<?php endforeach; ?>
<?php else : ?>
	<p>No comments to display</p>
<?php endif; ?>
<hr>
<h3>Add Comment</h3>
<?php echo validation_errors(); ?>
<?php echo form_open('comments/create/' . $post['id']); //comments controller, create function ?>
	<div class="form-group">
		<label>Name</label>
		<input type="text" name="name" class="form-control"
	</div>
	<div class="form-group">
		<label>Email</label>
		<input name="email" type="text" class="form-control"
	</div>
	<div class="form-group">
		<label>Body</label>
		<textarea name="body" class="form-control" cols="30" rows="10"></textarea>
	</div>
	<input type="hidden" name="slug" value="<?php echo $post['slug'] ?>">
	<button class="btn btn-primary" type="submit">Submit</button>
<?php echo form_close(); ?>
