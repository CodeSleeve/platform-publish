<?= Form::model($page, ['url' => $url, 'method' => $method, 'class' => 'form']) ?>

	<div class="form-group">
		<label for="title">Title</label>

		<?= Form::text('title', null, ['class' => 'form-control']) ?>

		<?= show_message_when('title', $errors) ?>
	</div>

	<div class="form-group">
		<label for="slug">Slug</label>

		<?= Form::text('slug', null, ['class' => 'form-control']) ?>

		<?= show_message_when('slug', $errors) ?>
	</div>

	<div class="form-group">
		<label for="home_page">Set as home page?</label>

		<?= Form::checkbox("home_page") ?>

		<?= show_message_when('home_page', $errors) ?>
	</div>

	<div class="form-group">
		<label for="content">Content</label>

		<?= Form::textarea('content', null, ['class' => 'form-control']) ?>

		<?= show_message_when('title', $errors) ?>
	</div>

	<div class="actions">
		<?= Form::submit('Save', ['class' => 'btn btn-primary']) ?>

		<span style="padding: 0px 10px;">or</span> <a href="<?= $cancel ?>">Cancel</a>
	</div>

<?= Form::close(); ?>