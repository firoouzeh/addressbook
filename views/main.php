<!DOCTYPE html>
<html>
<head>
  <title>Shareboard</title>
  <link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/style.css">
  <script src="<?php echo ROOT_URL; ?>assets/js/jquery-3.2.0.min.js"></script>
<script type="text/javascript" src="<?php echo ROOT_URL; ?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo ROOT_URL; ?>assets/js/script.js"></script>
  <!-- for Multiselect functionality, including below two files -->
  <link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/bootstrap-multiselect.css" type="text/css"/>
  <script type="text/javascript" src="<?php echo ROOT_URL; ?>assets/js/bootstrap-multiselect.js"></script>
</head>
<body>
	<nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">AddressBook</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo ROOT_URL; ?>">Home</a></li>
            <li><a href="<?php echo ROOT_URL; ?>persons">Persons</a></li>
            <li><a href="<?php echo ROOT_URL; ?>groups">Groups</a></li>
            <li><a href="<?php echo ROOT_URL; ?>search/advance">Advance Search</a></li>
          </ul>
          <form method="post" action="<?php echo ROOT_PATH; ?>search" class="navbar-form pull-right" role="search">
            <div class="input-group add-on">
              <input class="form-control" placeholder="Search" name="search-term" id="search-term" type="text">
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
              </div>
            </div>
          </form>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
    <?php Messages::display(); ?>

    <div class="row">
    	<?php require($view); ?>
    </div>

    </div><!-- /.container -->
</body>
</html>