<?php
/**
 * Created by PhpStorm.
 * User: arulraj.m
 * Date: 27-06-2018
 * Time: 01:25 PM
 */

namespace Drupal\learning\Event;


use Drupal\Core\Entity\EntityInterface;
use Symfony\Component\EventDispatcher\Event;

class NodeInsertEvent extends Event
{
    const DEMO_NODE_INSERT = 'learning.node.insert';

    protected $entity;

    public function __construct(EntityInterface $entity)
    {
        $this->entity = $entity;
    }

    public function getEntity(){
        return $this->entity;
    }
}