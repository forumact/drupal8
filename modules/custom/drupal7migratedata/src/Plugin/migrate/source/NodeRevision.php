<?php

namespace Drupal\drupal7migratedata\Plugin\migrate\source;

use Drupal\drupal7migratedata\Plugin\migrate\source\Node;
/**
 * Drupal 7 node revision source from database.
 *
 * @MigrateSource(
 *   id = "drupal7_node_revision",
 *   source_module = "node"
 * )
 */
class NodeRevision extends Node {

  public function query() {
    // Select node in its last revision.
    $query = $this->select('node_revision', 'nr')
      ->fields('n', [
        'nid',
        'type',
        'language',
        'status',
        'created',
        'changed',
        'comment',
        'promote',
        'sticky',
        'tnid',
        'translate',
      ])
      ->fields('nr', [
        'vid',
        'title',
        'log',
        'timestamp',
      ]);
    $query->addField('n', 'uid', 'node_uid');
    $query->addField('nr', 'uid', 'revision_uid');
    $query->innerJoin('node', 'n', 'n.nid = nr.nid AND n.vid <> nr.vid');
    if (isset($this->configuration['node_type'])) {
      $query->condition('n.type', $this->configuration['node_type']);
    }

    return $query;
  }
  
  /**
   * {@inheritdoc}
   */
  public function fields() {
    // Use all the node fields plus the vid that identifies the version.
    return parent::fields() + [
      'vid' => t('The primary identifier for this version.'),
      'log' => $this->t('Revision Log message'),
      'timestamp' => $this->t('Revision timestamp'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    $ids['vid']['type'] = 'integer';
    $ids['vid']['alias'] = 'nr';
    return $ids;
  }

}
