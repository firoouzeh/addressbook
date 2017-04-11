<div class="panel panel-default">
	<a type="button" class="btn btn-primary btn-lg button-margin" aria-label="Left Align" href="<?php echo ROOT_PATH; ?>groups/create">
		<span class="glyphicon glyphicon-plus" aria-hidden="true"> Create Group</span>
	</a>
	</a>
	<div class="panel-heading">Records</div>
	<!-- Table -->
	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>ID</th>
				<th>Group Name</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>

		<?php
			if(!empty($viewModel)):
				$i = 1;
				foreach($viewModel as $item): ?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $item['id']; ?></td>
						<td><?php echo $item['name']; ?></td>
						<td>
							<div class="btn-group btn-group-sm">
								<a class="btn btn-default text-center" href="<?php echo ROOT_PATH; ?>groups/edit/<?php echo $item['id']; ?>">Edit Group</a>
								<a class="btn btn-default text-center" href="<?php echo ROOT_PATH; ?>groups/view/<?php echo $item['id']; ?>">View Members</a>
								<a class="btn btn-danger text-center" href="<?php echo ROOT_PATH; ?>groups/delete/<?php echo $item['id']; ?>">Delete Group</a>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
		<?php endif; ?>
		</tbody>
	</table>
</div>