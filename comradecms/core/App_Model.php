<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * App Model use to add all behavior model
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class App_model extends Behavior_Model {

  protected $return_type = 'array';
  public $before_create = array('set_slug', 'created_at', 'updated_at');
  public $before_update = array('updated_at');
  public $after_get = array('set_uid');
  public static $active_session;

  function __construct() {
    parent::__construct();
    $this->load->library('session');
    self::$active_session = $this->session->all_userdata();
  }

  public function get_fields($models = array(), $string = TRUE) {
    $string_field = array();
    if (empty($models)) {
      foreach ($fields as $field) {
        $string_field[] = $this->_table . '.' . $field['name'] . ' AS ' . $this->_table . '__' . $field['name'];
      }
    } else {
      foreach ($models as $model) {
        $this_model = $model . '_model';
        $this->load->model($this_model);
        $fields_model = $this->{$this_model}->fields;
        foreach ($fields_model as $f) {
          $string_field[] = $this->{$this_model}->_table . '.' . $f['name'] . ' AS ' . $this->{$this_model}->_table . '__' . $f['name'];
        }
      }
    }
    if ($string) {
      return implode(',', $string_field);
    } else {
      return $string_field;
    }
  }

  public function set_fields($tables = array(), $string = TRUE) {
    $string_field = array();
    foreach ($tables as $table_name => $fields) {
      foreach ($fields as $field) {
        $string_field[] = $table_name . '.' . $field . ' AS ' . $table_name . '__' . $field;
      }
    }
    if ($string) {
      return implode(',', $string_field);
    } else {
      return $string_field;
    }
  }

  public function set_condition_value($field = NULL, $value = NULL) {
    $operations = explode(' ', $field);
    if (count($operations) == 1) {
      return $field . ' = "' . $value . '"';
    } else {
      return $field . ' "' . $value . '"';
    }
  }

  public function set_conditions($tables = array(), $string = TRUE) {
    $string_condition = array();
    foreach ($tables as $table_name => $fields) {
      foreach ($fields as $field => $value) {
        $field_name = $table_name . '.' . $field;
        if (!is_array($value)) {
          $string_condition[] = $this->set_condition_value($field_name, $value);
        } elseif ($field == 'OR' && is_array($value)) {
          $ors = array();
          foreach ($value as $field_or => $or) {
            $ors[] = $this->set_condition_value($table_name . '.' . $field_or, $or);
          }
          $string_condition[] = '(' . implode(' OR ', $ors) . ')';
        } elseif (is_array($value)) {
          $in = '("' . implode('",', $value) . '")';
          $string_condition[] = $field_name . ' IN ' . $in;
        }
      }
    }
    if ($string) {
      return implode(' AND ', $string_condition);
    } else {
      return $string_condition;
    }
  }

  function set_join_tables($tables = array(), $string = TRUE) {
    $string_join = array();
    foreach ($tables as $tables => $joins) {
      foreach ($joins as $position => $join) {
        $string_join[] = (!is_numeric($position)) ? $position : NULL . ' JOIN' . $tables . ' ON ' . $join;
      }
    }
    if ($string) {
      return implode(' ', $string_join);
    } else {
      return $string_join;
    }
  }

  public function get_data($type = NULL, $conditions = array()) {

    $query = array();

    if (isset($conditions['fields']) && !empty($conditions['fields'])) {
      foreach ($conditions['fields'] as $table => $fields) {
        if (is_array($fields) && !empty($fields)) {
          $string_fields[] = $this->set_fields(array($table => $fields));
        } else {
          $string_fields[] = $this->get_fields(array($table));
        }
      }
      $query[] = 'SELECT ' . implode(',', $string_fields);
    } else {
      $query[] = 'SELECT *';
    }

    if (isset($conditions['from']) && !empty($conditions['from'])) {
      $query[] = 'FROM ' . $conditions['from'];
    } else {
      $query[] = 'FROM ' . $this->_table;
    }

    if (isset($conditions['join']) && !empty($conditions['join'])) {
      $query[] = $this->set_join_tables($conditions['join']);
    }

    if (isset($conditions['condition']) && !empty($conditions['condition'])) {
      $query[] = $this->set_conditions($conditions['condition']);
    }

    if (isset($conditions['limit'])) {
      if (isset($conditions['offset'])) {
        $query[] = 'LIMIT ' . $conditions['limit'] . ',' . $conditions['offset'];
      } else {
        $query[] = 'LIMIT ' . $conditions['limit'];
      }
    }

    $data = $this->db->query(implode(' ', $query));

    switch ($type) {
      case 'all':
        $return = (isset($conditions['return']) && $conditions['return'] == 'object') ? $data->result_array() : $data->result();
        break;
      case 'first':
        $return = (isset($conditions['is_object']) && $conditions['return'] == 'object') ? $data->row_array() : $data->row();
        break;
      case 'count':
        $return = $data->num_rows();
        break;
    }

    return $return;
  }

  function get_uid($id = NULL) {
    return md5($this->session->encryption_key . $this->_table . $id);
  }

  function set_uid($row) {
    if (!empty($row))
      return array_merge($row, array('uid' => $this->get_uid($row['id'])));
    else
      return array();
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

  function set_slug($row) {
    if (isset($row['slug']) && empty($row['slug'])) {
      $slug = url_title((isset($row['name'])) ? $row['name'] : $row['title'], 'dash', TRUE);
      $count = $this->count_by('slug', $slug);
      if ($count > 0) {
        $row['slug'] = $slug . '-' . ($count + 1);
      } else {
        $row['slug'] = $slug;
      }
    }
    return $row;
  }

  function remove_or_hide($id = NULL) {
    $data = $this->get_by('id', $id);
    if (isset($data['is_default']) && $data['is_default']) {
      $remove = $this->update($id, array('is_hide' => TRUE), TRUE);
    } else {
      $remove = $this->delete($id);
    }
    return $remove;
  }

  function set_status($id = NULL) {
    $data = $this->get_by('id', $id);
    if ($data['is_active']) {
      $edit = $this->update($id, array('is_active' => FALSE), TRUE);
    } else {
      $edit = $this->update($id, array('is_active' => TRUE), TRUE);
    }
    return $edit;
  }

  function set_tree_data($data = array(), $parent = 'parent_id', $id = 'id', $child = 'child') {
    $new_data = array();
    foreach ($data as $value) {
      $new_data[$value[$parent]][] = $value;
    }
    $tree = $this->tree_data($new_data, array($data[0]), $id, $child);
    return $tree;
  }

  function tree_data(&$data = array(), $id = 'id', $child = 'child') {
    $tree = array();
    foreach ($data as $key => $val) {
      if (isset($data[$val[$id]])) {
        $val[$child] = $this->tree_data($data, $data[$val[$id]], $id, $child);
      }
      $tree[] = $val;
    }
    return $tree;
  }

}

?>