<?php

namespace Gather;

/**
 * Class SimpleParser
 *
 * @package Gather
 * @author  Sevans Duamel <sevansd@gmail.com>
 */
class SimpleParser extends AbstractParser implements ParserInterface
{

    /**
     * @var string
     */
    public $data;

    /**
     * @param string $data
     *
     * @return $this
     */
    public function loadData($data)
    {
        $this->data = $data;
        $this->regExp = '';

        return $this;
    }

}