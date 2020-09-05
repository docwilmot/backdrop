<?php
/**
 * @file
 * Theme settings file for Bartik.
 */

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function bartik_form_system_theme_settings_alter(&$form, &$form_state) {
  if (module_exists('color')) {
    $form['tabs_wrapper'] = array(
      '#type' => 'fieldset',
      '#title' => t('Main menu tab style'),
    );
    $form['tabs_wrapper']['main_menu_tabs'] = array(
      '#type' => 'radios',
      '#options' => array(
        'no-tabs' => t('No tabs'),
        'rounded-tabs' => t('Rounded tabs'),
        'square-tabs' => t('Square tabs'),
      ),
      '#default_value' => theme_get_setting('main_menu_tabs', 'bartik'),
      '#description' => t('When rounded or square tabs are selected, menu link color is overridden and set to #333 for better visibility.'),
    );
  }
  elseif (user_access('administer modules')) {
    $form['color'] = array(
      '#markup' => '<p>' . t('This theme supports custom color palettes if the Color module is enabled on the <a href="!url">modules page</a>. Enable the Color module to customize this theme.', array('!url' => url('admin/modules'))) . '</p>',
    );
  }
  else {
    $form['color'] = array(
      '#markup' => '<p>' . t('This theme supports custom color palettes if the Color module is enabled. Contact your website administrator to enable the Color module to customize this theme.') . '</p>',
    );
  }
}
