<div class="row-fluid">
  <div class="span12">
    <div class="nonboxy-widget">
      <div class="widget-head">
        <h5> Form Elements</h5>
      </div>
      <div class="widget-content">
        <div class="widget-box">
          <?php
          echo form_open(get_link('admin/user/edit', $user, TRUE), array('class' => 'form-horizontal'));
          echo bootstrap_form_input('name', $user['username'], array('class' => 'span6', 'placeholder' => 'Username', 'label' => 'Username' . bootstrap_text_important()));
          echo bootstrap_form_input('name', $user['first_name'], array('class' => 'span6', 'placeholder' => 'First Name', 'label' => 'First Name' . bootstrap_text_important()));
          echo bootstrap_form_input('name', $user['middle_name'], array('class' => 'span6', 'placeholder' => 'Middle Name', 'label' => 'Middle Name' . bootstrap_text_important()));
          echo bootstrap_form_input('name', $user['last_name'], array('class' => 'span6', 'placeholder' => 'Last Name', 'label' => 'Last Name' . bootstrap_text_important()));
          echo bootstrap_form_textarea('address', $user['address'], array('class' => 'span8', 'rows' => 6, 'label' => 'Address'));
          echo bootstrap_form_input('phone', $user['phone'], array('class' => 'span6', 'placeholder' => 'Phone', 'label' => 'Phone'));
          echo bootstrap_form_input('email', $user['email'], array('class' => 'span6', 'placeholder' => 'Email', 'label' => 'Email' . bootstrap_text_important()));
          echo bootstrap_form_password('password', NULL, array('class' => 'span6', 'placeholder' => 'Password', 'label' => 'Password' . bootstrap_text_important()));
          echo bootstrap_form_password('confirmation_password', NULL, array('class' => 'span6', 'placeholder' => 'Konfirmasi Password', 'label' => 'Konfirmasi Password' . bootstrap_text_important()));
          echo bootstrap_control_group(NULL, bootstrap_text_important('Note : (*) Field must be not null.'));
          echo bootstrap_form_submit(NULL, 'Save', array('class' => 'btn btn-primary', 'after' => anchor('admin/user', 'Back', 'class="btn btn-danger btn-link-bootstrap"')));
          echo form_close();
          ?>
        </div>
      </div>
    </div>
  </div>
</div>