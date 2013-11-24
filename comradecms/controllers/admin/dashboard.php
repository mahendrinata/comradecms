<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

namespace Controller\Admin\Dashboard;

class Dashboard extends Admin_Controller {

  public function index() {
    $this->load->view('admin/layout/default', $this->data);
  }

}

?>