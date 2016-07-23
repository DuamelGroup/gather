<?php

namespace Gather\Node;

/**
 * Class AbstractNode
 *
 * @package Gather\Node
 * @author  Sevans Duamel <sevansd@gmail.com>
 */
abstract class AbstractNode implements NodeInterface
{

    /**
     * @var string
     */
    public $value;

    /**
     * @var null|AbstractNode[]
     */
    public $child = null;

    /**
     * @var AbstractNode
     */
    public $parent;

    /**
     * @return AbstractNode
     */
    abstract function getParent();
}