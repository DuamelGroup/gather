<?php

namespace Gather\Tree;

use Gather\Node\AbstractNode;
use Gather\Node\RootNode;

/**
 * Class AbstractTree
 *
 * @package Gather\Tree
 * @author  Sevans Duamel <sevansd@gmail.com>
 */
abstract class AbstractTree implements TreeInterface
{

    /**
     * @var RootNode
     */
    public $rootNode;

    /**
     * @param AbstractNode      $node
     * @param AbstractNode|null $parent
     *
     * @return $this
     */
    public function addNode($node, $parent = null)
    {
        if (empty($parent)) {
            $this->rootNode->child[] = $node;
        } else {
            $parent->child[] = $node;
        }

        return $this;
    }

    public function deleteNode($node)
    {
        //@todo: Надо продумать систему удаления вершины
    }

    public function isEmpty()
    {
        return empty($this->rootNode);
    }
}