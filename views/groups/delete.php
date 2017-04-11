<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Confirm Deletion</h3>
  </div>
  <div class="panel-body">
  	<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
        <label>Do You Want to Delete <?php echo $this->getName($_GET['id']) ?> ?</label>
      </div>
  		<input class="btn btn-danger" name="submit" type="submit" value="Yes" />
  		<a class="btn btn-success" href="<?php echo ROOT_PATH; ?>groups">No</a>
  	</form>
  </div>
</div>