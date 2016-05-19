<?php
class FrontPage extends RequestHandler {
    public function get() {
    	$weather = Tools::getWeather();
    	$weather = $weather->data;
    	
        $template = self::$Twig->loadTemplate('frontpage.html');
        $template->display(array(
        	'weather' => $weather,
        	'current_condition' => $weather->current_condition[0]
	    ));
    }
}