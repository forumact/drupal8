<?php
/**
 * Created by PhpStorm.
 * User: Arul
 * Date: 7/7/2018
 * Time: 9:59 AM
 */

namespace Drupal\learning\Plugin\Field\FieldWidget;


use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'fullname_default' widget.
 *
 * @FieldWidget(
 * id = "fullname_default",
 * label = @Translation("Full name"),
 * field_types = {"fullname"}
 * )
 */
class FullNameDefaultWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element['first_name'] = [
      '#type' => 'textfield',
      '#title' => t('First name'),
      '#default_value' => '',
      '#size' => 25,
      '#required' => $element['#required'],
    ];
    $element['last_name'] = [
      '#type' => 'textfield',
      '#title' => t('Last name'),
      '#default_value' => '',
      '#size' => 25,
      '#required' => $element['#required'],
    ];
    return $element;
  }
}