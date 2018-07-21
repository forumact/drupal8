<?php
/**
 * Created by PhpStorm.
 * User: Arul
 * Date: 7/5/2018
 * Time: 11:11 PM
 */

namespace Drupal\learning\Routing;


use Drupal\Core\Routing\RouteBuildEvent;
use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

class RouteSubscriber extends RouteSubscriberBase {

  public function alterRoutes(RouteCollection $collection) {
    // TODO: Implement alterRoutes() method.
    if ($route = $collection->get('learning.first')) {
      $route->setPath('/my-page');
    }
  }
}