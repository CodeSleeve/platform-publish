<?= Form::model($menu, ['url' => $url, 'method' => $method, 'class' => 'form']) ?>

	<div class="form-group">
		<label for="title">Title</label>

		<?= Form::text('title', null, ['class' => 'form-control']) ?>

		<?= show_message_when('title', $errors) ?>
	</div>

	<h4>Menu Links</h4>

	<div class="actions">
		<?= Form::submit('Save', ['class' => 'btn btn-primary']) ?>

		<span style="padding: 0px 10px;">or</span> <a href="<?= $cancel ?>">Cancel</a>
	</div>

<?= Form::close(); ?>