<?php

namespace Drupal\jugaad_app_qr_code\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\UrlHelper;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Url;

/**
 * Plugin implementation of the 'jugaad_app_qr_code' formatter.
 *
 * @FieldFormatter(
 *   id = "jugaad_app_qr_code_formatter",
 *   label = @Translation("Endroid Qr Code"),
 *   field_types = {
 *     "string",
 *     "jugaad_app_qr_code"
 *   }
 * )
 */
class EndroidQrCodeFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    $summary[] = $this->t('Displays the generated Qr Code.');

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];
    foreach ($items as $delta => $item) {
      // Render each element as markup.
      if (!$item->isEmpty()) {
        $data = UrlHelper::isValid($item->getValue()['value']);
        if ($data) {
          $option = [
            'query' => ['path' => $item->getValue()['value']],
          ];
          $uri = Url::fromRoute('jugaad_app_qr_code.qr.url', [], $option)
            ->toString();
        }
        else {
          $uri = Url::fromRoute('jugaad_app_qr_code.qr.generator', [
            'content' => $item->getValue()['value'],
          ])->toString();
        }
        $element[$delta] = [
          '#theme' => 'image',
          '#uri' => $uri,
          '#attributes' => ['class' => 'module-name-center-image'],
        ];
      }
    }

    return $element;
  }

}
