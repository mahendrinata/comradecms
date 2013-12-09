<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Category extends Public_Controller {

  public function index($slug = NULL) {
    $this->data['contents'] = $this->Content_model->get_contents_by_type($slug, self::$limit, $this->get_offset_from_segment(self::$offset));
    
    $this->pagination_create($this->Content_model->count_contents_by_type());
    
    $this->load->view(self::$layout_default, $this->data);
  }

}

?>
