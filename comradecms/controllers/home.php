<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends Public_Controller {

    public function index() {
        $this->data['contents'] = $this->Content_model->get_contents(self::$limit, $this->get_offset_from_segment(self::$offset));

        $this->pagination_create($this->Content_model->count_contents());

        $this->data['portfolios'] = $this->Content_model->get_contents_by_type('portfolio', 8);

        $this->data['sliders'] = $this->Content_model->get_contents_by_type('slider', 5);
        $this->load->view(self::$layout . 'default', $this->data);
    }

}

?>
