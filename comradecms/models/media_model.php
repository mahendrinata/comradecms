<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Media_model extends App_Model {
  
  public $belongs_to = array(
      'type',
      'content',
      'link',
      'user',
      'setting',
      'language'
  );
  
  function get_albums(){
    $this->load->model('Type_model');
    $type = $this->Type_model->get_by('slug', 'albums');

    $albums = $this->get_many_by(array('is_active' => TRUE, 'type_id' => $type['id'], 'parent_id' => NULL));
    
    return $albums;
  }
  
  function get_galleries($slug = NULL){
    $albums = $this->get_by('slug', $slug);

    $galleries = $this->get_many_by(array('is_active' => TRUE, 'parent_id' => $albums['id']));
    
    return $galleries;
  }

}

?>