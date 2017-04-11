<div class="panel panel-default">
	<a type="button" class="btn btn-primary btn-lg button-margin" aria-label="Left Align" href="<?php echo ROOT_PATH; ?>persons/add">
		<span class="glyphicon glyphicon-plus" aria-hidden="true"> Add New Person</span>
	</a>
	<div class="panel-heading">Records</div>
	<!-- Table -->
	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Actions</th>
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
				<td><?php echo $item['first_name']; ?></td>
				<td><?php echo $item['last_name']; ?></td>
				<td>
					<div class="btn-group btn-group-sm">
						<a class="btn btn-primary text-center" 
							href="<?php echo ROOT_PATH; ?>persons/view/<?php echo $item['id']; ?>">View</a>
						<a class="btn btn-primary text-center" 
							href="<?php echo ROOT_PATH; ?>persons/edit/<?php echo $item['id']; ?>">Edit</a>
						<a class="btn btn-danger text-center" 
							href="<?php echo ROOT_PATH; ?>persons/delete/<?php echo $item['id']; ?>">Delete</a>
					</div>
				</td>
			</tr>
		<?php endforeach; ?>
		<?php endif; ?>
		</tbody>
	</table>
</div>