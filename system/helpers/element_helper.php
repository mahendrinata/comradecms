<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

function get_dropdown_user_role($user_roles = array(), $roles = array()) {
  if (empty($roles)) {
    $CI = get_instance();
    $CI->load->model('Role_model');
    $roles = $CI->Role_model->dropdown('id', 'name');
  }
  $user = array();
  foreach ($user_roles as $role) {
    $user[] = $role['role_id'];
  }
  return bootstrap_form_dropdown('user_role[][role_id]', $user, array(
      'list' => $roles,
      'label' => 'User Role',
      'data-placeholder' => 'User Role',
      'style' => 'width:300px',
      'class' => 'chzn-select',
      'tabindex' => '13',
      'multiple' => NULL));
}

function get_label_role($user_roles = array(), $roles = array()) {
  if (empty($roles)) {
    $CI = get_instance();
    $CI->load->model('Role_model');
    $roles = $CI->Role_model->dropdown('id', 'name');
  }
  $output = NULL;
  foreach ($user_roles as $role) {
    $output .= '<span class="label label-warning">' . $roles[$role['role_id']] . '</span><br/>';
  }
  return $output;
}

function get_label_active($status = NULL, $string = array('Not Active', 'Active'), $label = array('important', 'success')) {
  $status = (empty($status)) ? FALSE : $status;
  return '<span class="label label-' . $label[$status] . '">' . $string[$status] . '</span>';
}

?>