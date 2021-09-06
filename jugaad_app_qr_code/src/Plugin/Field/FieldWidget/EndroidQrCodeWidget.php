<?php

namespace Drupal\jugaad_app_qr_code\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * A widget Qr Code.
 *
 * @FieldWidget(
 *   id = "jugaad_app_qr_code_widget",
 *   label = @Translation("Render text as a QR Code"),
 *   field_types = {
 *     "string",
 *     "jugaad_app_qr_code"
 *   }
 * )
 */
class EndroidQrCodeWidget extends WidgetBase {

  /**
   * Validate the color text field.
   */
  public static function validate($element, FormStateInterface $form_state) {
    $value = $element['#value'];
    if (strlen($value) == 0) {
      $form_state->setValueForElement($element, '');

      return;
    }
  }

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $value = isset($items[$delta]->value) ? $items[$delta]->value : '';
    $element += [
      '#type' => 'textfield',
      '#default_value' => $value,
      '#size' => 64,
      '#maxlength' => 64,
      '#element_validate' => [
        [static::class, 'validate'],
      ],
    ];

    return ['value' => $element];
  }

}
