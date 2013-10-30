<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SRABON - Responsive, Touch Friendly Admin Template</title>
    <?php $this->load->view('admin/element/general/meta'); ?>
    <?php $this->load->view('admin/element/general/css'); ?>
    <?php $this->load->view('admin/element/general/js'); ?>
    <link rel="shortcut icon" href="<?php echo admin_base_url('ico'); ?>favicon.ico"/>
  </head>
  <body>
    <?php $this->load->view('admin/element/general/navbar'); ?>
    <?php $this->load->view('admin/element/general/content'); ?>
  </body>
</html>