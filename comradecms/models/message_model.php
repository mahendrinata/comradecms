<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Message_model extends App_Model {

    public $fields = array(
        array('name' => 'id', 'type' => 'integer', 'require' => TRUE, 'primary_key' => TRUE, 'auto_increment' => TRUE),
        array('name' => 'name', 'type' => 'varchar', 'require' => TRUE),
        array('name' => 'email', 'type' => 'varchar', 'require' => TRUE),
        array('name' => 'title', 'type' => 'varchar', 'require' => TRUE),
        array('name' => 'description', 'type' => 'text'),
        array('name' => 'parent_id', 'type' => 'integer', 'index' => TRUE),
        array('name' => 'content_id', 'type' => 'integer', 'index' => TRUE),
        array('name' => 'is_active', 'type' => 'boolean'),
        array('name' => 'is_read', 'type' => 'boolean'),
        array('name' => 'created_at', 'type' => 'datetime'),
        array('name' => 'updated_at', 'type' => 'datetime'),
    );
    public $belongs_to = array('content');

    public function get_count_comments($content_id = NULL) {
        return $this->count_by('content_id', $content_id);
    }

    public function get_comments($content_id = NULL) {
        return $this->get_many('content_id', $content_id);
    }

}

?>