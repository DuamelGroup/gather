<?php

namespace Gather;

class Data {

    /**
     * @var int
     */
    public $executeTime;

    /**
     * @var int
     */
    public $httpCode;

    /**
     * @var array
     */
    public $info;

    /**
     * @var string
     */
    public $content;

    /**
     * @param $curl
     */
    public function fill($curl)
    {
        $this->info = curl_getinfo($curl);
        $this->executeTime = curl_getinfo($curl, CURLINFO_TOTAL_TIME);
        $this->httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    }
}