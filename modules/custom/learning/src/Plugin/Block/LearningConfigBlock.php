<?php

namespace Drupal\learning\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'LearningConfigBlock' block.
 *
 * @Block(
 *  id = "learning_config_block",
 *  admin_label = @Translation("Learning config block"),
 * )
 */
class LearningConfigBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
        'date' => '08-16-1988',
        'color' => '#3e3e3e',
      ] + parent::defaultConfiguration();
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['date'] = [
      '#type' => 'date',
      '#title' => $this->t('Date'),
      '#description' => $this->t('For checking'),
      '#default_value' => $this->configuration['date'],
      '#weight' => '0',
    ];
    $form['color'] = [
      '#type' => 'color',
      '#title' => $this->t('Color'),
      '#description' => $this->t('For checking color value'),
      '#default_value' => $this->configuration['color'],
      '#weight' => '0',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['date'] = $form_state->getValue('date');
    $this->configuration['color'] = $form_state->getValue('color');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['learning_config_block_date']['#markup'] = '<p>' . $this->configuration['date'] . '</p>';
    $build['learning_config_block_color']['#markup'] = '<p>' . $this->configuration['color'] . '</p>';

    return $build;
  }

}
