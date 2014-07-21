<div class="container-fluid">
    <?php $this->load->view('admin/element/general/breadcrumb'); ?>
    <?php (isset($layout)) ? $this->load->view($layout) : $this->load->view('admin/content/' . $class . '/' . $method); ?>
</div>