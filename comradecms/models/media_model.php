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

  function get_albums() {
    $this->load->model('Type_model');
    $type = $this->Type_model->get_by('slug', 'albums');

    $albums = $this->get_many_by(array('is_active' => TRUE, 'type_id' => $type['id'], 'parent_id' => NULL));

    return $albums;
  }

  function get_galleries($slug = NULL) {
    $albums = $this->get_by('slug', $slug);

    $galleries = $this->get_many_by(array('is_active' => TRUE, 'parent_id' => $albums['id']));

    return $galleries;
  }

  function get_random_gallery($limit = 10, $conditions = array()) {
    $conditions = array_merge(array(
        'medias.is_active' => TRUE,
        'contents.is_active' => TRUE,
        'contents.is_hide' => FALSE,
        'content_details.language_id' => self::$active_session['language']['id']
            ), $conditions);

    $this->_database
            ->select('medias.*, content_details.slug, content_details.title')
            ->join('contents', 'contents.id = medias.content_id', 'INNER')
            ->join('content_details', 'contents.id = content_details.content_id', 'INNER')
            ->limit($limit)
            ->order_by('RAND()');

    return $this->get_many_by($conditions);
  }

}

?>