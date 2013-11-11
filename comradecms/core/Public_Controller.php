<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Public Controller use to add all function used by guest user
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Public_Controller extends App_Controller {

  public function __construct() {
    parent::__construct();

    self::$layout = 'template/test/user/';
    self::$layout_default = self::$layout . 'default';

    /**
     * @author Mahendri Winata <mahen.0112@gmail.com>
     * 
     * Description :
     * Check User login status
     */
    if ($this->get_login_status() && ($this->router->class == 'user' && $this->router->method == 'login')) {
      redirect('admin/dashboard');
    }
  }

}

?>