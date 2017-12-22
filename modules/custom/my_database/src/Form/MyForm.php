<?php

namespace Drupal\my_database\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;


/**
*  form.
*/
class MyForm extends FormBase {
 /**
  * {@inheritdoc}
  */
 public function getFormId() {
   return 'my_form';
 }

 /**
  * {@inheritdoc}
  */
 public function buildForm(array $form, FormStateInterface $form_state) {
   $form['number'] = array(
     '#type' =>'textfield',
'#required' => TRUE,
       '#placeholder' => 'number',
);
     $form['teaser'] = array(
         '#type' =>'textfield',
         '#required' => TRUE,
         '#placeholder' => 'teaser',
     );

     $form['text'] = array(
         '#type' =>'textarea',
         '#required' => TRUE,
         '#placeholder' => 'text',
     );

$form['submit'] = array(
'#type' => 'submit',
'#value' => t('Submit'),
//'#name' => 'form-submit',
);
return $form;
}

/**
* {@inheritdoc}
*/
public function validateForm(array &$form, FormStateInterface $form_state) {
    if (!is_numeric($form_state->getValue('number'))){
   $form_state->setErrorByName('number', $this->t('Not number in number field !'));
    }
}
/**
* {@inheritdoc}
*/
public function submitForm(array &$form, FormStateInterface $form_state) {

        $query = \Drupal::database()->insert('my_database');
        $query->fields([
            'number' => $form_state->getValue('number'),
            'teaser' => $form_state->getValue('teaser'),
            'text' => $form_state->getValue('text'),
        ]);
        $query->execute();
        // foreach ($form_state->getValues() as $key => $value) {
        //drupal_set_message($key . ': ' . $value);
    //}
}
}