<?php
date_default_timezone_set('America/Bogota');
error_reporting(E_ALL); // Error/Exception engine, always use E_ALL

ini_set('ignore_repeated_errors', TRUE); // always use TRUE

ini_set('display_errors', FALSE); // Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment

ini_set('log_errors', TRUE); // Error/Exception file logging engine.

ini_set("error_log", "./php-error.log");
error_log( "Sytem Start, errors!" );

require_once'app/DB.php';

require_once'app/controller.php';
require_once'app/view.php';
require_once'app/model.php';
require_once'app/app.php';

require_once'Config/config.php';

require_once'class/session.php';
require_once'class/sessioncontroller.php';
require_once'class/errormessages.php';
require_once'class/successmessages.php';
$app = new App();

?>