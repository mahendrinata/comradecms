<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * App Controller use to add all function used by any user
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class App_Controller extends Behavior_controller {

  public static $segment_pagination = 4;
  public static $limit = 10;
  protected static $id;
  public $data = array();
  public static $layout;
  public static $layoutDefault;

  public function __construct() {
    parent::__construct();

    $this->data['class'] = $this->router->class;
    $this->data['method'] = ($this->router->class == $this->router->method) ? 'index' : $this->router->method;

    self::$id = $this->uri->segment(4);
  }

  public function error_message($action = NULL, $callback_action = FALSE, $message = NULL) {
    $actions = array(
        'insert' => array(
            TRUE => 'Anda berhasil melakukan penyimpanan data.',
            FALSE => 'Anda gagal melakukan penyimpanan data'),
        'update' => array(
            TRUE => 'Anda berhasil melakukan perubahan data.',
            FALSE => 'Anda gagal melakukan perubahan data.'),
        'delete' => array(
            TRUE => 'Anda berhasil menghapus data.',
            FALSE => 'Anda gagal menghapus data.'),
        'redirect' => array(
            TRUE => 'Halaman yang anda akses benar.',
            FALSE => 'Terjadi kesalahan pada halaman yang anda akses.'
        )
    );

    $message = (empty($message)) ? $actions[$action][$callback_action] : $message;
    $this->session->set_flashdata('message', array('alert' => ($callback_action) ? 'success' : 'error', 'message' => $message));
  }

  public function get_list($data = array(), $id = 'id', $name = 'name', $default = '- PILIHAN -') {
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

  protected function set_pagination($count = NULL, $suffix = NULL, $limit = NULL, $segment_pagination = NULL, $site_url = NULL) {
    $config['base_url'] = site_url((empty($site_url) ? $this->get_site_url_pagination() : $site_url));
    $config['total_rows'] = $count;
    $config['per_page'] = (empty($limit)) ? self::$limit : $limit;
    $config['uri_segment'] = (empty($segment_pagination)) ? self::$segment_pagination : $segment_pagination;
    $config['suffix'] = $suffix;
    return $config;
  }

  protected function get_pagination() {
    return $this->pagination->create_links();
  }

  protected function get_site_url_pagination($site_url = NULL) {
    return $this->router->directory . '/' . $this->data['class'] . '/' . $this->data['method'];
  }

  protected function get_offset_from_segment($segment_pagination = NULL) {
    $segment_pagination = (empty($segment_pagination)) ? self::$segment_pagination : $segment_pagination;
    return $this->uri->segment($segment_pagination);
  }

  protected function get_search_params($field = array()) {
    $params = array();
    if (isset($_GET) && !empty($_GET)) {
      foreach ($field as $key => $value) {
        $params[$value . ' LIKE'] = '%' . $_GET['search'] . '%';
      }
    }
    return $params;
  }

  protected function get_suffix_params() {
    $suffix = '';
    $params = $this->get_search_params();
    if (isset($_GET) && !empty($_GET)) {
      $str = array();
      foreach ($_GET as $key => $value) {
        $str[] = $key . '=' . $value;
      }
      $suffix = '?' . implode('&', $str);
    }
    return $suffix;
  }

  function get_password_salt() {
    $start = rand(0, 23);
    return md5(substr(md5(rand(1, 10000)), $start, 8));
  }

  function set_password($password = NULL, $password_salt = NULL) {
    $password_salt = (empty($password_salt)) ? $this->get_password_salt() : $password_salt;
    return md5($this->session->encryption_key . $password_salt . md5($password));
  }

  function get_validate_password($password = NULL, $user = NULL) {
    if ($this->set_password($password, $user->password_salt) == $user->password) {
      return TRUE;
    }
    return FALSE;
  }

  function set_encrype_user_data($data = array()) {
    $data['password_salt'] = $this->get_password_salt();
    $data['password'] = $this->set_password($data['password'], $data['password_salt']);
    return $data;
  }

  function unset_array($data = array(), $unsets = array()) {
    foreach ($unsets as $unset) {
      unset($data[$unset]);
    }
    return $data;
  }

}

?>