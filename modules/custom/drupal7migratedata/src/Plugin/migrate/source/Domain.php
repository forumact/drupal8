<?php

namespace Drupal\drupal7migratedata\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;


/**
 * Drupal 7 Domain source from database.
 *
 * @MigrateSource(
 *   id = "drupal7_domain",
 *   source_module = "domain"
 * )
 */
class Domain extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    $fields = [
      'domain_id',
      'subdomain',
      'sitename',
      'scheme',
      'valid',
      'weight',
      'is_default',
      'machine_name',
    ];
    $query = $this->select('domain', 'd')->fields('d', $fields);
    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    return [
      'domain_id' => $this->t('Domain ID.'),
      'subdomain' => $this->t('Subdomain.'),
      'sitename' => $this->t('Sitename.'),
      'scheme' => $this->t('Scheme.'),
      'valid' => $this->t('Valid.'),
      'weight' => $this->t('Weight.'),
      'is_default' => $this->t('Is default.'),
      'machine_name' => $this->t('Machine name.'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    $ids['domain_id']['type'] = 'integer';
    $ids['domain_id']['alias'] = 'd';
    return $ids;
  }

}
