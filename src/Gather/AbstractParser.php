<?php

namespace Gather;

/**
 * Class AbstractParser
 *
 * @package Gather
 * @author  Sevans Duamel <sevansd@gmail.com>
 */
abstract class AbstractParser implements ParserInterface
{

    /**
     * @var Data
     */
    public $data;

    /**
     * @param string $url
     *
     * @return mixed
     */
    abstract public function loadData($url);
}