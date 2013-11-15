<div class="row-fluid">
  <div class="span12">
    <div class="widget-block">
      <div class="widget-head">
        <h5>Create Language</h5>
      </div>
      <div class="widget-content">
        <div class="widget-box">
          <?php
          echo form_open(get_link('admin/language/create'), array('class' => 'form-horizontal'));
          echo form_hidden('is_hide', FALSE);
          echo bootstrap_form_input('slug', NULL, array('class' => 'span6', 'placeholder' => 'Slug', 'label' => 'Slug' . bootstrap_text_important()));
          echo bootstrap_form_input('name', NULL, array('class' => 'span6', 'placeholder' => 'Name', 'label' => 'Name' . bootstrap_text_important()));
          echo bootstrap_form_checkbox('is_active', TRUE, array('label' => 'Active Status', 'checked' => 'checked'));
          echo bootstrap_form_checkbox('is_default', TRUE, array('label' => 'Default Role'));
          echo bootstrap_control_group(NULL, bootstrap_text_important('Note : (*) Field must be not null.'));
          echo bootstrap_form_submit(NULL, 'Save', array('class' => 'btn btn-primary', 'after' => anchor('admin/language', 'Back', 'class="btn btn-danger btn-link-bootstrap"')));
          echo form_close();
          ?>
        </div>
      </div>
    </div>
  </div>
</div>