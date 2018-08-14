<?php

namespace Drupal\drupal7migratedata\Plugin\migrate\source;

use Drupal\drupal7migratedata\Plugin\migrate\source\UrlAliasBase;

/**
 * URL aliases source from database.
 *
 * @MigrateSource(
 *   id = "drupal7_url_alias",
 *   source_module = "path"
 * )
 */
class UrlAlias extends UrlAliasBase {

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = parent::fields();
    $fields['source'] = $this->t('The internal system path.');
    $fields['alias'] = $this->t('The path alias.');
    return $fields;
  }

}
