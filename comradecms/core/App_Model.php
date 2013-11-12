<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * App Model use to add all behavior model
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class App_model extends Behavior_Model {

  protected $return_type = 'array';
  public $before_create = array('created_at', 'updated_at');
  public $before_update = array('updated_at');
  public $after_get = array('set_uid');

  function __construct() {
    parent::__construct();
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

  function get_uid($id = NULL) {
    return md5($this->_database->CACHE->CI->config->config['encryption_key'] . $this->_table . $id);
  }

  function set_uid($row) {
    return array_merge($row, array('uid' => $this->get_uid($row['id'])));
  }

  function save_data_after($rows = array(), $field = NULL, $id = NULL, $delete = FALSE, $skip_validation = TRUE) {
    $data = array();
    $i = 0;
    foreach ($rows as $row) {
      $data[$i] = $row;
      $data[$i][$field] = $id;
      $i++;
    }
    if ($delete) {
      $this->delete_by($field, $id);
    }
    if (!empty($data)) {
      return $this->insert_many($data, $skip_validation);
    } else {
      return FALSE;
    }
  }

}

?>