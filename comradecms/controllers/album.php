<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Album extends Public_Controller {
  
  public function __construct() {
    parent::__construct();
    $this->load->model('Media_model');
  }

  public function index() {
    $$this->data['albums'] = $this->Media_model->get_albums();
    $this->load->view(self::$layout . 'default', $this->data);
  }

  public function gallery($slug = NULL) {
    $$this->data['albums'] = $this->Media_model->get_galleries($slug);
    $this->load->view(self::$layout . 'default', $this->data);
  }

}

?>
