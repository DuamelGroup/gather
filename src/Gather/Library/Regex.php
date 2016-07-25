<?php

namespace Gather\Library;

/**
 * Class Regex
 *
 * @package Gather\Library
 * @author  Sevans Duamel <sevansd@gmail.com>
 */
class Regex
{

    const HTML_COMMENTS = '/(?=<!--)([\s\S]*?)-->/';
    const ANY_HTML_TAG  = '/<(\w+|\/\w+)\s*(?:[\w-\+]+(?:\=\"[^"]*\")*\s*)*\/?>/';
}