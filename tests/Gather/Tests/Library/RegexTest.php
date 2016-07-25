<?php

namespace Gather\Library\Tests;

use Gather\Library\Regex;
use PHPUnit_Framework_TestCase;

/**
 * Class SimpleParserTest
 *
 * @package Gather\Tests
 * @author  Sevans Duamel <sevansd@gmail.com>
 */
class RegexTest extends PHPUnit_Framework_TestCase
{

    public function testHTMLCommentRegex()
    {
        $string = <<<EOD
<!-- Comment -->
and IE8 comment:
<!--[if !(IE 8) ]><!-->
and Comment with brackets
<!-- Comment <with> [brackets] -->
EOD;
        preg_match_all(Regex::HTML_COMMENTS, $string, $matches);
        $this->assertEquals([
                                [
                                    '<!-- Comment -->',
                                    '<!--[if !(IE 8) ]><!-->',
                                    '<!-- Comment <with> [brackets] -->'
                                ],
                                [
                                    '<!-- Comment ',
                                    '<!--[if !(IE 8) ]><!',
                                    '<!-- Comment <with> [brackets] '
                                ]
                            ],
                            $matches);
    }

    public function testAnyHTMLTag()
    {
        $string = <<<EOT
<html lang="en">
 <head>
  <li data-dropdown class="dropdown" data-on-toggle="toggleNotifications(open)">
   <a data-dropdown-toggle href="javascript:" class="dropdown-toggle" data-toggle="dropdown" role="button" 
 aria-expanded="false"><span class="glyphicon air-icon-notifications"></span>
 <ul class="dropdown-menu" role="menu">
   <li data-ng-repeat="notification in notifications | limitTo:5">
 </head>
</html>
EOT;
        preg_match_all(Regex::ANY_HTML_TAG, $string, $matches);
        $this->assertEquals([
                                [
                                    '<html lang="en">',
                                    '<head>',
                                    '<li data-dropdown class="dropdown" data-on-toggle="toggleNotifications(open)">',
                                    '<a data-dropdown-toggle href="javascript:" class="dropdown-toggle" data-toggle="dropdown" role="button" 
 aria-expanded="false">',
                                    '<span class="glyphicon air-icon-notifications">',
                                    '</span>',
                                    '<ul class="dropdown-menu" role="menu">',
                                    '<li data-ng-repeat="notification in notifications | limitTo:5">',
                                    '</head>',
                                    '</html>'
                                ],
                                [
                                    'html',
                                    'head',
                                    'li',
                                    'a',
                                    'span',
                                    '/span',
                                    'ul',
                                    'li',
                                    '/head',
                                    '/html'
                                ]
                            ], $matches);
    }
}