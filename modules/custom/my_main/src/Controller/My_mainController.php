<?php

/**
 * @file
 * Contains \Drupal\my_main\Controller\My_mainController.
 */

namespace Drupal\my_main\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Provides route responses for the Example module.
 */
class My_mainController extends ControllerBase
{
    public function mainPage()
    {
        return [
            '#markup' => $this->t('This is the main page!'),
        ];
    }

    function PageNotFound()
    {
        return [
            '#markup' => $this->t('404 Not Found'),
        ];
    }

    function AccessDenied()
    {
        return [
            '#markup' => $this->t('403 Access denied'),
        ];

    }
}
