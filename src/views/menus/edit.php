<h3>
	<i class="fa fa-edit"></i> Editing menu
</h3><hr>

<?= render("platform-publish::menus._form", [
	'menu' => $menu,
	'url' => platform_route("menus.update", [$menu->id]),
	'method' => 'PUT',
	'cancel' => platform_route("menus.index")
]) ?>