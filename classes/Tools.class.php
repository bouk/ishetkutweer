<?php
class Tools {
    public static function getWeather() {
        $query = $_SERVER['REMOTE_ADDR'];
        $url = "http://free.worldweatheronline.com/feed/weather.ashx?key=%s&num_of_days=2&q=%s&format=json";
        $url = sprintf($url, WORLD_WEATHER_APIKEY, $query);

        $data = null;
        if(function_exists('apc_fetch')) {
            $data = apc_fetch('ishetkutweer_'.$query);
            if (!$data) {
                $data = self::getUrlContents($url);
                apc_add('ishetkutweer_'.$query, $data, 3600);
            }
        } else {
            $data = self::getUrlContents($url);
        }
        return json_decode($data);
    }

    public static function getUrlContents($url){
        $crl = curl_init();
        $timeout = 5;
        curl_setopt ($crl, CURLOPT_URL,$url);
        curl_setopt ($crl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
        $ret = curl_exec($crl);
        curl_close($crl);
        return $ret;
    }
}
