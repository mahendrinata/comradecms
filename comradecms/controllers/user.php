<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

namespace Controller\User;

/**
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class User extends Public_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('User_model', '', TRUE);
  }

}

?>