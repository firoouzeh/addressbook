<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Advance Search</h3>
	</div>
	<div class="panel-body">
		<form id="search1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div class="form-group col-xs-12">
				<div class="col-xs-5">
					<label>First Name</label>
					<input type="text" name="firstName" class="form-control" />
				</div>
				<div class="col-xs-5">
					<label>Last Name</label>
					<input type="text" name="lastName" class="form-control" />
				</div>
				<div class="form-group col-xs-2"><br />
					<input class="btn btn-primary" name="submit" type="submit" value="Search Name" />
				</div>
			</div>
		</form>
		<form id="search2" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div class="form-group col-xs-12">
				<div class="col-xs-10">
					<label>Email</label>
					<input type="text" name="email" class="form-control" />
				</div>
				<div class="form-group col-xs-2"><br />
					<input class="btn btn-success" name="submit" type="submit" value="Search Email" />
				</div>
			</div>
		</form>
		<div class="form-group col-xs-12">
			<div class="form-group col-xs-12"><br />
				<h3 class="panel-title">Search Results</h3><br />

			<table class="table">

			<?php 
			if($viewModel) :
				if(isset($viewModel[0]['email'])) : ?>
					<tr>
						<td><h4>Email</h4></td>
						<td><h4>Action</h4></td>
					</tr>
			<?php	foreach($viewModel AS $label => $value) : ?>
					<tr>
						<td><?php echo $value['email']; ?></td>
						<td><a class="btn btn-default" href="<?php echo ROOT_PATH; ?>persons/view/<?php echo $value['person_id']; ?>">View</a></td>
					</tr>
			<?php	endforeach; ?>
			<?	endif;
				if(isset($viewModel[0]['id'])) : ?>
					<tr>
						<td><h4>First Name</h4></td>
						<td><h4>Last Name</h4></td>
						<td><h4>Action</h4></td>
					</tr>
			<?php	foreach($viewModel AS $label => $value) : ?>
					<tr>
						<td><?php echo $value['first_name']; ?></td>
						<td><?php echo $value['last_name']; ?></td>
						<td><a class="btn btn-default" href="<?php echo ROOT_PATH; ?>persons/view/<?php echo $value['id']; ?>">View</a></td>
					</tr>
			<?php	endforeach; ?>
		<?php 	endif; ?>
		<?php else : ?>
			<div class="alert alert-danger">No Results Found</div>
	<?php	endif;	 ?>
			</table>
			</div>
		</div>
	</div>
</div>
