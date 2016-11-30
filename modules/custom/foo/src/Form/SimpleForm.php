<?php

namespace Drupal\foo\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Driver\mysql\Connection;
use Symfony\Component\DependencyInjection\ContainerInterface;

class SimpleForm extends FormBase {

  public static function create(ContainerInterface $container){
    return new static (
      $container->get('foo.form_manager')
    );

  }


  public function getFormId() {
    return 'simple_form';
  }

  /**
   * Form constructor.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return array
   *   The form structure.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
  	$form['title'] = array(
      '#type' => 'textfield',
      '#title' => t('Title'),
      '#required' => TRUE,
    );

    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('submit'),
    );
    return $form;
  }

  /**
   * Form validation handler.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (strlen($form_state->getValue('title')) < 5) {
        $form_state->setErrorByName('title', $this->t('title must be minimum 5 character.'));
    }
  }

  /**
   * Form submission handler.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

  	$value = $form_state->getValue('title');
  	
  	//$result = $this->database->insert('foo')->fields(array('name' => $value))->execute();
  	if($result) {
  		drupal_set_message('Successfully submitted the value ' . $value, 'status');
  	}
    //foreach ($form_state->getValues() as $key => $value) {
     // drupal_set_message($key . ': ' . $value);
   // }

  }
  
}