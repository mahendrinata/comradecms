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
  public static $layout_default;
  public static $active_session;
  public static $post_data;
  public static $default_model;

  public function __construct() {
    parent::__construct();

    $this->data['class'] = $this->router->class;
    $this->data['method'] = ($this->router->class == $this->router->method) ? 'index' : $this->router->method;

    self::$id = $this->uri->segment(4);

    self::$active_session = $this->session->all_userdata();

    self::$post_data = $this->input->post();

    self::$default_model = ucfirst($this->data['class']) . '_model';

    if (file_exists(APPPATH . 'models/' . strtolower(self::$default_model) . '.php')) {
      $this->load->model(self::$default_model);
    }
  }

  public function error_message($action = NULL, $callback_action = FALSE, $message = NULL) {
    $actions = array(
        'create' => array(
            TRUE => 'Anda berhasil melakukan penyimpanan data.',
            FALSE => 'Anda gagal melakukan penyimpanan data'),
        'edit' => array(
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
    return uniqid();
  }

  function set_password($password = NULL, $password_salt = NULL) {
    $password_salt = (empty($password_salt)) ? $this->get_password_salt() : $password_salt;
    return md5($this->session->encryption_key . $password_salt . md5($password));
  }

  function get_validate_password($password = NULL, $user = NULL) {
    if ($this->set_password($password, $user['password_salt']) == $user['password']) {
      return TRUE;
    }
    return FALSE;
  }

  function set_encrype_user_data($data = array()) {
    $data['password_salt'] = $this->get_password_salt();
    $data['password_secure'] = $this->set_password($data['password'], $data['password_salt']);
    return $data;
  }

  function unset_array($data = array(), $unsets = array()) {
    foreach ($unsets as $unset) {
      unset($data[$unset]);
    }
    return $data;
  }

  function get_uid($id = NULL) {
    return md5($this->session->encryption_key . plural($this->router->class) . $id);
  }

  function validate_uid($id = NULL, $uid = NULL) {
    if ($this->get_uid($id) != $uid) {
      $this->error_message('redirect');
      redirect('admin/' . $this->router->class);
    }
  }

  function get_post_data($field = NULL, $unset = TRUE) {
    if (isset(self::$post_data[$field])) {
      $data = self::$post_data[$field];
      if ($unset) {
        unset(self::$post_data[$field]);
      }
      return $data;
    }
    return array();
  }

  function set_slug_post_data($name = 'name', $model = NULL) {
    $model = (empty($model)) ? self::$default_model : $model;
    if (empty(self::$post_data['slug'])) {
      $slug = url_title(self::$post_data[$name], 'dash', TRUE);
      $privilege = $this->{$model}->get_many_by('slug', $slug);
      if (!empty($privilege)) {
        self::$post_data['slug'] = $slug . '-' . (count($privilege) + 1);
      } else {
        self::$post_data['slug'] = $slug;
      }
    }
  }

}

?>