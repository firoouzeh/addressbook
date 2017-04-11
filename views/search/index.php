<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Search Results</h3>
	</div>
	<div class="panel-body">
	<?php 
		if($viewModel && $_POST) : ?>
			<div class="alert alert-success"><?php echo count($viewModel); ?> Strings matched containing 
					"<strong><?php echo $_POST['search-term']; ?></strong>" in 
					<em>First Name</em>, <em>Last Name</em> and <em>Email</em></div>
			  <!-- Table -->
			  <table class="table">
				<tr>
					<td><h4>First Name</h4></td>
					<td><h4>Last Name</h4></td>
					<td><h4>Email</h4></td>
					<td><h4>Action</h4></td>
				</tr>
<?php		foreach($viewModel as $label => $value){
				if($value['type'] == "person"){	?>
					<tr>
						<td><?php echo $value['first_name']; ?></td>
						<td><?php echo $value['last_name']; ?></td>
						<td></td>
						<td><a href="<?php echo ROOT_PATH; ?>persons/view/<?php echo $value['id']; ?>">View</a></td>
					</tr>
<?php			}
				if($value['type'] == "email"){	?>
					<tr>
						<td></td>
						<td></td>
						<td><?php echo $value['last_name']; ?></td>
						<td><a href="<?php echo ROOT_PATH; ?>persons/view/<?php echo $value['first_name']; ?>">View</a></td>
					</tr>
<?php			}
		} ?>
			  </table>
			</div>
	<?php else : ?>
		<?php if($_POST) : ?>
		<div class="alert alert-danger">No Results Found</div>
	<?php  endif; endif	 ?>
	</div>
</div>
