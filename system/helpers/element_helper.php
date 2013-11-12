<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

function element_get_user_role($user_roles = array()) {
  $CI = get_instance();
  $CI->load->model('Role_model');
  $roles = $CI->Role_model->dropdown('id', 'name');
  $user = array();
  foreach ($user_roles as $role){
    $user[] = $role['id'];
  }
  return bootstrap_form_dropdown('user_role[]', $user, array(
      'list' => $roles,
      'label' => 'User Role',
      'data-placeholder' => 'User Role',
      'style' => 'width:300px',
      'class' => 'chzn-select',
      'tabindex' => '13',
      'multiple' => NULL));
}

?>