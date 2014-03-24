<h3>
	<i class="fa fa-plus"></i>
	Creating menu
</h3><hr>

<?= render("platform-publish::menus._form", [
	'menu' => $menu,
	'url' => platform_route("menus.store"),
	'method' => 'POST',
	'cancel' => platform_route("menus.index")
]) ?>