<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class User extends Admin_Controller {

    /**
     * @author Mahendri Winata <mahen.0112@gmail.com>
     * 
     * Description :
     * This function used by user to login and access admin page.
     */
    public function login() {
        $data['title'] = 'Login Administrator';

        if ($this->form_validation->run()) {
            $user = $this->User_model->get_user_login(self::$post_data['username']);

            if ($this->get_validate_password(self::$post_data['password'], $user)) {
                $this->session->set_userdata('admin', $user);
                $this->error_message('login', TRUE, 'You success login, Welcome to system administrator.');
                redirect('admin/dashboard/index');
            } else {
                $this->error_message('login', FALSE, 'Sorry, Your username or password is wrong.');
                $this->load->view(self::$layout . 'login', $data);
            }
        } else {
            $this->load->view(self::$layout . 'login', $data);
        }
    }

    /**
     * @author Mahendri Winata <mahen.0112@gmail.com>
     * 
     * Description :
     * This function used by user to logout
     */
    public function logout() {
        $this->session->unset_userdata('admin');
        $this->error_message('logout', TRUE, 'You success logout from system administrator.');
        redirect('admin/user/login');
    }

    public function index() {
        $this->data['users'] = $this->User_model->get_users();

        $this->load->model('Role_model');
        $this->data['roles'] = $this->Role_model->dropdown('id', 'name');

        $this->load->view(self::$layout_default, $this->data);
    }

    public function detail($id = NULL) {
        $this->data['user'] = $this->User_model->get_user($id);
        $this->load->view(self::$layout_default, $this->data);
    }

    public function create() {
        if (!empty(self::$post_data)) {
            self::$post_data['parent_id'] = self::$active_session['admin']['id'];
            $create = $this->User_model->insert($this->set_encrype_user_data(self::$post_data));
            if ($create) {
                $this->save_data_after('User_role_model', $user_roles, 'user_id', $create, TRUE);
            }
            $this->after_save('create', $create);
        }
        $this->load->view(self::$layout_default, $this->data);
    }

    public function edit($id = NULL) {
        if (!empty(self::$post_data)) {
            $user_roles = $this->get_post_data('user_role');
            $edit = $this->User_model->update($id, $this->set_encrype_user_data(self::$post_data));
            if ($edit) {
                $this->load->model('User_role_model');
                $this->User_role_model->save_data_after($user_roles, 'user_id', $id, TRUE);
            }
            $this->after_save('edit', $edit);
        }
        $this->data['user'] = $this->User_model
                ->with('user_role')
                ->get_by('id', $id);
        $this->load->view(self::$layout_default, $this->data);
    }

    public function remove($id = NULL) {
        $remove = $this->User_model->remove_or_hide($id);
        $this->after_save('remove', $remove);
    }

    public function active($id = NULL) {
        $edit = $this->User_model->set_status($id);
        $this->after_save('edit', $edit);
    }

}

?>