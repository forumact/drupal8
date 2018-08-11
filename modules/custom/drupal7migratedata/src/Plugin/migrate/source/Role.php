<?php

namespace Drupal\drupal7migratedata\Plugin\migrate\source;

use Drupal\migrate\Event\MigrateRollbackEvent;
use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * Drupal 7 role source from database.
 *
 * @MigrateSource(
 *   id = "drupal7_user_role",
 *   source_module = "user"
 * )
 */
class Role extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    return $this->select('role', 'r')->fields('r');
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    return [
      'rid' => $this->t('Role ID.'),
      'name' => $this->t('The name of the user role.'),
      'weight' => $this->t('The weight of the role.'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function prepareRow(Row $row) {
    $permissions = $this->select('role_permission', 'rp')
      ->fields('rp', ['permission'])
      ->condition('rid', $row->getSourceProperty('rid'))
      ->execute()
      ->fetchCol();
    $row->setSourceProperty('permissions', $permissions);

    return parent::prepareRow($row);
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    $ids['rid']['type'] = 'integer';
    return $ids;
  }

}
