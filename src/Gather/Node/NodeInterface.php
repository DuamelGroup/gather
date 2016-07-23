<?php

namespace Gather\Node;

/**
 * Interface NodeInterface
 *
 * @package Gather\Node
 * @author  Sevans Duamel <sevansd@gmail.com>
 */
interface NodeInterface
{

    /**
     * @return AbstractNode
     */
    public function getParent();
}