<?= to_javascript(['Platform.data' => $menu]) ?>

<?= Form::model($menu, ['url' => $url, 'method' => $method, 'class' => 'form', 'ng-controller' => 'Platform.MenulinkController']) ?>

	<div class="form-group">
		<label for="title">Title</label>

		<?= Form::text('title', null, ['class' => 'form-control']) ?>

		<?= show_message_when('title', $errors) ?>
	</div>

	<h4>Menu Links <small>(<a href="#" ng-click="add()"><i class="fa fa-plus"></i></a>)</small></h4>

	<div class="form-group row" ng-repeat="menulink in menulinks track by $index">
		<input type="hidden" name="menulinks[{{$index}}][id]" value="{{menulink.id}}">
		<div class="col-md-3">
			<input type="text" name="menulinks[{{$index}}][title]" class="form-control" placeholder="Link title" value="{{menulink.title}}">
		</div>
		<div class="col-md-9">
			<div class="input-group">
				<input type="text" name="menulinks[{{$index}}][url]" class="form-control" placeholder="Link url (http://...)" value="{{menulink.url}}">
				<span ng-click="remove($index)" class="input-group-addon"><i class="fa fa-times"></i></span>
			</div>
		</div>
	</div>

	<?= show_message_when('permissions[]', $errors) ?>

	<div class="actions">
		<?= Form::submit('Save', ['class' => 'btn btn-primary']) ?>

		<span style="padding: 0px 10px;">or</span> <a href="<?= $cancel ?>">Cancel</a>
	</div>

<?= Form::close(); ?>