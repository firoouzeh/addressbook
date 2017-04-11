<?php
//Start Session
session_start();

//include config file(s)
require('libs/config.php');

require('libs/Bootstrap.php');
require('libs/Controller.php');
require('libs/Model.php');
require('libs/Messages.php');

require('controllers/home.php');
require('controllers/persons.php');
require('controllers/groups.php');
require('controllers/Search.php');

require('models/home.php');
require('models/person.php');
require('models/group.php');
require('models/search.php');

$bootstrap = new Bootstrap($_GET);	//requests comes in the form of GET method from URLs.
$controller = $bootstrap->createController();

if($controller){
	$controller->executeAction();
}
