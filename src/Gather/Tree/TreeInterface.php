<?php

namespace Gather\Tree;

/**
 * Interface TreeInterface
 *
 * @package Gather\Tree
 * @author  Sevans Duamel <sevansd@gmail.com>
 */
interface TreeInterface
{

    public function addNode($node, $parent);

    public function deleteNode($node);

    public function isEmpty();
}