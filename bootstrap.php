<?php
require ROOT.'/constants.php';

$paths = array(
	array('/', 'FrontPage'),
	array('/morgen', 'Tomorrow')
);
Webapp::start($paths);
