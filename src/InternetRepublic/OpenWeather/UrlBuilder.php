<?php

namespace InternetRepublic\OpenWeather;

class UrlBuilder {

    /**
     * @var string The api url.
     */
    private $apiUrl;

    /**
     * 
     * @param string $apiUrl    The api url.
     */
    function __construct(string $apiUrl) {
        $this->apiUrl = $apiUrl;
    }

    /**
     * 
     * @param array         $params associative array of api params.
     * @return string       well formatted url to call the openweather api.
     */
    public function createUrl(array $params, string $apiKey): string {

        $formatedParams = $this->formatParams($params);
        $formatedApiKey = $this->formatApiKey($apiKey);

        return $this->apiUrl . $formatedParams . $formatedApiKey;
    }

    /**
     * 
     * @param array         $params associative array of api params.
     * @return string
     */
    private function formatParams(array $params): string {
        $result = '?';
        foreach ($params as $k => $v) {
            $result .= $k . '=' . $v . '&';
        }
        return $result;
    }

    /**
     * 
     * @param string $apiKey
     * @return string
     */
    private function formatApiKey(string $apiKey): string {
        return 'APPID=' . $apiKey;
    }

}
