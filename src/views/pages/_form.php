<?= Form::model($page, ['url' => $url, 'method' => $method, 'class' => 'form', 'id' => 'platform-wysiwyg-form']) ?>

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
		<label for="layout">Layout Page</label>

		<?= Form::select('layout', $page->layouts, $page->layout, ['class' => 'form-control']) ?>

		<?= show_message_when('layout', $errors) ?>
	</div>

	<div class="form-group">
		<label for="content">Content</label>

		<?= render('platform-publish::wysiwyg', ['name' => 'content', 'body' => $page->content]) ?>

		<?= show_message_when('content', $errors) ?>
	</div>

	<div class="actions">
		<?= Form::submit('Save', ['class' => 'btn btn-danger platform-form-submit-btn']) ?>

		<span style="padding: 0px 10px;">or</span> <a href="<?= $cancel ?>">Cancel</a>
	</div>

<?= Form::close(); ?>