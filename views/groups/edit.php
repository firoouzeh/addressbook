<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Edit Group</h3>
  </div>
  <div class="panel-body">
  	<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
        <label>Group ID</label>
        <input disabled type="text" name="id" class="form-control" value="<?php echo $_GET['id']; ?>" />
      </div>
      <div class="form-group">
        <label>Group Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $this->getName($_GET['id']) ?>" />
      </div>
  		<input class="btn btn-primary" name="submit" type="submit" value="Submit" />
  		<a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>groups">Cancel</a>
  	</form>
  </div>
</div>