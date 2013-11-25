<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Home extends Public_Controller {

  public function index() {
    $this->load->model('Content_model');
    $$this->data['contents'] = $this->Content_model->get_contents(TRUE);
    
    $this->data['portfolios'] = $this->Content_model->get_contents_by_type('portfolio');
    $this->load->view(self::$layout_default, $this->data);
  }

}

?>
