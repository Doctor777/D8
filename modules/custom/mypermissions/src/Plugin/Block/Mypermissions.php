<?php
/**
 * @file
 * Contains \Drupal\mypermissions\Plugin\Block\Mypermissions.
 */
namespace Drupal\mypermissions\Plugin\Block;

use Drupal\Core\Block\BlockBase;
/**
 * Provides a custom_block.
 *
 * @Block(
 *   id = "mypermissions",
 *   admin_label = @Translation("My permissions"),
 *   category = @Translation("my permissions block")
 * )
 */

class Mypermissions extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    return array(
      '#type' => 'markup',
      '#markup' => 'This 2 custom block content.',
    );
  }
}
