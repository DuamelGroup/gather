<?php

namespace Gather;

/**
 * Class CurlParser
 *
 * @package Gather
 * @author  Sevans Duamel <sevansd@gmail.com>
 */
class CurlParser extends AbstractParser
{

    /**
     * @var Resource
     */
    protected $curl;

    /**
     * @var array
     */
    protected $options;

    /**
     * @var array
     */
    public $acceptHTTPCodes = [
        100, 101, 102,
        200,
        302, 304
    ];

    /**
     * AbstractParser constructor.
     */
    public function __construct()
    {
        $this->data = new Data();
    }

    /**
     * Get page data from url
     *
     * @param string $url
     *
     * @return bool
     */
    public function loadData($url)
    {
        $this->curl = curl_init($url);
        if (!empty($this->options)) {
            foreach ($this->options as $option => $value) {
                curl_setopt($this->curl, $option, $value);
            }
        }
        $this->data->content = curl_exec($this->curl);
        $this->data->fill($this->curl);
        if (!in_array($this->data->httpCode, $this->acceptHTTPCodes)) {
            return false;
        }

        return true;
    }
}