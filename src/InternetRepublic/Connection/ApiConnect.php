<?php

namespace InternetRepublic\Connection;

class ApiConnect {

    /**
     *
     * @var string $url     api url.
     */
    private $url;

    /**
     * 
     * @param string $url   api url.
     */
    function __construct(string $url) {
        $this->url = $url;
    }

    /**
     * 
     * @return string   string with curl call result.
     */
    public function getWeather() {
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

        $content = curl_exec($ch);
        curl_close($ch);

        return $content;
    }

}
