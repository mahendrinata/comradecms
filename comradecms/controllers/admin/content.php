<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Content extends Admin_Controller {

    public function index() {
        $this->data['contents'] = $this->Content_model->get_contents();

        $this->load->model('Tag_model');
        $this->data['tags'] = $this->Tag_model->dropdown('id', 'name');

        $this->load->model('Type_model');
        $this->data['types'] = $this->Type_model->dropdown('id', 'name');

        $this->load->view(self::$layout_default, $this->data);
    }

    public function detail($id = NULL) {
        $this->data['content'] = $this->Content_model->get_content($id);
        $this->load->view(self::$layout_default, $this->data);
    }

    public function create() {
        if (!empty(self::$post_data)) {
            self::$post_data['user_id'] = self::$active_session['admin']['id'];
            $create = $this->Content_model->insert(self::$post_data);
            $this->after_save('create', $create);
        }
        $this->load->view(self::$layout_default, $this->data);
    }

    public function edit($id = NULL) {
        if (!empty(self::$post_data)) {
            self::$post_data['user_id'] = self::$active_session['admin']['id'];
            $edit = $this->Content_model->update($id, self::$post_data);
            $this->after_save('edit', $edit);
        }
        $this->data['content'] = $this->Content_model
                ->get_by('id', $id);
        $this->load->view(self::$layout_default, $this->data);
    }

    public function remove($id = NULL) {
        $remove = $this->Content_model->remove_or_hide($id);
        $this->after_save('remove', $remove);
    }

    public function active($id = NULL) {
        $edit = $this->Content_model->set_status($id);
        $this->after_save('edit', $edit);
    }

}

?>