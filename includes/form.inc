<?php
/**
 * Implements hook_form_alter().
 */
function nuboot_form_alter(&$form, &$form_state, $form_id) {
  //drupal_set_message('<pre>' . print_r($form, TRUE) . '</pre>');
  switch ($form_id) {
    case 'colorizer_admin_settings':
      $form['colorizer_global']['colorizer_cssfile']['#default_value'] = 'colorizer/colorizer.css';
      $form['colorizer_global']['colorizer_incfile']['#default_value'] = 'colorizer/colorizer.inc';
      break;

    case 'search-form':
    case 'dkan_sitewide_dataset_search_form':
    case 'views_exposed_form':
      unset($form['input']['#edit-submit--2']);
      //drupal_set_message('<pre>' . print_r($form, TRUE) . '</pre>');
      $form['input'] = array(
        '#type' => 'submit',
        //'#value' => t('Search'),
        // Use fontawesome icon.
        '#value' => decode_entities('&#xf002;'),
      );
      return $form;
      break;

  }
}
