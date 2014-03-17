<h3>
	<i class="fa fa-plus"></i>
	Creating Page
</h3><hr>

<?= render("platform-publish::pages._form", [
	'page' => $page,
	'url' => platform_route("pages.store"),
	'method' => 'POST',
	'cancel' => platform_route("pages.index")
]) ?>