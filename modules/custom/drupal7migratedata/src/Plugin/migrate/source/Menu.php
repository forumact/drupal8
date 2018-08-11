<?php

namespace Drupal\drupal7migratedata\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;

/**
 * Menu source from database.
 *
 * @MigrateSource(
 *   id = "drupal7_menu",
 *   source_module = "menu"
 * )
 */
class Menu extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    $query = $this->select('menu_custom', 'm')->fields('m');
	$query->condition('m.menu_name', 'menu-migrationmenu');
	return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    return [
      'menu_name' => $this->t('The menu name. Primary key.'),
      'title' => $this->t('The human-readable name of the menu.'),
      'description' => $this->t('A description of the menu'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    $ids['menu_name']['type'] = 'string';
    return $ids;
  }

}
