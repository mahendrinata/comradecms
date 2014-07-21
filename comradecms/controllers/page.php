<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Page extends Public_Controller {

    public function index() {
        $this->load->view(self::$layout . 'default', $this->data);
    }

    public function contact_us() {
        $this->load->view(self::$layout . 'default', $this->data);
    }

}

?>
