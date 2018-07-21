<?php
/**
 * Created by PhpStorm.
 * User: Arul
 * Date: 7/7/2018
 * Time: 9:29 AM
 */

namespace Drupal\learning\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldItemInterface;

/**
 * Plugin implementation of the 'fullname' field type.
 *
 * @FieldType(
 * id = "fullname",
 * label = @Translation("Full name"),
 * description = @Translation("This field stores a first and last name."),
 * category = @Translation("General"),
 * default_widget = "fullname_default",
 * default_formatter = "fullname_one_line"
 * )
 */
class FullName extends FieldItemBase implements FieldItemInterface {

  /**
   * {@inheritdoc}
   */
  public static function schema(\Drupal\Core\Field\FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'first_name' => [
          'description' => 'First name.',
          'type' => 'varchar',
          'length' => '255',
          'not null' => TRUE,
          'default' => '',
        ],
        'last_name' => [
          'description' => 'Last name.',
          'type' => 'varchar',
          'length' => '255',
          'not null' => TRUE,
          'default' => '',
        ],
      ],
      'indexes' => [
        'first_name' => ['first_name'],
        'last_name' => ['last_name'],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  //  public function isEmpty() {
  //    $value = $this->get('value')->getValue();
  //    return $value === NULL || $value === '';
  //  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(\Drupal\Core\Field\FieldStorageDefinitionInterface $field_definition) {
    $properties['first_name'] = \Drupal\Core\TypedData\DataDefinition::create('string')
      ->setLabel(t('First name'));
    $properties['last_name'] = \Drupal\Core\TypedData\DataDefinition::create('string')
      ->setLabel(t('Last name'));
    return $properties;
  }
}