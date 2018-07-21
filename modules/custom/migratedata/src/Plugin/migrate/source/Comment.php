<?php

namespace Drupal\migratedata\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;

/**
 * Source plugin for beer comments.
 *
 * @MigrateSource(
 *   id = "custom_comment"
 * )
 */
class Comment extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    $fields = [
      'cid',
      'cid_parent',
      'name',
      'mail',
      'aid',
      'body',
      'bid',
      'subject',
    ];
    $query = $this->select('wordpress_comment_table', 'wpc')
      ->fields('wpc', $fields)
      ->orderBy('cid_parent', 'ASC');
    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'cid' => $this->t('Comment ID'),
      'cid_parent' => $this->t('Parent comment ID in case of comment replies'),
      'name' => $this->t('Comment name (if anon)'),
      'mail' => $this->t('Comment email (if anon)'),
      'aid' => $this->t('Account ID (if any)'),
      'bid' => $this->t('Beer ID that is being commented upon'),
      'subject' => $this->t('Comment subject'),
    ];

    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'cid' => [
        'type' => 'integer',
        'alias' => 'wpc',
      ],
    ];
  }

}
