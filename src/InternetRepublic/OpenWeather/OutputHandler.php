<?php

namespace InternetRepublic\OpenWeather;

class OutputHandler {

    /**
     *
     * @var array|object    object with openweather api result    
     */
    private $data;

    /**
     *
     * @var array   array with table structured data.
     */
    private $arrData = array();

    /**
     * 
     * @param \InternetRepublic\OpenWeather\DataFormatter $data 
     * Dataformatter class object
     */
    public function __construct(DataFormatter $data) {
        $this->data = $data->getFormattedData();
    }

    /**
     * 
     * @return type
     */
    public function getFormattedData() {

        $this->setHeaders();

        if (is_array($this->data->list)) {
            $this->setMultiData();
        } else {
            $this->setSingleData($this->data);
        }

        return $this->arrData;
    }

    /**
     * 
     * @param type $v
     */
    private function setSingleData($v) {

        $r = array(
            $v->coord->lon,
            $v->coord->lat,
            $v->weather[0]->description,
            $v->main->temp,
            $v->main->pressure,
            $v->main->humidity,
            $v->main->temp_min,
            $v->main->temp_max,
            $v->sys->country,
            $v->id,
            $v->name
        );
        $this->arrData[] = $r;
    }

    /**
     * 
     */
    private function setMultiData() {
        foreach ($this->data->list as $v) {
            $this->setSingleData($v);
        }
    }

    /**
     * 
     */
    private function setHeaders() {

        $h = array(
            'Longitud',
            'Latitud',
            'Descripción',
            'Temperatura',
            'Presión',
            'Humedad',
            'Min. Temperatura',
            'Max. Temperatura',
            'País',
            'Id',
            'Ciudad'
        );
        $this->arrData[0] = $h;
    }

}
