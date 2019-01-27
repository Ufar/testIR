<?php

namespace InternetRepublic\OpenWeather;

class DataFormatter {

    /**
     *
     * @var string      json data from weather api
     */
    private $data;

    /**
     * 
     * @param string $data      json string data
     */
    public function __construct(string $data) {
        $this->data = $data;
    }

    /**
     * 
     * @return object           object with data from json.
     */
    public function getFormattedData() {

        return json_decode($this->data);
    }

}
