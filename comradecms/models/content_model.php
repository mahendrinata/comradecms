<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Content_model extends App_Model {

    public $fields = array(
        array('name' => 'id', 'type' => 'integer', 'require' => TRUE, 'primary_key' => TRUE, 'auto_increment' => TRUE),
        array('name' => 'start', 'type' => 'datetime'),
        array('name' => 'end', 'type' => 'datetime'),
        array('name' => 'latitude', 'type' => 'varchar'),
        array('name' => 'latitude', 'type' => 'varchar'),
        array('name' => 'latitude', 'type' => 'varchar'),
        array('name' => 'counter', 'type' => 'integer', 'require' => TRUE, 'default' => 0),
        array('name' => 'is_active', 'type' => 'boolean'),
        array('name' => 'is_hide', 'type' => 'boolean'),
        array('name' => 'user_id', 'type' => 'integer', 'index' => TRUE),
        array('name' => 'created_at', 'type' => 'datetime'),
        array('name' => 'updated_at', 'type' => 'datetime'),
    );
    public $has_many = array(
        'content_detail',
        'content_tag',
        'content_type',
        'media',
        'message'
    );
    public $belongs_to = array('user');

    /**
     * 
     * @param bolean $active
     * @param bolean $hide
     * @return array
     */
    function get_contents($limit = NULL, $offset = NULL) {
        $contents = $this->find('all', array(
            'join' => array(
                'content_detail' => array('left' => 'contents.id = content_details.content_id'),
                'user' => array('left' => 'contents.user_id = users.id'),
            ),
            'condition' => array(
                'content' => array(
                    'is_hide' => FALSE,
                    'is_active' => TRUE
                ),
                'content_detail' => array(
                    'language_id' => self::$active_session['language']['id']
                )
            ),
            'order' => array('contents.id DESC'),
            'limit' => $limit,
            'offset' => $offset
        ));
        $this->load->model('Content_tag_model');
        $this->load->model('Content_type_model');
        $this->load->model('Media_model');
        $this->load->model('Message_model');
        foreach ($contents as $key => $row) {
            $contents[$key]['ContentTag'] = $this->Content_tag_model->get_content_tags($row['Content']['id']);
            $contents[$key]['ContentType'] = $this->Content_type_model->get_content_types($row['Content']['id']);
            $contents[$key]['ContentMedia'] = $this->Media_model->get_content_medias($row['Content']['id']);
            $contents[$key]['Comment']['count'] = $this->Message_model->get_count_comments($row['Content']['id']);
        }
        return $contents;
    }

    function count_contents() {
        $count = $this->find('count', array(
            'join' => array(
                'content_detail' => array('left' => 'contents.id = content_details.content_id'),
            ),
            'condition' => array(
                'content' => array(
                    'is_hide' => FALSE,
                    'is_active' => TRUE
                ),
                'content_detail' => array(
                    'language_id' => self::$active_session['language']['id']
                )
            ),
            'order' => array('contents.id DESC'),
        ));
        return $count;
    }

    /**
     * 
     * @param int $id
     * @return array
     */
    function get_content($id = NULL) {
        $content = $this->find('first', array(
            'join' => array(
                'content_detail' => array('left' => 'contents.id = content_details.content_id'),
                'user' => array('left' => 'contents.user_id = users.id'),
            ),
            'condition' => array(
                'content' => array(
                    'id' => $id,
                    'is_hide' => FALSE,
                    'is_active' => TRUE
                ),
                'content_detail' => array(
                    'language_id' => self::$active_session['language']['id']
                )
            )
        ));
        if (!empty($content)) {
            $this->load->model('Content_tag_model');
            $this->load->model('Content_type_model');
            $this->load->model('Media_model');
            $this->load->model('Message_model');
            $content['ContentTag'] = $this->Content_tag_model->get_content_tags($content['Content']['id']);
            $content['ContentType'] = $this->Content_type_model->get_content_types($content['Content']['id']);
            $content['ContentMedia'] = $this->Media_model->get_content_medias($content['Content']['id']);
            $content['Comment'] = $this->Message_model->get_comments($content['Content']['id']);
        }
        return $content;
    }

    function get_contents_by_type($type = NULL, $limit = NULL, $offset = NULL) {
        $contents = $this->find('all', array(
            'join' => array(
                'content_detail' => array('left' => 'contents.id = content_details.content_id'),
                'content_type' => array('left' => 'contents.id = content_types.content_id'),
                'type' => array('left' => 'types.id = content_types.type_id'),
                'user' => array('left' => 'contents.user_id = users.id'),
            ),
            'condition' => array(
                'content' => array(
                    'is_hide' => FALSE,
                    'is_active' => TRUE
                ),
                'content_detail' => array(
                    'language_id' => self::$active_session['language']['id']
                ),
                'type' => array(
                    'slug' => $type
                )
            ),
            'order' => array('contents.id DESC'),
            'limit' => $limit,
            'offset' => $offset
        ));
        $this->load->model('Content_tag_model');
        $this->load->model('Media_model');
        $this->load->model('Message_model');
        foreach ($contents as $key => $row) {
            $contents[$key]['ContentTag'] = $this->Content_tag_model->get_content_tags($row['Content']['id']);
            $contents[$key]['ContentMedia'] = $this->Media_model->get_content_medias($row['Content']['id']);
            $contents[$key]['Comment']['count'] = $this->Message_model->get_count_comments($row['Content']['id']);
        }
    }

    function count_contents_by_type($slug = NULL) {
        $count = $this->find('count', array(
            'join' => array(
                'content_detail' => array('left' => 'contents.id = content_details.content_id'),
                'content_type' => array('left' => 'contents.id = content_types.content_id'),
            ),
            'condition' => array(
                'content' => array(
                    'is_hide' => FALSE,
                    'is_active' => TRUE
                ),
                'content_detail' => array(
                    'language_id' => self::$active_session['language']['id']
                ),
                'type' => array(
                    'slug' => $slug
                )
            ),
            'order' => array('contents.id DESC'),
        ));
        return $count;
    }

    function get_contents_by_tag($tag = NULL, $limit = NULL, $offset = NULL) {
        $contents = $this->find('all', array(
            'join' => array(
                'content_detail' => array('left' => 'contents.id = content_details.content_id'),
                'content_tag' => array('left' => 'contents.id = content_tags.content_id'),
                'tag' => array('left' => 'tags.id = content_tags.tag_id'),
                'user' => array('left' => 'contents.user_id = users.id'),
            ),
            'condition' => array(
                'content' => array(
                    'is_hide' => FALSE,
                    'is_active' => TRUE
                ),
                'content_detail' => array(
                    'language_id' => self::$active_session['language']['id']
                ),
                'tag' => array(
                    'slug' => $tag
                )
            ),
            'order' => array('contents.id DESC'),
            'limit' => $limit,
            'offset' => $offset
        ));
        $this->load->model('Content_type_model');
        $this->load->model('Media_model');
        $this->load->model('Message_model');
        foreach ($contents as $key => $row) {
            $contents[$key]['ContentType'] = $this->Content_type_model->get_content_types($row['Content']['id']);
            $contents[$key]['ContentMedia'] = $this->Media_model->get_content_medias($row['Content']['id']);
            $contents[$key]['Comment']['count'] = $this->Message_model->get_count_comments($row['Content']['id']);
        }
    }

    function get_content_by_slug($slug = NULL) {
        $content = $this->find('first', array(
            'join' => array(
                'content_detail' => array('left' => 'contents.id = content_details.content_id'),
                'user' => array('left' => 'contents.user_id = users.id'),
            ),
            'condition' => array(
                'content' => array(
                    'is_hide' => FALSE,
                    'is_active' => TRUE
                ),
                'content_detail' => array(
                    'slug' => $slug,
                    'language_id' => self::$active_session['language']['id']
                )
            )
        ));
        if (!empty($content)) {
            $this->load->model('Content_tag_model');
            $this->load->model('Content_type_model');
            $this->load->model('Media_model');
            $this->load->model('Message_model');
            $content['ContentTag'] = $this->Content_tag_model->get_content_tags($content['Content']['id']);
            $content['ContentType'] = $this->Content_type_model->get_content_types($content['Content']['id']);
            $content['ContentMedia'] = $this->Media_model->get_content_medias($content['Content']['id']);
            $content['Comment'] = $this->Message_model->get_comments($content['Content']['id']);
        }
        return $content;
    }

    function get_recent_content($limit = NULL, $offset = NULL) {
        $contents = $this->find('all', array(
            'join' => array(
                'content_detail' => array('left' => 'contents.id = content_details.content_id'),
                'user' => array('left' => 'contents.user_id = users.id'),
            ),
            'condition' => array(
                'content' => array(
                    'is_hide' => FALSE,
                    'is_active' => TRUE
                ),
                'content_detail' => array(
                    'language_id' => self::$active_session['language']['id']
                )
            ),
            'order' => array('contents.id DESC'),
            'limit' => $limit,
            'offset' => $offset
        ));
        return $contents;
    }

}

?>