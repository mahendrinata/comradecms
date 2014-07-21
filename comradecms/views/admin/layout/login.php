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
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <div class="branding">
                        <div class="logo">
                            <a href="index.html"><img src="<?php echo admin_base_url('img'); ?>logo.png" width="168" height="40" alt="Logo"></a>
                        </div>
                    </div>
                    <ul class="nav pull-right">
                        <li><a href="#"><i class="icon-share-alt icon-white"></i> Go to Main Site</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php echo form_open('admin/user/login'); ?>
        <div class="login-container">
            <div class="well-login">
                <div class="control-group">
                    <div class="controls">
                        <div>
                            <?php
                            echo form_input('username', NULL, 'placeholder="Username or Email" class="login-input user-name"');
                            echo form_error('username', '<span class="label label-important">', '</span>');
                            ?>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div>
                            <?php
                            echo form_password('password', NULL, 'placeholder="Password" class="login-input user-pass"');
                            echo form_error('password', '<span class="label label-important">', '</span>');
                            ?>
                        </div>
                    </div>
                </div>
                <div class="clearfix">
                    <button class="btn btn-inverse login-btn" type="submit">Login</button>
                </div>
                <div class="remember-me">
                    <input class="rem_me" type="checkbox" value=""> Remeber Me
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </body>
</html>