<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Menu extends Admin_Controller {

    public function __construct() {
        $this->load->model('Link_model');
        parent::__construct();
    }

    public function index() {
        $this->data['menus'] = $this->Link_model
                ->get_many_by('is_active', TRUE);

        $this->load->view(self::$layout_default, $this->data);
    }

    public function detail($id = NULL) {
        $this->data['menu'] = $this->Link_model
                ->get_by('id', $id);
        $this->load->view(self::$layout_default, $this->data);
    }

    public function create() {
        if (!empty(self::$post_data)) {
            $create = $this->Link_model->insert(self::$post_data);
            $this->after_save('create', $create);
        }
        $this->load->view(self::$layout_default, $this->data);
    }

    public function edit($id = NULL) {
        if (!empty(self::$post_data)) {
            $edit = $this->Link_model->update($id, self::$post_data);
            $this->after_save('edit', $edit);
        }
        $this->data['menu'] = $this->Link_model
                ->get_by('id', $id);
        $this->load->view(self::$layout_default, $this->data);
    }

    public function remove($id = NULL) {
        $remove = $this->Link_model->remove_or_hide($id);
        $this->after_save('remove', $remove);
    }

    public function active($id = NULL) {
        $edit = $this->Link_model->set_status($id);
        $this->after_save('edit', $edit);
    }

}

?>