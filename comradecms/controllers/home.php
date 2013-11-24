<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Home extends Public_Controller {

  public function __construct() {
    parent::__construct();
    $contents = $this->Content_model->get_active_contents();
    print_r($contents);
  }

  
}

?>
