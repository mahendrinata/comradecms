<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Album extends Public_Controller {

  public function index() {
    $this->load->model('Media_model');
    $$this->data['albums'] = $this->Media_model->get_albums();
    $this->load->view(self::$layout_default, $this->data);
  }
  
  public function gallery($slug = NULL){
    $this->load->model('Media_model');
    $$this->data['albums'] = $this->Media_model->get_galleries($slug);
    $this->load->view(self::$layout_default, $this->data);
  }

}

?>
