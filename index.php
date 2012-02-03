<?php
/* Config and utils */
require_once 'include/config.php';

/* Routing */
require_once 'lib/Router.class.php';

/* Skiff itself */
require_once 'Skiff.class.php';

$routes = array(
	"#^$app_url/(.*)/?$#" => 'Skiff::displayList',
	"#^$app_url/?$#" => 'Skiff::displayHome'
);

Router::routeURI($routes, 'Skiff::display404');
?>
