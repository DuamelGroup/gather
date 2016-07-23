<?php

namespace Gather\Node;

/**
 * Class XmlNode
 *
 * @package Gather\Node
 * @author  Sevans Duamel <sevansd@gmail.com>
 */
class XmlNode extends AbstractNode
{

    /**
     * @return AbstractNode
     */
    function getParent()
    {
        return $this->parent;
    }

}