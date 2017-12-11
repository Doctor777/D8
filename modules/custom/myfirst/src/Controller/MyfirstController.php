<?php
namespace Drupal\myfirst\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Provides route responses for the Example module.
 */
class MyfirstController extends ControllerBase {

  /**
   * Returns a simple page.
   *
   * @return array
   *   A simple renderable array.
   */
  public function myfirst() {
    $element = array(
      '#markup' => 'Hello, world',
    );
    return $element;
  }

}