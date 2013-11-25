<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Public Controller use to add all function used by guest user
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Public_Controller extends App_Controller {

  public static $template_folder = 'template';

  public function __construct() {
    parent::__construct();

    self::$layout = 'template/test/user/';
    self::$layout_default = self::$layout . 'default';

    $this->set_settings();
  }

  function set_settings() {
    $this->load->model('Setting_model');

    $this->data['template'] = $this->Setting_model->get_active_template();
    self::$layout = self::$template_folder . '/' . $this->data['template']['value'] . '/layout/';
    self::$layout_default = self::$layout . $this->data['class'];

    print_r($this->data['template']);
    die;
  }

}

?>