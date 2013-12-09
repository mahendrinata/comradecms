<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Detail extends Public_Controller {

  public function index($slug = NULL) {
    $this->data['content'] = $this->Content_model->get_content_by_type($slug);
    $this->load->view(self::$layout . 'default', $this->data);
  }

}

?>
