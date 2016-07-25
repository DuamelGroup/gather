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
        $answer = $this->simpleParser->loadData('Text and text #514 number')
            ->find('text')
            ->anySymbol(0, 0, false)
            ->find('#')
            ->parse('i', true);
        $this->assertEquals([['Text and text #']], $answer);
    }

    public function testAnyGreedyParse()
    {
        $answer = $this->simpleParser->loadData('Text5 and text4 and text3 mark')
                                     ->find('text')
                                     ->anySymbol(0, 0, true)
                                     ->find('\s', true)
                                     ->count(0, 0, true)
                                     ->parse('i', true);
        $this->assertEquals([['Text5 ', 'text4 ', 'text3 ']], $answer);
    }

    public function testAnyGreedyMultiParse()
    {
        $answer = $this->simpleParser->loadData('Text and text #514 text #number')
                                     ->find('text')
                                     ->anySymbol(0, 0, true)
                                     ->find('#')
                                     ->parse('i', true);
        $this->assertEquals([['Text and text #', 'text #']], $answer);
    }

    public function testAnyToEndParse()
    {
        $answer = $this->simpleParser->loadData('Text to parse number #514')
            ->find('#')
            ->anySymbol()
            ->parse();
        $this->assertEquals(['#514'], $answer);
    }
}