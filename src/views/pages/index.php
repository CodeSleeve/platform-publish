<table class="table table-striped">
	<thead>
		<tr>
			<th><?= sort_table_by('title', 'Title') ?></th>
			<th><?= sort_table_by('slug', 'Slug') ?></th>
			<th><?= sort_table_by('created_at', 'Created at') ?></th>
			<th><?= sort_table_by('updated_at', 'Updated at') ?></th>
			<th>
				<a class="pull-right btn btn-primary" href="<?=  platform_route("pages.create") ?>">
					<i class="fa fa-plus"></i>
					New page
				</a>
			</th>
		</tr>
	</thead>

	<tbody>
		<?php if (!count($pages)): ?>
			<tr>
				<td colspan="5" class="text-center">No Pages found</td>
			</tr>
		<?php endif ?>
		<?php foreach($pages as $page): ?>
			<tr>
				<td><?= $page->title ?></td>
				<td><?= $page->created_at ?></td>
				<td><?= $page->updated_at ?></td>
				<td>
					<a href="<?= platform_route("pages.edit", [$page->id]) ?>">
						<i class="fa fa-edit large-icon"></i>
					</a>

					<a href="<?= platform_route("pages.destroy", [$page->id]) ?>" data-method="delete">
						<i class="fa fa-times large-icon"></i>
					</a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

<div class="text-center">
	<?= $pages->links() ?>
</div>