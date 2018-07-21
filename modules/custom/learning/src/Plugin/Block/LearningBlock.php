<?php

namespace Drupal\learning\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'LearningBlock' block.
 *
 * @Block(
 *  id = "learning_block",
 *  admin_label = @Translation("Learning block"),
 * )
 */
class LearningBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['learning_block']['#markup'] = 'Implement LearningBlock.';

    return $build;
  }

}
