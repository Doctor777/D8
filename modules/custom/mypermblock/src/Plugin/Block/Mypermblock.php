<?php
/**
 * @file
 * Contains \Drupal\mypermblock\Plugin\Block\mypermBlock.
 */
namespace Drupal\myblock\Plugin\Block;

use Drupal\Core\Block\BlockBase;
/**
 * Provides a mypermblock.
 *
 * @Block(
 *   id = "mypermblock",
 *   admin_label = @Translation("My permissions block"),
 *   category = @Translation("my custom permissions block")
 * )
 */

class Mypermblock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    return array(
      '#type' => 'markup',
      '#markup' => 'This custom2 block content.',
    );
  }
}
