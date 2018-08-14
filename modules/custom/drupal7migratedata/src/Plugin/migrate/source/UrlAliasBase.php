<?php

namespace Drupal\drupal7migratedata\Plugin\migrate\source;

use Drupal\migrate_drupal\Plugin\migrate\source\DrupalSqlBase;
use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * Base class for the url_alias source plugins.
 */
abstract class UrlAliasBase extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    // The order of the migration is significant since
    // \Drupal\Core\Path\AliasStorage::lookupPathAlias() orders by pid before
    // returning a result. Postgres does not automatically order by primary key
    // therefore we need to add a specific order by.
    return $this->select('url_alias', 'ua')->fields('ua')->orderBy('pid');
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    return [
      'pid' => $this->t('The numeric identifier of the path alias.'),
      'language' => $this->t('The language code of the URL alias.'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    $ids['pid']['type'] = 'integer';
    return $ids;
  }

}
