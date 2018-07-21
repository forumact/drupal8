<?php
/**
 * Created by PhpStorm.
 * User: Arul
 * Date: 6/23/2018
 * Time: 7:31 PM
 */

namespace Drupal\learning\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Connection;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Url;

class LearningController extends ControllerBase {

  protected $database;

  public static function create(ContainerInterface $container) {
    return new static($container->get('database'));
  }

  public function __construct(Connection $connection) {
    $this->database = $connection;
  }

  public function first_page() {
    $userCurrent = $this->currentUser();
    $name = $userCurrent->getUsername();
    $renderable = [
      '#theme' => 'learning',
      '#test_var' => $name,
      '#attached' => ['library' => ['learning/learning-global']],
    ];
    //$rendered = \Drupal::service('render')->render($renderable); return $rendered;
    return $renderable;
  }

  public function dynamic_data() {
    // If you have a database connection object $database:
    $query = $this->database->select('node', 'n');
    // Otherwise:
    //$query = db_select('node', 'n');
    // Continuing on...
    $query->innerJoin('node_field_data', 'nd', 'n.nid = nd.nid AND n.vid = nd.vid');
    $query = $query->addMetaData('base_table', 'node')// Needed for join queries.
    ->fields('nd', ['title', 'nid', 'uid'])// Get the title field.
    ->orderBy('nd.created', 'DESC')// Sort by last updated.
    ->addTag('node_access')// Enforce node access.
    ->condition('nd.status', 1)
      ->range(0, 10);
    // ->extend('Drupal\Core\Database\Query\PagerSelectExtender')// Add pager.
    //->limit(10)// 10 items per page.
    $executed = $query->execute();
    $result = $executed->fetchAll();
    $header = [
      'nid' => t('Nid'),
      'title' => t('Title'),
      'uid' => t('Uid'),
    ];

    $rows = [];
    foreach ($result as $key => $val) {
      $rows[] = [
        'nid' => $val->nid,
        'title' => $val->title,
        'uid' => $val->uid,
      ];
    }

    $build = [
      '#type' => 'table',
      '#caption' => $this->t('Node Table Records'),
      '#header' => $header,
      '#rows' => $rows,
      '#empty' => t('No users found'),
    ];
    return $build;
  }

  public function service_call() {
    $book_list = \Drupal::service('learning.listbooks')->getBooks();

    $render = NULL;
    $rows = [];
    $inc = 0;
    foreach ($book_list as $book) {
      $rows[$inc]['title'] = $book['title'];
      $rows[$inc]['author'] = $book['author'];
      $rows[$inc]['url'] = \Drupal::l($book['url'], Url::fromUri($book['url']));
      $inc++;
    }
    return [
      '#type' => 'table',
      '#header' => ['title' => 'Title', 'author' => 'Author', 'url' => 'Url'],
      '#rows' => $rows,
    ];
  }

}
