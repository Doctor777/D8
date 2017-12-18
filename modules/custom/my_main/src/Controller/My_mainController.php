<?php
/**
 * @file
 * Contains \Drupal\my_main\Controller\My_mainController.
 */
namespace Drupal\my_main\Controller;

use Drupal\Core\Controller\ControllerBase;

class My_mainController extends ControllerBase {
    public function mainPage() {
        return [
            '#markup' => $this->t('This is the main page!'),
        ];
    }
}
