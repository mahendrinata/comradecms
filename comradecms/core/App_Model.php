<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * App Model use to add all behavior model
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class App_model extends Behavior_Model {

  protected $return_type = 'array';

  function __construct() {
    parent::__construct();
  }

  public function get_list($data = array(), $id = 'id', $name = 'name', $default = '- PILIHAN -') {
    $list = array(NULL => $default);
    foreach ($data as $value) {
      if (is_array($data)) {
        $list[$value[$id]] = $value[$name];
      } elseif (is_object($data)) {
        $list[$value->{$id}] = $value->{$name};
      }
    }
    return $list;
  }

  public function get_data($type = NULL, $conditions = array()) {

    $this->db->from($this->_table);

    if (isset($conditions['field']))
      $this->db->select($conditions['field']);
    else
      $this->db->select('*');

    if (isset($conditions['condition']))
      $this->db->where($conditions['condition']);

    if (isset($conditions['limit'])) {
      if (isset($conditions['offset']))
        $this->db->limit($conditions['limit'], $conditions['offset']);
      else
        $this->db->limit($conditions['limit']);
    }

    $data = $this->db->get();

    switch ($type) {
      case 'all':
        $return = (!isset($conditions['is_object'])) ? $data->result_array() : $data->result();
        break;
      case 'first':
        $return = (!isset($conditions['is_object'])) ? $data->row_array() : $data->row();
        break;
      case 'count':
        $return = $data->num_rows();
        break;
    }

    return $return;
  }

}

?>