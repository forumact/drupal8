<?php

namespace Drupal\drupal7migratedata\Plugin\migrate\source;

use Drupal\migrate\Event\MigrateRollbackEvent;
use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;


/**
 * Drupal 7 user source from database.
 *
 * @MigrateSource(
 *   id = "drupal7_user", 
 * )
 */
class User extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    return $this->select('users', 'u')
      ->fields('u')
      ->condition('u.uid', 1, '>');
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'uid' => $this->t('User ID'),
      'name' => $this->t('Username'),
      'pass' => $this->t('Password'),
      'mail' => $this->t('Email address'),
      'signature' => $this->t('Signature'),
      'signature_format' => $this->t('Signature format'),
      'created' => $this->t('Registered timestamp'),
      'access' => $this->t('Last access timestamp'),
      'login' => $this->t('Last login timestamp'),
      'status' => $this->t('Status'),
      'timezone' => $this->t('Timezone'),
      'language' => $this->t('Language'),
      'picture' => $this->t('Picture'),
      'init' => $this->t('Init'),
      'data' => $this->t('User data'),
      'roles' => $this->t('Roles'),
    ];
    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function prepareRow(Row $row) {
    $roles = $this->select('users_roles', 'ur')
      ->fields('ur', ['rid'])
      ->condition('ur.uid', $row->getSourceProperty('uid'))
      ->execute()
      ->fetchCol();
    $row->setSourceProperty('roles', $roles);
    $row->setSourceProperty('data', unserialize($row->getSourceProperty('data')));
    return parent::prepareRow($row);
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'uid' => [
        'type' => 'integer',
        'alias' => 'u',
      ],
    ];
  }

}
