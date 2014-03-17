<h3>
	<i class="fa fa-edit"></i>
	Editing page
</h3><hr>

<?= render("platform-publish::pages._form", [
	'page' => $page,
	'url' => platform_route('pages.update', [$page->id]),
	'method' => 'PUT',
	'cancel' => platform_route('pages.index')
]) ?>