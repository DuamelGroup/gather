<?php

namespace Gather\Node;

/**
 * Class SimpleNode
 *
 * @package Gather\Node
 * @author  Sevans Duamel <sevansd@gmail.com>
 */
class SimpleNode extends AbstractNode
{

    /**
     * @var string
     */
    public $value;

    /**
     * @var array
     */
    public $params;

    /**
     * @return AbstractNode
     */
    public function getParent()
    {
        return $this->parent;
    }
}