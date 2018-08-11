<?php
/**
 * Created by PhpStorm.
 * User: Arul
 * Date: 8/10/2018
 * Time: 10:34 PM
 */

namespace Drupal\migratedata\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;

/**
 * Source plugin for beer comments.
 *
 * @MigrateSource(
 *   id = "custom_menu"
 * )
 */
class Menu extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    $fields = [
      'menu_name',
      'mlid',
      'plid',
      'link_path',
      'router_path',
      'link_title',
      'has_children',
      'expanded',
      'weight',
      'depth',
      'p1',
      'p2',
      'p3',
      'p4',
      'p5',
      'p6',
      'p7',
      'p8',
      'p9'

    ];
    $query = $this->select('menu_links', 'ml')
      ->fields('ml', $fields)
      ->condition('menu_name', 'menu-migrationmenu')
      ->orderBy('mlid', 'ASC');
    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'menu_name' => $this->t('Menu Name'),
      'mlid' => $this->t('Menu primay id'),
      'plid' => $this->t('Menu parent id'),
      'link_path' => $this->t('link path'),
      'router_path' => $this->t('Router path'),
      'link_title' => $this->t('Link Title'),
      'has_children' => $this->t('Has Children'),
      'expanded' => $this->t('Expanded'),
      'weight' => $this->t('Weight'),
      'depth' => $this->t('Depth'),
      'p1' => $this->t('p1'),
      'p2' => $this->t('p2'),
      'p3' => $this->t('p3'),
      'p4' => $this->t('p4'),
      'p5' => $this->t('p5'),
      'p6' => $this->t('p6'),
      'p7' => $this->t('p7'),
      'p8' => $this->t('p8'),
      'p9' => $this->t('p9'),
    ];

    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'mlid' => [
        'type' => 'integer',
        'alias' => 'ml',
      ],
    ];
  }

}