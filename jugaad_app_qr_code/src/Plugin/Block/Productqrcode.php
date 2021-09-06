<?php
/**
 * @file
 * Contains \Drupal\article\Plugin\Block\XaiBlock.
 */

namespace Drupal\jugaad_app_qr_code\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Controller\ControllerBase;
use Drupal\jugaad_app_qr_code\Controller;

/**
 * Provides a 'article' block.
 *
 * @Block(
 *   id = "productqrcode",
 *   admin_label = @Translation("Product QR Code Generator"),
 *   category = @Translation("Product QR Code block")
 * )
 */
class Productqrcode extends BlockBase {
  /**
   * {@inheritdoc}
   */
  
  public function build() {
    global $config;
      
	return array(
      '#theme' => 'productqrcode',
      '#title' => 'Product QR Code Generator',
      '#description' => "The Time is : ".date('H:i:s'),
	  '#response' => $result,
	'#cache' => [
	  'max-age' => 0,
	],	  
    );
  }   
}