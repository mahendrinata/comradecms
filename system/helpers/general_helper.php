<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

if (!function_exists('admin_base_url')) {

  function admin_base_url($folder = NULL) {
    return (empty($folder)) ? base_url() . 'assets/admin/' : base_url() . 'assets/admin/' . $folder . '/';
  }

}

if (!function_exists('admin_css')) {

  function admin_css($css = array()) {
    $output = '';
    foreach ($css as $style) {
      $output .= link_tag(admin_base_url('css') . $style . '.css');
    }
    return $output;
  }

}

if (!function_exists('admin_js')) {

  function admin_js($js = array()) {
    $output = '';
    foreach ($js as $script) {
      $output .= '<script type="text/javascript" src="' . admin_base_url('js') . $script . '.js' . '"></script>';
    }
    return $output;
  }

}

if (!function_exists('template_base_url')) {

  function template_base_url($folder = NULL) {
    return (empty($folder)) ? base_url() . 'assets/template/' : base_url() . 'assets/template/' . $folder . '/';
  }

}

if (!function_exists('template_css')) {

  function template_css($css = array()) {
    $output = '';
    foreach ($css as $style) {
      $output .= link_tag(template_base_url('css') . $style . '.css');
    }
    return $output;
  }

}

if (!function_exists('template_js')) {

  function template_js($js = array()) {
    $output = '';
    foreach ($js as $script) {
      $output .= '<script type="text/javascript" src="' . template_base_url('js') . $script . '.js' . '"></script>';
    }
    return $output;
  }

}
?>