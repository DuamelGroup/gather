<?php

namespace Gather\Node;

/**
 * Class HtmlNode
 *
 * @package Gather\Node
 * @author  Sevans Duamel <sevansd#@gmail.com>
 */
class HtmlNode extends AbstractNode
{

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $class;

    /**
     * @var string
     */
    public $dataAttribute;

    /**
     * @var string
     */
    public $src;

    /**
     * @var string
     */
    public $href;

    /**
     * @return AbstractNode
     */
    function getParent()
    {
        return $this->parent;
    }

}