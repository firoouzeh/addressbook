<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Add New Person</h3>
	</div>
	<div class="panel-body">
		<div class="controls">
			<form id="personAdd" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
				<div class="form-group col-xs-12">
					<div class="col-xs-8">
						<label>First Name</label>
						<input type="text" name="firstName" class="form-control" />
					</div>
				</div>
				<div class="form-group col-xs-12">
					<div class="col-xs-8">
						<label>Last Name</label>
						<input type="text" name="lastName" class="form-control" />
					</div>
				</div>
				<div class="form-group col-xs-12">
					<div class="appendEmail form-group col-xs-12">
						<label>Email</label>
						<div class="emailClass input-group col-xs-8" id="fields">
							<input type="text" name="emails[]" class="form-control" placeholder="Email" />
							<span class="input-group-btn">
								<button class="btn btn-success btn-email" type="button">
									<span class="glyphicon glyphicon-plus"> add</span>
								</button>
							</span>
						</div>
					</div>
				</div>
				<div class="form-group col-xs-12">
					<div class="appendNumber form-group col-xs-12">
						<label>Number</label>
						<div class="numberClass input-group col-xs-8" id="fields">
							<input type="text" name="numbers[]" class="form-control" placeholder="Number" />
							<span class="input-group-btn">
								<button class="btn btn-success btn-number" type="button">
									<span class="glyphicon glyphicon-plus"> add</span>
								</button>
							</span>
						</div>
					</div>
				</div>
				<div class="form-group col-xs-12">
					<div class="appendAddress form-group col-xs-12">
						<label>Address</label>
						<div class="addressClass input-group col-xs-8" id="fields">
							<input type="text" name="addresses[]" class="form-control" placeholder="Address" />
							<span class="input-group-btn">
								<button class="btn btn-success btn-address" type="button">
									<span class="glyphicon glyphicon-plus"> add</span>
								</button>
							</span>
						</div>
					</div>
				</div>

				<div class="form-group col-xs-12">
					<div class="col-xs-8">
						<label>Groups</label><br />
						<select id="group-select" name="groups[]" multiple="multiple">
						<?php foreach($viewModel as $opt): ?>
						    <option value="<?php echo $opt['id'] ?>"><?php echo $opt['name'] ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>

				<div class="form-group col-xs-12">
					<input class="btn btn-primary" name="submit" type="submit" value="Submit" />
					<a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>groups">Cancel</a>
				</div>
			</form>
		</div>
	</div>
</div>
