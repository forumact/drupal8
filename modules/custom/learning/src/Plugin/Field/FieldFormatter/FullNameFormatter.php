<?php
/**
 * Created by PhpStorm.
 * User: Arul
 * Date: 7/7/2018
 * Time: 11:31 AM
 */

namespace Drupal\learning\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'fullname_one_line' formatter.
 *
 * @FieldFormatter(
 * id = "fullname_one_line",
 * label = @Translation("Full name (one line)"),
 * field_types = {
 * "fullname"
 * }
 * )
 */
class FullNameFormatter extends FormatterBase {

  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];
    foreach ($items as $delta => $item) {
      $element[$delta] = [
        '#markup' => $this->t('@first @last', [
            '@first' => $item->first_name,
            '@last' => $item->last_name,
          ]
        ),
      ];
    }
    return $element;
  }

  public function settingsForm(array $form, FormStateInterface $form_state) {

  }

}