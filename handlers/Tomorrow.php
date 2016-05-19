<?php
class Tomorrow extends RequestHandler {
    public function get() {
    	$weather = Tools::getWeather();
    	$weather = $weather->data;
    	
        $template = self::$Twig->loadTemplate('tomorrow.html');
        $template->display(array(
        	'weather' => $weather,
        	'weather_tomorrow' => $weather->weather[1]
	    ));
    }
}