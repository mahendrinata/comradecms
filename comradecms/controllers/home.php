<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Home extends Public_Controller {
  
  public function __construct() {
    self::$offset = 3;
    parent::__construct();
  }

  public function index() {
    $this->load->model('Content_model');    
    $this->data['contents'] = $this->Content_model->get_contents(self::$limit, $this->get_offset_from_segment(self::$offset));
    
    $count = $this->Content_model->count_contents();
    $this->data['pagination'] = $this->pagination_create('home/index', $count, self::$limit, self::$offset);
    
    $this->data['portfolios'] = $this->Content_model->get_contents_by_type('portfolio', 8);
    $this->load->view(self::$layout_default, $this->data);
  }
  
}

?>
