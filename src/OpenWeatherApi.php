<?php

namespace InternetRepublic;

use InternetRepublic\OpenWeather\OutputHandler;
use InternetRepublic\OpenWeather\UrlBuilder;
use InternetRepublic\Connection\ApiConnect;
use InternetRepublic\OpenWeather\DataFormatter;
use InternetRepublic\HtmlPrinter\HtmlPrinter;

class OpenWeatherApi {

    /**
     * @var string The api url.
     */
    private $apiUrl;

    /**
     * @var array associative array of api params.
     */
    private $params;

    /**
     * @var string The api key.
     */
    private $apiKey;

    /**
     * @param string                $apiUrl  The api url.
     *
     * @param array                 $params associative array of api params.
     * 
     * @param string                $apiKey The api key.
     */
    function __construct(string $apiUrl, array $params, string $apiKey) {

        $this->apiUrl = $apiUrl;
        $this->params = $params;
        $this->apiKey = $apiKey;
    }

    /**
     * 
     */
    public function printDataTable() {

        $urlBuilder = new UrlBuilder($this->apiUrl);
        $url = $urlBuilder->createUrl($this->params, $this->apiKey);

        $connection = new ApiConnect($url);
        $data = $connection->getWeather();

        $outputHandler = new OutputHandler(new DataFormatter($data));
        $arrData = $outputHandler->getFormattedData();

        $printer = new HtmlPrinter();
        $printer->ArrayToTable($arrData,true);
 
    }

}
