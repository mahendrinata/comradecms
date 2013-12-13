<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Setting_model extends App_Model {

  public $fields = array(
      array('name' => 'id', 'type' => 'integer', 'require' => TRUE, 'primary_key' => TRUE, 'auto_increment' => TRUE),
      array('name' => 'slug', 'type' => 'varchar', 'require' => TRUE, 'unique' => TRUE, 'index' => TRUE),
      array('name' => 'name', 'type' => 'varchar', 'require' => TRUE),
      array('name' => 'value', 'type' => 'text'),
      array('name' => 'priority', 'type' => 'integer'),
      array('name' => 'is_active', 'type' => 'boolean'),
      array('name' => 'is_default', 'type' => 'boolean'),
      array('name' => 'is_hide', 'type' => 'boolean'),
      array('name' => 'created_at', 'type' => 'datetime'),
      array('name' => 'updated_at', 'type' => 'datetime'),
  );
  public $belongs_to = array('type');
  public $validate = array(
      array(
          'field' => 'slug',
          'label' => 'slug',
          'rules' => 'required|alpha_dash|is_unique[privileges.slug]'
      ),
      array(
          'field' => 'name',
          'label' => 'Name',
          'rules' => 'required'
      ),
      array(
          'field' => 'value',
          'label' => 'Value',
          'rules' => 'required'
      ),
      array(
          'field' => 'priority',
          'label' => 'Priority',
          'rules' => 'required'
      ),
      array(
          'field' => 'type_id',
          'label' => 'Type',
          'rules' => 'required'
      ),
  );

  function get_active_template() {
    $this->load->model('Type_model');
    $type = $this->Type_model->get_by('slug', 'template');

    return $this->get_by(array('type_id' => $type['id'], 'is_active' => TRUE));
  }

  function get_settings_mapper_slug() {
    $contents = $this->find('all', array(
        'join' => array(
            'type' => array('left' => 'types.id = settings.type_id')
        ),
        'condition' => array(
            'setting' => array(
                'is_active' => TRUE
            )
        )
    ));

    return $this->mapper_slug($contents);
  }

  function get_settings_by_type($slug = NULL, $data = array()) {
    foreach ($data as $row) {
      if ($row['Type']['slug'] == $slug) {
        return $row[$this->model_object_word($this->_table)];
      }
    }
    return array();
  }

}

?>