<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Admin Controller use to add all function admin used by user
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Admin_Controller extends App_Controller {

  public function __construct() {
    parent::__construct();

    self::$layout = 'admin/layout/';
    self::$layoutDefault = self::$layout . 'default';
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
    
    $id = $this->uri->segment(4);
    $uid = $this->uri->segment(5);
    if (($this->router->method == 'edit' || $this->router->method == 'remove') && (!empty($id) && !empty($uid))) {
      $this->validate_uid($id, $uid);
    }
  }

}

?>