<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <?php $this->load->view($template . 'element/general/css'); ?>
    <?php $this->load->view($template . 'element/general/js'); ?>

  </head>
  <body>
    <div id="wrapper">
      <?php $this->load->view($template . 'element/content/social'); ?>
      <?php $this->load->view($template . 'element/content/menu'); ?>
      <div id="main">
        <?php $this->load->view($template . 'element/general/content'); ?>
      </div>
      <?php $this->load->view($template . 'element/content/footer'); ?>
    </div>
  </body>
</html>
