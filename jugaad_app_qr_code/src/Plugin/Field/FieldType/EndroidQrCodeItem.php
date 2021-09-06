<?php

namespace Drupal\jugaad_app_qr_code\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'jugaad_app_qr_code' field type.
 *
 * @FieldType(
 *   id = "jugaad_app_qr_code",
 *   label = @Translation("Endroid Qr Code"),
 *   module = "jugaad_app_qr_code",
 *   description = @Translation("Creates Endroid Qr Code Field."),
 *   default_widget = "jugaad_app_qr_code_widget",
 *   default_formatter = "jugaad_app_qr_code_formatter"
 * )
 */
class EndroidQrCodeItem extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'value' => [
          'type' => 'text',
          'size' => 'tiny',
          'not null' => FALSE,
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties = [];
    $properties['value'] = DataDefinition::create('string')
      ->setLabel(t('Qr Code'))
      ->setRequired(TRUE);

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $value = $this->get('value')->getValue();

    return $value === NULL || $value === '';
  }

}
