<?php
/**
 * @file
 * Contains \Drupal\custom_block\Plugin\Block\CustomBlock.
 */
namespace Drupal\myblock_permissed\Plugin\Block;

use Drupal\Core\Block\BlockBase;
/**
 * Provides a custom_block.
 *
 * @Block(
 *   id = "myblock_permissed",
 *   admin_label = @Translation("My block_permissed"),
 *   category = @Translation("my custom permissions block")
 * )
 */

class Myblock_permissed extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
          if (\Drupal::currentUser()->getAccountName()=='root') {
          return array(
              '#type' => 'markup',
              '#markup' => 'You have all permissions to view this content.',
          );
      }
      else{
          return array(
              '#type' => 'markup',
              '#markup' => 'access to view this content is denied.',
          );
      }
  }

}


