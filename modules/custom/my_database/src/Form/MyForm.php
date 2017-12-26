<?php

namespace Drupal\my_database\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 *  form.
 */
class MyForm extends FormBase
{

    /**
     * {@inheritdoc}
     */
    public function getFormId()
    {
        return 'my_form';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        if (isset($_GET['id'])) {
            $query = \Drupal::database()->select('my_database', 'md');
            $query->fields('md', ['id', 'number', 'teaser', 'text']);
            $query->condition('id', $_GET['id']);
            $record = $query->execute()->fetchAssoc();
        }
        $form['number'] = array(
            '#type' => 'textfield',
            '#required' => TRUE,
            '#placeholder' => 'number',
            '#default_value' => (isset($record['number']) && $_GET['id']) ? $record['number'] : '',

        );
        $form['teaser'] = array(
            '#type' => 'textfield',
            '#required' => TRUE,
            '#placeholder' => 'teaser',
            '#default_value' => (isset($record['teaser']) && $_GET['id']) ? $record['teaser'] : '',
        );

        $form['text'] = array(
            '#type' => 'textarea',
            '#required' => TRUE,
            '#placeholder' => 'text',
            '#default_value' => (isset($record['text']) && $_GET['id']) ? $record['text'] : '',
        );
        if (isset($record['text']) && $_GET['id']) {
            $submit_value = t('Update');
            $submit_name = $_GET['id'];
        } else {
            $submit_value = t('Submit');
            $submit_name = '';
        }
        $form['submit'] = array(
            '#type' => 'submit',
            '#value' => $submit_value,
            '#name' => $submit_name,
        );
        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state)
    {
        if (!is_numeric($form_state->getValue('number'))) {
            $form_state->setErrorByName('number', $this->t('Not number in number field !'));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        if ($form_state->getValue('submit') == 'Update') {

            $query = \Drupal::database();
            $query->update('my_database')
                ->fields([
                    'number' => $form_state->getValue('number'),
                    'teaser' => $form_state->getValue('teaser'),
                    'text' => $form_state->getValue('text'),
                ])
                ->condition('id', $_GET['id'])
                ->execute();
            drupal_set_message("succesfully updated");
        } else {

            $query = \Drupal::database();
            $query->insert('my_database')
                ->fields([
                    'number' => $form_state->getValue('number'),
                    'teaser' => $form_state->getValue('teaser'),
                    'text' => $form_state->getValue('text'),
                ])
                ->execute();
        }
    }

}