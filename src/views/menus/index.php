<table class="table table-striped">
	<thead>
		<tr>
			<th><?= sort_table_by('title', 'Title') ?></th>
			<th># of menu items</th>
			<th>
				<a class="pull-right btn btn-primary" href="<?=  action("{$namespace}\MenuController@create") ?>">
					<i class="fa fa-plus"></i>
					New Menu
				</a>
			</th>
		</tr>
	</thead>

	<tbody>
		<?php if (!count($menus)): ?>
			<tr>
				<td colspan="5" class="text-center">No menus found</td>
			</tr>
		<?php endif ?>

		<?php foreach($menus as $menu): ?>
			<tr>
				<td><?= $menu->title ?></td>
				<td><?= count($menu->menulinks) ?></td>
				<td>
					<a href="<?= platform_route("menus.edit", [$menu->id]) ?>">
						<i class="fa fa-edit large-icon"></i>
					</a>

					<a href="<?= platform_route("menus.destroy", [$menu->id]) ?>" data-method="delete">
						<i class="fa fa-times large-icon"></i>
					</a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

<div class="text-center">
	<?= $menus->links() ?>
</div>
