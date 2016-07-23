<?php

namespace Gather\Tests;

use Gather\SimpleParser;
use PHPUnit_Framework_TestCase;

/**
 * Class SimpleParserTest
 *
 * @package Gather\Tests
 * @author  Sevans Duamel <sevansd@gmail.com>
 */
class SimpleParserTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var SimpleParser
     */
    protected $simpleParser;

    /**
     * Initial parser
     */
    protected function setUp()
    {
        $this->simpleParser = new SimpleParser();
    }

    public function testFind()
    {
        $this->simpleParser->find('text');
        $this->assertEquals('text', $this->simpleParser->getCurrentRegExp());
    }

    public function testParse()
    {
        $answer = $this->simpleParser->loadData('text and other textes')
                                     ->find('text')
                                     ->parse('i', false);
        $this->assertEquals(['text'], $answer);
    }

    public function testDoubleFindParse()
    {
        $answer = $this->simpleParser->loadData('text and other textes')
                                     ->find('te')
                                     ->find('xt')
                                     ->parse('i', false);
        $this->assertEquals(['text'], $answer);
    }

    public function testInParse()
    {
        $answer = $this->simpleParser->loadData('@text@ and tExt')
            ->find('text')
            ->in('@', '@')
            ->parse('i', false);
        $this->assertEquals(['@text@'], $answer);
    }

    public function testAnyParse()
    {
        $answer = $this->simpleParser->loadData('Text5 and text4 and text3')
            ->find('text')
            ->any(0, 0, true)
            ->find('\s')
            ->parse('i', true);
        $this->assertEquals(['Text5', 'text4', 'text3'], $answer);
    }
}