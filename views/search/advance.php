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
					<input class="btn btn-success" name="submitName" type="submit" value="Search" />
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
					<input class="btn btn-success" name="submitEmail" type="submit" value="Search" />
				</div>
			</div>
		</form>
		<div class="form-group col-xs-12">
			<div class="form-group col-xs-12"><br />
				<?php if($_POST) : ?>
					
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
