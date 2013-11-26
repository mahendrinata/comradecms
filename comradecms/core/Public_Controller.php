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

    $this->set_settings();
  }

  function set_settings() {
    $this->load->model('Setting_model');

    $this->data['template_data'] = $this->Setting_model->get_active_template();
    self::$layout = self::$template_folder . '/' . $this->data['template']['value'] . '/layout/';
    self::$layout_default = self::$layout . $this->data['class'];

    $this->data['template'] = self::$template_folder . '/' . $this->data['template']['value'] . '/';
  }

}

?>