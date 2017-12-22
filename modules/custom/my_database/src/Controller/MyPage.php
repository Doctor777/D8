<?php

namespace Drupal\my_database\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Provides route responses for the Example module.
 */
class MyPage extends ControllerBase
{

    /**
     * Returns a simple page.
     *
     * @return array
     *   A simple renderable array.
     */
    public function myquery()
    {
        $query = \Drupal::database()->select('my_database', 'md');
        $query->fields('md', ['id', 'number', 'teaser', 'text']);
        $query->orderBy('id', 'ASC');
        $results = $query->execute()->fetchAll();
       // echo print_r($results);
        $header = [
            'id' => t('id'),
            'number' => t('number'),
            'teaser' => t('teaser'),
            'text' => t('text'),
        ];
        foreach ($results as $result) {
            $output[$result->id] = [
                'id' => $result->id,
                'number' => $result->number,
                'teaser' => $result->teaser,
                'text' => $result->text,
            ];
        }
        $form['table'] = [
            '#type' => 'tableselect',
            '#header' => $header,
            '#options' => $output,
            '#empty' => t('No found'),
        ];
        return $form;
    }

}


