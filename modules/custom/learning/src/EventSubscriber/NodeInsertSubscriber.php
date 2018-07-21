<?php
/**
 * Created by PhpStorm.
 * User: arulraj.m
 * Date: 27-06-2018
 * Time: 03:07 PM
 */


namespace Drupal\learning\EventSubscriber;

use Drupal\learning\Event\NodeInsertEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class NodeInsertSubscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        // TODO: Implement getSubscribedEvents() method.
        $events[NodeInsertEvent::DEMO_NODE_INSERT][] = ['onDemoNodeInsert'];
        return $events;
    }

    public function onDemoNodeInsert(NodeInsertEvent $event)
    {
        $entity = $event->getEntity();
        \Drupal::logger('event_subscriber_demo')->notice('New @type: @title. Created by: @owner',
            array(
                '@type' => $entity->getType(),
                '@title' => $entity->label(),
                '@owner' => $entity->getOwner()->getDisplayName()
            ));
    }
}