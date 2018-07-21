<?php

namespace Drupal\block_demo\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'CustomBlockDemo' block.
 *
 * @Block(
 *  id = "custom_block_demo",
 *  admin_label = @Translation("Custom Block Demo"),
 * )
 */
class CustomBlockDemo extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['learning_block']['#markup'] = 'Implement LearningBlock.';

    return $build;
  }

}
