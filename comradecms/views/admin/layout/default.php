<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>ComradeCMS <?php if (isset($title)) echo '- ' . $title; ?></title>
        <?php $this->load->view('admin/element/general/meta'); ?>
        <?php $this->load->view('admin/element/general/css'); ?>
        <?php $this->load->view('admin/element/general/js'); ?>
        <link rel="shortcut icon" href="<?php echo admin_base_url('ico'); ?>favicon.ico"/>
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo admin_base_url('ico'); ?>apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo admin_base_url('ico'); ?>apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo admin_base_url('ico'); ?>apple-touch-icon-57-precomposed.png">
    </head>
    <body>
        <?php $this->load->view('admin/element/general/navbar'); ?>
        <?php $this->load->view('admin/element/general/content'); ?>
    </body>
</html>