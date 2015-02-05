<?php


//load the required classes
require("classes/basecontroller.php");  
require("classes/basemodel.php");
require("classes/view.php");
require("classes/loader.php");
require("classes/utils/commonutils.php");
require_once dirname(__FILE__).'/log4php/php/Logger.php';
Logger::configure(dirname(__FILE__).'/log4php/resources/appender_rollingfile.properties');

$logger = Logger::getRootLogger();

$loader = new Loader(); //create the loader object
$controller = $loader->createController(); //creates the requested controller object based on the 'controller' URL value
$controller->executeAction(); //execute the requested controller's requested method based on the 'action' URL value. Controller methods output a View.

?>