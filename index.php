<?php 

require_once __DIR__.'/vendor/autoload.php';

use InternetRepublic\OpenWeatherApi;

$test = new OpenWeatherApi('https://api.openweathermap.org/data/2.5/weather',array('q'=>'Madrid'),'c0811bf2a589e689c02befea54652e19');

$test->printDataTable();
