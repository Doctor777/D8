<?php
/**
 * @file
 * Contains \Drupal\custom_block\Plugin\Block\CustomBlock.
 */
namespace Drupal\myblock\Plugin\Block;

use Drupal\Core\Block\BlockBase;
/**
 * Provides a custom_block.
 *
 * @Block(
 *   id = "myblock",
 *   admin_label = @Translation("My block"),
 *   category = @Translation("my custom everypage block")
 * )
 */

class Myblock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    return array(
      '#type' => 'markup',
      '#markup' => 'This custom block content.',
    );
  }
}
