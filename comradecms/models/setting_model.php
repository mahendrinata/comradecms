<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Setting_model extends App_Model {

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

}

?>