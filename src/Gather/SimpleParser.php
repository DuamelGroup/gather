<?php

namespace Gather;

/**
 * Class SimpleParser
 *
 * @package Gather
 * @author  Sevans Duamel <sevansd@gmail.com>
 */
class SimpleParser implements ParserInterface
{

    /**
     * @var string
     */
    public $data;

    /**
     * @var string
     */
    private $regExp;

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

    /**
     * @param string $some
     *
     * @return $this
     */
    public function find($some)
    {
        $this->regExp .= preg_quote($some);

        return $this;
    }

    /**
     * @param string $start
     * @param string $finish
     *
     * @return $this
     */
    public function in($start, $finish)
    {
        $regExp = $start . $this->regExp . $finish;
        $this->regExp = $regExp;

        return $this;
    }

    /**
     * @param int $min
     * @param int $max
     * @param bool $greedy
     *
     * @return $this
     */
    public function any($min, $max = 0, $greedy = false)
    {
        $regExp = '.';
        if ($min == 0) {
            $regExp .= '*';
        } elseif ($max == 0) {
            $regExp .= '{' . $min . '}';
        } else {
            $regExp .= '{' . $min . ',' . $max . '}';
        }
        if ($greedy) {
            $regExp .= '?';
        }
        $this->regExp .= $regExp;

        return $this;
    }

    /**
     * @param string $flags
     * @param bool   $all
     *
     * @return mixed
     */
    public function parse($flags, $all = false)
    {
        $regExp = '/' . $this->regExp . '/' . $flags;

        $all
            ? preg_match_all($regExp, $this->data, $match)
            : preg_match($regExp, $this->data, $match);

        return $match;
    }

    /**
     * @return string
     */
    public function getCurrentRegExp()
    {
        return $this->regExp;
    }
}