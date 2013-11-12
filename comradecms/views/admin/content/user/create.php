<div class="row-fluid">
  <div class="span12">
    <div class="nonboxy-widget">
      <div class="widget-head">
        <h5>Create User</h5>
      </div>
      <div class="widget-content">
        <div class="widget-box">
          <?php
          echo form_open(get_link('admin/user/create'), array('class' => 'form-horizontal'));
          echo form_hidden('is_hide', FALSE);
          echo form_hidden('is_block', FALSE);
          echo bootstrap_form_input('username', NULL, array('class' => 'span6', 'placeholder' => 'Username', 'label' => 'Username' . bootstrap_text_important()));
          echo bootstrap_form_input('first_name', NULL, array('class' => 'span6', 'placeholder' => 'First Name', 'label' => 'First Name' . bootstrap_text_important()));
          echo bootstrap_form_input('middle_name', NULL, array('class' => 'span6', 'placeholder' => 'Middle Name', 'label' => 'Middle Name'));
          echo bootstrap_form_input('last_name', NULL, array('class' => 'span6', 'placeholder' => 'Last Name', 'label' => 'Last Name'));
          echo bootstrap_form_textarea('address', NULL, array('class' => 'span8', 'rows' => 6, 'label' => 'Address'));
          echo bootstrap_form_input('phone', NULL, array('class' => 'span6', 'placeholder' => 'Phone', 'label' => 'Phone'));
          echo bootstrap_form_input('email', NULL, array('class' => 'span6', 'placeholder' => 'Email', 'label' => 'Email' . bootstrap_text_important()));
          echo bootstrap_form_checkbox('is_active', TRUE, array('label' => 'Active Status', 'checked' => 'checked'));
          echo get_dropdown_user_role();
          echo bootstrap_form_password('password', NULL, array('class' => 'span6', 'placeholder' => 'Password', 'label' => 'Password' . bootstrap_text_important()));
          echo bootstrap_form_password('confirmation_password', NULL, array('class' => 'span6', 'placeholder' => 'Confirmation Password', 'label' => 'Confirmation Password' . bootstrap_text_important()));
          echo bootstrap_control_group(NULL, bootstrap_text_important('Note : (*) Field must be not null.'));
          echo bootstrap_form_submit(NULL, 'Save', array('class' => 'btn btn-primary', 'after' => anchor('admin/user', 'Back', 'class="btn btn-danger btn-link-bootstrap"')));
          echo form_close();
          ?>
        </div>
      </div>
    </div>
  </div>
</div>