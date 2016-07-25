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
     * @var string
     */
    protected $regExp;

    /**
     * @param string $url
     *
     * @return mixed
     */
    abstract public function loadData($url);

    /**
     * @param string $some
     * @param bool   $notEscape
     *
     * @return $this
     */
    public function find($some, $notEscape = false)
    {
        $this->regExp .= $notEscape
            ? $some
            : preg_quote($some);

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
     * @param int  $min
     * @param int  $max
     * @param bool $greedy
     *
     * @return $this
     */
    public function count($min, $max = 0, $greedy = false)
    {
        $this->regExp .= $greedy
            ? '+'
            : (
            $min == 0
                ? '*'
                : (
            $max == 0 && $min != 0
                ? '{' . $min . '}'
                : '{' . $min . ',' . $max . '}'
            )
            );

        return $this;
    }

    /**
     * @param int  $min
     * @param int  $max
     * @param bool $greedy
     *
     * @return $this
     */
    public function anySymbol($min = 0, $max = 0, $greedy = false)
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
    public function parse($flags = '', $all = false)
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