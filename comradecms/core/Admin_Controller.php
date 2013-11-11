<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Admin Controller use to add all function admin used by user
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Admin_Controller extends App_Controller {

  protected static $id;
  protected static $uid;
  protected static $page;
  protected $skip_uid_validate = array('edit', 'remove', 'active');

  public function __construct() {
    parent::__construct();

    self::$layout = 'admin/layout/';
    self::$layout_default = self::$layout . 'default';

    self::$id = $this->uri->segment(4);
    self::$uid = self::$page = $this->uri->segment(5);
    /**
     * @author Mahendri Winata <mahen.0112@gmail.com>
     * 
     * Description :
     * Check User login status
     */
    if ($this->router->directory != 'admin' &&
            $this->router->class != 'user' &&
            $this->router->method != 'login' &&
            empty(self::$activeSession['admin'])) {
      $this->session->unset_userdata('admin');
      $this->session->set_flashdata('message', array('alert' => 'error', 'message' => 'Anda tidak dapat mengakses halaman admin.'));
      redirect('admin/user/login');
    }

    if (in_array($this->router->method, $this->skip_uid_validate) && (!empty(self::$id) && !empty(self::$uid))) {
      $this->validate_uid(self::$id, self::$uid);
    }
  }

  function after_save($type = NULL, $callback = NULL) {
    if ($callback) {
      redirect('admin/' . $this->router->class);
    }
    $this->error_message($type, $callback);
  }

}

?>