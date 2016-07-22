<?php

namespace Gather;

Abstract class AbstractParser {

    /**
     * @var string
     */
    public $data;

    /**
     * @var \CURLFile
     */
    protected $curl;

    /**
     * @var array
     */
    protected $options;

//    public $

    public function getData($url) {
        $this->curl = curl_init($url);
        if(!empty($this->options)) {
            foreach($this->options as $option => $value) {
                curl_setopt($this->curl, $option, $value);
            }
        }
        //@todo: Add check http code
        $this->data = curl_exec($this->curl);
        return $this->data;
    }
}