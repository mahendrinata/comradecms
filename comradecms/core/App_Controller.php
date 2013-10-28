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
  protected static $update_id;
  public static $sessionLogin;
  public $data = array();

  public function __construct() {
    parent::__construct();

    self::$sessionLogin = $this->session->all_userdata();
    $this->data['class'] = $this->router->class;
    $this->data['method'] = ($this->router->class == $this->router->method) ? 'index' : $this->router->method;

    self::$id = $this->uri->segment(4);
    self::$update_id = $this->get_update_id();
  }

  /**
   * @author Mahendri Winata <mahen.0112@gmail.com>
   * 
   * @param string $action
   * @param boolean $callback_action
   * @param string $message
   */
  protected function error_message($action = NULL, $callback_action = FALSE, $message = NULL) {
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

    $alert = array(
        TRUE => 'success',
        FALSE => 'error'
    );

    $message = (empty($message)) ? $actions[$action][$callback_action] : $message;
    $this->session->set_flashdata('message', array('alert' => $alert[$callback_action], 'message' => $message));
  }

  protected function get_login_status() {
    if (isset(self::$sessionLogin[md5($this->session->encryption_key . 'login')]) && self::$sessionLogin[md5($this->session->encryption_key . 'login')] == md5($this->session->encryption_key . TRUE)) {
      return TRUE;
    }
    return FALSE;
  }

  protected function get_login_active_id() {
    return self::$sessionLogin[md5($this->session->encryption_key . 'id')];
  }

  protected function get_login_active_name() {
    return self::$sessionLogin[md5($this->session->encryption_key . 'name')];
  }

  protected function get_list($data = NULL) {
    $list = array();
    $list[NULL] = '- PILIHAN -';
    foreach ($data as $value) {
      $list[$value->id] = $value->name;
    }
    return $list;
  }

  protected function get_list_title($data = NULL) {
    $list = array();
    $list[NULL] = '- PILIHAN -';
    foreach ($data as $value) {
      $list[$value->id] = $value->title;
    }
    return $list;
  }

  protected function set_data_before_update($data = array()) {
    if (isset($data['id']))
      unset($data['id']);
    return $data;
  }

  protected function get_password_salt() {
    $start = rand(0, 23);
    return md5(substr(md5(rand(1, 10000)), $start, 8));
  }

  protected function set_password($password = NULL, $password_salt = NULL) {
    $password_salt = (empty($password_salt)) ? $this->get_password_salt() : $password_salt;
    return md5($this->session->encryption_key . $password_salt . md5($password));
  }

  protected function get_validate_password($password = NULL, $user = NULL) {
    if ($this->set_password($password, $user->password_salt) == $user->password) {
      return TRUE;
    }
    return FALSE;
  }

  protected function set_encrype_user_data($data = array()) {
    unset($data['confirmation_password']);
    $data['password_salt'] = $this->get_password_salt();
    $data['password'] = $this->set_password($data['password'], $data['password_salt']);
    return $data;
  }

  protected function set_data_session($data = array()) {
    $session = array();
    foreach ($data as $key => $value) {
      $session[md5($this->session->encryption_key . $key)] = $value;
    }
    return $session;
  }

  protected function set_tree_data($data = array(), $parent = NULL) {
    $tree = array();
    foreach ($data as $item) {
      $tree[$item->id] = $item;
      $tree[$item->id]->Children = array();
    }

    foreach ($tree as $key => $val) {
      $tree[$val->parent_id]->Children[$key] = & $tree[$key];
    }
    return $tree[$parent]->Children;
  }

  protected function set_before_pagination($count = NULL, $suffix = NULL, $limit = NULL, $segment_pagination = NULL, $site_url = NULL) {
    $config['base_url'] = site_url((empty($site_url) ? $this->get_site_url_pagination() : $site_url));
    $config['total_rows'] = $count;
    $config['per_page'] = (empty($limit)) ? self::$limit : $limit;
    $config['uri_segment'] = (empty($segment_pagination)) ? self::$segment_pagination : $segment_pagination;
    $config['suffix'] = $suffix;
    return $config;
  }

  protected function set_after_pagination() {
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

  protected function get_encrype_site_url($url = NULL) {
    $url = (empty($url)) ? $this->get_site_url_pagination() : $url;
    return md5($url);
  }

  protected function set_update_id($id = NULL, $url = NULL) {
    $data = array('update' => array($this->get_encrype_site_url($url) => $id));
    $this->session->set_userdata($data);
  }

  protected function get_update_id() {
    $data = $this->session->userdata('update');
    $this->session->unset_userdata('update');
    return (isset($data[$this->get_encrype_site_url()])) ? $data[$this->get_encrype_site_url()] : NULL;
  }

  protected function upload_image($field = 'image') {
    $dir = './webroot/content/images/';
    $image_name = strtolower(rand(1, 10000) . '_' . $_FILES[$field]['name']);
    $upload = array(
        'upload_path' => $dir,
        'allowed_types' => '*',
        'max_size' => '1024000',
        'file_name' => $image_name);


    $this->load->library('upload', $upload);
    if ($this->upload->do_upload($field)) {
      $image = $this->upload->data();
      chmod($image['full_path'], 0777);

      $thumb = array(
          'image_library' => 'GD2',
          'source_image' => $image['full_path'],
          'new_image' => $dir . '/thumb_' . $image_name,
          'quality' => 100,
          'maintain_ratio' => FALSE,
          'width' => 128,
          'height' => 128);

      $this->load->library('image_lib');
      $this->image_lib->initialize($thumb);
      $this->image_lib->resize();
      $this->image_lib->clear();

      $thumb['maintain_ratio'] = TRUE;
      $thumb['width'] = 350;
      $thumb['height'] = 149;
      $thumb['new_image'] = $dir . '/medium_' . $image_name;
      $this->image_lib->initialize($thumb);
      $this->image_lib->resize();
      $this->image_lib->clear();

      $thumb['width'] = 700;
      $thumb['height'] = 298;
      $thumb['new_image'] = $dir . '/large_' . $image_name;
      $this->image_lib->initialize($thumb);
      $this->image_lib->resize();
      $this->image_lib->clear();

      return $image_name;
    } else {
      return NULL;
    }
  }

  protected function upload_excel($field = 'file') {
    $dir = './webroot/content/excel/';
    $file_name = strtolower(rand(1, 10000) . '_' . str_replace(' ', '_', $_FILES[$field]['name']));
    $upload = array(
        'upload_path' => $dir,
        'allowed_types' => '*',
        'file_name' => $file_name);

    $this->load->library('upload', $upload);
    if ($this->upload->do_upload($field)) {
      $upload_data = $this->upload->data();
      chmod($upload_data['full_path'], 0777);
      return $file_name;
    } else {
      return FALSE;
    }
  }

  protected function get_is_parent_status($parent_id = NULL, $data = array()) {
    foreach ($data as $key => $value) {
      if ($value->parent_id == $parent_id) {
        return TRUE;
      }
    }
    return FALSE;
  }

  protected function set_data_with_parent($data = array()) {
    foreach ($data as $key => $value) {
      $data[$key]->is_parent = $this->get_is_parent_status($value->master_tabular_id, $data);
    }
    return $data;
  }

  public function debug($data = NULL, $die = FALSE) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    if ($die) {
      die;
    }
  }

}

?>