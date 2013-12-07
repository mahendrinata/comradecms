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
    return (empty($folder)) ? base_url() . 'assets/template/' : base_url() . 'assets/' . $folder . '/';
  }

}

if (!function_exists('template_css')) {

  function template_css($css = array(), $folder = NULL) {
    $output = '';
    foreach ($css as $style) {
      $output .= link_tag(template_base_url($folder . 'css') . $style . '.css');
    }
    return $output;
  }

}

if (!function_exists('template_js')) {

  function template_js($js = array(), $folder = NULL) {
    $output = '';
    foreach ($js as $script) {
      $output .= '<script type="text/javascript" src="' . template_base_url($folder . 'js') . $script . '.js' . '"></script>';
    }
    return $output;
  }

}

if (!function_exists('get_list')) {

  function get_list($data = array(), $id = 'id', $name = 'name', $default = '- PILIHAN -') {
    $list = array(NULL => $default);
    foreach ($data as $value) {
      if (is_array($data)) {
        $list[$value[$id]] = $value[$name];
      } elseif (is_object($data)) {
        $list[$value->{$id}] = $value->{$name};
      }
    }
    return $list;
  }

}

if (!function_exists('get_link')) {

  function get_link($link = NULL, $data = array(), $uid = FALSE) {
    if (empty($data)) {
      return base_url() . $link;
    } else {
      if ($uid) {
        return base_url() . $link . '/' . $data['id'] . '/' . $data['uid'];
      } else {
        return base_url() . $link . '/' . $data['id'];
      }
    }
  }

}

function in_multiarray($elem, $array, $field) {
  $top = sizeof($array) - 1;
  $bottom = 0;
  while ($bottom <= $top) {
    if ($array[$bottom][$field] == $elem)
      return true;
    else
    if (is_array($array[$bottom][$field]))
      if (in_multiarray($elem, ($array[$bottom][$field])))
        return true;

    $bottom++;
  }
  return false;
}

function get_user_avatar($photo = NULL) {
  $photo = (empty($photo)) ? 'avatar.png' : $photo;
  return base_url() . 'assets/property/photo/' . $photo;
}

function get_content_media($photo = NULL, $type = NULL) {
  $type = (empty($type)) ? NULL : $type . '-';
  return base_url() . 'assets/property/content/' . $type . $photo;
}

function get_content_url($slug = NULL) {
  if (empty($slug)) {
    return '#';
  } else {
    return base_url() . 'detail/' . $slug;
  }
}

function get_full_name($user = array()) {
  return implode(' ', array($user['first_name'], $user['middle_name'], $user['last_name']));
}

function datetime_to_date($datetime){
  return date('d/m/Y', strtotime($datetime));
}

?>