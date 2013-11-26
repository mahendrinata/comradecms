<?php (isset($layout)) ? $this->load->view($layout) : $this->load->view($template . 'content/' . $class . '/' . $method); ?>
